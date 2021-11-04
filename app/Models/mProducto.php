<?php
namespace App\Models;
use CodeIgniter\Model;

class mProducto extends Model
{   
    protected $table              = 'producto';
    protected $primaryKey         = 'IdProducto';
    protected $returnType         = 'array';    
    protected $allowedFields      = ['CodigoProducto','CodigoComercialProducto','CodigoBarraProducto','NombreProducto','NombreComercialProducto',
                                     'IdCategoriaProducto','IdTipoProducto','IdTipoExistencia','IdTipoServicio','IdTipoActivo','IdFamiliaProducto',
                                     'IdSubFamiliaProducto','IdMarca','IdModeloMarca','IdLineaProducto','IdFabricante','IdTipoPrecio','Foto',
                                     'OtroDato','EstadoProducto','Foto','MaquinaRegistro','FechaRegistro','UsuarioRegistro',
                                     'UsuarioModificacion','FechaModificacion','MaquinaModificacion','UsuarioEliminacion',
                                     'FechaEliminacion','Foto','MaquinaEliminacion'];

    public function obtenerProductos($IdSede)
    {
        if($IdSede==0){
            $query = $this->db->table('producto')->select('*,producto.EstadoProducto',
            'fp.NombreFamiliaProducto','sf.NombreSubFamiliaProducto','m.NombreMarca','mm.NombreModeloMarca')
             ->join('familiaproducto as fp', 'fp.IdFamiliaProducto = producto.IdFamiliaProducto','left')
             ->join('subfamiliaproducto as sf', 'sf.IdSubFamiliaProducto = producto.IdSubFamiliaProducto','left')
             ->join('marca as m', 'm.IdMarca = producto.IdMarca','left')
             ->join('modelomarca as mm', 'mm.IdModeloMarca = producto.IdModeloMarca','left');
        }else{
            $query = $this->db->table('producto')->select('*,producto.EstadoProducto',
            'fp.NombreFamiliaProducto','sf.NombreSubFamiliaProducto','m.NombreMarca','mm.NombreModeloMarca')
             ->join('familiaproducto as fp', 'fp.IdFamiliaProducto = producto.IdFamiliaProducto','left')
             ->join('subfamiliaproducto as sf', 'sf.IdSubFamiliaProducto = producto.IdSubFamiliaProducto','left')
             ->join('marca as m', 'm.IdMarca = producto.IdMarca','left')
             ->join('modelomarca as mm', 'mm.IdModeloMarca = producto.IdModeloMarca','left')
             ->join('inventario as i', 'i.IdProducto = producto.IdProducto','left')
             ->join('resumeninventario as ri', 'ri.IdResumenInventario = i.IdResumenInventario','left')
             ->where('i.EstadoInventario',1)
             ->where('ri.IdSede',$IdSede)
             ->groupBy('producto.IdProducto');

        }
        return $query->get();
    }

    public function insertarProducto($data,$imagen)
    {   
        if (file_exists('./assets/images/productos'.$imagen->getName())) {
           //no hace nada
        } else {
            $imagen->move('./assets/images/productos');
        }
        
        $data = array(
            'NombreProducto'          =>$data['NombreProducto'],
            'CodigoProducto'          =>$data['CodigoProducto'],
            'CodigoComercialProducto' =>$data['CodigoComercialProducto'],
            'CodigoBarraProducto'     =>$data['CodigoBarraProducto'],
            'NombreComercialProducto' =>$data['NombreComercialProducto'],
            'IdCategoriaProducto'     =>$data['IdCategoriaProducto'],
            'IdTipoProducto'          =>$data['IdTipoProducto'],
            'IdTipoExistencia'        =>$data['IdTipoExistencia'],
            'IdTipoServicio'          =>$data['IdTipoServicio'],
            'IdTipoActivo'            =>$data['IdTipoActivo'],
            'IdFamiliaProducto'       =>$data['IdFamiliaProducto'],
            'IdSubFamiliaProducto'    =>$data['IdSubFamiliaProducto'],
            'IdMarca'                 =>$data['IdMarca'],
            'IdModeloMarca'           =>$data['IdModeloMarca'],
            'IdLineaProducto'         =>$data['IdLineaProducto'],
            'IdFabricante'            =>$data['IdFabricante'],
            'Foto'                    =>$imagen->getName(),
            'OtroDato'                =>$data['OtroDato'],
            'EstadoProducto'          =>1,
			'FechaRegistro'           => date("Y-m-d H:i:s"),
            'UsuarioRegistro'         => get_current_user(),
            'MaquinaRegistro'         => getenv('COMPUTERNAME')
        );
        $datos = $this->insert($data);
        return $datos;
    }

    function mostrarDetalles($id){
        $query = $this->db->table('producto')->select('*,producto.MaquinaRegistro,producto.MaquinaEliminacion,
                 producto.MaquinaModificacion,producto.FechaRegistro,producto.FechaModificacion,producto.FechaEliminacion,
                 producto.UsuarioRegistro,producto.UsuarioEliminacion,producto.UsuarioModificacion',
                 'c.NombreCategoriaProducto','tpr.NombreTipoProducto','te.NombreTipoExistencia','ts.NombreTipoServicio',
                 'ta.NombreTipoActivo','f.NombreFabricante','lp.NombreLineaProducto')
                ->join('categoriaproducto as c', 'c.IdCategoriaProducto = producto.IdCategoriaProducto','left')
                ->join('tipoproducto as tpr', 'tpr.IdTipoProducto = producto.IdTipoProducto','left')
                ->join('tipoexistencia as te', 'te.IdTipoExistencia = producto.IdTipoExistencia','left')
                ->join('tiposervicio as ts', 'ts.IdTipoServicio = producto.IdTipoServicio','left')
                ->join('tipoactivo as ta', 'ta.IdTipoActivo = producto.IdTipoActivo','left')
                ->join('fabricante as f', 'f.IdFabricante = producto.IdFabricante','left')
                ->join('lineaproducto as lp', 'lp.IdLineaProducto = producto.IdLineaProducto','left')
                ->where('producto.IdProducto',$id);
        return $query->get();
    }

    public function mostrarProducto($id){
        $query = $this->db->table('producto')->select('*','f.InicialesFamiliaNombreProducto,f.InicialesFamiliaCodigoNombreProducto','m.InicialesMarcaNombreProducto,m.InicialesMarcaCodigoProducto')
        ->join('familiaproducto as f', 'f.IdFamiliaProducto = producto.IdFamiliaProducto', 'left')
        ->join('marca as m', 'm.IdMarca = producto.IdMarca', 'left')
        ->where('producto.IdProducto',$id);
        return $query->get();
    }

    public function obtenerFamilias()
    {
        $datos = $this->db->table('familiaproducto')->orderBy('NombreFamiliaProducto', 'ASC');
        return $datos->get();
    }

    public function obtenerSubFamiliaProducto($id)
    {
        $datos = $this->db->table('subfamiliaproducto')->where('IdFamiliaProducto',$id)->orderBy('IdSubFamiliaProducto', 'ASC');
        return $datos->get();
    }

    public function obtenerModeloMarca($id)
    {
        $datos = $this->db->table('modelomarca')->where('IdMarca',$id)->orderBy('IdModeloMarca', 'ASC');
        return $datos->get();
    }

    public function obtenerLineas()
    {
        $datos = $this->db->table('lineaproducto')->orderBy('NombreLineaProducto', 'ASC');
        return $datos->get();
    }

    public function obtenerCategorias()
    {
        $datos = $this->db->table('categoriaproducto');
        return $datos->get();
    }

    public function obtenerExistencias()
    {
        $datos = $this->db->table('tipoexistencia');
        return $datos->get();
    }

    public function obtenerActivos()
    {
        $datos = $this->db->table('tipoactivo');
        return $datos->get();
    }

    public function obtenerServicios()
    {
        $datos = $this->db->table('tiposervicio');
        return $datos->get();
    }

    public function obtenerMarcas()
    {
        $datos = $this->db->table('marca')->orderBy('NombreMarca', 'ASC');
        return $datos->get();
    }

    public function obtenerFabricantes()
    {
        $datos = $this->db->table('fabricante')->orderBy('NombreFabricante', 'ASC');
        return $datos->get();
    }

    public function obtenerDatosEmpresa()
    {
        $datos = $this->db->table('empresa');
        return $datos->get();
    }

    public function obtenerSede(){
        $datos = $this->db->table('sede')->where('IdEmpresa',1)->get();
        return $datos;
    }

    public function obtenerTipoInventario(){
        $datos = $this->db->table('tipoinventario')->get();
        return $datos;
    }

    public function obtenerUnidadMedida(){
        $datos = $this->db->table('unidadmedida')->orderBy('NombreUnidadMedida', 'ASC');
        return $datos->get();
    }  


    public function mostrarBarCode($id){
        $datos = $this->find($id);
        return $datos;
    }
    
    public function actualizarProducto($data,$imagen)
    {
        $id = $data['IdProducto'];

    	if(isset($data['EstadoProducto'])){
            
            if($data['EstadoProducto']==0){
                $data = [
                    'EstadoProducto'  => $data['EstadoProducto'],
                    'FechaEliminacion'      => date("Y-m-d H:i:s"),
                    'UsuarioEliminacion'    => get_current_user(),
                    'MaquinaEliminacion'    => getenv('COMPUTERNAME')
                ];
            }else{
                $data = [
                    'EstadoProducto'  => $data['EstadoProducto'],
                    'FechaModificacion'      => date("Y-m-d H:i:s"),
                    'UsuarioModificacion'    => get_current_user(),
                    'MaquinaModificacion'    => getenv('COMPUTERNAME')
                ];
            }

    	}else{

             if (file_exists('./assets/images/productos'.$imagen->getName())) {
                //no hace nada
             } else {
                 $imagen->move('./assets/images/productos');
             }
             
             $data = array(
                 'NombreProducto'          =>$data['NombreProducto'],
                 'CodigoProducto'          =>$data['CodigoProducto'],
                 'CodigoComercialProducto' =>$data['CodigoComercialProducto'],
                 'CodigoBarraProducto'     =>$data['CodigoBarraProducto'],
                 'NombreComercialProducto' =>$data['NombreComercialProducto'],
                 'IdCategoriaProducto'     =>$data['IdCategoriaProducto'],
                 'IdTipoProducto'          =>$data['IdTipoProducto'],
                 'IdTipoExistencia'        =>$data['IdTipoExistencia'],
                 'IdTipoServicio'          =>$data['IdTipoServicio'],
                 'IdTipoActivo'            =>$data['IdTipoActivo'],
                 'IdFamiliaProducto'       =>$data['IdFamiliaProducto'],
                 'IdSubFamiliaProducto'    =>$data['IdSubFamiliaProducto'],
                 'IdMarca'                 =>$data['IdMarca'],
                 'IdModeloMarca'           =>$data['IdModeloMarca'],
                 'IdLineaProducto'         =>$data['IdLineaProducto'],
                 'IdFabricante'            =>$data['IdFabricante'],
                 'Foto'                    =>$data['NombreFoto'],
                 'OtroDato'                =>$data['OtroDato'],
                 'FechaModificacion'      => date("Y-m-d H:i:s"),
                 'UsuarioModificacion'    => get_current_user(),
                 'MaquinaModificacion'    => getenv('COMPUTERNAME')
             );
	       
        }
        
        $datos = $this->update($id,$data);
        return $datos;
    }

    public function insertarResumenInventario($data)
    {
        $data_resumen= [
            'IdSede'           => $data['IdSede'],
            'FechaInventario'  => $data['FechaInventario'],
            'IdTipoInventario' => 1,
            'Observacion'      => '-',
            'UsuarioRegistro'  => get_current_user(),
            'FechaRegistro'    => date("Y-m-d H:i:s"),
            'EstadoResumenInventario'    => 1 
        ];

        $this->db->table('resumeninventario')->insert($data_resumen);

        $maxId=$this->db->table('resumeninventario')->selectMax('IdResumenInventario')->get();
        foreach($maxId->getResult() as $row) {
            $id=$row->IdResumenInventario;
        }

        return $id;
    }

    public function insertarProductoExcel($data)
    {
        $this->insert($data); 
        $id= $this->insertID;
        return $id; 
    }

    public function eliminarResumenInventario($idResumenInventario){
        $resultado=$this->db->table('resumeninventario')->where('IdResumenInventario', $idResumenInventario)->delete();
        return $resultado;
    }
    
}