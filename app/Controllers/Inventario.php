<?php
namespace App\Controllers;
use App\Bussiness\bInventario;
use App\Reportes\rInventario;
use App\Reportes\rInventarioHistorial;
class Inventario extends BaseController
{
	public function __construct()
    {
	   $this->inventario = new bInventario();
       $this->reporte = new rInventario();
       $this->reportehistorial = new rInventarioHistorial();
	}	

    public function index()
	{
        
		$data=[
        'unidad'  => $this->inventario->obtenerUnidadMedida()->getResult(),
        'sede'    => $this->inventario->obtenerSede()->getResult()
         ];
        echo view('inventario/index',$data);
    }

    public function mostrarInventario($id,$idsede)
    {
        $resultado =  $this->inventario->mostrarInventario($id,$idsede)->getResult();
        echo json_encode($resultado);
	}

    public function registrarInventario(){
        $data =$_POST;
		$resultado= $this->inventario->registrarInventario($data);
		echo json_encode($resultado);
    }

    public function editarInventario($id)
    {	 
    	$resultado =  $this->inventario->editarInventario($id)->getResult();
		echo json_encode($resultado);    
	}

    public function modificarInventario()
    {	 
        $data =$_POST;
    	$resultado =  $this->inventario->modificarInventario($data);
		echo json_encode($resultado);    
	}

    public function modificarIndicadorEstado($id,$estado)
    {
        $resultado = $this->inventario->modificarIndicadorEstado($id,$estado);
        echo json_encode($resultado);
    }

    public function mostrarDetalleInventario($id)
    {
        $resultado =  $this->inventario->mostrarDetalleInventario($id)->getResult();
        echo json_encode($resultado);
    }

    public function mostrarHistorial($id,$idsede){
        $resultado =  $this->inventario->mostrarHistorial($id,$idsede)->getResult();
        echo json_encode($resultado);
    }

    public function generarReporte($tipo)
	{
		$this->reporte->generarReporte($tipo);
	}

    public function generarReporteHistorial($tipo)
	{
		$this->reportehistorial->generarReporte($tipo);
	}


}
