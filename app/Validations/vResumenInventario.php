<?php
namespace App\Validations;

class vResumenInventario
{    
    public function validarInventario($idproducto,$idsede,$idunidad)
    {
            $db  = \Config\Database::connect();
            $validacion= $db->table('inventario')->select('inventario.IdInventario,inventario.Stock, inventario.CantidadConteo,inventario.CostoUnitario,inventario.CostoTotal,inventario.EquivalenciaUnidad')
            ->join('resumeninventario as r','r.IdResumenInventario=inventario.IdResumenInventario')
            ->where('inventario.IdProducto',$idproducto)
            ->where('r.IdSede',$idsede)
            ->where('inventario.IdUnidadMedida',$idunidad)
            ->where('EstadoInventario',1)
            ->get();
             
             return $validacion;
    }

    public function extraerId($IdInventario,$NombreSede){
        $db  = \Config\Database::connect();

        $inventario= $db->table('inventario')->select('IdProducto,IdUnidadMedida')
        ->where('IdInventario', $IdInventario)->get();
        
        foreach($inventario->getResult() as $row) {
          $IdProducto=$row->IdProducto;
          $IdUnidad=$row->IdUnidadMedida;
        }
  
        $sede=$db->table('sede')->select('IdSede')
        ->where('NombreSede', $NombreSede)->get();
  
        foreach($sede->getResult() as $row) {
          $IdSede=$row->IdSede;
        }

        $data = [
            'IdProducto'      => $IdProducto,
            'IdUnidadMedida'    => $IdUnidad,
            'IdSede'    => $IdSede
        ]; 

        return $data;
    }
  
}
