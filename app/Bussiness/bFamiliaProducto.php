<?php namespace App\Bussiness;
use App\Models\mFamiliaProducto; 
use App\Validations\vFamiliaProducto; 

class bFamiliaProducto {

    public function __construct()
    {
       
        $this->familiaproducto = new mFamiliaProducto();
        $this->vfamiliaproducto = new vFamiliaProducto(); 
    }

    public function obtenerListadoFamiliaProducto()
    {    
             
        $resultado = $this->familiaproducto->obtenerListadoFamiliaProducto();
        return $resultado;

    }     
     
    public function registrarFamiliaProducto($data)
    {     
        $validacion = $this->vfamiliaproducto->validarDuplicado($data);
        
        if($validacion!=true){
            $resultado = "El nombre de la familia de producto no debe repetirse. Intente nuevamente.";
             
        }else{           
            $resultado = $this->familiaproducto->insertarFamiliaProducto($data);
                  
        }
        return $resultado;   
              
    }

    public function editarFamiliaProducto($id)
    {
        $resultado = $this->familiaproducto->mostrarFamiliaProducto($id);
        return json_encode(array('data' => $resultado));
       
    }

    public function modificarFamiliaProducto($data)
    {
        $validacion = $this->vfamiliaproducto->validarDuplicado($data);

        if($validacion!=true){
            $resultado = "El nombre del fabricante no debe repetirse. Intente nuevamente.";
             
        }else{           
            $resultado = $this->familiaproducto->actualizarFamiliaProducto($data);
                  
        }
        return $resultado;         
    }     
     
    public function modificarIndicadorEstado($id,$estado)
    {         
        $data = [
            'IdFamiliaProducto' => $id,
            'EstadoFamiliaProducto' => $estado
        ];
        $resultado = $this->familiaproducto->actualizarFamiliaProducto($data);
        return $resultado;         
    }    
     
}