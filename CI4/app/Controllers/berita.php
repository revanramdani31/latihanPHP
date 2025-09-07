<?php

namespace App\Controllers;

class Berita extends BaseController
{
    public function index(): string
    {
        $data= [
            'title'=> 'Berita',
            'content'=> 'template/berita'
        ];
        return view('template/template',$data);
    }
}