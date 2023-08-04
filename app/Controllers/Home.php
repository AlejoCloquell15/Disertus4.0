<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('pagina_principal');
    }

    public function nosotros(){
        return view('nosotros');
    }
    public function Como_funciona(){
        return view('Como_funciona');
    }

    public function menu(){
        return view('menu');
    }

    
}
