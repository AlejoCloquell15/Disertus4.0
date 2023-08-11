<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class RegistrarModelo extends Model {
    protected $table = 'usuarios';
    protected $primaryKey = 'IdUsuario';
    protected $allowedFields = ['Nombre','Email','Contrasena','Tipo'];

    public function registrar($datos){
    $sql= $this->db->query("SELECT * FROM usuarios WHERE Email = '{$datos['Email']}'");
    $resultado = $sql->getNumRows();
    if($sql->getNumRows() == false){
        $registrar = $this->db->table('usuarios');
        $registrar->insert($datos);
        $mensaje = true;
        return $mensaje;
        }
    }
}