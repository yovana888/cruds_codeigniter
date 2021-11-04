<?php
namespace App\Models;
use CodeIgniter\Model;

class mUnidadMedida extends Model
{   
    protected $table              = 'unidadmedida';
    protected $primaryKey         = 'IdUnidadMedida';
    protected $returnType         = 'array';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  
    protected $allowedFields      = ['CodigoUnidadMedidaSunat','NombreUnidadMedida','AbreviaturaUnidadMedida','NombreUnidadComercial','AbreviaturaComercial','FechaRegistro','IndicadorEstado','UsuarioRegistro','UsuarioModificacion','FechaModificacion'];
   
    public function obtenerUnidadesMedida()
    {
        $query = $this->db->table('unidadmedida')->orderBy('IndicadorEstado', 'ASC');
        return $query->get();
    }

    public function insertarUnidadMedida($data)
    {   
        $datos = array(
            'NombreUnidadMedida'       =>$data['NombreUnidadMedida'],
            'CodigoUnidadMedidaSunat'  =>$data['CodigoUnidadMedidaSunat'],
            'AbreviaturaUnidadMedida'  =>$data['AbreviaturaUnidadMedida'],
            'NombreUnidadComercial'    =>$data['NombreUnidadComercial'],
            'AbreviaturaComercial'     =>$data['AbreviaturaComercial'],
			'FechaRegistro'            => date("Y-m-d H:i:s"),
			'IndicadorEstado'          => '1',
			'UsuarioRegistro'          => get_current_user()
        );
        $datos = $this->insert($datos);
        return $datos;
    }

    public function mostrarUnidadMedida($id){
        $datos = $this->find($id);
        return $datos;
    }

    public function actualizarUnidadMedida($data)
    {
        $id = $data['IdUnidadMedida'];

    	if(isset($data['IndicadorEstado'])){
    		$datos = [
            	'IndicadorEstado'  => $data['IndicadorEstado']
        	];
    	}else{
	        $datos = [
                'NombreUnidadMedida'       =>$data['NombreUnidadMedida'],
                'CodigoUnidadMedidaSunat'  =>$data['CodigoUnidadMedidaSunat'],
                'AbreviaturaUnidadMedida'  =>$data['AbreviaturaUnidadMedida'],
                'NombreUnidadComercial'    =>$data['NombreUnidadComercial'],
                'AbreviaturaComercial'     =>$data['AbreviaturaComercial'],
                'FechaModificacion'        => date("Y-m-d H:i:s"),
                'UsuarioModificacion'      => get_current_user()
	        ];
        }
        
        $datos = $this->update($id,$datos);
        return $datos;
    }   
    
}
