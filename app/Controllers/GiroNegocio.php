<?php
namespace App\Controllers;
use App\Bussiness\bGiroNegocio;
use App\Reportes\rGiroNegocio;
class GiroNegocio extends BaseController
{
	public function __construct()
    {
	   $this->gironegocio = new bGiroNegocio();
	   $this->reporte = new rGiroNegocio();
	}
	
	public function index()
	{
        echo view('gironegocio/index');
    }
    
    public function obtenerGirosNegocio()   
	{ 
		$resultado = $this->gironegocio->obtenerGirosNegocio()->getResult();
		echo json_encode($resultado);
	}


	public function registrarGiroNegocio()
	{   
		$data =$_POST;
		$resultado= $this->gironegocio->registrarGiroNegocio($data);
		echo json_encode($resultado);
	}
	
	public function editarGiroNegocio($id){
		$data =$this->gironegocio->editarGiroNegocio($id);
		echo json_encode($data);
	}
   
    public function modificarGiroNegocio(){
		$post = $_POST;
		$resultado= $this->gironegocio->modificarGiroNegocio($post);
		echo json_encode($resultado);
	}

	public function modificarIndicadorEstado($id,$estado){
        $consulta = $this->gironegocio->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
	}

    public function generarReporte($tipo)
	{
		$this->reporte->generarReporte($tipo);
	}

}
