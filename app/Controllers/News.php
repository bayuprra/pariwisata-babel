<?php

namespace App\Controllers;

use App\Helpers\ImageManager;
use App\Models\NewsImageModel;
use App\Models\NewsModel;
use CodeIgniter\Exceptions\ModelException;
use CodeIgniter\HTTP\RedirectResponse;
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

    public function getNewsData(): array
    {
        $news = $this->newsModel->findAll();

        foreach ($news as $key => $value) {
            $newsImages = $this->newsImages->where(['news_id' => $value->id])->findAll();
            $value->news_images = $newsImages;
        }

        return $news;
    }

    public function index(): string
    {
        $data = [
            'title' => 'News | ',
            'news'  => $this->getNewsData()
        ];

        return view('users/news', $data);
    }

    public function create(): string
    {
        return view('admin/create_news');
    }

    /**
     * @throws ReflectionException
     */
    public function store(): RedirectResponse
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
                return redirect()->back()->withInput()->with('error', $this->newsModel->errors());
            }

            return redirect()->to('/news/index');
        }

        return redirect()->back()->withInput()->with('error', $this->newsModel->errors());
    }

    public function readnews(): string
    {
        $data = [
            'title' => 'News | '
        ];

        return view('users/readnews', $data);
    }
}
