<?php namespace App\Models;

use CodeIgniter\Model;

class mFabricante extends Model
{
    
    protected $table      = 'fabricante';
    protected $primaryKey = 'IdFabricante';
    protected $returnType     = 'array';     
    protected $allowedFields = [
        'NombreFabricante','EstadoFabricante','EstadoNoEspecificado',
        'FechaRegistro','UsuarioRegistro','MaquinaRegistro','FechaModificacion',
        'UsuarioModificacion','MaquinaModificacion','FechaEliminacion','UsuarioEliminacion','MaquinaEliminacion'
    ];     

    public function obtenerListadoFabricante(){
        $datos = $this->where('EstadoNoEspecificado','0')->findAll();
        return $datos; 
    }    
     
    public function insertarFabricante($data){

        $FechaRegistro = date('Y-m-d H:i:s');
        $UsuarioRegistro = get_current_user();
        $dispositivo =  getenv('COMPUTERNAME');
        
        $data = [
            'NombreFabricante' => $data['NombreFabricante'],             
            'EstadoFabricante'  => '1',
            'EstadoNoEspecificado'  => '0',
            'FechaRegistro'  => $FechaRegistro,
            'UsuarioRegistro'  => $UsuarioRegistro,
            'MaquinaRegistro'  => $dispositivo,

        ];  

        $datos = $this->insert($data);
        return $datos; 
    }

    public function mostrarFabricante($id){
        $datos = $this->find($id);
        return $datos;
    }
    
    public function actualizarFabricante($data){
        $FechaModificacion = date('Y-m-d H:i:s');
        $UsuarioModificacion = get_current_user();
        $dispositivo =  getenv('COMPUTERNAME');
        $id = $data['IdFabricante'];

        if(isset($data['EstadoFabricante'])){
            $data = [                 
                'EstadoFabricante'  => $data['EstadoFabricante'],                 
                'FechaEliminacion'  => $FechaModificacion,
                'UsuarioEliminacion'  => $UsuarioModificacion, 
                'MaquinaEliminacion' => $dispositivo           
            ];
        }else{
            $data = [
                'NombreFabricante'  => $data['NombreFabricante'],
                'UsuarioModificacion' => $UsuarioModificacion,
                'FechaModificacion' => $FechaModificacion,
                'MaquinaModificacion' => $dispositivo
        	];            
        }
        $datos = $this->update($id, $data);         
        return $datos; 
    }

    public function insertarFabricanteExcel($data)
    {
        $this->insert($data); 
        $id= $this->insertID;
        return $id; 
    }

}