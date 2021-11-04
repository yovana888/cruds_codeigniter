<?php namespace App\Controllers;
use App\Bussiness\bTipoDocumento;
class TipoDocumento extends BaseController
{
    
    public function __construct()
    {
        $this->model = new bTipoDocumento();        
    }

	public function index()
	{ 
		return view('tipodocumento/index');	
    }

    public function mostrarListadoTipoDocumentos()
	{
		 
		$resultado = $this->model->obtenerListadoTipoDocumentos();
        echo json_encode($resultado);	
    }
     
    public function registrarTipoDocumento()
    {       
              
        $data = $_POST;         
        $consulta = $this->model->registrarTipoDocumento($data);
        echo json_encode($consulta); 
        
         
    }
     
    public function editarTipoDocumento($id)
    {       
       
        $consulta = $this->model->editarTipoDocumento($id);
        return $consulta;
         
    }

    public function modificarTipoDocumento()
    {       
       
        $data = $_POST;         
        $consulta = $this->model->modificarTipoDocumento($data);
        echo json_encode($consulta); 
         
    }

    public function borrarTipoDocumento($id)
    {
        $consulta = $this->model->borrarTipoDocumento($id);
        return $consulta;
         
    }

	public function modificarIndicadorEstado($id,$estado)
    {    
        $consulta = $this->model->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);     
         
    }  
     

	//--------------------------------------------------------------------

}
