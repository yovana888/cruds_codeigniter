<?php namespace App\Controllers;
use App\Bussiness\bNotaSalida;
use App\Operaciones\oObtenerCorrelativoNota;
 
class NotaSalida extends BaseController
{    
    public function __construct()
    {
        $this->notasalida = new bNotaSalida();    
        $this->obtenercorrelativo = new oObtenerCorrelativoNota();    
    }

	public function index()
	{ 
		echo view('notasalida/index');	
    }

    public function createNotaSalida()
	{ 
        $data=[
			'unidad'          => $this->notasalida->obtenerUnidadMedida()->getResult(),
			'sede'            => $this->notasalida->obtenerListadoSede()->getResult(),
            'tiponotasalida'  => $this->notasalida->obtenerTipoNotaSalida()->getResult(),
            'moneda'          => $this->notasalida->obtenerMoneda()->getResult(),
            'tipodocumento'   => $this->notasalida->obtenerTipoDocumento()->getResult()
        ];
		echo view('notasalida/viewNotaSalida',$data);	
    }

    public function obtenerCorrelativo($IdSede,$IdTipoDocumento)
    {
        $resultado = $this->obtenercorrelativo->obtenerCorrelativoNotaSalida($IdSede,$IdTipoDocumento);
        echo json_encode($resultado);
    }

    public function editNotaSalida()
	{ 
		return view('notasalida/viewNotaSalida');	
    }
}


