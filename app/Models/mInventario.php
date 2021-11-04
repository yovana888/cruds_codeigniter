<?php namespace App\Models;

use CodeIgniter\Model;

class mInventario extends Model
{
    
    protected $table      = 'inventario';
    protected $primaryKey = 'IdInventario';
    protected $returnType     = 'array';     
    protected $allowedFields = [
        'IdProducto','IdUnidadMedida','EquivalenciaUnidad','CostoUnitario','CostoTotal','Stock','EstadoInventario','CantidadConteo','Diferencia','Observacion','IdResumenInventario',
        'FechaRegistro','UsuarioRegistro','FechaModificacion','UsuarioModificacion','UsuarioEliminacion','FechaEliminacion','CondicionInventario'];     

    
    public function mostrarInventario($id,$idsede){
            if($idsede==0){
                $datos = $this->db->table('inventario')->select('*,EstadoInventario','m.NombreUnidadMedida','s.NombreSede','r.FechaInventario')
                ->join('resumeninventario as r','r.IdResumenInventario=inventario.IdResumenInventario','left')
                ->join('sede as s','s.IdSede = r.IdSede','left')
                ->join('unidadmedida as m','m.IdUnidadMedida = inventario.IdUnidadMedida','left')
                ->where('inventario.IdProducto',$id)
                ->where('inventario.EstadoInventario', 1)
                ->get();
            }else{
                $datos = $this->db->table('inventario')->select('*,EstadoInventario','m.NombreUnidadMedida','s.NombreSede','r.FechaInventario')
                ->join('resumeninventario as r','r.IdResumenInventario=inventario.IdResumenInventario','left')
                ->join('sede as s','s.IdSede = r.IdSede','left')
                ->join('unidadmedida as m','m.IdUnidadMedida = inventario.IdUnidadMedida','left')
                ->where('inventario.IdProducto',$id)
                ->where('inventario.EstadoInventario', 1)
                ->where('r.IdSede', $idsede)
                ->get();
            }
            return $datos;
    }

    public function insertarInventario($data){
        $data_resumen= [
            'IdSede'              => $data['IdSede'],
            'IdTipoInventario'    => 1,             
            'FechaInventario'     => $data['FechaInventario'],
            'Observacion'         => $data['Observacion'],
            'UsuarioRegistro'     => get_current_user(),
            'FechaRegistro'       => date("Y-m-d H:i:s"),
            'EstadoResumenInventario'    => 1         
        ];

        $this->db->table('resumeninventario')->insert($data_resumen);
        $maxId=$this->db->table('resumeninventario')->selectMax('IdResumenInventario')->get();
        foreach($maxId->getResult() as $row) {
            $ultimoId=$row->IdResumenInventario;
        }

        $data_inventario = [
            'IdProducto'          => $data['IdProducto'],
            'IdUnidadMedida'      => $data['IdUnidadMedida'],             
            'EquivalenciaUnidad'  => $data['EquivalenciaUnidad'],
            'CostoUnitario'       => $data['CostoUnitario'],
            'CantidadConteo'      => $data['CantidadConteo'],
            'CostoTotal'          => $data['CostoTotal'],
            'Stock'               => $data['Stock'],
            'Observacion'         => $data['Observacion'],
            'Diferencia'          => $data['Diferencia'],
            'UsuarioRegistro'     => get_current_user(),
            'FechaRegistro'       =>  date("Y-m-d H:i:s"),
            'IdResumenInventario' => $ultimoId,
            'EstadoInventario'    => 1         
        ];
        $datos = $this->insert($data_inventario);
        return $datos; 
    }


    public function actualizarInventario($data){
        $id = $data['IdInventario'];

    	if(isset($data['EstadoInventario'])){
            //si el estado es ==0 entonces es eliminacion y no inserta un nuevo registro que seria la modificacion
            $data_inventario = [
                    'EstadoInventario'      => 0,
                    'FechaEliminacion'      => date("Y-m-d H:i:s"),
                    'UsuarioEliminacion'    => get_current_user(),
                    'Observacion'           =>'Se elimino'
            ];
            $datos = $this->update($id,$data_inventario);

    	}else{
            //cambiamos el estado del ultomo id_inventario 
	        $data_inventario = [
                'FechaModificacion'      => date("Y-m-d H:i:s"),
                'UsuarioModificacion'    => get_current_user(),
                'EstadoInventario'       =>  0,
	        ];
            $datos = $this->update($id,$data_inventario);

             //insertamos un nuevo registro
             if($data['IdTipoInventario']!=1){
                //insertamos nuevo resumen y seria ajuste de inventario para ese nuevo
                $data_resumen_nuevo= [
                    'IdSede'              => $data['IdSede'],
                    'IdTipoInventario'    => 2,             
                    'FechaInventario'     => $data['FechaInventario'],
                    'Observacion'         => $data['Observacion'],
                    'UsuarioRegistro'     => get_current_user(),
                    'FechaRegistro'       => date("Y-m-d H:i:s"),
                    'EstadoResumenInventario'    => 1         
                ];
        
                $this->db->table('resumeninventario')->insert($data_resumen_nuevo);
                $maxId=$this->db->table('resumeninventario')->selectMax('IdResumenInventario')->get();
                foreach($maxId->getResult() as $row) {
                    $ultimoId=$row->IdResumenInventario;
                }

                $data_inventario_nuevo = [
                    'IdProducto'          => $data['IdProducto'],
                    'IdUnidadMedida'      => $data['IdUnidadMedida'],             
                    'EquivalenciaUnidad'  => $data['EquivalenciaUnidad'],
                    'CostoUnitario'       => $data['CostoUnitario'],
                    'CantidadConteo'      => $data['CantidadConteo'],
                    'CostoTotal'          => $data['CostoTotal'],
                    'Stock'               => $data['Stock'],
                    'Observacion'         => $data['Observacion'],
                    'Diferencia'          => $data['Diferencia'],
                    'UsuarioRegistro'     => get_current_user(),
                    'FechaRegistro'       => date("Y-m-d H:i:s"),
                    'IdResumenInventario' => $ultimoId,
                    'EstadoInventario'    => 1         
                ];
                $datos = $this->insert($data_inventario_nuevo);
                $tipo_inventario=2;

             }else{
                 //solo editamos el resumen en su fecha , y ademas sigue siendo inventario inicial
                 $data_nuevo_inventario=[
                    'IdProducto'          => $data['IdProducto'],
                    'IdUnidadMedida'      => $data['IdUnidadMedida'],             
                    'EquivalenciaUnidad'  => $data['EquivalenciaUnidad'],
                    'CostoUnitario'       => $data['CostoUnitario'],
                    'CantidadConteo'      => $data['CantidadConteo'],
                    'CostoTotal'          => $data['CostoTotal'],
                    'Stock'               => $data['Stock'],
                    'Observacion'         => $data['Observacion'],
                    'Diferencia'          => $data['Diferencia'],
                    'UsuarioRegistro'     => get_current_user(),
                    'FechaRegistro'       => date("Y-m-d H:i:s"),
                    'IdResumenInventario' => $data['IdResumenInventario'],
                    'EstadoInventario'    => 1         
                ];
                
                $datos=$this->insert($data_nuevo_inventario);
              
                
                $data_resumen=[
                    'FechaModificacion'      => date("Y-m-d H:i:s"),
                    'UsuarioModificacion'    => get_current_user()
                ];
                $this->db->table('resumeninventario')->where('IdResumenInventario', $data['IdResumenInventario'])->update($data_resumen);

             }

        }

        return $datos;
    
       
    } 

    public function obtenerSede(){
        $datos = $this->db->table('sede')->where('IdEmpresa',1)->get();
        return $datos;
    }

    public function obtenerUnidadMedida(){
        $datos = $this->db->table('unidadmedida')->orderBy('NombreUnidadMedida', 'ASC');
        return $datos->get();
    }  

    public function editarInventario($id){
        $datos = $this->table('inventario')->select('*,inventario.Observacion as ObservacionInventario')
        ->join('resumeninventario as r','r.IdResumenInventario=inventario.IdResumenInventario','left')
        ->where('inventario.IdInventario',$id)->get();
        return $datos;
    }

    public function mostrarDetalleInventario($id){

        $datos = $this->db->table('inventario')->select('r.FechaRegistro,r.FechaModificacion,r.UsuarioModificacion,r.UsuarioRegistro,inventario.Observacion as ObservacionInventario')
        ->join('resumeninventario as r','r.IdResumenInventario=inventario.IdResumenInventario','left')
        ->where('IdInventario',$id)
        ->get();
        return $datos;
    }

    public function mostrarHistorial($id,$idsede){
        if($idsede==0){
            $datos = $this->db->table('inventario')->select('*,EstadoInventario','m.NombreUnidadMedida','s.NombreSede','r.FechaInventario','ti.NombreTipoInventario')
            ->join('resumeninventario as r','r.IdResumenInventario=inventario.IdResumenInventario','left')
            ->join('sede as s','s.IdSede = r.IdSede','left')
            ->join('tipoinventario as ti','ti.IdTipoInventario = r.IdTipoInventario','left')
            ->join('unidadmedida as m','m.IdUnidadMedida = inventario.IdUnidadMedida','left')
            ->where('inventario.IdProducto',$id)
            ->get();
        }else{
            $datos = $this->db->table('inventario')->select('*,EstadoInventario','m.NombreUnidadMedida','s.NombreSede','r.FechaInventario','ti.NombreTipoInventario')
            ->join('resumeninventario as r','r.IdResumenInventario=inventario.IdResumenInventario','left')
            ->join('sede as s','s.IdSede = r.IdSede','left')
            ->join('tipoinventario as ti','ti.IdTipoInventario = r.IdTipoInventario','left')
            ->join('unidadmedida as m','m.IdUnidadMedida = inventario.IdUnidadMedida','left')
            ->where('inventario.IdProducto',$id)
            ->where('r.IdSede', $idsede)
            ->get();
        }
            return $datos;
    }

    public function insertarInventarioExcel($data)
    {
        $datos = $this->insert($data);
        return $datos;
    }

    public function actualizarInventarioAnteriorExcel($IdInventario,$data_inventario_anterior)
    {
        $datos=$this->db->table('inventario')->where('IdInventario', $IdInventario)->update($data_inventario_anterior);
        return $datos;
    }
}