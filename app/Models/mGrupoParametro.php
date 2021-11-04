<?php namespace App\Models;

use CodeIgniter\Model;

class mGrupoParametro extends Model
{

    protected $table          = 'grupoparametro';
    protected $primaryKey     = 'IdGrupoParametro';
    protected $returnType     = 'array';
    protected $allowedFields  = ['NombreGrupoParametro','IndicadorEstado' ,'UsuarioRegistro',
	'FechaRegistro','UsuarioModificacion','FechaModificacion'];
    protected $skipValidation = false;

    public function mostrarListadoGrupoParametro(){
        return $datos = $this->findAll();
    }

    public function insertarGrupoParametro($data){

        $FechaRegistro = date('Y-m-d H:i:s');
        $UsuarioRegistro = get_current_user();
        
    	$data = [
			'NombreGrupoParametro' => $data['NombreGrupoParametro'],			
            'IndicadorEstado'  => 'A',
            'UsuarioRegistro' => $UsuarioRegistro,
            'FechaRegistro' => $FechaRegistro            
        ];
        $datos = $this->insert($data);
        return $datos;
    }

    public function mostrarGrupoParametro($id){
        $datos = $this->find($id);
        return $datos;
    }

    public function actualizarGrupoParametro($data){

        $id = $data['IdGrupoParametro'];
        $FechaRegistro = date('Y-m-d H:i:s');
        $UsuarioRegistro = get_current_user();
        
    	if(isset($data['IndicadorEstado'])){
    		$data = [
                'IndicadorEstado'  => $data['IndicadorEstado'],
                'UsuarioModificacion' => $UsuarioRegistro,
                'FechaModificacion' => $FechaRegistro
        	];
    	}else{
	        $data = [
                'NombreGrupoParametro' => $data['NombreGrupoParametro'],            
                'UsuarioModificacion' => $UsuarioRegistro,
                'FechaModificacion' => $FechaRegistro               
	        ];
    	}
        $datos = $this->update($id, $data);
        return $datos;
    }    


}