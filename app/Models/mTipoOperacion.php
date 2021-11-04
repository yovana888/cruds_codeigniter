<?php
namespace App\Models;
use CodeIgniter\Model;

class mTipoOperacion extends Model
{   
    protected $table              = 'tipooperacion';
    protected $primaryKey         = 'IdTipoOperacion';
    protected $returnType         = 'array';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  
    protected $allowedFields      = ['NombreTipoOperacion','CodigoTipoOperacion','CodigoSUNAT','IndicadorEstado','UsuarioRegistro','UsuarioModificacion','FechaModificacion'];
   
    public function obtenerTiposOperacion()
    {
        $query = $this->db->table('tipooperacion');
        return $query->get();
    }

    public function insertarTipoOperacion($data)
    {   
        $data = array(
            'NombreTipoOperacion'  =>$data['NombreTipoOperacion'],
            'CodigoTipoOperacion'  =>$data['CodigoTipoOperacion'],
            'CodigoSUNAT'          =>$data['CodigoSUNAT'],
			'FechaRegistro'        => date("Y-m-d H:i:s"),
			'IndicadorEstado'      => 1,
			'UsuarioRegistro'      => get_current_user()
        );
        $datos = $this->insert($data);
        return $datos;
    }

    public function mostrarTipoOperacion($id){
        $datos = $this->find($id);
        return $datos;
    }

    public function actualizarTipoOperacion($data)
    {
        $id = $data['IdTipoOperacion'];

    	if(isset($data['IndicadorEstado'])){
    		$data = [
            	'IndicadorEstado'  => $data['IndicadorEstado']
        	];
    	}else{
	        $data = [
                'NombreTipoOperacion'  =>$data['NombreTipoOperacion'],
                'CodigoTipoOperacion'  =>$data['CodigoTipoOperacion'],
                'CodigoSUNAT'          =>$data['CodigoSUNAT'],
                'FechaModificacion'      => date("Y-m-d H:i:s"),
                'UsuarioModificacion'    => get_current_user()
	        ];
        }
        
        $datos = $this->update($id,$data);
        return $datos;
    }

   
    
}
