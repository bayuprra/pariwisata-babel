<?php

namespace App\Controllers;

use App\Models\NewsModel;

class Users extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | '
        ];

        return view('users/home', $data);
    }

    protected $newsModel;
    public function __construct()
    {
        $this->newsModel = new NewsModel();
    }
    public function news()
    {
        $news = $this->newsModel->findAll();

        $data = [
            'title' => 'News | ',
            'news'  => $news
        ];

        return view('users/news', $data);
    }
}
