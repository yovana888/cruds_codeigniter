<?php
namespace App\Controllers;
use App\Bussiness\bTipoCambio;
use App\Peticiones_Externas\peTipoCambio;
use App\Reportes\rTipocambio;
class TipoCambio extends BaseController
{
	public function __construct()
    {
	   $this->tipocambio = new bTipoCambio();
	   $this->tipocambioHOY = new peTipoCambio();
	   $this->reporte = new rTipoCambio();
	}
	
	public function index()
	{
        $data['monedas'] = $this->tipocambio->obtenerMonedas()->getResult();
        echo view('tipocambio/index',$data);
    }


    public function obtenerTiposCambio()
      {
          $resultado = $this->tipocambio->obtenerTiposCambio()->getResult();
          echo json_encode($resultado);
	  }
	
	  public function registrarTipoCambio()
	  {   
		$data =$_POST;
		$resultado= $this->tipocambio->registrarTipoCambio($data);
		echo json_encode($resultado);
	  }

	  public function editarTipoCambio($id){
		$data =$this->tipocambio->editarTipoCambio($id)->getResult();
		echo json_encode($data);
	  }

	 
	  public function modificarTipoCambio($Id){
		$data = $_POST;
		$resultado= $this->tipocambio->modificarTipoCambio($data,$Id);
		echo json_encode($resultado);
	 }     


	public function modificarIndicadorEstado($id,$estado){
        $consulta = $this->tipocambio->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
	}

	public function obtenerTipoCambioSBS($monedaDestino){
		$data =$this->tipocambioHOY->obtenerTipoCambioSBS($monedaDestino);
		echo json_encode($data);
	}

	public function obtenerTipoCambioOTROS($monedaDestino){
		$data =$this->tipocambioHOY->obtenerTipoCambioOTROS($monedaDestino);
		echo json_encode($data);
	}

	public function generarReporte($tipo)
	{
		$this->reporte->generarReporte($tipo);
	}

}