<?php
namespace App\Models;
use CodeIgniter\Model;

class mKitProducto extends Model
{   
    protected $table              = 'kitproducto';
    protected $primaryKey         = 'IdKitProducto';
    protected $returnType         = 'array';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  
    protected $allowedFields      = ['NombreKitProducto','IdFamiliaProducto','IdUnidadMedida','CodigoKit',
                                     'PrecioVentaKit','IdTipoPrecio','NombreComercialKit','IndicadorEstado','MaquinaRegistro','FechaRegistro','UsuarioRegistro',
                                     'UsuarioModificacion','FechaModificacion','MaquinaModificacion','UsuarioEliminacion',
                                     'FechaEliminacion','MaquinaEliminacion','Foto','IdMarca'];
   
    public function obtenerKits()
    {
        $query = $this->db->table('kitproducto')->select('*,kitproducto.IndicadorEstado',
        'fp.NombreFamiliaProducto','um.NombreUnidadMedida','m.NombreMarca')
         ->join('familiaproducto as fp', 'fp.IdFamiliaProducto = kitproducto.IdFamiliaProducto','left')
         ->join('marca as m', 'm.IdMarca = kitproducto.IdMarca','left')
         ->join('unidadmedida as um', 'um.IdUnidadMedida = kitproducto.IdUnidadMedida','left');
        return $query->get();
    }

    public function obtenerUnidadMedida(){
        $datos = $this->db->table('unidadmedida')
        ->where('IdUnidadMedida !=',0)->orderBy('NombreUnidadMedida', 'ASC');
        return $datos->get();
    }  

    public function obtenerMarcas()
    {
        $datos = $this->db->table('marca')->orderBy('NombreMarca', 'ASC');
        return $datos->get();
    }

    public function obtenerFamilias()
    {
        $datos = $this->db->table('familiaproducto')->orderBy('NombreFamiliaProducto', 'ASC');
        return $datos->get();
    }

}
