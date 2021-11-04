<?php
namespace App\Models;
use CodeIgniter\Model;

class mTipoExistencia extends Model
{   
    protected $table              = 'tipoexistencia';
    protected $primaryKey         = 'IdTipoExistencia';
    protected $returnType         = 'array';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  
    protected $allowedFields      = ['NombreTipoExistencia','CodigoTipoExistencia','FechaRegistro','IndicadorEstado','UsuarioRegistro','UsuarioModificacion','FechaModificacion'];
   
    public function obtenerTiposExistencia()
    {
        $query = $this->db->table('tipoexistencia');
        return $query->get();
    }

    public function insertarTipoExistencia($data)
    {   
        $data = array(
            'NombreTipoExistencia'  =>$data['NombreTipoExistencia'],
            'CodigoTipoExistencia'  =>$data['CodigoTipoExistencia'],
			'FechaRegistro'      => date("Y-m-d H:i:s"),
			'IndicadorEstado'    => 1,
			'UsuarioRegistro'    => get_current_user()
        );
        $datos = $this->insert($data);
        return $datos;
    }

    public function mostrarTipoExistencia($id){
        $datos = $this->find($id);
        return $datos;
    }

    public function actualizarTipoExistencia($data)
    {
        $id = $data['IdTipoExistencia'];

    	if(isset($data['IndicadorEstado'])){
    		$data = [
            	'IndicadorEstado'  => $data['IndicadorEstado']
        	];
    	}else{
	        $data = [
                'NombreTipoExistencia'  =>$data['NombreTipoExistencia'],
                'CodigoTipoExistencia'  =>$data['CodigoTipoExistencia'],
                'FechaModificacion'      => date("Y-m-d H:i:s"),
                'UsuarioModificacion'    => get_current_user()
	        ];
        }
        
        $datos = $this->update($id,$data);
        return $datos;
    }

   
    
}
