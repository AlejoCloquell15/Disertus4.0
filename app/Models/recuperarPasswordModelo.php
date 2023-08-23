<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class RecuperarPasswordModelo extends Model {
    protected $table = 'recuperar_password';
    protected $primaryKey = 'IdRecuperar';
    protected $allowedFields = ['Codigo', 'IdUsuario'];

    public function insertarId($dato){
        $registrar = $this->db->table('recuperar_password');
        $registrar->insert($dato);
    }

    public function insertarCodigo($codigo, $idUsuario){
        $sql= $this->db->query("UPDATE recuperar_password SET Codigo = $codigo WHERE IdUsuario = '{$idUsuario}'");
    }

    public function compararCodigo($idUsuario, $codigo){
        $sql= $this->db->query("SELECT * FROM recuperar_password WHERE Codigo = '{$codigo}' AND IdUsuario = '{$idUsuario}'");
        $res = $sql->getRowArray();
        return $res;
    }
}