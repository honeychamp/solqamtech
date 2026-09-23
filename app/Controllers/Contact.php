<?php

namespace App\Controllers;

use App\Libraries\LeadStore;
use CodeIgniter\HTTP\RedirectResponse;

class Contact extends BaseController
{
    public function submit(): RedirectResponse
    {
        return $this->capture('contact', [
            'name'     => 'required|min_length[2]|max_length[80]',
            'email'    => 'required|valid_email',
            'phone'    => 'required|min_length[7]|max_length[30]',
            'company'  => 'permit_empty|max_length[120]',
            'service'  => 'required|max_length[120]',
            'budget'   => 'permit_empty|max_length[80]',
            'details'  => 'required|min_length[10]|max_length[4000]',
            'consent'  => 'required',
        ], t('flash.contact'));
    }

    public function amazon(): RedirectResponse
    {
        return $this->capture('amazon', [
            'name'        => 'required|min_length[2]|max_length[80]',
            'email'       => 'required|valid_email',
            'phone'       => 'required|min_length[7]|max_length[30]',
            'company'     => 'permit_empty|max_length[120]',
            'marketplace' => 'required|max_length[80]',
            'category'    => 'required|max_length[120]',
            'stage'       => 'required|max_length[120]',
            'support'     => 'required|max_length[120]',
            'details'     => 'required|min_length[10]|max_length[4000]',
            'consent'     => 'required',
        ], t('flash.amazon'));
    }

    public function newsletter(): RedirectResponse
    {
        return $this->capture('newsletter', [
            'email'   => 'required|valid_email',
            'consent' => 'required',
        ], t('flash.newsletter'));
    }

    private function capture(string $type, array $rules, string $success): RedirectResponse
    {
        if ($this->request->getPost('website_url')) {
            return $this->afterPost($success);
        }

        if (! $this->validate($rules)) {
            return $this->afterPost('', $this->validator->getErrors());
        }

        $fields = array_keys($rules);
        $payload = [];

        foreach ($fields as $field) {
            $payload[$field] = $this->request->getPost($field);
        }

        unset($payload['consent']);

        $store = new LeadStore();
        if ($store->isRecentDuplicate($type, $payload)) {
            return $this->afterPost($success);
        }

        if (! $store->save($type, $payload)) {
            return $this->afterPost('', [
                'form' => t('flash.saveFail', ['email' => $this->site->email]),
            ]);
        }

        $this->notify($type, $payload);

        return $this->afterPost($success);
    }

    private function afterPost(string $success = '', array $errors = []): RedirectResponse
    {
        $redirect = redirect()->to($this->returnUrl(), 303);

        if ($errors !== []) {
            return $redirect->withInput()->with('errors', $errors);
        }

        return $redirect->with('success', $success);
    }

    private function returnUrl(): string
    {
        $path = trim($this->request->getUri()->getPath(), '/');

        if (str_ends_with($path, 'contact/submit')) {
            return base_url('contact');
        }

        if (str_ends_with($path, 'contact/amazon')) {
            return base_url('amazon-services');
        }

        $previous = (string) previous_url();
        foreach (['contact/submit', 'contact/amazon', 'contact/newsletter'] as $postPath) {
            if ($previous !== '' && str_contains($previous, $postPath)) {
                $previous = '';
                break;
            }
        }

        return $previous !== '' ? $previous : base_url('/');
    }

    private function notify(string $type, array $payload): void
    {
        $cfg = config('Email');
        if ($cfg->protocol !== 'smtp' || $cfg->SMTPHost === '' || $cfg->SMTPUser === '' || $cfg->SMTPPass === '') {
            log_message('notice', 'Lead saved to file. SMTP password is not set, so email was skipped.');
            return;
        }

        $labels = [
            'contact'    => 'consultation',
            'amazon'     => 'Amazon consultation',
            'newsletter' => 'newsletter',
        ];
        $label = $labels[$type] ?? $type;
        $to    = $this->site->notifyEmail ?: $cfg->fromEmail;

        $email = service('email');
        $email->setFrom($cfg->fromEmail ?: $this->site->fromEmail, $cfg->fromName ?: $this->site->name);
        $email->setTo($to);
        $email->setSubject('New ' . $label . ' inquiry, SolqamTech');

        if (! empty($payload['email']) && is_string($payload['email'])) {
            $name = is_string($payload['name'] ?? null) ? $payload['name'] : '';
            $email->setReplyTo($payload['email'], $name);
        }

        $lines = ['A new ' . $label . ' inquiry was submitted on SolqamTech.', ''];
        foreach ($payload as $key => $value) {
            $lines[] = ucfirst((string) $key) . ': ' . (is_scalar($value) ? (string) $value : json_encode($value));
        }

        $email->setMessage(implode("\n", $lines));

        try {
            if (! $email->send()) {
                log_message('error', 'Lead email could not be sent for ' . $type . '. Check SMTP settings in .env.');
            }
        } catch (\Throwable $e) {
            log_message('error', 'Lead email failed: ' . $e->getMessage());
        }
    }
}
