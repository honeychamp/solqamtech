<?php

namespace App\Controllers;

class Sitemap extends BaseController
{
    public function index()
    {
        $urls = [
            '/',
            '/about',
            '/services',
            '/amazon-services',
            '/portfolio',
            '/process',
            '/insights',
            '/faqs',
            '/contact',
            '/privacy-policy',
            '/terms',
        ];

        foreach (array_keys($this->site->services) as $slug) {
            $urls[] = '/services/' . $slug;
        }

        foreach ($this->site->insights as $post) {
            $urls[] = '/insights/' . $post['slug'];
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($urls as $path) {
            $xml .= '  <url><loc>' . htmlspecialchars(base_url($path), ENT_XML1 | ENT_QUOTES, 'UTF-8') . '</loc></url>' . "\n";
        }

        $xml .= '</urlset>';

        return $this->response->setHeader('Content-Type', 'application/xml')->setBody($xml);
    }
}
