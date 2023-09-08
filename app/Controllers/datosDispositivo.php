<?php

namespace App\Controllers;

use App\Models\nodemcuModelo;
use App\Models\sessionModelo;

class DatosDispositivo extends BaseController
{
    public function cargarNodemcu()
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
                $idUser = session('idUser');
                $nodemcuModelo = new nodemcuModelo();

                $placas['resultado'] = $nodemcuModelo->selectPlacas($idUser);
                $placas['vista'] = view('spHeader');
                $placas['idUser'] = $idUser;
                return view('spElegirNodemcu', $placas);
            }
        } else {
            return view('spLogin');
        }
    }

    public function datosDispositivo()
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

                //var_dump($datos);
                $nodemcuModelo = new nodemcuModelo();
                $vista['resultado'] = $nodemcuModelo->agregarDatos($datos);
                $vista['idNodemcu'] = $idNodemcu;
                $vista['vista'] = view('spHeader');

                return view('spConfiguracion', $vista);
            }
        } else {
            return view('spLogin');
        }
    }

    public function cargarSpConf()
    {
        $idNodemcu['idNodemcu'] = $this->request->getPost('idUser');

        $nodemcuModelo = new nodemcuModelo();
        $idNodemcu['resultado'] = $nodemcuModelo->selectDatos($idNodemcu['idNodemcu']);

        $idNodemcu['vista'] = view('spHeader');
        return view('spConfiguracion', $idNodemcu);
    }
}