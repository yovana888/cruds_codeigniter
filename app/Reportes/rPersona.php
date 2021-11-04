<?php

namespace App\Reportes;
use JasperPHP\JasperPHP;

class rPersona{
    public function generarReporte($tipo,$tipodocumento)
	{
        if($tipodocumento=='RUC'){  //Si es Ruc, muestra otro tipo de reporte, por ej. condicion, razon social,etc
            $input =__DIR__ . '/../Views/Reportes/PersonaRuc.jasper'; 
            $nombrefile='PersonaRuc';
        }else{
            $input =__DIR__ . '/../Views/Reportes/TodoPersona.jasper';
            $nombrefile='TodoPersona';
        }
        $output =__DIR__ . '/../Views/Temporal';   
        $jasper = new JasperPHP;
        $jasper->process(
			$input,
			$output,
			[$tipo],
			[],
			[
				'driver' => 'mysql',
				'username' => 'root',
				'password' => '',
				'host' => 'localhost',
				'database' => 'megan',
				'port' => '3306'
			]
		)->execute();


        //Para PDF VISUALIZA, else Descarga EXCEL
        if($tipo=='pdf'){
            $file=__DIR__ . '/../Views/Temporal/'.$nombrefile.'.pdf';
            header("Content-type: application/pdf");
            header("Content-Disposition: inline; filename=".basename($file));
            ob_clean();
            flush();
            readfile($file);
        }else{
            $file=__DIR__ . '/../Views/Temporal/'.$nombrefile.'.xlsx';
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