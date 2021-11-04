<?php namespace App\Models;

use CodeIgniter\Model;

class mPrecioUnidadMedida extends Model
{
    
    protected $table      = 'preciounidadmedida';
    protected $primaryKey = 'IdPrecioUnidadMedida';
    protected $returnType     = 'array';     
    protected $allowedFields = [
        'IdProducto','IdUnidadMedida','Equivalencia','PrecioVenta','Stock','IndicadorEstado',
        'FechaRegistro','UsuarioRegistro','MaquinaRegistro','FechaModificacion',
        'UsuarioModificacion','MaquinaModificacion','FechaEliminacion','UsuarioEliminacion','MaquinaEliminacion'
    ];     

    
    public function mostrarPrecioUnidadMedida($id){
        $query = $this->db->table('preciounidadmedida')->select('*,preciounidadmedida.IndicadorEstado')
        ->join('producto as p', 'p.IdProducto = preciounidadmedida.IdProducto','left')
        ->join('unidadmedida as m', 'm.IdUnidadMedida = preciounidadmedida.IdUnidadMedida','left')
        ->where('p.IdProducto',$id);
        return $query->get();
    }

    
    public function editarPrecioUnidadMedida($id){
         
        $query = $this->db->table('preciounidadmedida')->select('*,preciounidadmedida.IndicadorEstado')
        ->join('producto as p', 'p.IdProducto = preciounidadmedida.IdProducto','left')
        ->join('unidadmedida as m', 'm.IdUnidadMedida = preciounidadmedida.IdUnidadMedida','left')
        ->where('preciounidadmedida.IdPrecioUnidadMedida',$id)->get();
        return $query;
         
    } 

    public function insertarPrecioUnidadMedida($data){

        $FechaRegistro = date('Y-m-d H:i:s');
        $UsuarioRegistro = get_current_user();
        $dispositivo =  getenv('COMPUTERNAME');
        
        $data = [
            'IdProducto'      => $data['IdProducto_modal'],
            'IdUnidadMedida'  => $data['IdUnidadMedida_modal'],             
            'UsuarioRegistro' => $UsuarioRegistro,
            'MaquinaRegistro' => $dispositivo,
            'FechaRegistro'   => $FechaRegistro,
            'Equivalencia'    => $data['Equivalencia'],
            'PrecioVenta'     => $data['PrecioVenta'],
            'Stock'           => $data['Stock'],
            'IndicadorEstado' => 1         
        ];
        $datos = $this->insert($data);
        return $datos; 
    }


    
    public function modificarPrecioUnidadMedida($data){

        $FechaModificacion = date('Y-m-d H:i:s');
        $UsuarioRegistro = get_current_user();
        $dispositivo =  getenv('COMPUTERNAME');
        $id = $data['IdPrecioUnidadMedida'];
        if(isset($data['IndicadorEstado'])){
            $data = [               
                'IndicadorEstado'    => $data['IndicadorEstado'],
                'UsuarioEliminacion' => $UsuarioRegistro,
                'MaquinaEliminacion' => $dispositivo,
                'FechaModificacion'   => $FechaModificacion
            ];
        }else{
        $data = [
             
            'IdUnidadMedida'      => $data['IdUnidadMedida_modal'],             
            'UsuarioModificacion' => $UsuarioRegistro,
            'MaquinaModificacion' => $dispositivo,
            'FechaModificacion'   => $FechaModificacion,
            'Equivalencia'        => $data['Equivalencia'],
            'PrecioVenta'         => $data['PrecioVenta'],
            'Stock'               => $data['Stock']             
        ];
        }
        $datos = $this->update($id, $data);         
        return $datos; 
    } 


}