<?php
namespace App\Controllers;
use App\Bussiness\bModeloMarca;
use App\Reportes\rModeloMarca;

class ModeloMarca extends BaseController
{
	public function __construct()
    {
	   $this->modelomarca = new bModeloMarca();
	   $this->reporte = new rModeloMarca();
	}
	
	public function index()
	{
		$data['marcas'] = $this->modelomarca->obtenerMarcas()->getResult();
        echo view('modelomarca/index',$data);
    }
    
    public function obtenerModelosMarca()   
	{ 
		$resultado = $this->modelomarca->obtenerModelosMarca()->getResult();
		echo json_encode($resultado);
	}


	public function registrarModeloMarca()
	{   
		$data =$_POST;
		$resultado= $this->modelomarca->registrarModeloMarca($data);
		echo json_encode($resultado);
	}
	
	public function editarModeloMarca($id){
		$data =$this->modelomarca->editarModeloMarca($id);
		echo json_encode($data);
	}
   
    public function modificarModeloMarca(){
		$post = $_POST;
		$resultado= $this->modelomarca->modificarModeloMarca($post);
		echo json_encode($resultado);
	}

	public function modificarIndicadorEstado($id,$estado){
        $consulta = $this->modelomarca->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
	}

    public function generarReporte($tipo)
	{
		$this->reporte->generarReporte($tipo);
	}

}
