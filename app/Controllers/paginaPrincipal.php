<?php

namespace App\Controllers;

use App\Models\loginModelo;
use App\Models\sessionModelo;

class Pagina_principal extends BaseController
{
    public function cargar_pp()
    {
        $token = session('token');
        if ($token) {
            $conexion = new sessionModelo;
            $fechaExpiracion = $conexion->fechaExpiracion($token);

            $fechaActual = date('Y-m-d H:i:s');

            if (strtotime($fechaExpiracion['Expiracion']) == strtotime($fechaActual)) {
                return redirect()->route('cerrarSession');
            } elseif (strtotime($fechaExpiracion['Expiracion']) < strtotime($fechaActual)) {
                return redirect()->route('cerrarSession');
            } else {
                return view('spPaginaPrincipal');
            }
        } else {
            return view('spLogin');
        }
    }
}