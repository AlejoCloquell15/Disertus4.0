<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Session_modelo extends Model {
    protected $table = 'session';
    protected $primaryKey = 'IdSession';
    protected $allowedFields = ['Token', 'Expiracion', 'IdUsuario'];

    public function agregar_token($datos){
        $registrar = $this->db->table('session');
        $registrar->insert($datos);
    }

    public function eliminar_token($id){
        $sql =  $this->db->query("DELETE FROM session WHERE IdUsuario = '{$id}'");
    }

    public function fecha_expiracion($token){
        $sql = $this->db->query("SELECT Expiracion FROM session WHERE Token = '{$token}'");
        $fecha_expiracion = $sql->getRowArray();
        return $fecha_expiracion;
    }
}