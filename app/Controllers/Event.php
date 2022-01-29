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
        $currentPage = $this->request->getVar('page_event') ? $this->request->getVar('page_event') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $event = $this->eventModel->search($keyword);
        } else {
            $event = $this->eventModel;
        }

        $data = [
            'title' => 'Event | Event Index',
            'event' => $event->paginate(5, 'event'),
            'pager' => $this->eventModel->pager,
            'currentPage' => $currentPage
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

        $data['picture'] = $this->imageManager->imageProcessor($this->request->getFile('picture'), 'event');

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
            'id'             => $id,
            'name'           => $this->request->getVar('name'),
            'district'       => $this->request->getVar('district'),
            'sub_district'   => $this->request->getVar('sub_district'),
            'village'        => $this->request->getVar('village'),
            'date'           => $this->request->getVar('date'),
            'content'        => $this->request->getVar('content')
        ];

        if (file_exists($this->request->getFile('picture'))) {
            $this->imageManager->delete($event->picture);
            $data['picture'] = $this->imageManager->imageProcessor($this->request->getFile('picture'), 'event');
        } else {
            $data['picture'] = strstr($event->picture, 'event');
        }

        if ($this->eventModel->update($id, $data)) {
            return redirect()->to('/admin/event')->withInput()->with('success', 'Event has been saved.');
        }

        return redirect()->back()->withInput()->with('errors', $this->eventModel->errors());
    }

    public function destroy(int $id): RedirectResponse
    {
        $event = $this->eventModel->find($id);

        if (!$event) {
            throw ModelException::forNoPrimaryKey(EventModel::class);
        }

        $this->imageManager->delete($event->picture);
        $this->eventModel->delete($event->id);

        return redirect()->to('/admin/event ');
    }
}
