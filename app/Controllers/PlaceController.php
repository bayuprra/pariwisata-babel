<?php

namespace App\Controllers;

use App\Helpers\ImageManager;
use App\Models\PlaceModel;
use CodeIgniter\Exceptions\ModelException;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Validation\Validation;
use Config\Services;
use ReflectionException;

class PlaceController extends BaseController
{
    /** @var PlaceModel */
    private $placeModel;

    /** @var ImageManager */
    private $imageManager;
    /**
     * @var Validation
     */
    private $validation;

    /**
     * PlaceController constructor.
     */
    public function __construct()
    {
        $this->placeModel = new PlaceModel();
        $this->imageManager = new ImageManager();
        $this->validation = Services::validation();
    }

    public function index(): string
    {
        $data = [
            'title'  => 'Place | All',
            'places' => $this->placeModel->findAll()
        ];

        return view('admin/data_places', $data);
    }

    public function create(): string
    {
        return view('admin/create_places');
    }

    /**
     * @throws ReflectionException
     */
    public function store(): RedirectResponse
    {
        $data = [
            'name'          => $this->request->getVar('name'),
            'district'      => $this->request->getVar('district'),
            'sub_district'  => $this->request->getVar('sub_district'),
            'village'       => $this->request->getVar('village'),
            'fee'           => $this->request->getVar('fee'),
            'street'        => $this->request->getVar('street'),
            'maps'          => $this->request->getVar('maps'),
            'user_id'       => session()->get('id')
        ];

        $this->validation->setRules([
            'picture' => 'uploaded[picture]|mime_in[picture,image/png,image/jpg]'
        ]);

        if ($this->validation->withRequest($this->request)->run()) {

            $data['picture'] = $this->imageManager->imageProcessor($this->request->getFile('picture'), 'place');

            if ($this->placeModel->save($data)) {

                return redirect()->to('/')->withInput()->with('success', 'Place has been added and will be reviewed by admin.');
            }

            return redirect()->back()->withInput()->with('errors', $this->placeModel->errors());
        }

        return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
    }
}
