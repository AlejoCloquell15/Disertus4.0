<?php

namespace App\Controllers;
use App\Models\nodemcu_modelo;

class Recibir_nodemcu extends BaseController{
    public function recibir_datos(){
        $idNodemcu = $this->request->getPost('dato1');

        $nodemcu_modelo = new nodemcu_modelo();
        $resultado = $nodemcu_modelo->selectDatos($idNodemcu);
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
}
?>