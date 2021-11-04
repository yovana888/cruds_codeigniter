<?php namespace App\Models;

use CodeIgniter\Model;

class mDepartamento extends Model
{

    protected $table          = 'departamento';
    protected $primaryKey     = 'IdDepartamento';
    protected $returnType     = 'array';
    protected $allowedFields  = ['NombreDepartamento','CodigoUbigeoDepartamento','IndicadorEstado' ];
    protected $skipValidation = false;

    public function mostrarListadoDepartamento(){
        return $datos = $this->findAll();
    }

    public function insertarDepartamento($data){
    	$data = [
			'NombreDepartamento' => $data['NombreDepartamento'],
			'CodigoUbigeoDepartamento'  => $data['CodigoUbigeoDepartamento'],
			'IndicadorEstado'  => 'A'
        ];
        $datos = $this->insert($data);
        return $datos;
    }

    public function mostrarDepartamento($id){
        $datos = $this->find($id);
        return $datos;
    }

    public function actualizarDepartamento($data){
    	$id = $data['IdDepartamento'];

    	if(isset($data['IndicadorEstado'])){
    		$data = [
            	'IndicadorEstado'  => $data['IndicadorEstado']
        	];
    	}else{
	        $data = [
	            'NombreDepartamento' => $data['NombreDepartamento'],
	            'CodigoUbigeoDepartamento'  => $data['CodigoUbigeoDepartamento']
	        ];
    	}
        $datos = $this->update($id, $data);
        return $datos;
    }


    public function eliminarTipoDocumentoIdentidad($id){
        $datos = $this->delete($id,true);
        return $datos;
    }


}