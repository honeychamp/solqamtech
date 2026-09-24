<?php

if (! function_exists('nav_active')) {
    function nav_active(string $needle): string
    {
        $path   = trim((string) uri_string(), '/');
        $needle = trim($needle, '/');

        if ($needle === '') {
            return $path === '' ? 'is-active' : '';
        }

        if ($path === $needle || str_starts_with($path, $needle . '/')) {
            return 'is-active';
        }

        return '';
    }
}

if (! function_exists('current_lang')) {
    function current_lang(): string
    {
        $locale = service('request')->getLocale();

        return in_array($locale, ['en', 'ar'], true) ? $locale : 'en';
    }
}

if (! function_exists('is_rtl')) {
    function is_rtl(): bool
    {
        return current_lang() === 'ar';
    }
}

if (! function_exists('t')) {
    function t(string $key, array $replace = [], ?string $default = null): string
    {
        $line = lang('Ui.' . $key);

        if ($line === 'Ui.' . $key) {
            $line = $default ?? $key;
        }

        foreach ($replace as $name => $value) {
            $line = str_replace('{' . $name . '}', (string) $value, $line);
        }

        return $line;
    }
}

if (! function_exists('t_link')) {
    function t_link(string $key, string $href): string
    {
        return str_replace(
            ['{link}', '{/link}'],
            ['<a href="' . htmlspecialchars($href, ENT_QUOTES, 'UTF-8') . '">', '</a>'],
            t($key)
        );
    }
}
if (! function_exists('lang_url')) {
    function lang_url(string $locale): string
    {
        $locale = in_array($locale, ['en', 'ar'], true) ? $locale : 'en';
        $next   = current_url();

        return base_url('lang/' . $locale) . '?next=' . rawurlencode($next);
    }
}

if (! function_exists('apply_site_locale')) {
    function apply_site_locale(\Config\Site $site): \Config\Site
    {
        if (current_lang() !== 'ar') {
            return $site;
        }

        $file = APPPATH . 'Language/ar/site_data.php';
        if (! is_file($file)) {
            return $site;
        }

        $data = require $file;
        if (! is_array($data)) {
            return $site;
        }

        foreach ($data as $prop => $value) {
            if (property_exists($site, $prop)) {
                $site->{$prop} = $value;
            }
        }

        return $site;
    }
}

if (! function_exists('site_config')) {
    function site_config(): \Config\Site
    {
        return apply_site_locale(config('Site'));
    }
}

if (! function_exists('logo_url')) {
    function logo_url(): string
    {
        $jpg = FCPATH . 'assets/img/logo.jpg';
        $svg = FCPATH . 'assets/img/logo.svg';

        if (is_file($jpg)) {
            return base_url('assets/img/logo.jpg') . '?v=' . filemtime($jpg);
        }

        return base_url('assets/img/logo.svg') . '?v=' . (@filemtime($svg) ?: time());
    }
}

if (! function_exists('video_url')) {
    function video_url(string $file): string
    {
        $path = FCPATH . 'assets/video/' . ltrim($file, '/');

        return base_url('assets/video/' . ltrim($file, '/')) . '?v=' . (@filemtime($path) ?: time());
    }
}

if (! function_exists('video_poster')) {
    function video_poster(string $file): string
    {
        $name = pathinfo($file, PATHINFO_FILENAME) . '.jpg';
        $rel  = 'assets/img/video/' . $name;
        $path = FCPATH . $rel;

        if (! is_file($path)) {
            return '';
        }

        return base_url($rel) . '?v=' . filemtime($path);
    }
}

if (! function_exists('st_icon')) {
    function st_icon(string $name): string
    {
        $paths = [
            'megaphone' => '<path d="M3 10v4h2l8 5V5L5 10H3z"/><path d="M19 8a4 4 0 0 1 0 8"/><path d="M7 14v4a2 2 0 0 0 2 2h1"/>',
            'search'    => '<circle cx="11" cy="11" r="6.5"/><path d="m16 16 5 5"/>',
            'monitor'   => '<rect x="3" y="4" width="18" height="13" rx="2"/><path d="M8 21h8M12 17v4"/>',
            'palette'   => '<path d="M12 3a9 9 0 1 0 0 18h.5a2.5 2.5 0 0 0 0-5H14a3 3 0 0 1 3-3 9 9 0 0 0-5-10z"/><circle cx="7.5" cy="10" r="1"/><circle cx="10" cy="7" r="1"/><circle cx="13.5" cy="7.5" r="1"/>',
            'spark'     => '<path d="M12 2v4M12 18v4M4.9 4.9l2.9 2.9M16.2 16.2l2.9 2.9M2 12h4M18 12h4M4.9 19.1l2.9-2.9M16.2 7.8l2.9-2.9"/><circle cx="12" cy="12" r="3.2"/>',
            'box'       => '<path d="M3 8.5 12 3l9 5.5v8L12 22 3 16.5v-8z"/><path d="M12 12v10M3 8.5 12 12l9-3.5"/>',
            'ads'       => '<path d="M4 19V5l10 7-10 7z"/><path d="M20 5v14"/>',
            'headset'   => '<path d="M4 12a8 8 0 0 1 16 0"/><path d="M4 12v5a2 2 0 0 0 2 2h1v-7H6a2 2 0 0 0-2 2zM20 12v5a2 2 0 0 1-2 2h-1v-7h1a2 2 0 0 1 2 2z"/>',
            'target'    => '<circle cx="12" cy="12" r="8"/><circle cx="12" cy="12" r="4"/><circle cx="12" cy="12" r="1.2"/>',
            'map'       => '<path d="M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11z"/><circle cx="12" cy="10" r="2.2"/>',
            'rocket'    => '<path d="M12 3c4 3 6 7 6 11 0 2-1 4-3 5l-3 2-3-2c-2-1-3-3-3-5 0-4 2-8 6-11z"/><circle cx="12" cy="11" r="2"/>',
            'check'     => '<path d="M20 6 9 17l-5-5"/>',
            'shield'    => '<path d="M12 3 5 6v6c0 5 3.2 7.8 7 9 3.8-1.2 7-4 7-9V6l-7-3z"/>',
            'clock'     => '<circle cx="12" cy="12" r="8.5"/><path d="M12 7.5V12l3 2"/>',
            'quote'     => '<path d="M8 17H4c0-4 2-7 5-8V6H4v11zm12 0h-4c0-4 2-7 5-8V6h-5v11z"/>',
            'pen'       => '<path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/>',
            'camera'    => '<path d="M4 8h3l2-2h6l2 2h3v11H4V8z"/><circle cx="12" cy="13" r="3.4"/>',
            'users'     => '<circle cx="9" cy="8" r="3"/><path d="M3.5 19c.8-3 2.8-4.5 5.5-4.5S13.7 16 14.5 19"/><circle cx="17" cy="8.5" r="2.2"/><path d="M16 14.6c2 .4 3.6 1.6 4.2 4.4"/>',
            'store'     => '<path d="M4 10V20h16V10"/><path d="M3 7h18l-1.2 3H4.2L3 7z"/><path d="M10 20v-6h4v6"/>',
            'heart'     => '<path d="M12 20s-7-4.4-7-10a4 4 0 0 1 7-2.5A4 4 0 0 1 19 10c0 5.6-7 10-7 10z"/>',
            'globe'     => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.5 3 3.8 6 3.8 9s-1.3 6-3.8 9c-2.5-3-3.8-6-3.8-9S9.5 6 12 3z"/>',
            'file'      => '<path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"/><path d="M14 3v5h5"/><path d="M9 13h6M9 17h4"/>',
            'layers'    => '<path d="M12 3 3 8l9 5 9-5-9-5z"/><path d="M3 12l9 5 9-5"/><path d="M3 16l9 5 9-5"/>',
            'flag'      => '<path d="M5 21V4"/><path d="M5 4h11l-2 3.5L16 11H5"/>',
            'mail'      => '<rect x="3.5" y="5.5" width="17" height="13" rx="2"/><path d="m4 7 8 6 8-6"/>',
            'phone'     => '<path d="M6.5 4.5h3l1.2 3.2-1.8 1.2a12 12 0 0 0 6.2 6.2l1.2-1.8 3.2 1.2v3A2 2 0 0 1 17.5 19 15 15 0 0 1 5 6.5a2 2 0 0 1 1.5-2Z"/>',
            'calendar'  => '<rect x="3.5" y="5" width="17" height="15" rx="2"/><path d="M8 3v4M16 3v4M3.5 10h17"/>',
            'lock'      => '<rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 0 1 8 0v3"/>',
            'book'      => '<path d="M5 5.5A2.5 2.5 0 0 1 7.5 3H20v16H7.5A2.5 2.5 0 0 0 5 21.5z"/><path d="M5 5.5v16"/>',
            'list'      => '<path d="M9 7h11M9 12h11M9 17h11"/><circle cx="5" cy="7" r="1"/><circle cx="5" cy="12" r="1"/><circle cx="5" cy="17" r="1"/>',
            'chat'      => '<path d="M5 18 3 21V7a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3H8z"/>',
            'briefcase' => '<rect x="3" y="7" width="18" height="13" rx="2"/><path d="M8 7V6a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1M3 12h18"/>',
            'warning'   => '<path d="M12 4 3 19h18L12 4z"/><path d="M12 9v5M12 16.5v.5"/>',
            'arrow'     => '<path d="M7 17 17 7"/><path d="M8 7h9v9"/>',
        ];

        $inner = $paths[$name] ?? $paths['spark'];

        return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $inner . '</svg>';
    }
}
