<?php
namespace App\Controllers;

use App\Models\caudalModelo;
use App\Models\NodemcuModelo;

class Estadisticas extends BaseController
{
    public function cargarEst()
    {
        $utils = new Utils();
        $utils->token();

        $idUser = session('idUser');
        $nodemcuModelo = new nodemcuModelo();

        $placas['resultado'] = $nodemcuModelo->selectPlacas($idUser);
        $placas['vista'] = view('spHeader');
        $placas['idUser'] = $idUser;

        return view('spEstadisticas', $placas);
    }

    public function cargarSpEst()
    {
        $utils = new Utils();
        $utils->token();

        $idNodemcu = $this->request->getPost('idUser');
        $modeloCaudal = new caudalModelo();

        $idUser = session('idUser');

        $datos = [
            'IdNodemcu' => $idNodemcu,
            'IdUsuario' => $idUser,
        ];

        $variable['consulta'] = $modeloCaudal->caudal($datos);

        $variable['idNodemcu'] = $this->request->getPost('idUser');

        $variable['vista'] = view('spHeader');
        return view('spDatosEst', $variable);
    }

    public function filtro($idNodemcu)
    {
        $utils = new Utils();
        $utils->token();

        $opcion = $this->request->getPost('opcion');

        switch ($opcion) {
            case 'Total':
                $modeloCaudal = new caudalModelo();

                $idUser = session('idUser');

                $datos = [
                    'IdNodemcu' => $idNodemcu,
                    'IdUsuario' => $idUser,
                ];

                $variable['consulta'] = $modeloCaudal->caudal($datos);

                $variable['idNodemcu'] = $idNodemcu;

                $variable['vista'] = view('spHeader');
                return view('spDatosEst', $variable);

            case 'Dia':
                $modeloCaudal = new caudalModelo();

                $idUser = session('idUser');

                $datos = [
                    'IdNodemcu' => $idNodemcu,
                    'IdUsuario' => $idUser,
                ];

                $variable['consulta'] = $modeloCaudal->caudalDia($datos);

                $variable['idNodemcu'] = $idNodemcu;

                $variable['vista'] = view('spHeader');
                return view('spDatosEst', $variable);
            case 'Mes':
                $modeloCaudal = new caudalModelo();

                $idUser = session('idUser');

                $datos = [
                    'IdNodemcu' => $idNodemcu,
                    'IdUsuario' => $idUser,
                ];

                $variable['consulta'] = $modeloCaudal->caudalMes($datos);

                $variable['idNodemcu'] = $idNodemcu;

                $variable['vista'] = view('spHeader');
                return view('spDatosEst', $variable);
            case 'Año':
                $modeloCaudal = new caudalModelo();

                $idUser = session('idUser');

                $datos = [
                    'IdNodemcu' => $idNodemcu,
                    'IdUsuario' => $idUser,
                ];

                $variable['consulta'] = $modeloCaudal->caudalAño($datos);

                $variable['idNodemcu'] = $idNodemcu;

                $variable['vista'] = view('spHeader');
                return view('spDatosEst', $variable);
        }
    }

}

?>