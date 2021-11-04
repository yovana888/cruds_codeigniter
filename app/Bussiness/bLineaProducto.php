<?php namespace App\Bussiness;
use App\Models\mLineaProducto; 
use App\Validations\vLineaProducto; 

class bLineaProducto {

    public function __construct()
    {
       
        $this->lineaproducto = new mLineaProducto();
        $this->vlineaproducto = new vLineaProducto(); 
    }

    public function obtenerListadoLineaProducto()
    {    
             
        $resultado = $this->lineaproducto->obtenerListadoLineaProducto();
        return $resultado;

    }     
     
    public function registrarLineaProducto($data)
    {     
        $validacion = $this->vlineaproducto->validarDuplicado($data);
        
        if($validacion!=true){
            $resultado = "El nombre de la linea de producto no debe repetirse. Intente nuevamente.";
             
        }else{           
            $resultado = $this->lineaproducto->insertarLineaProducto($data);
                  
        }
        return $resultado;   
              
    }

    public function editarLineaProducto($id)
    {
        $resultado = $this->lineaproducto->mostrarLineaProducto($id);
        return json_encode(array('data' => $resultado));
       
    }

    public function modificarLineaProducto($data)
    {
        $validacion = $this->vlineaproducto->validarDuplicado($data);

        if($validacion!=true){
            $resultado = "El nombre de la linea de producto no debe repetirse. Intente nuevamente.";
             
        }else{           
            $resultado = $this->lineaproducto->actualizarLineaProducto($data);
                  
        }
        return $resultado;         
    }     
     
    public function modificarIndicadorEstado($id,$estado)
    {         
        $data = [
            'IdLineaProducto' => $id,
            'EstadoLineaProducto' => $estado
        ];
        $resultado = $this->lineaproducto->actualizarLineaProducto($data);
        return $resultado;         
    }    
     
}