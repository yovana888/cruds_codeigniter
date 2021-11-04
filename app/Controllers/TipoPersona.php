<?php
namespace App\Controllers;
use App\Bussiness\bTipoPersona;
use App\Reportes\rTipoPersona;

class TipoPersona extends BaseController
{

	public function __construct()
    {
	  $this->tipopersona = new bTipoPersona();
	  $this->reporte = new rTipoPersona();
	}
	
	public function index()
	{
        echo view('tipopersona/index');
    }
    
    public function obtenerTiposPersona()   
	{ 
		$resultado = $this->tipopersona->obtenerTiposPersona()->getResult();
		echo json_encode($resultado);
	}

	public function registrarTipoPersona()
	{   
		$data =$_POST;
		$resultado= $this->tipopersona->registrarTipoPersona($data);
	    echo json_encode($resultado);
	}
	
	public function editarTipoPersona($id){
		$data =$this->tipopersona->editarTipoPersona($id);
		echo json_encode($data);
	}
   
    public function modificarTipoPersona(){
		$post = $_POST;
		$resultado= $this->tipopersona->modificarTipoPersona($post);
		echo json_encode($resultado);
	}

	public function modificarIndicadorEstado($id,$estado){
        $resultado = $this->tipopersona->modificarIndicadorEstado($id,$estado);
        echo json_encode($resultado);
	}

	public function generarReporte($tipo)
	{
		$this->reporte->generarReporte($tipo);
	}

	
  
}

