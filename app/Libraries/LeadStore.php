<?php

namespace App\Libraries;

class LeadStore
{
    public function save(string $type, array $payload): bool
    {
        $dir = WRITEPATH . 'leads';

        if (! is_dir($dir) && ! mkdir($dir, 0775, true) && ! is_dir($dir)) {
            return false;
        }

        $record = [
            'type'       => $type,
            'created_at' => date('c'),
            'ip'         => service('request')->getIPAddress(),
            'payload'    => $payload,
        ];

        $name = $dir . DIRECTORY_SEPARATOR . date('Ymd-His') . '-' . bin2hex(random_bytes(4)) . '.json';

        return file_put_contents($name, json_encode($record, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)) !== false;
    }

    public function isRecentDuplicate(string $type, array $payload, int $seconds = 180): bool
    {
        $email = strtolower(trim((string) ($payload['email'] ?? '')));
        if ($email === '') {
            return false;
        }

        $dir = WRITEPATH . 'leads';
        if (! is_dir($dir)) {
            return false;
        }

        $cutoff = time() - $seconds;
        $files  = glob($dir . DIRECTORY_SEPARATOR . '*.json') ?: [];

        foreach ($files as $file) {
            if ((int) @filemtime($file) < $cutoff) {
                continue;
            }

            $data = json_decode((string) @file_get_contents($file), true);
            if (! is_array($data) || ($data['type'] ?? '') !== $type) {
                continue;
            }

            $saved = strtolower(trim((string) ($data['payload']['email'] ?? '')));
            if ($saved === $email) {
                return true;
            }
        }

        return false;
    }
}
