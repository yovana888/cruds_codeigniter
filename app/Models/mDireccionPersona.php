<?php namespace App\Models;
use CodeIgniter\Model;

class mDireccionPersona extends Model
{
    
    protected $table      = 'direccionpersona';
    protected $primaryKey = 'IdDireccionPersona';
    protected $returnType     = 'array';     
    protected $allowedFields = [
        'IdPersona','Direccion','Descripcion','EstadoDireccion',
        'FechaRegistro','UsuarioRegistro','FechaModificacion','UsuarioModificacion'
    ];     

    public function insertarDireccion($data){
        
        $data = [
            'IdPersona'       => $data['IdPersonaDetalle'],
            'Direccion'       => $data['Direccion'],  
            'Descripcion'     => $data['Descripcion'],             
            'UsuarioRegistro' => get_current_user(),
            'FechaRegistro'   => date('Y-m-d H:i:s'),
            'EstadoDireccion' => 1    
        ];
        $datos = $this->insert($data);
        return $datos; 
    }


    
    public function actualizarDireccion($data){
        $id = $data['IdDireccionPersona'];
        if(isset($data['EstadoDireccion'])){
            $data = [               
                'EstadoDireccion'    => $data['EstadoDireccion'],
                'UsuarioModificacion' => get_current_user(),
                'FechaModificacion'   => date('Y-m-d H:i:s')
            ];
        }else{
            $data = [
                'Direccion'       => $data['Direccion'],  
                'Descripcion'     => $data['Descripcion'],               
                'UsuarioModificacion' => get_current_user(),
                'FechaModificacion'   => date('Y-m-d H:i:s')          
            ];
        }
        $datos = $this->update($id, $data);         
        return $datos; 
    } 


}