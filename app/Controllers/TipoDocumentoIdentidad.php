<?php namespace App\Controllers;
use App\Bussiness\bTipoDocumentoIdentidad;
class TipoDocumentoIdentidad extends BaseController
{
    
    public function __construct()
    {
        $this->model = new bTipoDocumentoIdentidad();        
    }

	public function index()
	{ 
		return view('tipodocumentoidentidad/index');	
    }

    public function mostrarListadoTipoDocumentoIdentidad()
	{ 
		 	
        $resultado = $this->model->obtenerListadoTipoDocumentoIdentidad();
        echo json_encode($resultado);	
    }
     
    public function registrarTipoDocumentoIdentidad()
    {       
              
        $data = $_POST;         
        $consulta = $this->model->registrarTipoDocumentoIdentidad($data);
        echo json_encode($consulta); 
        
         
    }
     
    public function editarTipoDocumentoIdentidad($id)
    {       
       
        $consulta = $this->model->editarTipoDocumentoIdentidad($id);
        return $consulta;
         
    }

    public function modificarTipoDocumentoIdentidad()
    {       
       
        $data = $_POST;         
        $consulta = $this->model->modificarTipoDocumentoIdentidad($data);
        echo json_encode($consulta); 
         
    }

    public function borrarTipoDocumentoIdentidad($id)
    {
        $consulta = $this->model->borrarTipoDocumentoIdentidad($id);
        return $consulta;
         
    }

	public function modificarIndicadorEstado($id,$estado)
    {    
        $consulta = $this->model->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);     
         
    }
    
    

	//--------------------------------------------------------------------

}