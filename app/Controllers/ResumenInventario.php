<?php
namespace App\Controllers;
use App\Bussiness\bResumenInventario;
use App\ExportarExcel\eFormatoAjusteInventario;
use App\ImportarExcel\iAjusteInventario;
//use App\Reportes\rResumenInventario;

class ResumenInventario extends BaseController
{
	public function __construct()
    {
	   $this->resumen = new bResumenInventario();
	   $this->exportar = new eFormatoAjusteInventario();
	   $this->importar = new iAjusteInventario();
	}
	
	public function index()
	{
		$data=[
			'unidad'          => $this->resumen->obtenerUnidadMedida()->getResult(),
			'sede'            => $this->resumen->obtenerSede()->getResult(),
			'familia'         => $this->resumen->obtenerFamilia()->getResult(),
			'tipoinventario'  => $this->resumen->obtenerTipoInventario()->getResult()
        ];
        echo view('resumeninventario/index',$data);
    }
    
    public function obtenerResumenInventario($IdSede,$Fecha)   
	{ 
		$resultado = $this->resumen->obtenerResumenInventario($IdSede,$Fecha)->getResult();
		echo json_encode($resultado);
	}

	public function registrarResumenInventario()
	{   
		$data =$_POST;
		$resultado= $this->resumen->registrarResumenInventario($data);
		echo json_encode($resultado);
	}
	
	public function editarResumenInventario($id){
		$data =$this->resumen->editarResumenInventario($id);
		echo json_encode($data);
	}

	public function editarInventario($id){
		$data =$this->resumen->editarInventario($id)->getResult();
		echo json_encode($data);
	}
   
    public function modificarResumenInventario()
	{
		$data = $_POST;
		$resultado= $this->resumen->modificarResumenInventario($data);
		echo json_encode($resultado);
	}

	public function modificarInventario()  //Actualiza solo datos del inventario
	{
		$data = $_POST;
		$resultado= $this->resumen->modificarInventario($data);
		echo json_encode($resultado);
	}

	public function mostrarDetallesResumenInventario($id)
	{
		$data =$this->resumen->mostrarDetallesResumenInventario($id)->getResult();
		echo json_encode($data);
	}

	public function buscarProductoInventario($search)
	{
		$data =$this->resumen->buscarProductoInventario($search)->getResult();
		echo json_encode($data);
	}

	public function mostrarProductoResumen($id)  //id=IdResumenInventario
	{
		$data =$this->resumen->mostrarProductoResumen($id)->getResult();
		echo json_encode($data);
	}

	public function mostrarDetalleInventario($id)
	{
		$data =$this->resumen->mostrarDetalleInventario($id)->getResult();
		echo json_encode($data);
	}

	public function mostrarHistorialProductoInventario($IdInventario, $NombreSede)
	{
		$data =$this->resumen->mostrarHistorialProductoInventario($IdInventario, $NombreSede)->getResult();
		echo json_encode($data);
	}

	public function modificarIndicadorEstado($id,$motivo)
	{
        $consulta = $this->resumen->modificarIndicadorEstado($id,$motivo);
        echo json_encode($consulta);
	}

	public function mostrarDetalleHistorial($id) //idinventario
	{
		$data =$this->resumen->mostrarDetalleInventario($id);
		echo json_encode($data);
	}

	public function modificarIndicadorEstadoInventario($idinventario,$idresumen,$motivo)
	{
		$consulta = $this->resumen->modificarIndicadorEstadoInventario($idinventario,$idresumen,$motivo);
        echo json_encode($consulta);
	}

    public function generarReporte($tipo)
	{
		$this->reporte->generarReporte($tipo);
	}
	public function validarInventario($idproducto,$idsede,$idunidad)
	{
		$consulta = $this->resumen->validarInventario($idproducto,$idsede,$idunidad)->getResult();
        echo json_encode($consulta);
	}

	public function exportarExcelAjuste($IdSede,$IdFamilia,$NombreSede,$NombreFamilia)
	{
		$resultado=$this->exportar->exportarDatosExcel($IdSede,$IdFamilia,$NombreSede,$NombreFamilia);
		return $resultado;
	}

	public function importarAjusteInventario()
	{
		$data = $_POST;
		$file=$this->request->getFile('archivo_excel_ajuste');
		$resultado=$this->importar->importarDatos($file,$data);
		echo json_encode($resultado);
	}

}