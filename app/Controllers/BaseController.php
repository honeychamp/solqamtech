<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Site;
use Psr\Log\LoggerInterface;

abstract class BaseController extends Controller
{
    protected $helpers = ['url', 'form', 'site'];

    protected Site $site;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->site = apply_site_locale(config(Site::class));
    }

    protected function render(string $view, array $data = []): string
    {
        $data['site'] = $this->site;
        $data['title'] ??= t('nav.home') . ' | SolqamTech';
        $data['description'] ??= t('meta.defaultDesc');
        $data['canonical'] ??= current_url();

        return view($view, $data);
    }
}
