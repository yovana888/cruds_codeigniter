<?php namespace App\Models;

use CodeIgniter\Model;

class mRegimenTributario extends Model
{

    protected $table      = 'regimentributario';
    protected $primaryKey = 'IdRegimenTributario';
    protected $returnType     = 'array';
    protected $allowedFields = [
        'NombreRegimenTributario','NombreAbreviado',
        'IndicadorEstado','FechaRegistro','UsuarioRegistro','FechaModificacion',
        'UsuarioModificacion'
    ];     

    public function obtenerListadoRegimenTributario(){
        $datos = $this->findAll();
        return $datos; 
    }

    public function obtenerNumeroFilasRegimenTributario(){
        $datos = $this->countAll();
        return $datos; 
    }
     
    public function insertarRegimenTributario($data){
        $FechaRegistro = date('Y-m-d H:i:s');
        $UsuarioRegistro = get_current_user();

        $data = [             
            'NombreAbreviado'  => $data['NombreAbreviado'],
            'NombreRegimenTributario'  => $data['NombreRegimenTributario'],
            'IndicadorEstado'  => '1',
            'FechaRegistro'  => $FechaRegistro,
            'UsuarioRegistro'  => $UsuarioRegistro,            
        ];
        $datos = $this->insert($data);
        return $datos;
    }

    public function mostrarRegimenTributario($id){
        $datos = $this->find($id);
        return $datos;
    }
    
    public function actualizarRegimenTributario($data){
        $FechaModificacion = date('Y-m-d H:i:s');
        $UsuarioModificacion = get_current_user();
        $id = $data['IdRegimenTributario'];

        if(isset($data['IndicadorEstado'])){
             $data = [
                'IndicadorEstado'  => $data['IndicadorEstado'],
                'UsuarioModificacion' => $UsuarioModificacion,
                'FechaModificacion' => $FechaModificacion
            ];
        }else{
            $data = [    
                'NombreAbreviado'  => $data['NombreAbreviado'],
                'NombreRegimenTributario'  => $data['NombreRegimenTributario'],     
                'FechaModificacion'  => $FechaModificacion,
                'UsuarioModificacion'  => $UsuarioModificacion,            
            ];
                         
        }
        $datos = $this->update($id, $data);         
        return $datos; 
         
    }   

     
}