<?php namespace App\Bussiness;
use App\Models\mMoneda; 
use App\Validations\vMoneda; 

class bMoneda {

    public function __construct()
    {
      
        $this->moneda = new mMoneda();
        $this->vmoneda = new vMoneda();         

    }

    public function obtenerListadoMonedas()
    {    
             
        $resultado = $this->moneda->obtenerListadoMonedas();
        return $resultado;

    }
    
    public function obtenerNumeroFilasMonedas()
    {         
     
        $resultado = $this->moneda->obtenerNumeroFilasMonedas();
        return $resultado;

    }
     
    public function registrarMoneda($data)
    {    

        $validacion = $this->vmoneda->duplicadoMoneda($data);         

        if($validacion!=true){
            $resultado = "El nombre de la moneda debe ser unico. Intente nuevamente.";
             
        }else{           
            $resultado = $this->moneda->insertarMoneda($data);
                  
        }
        return $resultado;

              
    }

    public function editarMoneda($id)
    {
        $resultado = $this->moneda->mostrarMoneda($id);
        return json_encode(array('data' => $resultado));
       
    }

    public function modificarMoneda($data)
    {
        $validacion = $this->vmoneda->duplicadoMoneda($data);         

        if($validacion!=true){
            $resultado = "El nombre de la moneda debe ser unico. Intente nuevamente.";
             
        }else{           
            $resultado = $this->moneda->actualizarMoneda($data);
                  
        }
        return $resultado;
        
    }

    public function borrarMoneda($id)
    {
        $resultado = $this->moneda->eliminarMoneda($id);
        return $resultado;
    }
     
    public function modificarIndicadorEstado($id,$estado)
    {    
        $data = [
            'IdMoneda' => $id,
            'IndicadorEstado' => $estado
        ];
        $resultado = $this->moneda->actualizarMoneda($data);
        return $resultado;

    }    
     
}
