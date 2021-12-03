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
        // TODO: ubah response JSON jadi redirect halaman home dengan menampilkan pesan sukses, buat balikan object didalam array yang isi errors jika gagal menginput data.

        $data = [
            'title'     => $this->request->getVar('title'),
            'category'  => $this->request->getVar('category'),
            'content'   => $this->request->getVar('content'),
            'preview'   => $this->request->getVar('preview')
        ];

        if($this->newsModel->save($data)) {
            return $this->response->setJSON($data);
        }

        return $this->response->setJSON($this->newsModel->errors());
    }

    public function readnews()
    {
        $data = [
            'title' => 'News | '
        ];

        return view('users/readnews', $data);
    }
}
