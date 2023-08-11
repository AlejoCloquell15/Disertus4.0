<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class LoginModelo extends Model {
    protected $table = 'usuarios';
    protected $primaryKey = 'IdUsuario';
    protected $allowedFields = ['Nombre','Email','Contrasena','Tipo'];

    public function login($email){
        $sql= $this->db->query("SELECT Contrasena FROM usuarios WHERE Email = '{$email}'");
        $userInfo = $sql->getRowArray();
        return $userInfo; 
        }

    public function sacarIdUsuario($email){
        $sql= $this->db->query("SELECT IdUsuario FROM usuarios WHERE Email = '{$email}'");
        $idu = $sql->getRowArray();
        return $idu; 
        }

    public function fechaExpiracion($token){
        $sql = $this->db->query("SELECT Expiracion FROM usuarios WHERE Token = '{$token}'");
        $fechaExpiracion = $sql->getRowArray();
        return $fechaExpiracion;
    }

    public function eliminarToken($id){
        $sql = $this->db->query("UPDATE usuarios SET Token = ?, Expiracion = ? WHERE IdUsuario = ?", [NULL, NULL, $id]);
    }
}
    
