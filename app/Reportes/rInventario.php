<?php

namespace App\Reportes;
use JasperPHP\JasperPHP;

class rInventario{
    public function generarReporte($tipo)
	{
        $input =__DIR__ . '/../Views/Reportes/Inventario.jasper'; 
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


        $file=__DIR__ . '/../Views/Temporal/Inventario.'.$tipo;

        //Para PDF VISUALIZA, else Descarga EXCEL
        if($tipo=='pdf'){
            header("Content-type: application/pdf");
            header("Content-Disposition: inline; filename=".basename($file));
            ob_clean();
            flush();
            readfile($file);
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