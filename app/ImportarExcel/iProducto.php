<?php

namespace App\ImportarExcel;
use App\Validations\vProducto;
use App\Models\mProducto;
use App\Models\mInventario;
use App\Validations\vInventario;
use App\Validations\vFamiliaProducto;
use App\Models\mFamiliaProducto;
use App\Validations\vSubFamiliaProducto;
use App\Models\mSubFamiliaProducto;
use App\Validations\vMarca;
use App\Models\mMarca;
use App\Validations\vModeloMarca;
use App\Models\mModeloMarca;
use App\Validations\vFabricante;
use App\Models\mFabricante;
use App\Validations\vLineaProducto;
use App\Models\mLineaProducto;
use App\Operaciones\oObtenerCodigoProducto;

class iProducto{

    public function __construct()
    {
        $this->validarproducto = new vProducto();
        $this->inventario = new mInventario();
        $this->validarinventario = new vInventario();
        $this->validarfamilia = new vFamiliaProducto();
        $this->familia = new mFamiliaProducto();
        $this->validarsubfamilia = new vSubFamiliaProducto();
        $this->subfamilia = new mSubFamiliaProducto();
        $this->validarmarca = new vMarca();
        $this->marca = new mMarca();
        $this->validarmodelo = new vModeloMarca();
        $this->modelo = new mModeloMarca();
        $this->validarfabricante = new vFabricante();
        $this->fabricante = new mFabricante();
        $this->validarlineaproducto = new vLineaProducto();
        $this->lineaproducto = new mLineaProducto();
        $this->obtenercodigo = new oObtenerCodigoProducto();
        $this->producto = new mProducto();
    }

    public function importarDatos($file,$idResumenInventario,$IdSede)
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
        $arrayValores=array('NOMBRE PRODUCTO','NOMBRE_COMERCIAL','UNIDAD_MEDIDA','EQUIVALENCIA_UNIDADES','FAMILIA','SUBFAMILIA','MARCA','MODELO','AUTOGENERAR_CODIGO','CODIGO_PRODUCTO','LINEA_PRODUCTO','FABRICANTE','CATEGORIA_PRODUCTO','TIPO_EXISTENCIA','AUTOGENERAR_COD_BARRAS','CODIGO_BARRAS','OTRO_DATO','STOCK_INICIAL','CANTIDAD_CONTEO','COSTO_UNITARIO','COSTO_TOTAL','OBSERVACION_INVENTARIO');
        $arrayColumna=array('A1','B1','C1','D1','E1','F1','G1','H1','I1','J1','K1','L1','M1','N1','O1','P1','Q1','R1','S1','T1','U1','V1');
        $validarcolumna=true;
        
        for ($i=0; $i < 22; $i++) {
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
            foreach ($sheet as $x => $excel) { //$x seria el indice para cada fila
                //Saltar si es la primera fila
                if($x==0){
                    continue;
                }
                $NombreProducto=$excel[0];
                $NombreComercial=$excel[1];
                $UnidadMedida=$excel[2];
                $EquivalenciaUnidad=$excel[3];
                $NombreFamilia=$excel[4];
                $NombreSubFamilia=$excel[5];
                $NombreMarca=$excel[6];
                $NombreModelo=$excel[7];
                $AutogenerarCodigo=$excel[8];
                $CodigoProducto=$excel[9];
                $NombreLineaProducto=$excel[10];
                $NombreFabricante=$excel[11];
                $CategoriaProducto=$excel[12];
                $TipoExistencia=$excel[13];
                $AutogenerarCodigoBarra=$excel[14];
                $CodigoBarras=$excel[15];
                $OtroDato=$excel[16];
                $StockInicial=$excel[17];
                $CantidadConteo=$excel[18];
                $Diferencia=$StockInicial-$CantidadConteo;
                $CostoUnitario=$excel[19];
                $CostoTotal=$excel[20];
                $ObservacionInventario=$excel[21];
                //Esta variable sirve para evaluar si el producto se va insertar o no a la BD, cpor ej, duplicidad de codigo y codigo de barras
                $InsertarProducto=true;
                
    
                //Evaluacion Si esta en blanco
                if($NombreProducto!="" and $NombreProducto!=null)
                {
                        $NombreProducto=mb_strtoupper(trim(preg_replace('/( ){2,}/u',' ',$NombreProducto))); //Corregimos
                        $IdProducto=  $this->validarproducto->validarImportacion($NombreProducto);
    
                        if ($IdProducto=='') 
                        {
                           //Para el id producto, primero evaluamos los demas campos que depende
                           //1. FAMILIA
                           if($NombreFamilia==''){
                                $IdFamiliaProducto=0;
                           }else{
                                $NombreFamilia=mb_strtoupper(trim(preg_replace('/( ){2,}/u',' ',$NombreFamilia))); //Corregimos
                                $InicialesFamilia=substr($NombreFamilia, 0,4);
                                $IdFamiliaProducto=  $this->validarfamilia->validarImportacion($NombreFamilia);
                                if($IdFamiliaProducto==''){
    
                                    $data_familia = [
                                        'NombreFamiliaProducto'          => $NombreFamilia, 
                                        'InicialesFamiliaNombreProducto' => $NombreFamilia,
                                        'InicialesFamiliaCodigoNombreProducto'=> $InicialesFamilia,
                                        'EstadoFamiliaProducto'  => '1',
                                        'EstadoNoEspecificado'   => '0',
                                        'UsuarioRegistro'        => get_current_user(),
                                        'FechaRegistro'          => date('Y-m-d H:i:s'),
                                        'MaquinaRegistro'        => getenv('COMPUTERNAME')
                                    ];  
                                    $IdFamiliaProducto=$this->familia->insertarFamiliaExcel($data_familia);  //Insertamos la Familia
                                }
                           }
                           
                           //2. SUBFAMILIA
    
                            if($IdFamiliaProducto==0 or $NombreSubFamilia==''){
                                $IdSubFamiliaProducto=0;
                            }else{
                                $NombreSubFamilia=mb_strtoupper(trim(preg_replace('/( ){2,}/u',' ',$NombreSubFamilia))); //Corregimos
                                $IdSubFamiliaProducto=  $this->validarsubfamilia->validarImportacion($NombreSubFamilia,$IdFamiliaProducto);
                                if($IdSubFamiliaProducto==''){
    
                                    $data_subfamilia = [
                                        'NombreSubFamiliaProducto'  => $NombreSubFamilia,
                                        'EstadoSubFamiliaProducto'  => '1',
                                        'EstadoNoEspecificado'   => '0',
                                        'IdFamiliaProducto'      => $IdFamiliaProducto,
                                        'UsuarioRegistro'        => get_current_user(),
                                        'FechaRegistro'          => date('Y-m-d H:i:s'),
                                        'MaquinaRegistro'        => getenv('COMPUTERNAME')
                                    ];  
                                    $IdSubFamiliaProducto=$this->subfamilia->insertarSubFamiliaExcel($data_subfamilia);  //Insertamos 
                                }
                            }
    
                            //3. MARCA
    
                            if($NombreMarca==''){
                                    $IdMarca=0;
                            }else{
                                $NombreMarca=mb_strtoupper(trim(preg_replace('/( ){2,}/u',' ',$NombreMarca))); //Corregimos
                                $InicialesMarca=substr($NombreFamilia, 0,4);
                                $IdMarca=  $this->validarmarca->validarImportacion($NombreMarca);
                                    if($IdMarca==''){
    
                                        $data_marca = [
                                            'NombreMarca'          =>$NombreMarca,
                                            'EstadoMarca'          =>1,
                                            'EstadoNoEspecificado' =>0,
                                            'InicialesMarcaNombreProducto' => $NombreMarca,
                                            'InicialesMarcaCodigoProducto' => $InicialesMarca,
                                            'FechaRegistro'        => date("Y-m-d H:i:s"),
                                            'UsuarioRegistro'      => get_current_user(),
                                            'MaquinaRegistro'      => getenv('COMPUTERNAME')
                                        ];  
                                        $IdMarca=$this->marca->insertarMarcaExcel($data_marca);  //Insertamos
                                    }
                            }
    
                            //4. ModeloMarca
                            if($IdMarca==0 or $NombreModelo==''){
                                $IdModeloMarca=5;
                            }else{
                                $NombreModelo=mb_strtoupper(trim(preg_replace('/( ){2,}/u',' ',$NombreModelo))); //Corregimos
                                $IdModeloMarca=  $this->validarmodelo->validarImportacion($NombreModelo,$IdMarca);
                                if($IdModeloMarca==''){
    
                                    $data_modelo = [
                                        'NombreModeloMarca'          =>$NombreModelo,
                                        'IdMarca'                    =>$IdMarca,
                                        'EstadoModeloMarca'          =>1,
                                        'EstadoNoEspecificado'       =>0, //0 es no No Especificado
                                        'FechaRegistro'              => date("Y-m-d H:i:s"),
                                        'UsuarioRegistro'            => get_current_user(),
                                        'MaquinaRegistro'            => getenv('COMPUTERNAME')
                                    ];  
                                    $IdModeloMarca=$this->modelo->insertarModeloExcel($data_modelo);  //Insertamos 
                                }
                            }
    
                            //4. Fabricante
                            if( $NombreFabricante==''){
                                $IdFabricante=0;
                            }else{
                                $NombreFabricante=mb_strtoupper(trim(preg_replace('/( ){2,}/u',' ',$NombreFabricante))); //Corregimos
                                $IdFabricante=  $this->validarfabricante->validarImportacion($NombreFabricante);
                                if($IdFabricante==''){
    
                                    $data_fabricante = [
                                        'NombreFabricante'           => $NombreFabricante,             
                                        'EstadoFabricante'           => '1',
                                        'EstadoNoEspecificado'       => '0',
                                        'FechaRegistro'              => date("Y-m-d H:i:s"),
                                        'UsuarioRegistro'            => get_current_user(),
                                        'MaquinaRegistro'            => getenv('COMPUTERNAME')
                                    ];  
                                    $IdFabricante=$this->fabricante->insertarFabricanteExcel($data_fabricante);  //Insertamos 
                                }
                            }
    
                             //4. LineaProducto
                            if( $NombreLineaProducto==''){
                                $IdLineaProducto=0;
                            }else{
                                $NombreLineaProducto=mb_strtoupper(trim(preg_replace('/( ){2,}/u',' ',$NombreLineaProducto))); //Corregimos
                                $IdLineaProducto=  $this->validarlineaproducto->validarImportacion($NombreLineaProducto);
                                if($IdLineaProducto==''){
    
                                    $data_linea = [
                                        'NombreLineaProducto'        => $NombreLineaProducto,             
                                        'EstadoLineaProducto'        => '1',
                                        'EstadoNoEspecificado'       => '0',
                                        'FechaRegistro'              => date("Y-m-d H:i:s"),
                                        'UsuarioRegistro'            => get_current_user(),
                                        'MaquinaRegistro'            => getenv('COMPUTERNAME')
                                    ];  
                                    $IdLineaProducto=$this->lineaproducto->insertarLineaProductoExcel($data_linea);  //Insertamos 
                                }
                            }
    
                            //Evaluamos codigoproducto
                            if($CodigoProducto!=''){
                                $ValidarCodigo= $this->obtenercodigo->validarCodigoProducto($CodigoProducto);
                                if($ValidarCodigo=='duplicado'){
                                    $InsertarProducto=false;
                                    array_push($row_error,"Fila ".$x." : No se inserto la fila porque el CodigoProducto que Ingreso ya esta en uso");
                                }else{
                                    $CodigoProducto=$ValidarCodigo;
                                }
                            }else{
                                //Evaluamos por Autogenerado
                                switch($AutogenerarCodigo){
                                    case 'MARCA':
                                        if($NombreMarca!=''){
                                            $CodigoProducto = $this->obtenercodigo->generarCodigoMarca($InicialesMarca);
                                        }else{  //Autogenerar Numericamente
                                            $CodigoProducto= $this->obtenercodigo->generarCodigoNumerico();
                                        }
                                  
                                    break;
    
                                    case 'FAMILIA':
                                        if($NombreFamilia!=''){
                                            $CodigoProducto = $this->obtenercodigo->generarCodigoFamilia($InicialesFamilia);
                                        }else{  //Autogenerar Numericamente
                                            $CodigoProducto= $this->obtenercodigo->generarCodigoNumerico();
                                        }
                                        
                                    break;
                                    default:   $CodigoProducto= $this->obtenercodigo->generarCodigoNumerico();
    
                                }//Fin Switch AutogenerarCodigo
    
                            }//Fin evaluar CodigoProducto
    
    
                            //Categoria Producto
                            $IdCategoriaProducto=explode("-", $CategoriaProducto);
                            $IdCategoriaProducto=$IdCategoriaProducto[0]; //extrae el id
                            if($IdCategoriaProducto==1 or $IdCategoriaProducto==3 or $IdCategoriaProducto==4){
                                $IdTipoProducto=1; 
                            }else if($IdCategoriaProducto==2){
                                $IdTipoProducto=2;
                            }else{
                                $IdCategoriaProducto==0;
                                $IdTipoProducto=1; 
                            }
    
                            //Tipo Existencia
                            $IdTipoExistencia=explode("-", $TipoExistencia);
                            $IdTipoExistencia=$IdTipoExistencia[0]; //extrae el id
                            if(is_numeric ($IdTipoExistencia)==false or $IdTipoExistencia==''){
                                $IdTipoExistencia=0; 
                            }
    
                            //CodigoBarras
                            if($CodigoBarras!=''){
                                $ValidarCodigoBarras=$this->obtenercodigo->validarCodigoBarras($CodigoBarras);
                                if($ValidarCodigoBarras=='duplicado'){
                                    //Significa que el codigo si existe y esta en la BD, aumentamos el error 
                                    $InsertarProducto=false;
                                    array_push($row_error,"Fila ".$x." :  No se inserto la fila porque el Codigo de Barras que Ingreso ya esta en uso");
                                }else {
                                    $CodigoBarras=$ValidarCodigoBarras;
                                }
                            }else{
                                $CodigoBarras=$CodigoProducto;
                            }
    
                            //Evaluamos que no tengamos errores por parte de los codigos 
                            if($InsertarProducto==true){
                                $data_producto = array(
                                    'NombreProducto'          =>$NombreProducto,
                                    'CodigoProducto'          =>$CodigoProducto,
                                    'CodigoComercialProducto' =>$CodigoProducto,
                                    'CodigoBarraProducto'     =>$CodigoBarras,
                                    'NombreComercialProducto' =>$NombreComercial,
                                    'IdCategoriaProducto'     =>$IdCategoriaProducto,
                                    'IdTipoProducto'          =>$IdTipoProducto,
                                    'IdTipoExistencia'        =>$IdTipoExistencia,
                                    'IdTipoServicio'          =>0,
                                    'IdTipoActivo'            =>0,
                                    'IdFamiliaProducto'       =>$IdFamiliaProducto,
                                    'IdSubFamiliaProducto'    =>$IdSubFamiliaProducto,
                                    'IdMarca'                 =>$IdMarca,
                                    'IdModeloMarca'           =>$IdModeloMarca,
                                    'IdLineaProducto'         =>$IdLineaProducto,
                                    'IdFabricante'            =>$IdFabricante,
                                    'Foto'                    =>'add-image.png',
                                    'OtroDato'                =>$OtroDato,
                                    'EstadoProducto'          =>1,
                                    'FechaRegistro'           => date("Y-m-d H:i:s"),
                                    'UsuarioRegistro'         => get_current_user(),
                                    'MaquinaRegistro'         => getenv('COMPUTERNAME')
                                );
                                $IdProducto=$this->producto->insertarProductoExcel($data_producto);  //Insertamos 
    
                            } else{
                                $IdProducto='NO_INSERTAR';
    
                            }
                            
                        }//Fin para generar id producto 
    
                        if($IdProducto!='NO_INSERTAR'){
                              //Insertamos inventario
                              $IdUnidadMedida=explode("-", $UnidadMedida);
                              $IdUnidadMedida=$IdUnidadMedida[0]; //extrae el id
                              if(is_numeric($IdUnidadMedida)==false or $IdUnidadMedida==''){
                                  $EquivalenciaUnidad=1;
                                  $IdUnidadMedida=58;
                              }
                              //Validamos el inventario, que para una solo unidad, una sede, un producto
                                $validacion_inventario=$this->validarinventario->validarImportacion($IdProducto,$IdSede,$IdUnidadMedida);
                                if($validacion_inventario=='error'){
                                    //aumenta en uno el array de la fila que no se va insertar
                                    array_push($row_error,"Fila ".$x." :  No se inserto el Inventario de esta fila porque el Producto ya tiene un Inventario Inicial para esta Sede con esta misma Unidad");
                                }else{
    
                                    if($StockInicial>=0 and $CostoUnitario>=0){
                                        $data_inventario = [
                                            'IdProducto'          => $IdProducto,
                                            'IdUnidadMedida'      => $IdUnidadMedida,             
                                            'EquivalenciaUnidad'  => $EquivalenciaUnidad,
                                            'CostoUnitario'       => $CostoUnitario,
                                            'CantidadConteo'      => $CantidadConteo,
                                            'CostoTotal'          => $CostoTotal,
                                            'Stock'               => $StockInicial,
                                            'Observacion'         => $ObservacionInventario,
                                            'Diferencia'          => $Diferencia,
                                            'UsuarioRegistro'     => get_current_user(),
                                            'FechaRegistro'       => date("Y-m-d H:i:s"),
                                            'IdResumenInventario' => $idResumenInventario,
                                            'EstadoInventario'    => 1,
                                            'CondicionInventario' => 'Inv.Inicial'        
                                        ];
                        
                                        $this->inventario->insertarInventarioExcel($data_inventario);
                                   }else{
                                    array_push($row_error,"Fila ".$x." :  No se inserto el Inventario de esta fila porque el Stock o Costo Unitario debe ser mayor o igual a cero");
                                   }
                                }
                        }//Caso Contrario no inserta producto ni inventario y continua con el siguiente registro
    
                }else{
                    continue;
                }                
                //Fin Evaluacion 
               
            }//FIN FOREACH
        }

        return  $row_error;    
    }//FIN IMPORTAR
}