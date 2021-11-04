<?php namespace App\Controllers;
use App\Bussiness\bRegimenTributario;
class RegimenTributario extends BaseController
{
    
    public function __construct()
    {
        $this->model = new bRegimenTributario();        
    }

	public function index()
	{ 
		return view('regimentributario/index');	
    }

    public function mostrarListadoRegimenTributario()
	{
        $resultado = $this->model->obtenerListadoRegimenTributario();
        echo json_encode($resultado);		 
		 
    }
     
    public function registrarRegimenTributario()
    {       
              
        $data = $_POST;         
        $consulta = $this->model->registrarRegimenTributario($data);
        echo json_encode($consulta);   
         
    }
     
    public function editarRegimenTributario($id)
    {       
       
        $consulta = $this->model->editarRegimenTributario($id);
        return $consulta;
         
    }

    public function modificarRegimenTributario()
    {       
       
        $data = $_POST;         
        $consulta = $this->model->modificarRegimenTributario($data);
        echo json_encode($consulta); 
         
    }

    public function borrarRegimenTributario($id)
    {
        $consulta = $this->model->borrarRegimenTributario($id);
        return $consulta;
         
    }

    public function modificarIndicadorEstado($id,$estado)
    {        
         
        $consulta = $this->model->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
    } 
	//--------------------------------------------------------------------

}