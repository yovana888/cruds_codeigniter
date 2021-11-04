<?php namespace App\Bussiness;
use App\Models\mSubFamiliaProducto; 
use App\Validations\vSubFamiliaProducto; 

class bSubFamiliaProducto {

    public function __construct()
    {
       
        $this->subfamiliaproducto = new mSubFamiliaProducto();
        $this->vsubfamiliaproducto = new vSubFamiliaProducto(); 
    }
 
    public function obtenerListadoSubFamiliaProducto()
    {    
             
        $resultado = $this->subfamiliaproducto->obtenerListadoSubFamiliaProducto();
        return $resultado;

    }

    public function obtenerListadoFamiliaProducto()
    {
        $resultado =  $this->subfamiliaproducto->obtenerListadoFamiliaProducto();
        return $resultado;
    }   

    public function registrarSubFamiliaProducto($data)
    {     
        $validacion = $this->vsubfamiliaproducto->validarDuplicado($data);
        
        if($validacion!=true){
            $resultado = "El nombre de la familia de producto no debe repetirse. Intente nuevamente.";
             
        }else{           
            $resultado = $this->subfamiliaproducto->insertarSubFamiliaProducto($data);
                  
        }
        return $resultado;   
              
    }

    public function editarSubFamiliaProducto($id)
    {
        $resultado = $this->subfamiliaproducto->mostrarSubFamiliaProducto($id);
        return json_encode(array('data' => $resultado));
       
    }

    public function modificarSubFamiliaProducto($data)
    {
        $validacion = $this->vsubfamiliaproducto->validarDuplicado($data);

        if($validacion!=true){
            $resultado = "El nombre del fabricante no debe repetirse. Intente nuevamente.";
             
        }else{           
            $resultado = $this->subfamiliaproducto->actualizarSubFamiliaProducto($data);
                  
        }
        return $resultado;         
    }     
     
    public function modificarIndicadorEstado($id,$estado)
    {         
        $data = [
            'IdSubFamiliaProducto' => $id,
            'EstadoSubFamiliaProducto' => $estado
        ];
        $resultado = $this->subfamiliaproducto->actualizarSubFamiliaProducto($data);
        return $resultado;         
    }    
     
}