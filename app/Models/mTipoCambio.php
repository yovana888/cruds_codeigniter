<?php
namespace App\Models;
use CodeIgniter\Model;
use DateTime;
class mTipoCambio extends Model
{   
    protected $table              = 'tipocambio';
    protected $primaryKey         = 'IdTipoCambio';
    protected $returnType         = 'array';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  
    protected $allowedFields      = ['FechaCambio','TipoCambioCompra','TipoCambioVenta','IdMonedaOrigen','IdMonedaDestino','IndicadorEstado',
                                     'FechaRegistro','UsuarioRegistro','UsuarioModificacion','FechaModificacion' ];
   
    public function obtenerTiposCambio()
    {
        $query = $this->db->table('tipocambio')->select('*, tipocambio.FechaRegistro,tipocambio.IndicadorEstado','md.NombreMoneda')
                 ->join('moneda as md', 'md.IdMoneda = tipocambio.IdMonedaDestino', 'left');
        return $query->get();
    }

    public function obtenerMonedas()
    {
        $datos = $this->db->table('moneda')->where('NombreMoneda !=','Sol');
        return $datos->get();
    }

    public function insertarTipoCambio($data)
    {   $date = DateTime::createFromFormat('d/m/Y', $data['FechaCambio']);
        $data = array(
            'TipoCambioCompra'   =>$data['TipoCambioCompra'],
            'TipoCambioVenta'    =>$data['TipoCambioVenta'],
            'IdMonedaDestino'    =>$data['IdMonedaDestino'],
            'IdMonedaOrigen'     => '1',
            'IndicadorEstado'    => 'A',
            'FechaCambio'        => $date->format('Y-m-d'),
            'FechaRegistro'      => date("Y-m-d H:i:s"),
			'UsuarioRegistro'    => get_current_user()
        );
        $datos = $this->insert($data);
        return $datos;
    }

    public function mostrarTipoCambio($id){
        $query = $this->db->table('tipocambio')->select('*','md.NombreMoneda')
        ->join('moneda as md', 'md.IdMoneda = tipocambio.IdMonedaDestino', 'left')
        ->where('IdTipoCambio',$id);
        return $query->get();
    }

  

    public function actualizarTipoCambio($data,$Id)
    {
     
    	if(isset($data['IndicadorEstado'])){
    		$data = [
            	'IndicadorEstado'  => $data['IndicadorEstado']
        	];
    	}else{
	        $data = [
                'TipoCambioCompra'   =>$data['TipoCambioCompra'],
                'TipoCambioVenta'    =>$data['TipoCambioVenta'],
                'IdMonedaDestino'    =>$data['IdMonedaDestino'],
                'FechaModificacion'      => date("Y-m-d H:i:s"),
                'UsuarioModificacion'    => get_current_user()
	        ];
        }
        
        $datos = $this->update($Id,$data);
        return $datos;
    }


    
}