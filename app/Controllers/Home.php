<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('paginaPrincipal');
    }

    public function nosotros(){
        return view('nosotros');
    }
    public function comoFunciona(){
        return view('ComoFunciona');
    }

    public function menu(){
        return view('menu');
    }

    
}
