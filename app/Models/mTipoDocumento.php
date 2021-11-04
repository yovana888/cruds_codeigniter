<?php namespace App\Models;

use CodeIgniter\Model;

class mTipoDocumento extends Model
{

    protected $table      = 'tipodocumento';
    protected $primaryKey = 'IdTipoDocumento';

    protected $returnType     = 'array';
    

    protected $allowedFields = [
        'CodigoTipoDocumento','NombreAbreviado','NombreTipoDocumento',
        'IndicadorEstado','FechaRegistro','UsuarioRegistro','FechaModificacion',
        'UsuarioModificacion'
    ];

     

    public function obtenerListadoTipoDocumento(){
        $datos = $this->findAll();
        return $datos; 
    }

    public function obtenerNumeroFilasTipoDocumento(){
        $datos = $this->countAll();
        return $datos; 
    }
     
    public function insertarTipoDocumento($data){

        $FechaRegistro = date('Y-m-d H:i:s');
        $UsuarioRegistro = get_current_user();

        $data = [
            'CodigoTipoDocumento' => $data['CodigoTipoDocumento'],
            'NombreAbreviado'  => $data['NombreAbreviado'],
            'NombreTipoDocumento'  => $data['NombreTipoDocumento'],
            'IndicadorEstado'  => '1',
            'FechaRegistro'  => $FechaRegistro,
            'UsuarioRegistro'  => $UsuarioRegistro,            
        ];
        $datos = $this->insert($data);
        return $datos;
    }

    public function mostrarTipoDocumento($id){
        $datos = $this->find($id);
        return $datos;
    }
    
    public function actualizarTipoDocumento($data){
        $FechaModificacion = date('Y-m-d H:i:s');
        $UsuarioModificacion = get_current_user();
        $id = $data['IdTipoDocumento'];

        if(isset($data['IndicadorEstado'])){
            $data = [
                'IndicadorEstado'  => $data['IndicadorEstado'],
                'UsuarioModificacion' => $UsuarioModificacion,
                'FechaModificacion' => $FechaModificacion
            ]; 
             
        }else{
            $data = [    
                'CodigoTipoDocumento' => $data['CodigoTipoDocumento'],
                'NombreAbreviado'  => $data['NombreAbreviado'],
                'NombreTipoDocumento'  => $data['NombreTipoDocumento'],                    
                'FechaModificacion'  => $FechaModificacion,
                'UsuarioModificacion'  => $UsuarioModificacion,            
            ];                        
        }
        $datos = $this->update($id, $data);         
        return $datos; 
         
    }

    public function eliminarTipoDocumento($id){
        $datos = $this->delete($id,true);
        return $datos;
    }
     
}