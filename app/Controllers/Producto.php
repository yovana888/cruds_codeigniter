<?php
namespace App\Controllers;
use App\Bussiness\bProducto;
use App\Reportes\rProducto;
use App\ImportarExcel\iProducto;
class Producto extends BaseController
{
	public function __construct()
    {
	   $this->producto = new bProducto();
	   $this->reporte = new rProducto();
	   $this->importar = new iProducto();
	}
	
	public function index()
	{
		
		$data=['familiaproducto'   => $this->producto->obtenerFamilias()->getResult(),
			   'lineaproducto'     => $this->producto->obtenerLineas()->getResult(),
			   'categoriaproducto' => $this->producto->obtenerCategorias()->getResult(),
			   'tipoexistencia'    => $this->producto->obtenerExistencias()->getResult(),
			   'tipoactivo'        => $this->producto->obtenerActivos()->getResult(),
			   'tiposervicio'      => $this->producto->obtenerServicios()->getResult(),
			   'marca'             => $this->producto->obtenerMarcas()->getResult(),
			   'fabricante'        => $this->producto->obtenerFabricantes()->getResult(),
			   'unidad'            => $this->producto->obtenerUnidadMedida()->getResult(),
			   'empresa'           => $this->producto->obtenerDatosEmpresa()->getResult(),
               'sede'              => $this->producto->obtenerSede()->getResult(),
			   'tipoinventario'    => $this->producto->obtenerTipoInventario()->getResult()

		];
		
        echo view('producto/index',$data);
	}
	
	public function obtenerProductos($IdSede)
	{
		$resultado =  $this->producto->obtenerProductos($IdSede)->getResult();
		echo json_encode($resultado);
	}

	public function registrarProducto()
	{   
		$data =$_POST;
		$imagen=$this->request->getFile('Foto');//para acceder a todas sus propiedades
		$resultado= $this->producto->registrarProducto($data,$imagen);
		echo json_encode($resultado);
	}

	public function mostrarDetalles($id)
    {
        $resultado =  $this->producto->mostrarDetalles($id)->getResult();
        echo json_encode($resultado);
	}

	public function obtenerSubFamiliaProducto($id)
    {
        $resultado =  $this->producto->obtenerSubFamiliaProducto($id)->getResult();
        echo json_encode($resultado);
	}

	public function obtenerModeloMarca($id)
    {
        $resultado =  $this->producto->obtenerModeloMarca($id)->getResult();
        echo json_encode($resultado);
	}
	
	public function mostrarBarCode($id)
    {
        $resultado =  $this->producto->mostrarBarCode($id);
        echo json_encode($resultado);
	}
	
	public function generarCodigoMarca($iniciales_marca)
	{
	  $resultado = $this->producto->generarCodigoMarca($iniciales_marca);
	  echo json_encode($resultado);
	}

	public function generarCodigoFamilia($iniciales_familia)
	{
	  $resultado = $this->producto->generarCodigoFamilia($iniciales_familia);
	  echo json_encode($resultado);
	}

	public function generarCodigoNumerico()
	{
	  $resultado = $this->producto->generarCodigoNumerico();
	  echo json_encode($resultado);
	}


	public function modificarProducto()
	{
		$imagen=$this->request->getFile('Foto');
		$post = $_POST;
		$resultado= $this->producto->modificarProducto($post,$imagen);
		echo json_encode($resultado);
	}

	public function modificarIndicadorEstado($id,$estado)
	{
        $resultado = $this->producto->modificarIndicadorEstado($id,$estado);
        echo json_encode($resultado);
	}


	public function editarProducto($id)
	{
		$data =$this->producto->editarProducto($id)->getResult();
		echo json_encode($data);
	}
	
	public function generarReporte($tipo,$reporte)
	{   
		$enviaremail=null;
		$data =null;
		$this->reporte->generarReporte($tipo,$reporte,$enviaremail,$data);
	}

	public function enviarReporte($tipo,$reporte)
	{   
		$enviaremail='ok';
		$post = $_POST;
		$resultado=$this->reporte->generarReporte($tipo,$reporte,$enviaremail,$post);
		return $resultado;
	}

	public function decargarFormato()
	{
		$file=__DIR__ . '/../Views/template_importar/importar.xlsx';
		header('Content-type: application/octet-stream');
        header('Content-disposition: attachment; filename='.basename($file));
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        ob_clean();
        flush();
        readfile($file);
	}

	public function importarProducto()
	{
		$data = $_POST;
		$file=$this->request->getFile('archivo_excel');
		$IdSede=$data['IdSede'];
		$idResumenInventario=$this->producto->registrarResumenInventario($data);
		$resultado=$this->importar->importarDatos($file,$idResumenInventario,$IdSede);
		if($resultado[0]=='error'){
			$error=$this->producto->eliminarResumenInventario($idResumenInventario);
		}
		echo json_encode($resultado);
	}

}
