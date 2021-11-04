<?php
namespace App\Models;
use CodeIgniter\Model;

class mNotaSalida extends Model
{   
    protected $table              = 'notasalida';
    protected $primaryKey         = 'IdNotaSalida';
    protected $returnType         = 'array';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  
    protected $allowedFields      = ['IdSede','Serie','Numero','FechaSalida','TipoCambio','Responsable',
                                     'Estado','IdTipoSalida','IdMoneda','MaquinaRegistro','FechaRegistro','UsuarioRegistro',
                                     'UsuarioModificacion','FechaModificacion','MaquinaModificacion','UsuarioEliminacion',
                                     'FechaEliminacion','MaquinaEliminacion'];
   
    public function obtenerNotasSalida()
    {
        $query = $this->db->table('notasalida');
        return $query->get();
    }

    public function obtenerListadoSede()
    {
        $resultado =  $this->db->table('sede')->orderBy('NombreSede', 'ASC')->where('IdEmpresa',1)->get();
        return $resultado;
    }

    public function obtenerUnidadMedida(){
        $datos = $this->db->table('unidadmedida')->orderBy('NombreUnidadMedida', 'ASC');
        return $datos->get();
    } 
    
    public function obtenerTipoNotaSalida()
    {
        $datos = $this->db->table('tiponotasalida')->orderBy('Concepto', 'ASC');
        return $datos->get();
    } 

    public function obtenerMoneda()
    {
        $datos = $this->db->table('moneda');
        return $datos->get();
    } 

    public function obtenerTipoDocumento()
    {
        $datos = $this->db->table('tipodocumento')->where('IdTipoDocumento !=',9)->orderBy('NombreTipoDocumento', 'ASC');
        return $datos->get();
    }

}
