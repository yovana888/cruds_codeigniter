<?php
namespace App\Models;
use CodeIgniter\Model;

class mSede extends Model
{   
    protected $table              = 'sede';
    protected $primaryKey         = 'IdSede';
    protected $returnType         = 'array';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  
    protected $allowedFields      = ['CodigoSede','NombreSede','Direccion','EstadoSede','MaquinaRegistro','FechaRegistro','UsuarioRegistro',
                                     'UsuarioModificacion','FechaModificacion','MaquinaModificacion','UsuarioEliminacion',
                                     'FechaEliminacion','MaquinaEliminacion','IdEmpresa'];
   
    public function obtenerSedes()
    {
        $query = $this->db->table('sede')->select('*','e.RazonSocial') 
        ->join('empresa as e', 'e.IdEmpresa = sede.IdEmpresa','left');
        return $query->get();
    }

    public function obtenerSedeEmpresa($id) {
        $query = $this->db->table('sede')->where('IdEmpresa',$id);
        return $query->get();
    }

    public function insertarSede($data)
    {   
        $data = array(
            'NombreSede'          =>$data['NombreSede'],
            'CodigoSede'          =>$data['CodigoSede'],
            'Direccion'           =>$data['Direccion'],
            'EstadoSede'          =>'A',
			'FechaRegistro'        => date("Y-m-d H:i:s"),
            'UsuarioRegistro'      => get_current_user(),
            'MaquinaRegistro'      => getenv('COMPUTERNAME')
        );
        $datos = $this->insert($data);
        return $datos;
    }

    public function mostrarSede($id){
        $datos = $this->find($id);
        return $datos;
    }


    public function actualizarSede($data)
    {
        $id = $data['IdSede'];

    	if(isset($data['EstadoSede'])){
            //si el estado es ==0 entonces es eliminacion si es 1 es modificacion del estado 
            if($data['EstadoSede']=='I'){
                $data = [
                    'EstadoSede'  => $data['EstadoSede'],
                    'FechaEliminacion'      => date("Y-m-d H:i:s"),
                    'UsuarioEliminacion'    => get_current_user(),
                    'MaquinaEliminacion'    => getenv('COMPUTERNAME')
                ];
            }else{
                $data = [
                    'EstadoSede'  => $data['EstadoSede'],
                    'FechaModificacion'      => date("Y-m-d H:i:s"),
                    'UsuarioModificacion'    => get_current_user(),
                    'MaquinaModificacion'    => getenv('COMPUTERNAME')
                ];
            }

    	}else{
	        $data = [
                'NombreSede'  =>$data['NombreSede'],
                'CodigoSede'          =>$data['CodigoSede'],
                'Direccion'           =>$data['Direccion'],
                'FechaModificacion'      => date("Y-m-d H:i:s"),
                'UsuarioModificacion'    => get_current_user(),
                'MaquinaModificacion'    => getenv('COMPUTERNAME')
	        ];
        }
        
        $datos = $this->update($id,$data);
        return $datos;
    }
  
}
