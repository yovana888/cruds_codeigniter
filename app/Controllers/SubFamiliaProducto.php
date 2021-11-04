<?php namespace App\Controllers;
use App\Bussiness\bSubFamiliaProducto;
 
class SubFamiliaProducto extends BaseController
{    
    public function __construct()
    {
        $this->subfamiliaproducto = new bSubFamiliaProducto();        
    }

	public function index()
	{ 
        $data['familiaproducto'] = $this->subfamiliaproducto->obtenerListadoFamiliaProducto()->getResult();
		return view('subfamiliaproducto/index',$data);	
    }

    public function mostrarListadoSubFamiliaProducto()
	{	 
        $resultado = $this->subfamiliaproducto->obtenerListadoSubFamiliaProducto()->getResult();
        echo json_encode($resultado);
    }
     
    public function registrarSubFamiliaProducto()
    {           
        $data = $_POST;         
        $consulta = $this->subfamiliaproducto->registrarSubFamiliaProducto($data);
        echo json_encode($consulta);         
    }
     
    public function editarSubFamiliaProducto($id)
    {      
        $consulta = $this->subfamiliaproducto->editarSubFamiliaProducto($id);
        return $consulta;         
    }

    public function modificarSubFamiliaProducto()
    {  
        $data = $_POST;         
        $consulta = $this->subfamiliaproducto->modificarSubFamiliaProducto($data);
        echo json_encode($consulta);               
    }     

	public function modificarIndicadorEstado($id,$estado)
	{         
        $consulta = $this->subfamiliaproducto->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
    }
}
