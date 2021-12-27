<?php

namespace App\Controllers;

use App\Helpers\ImageManager;
use App\Models\EventModel;
use CodeIgniter\Exceptions\ModelException;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;





class Event extends BaseController
{
    /** @var EventModel */
    private $eventModel;

    /** @var ImageManager */
    private $imageManager;


    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->imageManager = new ImageManager();
    }



    public function index(): string
    {
        $data = [
            'title' => 'Event | ',
            'event' => $this->eventModel->findAll()
        ];

        return view('users/event', $data);
    }



    public function create(): string
    {
        return view('admin/create_events');
    }

    public function edit(int $id): string
    {
        $data['event'] = $this->eventModel->find($id);

        return view('admin/edit_events', $data);
    }

    public function admin(): string
    {
        $data = [
            'title' => 'Event | Event Index',
            'event'  => $this->eventModel->findAll()
        ];

        return view('admin/data_events', $data);
    }



    /**
     * @throws ReflectionException
     */
    public function store(): RedirectResponse
    {
        $data = [
            'name'           => $this->request->getVar('name'),
            'district'       => $this->request->getVar('district'),
            'sub_district'   => $this->request->getVar('sub_district'),
            'village'        => $this->request->getVar('village'),
            'date'           => $this->request->getVar('date'),
            'content'        => $this->request->getVar('content')
        ];

        $this->imageManager->eventImageProcessor($this->request->getFile('picture'), $data);

        if ($this->eventModel->save($data)) {
            $eventId = $this->eventModel->getInsertID();

            if (!$eventId) {
                throw ModelException::forNoPrimaryKey(EventModel::class);
            }

            return redirect()->to('/event/index')->withInput()->with('success', 'Event has been saved.');
        }

        return redirect()->to('/event/create')->withInput()->with('errors', $this->eventModel->errors());
    }


    /**
     * @param int $id
     *
     * @return RedirectResponse
     * @throws ReflectionException
     */
    public function update(int $id): RedirectResponse
    {
        $event = $this->eventModel->find($id);

        if (!$event) {
            throw ModelException::forNoPrimaryKey(EventModel::class);
        }

        $data = [
            'name'           => $this->request->getVar('name'),
            'district'       => $this->request->getVar('district'),
            'sub_district'   => $this->request->getVar('sub_district'),
            'village'        => $this->request->getVar('village'),
            'date'           => $this->request->getVar('date'),
            'content'        => $this->request->getVar('content')
        ];

        if ($this->eventModel->update($id, $data)) {
            // if (file_exists($data['picture'])) {
            //     if (!$this->imageManager->eventImageProcessor($data['image'], $id, true)) {
            //         return redirect()->back()->withInput()->with('errors', $this->eventModel->errors());
            //     }
            // }
            return redirect()->to('/event/index');
        }

        return redirect()->back()->withInput()->with('error', $this->eventModel->errors());
    }

    // public function destroy(int $id): RedirectResponse
    // {
    //     $event = $this->eventModel->find($id);

    //     if (!$event) {
    //         throw ModelException::forNoPrimaryKey(EventModel::class);
    //     }

    //     $newsImages = $this->newsImages->where(['news_id' => $id])->first();

    //     if ($newsImages) {
    //         $this->imageManager->delete($newsImages);
    //         $this->newsImages->delete($newsImages->id);
    //     }

    //     $this->newsModel->delete($news->id);

    //     return redirect()->to('/news/index');
    // }
}
