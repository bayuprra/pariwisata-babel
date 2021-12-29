<?php

namespace App\Controllers;

use App\Helpers\ImageManager;
use App\Models\GuideModel;
use CodeIgniter\Exceptions\ModelException;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Validation\Validation;
use Config\Services;
use ReflectionException;

class Guide extends BaseController
{

    /** @var GuideModel */
    private $guideModel;

    /** @var ImageManager */
    private $imageManager;

    /** @var Validation */
    private $validation;

    public function __construct()
    {
        $this->guideModel = new GuideModel();
        $this->imageManager = new ImageManager();
        $this->validation = Services::validation();
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
    public function store() //: RedirectResponse
    {
        $data = [
            'name'              => $this->request->getVar('name'),
            'phone'             => $this->request->getVar('phone'),
            'experience'        => $this->request->getVar('experience'),
            'study'             => $this->request->getVar('study'),
            'gender'            => $this->request->getVar('gender'),
            'religion'          => $this->request->getVar('religion'),
            'address'           => $this->request->getVar('address'),
            'age'               => $this->request->getVar('age'),
            'email'             => $this->request->getVar('email'),
            'facebook'          => $this->request->getVar('facebook'),
            'instagram'         => $this->request->getVar('instagram'),
            'twitter'           => $this->request->getVar('twitter'),
            'user_id'           => session()->get('id')
        ];

        $this->validation->setRules([
            'identity_picture'  => 'uploaded[identity_picture]|mime_in[identity_picture,image/png,image/jpg,image/jpeg]',
            'video'             => 'uploaded[video]|mime_in[video,video/mk4,video/3gp,video/mp4,video/quicktime]'
        ]);

        if ($this->validation->withRequest($this->request)->run()) {

            $data['identity_picture'] = $this->imageManager->guideImageProcessor($this->request->getFile('identity_picture'));
            $data['video'] = $this->imageManager->guideImageProcessor($this->request->getFile('video'));

            if ($this->guideModel->save($data)) {
                $guideId = $this->guideModel->getInsertID();

                if (!$guideId) {
                    throw ModelException::forNoPrimaryKey(GuideModel::class);
                }

                return redirect()->to('/guide/index')->with('success', 'Guide has been saved.');
            }

            return redirect()->back()->withInput()->with('errors', $this->guideModel->errors());
        }

        return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
    }
}
