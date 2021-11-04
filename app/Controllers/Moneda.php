<?php namespace App\Controllers;
use App\Bussiness\bMoneda;
 
class Moneda extends BaseController
{
    
    public function __construct()
    {
        $this->model = new bMoneda();        
    }

	public function index()
	{ 
		return view('moneda/index');	
    }

    public function mostrarlistadoMoneda()
	{
		 
        $resultado = $this->model->obtenerListadoMonedas();
        echo json_encode($resultado);
    }
     
    public function registrarMoneda()
    {       
              
        $data = $_POST;         
        $consulta = $this->model->registrarMoneda($data);
        echo json_encode($consulta);    
          
    }
     
    public function editarMoneda($id)
    {       
       
        $consulta = $this->model->editarMoneda($id);
        return $consulta;
         
    }

    public function modificarMoneda()
    {       
       
        $data = $_POST;         
        $consulta = $this->model->modificarMoneda($data);
        echo json_encode($consulta);    
         
    }

    public function borrarMoneda($id)
    {
        $consulta = $this->model->borrarMoneda($id);
        return $consulta;
         
    }

	public function modificarIndicadorEstado($id,$estado)
	{    
        $consulta = $this->model->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);     
         
    }     

}
