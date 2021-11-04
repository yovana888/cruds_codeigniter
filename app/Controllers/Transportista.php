<?php
namespace App\Controllers;
use App\Bussiness\bTransportista;
use App\Reportes\rTransportista;

class Transportista extends BaseController
{
	public function __construct()
    {
	   $this->transportista = new bTransportista();
	   $this->reporte = new rTransportista();
	}
	
	public function index()
	{
		$data['tipodocumentoidentidad'] = $this->transportista->obtenerListadoTipoDocumentoIdentidad()->getResult();
        $data['tipopersona'] = $this->transportista->obtenerListadoTipoPersona()->getResult();
		$data['estadocivil'] = $this->transportista->obtenerListadoEstadoCivil()->getResult();
		$data['rol'] = $this->transportista->obtenerListadoRol()->getResult();
        echo view('transportista/index',$data);
    }
    
    public function obtenerTransportistas()   
	{ 
		$resultado = $this->transportista->obtenerTransportistas()->getResult();
		echo json_encode($resultado);
	}


	public function registrarPersonaTransportista()
	{   
		$data = $_POST;  
        $imagen=$this->request->getFile('Foto');//para acceder a todas sus propiedades    
		$resultado= $this->transportista->registrarPersonaTransportista($data,$imagen);
		echo json_encode($resultado);
	}

	public function registrarTransportista()
	{   
		$data = $_POST;  
		$imagen=$this->request->getFile('Foto');//para acceder a todas sus propiedades 
		$resultado= $this->transportista->registrarTransportista($data,$imagen);
		echo json_encode($resultado);
	}
	
	public function editarTransportista($id){
		$data =$this->transportista->editarTransportista($id)->getResult();
		echo json_encode($data);
	}
   
    public function modificarTransportista(){ 
        $imagen=$this->request->getFile('Foto');//para acceder a todas sus propiedades    
		$post = $_POST;
		$resultado= $this->transportista->modificarTransportista($post,$imagen);
		echo json_encode($resultado);
	}

	public function modificarIndicadorEstado($id,$estado){
        $consulta = $this->transportista->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
	}

    public function generarReporte($tipo)
	{
		$this->reporte->generarReporte($tipo);
	}

	public function buscarPersona($search){
        $query = $this->transportista->buscarPersona($search)->getResult();
        echo json_encode ($query);
    }

}