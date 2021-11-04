<?php namespace App\Controllers;
use App\Bussiness\bFamiliaProducto;
 
class FamiliaProducto extends BaseController
{    
    public function __construct()
    {
        $this->familiaproducto = new bFamiliaProducto();        
    }

	public function index()
	{ 
		return view('familiaproducto/index');	
    }

    public function mostrarListadoFamiliaProducto()
	{	 
        $resultado = $this->familiaproducto->obtenerListadoFamiliaProducto();
        echo json_encode($resultado);
    }
     
    public function registrarFamiliaProducto()
    {           
        $data = $_POST;         
        $consulta = $this->familiaproducto->registrarFamiliaProducto($data);
        echo json_encode($consulta);         
    }
     
    public function editarFamiliaProducto($id)
    {      
        $consulta = $this->familiaproducto->editarFamiliaProducto($id);
        return $consulta;         
    }

    public function modificarFamiliaProducto()
    {  
        $data = $_POST;         
        $consulta = $this->familiaproducto->modificarFamiliaProducto($data);
        echo json_encode($consulta);           
    }     

	public function modificarIndicadorEstado($id,$estado)
	{         
        $consulta = $this->familiaproducto->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
    }
}
