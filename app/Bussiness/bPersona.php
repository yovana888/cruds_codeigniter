<?php namespace App\Bussiness;
use App\Models\mPersona; 
use App\Models\mDireccionPersona; 
use App\Validations\vPersona; 

class bPersona {

    public function __construct()
    {
       
        $this->persona = new mPersona();
        $this->direccion = new mDireccionPersona();
        $this->validarpersona = new vPersona(); 
    }
 
    public function obtenerListadoPersona()
    {    
             
        $resultado = $this->persona->obtenerListadoPersona();
        return $resultado;

    }

    public function obtenerListadoTipoPersona()
    {
        $resultado =  $this->persona->obtenerListadoTipoPersona();
        return $resultado;
    }

    public function obtenerListadoTipoDocumentoIdentidad()
    {
        $resultado =  $this->persona->obtenerListadoTipoDocumentoIdentidad();
        return $resultado;
    } 

    public function obtenerListadoRol()
    {
        $resultado =  $this->persona->obtenerListadoRol();
        return $resultado;
    } 

    public function obtenerListadoEstadoCivil()
    {
        $resultado =  $this->persona->obtenerListadoEstadoCivil();
        return $resultado;
    } 


    public function registrarPersona($data,$imagen)
    {     
        $validacion = $this->validarpersona->validarCamposPersona($data);
        
        if($validacion ==='error'){
            $resultado = "La Persona o Empresa ya se encuentra registrado. Intente con otro.";
        }else{           
            $resultado = $this->persona->insertarPersona($data,$imagen);
        }
        return $resultado;   
              
    }

    public function editarPersona($id)
    {
        $resultado = $this->persona->mostrarPersona($id);
        return $resultado;
    }

    public function modificarPersona($data,$imagen)
    {
        $validacion = $this->validarpersona->validarCamposPersona($data);

        if($validacion ==='error'){
            $resultado = "La Persona o Empresa ya se encuentra registrado. Intente con otro.";
             
        }else{           
            $resultado = $this->persona->actualizarPersona($data,$imagen);
                  
        }
        return $resultado;         
    }     
     
    public function modificarIndicadorEstado($id,$estado)
    {         
        $data = [
            'IdPersona' => $id,
            'EstadoPersona' => $estado
        ];
        $imagen='';
        $resultado = $this->persona->actualizarPersona($data,$imagen);
        return $resultado;         
    }
    
    public function buscarPaisNacionalidad($search){
        $query = $this->persona->buscarPaisNacionalidad($search);
        return $query;
    }
    
    public function buscarDepartamentoProvincia($search){
        $query = $this->persona->buscarDepartamentoProvincia($search);
        return $query;
    }

    public function mostrarDetalles($id){
        $query = $this->persona->mostrarDetalles($id);
        return $query;
    }

    public function mostrarDirecciones($id){
        $query = $this->persona->mostrarDirecciones($id);
        return $query;
    }

    public function mostrarRazonSocial($id){
        $query = $this->persona->mostrarRazonSocial($id);
        return $query;
    }

    //Para Direcciones
    public function registrarDireccion($data)
    {     
        $validacion = $this->validarpersona->validarCamposDireccion($data);
        
        if($validacion ==='error'){
            $resultado = "La Direccion ingresada ya se encuentra registrada. Intente con otro.";
        }else{           
            $resultado = $this->direccion->insertarDireccion($data);
        }
        return $resultado;   
              
    }

    public function modificarDireccion($data)
    {     
        $validacion = $this->validarpersona->validarCamposDireccion($data);
        
        if($validacion ==='error'){
            $resultado = "La Direccion ingresada ya se encuentra registrada. Intente con otro.";
        }else{           
            $resultado = $this->direccion->actualizarDireccion($data);
        }
        return $resultado;   
              
    }

    public function modificarEstadoDireccion($id,$estado)
    {         
        $data = [
            'IdDireccionPersona' => $id,
            'EstadoDireccion' => $estado
        ];
        $resultado = $this->direccion->actualizarDireccion($data);
        return $resultado;         
    }



}