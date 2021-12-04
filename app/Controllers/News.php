<?php

namespace App\Controllers;

use App\Helpers\ImageManager;
use App\Models\NewsImageModel;
use App\Models\NewsModel;
use CodeIgniter\Exceptions\ModelException;
use CodeIgniter\HTTP\ResponseInterface;
use ReflectionException;

class News extends BaseController
{
    /** @var NewsModel */
    private $newsModel;

    /** @var ImageManager */
    private $imageManager;

    /** @var NewsImageModel */
    private $newsImages;

    public function __construct()
    {
        $this->newsModel = new NewsModel();
        $this->newsImages = new NewsImageModel();
        $this->imageManager = new ImageManager();
    }

    public function index()
    {
        $news = $this->newsModel->findAll();

        foreach ($news as $key => $value) {
            $newsImages = $this->newsImages->where(['news_id' => $value->id])->findAll();
            $value->news_images = $newsImages;
        }

        $data = [
            'title' => 'News | ',
            'news'  => $news
        ];

        return view('users/news', $data);
    }

    /**
     * @throws ReflectionException
     */
    public function store(): ResponseInterface
    {
        $data = [
            'title'     => $this->request->getVar('title'),
            'category'  => $this->request->getVar('category'),
            'content'   => $this->request->getVar('content'),
            'preview'   => $this->request->getVar('preview'),
            'image'     => $this->request->getFile('image')
        ];

        if($this->newsModel->save($data)) {
            $newsId = $this->newsModel->getInsertID();

            if (!$newsId) {
                throw ModelException::forNoPrimaryKey($this->newsModel);
            }

            if (!$this->imageManager->newsImageProcessor($data['image'], $newsId)) {
                return $this->response->setJSON($this->newsModel->errors());
            }

            return redirect()->to('/news/index');;
        }

        return $this->response->setJSON($this->newsModel->errors());
    }

    public function readnews(): string
    {
        $data = [
            'title' => 'News | '
        ];

        return view('users/readnews', $data);
    }
}
