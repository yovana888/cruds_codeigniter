<?php
namespace App\Models;
use CodeIgniter\Model;

class mRol extends Model
{   
    protected $table              = 'rol';
    protected $primaryKey         = 'IdRol';
    protected $returnType         = 'array';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  
    protected $allowedFields      = ['NombreRol','VerTodasVentas','VerComboVentas','IndicadorEstado','FechaRegistro','UsuarioRegistro','UsuarioModificacion','FechaModificacion'];
   
    public function obtenerRoles()
    {
        $query = $this->db->table('rol');
        return $query->get();
    }

    public function insertarRol($data)
    {   
        $data = array(
            'NombreRol'               => $data['NombreRol'],
            'VerTodasVentas'          => $data['VerTodasVentas'],
            'VerComboVentas'          => $data['VerComboVentas'],
            'IndicadorEstado'         => 'A',
            'FechaRegistro'           => date("Y-m-d H:i:s"),
			'UsuarioRegistro'         => get_current_user()
        );
        $datos = $this->insert($data);
        return $datos;
    }

    public function mostrarRol($id){
        $datos = $this->find($id);
        return $datos;
    }

    public function actualizarRol($post)
    {
        $id = $post['IdRol'];

    	if(isset($post['IndicadorEstado'])){
    		$data = [
            	'IndicadorEstado'  => $post['IndicadorEstado']
        	];
    	}else{
	        $data = [
                'NombreRol'        => $post['NombreRol'],
                'VerTodasVentas'   => $post['VerTodasVentas'],
                'VerComboVentas'   => $post['VerComboVentas'],
                'FechaModificacion'      => date("Y-m-d H:i:s"),
                'UsuarioModificacion'    => get_current_user()
	        ];
        }
        
        $datos = $this->update($id,$data);
        return $datos;
    }   
    
}
