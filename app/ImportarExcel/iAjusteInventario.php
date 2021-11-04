<?php

namespace App\ImportarExcel;
use App\Models\mInventario;
use App\Models\mResumenInventario;
use App\Validations\vInventario;

class iAjusteInventario{

    public function __construct()
    {
        $this->resumen = new mResumenInventario();
        $this->inventario = new mInventario();
        $this->validarinventario = new vInventario();

    }

    public function importarDatos($file,$data)
	{
        $ext=$file->getClientExtension();
        if($ext=='xls'){
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }else{
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet = $render->load($file);
        $sheet = $spreadsheet->getActiveSheet()->toArray();
        $row_error=array(); //Array para las filas que no se insertaran
        $arrayValores=array('ID','PRODUCTO','UNIDAD_MEDIDA','EQUIVALENTE_UNIDAD','ULTIMO_STOCK','CONTEO_ANTERIOR','CONTEO_ACTUAL','COSTO_UNITARIO','OBSERVACION');
        $arrayColumna=array('A2','B2','C2','D2','E2','F2','G2','H2','I2');
        $validarcolumna=true;
        
        for ($i=0; $i < 9; $i++) {
            $celda=$arrayColumna[$i];
            $nombrecolumna=$arrayValores[$i];
            $valorexcel= $spreadsheet->getActiveSheet()->getCell($celda)->getValue();
            if($nombrecolumna!=$valorexcel){
                $validarcolumna=false;
                $columnaerror=$arrayValores[$i];
                break;
            }
        }

        if($validarcolumna!=true){
            array_push($row_error, "error",$columnaerror); //Error de columnas
        }else{
            //Insertamos un Resumen 

            $data_resumen= [
                'IdSede'           => $data['IdSedeExportar'],
                'FechaInventario'  => $data['FechaInventario'],
                'IdTipoInventario' => 2,
                'Observacion'      => $data['Observacion'],
                'UsuarioRegistro'  => get_current_user(),
                'FechaRegistro'    => date("Y-m-d H:i:s"),
                'EstadoResumenInventario'    => 1 
            ];
            
            $IdResumen= $this->resumen->insertarResumenExcel($data_resumen);
            //Fin Insertar Resumen
            
            foreach ($sheet as $x => $excel) { //$x seria el indice para cada fila
                //Saltar si es la primera fila
                if($x==0 or $x==1){
                    continue;
                }
                $IdInventario=$excel[0];
                $CantidadConteo=$excel[6];
                $CostoUnitarioExcel=$excel[7];
                $ObservacionInventario=$excel[8];
                $UltimoStock=$excel[4];
                $InsertarInventario=true;

                if($IdInventario!='')
                {
                    $DataInventario= $this->resumen->obtenerInventarioExcel($IdInventario);
                    if($DataInventario->getResultArray()==null){
                        $InsertarInventario=false;
                        array_push($row_error,"Fila ".$x." :  No se inserto el Ajuste Inventario de esta fila porque la Columna ID ha sido Modificado,Alternativamente puede descargar de Nuevo el Formato Excel y ver el ID y Modificarlo en su Excel de Ajuste");
                    }else{
                        foreach($DataInventario->getResult() as $row) {
                            $IdProducto=$row->IdProducto;
                            $IdUnidadMedida=$row->IdUnidadMedida;
                            $EquivalenciaUnidad=$row->EquivalenciaUnidad;
                            $CostoUnitario=$row->CostoUnitario;
                            $CostoTotal=$row->CostoTotal;
                            break;
                        }

                        if($CostoUnitario!=$CostoUnitarioExcel and $CostoUnitarioExcel!=''){
                            $CostoUnitario=$CostoUnitarioExcel;
                            $CostoTotal=$CostoUnitarioExcel*$UltimoStock;
                        }

                    }

                }else{
                    $InsertarInventario=false;
                    array_push($row_error,"Fila ".$x." :  No se inserto el Ajuste Inventario de esta fila porque la Columna ID esta en Blanco,Alternativamente puede descargar de Nuevo el Formato Excel y ver el ID y Modificarlo en su Excel de Ajuste");
                }
                
    
                //Evaluacion Para Insertar el Inventario

                if( $InsertarInventario==true){
                    if($CantidadConteo!=''){
                        $Diferencia=$UltimoStock-$CantidadConteo;
                        $data_inventario = [
                            'IdProducto'          => $IdProducto,
                            'IdUnidadMedida'      => $IdUnidadMedida,             
                            'EquivalenciaUnidad'  => $EquivalenciaUnidad,
                            'CostoUnitario'       => $CostoUnitario,
                            'CantidadConteo'      => $CantidadConteo,
                            'CostoTotal'          => $CostoTotal,
                            'Stock'               => $UltimoStock,
                            'Observacion'         => $ObservacionInventario,
                            'Diferencia'          => $Diferencia,
                            'UsuarioRegistro'     => get_current_user(),
                            'FechaRegistro'       => date("Y-m-d H:i:s"),
                            'IdResumenInventario' => $IdResumen,
                            'EstadoInventario'    => 1,
                            'CondicionInventario' => 'Inv.Ajuste'        
                        ];
                        //Insertamos el Inventario 
                        $this->inventario->insertarInventarioExcel($data_inventario);

                        
                        //Actualizamos el Estado del Anterior Inventario
                        $data_inventario_anterior = [
                            'EstadoInventario'       => 0,
                            'FechaModificacion'      => date("Y-m-d H:i:s"),
                            'UsuarioModificacion'    => get_current_user()
                        ];

                        $this->inventario->actualizarInventarioAnteriorExcel($IdInventario,$data_inventario_anterior);

                    }else{
                        array_push($row_error,"Fila ".$x." :  No se inserto el Ajuste Inventario de esta fila porque el Campo CantidadConteo esta en Blanco");
                    }
                
                }            
                //Fin Evaluacion 
               
            }//FIN FOREACH
        }

        return  $row_error;    
    }//FIN IMPORTAR
}