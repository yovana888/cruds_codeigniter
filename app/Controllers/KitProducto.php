<?php
namespace App\Controllers;
use App\Bussiness\bKitProducto;

class KitProducto extends BaseController
{
	public function __construct()
    {
	   $this->kitproducto = new bKitProducto();
	}
	
	public function index()
	{
		$data=['familiaproducto'   => $this->kitproducto->obtenerFamilias()->getResult(),
			   'marca'             => $this->kitproducto->obtenerMarcas()->getResult(),
			   'unidad'            => $this->kitproducto->obtenerUnidadMedida()->getResult()
		];
        echo view('kitproducto/index',$data);
    }
    
    public function obtenerKits()   
	{ 
		$resultado = $this->kitproducto->obtenerKits()->getResult();
		echo json_encode($resultado);
	}

	public function registrarKit()
	{   
		$data =$_POST;
		$resultado= $this->kitproducto->registrarKit($data);
		echo json_encode($resultado);
	}
	
	public function editarKit($id)
	{
		$data =$this->kitproducto->editarKit($id);
		echo json_encode($data);
	}
   
	public function modificarKit()
	{
		$post = $_POST;
		$resultado= $this->kitproducto->modificarKit($post);
		echo json_encode($resultado);
	}

	public function modificarIndicadorEstado($id,$estado)
	{
        $consulta = $this->kitproducto->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
	}

	public function generarCodigoMarca($iniciales_marca)
	{
	  $resultado = $this->kitproducto->generarCodigoMarca($iniciales_marca);
	  echo json_encode($resultado);
	}

	public function generarCodigoFamilia($iniciales_familia)
	{
	  $resultado = $this->kitproducto->generarCodigoFamilia($iniciales_familia);
	  echo json_encode($resultado);
	}

	public function generarCodigoNumerico()
	{
	  $resultado = $this->kitproducto->generarCodigoNumerico();
	  echo json_encode($resultado);
	}

}
