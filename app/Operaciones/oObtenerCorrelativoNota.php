<?php
namespace App\Operaciones;
class oObtenerCorrelativoNota
{
    public function obtenerCorrelativoNotaSalida($IdSede,$IdTipoDocumento)
    {
        $db  = \Config\Database::connect();
        
        $serie= $db->table('serie')->select('Serie,CorrelativoInicial,TotalCeros')
        ->where('IdSede',$IdSede)
        ->where('IdTipoDocumento',$IdTipoDocumento)
        ->where('Estado',1)
        ->get(); 
        //Puede crear mas de una serie, por ejemplo NS01 para Nota de Salida llega  
        //con correlativo a 2000 y es por este año, y al año que viene deciden crear otra serie, 
        //entonces el ultimo se desactiva y crea otro serie con estado activo, claro validando que otra sede no lo use
        if($serie->getResultArray()==null){ //No hay serie para esa sede con ese tipo de documento
           $respuesta ='crearserie';
        }else{
            
            foreach($serie->getResult() as $row) {
                $serie=$row->Serie;
                $correlativoinicial=$row->CorrelativoInicial;
                $totalceros=$row->TotalCeros;
            }
    
            $ultimocorrelativo=$db->table('notasalida')->selectMax('Numero')
            ->where('IdSede',$IdSede)
            ->where('Serie',$serie)
            ->get();
            
            if($ultimocorrelativo->getResultArray()==null){ //no se creo ningun documento aun
                $correlativo_siguiente=$correlativoinicial;
            }else{
                foreach($ultimocorrelativo->getResultArray() as $row) {
                    $correlativo_siguiente=$row['Numero'];
                }
                $correlativo_siguiente=intval($correlativo_siguiente)+1;
            }
            
    
            if($totalceros=='0'){
                $newcorrelativo=$correlativo_siguiente;
            }else{
                $newcorrelativo = str_pad($correlativo_siguiente,intval($totalceros)+1, "0", STR_PAD_LEFT);
            }
            
            $respuesta = ['newcorrelativo' => $newcorrelativo, 'serie' => $serie];
        }

        return $respuesta;
    }
}