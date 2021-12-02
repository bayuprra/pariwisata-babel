<?php

namespace App\Controllers;

class Partner2 extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Partner2 | '
        ];

        return view('users/news2', $data);
        // return view('layout/master_layout', $data);
    }
}
