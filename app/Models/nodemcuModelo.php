<?php
namespace App\Models;

use CodeIgniter\Model;

class NodemcuModelo extends Model
{
    protected $table = 'nodemcu';
    protected $primaryKey = 'IdNodemcu';
    protected $allowedFields = ['IdUsuario'];

    public function compararMac($mac)
    {
        $sql = $this->db->query("SELECT IdNodemcu FROM nodemcu WHERE IdNodemcu = '{$mac['IdNodemcu']}' AND CodigoNodemcu = '{$mac['CodigoNodemcu']}'");
        $resultado = $sql->getRowArray();
        var_dump($resultado);
        if ($resultado == null) {
            $mensaje = false;
            return $mensaje;
        } else {
            $consulta = $this->db->query("UPDATE nodemcu SET IdUsuario = ?, Nombre = ? WHERE IdNodemcu = ?", [$mac['IdUsuario'], $mac['Nombre'], $mac['IdNodemcu']]);
            $mensaje = true;
            return $mensaje;
        }
    }

    public function agregarDatos($datos)
    {
        $consulta = $this->db->query("UPDATE nodemcu SET TiempoDucha = ?, TiempoEspera = ?, TiempoTolerancia = ? WHERE IdNodemcu = ?", [$datos['TiempoDucha'], $datos['TiempoEspera'], $datos['TiempoTolerancia'], $datos['IdNodemcu']]);
        if ($consulta) {
            // La consulta de actualización fue exitosa, ahora obtén los datos actualizados.
            $datosActualizados = $this->db->query("SELECT TiempoDucha, TiempoEspera, TiempoTolerancia FROM nodemcu WHERE IdNodemcu = ?", [$datos['IdNodemcu']])->getRowArray();
            return $datosActualizados;
        } else {
            // Si la consulta de actualización falla, puedes manejar el error aquí.
            return false;
        }
    }
    public function selectPlacas($idUser)
    {
        $sql = $this->db->query("SELECT * FROM nodemcu WHERE IdUsuario = '{$idUser}'");
        $resultado = $sql->getResult();
        return $resultado;
    }

    public function selectDatos($idNodemcu)
    {
        $sql = $this->db->query("SELECT TiempoDucha, TiempoEspera, TiempoTolerancia FROM nodemcu");
        $resultado = $sql->getRowArray();
        return $resultado;
    }
}