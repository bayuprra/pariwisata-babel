<?php

namespace App\Controllers;

use App\Helpers\ImageManager;
use App\Models\PlaceModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Validation\Validation;
use Config\Services;
use CodeIgniter\Exceptions\ModelException;
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

        return view('users/index', $data);
    }

    public function admin(): string
    {
        $currentPage = $this->request->getVar('page_place') ? $this->request->getVar('page_place') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $place = $this->placeModel->search($keyword);
        } else {
            $place = $this->placeModel;
        }

        $data = [
            'title' => 'Place | Admin',
            'places' => $place->paginate(5, 'places'),
            'pager' => $this->placeModel->pager,
            'currentPage' => $currentPage
        ];


        return view('admin/data_places', $data);
    }

    public function edit(int $id): string
    {
        $data['places'] = $this->placeModel->find($id);

        return view('admin/edit_places', $data);
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

    public function destroy(int $id): RedirectResponse
    {
        $place = $this->placeModel->find($id);

        if (!$place) {
            throw ModelException::forNoPrimaryKey(PlaceModel::class);
        }

        unlink('image/' . $place->picture);
        $this->placeModel->delete($place->id);

        return redirect()->to('/admin/place ');
    }

    public function update(int $id): RedirectResponse
    {
        $place = $this->placeModel->find($id);

        if (!$place) {
            throw ModelException::forNoPrimaryKey(PlaceModel::class);
        }

        $data = [
            'id'            => $id,
            'name'          => $this->request->getVar('name'),
            'district'      => $this->request->getVar('district'),
            'sub_district'  => $this->request->getVar('sub_district'),
            'village'       => $this->request->getVar('village'),
            'fee'           => $this->request->getVar('fee'),
            'street'        => $this->request->getVar('street'),
            'maps'          => $this->request->getVar('maps'),
        ];

        if (file_exists($this->request->getFile('picture'))) {
            $data['picture'] = $this->imageManager->imageProcessor($this->request->getFile('picture'), 'place');
        } else {
            $data['picture'] = $place->picture;
        }

        if ($this->placeModel->update($id, $data)) {
            return redirect()->to('/admin/place')->withInput()->with('success', 'Place has been saved.');
        }

        return redirect()->back()->withInput()->with('errors', $this->placeModel->errors());
    }
}
