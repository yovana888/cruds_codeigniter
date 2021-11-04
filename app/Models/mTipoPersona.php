<?php
namespace App\Models;
use CodeIgniter\Model;

class mTipoPersona extends Model
{   
    protected $table              = 'tipopersona';
    protected $primaryKey         = 'IdTipoPersona';
    protected $returnType         = 'array';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  
    protected $allowedFields      = ['NombreTipoPersona','FechaRegistro','IndicadorEstado','UsuarioRegistro','UsuarioModificacion','FechaModificacion'];
   
    public function obtenerTiposPersona()
    {
        $query = $this->db->table('tipopersona');
        return $query->get();
    }

    public function insertarTipoPersona($data)
    {   
        $data = array(
            'NombreTipoPersona'  =>$data['NombreTipoPersona'],
			'FechaRegistro'      => date("Y-m-d H:i:s"),
			'IndicadorEstado'    => 'A',
			'UsuarioRegistro'    => get_current_user()
        );
        $datos = $this->insert($data);
        return $datos;
    }

    public function mostrarTipoPersona($id){
        $datos = $this->find($id);
        return $datos;
    }

    public function actualizarTipoPersona($data)
    {
        $id = $data['IdTipoPersona'];

    	if(isset($data['IndicadorEstado'])){
    		$data = [
            	'IndicadorEstado'  => $data['IndicadorEstado']
        	];
    	}else{
	        $data = [
                'NombreTipoPersona'  =>$data['NombreTipoPersona'],
                'FechaModificacion'      => date("Y-m-d H:i:s"),
                'UsuarioModificacion'    => get_current_user()
	        ];
        }
        
        $datos = $this->update($id,$data);
        return $datos;
    }   
    
}
