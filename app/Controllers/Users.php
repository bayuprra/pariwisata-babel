<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Database\BaseConnection;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Session\Session;
use CodeIgniter\Validation\Validation;
use Config\Database;
use Config\Services;
use ReflectionException;

class Users extends BaseController
{
    /** @var UserModel */
    private $userModel;

    /** @var Validation */
    private $validation;

    /** @var BaseConnection */
    private $roleUser;

    /** @var Session|mixed|null */
    private $session;

    /**
     * Users constructor.
     */
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->validation = Services::validation();
        $this->roleUser = Database::connect();
        $this->session = session();
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

        if ($this->validation->withRequest($this->request)->run()) {
            if ($this->userModel->save($data)) {

                $role = $this->roleUser->table('role_users')->insert(['user_id' => $this->userModel->getInsertID(), 'role_id' => 3]);
                if ($role) {
                    return redirect()->to('/login')->with('success', 'User created successfully');
                }
            }

            return redirect()->back()->with('errors', $this->userModel->errors());
        }

        return redirect()->back()->with('errors', $this->validation->getErrors());
    }


    public function authenticate(): RedirectResponse
    {
        $email = $this->request->getVar('email_address');
        $password = $this->request->getVar('password');

        $data = $this->userModel->where('email_address', $email)->first();

        if ($data) {
            $isAdmin = count($this->roleUser->table('role_users')->where('user_id', $data->id)->where('role_id', 1)->get()->getResult()) !== 0;
            $authenticatePassword = password_verify($password, $data->password);

            if ($authenticatePassword) {
                $sessionData = [
                    'id'         => $data->id,
                    'name'       => $data->name,
                    'email'      => $data->email_address,
                    'isLoggedIn' => true,
                    'isAdmin'    => $isAdmin
                ];

                $this->session->set($sessionData);
                return redirect()->to('/')->with('success', 'Welcome back ' . $data->name);
            }

            return redirect()->back()->with('error', 'Password is incorrect.');
        }

        return redirect()->back()->with('error', 'Email does not exist.');
    }

    public function logout(): RedirectResponse
    {
        $this->session->destroy();

        return redirect()->back()->with('success', "You have logged out");
    }
}
