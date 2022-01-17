<?php

namespace App\Controllers;

class FormforUser extends BaseController
{
    public function guide()
    {
        $data = [
            'title' => 'Pendaftaran Guide | '
        ];

        return view('users/guidesform', $data);
    }

    public function place()
    {
        $data = [
            'title' => 'Tambahkan Data | '
        ];

        return view('users/addplaces', $data);
    }
}
