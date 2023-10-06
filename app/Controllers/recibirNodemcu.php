<?php

namespace App\Controllers;

use App\Models\nodemcuModelo;
use App\Models\caudalModelo;
use App\Models\datoModelo;

class RecibirNodemcu extends BaseController
{
    public function recibirDatos()
    {
        $idNodemcu = $this->request->getVar('dato1');

        $nodemcuModelo = new nodemcuModelo();
        $resultado = $nodemcuModelo->selectDatos($idNodemcu);

        $response = [
            'tiempoDucha' => $resultado['TiempoDucha'],
            'tiempoEspera' => $resultado['TiempoEspera'],
            'tiempoTolerancia' => $resultado['TiempoTolerancia'],
        ];
        // Procesa los datos o realiza cualquier otra acción que necesites
        // Devolver una respuesta al Arduino como JSON

        return $this->response->setJSON($response);
    }

    public function recibirCaudal()
    {
        $caudal = $this->request->getPost('dato1');
        $MAC = $this->request->getVar('dato2');

        $datos = [
            'Caudal' => $caudal,
            'IdNodemcu' => $MAC,
        ];

        echo var_dump($datos);
        $caudalModelo = new caudalModelo();
        $caudalModelo->insertarCaudal($datos);
    }

    public function recibirCaudalimetro()
    {
        $caudal = $this->request->getVar('dato1');
        $mac = $this->request->getVar('dato2');

        //$mac = "asbbdcs";
        //$caudal = "csdc";

        $datos = [
            'Caudal' => $caudal,
            'IdNodemcu' => $mac,
        ];

        $caudalModelo = new caudalModelo();
        $caudalModelo->insertarCaudal($datos);

        return $this->response->setJSON($caudal);
        //echo $caudal;
        //echo $mac;
    }
}

?>