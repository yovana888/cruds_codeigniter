<?php
namespace App\Controllers;
use App\Bussiness\bUnidadMedida;
use App\Reportes\rUnidadMedida;
class UnidadMedida extends BaseController
{

	public function __construct()
    {
	  $this->unidadmedida = new bUnidadMedida();
	  $this->reporte = new rUnidadMedida();
	}
	
	public function index()
	{
        echo view('unidadmedida/index');
    }
    
    public function obtenerUnidadesMedida()   
	{ 
		$resultado = $this->unidadmedida->obtenerUnidadesMedida()->getResult();
		echo json_encode($resultado);
	}

	public function registrarUnidadMedida()
	{   
		$data =$_POST;
		$resultado= $this->unidadmedida->registrarUnidadMedida($data);
		echo json_encode($resultado);
	}
	
	public function editarUnidadMedida($id){
		$data =$this->unidadmedida->editarUnidadMedida($id);
		echo json_encode($data);
	}
   
    public function modificarUnidadMedida(){
		$data = $_POST;
		$resultado= $this->unidadmedida->modificarUnidadMedida($data);
		echo json_encode($resultado);
	}

	public function modificarIndicadorEstado($id,$estado){
        $consulta = $this->unidadmedida->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
	}

	public function generarReporte($tipo)
	{
		$this->reporte->generarReporte($tipo);
	}

}
