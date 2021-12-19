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
            $newsImages = $this->newsImages->where(['news_id' => $value->id])->first();
            $value->news_images = $newsImages;
        }

        return $news;
    }

    public function index(): string
    {
        $data = [
            'title' => 'News | All',
            'news'  => $this->getNewsData()
        ];

        return view('users/news', $data);
    }

    public function show(int $id): string
    {
        $news = $this->newsModel->find($id);
        $news->news_images = $this->newsImages->where(['news_id' => $id])->first();

        $data = [
            'title' => 'News | Show',
            'news'  => $news
        ];

        return view('users/readnews', $data);
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
                throw ModelException::forNoPrimaryKey('NewsModel');
            }

            if (!$this->imageManager->newsImageProcessor($data['image'], $newsId)) {
                return redirect()->back()->withInput()->with('error', $this->newsModel->errors());
            }

            return redirect()->to('/news/index');
        }

        return redirect()->back()->withInput()->with('error', $this->newsModel->errors());
    }

    /**
     * @param int $id
     *
     * @return RedirectResponse
     * @throws ReflectionException
     */
    public function update(int $id): RedirectResponse
    {
        $news = $this->newsModel->find($id);

        if (!$news) {
            throw ModelException::forNoPrimaryKey('NewsModel');
        }

        $data = [
            'title'     => $this->request->getVar('title'),
            'category'  => $this->request->getVar('category'),
            'content'   => $this->request->getVar('content'),
            'preview'   => $this->request->getVar('preview'),
            'image'     => $this->request->getFile('image')
        ];

        if($this->newsModel->update($id, $data)) {
            if (!$this->imageManager->newsImageProcessor($data['image'], $id, true)) {
                return redirect()->back()->withInput()->with('error', $this->newsModel->errors());
            }

            return redirect()->to('/news/index');
        }

        return redirect()->back()->withInput()->with('error', $this->newsModel->errors());
    }

    public function destroy(int $id): RedirectResponse
    {
        $news = $this->newsModel->find($id);

        if (!$news) {
            throw ModelException::forNoPrimaryKey('NewsModel');
        }

        $newsImages = $this->newsImages->where(['news_id' => $id])->first();

        if ($newsImages) {
            $this->imageManager->delete($newsImages);
            $this->newsImages->delete($newsImages->id);
        }

        $this->newsModel->delete($news->id);

        return redirect()->to('/news/index');
    }
}
