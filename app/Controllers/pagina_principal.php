<?php

namespace App\Controllers;
use App\Models\login_modelo;
use App\Models\session_modelo;

class Pagina_principal extends BaseController{
    public function cargar_pp(){
        $token = session('token');
        if($token){
            $conexion = new session_modelo;
            $fecha_expiracion = $conexion->fecha_expiracion($token);
            
            $fecha_actual = date('Y-m-d H:i:s');

                if(strtotime($fecha_expiracion['Expiracion']) == strtotime($fecha_actual)){
                    return redirect()->route('cerrar_session');
                }elseif(strtotime($fecha_expiracion['Expiracion']) < strtotime($fecha_actual)){
                    return redirect()->route('cerrar_session');
                }
                else{
                    return view('sp_pagina_principal');
                }     
        }else{
            return view('sp_login');
        }
    }
}