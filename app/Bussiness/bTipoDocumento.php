<?php namespace App\Bussiness;
use App\Models\mTipoDocumento; 
use App\Validations\vTipoDocumento;

class bTipoDocumento {

    public function __construct()
    {
         
        $this->tipodocumento = new mTipoDocumento(); 
        $this->vtipodocumento = new vTipoDocumento();  

    }

    public function obtenerListadoTipoDocumentos()
    {    
             
        $resultado = $this->tipodocumento->obtenerListadoTipoDocumento();
        return $resultado;

    }
    
    public function obtenerNumeroFilasTipoDocumentos()
    {         
     
        $resultado = $this->tipodocumento->obtenerNumeroFilasTipoDocumento();
        return $resultado;

    }
     
    public function registrarTipoDocumento($data)
    {     
        $validacion = $this->vtipodocumento->duplicadoTipoDocumento($data);         

        if($validacion!=true){
            $resultado = "El codigo, abreviado o nombre del tipo de documento debe ser unico. Intente nuevamente.";
             
        }else{           
            $resultado = $this->tipodocumento->insertarTipoDocumento($data);
                  
        }
        return $resultado;         
         
    }

    public function editarTipoDocumento($id)
    {
       
        $resultado = $this->tipodocumento->mostrarTipoDocumento($id);
        return json_encode(array('data' => $resultado));
        
    }

    public function modificarTipoDocumento($data)
    {      
         
        $validacion = $this->vtipodocumento->duplicadoTipoDocumento($data);         

        if($validacion!=true){
            $resultado = "El codigo, abreviado o nombre del tipo de documento debe ser unico. Intente nuevamente.";
             
        }else{           
            $resultado = $this->tipodocumento->actualizarTipoDocumento($data);
                  
        }
        return $resultado;     
         
         

    }

    public function borrarTipoDocumento($id)
    {
        $resultado = $this->tipodocumento->eliminarTipoDocumento($id);
        return $resultado;
    }
     
    public function modificarIndicadorEstado($id,$estado)
    {    
        $data = [
            'IdTipoDocumento' => $id,
            'IndicadorEstado' => $estado
        ];
        $resultado = $this->tipodocumento->actualizarTipoDocumento($data);
        return $resultado;

    }  
     
}