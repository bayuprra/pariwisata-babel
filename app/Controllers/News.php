<?php

namespace App\Controllers;

use App\Helpers\ImageManager;
use App\Models\NewsImageModel;
use App\Models\NewsModel;
use CodeIgniter\Exceptions\ModelException;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\I18n\Time;
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

    public function index(): string
    {
        $data = [
            'title'     => 'News | All',
            'news'      => $this->newsModel->where('category', 'general')->orderBy('updated_at', 'desc')->paginate(5, 'news'),
            'pager'     => $this->newsModel->pager,
            'headlines' => $this->newsModel->where('category', 'headline')->orderBy('id', 'desc')->first()
        ];

        return view('users/news', $data);
    }

    public function show(int $id): string
    {
        $news = $this->newsModel->find($id);
        $lastThirtyDays = Time::now()->subMonths(1);

        $data = [
            'title'     => 'News | Show',
            'news'      => $news,
            'recent'    => $this->newsModel->where('category', 'general')->where('created_at >=', $lastThirtyDays)->orderBy('created_at', 'desc')->findAll(3)
        ];

        return view('users/readnews', $data);
    }

    public function create(): string
    {
        return view('admin/create_news');
    }

    public function edit(int $id): string
    {
        $data['news'] = $this->newsModel->find($id);

        return view('admin/edit_news', $data);
    }

    public function admin(): string
    {
        $currentPage = $this->request->getVar('page_news') ? $this->request->getVar('page_news') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $news = $this->newsModel->search($keyword);
        } else {
            $news = $this->newsModel;
        }

        $data = [
            'title' => 'News | Admin Index',
            'news' => $news->paginate(5, 'news'),
            'pager' => $this->newsModel->pager,
            'currentPage' => $currentPage
        ];

        return view('admin/data_news', $data);
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
            'image'     => $this->request->getFile('image')
        ];

        if ($this->newsModel->save($data)) {
            $newsId = $this->newsModel->getInsertID();

            if (!$newsId) {
                throw ModelException::forNoPrimaryKey(NewsModel::class);
            }

            if (!$this->imageManager->newsImageProcessor($data['image'], $newsId)) {
                return redirect()->to('/news/create')->withInput()->with('error', 'failed processing the image');
            }

            return redirect()->to('/news/index')->withInput()->with('success', 'News has been saved.');
        }

        return redirect()->to('/news/create')->withInput()->with('errors', $this->newsModel->errors());
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
            throw ModelException::forNoPrimaryKey(NewsModel::class);
        }

        $data = [
            'title'     => $this->request->getVar('title'),
            'category'  => $this->request->getVar('category'),
            'content'   => $this->request->getVar('content'),
            'image'     => $this->request->getFile('image')
        ];

        if ($this->newsModel->update($id, $data)) {
            if (file_exists($data['image'])) {
                if (!$this->imageManager->newsImageProcessor($data['image'], $id, true)) {
                    return redirect()->back()->withInput()->with('error', 'failed processing the image');
                }
            }

            return redirect()->to('/admin/news');
        }

        return redirect()->back()->withInput()->with('errors', $this->newsModel->errors());
    }

    public function destroy(int $id): RedirectResponse
    {
        $news = $this->newsModel->find($id);

        if (!$news) {
            throw ModelException::forNoPrimaryKey(NewsModel::class);
        }

        $newsImages = $this->newsImages->where(['news_id' => $id])->first();

        if ($newsImages) {
            $this->imageManager->delete($newsImages);
            $this->newsImages->delete($newsImages->id);
        }

        $this->newsModel->delete($news->id);

        return redirect()->to('/admin/news');
    }
}
