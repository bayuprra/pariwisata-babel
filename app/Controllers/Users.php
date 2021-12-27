<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Validation\Validation;
use Config\Services;
use ReflectionException;

class Users extends BaseController
{
    /** @var UserModel */
    private $userModel;

    /** @var Validation */
    private $validation;

    /**
     * Users constructor.
     */
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->validation = Services::validation();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Home | '
        ];

        return view('users/home1', $data);
        // return view('layout/master_layout', $data);
    }

    public function signUp(): string
    {
        return view('layout/login');
    }

    public function editUser(): string
    {
        return view('users/edit_user');
    }

    /**
     * @throws ReflectionException
     */
    public function store(): RedirectResponse
    {
        $data = [
            'name'            => $this->request->getVar('name'),
            'email_address'   => $this->request->getVar('email_address'),
            'password'        => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];

        $this->validation->setRules([
            'confirmPassword'   => 'matches[password]'
        ]);

        if ($this->validation->withRequest($this->request)->run()){
            if ($this->userModel->save($data)) {
                return redirect()->to('/login')->with('success', 'User created successfully');
            }

            return redirect()->back()->with('errors', $this->validation->getErrors());
        }

        return redirect()->back()->with('errors', $this->userModel->errors());
    }
}
