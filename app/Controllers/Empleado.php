<?php
namespace App\Controllers;
use App\Bussiness\bEmpleado;
use App\Reportes\rEmpleado;

class Empleado extends BaseController
{
	public function __construct()
    {
	   $this->empleado = new bEmpleado();
	   $this->reporte = new rEmpleado();
	}
	
	public function index()
	{
		$data['tipodocumentoidentidad'] = $this->empleado->obtenerListadoTipoDocumentoIdentidad()->getResult();
        $data['tipopersona'] = $this->empleado->obtenerListadoTipoPersona()->getResult();
		$data['estadocivil'] = $this->empleado->obtenerListadoEstadoCivil()->getResult();
		$data['rol'] = $this->empleado->obtenerListadoRol()->getResult();
        $data['sede'] = $this->empleado->obtenerListadoSede()->getResult();
        echo view('empleado/index',$data);
    }
    
    public function obtenerEmpleados()   
	{ 
		$resultado = $this->empleado->obtenerEmpleados()->getResult();
		echo json_encode($resultado);
	}


	public function registrarPersonaEmpleado()
	{   
		$data = $_POST;  
        $imagen=$this->request->getFile('Foto');//para acceder a todas sus propiedades    
		$resultado= $this->empleado->registrarPersonaEmpleado($data,$imagen);
		echo json_encode($resultado);
	}

	public function registrarEmpleado()
	{   
		$data = $_POST;  
		$imagen=$this->request->getFile('Foto');//para acceder a todas sus propiedades 
		$resultado= $this->empleado->registrarEmpleado($data,$imagen);
		echo json_encode($resultado);
	}
	
	public function editarEmpleado($id){
		$data =$this->empleado->editarEmpleado($id)->getResult();
		echo json_encode($data);
	}
   
    public function modificarEmpleado(){ 
        $imagen=$this->request->getFile('Foto');//para acceder a todas sus propiedades    
		$post = $_POST;
		$resultado= $this->empleado->modificarEmpleado($post,$imagen);
		echo json_encode($resultado);
	}

	public function modificarIndicadorEstado($id,$estado){
        $consulta = $this->empleado->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
	}

    public function generarReporte($tipo)
	{
		$this->reporte->generarReporte($tipo);
	}

	public function buscarPersona($search){
        $query = $this->empleado->buscarPersona($search)->getResult();
        echo json_encode ($query);
    }

}