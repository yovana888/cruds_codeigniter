<?php namespace App\Models;

use CodeIgniter\Model;

class mParametroSistema extends Model
{

    protected $table          = 'parametrosistema';
    protected $primaryKey     = 'IdParametroSistema';
    protected $returnType     = 'array';
    protected $allowedFields  = ['NombreParametroSistema','ValorParametroSistema','IdGrupoParametro','IndicadorEstado' ,'UsuarioRegistro',
	'FechaRegistro','UsuarioModificacion','FechaModificacion'];
    protected $skipValidation = false;

    public function mostrarListadoParametroSistema(){
        $query = "SELECT *,p.IndicadorEstado,p.UsuarioRegistro,p.FechaRegistro,p.UsuarioModificacion,p.FechaModificacion
        FROM parametrosistema AS p INNER JOIN grupoparametro AS g ON p.IdGrupoParametro = g.IdGrupoParametro";
        return $datos = $this->query($query);
    }

    public function obtenerGrupoParametro()
    {
        $datos = $this->db->table('grupoparametro')->orderBy('NombreGrupoParametro', 'ASC');
        return $datos->get();
    }

    public function insertarParametroSistema($data){

        $FechaRegistro = date('Y-m-d H:i:s');
        $UsuarioRegistro = get_current_user();
        
    	$data = [
            'NombreParametroSistema' => $data['NombreParametroSistema'],
            'ValorParametroSistema' => $data['ValorParametroSistema'],
            'IdGrupoParametro' => $data['IdGrupoParametro'],		
            'IndicadorEstado'  => 'A',
            'UsuarioRegistro' => $UsuarioRegistro,
            'FechaRegistro' => $FechaRegistro            
        ];
        $datos = $this->insert($data);
        return $datos;
    }

    public function mostrarParametroSistema($id){
        $datos = $this->find($id);
        return $datos;
    }

    public function actualizarParametroSistema($data){

        $id = $data['IdParametroSistema'];
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
                'NombreParametroSistema' => $data['NombreParametroSistema'],
                'ValorParametroSistema' => $data['ValorParametroSistema'], 
                'IdGrupoParametro' => $data['IdGrupoParametro'],             
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