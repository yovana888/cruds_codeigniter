<?php namespace App\Bussiness;
use App\Models\mRegimenTributario; 
use App\Validations\vRegimenTributario;

class bRegimenTributario {

    public function __construct()
    {
         
        $this->regimentributario = new mRegimenTributario();
        $this->vregimentributario = new vRegimenTributario();  

    }

    public function obtenerListadoRegimenTributario()
    {    
             
        $resultado = $this->regimentributario->obtenerListadoRegimenTributario();
        return $resultado;

    }
    
    public function obtenerNumeroFilasRegimenTributario()
    {         
     
        $resultado = $this->regimentributario->obtenerNumeroFilasRegimenTributario();
        return $resultado;

    }
     
    public function registrarRegimenTributario($data)
    {      

        $validacion = $this->vregimentributario->duplicadoRegimenTributario($data);         

        if($validacion!=true){
            $resultado = "El abreviado o nombre del regimen tributario debe ser unico. Intente nuevamente.";
             
        }else{           
            $resultado = $this->regimentributario->insertarRegimenTributario($data);
                  
        }
        return $resultado;
  
        
         
         
    }

    public function editarRegimenTributario($id)
    {
       
        $resultado = $this->regimentributario->mostrarRegimenTributario($id);
        return json_encode(array('data' => $resultado));
        
    }

    public function modificarRegimenTributario($data)
    {    
        $validacion = $this->vregimentributario->duplicadoRegimenTributario($data);         

        if($validacion!=true){
            $resultado = "El abreviado o nombre del regimen tributario debe ser unico. Intente nuevamente.";
             
        }else{           
            $resultado = $this->regimentributario->actualizarRegimenTributario($data);
                  
        }
        return $resultado;
        
    }

    public function borrarRegimenTributario($id)
    {
        $resultado = $this->regimentributario->eliminarRegimenTributario($id);
        return $resultado;
    }
     
    public function modificarIndicadorEstado($id,$estado)
    {    

        $data = [
            'IdRegimenTributario' => $id,
            'IndicadorEstado' => $estado
        ];
        $resultado = $this->regimentributario->actualizarRegimenTributario($data);
        return $resultado;   

         
    }
     
}