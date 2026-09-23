<?php

namespace App\Controllers;

class Blog extends BaseController
{
    public function index(): string
    {
        return $this->render('blog/index', [
            'title'       => t('meta.blogTitle'),
            'description' => t('meta.blogDesc'),
        ]);
    }

    public function show(string $slug): string
    {
        $post = $this->site->insight($slug);

        if ($post === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return $this->render('blog/show', [
            'title'       => $post['title'] . t('blog.suffix'),
            'description' => $post['excerpt'],
            'post'        => $post,
        ]);
    }
}
