<?php
namespace App\Models;
use CodeIgniter\Model;

class mProvincia extends Model
{   
    protected $table              = 'provincia';
    protected $primaryKey         = 'IdProvincia';
    protected $returnType         = 'array';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  
    protected $allowedFields      = ['NombreProvincia','CodigoUbigeoProvincia','IndicadorEstado','IdDepartamento' ];
   
    public function obtenerProvincias()
    {
        $query = $this->db->table('provincia')->select('*,provincia.IndicadorEstado','d.NombreDepartamento')
                 ->join('departamento as d', 'd.IdDepartamento = provincia.IdDepartamento','left');
        return $query->get();
    }

    public function obtenerDepartamentos()
    {
        $datos = $this->db->table('departamento')->orderBy('NombreDepartamento', 'ASC');
        return $datos->get();
    }

    public function insertarProvincia($data)
    {   
        $data = array(
            'CodigoUbigeoProvincia'   =>$data['CodigoUbigeoProvincia'],
            'NombreProvincia'         =>$data['NombreProvincia'],
            'IdDepartamento'          =>$data['IdDepartamento'],
			'IndicadorEstado'         => 'A'
        );
        $datos = $this->insert($data);
        return $datos;
    }

    public function mostrarProvincia($id){
        $datos = $this->find($id);
        return $datos;
    }

    public function actualizarProvincia($data)
    {
        $id = $data['IdProvincia'];

    	if(isset($data['IndicadorEstado'])){
    		$data = [
            	'IndicadorEstado'  => $data['IndicadorEstado']
        	];
    	}else{
	        $data = [
                'CodigoUbigeoProvincia'   =>$data['CodigoUbigeoProvincia'],
                'NombreProvincia'         =>$data['NombreProvincia'],
                'IdDepartamento'          =>$data['IdDepartamento']
	        ];
        }
        
        $datos = $this->update($id,$data);
        return $datos;
    }

   
    
}
