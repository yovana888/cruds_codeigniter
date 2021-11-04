<?php
namespace App\Validations;

class vInventario
{    
    public function validarCamposInventario($data)
    {
        $db  = \Config\Database::connect();
        $IdProducto = $data['IdProducto'];
        $IdSede =$data['IdSede'];
        $IdUnidadMedida=$data['IdUnidadMedida'];

        if(empty($data['IdInventario'])){
            $validacion= $db->table('inventario')->join('resumeninventario as r','r.IdResumenInventario=inventario.IdResumenInventario')
            ->where('inventario.IdProducto',$IdProducto)
            ->where('r.IdSede',$IdSede)
            ->where('inventario.IdUnidadMedida',$IdUnidadMedida)
            ->where('inventario.EstadoInventario',1)
            ->get();
        }else{
            $validacion= $db->table('inventario')->join('resumeninventario as r','r.IdResumenInventario=inventario.IdResumenInventario')
            ->where('inventario.IdProducto',$IdProducto)
            ->where('r.IdSede',$IdSede)
            ->where('IdUnidadMedida',$IdUnidadMedida)
            ->where('inventario.EstadoInventario',1)
            ->where('inventario.IdInventario !=', $data['IdInventario'])
            ->get();
        	     
        }

        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
        	$mensaje='error';
        }
        return $mensaje;
    }

    public function validarImportacion($IdProducto,$IdSede,$IdUnidadMedida){
        $db  = \Config\Database::connect();
        $validacion= $db->table('inventario')->join('resumeninventario as r','r.IdResumenInventario=inventario.IdResumenInventario')
            ->where('IdProducto',$IdProducto)
            ->where('r.IdSede',$IdSede)
            ->where('IdUnidadMedida',$IdUnidadMedida)
            ->where('EstadoInventario',1)
            ->get();
        
            if($validacion->getResultArray()==null){
                $mensaje='';
            }else{
                $mensaje='error';
            }
            return $mensaje;
    }
}
