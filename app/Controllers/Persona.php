<?php namespace App\Controllers;
use  App\Bussiness\bPersona;
use  App\Reportes\rPersona;
use  App\Peticiones_Externas\peConsultarDni;
use  App\Peticiones_Externas\peConsultarRuc;
class Persona extends BaseController
{    
    public function __construct()
    {
        $this->persona = new bPersona();  
        $this->dni = new peConsultarDni();       
        $this->ruc = new peConsultarRuc();      
        $this->reporte = new rPersona();
    }

	public function index()
	{   
        $data['estadocivil'] = $this->persona->obtenerListadoEstadoCivil()->getResult();
        $data['tipopersona'] = $this->persona->obtenerListadoTipoPersona()->getResult();
        $data['tipodocumentoidentidad'] = $this->persona->obtenerListadoTipoDocumentoIdentidad()->getResult();
        $data['rol'] = $this->persona->obtenerListadoRol()->getResult();
		return view('persona/index',$data);	
    }

    public function mostrarListadoPersona()
	{	 
        $resultado = $this->persona->obtenerListadoPersona()->getResult();
        echo json_encode($resultado);
    }
     
    public function registrarPersona()
    {           
        $data = $_POST;  
        $imagen=$this->request->getFile('Foto');//para acceder a todas sus propiedades       
        $consulta = $this->persona->registrarPersona($data,$imagen);
        echo json_encode($consulta);         
    }
     
    public function editarPersona($id)
    {      
        $consulta = $this->persona->editarPersona($id);
        echo json_encode($consulta);                
    }

    public function modificarPersona()
    {  
        $data = $_POST;  
        $imagen=$this->request->getFile('Foto');//para acceder a todas sus propiedades              
        $consulta = $this->persona->modificarPersona($data,$imagen);
        echo json_encode($consulta);               
    }     

	public function modificarIndicadorEstado($id,$estado)
	{         
        $consulta = $this->persona->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
    }

    public function buscarPaisNacionalidad($search){
        $query = $this->persona->buscarPaisNacionalidad($search)->getResult();
        echo json_encode ($query);
    }
    
    public function buscarDepartamentoProvincia($search){
        $query = $this->persona->buscarDepartamentoProvincia($search)->getResult();
        echo json_encode ($query);
    }

    public function consultarDni($num_documento){
        $query = $this->dni->consultarDni($num_documento);
        echo json_encode ($query);
    }

    public function consultarRuc($num_documento){
        $query = $this->ruc->consultarRuc($num_documento);
        echo json_encode ($query);
    }

    public function mostrarDetalles($id){
        $data['detalle'] = $this->persona->mostrarDetalles($id)->getResult();
        $data['direccion'] = $this->persona->mostrarDirecciones($id)->getResult();
        echo json_encode ($data);
    }

    public function mostrarRazonSocial($id){
        $query = $this->persona->mostrarRazonSocial($id)->getResult();
        echo json_encode ($query);
    }

    public function generarReporte($tipo,$tipodocumento)
	{   
		$this->reporte->generarReporte($tipo,$tipodocumento);
	}

    public function registrarDireccion()
    {
        $data = $_POST;  
        $consulta = $this->persona->registrarDireccion($data);
        echo json_encode($consulta);      
    }

    public function modificarDireccion(){
        $data = $_POST;   
        $consulta = $this->persona->modificarDireccion($data);
        echo json_encode($consulta);  
    }

    public function modificarEstadoDireccion($id,$estado)
    {  
        $consulta = $this->persona->modificarEstadoDireccion($id,$estado);
        echo json_encode($consulta);  
    }
}
