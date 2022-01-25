<?php

namespace App\Controllers;

use App\Helpers\ImageManager;
use App\Models\PlaceModel;
use App\Models\PlaceReviewModel;
use App\Models\UserModel;
use App\Models\RoleModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\Header;
use CodeIgniter\Validation\Validation;
use Config\Services;
use CodeIgniter\Exceptions\ModelException;
use ReflectionException;

class PlaceController extends BaseController
{
    /** @var PlaceModel */
    private $placeModel;

    /** @var PlaceReviewModel */
    private $reviewModel;

    /** @var RoleModel */
    private $roleModel;

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
        $this->roleModel = new RoleModel();
        $this->reviewModel = new PlaceReviewModel();
        $this->imageManager = new ImageManager();
        $this->validation = Services::validation();
    }

    public function index(): string
    {
        $data = [
            'title'     => 'Place | All',
            'places'    => $this->placeModel->where('is_approve', 1)->findAll(),
            'recommend' => $this->recommendation()
        ];

        return view('users/home1', $data);
    }

    public function rate(): RedirectResponse
    {
        $userId = session()->get('id');
        if (!$userId) {
            throw ModelException::forNoPrimaryKey(UserModel::class);
        }
        $cekRatingUser = $this->reviewModel->cekUserRating($userId, $this->request->getVar('place_id'));

        if (!$cekRatingUser == null) {
            return redirect()->to('/')->withInput()->with('success', 'Anda Sudah merating tempat ini');
        }

        $data = [
            'comment'   => $this->request->getVar('comment'),
            'rating'    => $this->request->getVar('rating'),
            'place_id'  => $this->request->getVar('place_id'),
            'user_id'   => $userId
        ];

        $this->validation->setRules(['place_id'  => 'required']);

        if ($this->validation->withRequest($this->request)->run()) {
            
            if ($this->reviewModel->save($data)) {
                return redirect()->to('/')->withInput()->with('success', 'Komentar Anda Telah Direkam');
            }

            return redirect()->back()->withInput()->with('errors', $this->reviewModel->errors());
        }

        return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());

    }

    public function admin(): string
    {
        $currentPage = $this->request->getVar('page_place') ? $this->request->getVar('page_place') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $place = $this->placeModel->search($keyword)->where('is_approve', 0);
        } else {
            $place = $this->placeModel->where('is_approve', 0);
        }

        $data = [
            'title'          => 'Place | ',
            'places'         => $place->paginate(5, 'places'),
            'pager'          => $this->placeModel->pager,
            'currentPage'    => $currentPage
        ];


        return view('admin/data_places', $data);
    }

    public function adminv(): string
    {
        $currentPage = $this->request->getVar('page_vplace') ? $this->request->getVar('page_vplace') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $place = $this->placeModel->search($keyword)->where('is_approve', 1);
        } else {
            $place = $this->placeModel->where('is_approve', 1);
        }

        $data = [
            'title'       => 'Place | Admin',
            'places'      => $place->paginate(5, 'places'),
            'pager'       => $this->placeModel->pager,
            'currentPage' => $currentPage
        ];


        return view('admin/data_places_verified', $data);
    }

    public function approve($id): RedirectResponse
    {
        $data = [
            'is_approve' => 1,
        ];

        $this->placeModel->update($id, $data);

        return redirect()->to('/admin/vplace')->with('success', 'Data  Places has been saved.');
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
        $userId = session()->get('id');
        if ($userId == 1) {
            $approve = 1;
        } else {
            $approve = 0;
        }

        $data = [
            'name'          => $this->request->getVar('name'),
            'district'      => $this->request->getVar('district'),
            'sub_district'  => $this->request->getVar('sub_district'),
            'village'       => $this->request->getVar('village'),
            'fee'           => $this->request->getVar('fee'),
            'street'        => $this->request->getVar('street'),
            'maps'          => $this->request->getVar('maps'),
            'user_id'       => $userId,
            'is_approve'    => $approve
        ];

        $this->validation->setRules([
            'picture' => 'uploaded[picture]|mime_in[picture,image/png,image/jpg,image/jpeg]'
        ]);

        if ($this->validation->withRequest($this->request)->run()) {

            $data['picture'] = $this->imageManager->imageProcessor($this->request->getFile('picture'), 'place');

            if ($this->placeModel->save($data)) {
                if ($userId == 1) {
                    return redirect()->to('/admin/vplace')->withInput()->with('success', 'Data Telah Disimpan');
                }
                return redirect()->to('/')->withInput()->with('success', 'Data Telah Dikirimkan ke Admin dan Akan diVerifikasi');
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

        unlink(strstr($place->picture, 'image'));
        $this->placeModel->delete($place->id);

        return redirect()->back()->with('success', 'Data Telah Dihapus');
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

            unlink(strstr($place->picture, 'image'));
            $data['picture'] = $this->imageManager->imageProcessor($this->request->getFile('picture'), 'place');
        } else {
            $data['picture'] = strstr($place->picture, 'place');
        }

        if ($this->placeModel->update($id, $data)) {
            return redirect()->to('/admin/vplace')->withInput()->with('success', 'Place has been saved.');
        }

        return redirect()->back()->withInput()->with('errors', $this->placeModel->errors());
    }

    public function recommendation()
    {
        $places = $this->placeModel->findAll();
        usort($places, function ($item1, $item2) {
            return $item2->score() <=> $item1->score();
        });

        array_splice($places, 3);

        return $places;
    }
}
