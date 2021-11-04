<?php namespace App\Models;

use CodeIgniter\Model;

class mTipoDocumentoIdentidad extends Model
{

    protected $table      = 'tipodocumentoidentidad';
    protected $primaryKey = 'IdTipoDocumentoIdentidad';

    protected $returnType     = 'array';
     

    protected $allowedFields = [
        'CodigoDocumentoIdentidad','NombreAbreviado','NombreTipoDocumentoIdentidad',
        'IndicadorEstado','FechaRegistro','UsuarioRegistro','FechaModificacion',
        'UsuarioModificacion'
    ];

     
    public function obtenerListadoTipoDocumentoIdentidad(){
        $datos = $this->findAll();
        return $datos;  
          
    }

    public function obtenerNumeroFilasTipoDocumentoIdentidad(){
        
        $datos = $this->countAll();
        return $datos; 
    }
     
    public function insertarTipoDocumentoIdentidad($data){

        $FechaRegistro = date('Y-m-d H:i:s');
        $UsuarioRegistro = get_current_user();

        $data = [
            'CodigoDocumentoIdentidad' => $data['CodigoDocumentoIdentidad'],
            'NombreAbreviado'  => $data['NombreAbreviado'],
            'NombreTipoDocumentoIdentidad'  => $data['NombreTipoDocumentoIdentidad'],
            'IndicadorEstado'  => '1',
            'FechaRegistro'  => $FechaRegistro,
            'UsuarioRegistro'  => $UsuarioRegistro,            
        ];

        $datos = $this->insert($data);
        return $datos;
    }

    public function mostrarTipoDocumentoIdentidad($id){
        $datos = $this->find($id);
        return $datos;
    }
    
    public function actualizarTipoDocumentoIdentidad($data){
        
        $FechaModificacion = date('Y-m-d H:i:s');
        $UsuarioModificacion = get_current_user();
        $id = $data['IdTipoDocumentoIdentidad'];

        if(isset($data['IndicadorEstado'])){
            $data = [
                'IndicadorEstado'  => $data['IndicadorEstado'],
                'FechaModificacion'  => $FechaModificacion,
                'UsuarioModificacion'  => $UsuarioModificacion
            ];
                         
        }else{
            $data = [ 
                 
                'CodigoDocumentoIdentidad' => $data['CodigoDocumentoIdentidad'],
                'NombreAbreviado'  => $data['NombreAbreviado'],
                'NombreTipoDocumentoIdentidad'  => $data['NombreTipoDocumentoIdentidad'],       
                'FechaModificacion'  => $FechaModificacion,
                'UsuarioModificacion'  => $UsuarioModificacion,            
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