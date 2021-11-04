<?php

namespace App\Operaciones;
class oObtenerCodigoProducto
{

    public function generarCodigoMarca($iniciales_marca)
    {
        $db  = \Config\Database::connect();
        //De la Tabla Producto
        $cod_marca_producto  = $db->table('producto')->like('CodigoProducto', $iniciales_marca)->get();
        $num_marcas_producto = count($cod_marca_producto->getResultArray());
        
        //De la Tabla Kit Producto
        $cod_marca_kit  = $db->table('kitproducto')->like('CodigoKit', $iniciales_marca)->get();
        $num_marcas_kit = count($cod_marca_kit->getResultArray());

        $cod_siguiente = $num_marcas_producto + $num_marcas_kit + 1;
        
        //Obteniendo el Numero de Ceros desde la BD 
        $num_ceros_db = $db->table('configuraciongeneral')->where('IdConfiguracionGeneral',2)->get();
        foreach($num_ceros_db->getResult() as $row) {
            $num_ceros_db=$row->Valor;
        }
        
        if($num_ceros_db=='0'){
            $codigokit=$iniciales_marca.$cod_siguiente;
        }else{
            $codigoConCeros = str_pad($cod_siguiente,intval($num_ceros_db)+1, "0", STR_PAD_LEFT);
            $codigokit=$iniciales_marca.$codigoConCeros;
        }
         
        return $codigokit;
    }

    public function generarCodigoFamilia($iniciales_familia)
    {
        $db  = \Config\Database::connect();
        //De la Tabla Producto
        $cod_familia_producto  = $db->table('producto')->like('CodigoProducto', $iniciales_familia)->get();
        $num_familias_producto = count($cod_familia_producto->getResultArray());
        
        //De la Tabla Kit Producto
        $cod_familia_kit  = $db->table('kitproducto')->like('CodigoKit', $iniciales_familia)->get();
        $num_familias_kit = count($cod_familia_kit->getResultArray());

        $cod_siguiente = $num_familias_producto + $num_familias_kit + 1;

         //Obteniendo el Numero de Ceros desde la BD 
         $num_ceros_db = $db->table('configuraciongeneral')->where('IdConfiguracionGeneral',2)->get();
         foreach($num_ceros_db->getResult() as $row) {
             $num_ceros_db=$row->Valor;
         }

         if($num_ceros_db=='0'){
            $codigokit=$iniciales_familia.$cod_siguiente;
        }else{
            $codigoConCeros = str_pad($cod_siguiente,intval($num_ceros_db)+1, "0", STR_PAD_LEFT);
            $codigokit=$iniciales_familia.$codigoConCeros;
        }
         
        return $codigokit;

    }

    function generarCodigoNumerico()
    {
        $db  = \Config\Database::connect();
        //De la Tabla Producto
        $builder_producto = $db->query("SELECT * FROM producto WHERE CodigoProducto REGEXP '^[0-9]+$'", FALSE);
        $correlativo_producto = $builder_producto->getResultArray();

        //De la Tabla Kit Producto
        $builder_kit = $db->query("SELECT * FROM kitproducto WHERE CodigoKit REGEXP '^[0-9]+$'", FALSE);
        $correlativo_kit = $builder_kit->getResultArray();

        $cod_siguiente = count($correlativo_producto) + count($correlativo_kit) +1;
        
         //Obteniendo el Numero de Ceros desde la BD 
         $num_ceros_db = $db->table('configuraciongeneral')->where('IdConfiguracionGeneral',2)->get();
         foreach($num_ceros_db->getResult() as $row) {
             $num_ceros_db=$row->Valor;
         }

         if($num_ceros_db=='0'){
            $codigokit=$cod_siguiente;
        }else{
            $codigoConCeros = str_pad($cod_siguiente,intval($num_ceros_db)+1, "0", STR_PAD_LEFT);
            $codigokit=$codigoConCeros;
        }
         
        return $codigokit;

    }

    function validarCodigoProducto($CodigoProducto)
    {
        //validamos que no exista en la  BD 
        $CodigoProducto=strtoupper(trim(preg_replace('/( ){2,}/u',' ',$CodigoProducto)));
        $db  = \Config\Database::connect();
        $validacion= $db->table('producto')->select('IdProducto')
        ->where('CodigoProducto', $CodigoProducto)->get();
        if($validacion->getResultArray()==null){
        	//no hace nada
        }else{
            $CodigoProducto='duplicado';

        }
        return $CodigoProducto;
  
    }

    function validarCodigoBarras($CodigoBarras)
    {
        //validamos que no exista en la  BD 
        $CodigoBarras=strtoupper(trim(preg_replace('/( ){2,}/u',' ',$CodigoBarras)));
        $db  = \Config\Database::connect();
        $validacion= $db->table('producto')->select('IdProducto')
        ->where('CodigoBarraProducto', $CodigoBarras)->get();
        if($validacion->getResultArray()==null){
        	//no hace nada
        }else{
            $CodigoBarras='duplicado';

        }
        return $CodigoBarras;
  
    }

}
