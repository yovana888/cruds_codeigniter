<?php
namespace App\Models;
use CodeIgniter\Model;

class mModeloMarca extends Model
{   
    protected $table              = 'modelomarca';
    protected $primaryKey         = 'IdModeloMarca';
    protected $returnType         = 'array';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  
    protected $allowedFields      = ['IdMarca','EstadoModeloMarca','EstadoNoEspecificado','NombreModeloMarca','MaquinaRegistro','FechaRegistro','UsuarioRegistro',
                                     'UsuarioModificacion','FechaModificacion','MaquinaModificacion','UsuarioEliminacion',
                                     'FechaEliminacion','MaquinaEliminacion'];
   
    public function obtenerModelosMarca()
    {
        $query = $this->db->table('modelomarca')->select('*,modelomarca.EstadoModeloMarca','m.NombreMarca')
                 ->join('marca as m', 'm.IdMarca = modelomarca.IdMarca','left')
                 ->where('modelomarca.NombreModeloMarca !=','NO ESPECIFICADO');
        return $query->get();

    }

    public function obtenerMarcas()
    {
        $datos = $this->db->table('marca')
        ->where('IdMarca !=',0)->orderBy('NombreMarca', 'ASC');
        return $datos->get();
    }

    public function insertarModeloMarca($data)
    {   
        $data = array(
            'NombreModeloMarca'          =>$data['NombreModeloMarca'],
            'IdMarca'                    =>$data['IdMarca'],
            'EstadoModeloMarca'          =>1,
            'EstadoNoEspecificado'       =>0, //0 es no No Especificado
			'FechaRegistro'              => date("Y-m-d H:i:s"),
            'UsuarioRegistro'            => get_current_user(),
            'MaquinaRegistro'            => getenv('COMPUTERNAME')
        );
        $datos = $this->insert($data);
        return $datos;
    }

    public function mostrarModeloMarca($id){
        $datos = $this->find($id);
        return $datos;
    }

    public function actualizarModeloMarca($data)
    {
        $id = $data['IdModeloMarca'];

    	if(isset($data['EstadoModeloMarca'])){
            //si el estado es ==0 entonces es eliminacion si es 1 es modificacion del estado 
            if($data['EstadoModeloMarca']==0){
                $data = [
                    'EstadoModeloMarca'     => $data['EstadoModeloMarca'],
                    'FechaEliminacion'      => date("Y-m-d H:i:s"),
                    'UsuarioEliminacion'    => get_current_user(),
                    'MaquinaEliminacion'    => getenv('COMPUTERNAME')
                ];
            }else{
                $data = [
                    'EstadoModeloMarca'     => $data['EstadoModeloMarca'],
                    'FechaModificacion'     => date("Y-m-d H:i:s"),
                    'UsuarioModificacion'   => get_current_user(),
                    'MaquinaModificacion'   => getenv('COMPUTERNAME')
                ];
            }

    	}else{
	        $data = [
                'NombreModeloMarca'         =>$data['NombreModeloMarca'],
                'IdMarca'                   =>$data['IdMarca'],
                'FechaModificacion'         => date("Y-m-d H:i:s"),
                'UsuarioModificacion'       => get_current_user(),
                'MaquinaModificacion'       => getenv('COMPUTERNAME')
	        ];
        }
        
        $datos = $this->update($id,$data);
        return $datos;
    }

    function insertarModeloExcel($data){
        $this->insert($data); 
        $id= $this->insertID;
        return $id; 
    }
  
}
