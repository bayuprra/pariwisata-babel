<?php

namespace App\Controllers;

class Event extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Event | '
        ];

        return view('users/event', $data);
        // return view('layout/master_layout', $data);
    }
}
