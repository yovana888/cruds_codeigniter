<?php namespace App\Bussiness;
use App\Models\mFabricante; 
use App\Validations\vFabricante; 

class bFabricante {

    public function __construct()
    {
       
        $this->fabricante = new mFabricante();
        $this->vfabricante = new vFabricante(); 
    }

    public function obtenerListadoFabricante()
    {    
             
        $resultado = $this->fabricante->obtenerListadoFabricante();
        return $resultado;

    }     
     
    public function registrarFabricante($data)
    {     
        $validacion = $this->vfabricante->validarDuplicado($data);
        
        if($validacion!=true){
            $resultado = "El nombre del fabricante no debe repetirse. Intente nuevamente.";
             
        }else{           
            $resultado = $this->fabricante->insertarFabricante($data);
                  
        }
        return $resultado;   
              
    }

    public function editarFabricante($id)
    {
        $resultado = $this->fabricante->mostrarFabricante($id);
        return json_encode(array('data' => $resultado));
       
    }

    public function modificarFabricante($data)
    {
        $validacion = $this->vfabricante->validarDuplicado($data);

        if($validacion!=true){
            $resultado = "El nombre del fabricante no debe repetirse. Intente nuevamente.";
             
        }else{           
            $resultado = $this->fabricante->actualizarFabricante($data);
                  
        }
        return $resultado;         
    }     
     
    public function modificarIndicadorEstado($id,$estado)
    {         
        $data = [
            'IdFabricante' => $id,
            'EstadoFabricante' => $estado
        ];
        $resultado = $this->fabricante->actualizarFabricante($data);
        return $resultado;         
    }    
     
}