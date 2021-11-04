<?php namespace App\Controllers;
use App\Bussiness\bFabricante;
 
class Fabricante extends BaseController
{    
    public function __construct()
    {
        $this->fabricante = new bFabricante();        
    }

	public function index()
	{ 
		return view('fabricante/index');	
    }

    public function mostrarListadoFabricante()
	{	 
        $resultado = $this->fabricante->obtenerListadoFabricante();
        echo json_encode($resultado);
    }
     
    public function registrarFabricante()
    {           
        $data = $_POST;         
        $consulta = $this->fabricante->registrarFabricante($data);
        echo json_encode($consulta);        
    }
     
    public function editarFabricante($id)
    {      
        $consulta = $this->fabricante->editarFabricante($id);
        return $consulta;         
    }

    public function modificarFabricante()
    {  
        $data = $_POST;         
        $consulta = $this->fabricante->modificarFabricante($data);
        echo json_encode($consulta);                
    }     
     
	public function modificarIndicadorEstado($id,$estado)
	{        
         
        $consulta = $this->fabricante->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
    }
}
