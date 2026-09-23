<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

class Lang extends BaseController
{
    public function switch(string $locale): RedirectResponse
    {
        if (! in_array($locale, ['en', 'ar'], true)) {
            $locale = 'en';
        }

        session()->set('locale', $locale);

        $base   = rtrim(base_url('/'), '/');
        $next   = (string) $this->request->getGet('next');
        $target = base_url('/');

        if ($next !== '' && str_starts_with($next, $base) && ! str_contains($next, '/lang/')) {
            $target = $next;
        } else {
            $previous = (string) previous_url();
            if ($previous !== '' && ! str_contains($previous, '/lang/')) {
                $target = $previous;
            }
        }

        return redirect()->to($target, 303)->setCookie('locale', $locale, 60 * 60 * 24 * 365);
    }
}
