<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data= [
            'title'=> 'Home',
            'content'=> 'template/home'
        ];
        return view('template/template',$data);
    }
}
