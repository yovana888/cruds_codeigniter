<?php
namespace App\Models;
use CodeIgniter\Model;

class mMarca extends Model
{   
    protected $table              = 'marca';
    protected $primaryKey         = 'IdMarca';
    protected $returnType         = 'array';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  
    protected $allowedFields      = ['NombreMarca','EstadoMarca','EstadoNoEspecificado','InicialesMarcaNombreProducto',
                                     'InicialesMarcaCodigoProducto','MaquinaRegistro','FechaRegistro','UsuarioRegistro',
                                     'UsuarioModificacion','FechaModificacion','MaquinaModificacion','UsuarioEliminacion',
                                     'FechaEliminacion','MaquinaEliminacion'];
   
    public function obtenerMarcas()
    {
        $query = $this->db->table('marca')->where('IdMarca !=',0);
        return $query->get();
    }

    public function insertarMarca($data)
    {   
        $data = array(
            'NombreMarca'          =>$data['NombreMarca'],
            'EstadoMarca'          =>1,
            'EstadoNoEspecificado' =>0,
            'InicialesMarcaNombreProducto' => $data['InicialesMarcaNombreProducto'],
            'InicialesMarcaCodigoProducto' => $data['InicialesMarcaCodigoProducto'],
			'FechaRegistro'        => date("Y-m-d H:i:s"),
            'UsuarioRegistro'      => get_current_user(),
            'MaquinaRegistro'      => getenv('COMPUTERNAME')
        );
        $datos = $this->insert($data);

        $maxId=$this->db->table('marca')->selectMax('IdMarca')->get();
        foreach($maxId->getResult() as $row) {
            $ultimoId=$row->IdMarca;
        }
        $data_mm = array(
            'NombreModeloMarca'  =>'NO ESPECIFICADO',
            'EstadoModeloMarca'  =>1,
            'IdMarca'            =>$ultimoId,
            'EstadoNoEspecificado' =>1,
			'FechaRegistro'      => date("Y-m-d H:i:s"),
            'UsuarioRegistro'    => get_current_user(),
            'MaquinaRegistro'    => getenv('COMPUTERNAME')
        );
        $this->db->table('modelomarca')->insert($data_mm);

        return $datos;
    }

    public function mostrarMarca($id){
        $datos = $this->find($id);
        return $datos;
    }

    public function actualizarMarca($data)
    {
        $id = $data['IdMarca'];

    	if(isset($data['EstadoMarca'])){
            //si el estado es ==0 entonces es eliminacion si es 1 es modificacion del estado 
            if($data['EstadoMarca']==0){
                $data = [
                    'EstadoMarca'  => $data['EstadoMarca'],
                    'FechaEliminacion'      => date("Y-m-d H:i:s"),
                    'UsuarioEliminacion'    => get_current_user(),
                    'MaquinaEliminacion'    => getenv('COMPUTERNAME')
                ];
            }else{
                $data = [
                    'EstadoMarca'  => $data['EstadoMarca'],
                    'FechaModificacion'      => date("Y-m-d H:i:s"),
                    'UsuarioModificacion'    => get_current_user(),
                    'MaquinaModificacion'    => getenv('COMPUTERNAME')
                ];
            }

    	}else{
	        $data = [
                'NombreMarca'  =>$data['NombreMarca'],
                'InicialesMarcaNombreProducto' => $data['InicialesMarcaNombreProducto'],
                'InicialesMarcaCodigoProducto' => $data['InicialesMarcaCodigoProducto'],
                'FechaModificacion'      => date("Y-m-d H:i:s"),
                'UsuarioModificacion'    => get_current_user(),
                'MaquinaModificacion'    => getenv('COMPUTERNAME')
	        ];
        }
        
        $datos = $this->update($id,$data);
        return $datos;
    }

    public function insertarMarcaExcel($data){
        $datos = $this->insert($data);
        $id_ultimo = $this->insertID; 
        $data_mm = array(
            'NombreModeloMarca'  =>'NO ESPECIFICADO',
            'EstadoModeloMarca'  =>1,
            'IdMarca'            =>$id_ultimo,
            'EstadoNoEspecificado' =>1,
			'FechaRegistro'      => date("Y-m-d H:i:s"),
            'UsuarioRegistro'    => get_current_user(),
            'MaquinaRegistro'    => getenv('COMPUTERNAME')
        );
        $this->db->table('modelomarca')->insert($data_mm);

        return $id_ultimo; 
    }
  
}
