<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | '
        ];

        return view('users/home', $data);
        // return view('layout/master_layout', $data);
    }
}
