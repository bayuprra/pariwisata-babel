<?php

namespace App\Controllers;

class tesadmin extends BaseController
{
    public function index()
    {
        // return view('admin/create_news');
        // return view('layout/master_layout', $data);
    }

    public function createnews()
    {
        return view('admin/create_news');
        // return view('layout/master_layout', $data);
    }

    public function createplace()
    {
        return view('admin/create_places');
    }

    public function dataplace()
    {
        return view('admin/data_places');
    }

    public function editplace()
    {
        return view('admin/edit_places');
    }

    public function datanews()
    {
        return view('admin/data_news');
    }

    public function editnews()
    {
        return view('admin/edit_news');
    }
}
