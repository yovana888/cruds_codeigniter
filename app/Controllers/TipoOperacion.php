<?php
namespace App\Controllers;
use App\Bussiness\bTipoOperacion;
use App\Reportes\rTipoOperacion;
class TipoOperacion extends BaseController
{
	public function __construct()
    {
	   $this->tipooperacion = new bTipoOperacion;
	   $this->reporte = new rTipoOperacion();
	}
	
	public function index()
	{
        echo view('tipooperacion/index');
    }
    
    public function obtenerTiposOperacion()   
	{ 
		$resultado = $this->tipooperacion->obtenerTiposOperacion()->getResult();
		echo json_encode($resultado);
	}


	public function registrarTipoOperacion()
	{   
		$data =$_POST;
		$resultado= $this->tipooperacion->registrarTipoOperacion($data);
		echo json_encode($resultado);
	}
	
	public function editarTipoOperacion($id){
		$data =$this->tipooperacion->editarTipoOperacion($id);
		echo json_encode($data);
	}
   
    public function modificarTipoOperacion(){
		$post = $_POST;
		$resultado= $this->tipooperacion->modificarTipoOperacion($post);
		echo json_encode($resultado);
	}

	public function modificarIndicadorEstado($id,$estado){
        $consulta = $this->tipooperacion->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
	}

	public function generarReporte($tipo)
	{
		$this->reporte->generarReporte($tipo);
	}



}
