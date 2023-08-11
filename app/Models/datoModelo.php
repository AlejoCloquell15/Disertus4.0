<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Dato_modelo extends Model {
    protected $table = 'datos';
    protected $primaryKey = 'IdDatos';
    protected $allowedFields = ['Dato'];

    public function registrarDato($dato){
        $registrar = $this->db->table('datos');
        $registrar->insert(['Dato' => $dato]);
        if($dato == null){
            return $registrar;
        }
    }
}
    
