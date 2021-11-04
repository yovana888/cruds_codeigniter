<?php

namespace App\Peticiones_Externas;
use Peru\Jne\DniFactory;

class peConsultarDni
{
    public function consultarDni($dni)
	{
        $factory = new DniFactory();
        $cs = $factory->create();
        $person = $cs->get($dni);
        if (!$person) {
           $person='no encontrado';
        }

        return $person;
    }
}