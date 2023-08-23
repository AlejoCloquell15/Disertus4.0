<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class CaudalModelo extends Model {
    protected $table = 'caudal';
    protected $primaryKey = 'IdCaudal';
    protected $allowedFields = ['IdNodemcu','Caudal', 'Fecha'];

    public function insertarCaudal($datos){
        $registrar = $this->db->table('caudal');
        $registrar->insert($datos);
    }

}