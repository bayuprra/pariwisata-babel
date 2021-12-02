<?php

namespace App\Controllers;

class Partner extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Partner | '
        ];

        return view('users/partner1', $data);
        // return view('layout/master_layout', $data);
    }
}
