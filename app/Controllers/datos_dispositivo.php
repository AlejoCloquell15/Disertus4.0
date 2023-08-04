<?php

namespace App\Controllers;
use App\Models\nodemcu_modelo;
use App\Models\session_modelo;

class Datos_dispositivo extends BaseController{
    public function cargarNodemcu(){
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
                    $idUser = session('idUser');
                    $nodemcuModelo = new nodemcu_modelo();
                    $placas['resultado'] = $nodemcuModelo->selectPlacas($idUser);
                    
                    return view('sp_elegir_nodemcu', $placas);
                }     
        }else{
            return view('sp_login');
        }
    }

    public function datos_dispositivo(){
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
                    $tiempoEspera = $this->request->getPost('tiempoEspera');
                    $tiempoDucha = $this->request->getPost('tiempoDucha');
                    $tiempoTolerancia = $this->request->getPost('tiempoTolerancia');
                    $idNodemcu = $this->request->getPost('idNodemcu');

                    $datos = [
                        'TiempoEspera' => $tiempoEspera,
                        'TiempoDucha' => $tiempoDucha,
                        'TiempoTolerancia' => $tiempoTolerancia,
                        'IdNodemcu' => $idNodemcu,
                    ];

                    var_dump($datos);
                    $nodemcuModelo = new nodemcu_modelo();
                    $nodemcuModelo->agregarDatos($datos);

                    //return view('sp_pagina_principal');
                }     
        }else{
            return view('sp_login');
        }
    }

    public function cargarSpConf(){
        $idNodemcu['idNodemcu'] = $this->request->getPost('idUser');
        return view('sp_configuracion', $idNodemcu);
    }
}

