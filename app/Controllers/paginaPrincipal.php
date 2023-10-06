<?php

namespace App\Controllers;

class Pagina_principal extends BaseController
{
    public function cargar_pp()
    {
        $utils = new Utils();
        $utils->token();

        return view('spPaginaPrincipal');
    }
}