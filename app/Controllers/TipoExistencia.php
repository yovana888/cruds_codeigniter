<?php
namespace App\Controllers;
use App\Bussiness\bTipoExistencia;
use App\Reportes\rTipoExistencia;

class TipoExistencia extends BaseController
{
	public function __construct()
    {
	   $this->tipoexistencia = new bTipoExistencia();
	   $this->reporte = new rTipoExistencia();
	}
	
	public function index()
	{
        echo view('tipoexistencia/index');
    }
    
    public function obtenerTiposExistencia()   
	{ 
		$resultado = $this->tipoexistencia->obtenerTiposExistencia()->getResult();
		echo json_encode($resultado);
	}


	public function registrarTipoExistencia()
	{   
		$data =$_POST;
		$resultado= $this->tipoexistencia->registrarTipoExistencia($data);
		echo json_encode($resultado);
	}
	
	public function editarTipoExistencia($id){
		$data =$this->tipoexistencia->editarTipoExistencia($id);
		echo json_encode($data);
	}
   
    public function modificarTipoExistencia(){
		$post = $_POST;
		$resultado= $this->tipoexistencia->modificarTipoExistencia($post);
		echo json_encode($resultado);
	}

	public function modificarIndicadorEstado($id,$estado){
        $consulta = $this->tipoexistencia->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
	}

    public function generarReporte($tipo)
	{
		$this->reporte->generarReporte($tipo);
	}

}
