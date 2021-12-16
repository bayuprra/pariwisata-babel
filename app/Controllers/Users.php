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


    public function edituser()
    {
        return view('users/edit_user');
    }
}
