<?php

namespace App\Peticiones_Externas;
use Peru\Sunat\RucFactory;

class peConsultarRuc
{
    public function consultarRuc($ruc)
	{
        $factory = new RucFactory();
        $cs = $factory->create();

        $company = $cs->get($ruc);
        if (!$company) {
            $company='no encontrado';
        }
        
        return $company;
    }
}