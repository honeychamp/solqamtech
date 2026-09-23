<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('lang/(:segment)', 'Lang::switch/$1');
$routes->get('/', 'Home::index');
$routes->get('about', 'Pages::about');
$routes->get('services', 'Pages::services');
$routes->get('services/(:segment)', 'Pages::service/$1');
$routes->get('amazon-services', 'Pages::amazon');
$routes->get('portfolio', 'Pages::portfolio');
$routes->get('process', 'Pages::process');
$routes->get('faqs', 'Pages::faqs');
$routes->get('contact', 'Pages::contact');
$routes->get('privacy-policy', 'Pages::privacy');
$routes->get('terms', 'Pages::terms');
$routes->get('insights', 'Blog::index');
$routes->get('insights/(:segment)', 'Blog::show/$1');
$routes->get('sitemap.xml', 'Sitemap::index');
$routes->post('contact/submit', 'Contact::submit');
$routes->post('contact/amazon', 'Contact::amazon');
$routes->post('contact/newsletter', 'Contact::newsletter');
