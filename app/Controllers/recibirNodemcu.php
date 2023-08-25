<?php

namespace App\Controllers;
use App\Models\nodemcuModelo;
use App\Models\caudalModelo;
use App\Models\datoModelo;

class RecibirNodemcu extends BaseController{
    public function recibirDatos(){
        $idNodemcu = $this->request->getPost('dato1');

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
        //return $this->response->setJSON(['message' => '¡Solicitud recibida correctamente!']);
    }

    public function recibirDatosPrueba(){
        $dato1 = $this->request->getPost('dato1');
        $dato2 = $this->request->getPost('dato2');


        return $this->response->setJSON($dato1);
    }

    public function recibirCaudal(){
        $caudal = $this->request->getPost('dato1');
        $MAC = $this->request->getPost('dato2');

        $datos = [
            'Caudal' -> $caudal,
            'IdNodemcu' -> $MAC,
        ];

        $caudalModelo = new caudalModelo();
        $caudalModelo->insertarCaudal($datos);
    }

    public function recibirCaudalimetro(){
        $caudal = $this->request->getVar('dato1');
        
        

        $datos = [
            'Caudal' => $caudal,
        ];

        $caudalModelo = new caudalModelo();
        $caudalModelo->insertarCaudal($datos);

        return $this->response->setJSON($caudal);
        echo var_dump($caudal);
    }

    /*public function recibirDatosPrueba(){

        $dato = $this->request->getPost('dato1');
    
        $hola = "hola";
        $modelo = new datoModelo;
    
        $mensaje = [
            "Dato" => $modelo->registrarDato($hola),
        ];
        
    }*/
    }

?>