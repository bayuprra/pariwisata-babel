<?php

namespace App\Controllers;

use App\Helpers\ImageManager;
use App\Models\GuideModel;
use CodeIgniter\Exceptions\ModelException;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

class Guide extends BaseController
{

    /** @var GuideModel */
    private $guideModel;

    /** @var ImageManager */
    private $imageManager;


    public function __construct()
    {
        $this->guideModel = new GuideModel();
        $this->imageManager = new ImageManager();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Guide | ',
            'guide' => $this->guideModel->findAll()
        ];

        return view('users/partner1', $data);
    }

    public function admin(): string
    {
        $data = [
            'title' => 'Guide | ',
            'guide' => $this->guideModel->findAll()
        ];

        return view('admin/data_guides', $data);
    }

    public function create(): string
    {
        return view('users/guidesform');
    }

    /**
     * @throws ReflectionException
     */
    public function store(): RedirectResponse
    {

        // get user id 

        $data = [
            'name' => $this->request->getVar('name'),
            'phone' => $this->request->getVar('phone'),
            'experience' => $this->request->getVar('experience'),
            'study' => $this->request->getVar('study'),
            'gender' => $this->request->getVar('gender'),
            'religion' => $this->request->getVar('religion'),
            'address' => $this->request->getVar('address'),
            'age' => $this->request->getVar('age'),
            'email' => $this->request->getVar('email'),
            'facebook' => $this->request->getVar('facebook'),
            'instagram' => $this->request->getVar('instagram'),
            'twitter' => $this->request->getVar('twitter'),
        ];

        $this->imageManager->guideImageProcessor($this->request->getFile('identity_picture'), $data);
        $this->imageManager->guideImageProcessor($this->request->getFile('video'), $data);

        if ($this->guideModel->save($data)) {
            $guideId = $this->guideModel->getInsertID();

            if (!$guideId) {
                throw ModelException::forNoPrimaryKey(GuideModel::class);
            }

            return redirect()->to('/guide/index')->withInput()->with('success', 'Event has been saved.');
        }
        return redirect()->to('/formguides/index')->withInput()->with('errors', $this->eventModel->errors());
    }
}
