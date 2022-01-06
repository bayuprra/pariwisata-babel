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
            'guide' => $this->guideModel->where('is_approve', 1)->findAll()
        ];

        return view('users/partner1', $data);
    }

    public function admin(): string
    {
        $currentPage = $this->request->getVar('page_guide') ? $this->request->getVar('page_guide') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $guide = $this->guideModel->search($keyword)->where('is_approve', 0);
        } else {
            $guide = $this->guideModel->where('is_approve', 0);
        }
        $data = [
            'title' => 'Guide | ',
            'guide' => $guide->paginate(5, 'guide'),
            'pager' => $this->guideModel->pager,
            'currentPage' => $currentPage
        ];

        return view('admin/data_guides', $data);
    }

    public function adminv(): string
    {
        $currentPage = $this->request->getVar('page_vguide') ? $this->request->getVar('page_vguide') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $guide = $this->guideModel->search($keyword)->where('is_approve', 1);
        } else {
            $guide = $this->guideModel->where('is_approve', 1);
        }
        $data = [
            'title' => 'Guide | ',
            'guide' => $guide->paginate(5, 'guide'),
            'pager' => $this->guideModel->pager,
            'currentPage' => $currentPage
        ];

        return view('admin/data_guides_verified', $data);
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
        $data = [
            'name'        => $this->request->getVar('name'),
            'phone'       => $this->request->getVar('phone'),
            'experience'  => $this->request->getVar('experience'),
            'study'       => $this->request->getVar('study'),
            'gender'      => $this->request->getVar('gender'),
            'religion'    => $this->request->getVar('religion'),
            'address'     => $this->request->getVar('address'),
            'age'         => $this->request->getVar('age'),
            'email'       => $this->request->getVar('email'),
            'facebook'    => $this->request->getVar('facebook'),
            'instagram'   => $this->request->getVar('instagram'),
            'twitter'     => $this->request->getVar('twitter'),
            'user_id'     => session()->get('id')
        ];

        $this->validation->setRules([
            'identity_picture'  => 'uploaded[identity_picture]|mime_in[identity_picture,image/png,image/jpg,image/jpeg]',
            'video'             => 'uploaded[video]|mime_in[video,video/mk4,video/3gp,video/mp4,video/quicktime]'
        ]);

        if ($this->validation->withRequest($this->request)->run()) {

            $data['identity_picture'] = $this->imageManager->imageProcessor($this->request->getFile('identity_picture'), 'guide');
            $data['video'] = $this->imageManager->imageProcessor($this->request->getFile('video'), 'guide');

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

    public function approve($id)
    {
        $data = [
            'is_approve' => 1,
        ];
        $this->guideModel->update($id, $data);
        return redirect()->to('/admin/vguide')->with('success', 'Data  Guide has been saved.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $guide = $this->guideModel->find($id);

        if (!$guide) {
            throw ModelException::forNoPrimaryKey(GuideModel::class);
        }

        unlink(strstr($guide->identity_picture, 'image'));
        unlink(strstr($guide->video, 'image'));

        $this->guideModel->delete($guide->id);



        return redirect()->to('/admin/guide ');
    }
}
