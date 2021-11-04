<?php
namespace App\Controllers;
use App\Bussiness\bEmpresa;


class Empresa extends BaseController
{
	public function __construct()
    {
	   $this->empresa= new bEmpresa();
	}
	
	public function index()
	{
        echo view('empresa/index');
    }
    
    public function obtenerEmpresa()   
	{ 
		$resultado = $this->empresa->obtenerEmpresa()->getResult();
		echo json_encode($resultado);
	}

	public function registrarEmpresa()
	{   
        $data = $_POST;  
        $logo=$this->request->getFile('Foto');
		$resultado= $this->empresa->registrarEmpresa($data,$logo);
		echo json_encode($resultado);
	}
	
	public function editarEmpresa($id){
		$data =$this->empresa->editarEmpresa($id);
		echo json_encode($data);
	}
   
    public function modificarEmpresa(){
		$post = $_POST;
        $logo=$this->request->getFile('Foto');
		$resultado= $this->empresa->modificarEmpresa($post,$logo);
		echo json_encode($resultado);
	}

}
