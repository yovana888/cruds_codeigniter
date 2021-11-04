<?php namespace App\Bussiness;
use App\Models\mTipoDocumentoIdentidad; 
use App\Validations\vTipoDocumentoIdentidad;

class bTipoDocumentoIdentidad {

    public function __construct()
    {
         
        $this->tipodocumento = new mTipoDocumentoIdentidad();
        $this->vtipodocumentoidentidad = new vTipoDocumentoIdentidad();

    }

    public function obtenerListadoTipoDocumentoIdentidad()
    {    
             
        $resultado = $this->tipodocumento->obtenerListadoTipoDocumentoIdentidad();
        return $resultado;

    }
    
    public function obtenerNumeroFilasTipoDocumentoIdentidad()
    {         
     
        $resultado = $this->tipodocumento->obtenerNumeroFilasTipoDocumentoIdentidad();
        return $resultado;

    }
     
    public function registrarTipoDocumentoIdentidad($data)
    {               
        $validacion = $this->vtipodocumentoidentidad->duplicadoTipoDocumentoIdentidad($data);
        
        if($validacion!=true){
            $resultado = "El codigo de documento debe ser unico. Intente con otro codigo.";             
        }else{
            $resultado = $this->tipodocumento->insertarTipoDocumentoIdentidad($data);                  
        }
        return $resultado;      
         
    }

    public function editarTipoDocumentoIdentidad($id)
    {
       
        $resultado = $this->tipodocumento->mostrarTipoDocumentoIdentidad($id);
        return json_encode(array('data' => $resultado));
        
    }

    public function modificarTipoDocumentoIdentidad($data)
    {     
         
        $validacion = $this->vtipodocumentoidentidad->duplicadoTipoDocumentoIdentidad($data);
        
        if($validacion!=true){
            $resultado = "El codigo de documento debe ser unico. Intente con otro codigo.";             
        }else{
            $resultado = $this->tipodocumento->actualizarTipoDocumentoIdentidad($data);               
        }
        return $resultado;
         
    }

    public function borrarTipoDocumentoIdentidad($id)
    {
        $resultado = $this->tipodocumento->eliminarTipoDocumentoIdentidad($id);
        return $resultado;
    }
     
    public function modificarIndicadorEstado($id,$estado)
    {    
        $data = [
            'IdTipoDocumentoIdentidad' => $id,
            'IndicadorEstado' => $estado
        ];
        $resultado = $this->tipodocumento->actualizarTipoDocumentoIdentidad($data);
        return $resultado;

    }
     
}