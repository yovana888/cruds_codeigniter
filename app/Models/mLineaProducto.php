<?php namespace App\Models;

use CodeIgniter\Model;

class mLineaProducto extends Model
{
    
    protected $table      = 'lineaproducto';
    protected $primaryKey = 'IdLineaProducto';
    protected $returnType     = 'array';     
    protected $allowedFields = [
        'NombreLineaProducto','EstadoLineaProducto','EstadoNoEspecificado',
        'FechaRegistro','UsuarioRegistro','MaquinaRegistro','FechaModificacion',
        'UsuarioModificacion','MaquinaModificacion','FechaEliminacion','UsuarioEliminacion','MaquinaEliminacion'
    ];     

    public function obtenerListadoLineaProducto(){
        $datos = $this->where('EstadoNoEspecificado', 0)->findAll();
        return $datos; 
    }    
     
    public function insertarLineaProducto($data){

        $FechaRegistro = date('Y-m-d H:i:s');
        $UsuarioRegistro = get_current_user();
        $dispositivo =  getenv('COMPUTERNAME');
        
        $data = [
            'NombreLineaProducto' => $data['NombreLineaProducto'],             
            'EstadoLineaProducto'  => '1',
            'EstadoNoEspecificado'  => '0',
            'FechaRegistro'  => $FechaRegistro,
            'UsuarioRegistro'  => $UsuarioRegistro,
            'MaquinaRegistro'  => $dispositivo,

        ];  

        $datos = $this->insert($data);
        return $datos; 
    }

    public function mostrarLineaProducto($id){
        $datos = $this->find($id);
        return $datos;
    }
    
    public function actualizarLineaProducto($data){
        $FechaModificacion = date('Y-m-d H:i:s');
        $UsuarioModificacion = get_current_user();
        $dispositivo =  getenv('COMPUTERNAME');
        $id = $data['IdLineaProducto'];

        if(isset($data['EstadoLineaProducto'])){
            $data = [                 
                'EstadoLineaProducto'  => $data['EstadoLineaProducto'],                 
                'FechaEliminacion'  => $FechaModificacion,
                'UsuarioEliminacion'  => $UsuarioModificacion, 
                'MaquinaEliminacion' => $dispositivo           
            ];
        }else{
            $data = [
                'NombreLineaProducto'  => $data['NombreLineaProducto'],
                'UsuarioModificacion' => $UsuarioModificacion,
                'FechaModificacion' => $FechaModificacion,
                'MaquinaModificacion' => $dispositivo
        	];            
        }
        $datos = $this->update($id, $data);         
        return $datos; 
    }

    public function insertarLineaProductoExcel($data)
    {
        $this->insert($data); 
        $id= $this->insertID;
        return $id; 
    }

}