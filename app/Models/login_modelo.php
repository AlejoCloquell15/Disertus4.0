<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Login_modelo extends Model {
    protected $table = 'usuarios';
    protected $primaryKey = 'IdUsuario';
    protected $allowedFields = ['Nombre','Email','Contrasena','Tipo'];

    public function login($email){
        $sql= $this->db->query("SELECT Contrasena FROM usuarios WHERE Email = '{$email}'");
        $user_info = $sql->getRowArray();
        return $user_info; 
        }

    public function sacar_id_usuario($email){
        $sql= $this->db->query("SELECT IdUsuario FROM usuarios WHERE Email = '{$email}'");
        $idu = $sql->getRowArray();
        return $idu; 
        }

    public function fecha_expiracion($token){
        $sql = $this->db->query("SELECT Expiracion FROM usuarios WHERE Token = '{$token}'");
        $fecha_expiracion = $sql->getRowArray();
        return $fecha_expiracion;
    }

    public function eliminar_token($id){
        $sql = $this->db->query("UPDATE usuarios SET Token = ?, Expiracion = ? WHERE IdUsuario = ?", [NULL, NULL, $id]);
    }
}
    
