<?php

namespace App\Controllers;

use App\Models\NewsModel;

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
}
