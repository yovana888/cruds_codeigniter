<?php

namespace App\Reportes;
use JasperPHP\JasperPHP;


class rProducto{
    public function generarReporte($tipo,$reporte,$enviaremail,$post)
	{

		$input =__DIR__ . '/../Views/Reportes/'.$reporte.'.jasper'; 
		$output =__DIR__ . '/../Views/Temporal';    
		
		$jasper = new JasperPHP;
        $jasper->process(
			$input,
			$output,
			[$tipo],
			[],  //PARAMETROS
			[
				'driver' => 'mysql',
				'username' => 'root',
				'password' => '',
				'host' => 'localhost',
				'database' => 'megan',
				'port' => '3306'
			]
		)->execute();
        
		$file =__DIR__ . '/../Views/Temporal/'.$reporte.'.'.$tipo;

		if($enviaremail=='ok')
		{
			$to=$post['EmailReceptor'];
			$asunto=$post['Asunto'];
			$mensaje=$post['Mensaje'];

			$email=\Config\Services::email();
			$email->setFrom('cpe@meganperu.com','Reporte'); //modificar correo de la empresa traer de la BD o Auth Google u Otro
			$email->setTo($to);
			$email->setSubject($asunto);
			$email->setMessage($mensaje);
			$email->attach($file);

			if($email->send()){
               $mensaje="ok";
			}else{
               $mensaje=$email->printDebugger(['headers']);
			}
			return $mensaje;
	    }else{ 
			header('Content-type: application/octet-stream');
			header('Content-disposition: attachment; filename='.basename($file));
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			ob_clean();
			flush();
			readfile($file);
		}
	}
}