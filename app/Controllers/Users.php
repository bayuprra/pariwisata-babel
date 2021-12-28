<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | '
        ];

        return view('users/home1', $data);
        // return view('layout/master_layout', $data);
    }

    public function signUp(): string
    {
        return view('layout/login2');
    }

    public function editUser(): string
    {
        return view('users/edit_user');
    }
}
