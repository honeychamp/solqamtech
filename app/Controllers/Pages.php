<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function about(): string
    {
        return $this->render('pages/about', [
            'title'       => t('meta.aboutTitle'),
            'description' => t('meta.aboutDesc'),
        ]);
    }

    public function services(): string
    {
        return $this->render('pages/services', [
            'title'       => t('meta.servicesTitle'),
            'description' => t('meta.servicesDesc'),
        ]);
    }

    public function service(string $slug): string
    {
        $service = $this->site->service($slug);

        if ($service === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return $this->render('pages/service', [
            'title'       => $service['title'] . ' | SolqamTech',
            'description' => $service['excerpt'],
            'service'     => $service,
        ]);
    }

    public function amazon(): string
    {
        return $this->render('pages/amazon', [
            'title'       => t('meta.amazonTitle'),
            'description' => t('meta.amazonDesc'),
        ]);
    }

    public function portfolio(): string
    {
        return $this->render('pages/portfolio', [
            'title'       => t('meta.portfolioTitle'),
            'description' => t('meta.portfolioDesc'),
        ]);
    }

    public function process(): string
    {
        return $this->render('pages/process', [
            'title'       => t('meta.processTitle'),
            'description' => t('meta.processDesc'),
        ]);
    }

    public function faqs(): string
    {
        return $this->render('pages/faqs', [
            'title'       => t('meta.faqsTitle'),
            'description' => t('meta.faqsDesc'),
        ]);
    }

    public function contact(): string
    {
        return $this->render('pages/contact', [
            'title'       => t('meta.contactTitle'),
            'description' => t('meta.contactDesc'),
        ]);
    }

    public function privacy(): string
    {
        return $this->render('pages/privacy', [
            'title'       => t('meta.privacyTitle'),
            'description' => t('meta.privacyDesc'),
        ]);
    }

    public function terms(): string
    {
        return $this->render('pages/terms', [
            'title'       => t('meta.termsTitle'),
            'description' => t('meta.termsDesc'),
        ]);
    }
}
