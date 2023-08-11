<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class SessionModelo extends Model {
    protected $table = 'session';
    protected $primaryKey = 'IdSession';
    protected $allowedFields = ['Token', 'Expiracion', 'IdUsuario'];

    public function agregarToken($datos){
        $registrar = $this->db->table('session');
        $registrar->insert($datos);
    }

    public function eliminarToken($id){
        $sql =  $this->db->query("DELETE FROM session WHERE IdUsuario = '{$id}'");
    }

    public function fechaExpiracion($token){
        $sql = $this->db->query("SELECT Expiracion FROM session WHERE Token = '{$token}'");
        $fechaExpiracion = $sql->getRowArray();
        return $fechaExpiracion;
    }
}