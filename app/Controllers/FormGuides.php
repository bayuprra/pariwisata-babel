<?php

namespace App\Controllers;

class FormGuides extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Pendaftaran Guide | '
        ];

        return view('users/guidesform', $data);
    }
}
