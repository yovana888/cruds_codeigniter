<?php
namespace App\Models;
use CodeIgniter\Model;

class mGiroNegocio extends Model
{   
    protected $table              = 'gironegocio';
    protected $primaryKey         = 'IdGiroNegocio';
    protected $returnType         = 'array';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  
    protected $allowedFields      = ['NombreGiroNegocio','FechaRegistro','IndicadorEstado','UsuarioRegistro','UsuarioModificacion','FechaModificacion'];
   
    public function obtenerGirosNegocio()
    {
        $query = $this->db->table('gironegocio');
        return $query->get();
    }

    public function insertarGiroNegocio($data)
    {   
        $data = array(
            'NombreGiroNegocio'  =>$data['NombreGiroNegocio'],
			'FechaRegistro'      => date("Y-m-d H:i:s"),
			'IndicadorEstado'    => 1,
			'UsuarioRegistro'    => get_current_user()
        );
        $datos = $this->insert($data);
        return $datos;
    }

    public function mostrarGiroNegocio($id){
        $datos = $this->find($id);
        return $datos;
    }

    public function actualizarGiroNegocio($data)
    {
        $id = $data['IdGiroNegocio'];

    	if(isset($data['IndicadorEstado'])){
    		$data = [
            	'IndicadorEstado'  => $data['IndicadorEstado']
        	];
    	}else{
	        $data = [
                'NombreGiroNegocio'  =>$data['NombreGiroNegocio'],
                'FechaModificacion'      => date("Y-m-d H:i:s"),
                'UsuarioModificacion'    => get_current_user()
	        ];
        }
        
        $datos = $this->update($id,$data);
        return $datos;
    }

   
    
}
