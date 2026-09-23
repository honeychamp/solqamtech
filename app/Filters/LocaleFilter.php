<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LocaleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $locale = (string) (session()->get('locale') ?: $request->getCookie('locale') ?: 'en');
        if (! in_array($locale, ['en', 'ar'], true)) {
            $locale = 'en';
        }

        $request->setLocale($locale);
        service('language')->setLocale($locale);

        return $request;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return $response;
    }
}
