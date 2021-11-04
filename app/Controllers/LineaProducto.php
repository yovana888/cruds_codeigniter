<?php namespace App\Controllers;
use App\Bussiness\bLineaProducto;
 
class LineaProducto extends BaseController
{    
    public function __construct()
    {
        $this->lineaproducto = new bLineaProducto();        
    }

	public function index()
	{ 
		return view('lineaproducto/index');	
    }

    public function mostrarListadoLineaProducto()
	{	 
        $resultado = $this->lineaproducto->obtenerListadoLineaProducto();
        echo json_encode($resultado);
    }
     
    public function registrarLineaProducto()
    {           
        $data = $_POST;         
        $consulta = $this->lineaproducto->registrarLineaProducto($data);
        echo json_encode($consulta);         
    }
     
    public function editarLineaProducto($id)
    {      
        $consulta = $this->lineaproducto->editarLineaProducto($id);
        return $consulta;         
    }

    public function modificarLineaProducto()
    {  
        $data = $_POST;         
        $consulta = $this->lineaproducto->modificarLineaProducto($data);
        echo json_encode($consulta);           
    }     
     
	public function modificarIndicadorEstado($id,$estado)
	{        
         
        $consulta = $this->lineaproducto->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
    }
}
