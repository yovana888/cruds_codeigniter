<?php 
namespace App\Controllers;
use App\Bussiness\bMoneda;

class Monedas extends BaseController
{
	public function index()
	{
		$monedas = new bMoneda();
		//return view('welcome_message');
		print_r($monedas->obtenerTodasMonedas());
	}

	//--------------------------------------------------------------------

}
