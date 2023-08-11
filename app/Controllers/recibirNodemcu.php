<?php

namespace App\Controllers;
use App\Models\nodemcuModelo;

class RecibirNodemcu extends BaseController{
    public function recibir_datos(){
        $idNodemcu = $this->request->getPost('dato1');

        $nodemcuModelo = new nodemcuModelo();
        $resultado = $nodemcuModelo->selectDatos($idNodemcu);
        //var_dump($resultado);
         $response = [
            'tiempoDucha' => $resultado['TiempoDucha'],
            'tiempoEspera' => $resultado['TiempoEspera'],
            'tiempoTolerancia' => $resultado['TiempoTolerancia'],
        ];
        // Procesa los datos o realiza cualquier otra acción que necesites
        // Devolver una respuesta al Arduino como JSON

        return $this->response->setJSON($response);
    }

    public function recibirDatosPrueba(){
        $dato1 = $this->request->getPost('dato1');
        $dato2 = $this->request->getPost('dato2');


        return $this->response->setJSON($dato1);
    }
}
?>