<?php
namespace App\Models;
use CodeIgniter\Model;

class mResumenInventario extends Model
{   
    protected $table              = 'resumeninventario';
    protected $primaryKey         = 'IdResumenInventario';
    protected $returnType         = 'array';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  
    protected $allowedFields      = ['IdSede','IdTipoInventario','FechaInventario','Observacion',
                                     'EstadoResumenInventario','FechaRegistro','UsuarioRegistro',
                                     'UsuarioModificacion','FechaModificacion','UsuarioEliminacion',
                                     'FechaEliminacion'];
   
    public function obtenerResumenInventario($IdSede,$Fecha)
    {
        if($IdSede==0 and $Fecha==0)
        {
            $query = $this->db->table('resumeninventario')->select('*','s.NombreSede','ti.NombreTipoInventario')
            ->join('sede as s','s.IdSede = resumeninventario.IdSede','left')
            ->join('tipoinventario as ti','ti.IdTipoInventario = resumeninventario.IdTipoInventario','left');
        }else if($IdSede!=0 and $Fecha==0){
            $query = $this->db->table('resumeninventario')->select('*','s.NombreSede','ti.NombreTipoInventario')
            ->join('sede as s','s.IdSede = resumeninventario.IdSede','left')
            ->join('tipoinventario as ti','ti.IdTipoInventario = resumeninventario.IdTipoInventario','left')
            ->where('resumeninventario.IdSede',$IdSede);
        }else if($IdSede==0 and $Fecha!=0){
            $query = $this->db->table('resumeninventario')->select('*','s.NombreSede','ti.NombreTipoInventario')
            ->join('sede as s','s.IdSede = resumeninventario.IdSede','left')
            ->join('tipoinventario as ti','ti.IdTipoInventario = resumeninventario.IdTipoInventario','left')
            ->where('resumeninventario.FechaInventario',$Fecha);
        }else{
            $query = $this->db->table('resumeninventario')->select('*','s.NombreSede','ti.NombreTipoInventario')
            ->join('sede as s','s.IdSede = resumeninventario.IdSede','left')
            ->join('tipoinventario as ti','ti.IdTipoInventario = resumeninventario.IdTipoInventario','left')
            ->where('resumeninventario.IdSede',$IdSede)
            ->where('resumeninventario.FechaInventario',$Fecha);
        }
        return $query->get();
    
    }

    public function obtenerSede(){
        $datos = $this->db->table('sede')->where('IdEmpresa',1)->get();
        return $datos;
    }

    public function obtenerTipoInventario(){
        $datos = $this->db->table('tipoinventario')->get();
        return $datos;
    }

    public function obtenerFamilia(){
        $datos = $this->db->table('familiaproducto')->orderBy('NombreFamiliaProducto', 'ASC')->get();
        return $datos;
    }

    public function obtenerUnidadMedida(){
        $datos = $this->db->table('unidadmedida')->orderBy('NombreUnidadMedida', 'ASC');
        return $datos->get();
    }  

    public function insertarResumenInventario($data)
    {   
        $data_resumen= [
            'IdSede'           => $data['IdSede'],
            'FechaInventario'  => $data['FechaInventario'],
            'IdTipoInventario' => $data['IdTipoInventario'],
            'Observacion'      => '-',
            'UsuarioRegistro'  => get_current_user(),
            'FechaRegistro'    => date("Y-m-d H:i:s"),
            'EstadoResumenInventario'    => 1 
        ];
 
        $datos = $this->insert($data_resumen);
        $IdResumenInventario=$this->insertID;
        //Insertamos varios productos con unidades, la validacion se hace en el change del select producto, por tanto insertamos
        $IdProducto=$data['IdProducto'];//esto es un array, al iguial de los que siguen
        $IdUnidadMedida=$data['IdUnidadMedida'];
        $Stock=$data['Stock'];
        $CantidadConteo=$data['CantidadConteo'];
        $CostoUnitario=$data['CostoUnitario'];
        $CostoTotal=$data['CostoTotal'];
        $EquivalenciaUnidad=$data['EquivalenciaUnidad'];

        if($data['IdTipoInventario']==1){
            $CondicionInventario='Inv.Inicial';
        }else{
            $CondicionInventario='Inv.Ajuste';  
            $IdInventario=$data['IdInventario']; //Esto es porque , si es ajuste cargo los datos del anterior inventario, y tenemos que cambiar su estado
            $cont=0;
            while($cont < count($IdInventario)){
                $data_inventario_anterior = [
                    'EstadoInventario'       => 0,
                    'FechaModificacion'      => date("Y-m-d H:i:s"),
                    'UsuarioModificacion'    => get_current_user(),
                    'Observacion'            => $data['Observacion'] //Motivo
                ];
                $this->db->table('inventario')->where('IdInventario', $IdInventario[$cont])->update($data_inventario_anterior);
                $cont++;
            }
        }
        //Insertamos los nuevos inventarios :D
        $cont=0;
        while($cont < count($IdProducto)){
            //Calculamos diferencia
            $Diferencia=$Stock[$cont]-$CantidadConteo[$cont];
            $data_inventario = [
                'IdProducto'          => $IdProducto[$cont],
                'IdUnidadMedida'      => $IdUnidadMedida[$cont],             
                'EquivalenciaUnidad'  => $EquivalenciaUnidad[$cont],
                'CostoUnitario'       => $CostoUnitario[$cont],
                'CantidadConteo'      => $CantidadConteo[$cont],
                'CostoTotal'          => $CostoTotal[$cont],
                'Stock'               => $Stock[$cont],
                'Observacion'         => $data['Observacion'],
                'Diferencia'          => $Diferencia,
                'UsuarioRegistro'     => get_current_user(),
                'FechaRegistro'       => date("Y-m-d H:i:s"),
                'IdResumenInventario' => $IdResumenInventario,
                'EstadoInventario'    => 1,
                'CondicionInventario' => $CondicionInventario      
            ];
            $this->db->table('inventario')->insert($data_inventario);
            $cont++;
        }

        return $datos;
    }

    public function mostrarResumenInventario($id) //mostrar para editar , cargar datos
    {
        $datos = $this->find($id);
        return $datos;
    }

    public function editarInventario($id)
    {
        $datos = $this->db->table('inventario')->select('*,inventario.Observacion as ObservacionInventario')
        ->join('resumeninventario as ri','ri.IdResumenInventario = inventario.IdResumenInventario','left')
        ->join('sede as s','s.IdSede = ri.IdSede','left')
        ->where('inventario.IdInventario',$id);
        return $datos->get();
    }

    public function mostrarDetallesResumenInventario($id) //mostrar usuarios, y la observacion :D
    {
        $datos = $this->find($id);
        return $datos;
    }

    public function actualizarResumenInventario($data)
    {
        $id = $data['IdResumenInventario'];

    	if(isset($data['EstadoResumenInventario'])){
            // entonces es eliminacion, y no puede restaurar :D, mensaje de alerta anticipado, todos los productos con este inventario igual a 0 su estado
                $dataresumen = [
                    'EstadoResumenInventario' => 0,
                    'FechaEliminacion'        => date("Y-m-d H:i:s"),
                    'UsuarioEliminacion'      => get_current_user(),
                    'Observacion'             => $data['Observacion'] //MotivoEliminacion
                ];

            //Cambiando estado de inventario que depende de este  resumen
                $datainventario= [
                    'EstadoInventario'      => 0,
                    'FechaEliminacion'      => date("Y-m-d H:i:s"),
                    'UsuarioEliminacion'    => get_current_user(),
                    'Observacion'           => $data['Observacion'], //MotivoEliminacion
                    'CondicionInventario'   => 'Inv.Eliminado'
                ];
                $this->db->table('inventario')->where('IdResumenInventario', $data['IdResumenInventario'])->update($datainventario);

    	}else{
            //Solo modifocaremos los otros campos, como sede, fecha,etc el tipo no se edita 
                $dataresumen= [
                    'FechaInventario'  => $data['FechaInventario'],
                    'Observacion'      => $data['Observacion'],
                    'FechaModificacion'      => date("Y-m-d H:i:s"),
                    'UsuarioModificacion'    => get_current_user()
                ];

        }
        
        $datos = $this->update($id,$dataresumen);
        return $datos;
    }
    
    public function actualizarInventario($data) //Pasar el idInventario y resumen, antes debe validar que la unidad anterior este en cero o no exista, diferente de este registro
    {
        $id = $data['IdInventario'];
        if(isset($data['EstadoInventario'])){
            //El Usuario quiere eliminar el inventario de ese producto  
            //Cambiamos el estado del inventario, //Donde 3 es eliminado 
            $datainventario = [
                'EstadoInventario'      => 3,
                'FechaEliminacion'      => date("Y-m-d H:i:s"),
                'UsuarioEliminacion'    => get_current_user(),
                'Observacion'           => $data['Observacion'] //MotivoEliminacion
            ];


        }else{
            $diferencia=$data['Stock']-$data['CantidadConteo'];
            $datainventario= [
                'IdUnidadMedida'      => $data['IdUnidadMedida'],             
                'EquivalenciaUnidad'  => $data['EquivalenciaUnidad'],
                'CostoUnitario'       => $data['CostoUnitario'],
                'CantidadConteo'      => $data['CantidadConteo'],
                'CostoTotal'          => $data['CostoTotal'],
                'Stock'               => $data['Stock'],
                'Observacion'         => $data['Observacion'], //MotivoEdicion
                'Diferencia'          => $diferencia,
                'FechaModificacion'      => date("Y-m-d H:i:s"),
                'UsuarioModificacion'    => get_current_user()     
            ];

        }

        $this->db->table('inventario')->where('IdInventario', $id)->update($datainventario);
       
        $dataresumen = [
            'FechaModificacion'      => date("Y-m-d H:i:s"),
            'UsuarioModificacion'    => get_current_user()
        ]; 

        $datos=$this->update($data['IdResumenInventario'],$dataresumen);
        return $datos;
    }
    
    public function buscarProductoInventario($search)
    {
        $result= $this->db->table('producto as p')->select("p.NombreProducto,p.IdProducto,p.CodigoProducto", FALSE)
        ->like('p.NombreProducto', $search)
        ->orlike('p.CodigoProducto', $search)
        ->where('p.EstadoProducto', 1);
        $query =  $result->get();
        return $query;
    }

    public function mostrarProductoResumen($id)
    {
        //id=IdResumenInventario , ademas la sede puede colocarse de titulo , como fecha y estadoresumen
        $result= $this->db->table('inventario')->select('*','p.NombreProducto','m.NombreUnidadMedida')
        ->join('producto as p','p.IdProducto = inventario.IdProducto','left')
        ->join('unidadmedida as m','m.IdUnidadMedida = inventario.IdUnidadMedida','left')
        ->where('inventario.IdResumenInventario', $id);
        $query =  $result->get();
        return $query;
    }

    public function mostrarDetalleInventario($id)
    {
        //id=IdInventario 
        $result= $this->db->table('inventario')->select('*')
        ->where('inventario.IdInventario', $id);
        $query =  $result->get();
        return $query;
    }

    public function mostrarHistorialProductoInventario($data)
    {
      //Por ejemplo quiero ver el historial del producto X con la unidad de medida Caja, desde su I.Inicial hasta I.Ajuste o I.Eliminado Actual x todas las sedes

      $datos = $this->db->table('inventario')->select('*','r.FechaInventario')
      ->join('resumeninventario as r','r.IdResumenInventario=inventario.IdResumenInventario','left')
      ->where('inventario.IdProducto',$data['IdProducto'])
      ->where('inventario.IdUnidadMedida',$data['IdUnidadMedida'])
      ->where('r.IdSede', $data['IdSede'])
      ->get();
      return $datos;

    }

    public function mostrarDetalleHistorial($id)
    {
        //id=IdInventario 
        $result= $this->db->table('inventario')->select('*')
        ->where('inventario.IdInventario', $id);
        
        $query =  $result->get();
        return $query;
    }

    public function obtenerInventarioProductosExcel($IdSede,$IdFamilia)
    {
        $datos = $this->db->table('inventario')->select('inventario.IdInventario,inventario.EquivalenciaUnidad,inventario.CantidadConteo,inventario.Stock,inventario.CostoUnitario,u.NombreUnidadMedida,p.NombreProducto')
        ->join('producto as p','p.IdProducto=inventario.IdProducto','left')
        ->join('resumeninventario as r','r.IdResumenInventario=inventario.IdResumenInventario','left')
        ->join('unidadmedida as u','u.IdUnidadMedida = inventario.IdUnidadMedida','left')
        ->where('r.IdSede',$IdSede)
        ->where('p.IdFamiliaProducto',$IdFamilia)
        ->where('inventario.EstadoInventario', 1)
        ->orderBy('p.NombreProducto', 'ASC')
        ->get();

        return $datos;
    }

    public function insertarResumenExcel($data_resumen)
    {
        $datos = $this->insert($data_resumen);
        $id_ultimo = $this->insertID; 
        return $id_ultimo; 
    }

    public function obtenerInventarioExcel($IdInventario)
    {
        $result= $this->db->table('inventario')->select('*')
        ->where('inventario.IdInventario',$IdInventario);
        $query =  $result->get();
        return $query;
    }


}