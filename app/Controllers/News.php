<?php

namespace App\Controllers;

use App\Models\NewsModel;
use ReflectionException;

class News extends BaseController
{
    protected $newsModel;
    public function __construct()
    {
        $this->newsModel = new NewsModel();
    }
    public function index()
    {
        $news = $this->newsModel->findAll();

        $data = [
            'title' => 'News | ',
            'news'  => $news
        ];

        return view('users/news', $data);
    }

    /**
     * @throws ReflectionException
     */
    public function store()
    {
        $data = [
            'title'     => $this->request->getVar('title'),
            'category'  => $this->request->getVar('category'),
            'picture'   => $this->request->getVar('picture'), // TODO: proses data sebelum di store ke db
            'content'   => $this->request->getVar('content'),
            'preview'   => $this->request->getVar('preview')
        ];

        if($this->newsModel->save($data)) {
            return $this->response->setJSON($data);
        }

        return $this->response->setJSON($this->newsModel->errors());
    }
}
