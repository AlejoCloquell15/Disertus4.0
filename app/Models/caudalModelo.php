<?php
namespace App\Models;

use CodeIgniter\Model;

class CaudalModelo extends Model
{
    protected $table = 'caudal';
    protected $primaryKey = 'IdCaudal';
    protected $allowedFields = ['IdUsuario', 'IdNodemcu', 'Caudal', 'Fecha'];

    public function caudal($datos)
    {

        $IdNodemcu = $this->db->escape($datos['IdNodemcu']);
        $IdUsuario = $this->db->escape($datos['IdUsuario']);

        $query = "SELECT 
        nodemcu.IdNodemcu, 
        nodemcu.Nombre,
        SUM(caudal.caudal) AS caudal
    FROM 
        nodemcu
    JOIN 
        caudal ON nodemcu.IdNodemcu = caudal.IdNodemcu
    WHERE 
        nodemcu.IdUsuario = $IdUsuario
        AND nodemcu.IdNodemcu = $IdNodemcu;
    
    ";

        $result = $this->db->query($query)->getResult();

        return $result;
    }

    public function caudalAño($datos)
    {

        $IdNodemcu = $this->db->escape($datos['IdNodemcu']);
        $IdUsuario = $this->db->escape($datos['IdUsuario']);

        $query = "SELECT 
        nodemcu.IdNodemcu, 
        YEAR(caudal.fecha) AS Fecha,
        SUM(caudal.caudal) AS caudal,
        nodemcu.Nombre
    FROM 
        nodemcu
    JOIN 
        caudal ON nodemcu.IdNodemcu = caudal.IdNodemcu
    WHERE 
        nodemcu.IdUsuario = $IdUsuario
        AND nodemcu.IdNodemcu = $IdNodemcu
    GROUP BY 
        nodemcu.IdNodemcu, YEAR(caudal.Fecha);
    
    ";

        $result = $this->db->query($query)->getResult();

        return $result;
    }

    public function caudalMes($datos)
    {

        $IdNodemcu = $this->db->escape($datos['IdNodemcu']);
        $IdUsuario = $this->db->escape($datos['IdUsuario']);

        $query = "SELECT 
        nodemcu.IdNodemcu, 
        DATE_FORMAT(caudal.fecha, '%Y-%m') AS Fecha,
        SUM(caudal.caudal) AS caudal,
        nodemcu.Nombre
    FROM 
        nodemcu
    JOIN 
        caudal ON nodemcu.IdNodemcu = caudal.IdNodemcu
    WHERE 
        nodemcu.IdUsuario = $IdUsuario
        AND nodemcu.IdNodemcu = $IdNodemcu
    GROUP BY 
        nodemcu.IdNodemcu, DATE_FORMAT(caudal.Fecha, '%Y-%m');
    
    ";

        $result = $this->db->query($query)->getResult();

        return $result;
    }

    public function caudalDia($datos)
    {

        $IdNodemcu = $this->db->escape($datos['IdNodemcu']);
        $IdUsuario = $this->db->escape($datos['IdUsuario']);

        $query = "SELECT 
        nodemcu.IdNodemcu, 
        DATE_FORMAT(caudal.fecha, '%Y-%m-%d') AS Fecha,
        SUM(caudal.caudal) AS caudal,
        nodemcu.Nombre
    FROM 
        nodemcu
    JOIN 
        caudal ON nodemcu.IdNodemcu = caudal.IdNodemcu
    WHERE 
        nodemcu.IdUsuario = $IdUsuario
        AND nodemcu.IdNodemcu = $IdNodemcu
    GROUP BY 
        nodemcu.IdNodemcu, caudal.Fecha;
    
    ";

        $result = $this->db->query($query)->getResult();

        return $result;
    }

    public function conf($datos)
    {

        $query = "
            SELECT 
                nodemcu.IdNodemcu, 
                CONCAT(MONTHNAME(caudal.fecha), ' ', YEAR(caudal.fecha)) AS Fecha,
                SUM(caudal.caudal) AS caudal,
                nodemcu.Nombre
            FROM 
                nodemcu
            JOIN 
                caudal ON nodemcu.IdNodemcu = caudal.IdNodemcu
            WHERE 
                nodemcu.IdUsuario = $datos
            GROUP BY 
                nodemcu.IdNodemcu, YEAR(caudal.Fecha), MONTH(caudal.Fecha);
        ";

        $result = $this->db->query($query)->getResult();

        return $result;
    }
}