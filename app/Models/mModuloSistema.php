<?php namespace App\Models;

use CodeIgniter\Model;

class mModuloSistema extends Model
{

    protected $table          = 'modulosistema';
    protected $primaryKey     = 'IdModuloSistema';
    protected $returnType     = 'array';
    protected $allowedFields  = ['NombreModuloSistema','IndicadorDocumento','IndicadorEstado' ,'UsuarioRegistro',
	'FechaRegistro','UsuarioModificacion','FechaModificacion','IdModulo','UrlModulo','ItemModulo','NameModulo','AtajoModulo'];
    protected $skipValidation = false;

    public function mostrarListadoModuloSistema(){
        return $datos = $this->findAll();
    }

    public function insertarModuloSistema($data){

        $FechaRegistro = date('Y-m-d H:i:s');
        $UsuarioRegistro = get_current_user();
        
    	$data = [
			'NombreModuloSistema' => $data['NombreModuloSistema'],
			'IndicadorDocumento'  => "1",
            'IndicadorEstado'  => 'A',
            'UsuarioRegistro' => $UsuarioRegistro,
            'FechaRegistro' => $FechaRegistro,
            'IdModulo' => $data['IdModulo'],
            'UrlModulo' => $data['UrlModulo'],
            'ItemModulo' => $data['ItemModulo'],
            'NameModulo' => $data['NameModulo'],
            'AtajoModulo' => $data['AtajoModulo']
        ];
        $datos = $this->insert($data);
        return $datos;
    }

    public function mostrarModuloSistema($id){
        $datos = $this->find($id);
        return $datos;
    }

    public function actualizarModuloSistema($data){

        $id = $data['IdModuloSistema'];
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
                'NombreModuloSistema' => $data['NombreModuloSistema'],
	            'IdModulo' => $data['IdModulo'],
                'UrlModulo' => $data['UrlModulo'],
                'ItemModulo' => $data['ItemModulo'],
                'NameModulo' => $data['NameModulo'],
                'AtajoModulo' => $data['AtajoModulo'],
                'UsuarioModificacion' => $UsuarioRegistro,
                'FechaModificacion' => $FechaRegistro              
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