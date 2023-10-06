<?php

namespace App\Controllers;

use App\Models\sessionModelo;

class Utils extends BaseController
{
    function token()
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
            }
        } else {
            return view('spLogin');
        }
    }
}