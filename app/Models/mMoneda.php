<?php namespace App\Models;

use CodeIgniter\Model;

class mMoneda extends Model
{

    protected $table      = 'moneda';
    protected $primaryKey = 'IdMoneda';
    protected $returnType     = 'array';    
    protected $allowedFields = [
        'CodigoMoneda','NombreMoneda','SimboloMoneda',
        'IndicadorEstado','FechaRegistro','UsuarioRegistro','FechaModificacion',
        'UsuarioModificacion'
    ];     

    public function obtenerListadoMonedas(){
        $datos = $this->findAll();
        return $datos; 
    }

    public function obtenerNumeroFilasMonedas(){
        $datos = $this->countAll();
        return $datos; 
    }
     
    public function insertarMoneda($data){

        $FechaRegistro = date('Y-m-d H:i:s');
        $UsuarioRegistro = get_current_user();
        
        $data = [
            'CodigoMoneda' => $data['CodigoMoneda'],
            'NombreMoneda'  => $data['NombreMoneda'],
            'SimboloMoneda'  => $data['SimboloMoneda'],
            'IndicadorEstado'  => '1',
            'FechaRegistro'  => $FechaRegistro,
            'UsuarioRegistro'  => $UsuarioRegistro,            
        ];  

        $datos = $this->insert($data);
        return $datos; 
    }

    public function mostrarMoneda($id){
        $datos = $this->find($id);
        return $datos;
    }
    
    public function actualizarMoneda($data){
        $FechaModificacion = date('Y-m-d H:i:s');
        $UsuarioModificacion = get_current_user();
        $id = $data['IdMoneda'];

        if(isset($data['IndicadorEstado'])){
            $data = [               
                'IndicadorEstado'  => $data['IndicadorEstado'],
                'UsuarioModificacion' => $UsuarioModificacion,
                'FechaModificacion' => $FechaModificacion      
            ];
        }else{
            $data = [
                'CodigoMoneda' => $data['CodigoMoneda'],
                'NombreMoneda'  => $data['NombreMoneda'],
                'SimboloMoneda'  => $data['SimboloMoneda'],        
                'FechaModificacion'  => $FechaModificacion,
                'UsuarioModificacion'  => $UsuarioModificacion,                  
        	];            
        }
        $datos = $this->update($id, $data);         
        return $datos; 
    }
        
}