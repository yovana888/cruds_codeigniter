<?php namespace App\Models;

use CodeIgniter\Model;

class mSubFamiliaProducto extends Model
{
    
    protected $table      = 'subfamiliaproducto';
    protected $primaryKey = 'IdSubFamiliaProducto';
    protected $returnType     = 'array';     
    protected $allowedFields = [
        'NombreSubFamiliaProducto','EstadoSubFamiliaProducto','EstadoNoEspecificado','IdFamiliaProducto',
        'FechaRegistro','UsuarioRegistro','MaquinaRegistro','FechaModificacion',
        'UsuarioModificacion','MaquinaModificacion','FechaEliminacion','UsuarioEliminacion','MaquinaEliminacion'
    ];     

    public function obtenerListadoSubFamiliaProducto(){
        $query = $this->db->table('subfamiliaproducto')->select('*,
            subfamiliaproducto.FechaRegistro,
            subfamiliaproducto.UsuarioRegistro,
            subfamiliaproducto.MaquinaRegistro,
            subfamiliaproducto.FechaModificacion,
            subfamiliaproducto.UsuarioModificacion,
            subfamiliaproducto.MaquinaModificacion,
            subfamiliaproducto.FechaEliminacion,
            subfamiliaproducto.UsuarioEliminacion,
            subfamiliaproducto.MaquinaEliminacion,
            subfamiliaproducto.EstadoSubFamiliaProducto','m.NombreFamiliaProducto')
                 ->join('familiaproducto as m', 'm.IdFamiliaProducto = subfamiliaproducto.IdFamiliaProducto','left')
                 ->where('subfamiliaproducto.NombreSubFamiliaProducto !=','NO ESPECIFICADO');
        return $query->get();
        /*$datos = $this->findAll();
        return $datos; */
    } 

    public function obtenerListadoFamiliaProducto()
    {
        $datos = $this->db->table('familiaproducto')
        ->where('IdFamiliaProducto !=',0)->orderBy('NombreFamiliaProducto', 'ASC');
        return $datos->get();
    }

    public function insertarSubFamiliaProducto($data){

        $FechaRegistro = date('Y-m-d H:i:s');
        $UsuarioRegistro = get_current_user();
        $dispositivo =  getenv('COMPUTERNAME');
        
        $data = [
            'NombreSubFamiliaProducto' => $data['NombreSubFamiliaProducto'],
            'EstadoSubFamiliaProducto'  => '1',
            'EstadoNoEspecificado'  => '0',
            'IdFamiliaProducto'  => $data['IdFamiliaProducto'],
            'FechaRegistro'  => $FechaRegistro,
            'UsuarioRegistro'  => $UsuarioRegistro,
            'MaquinaRegistro'  => $dispositivo,

        ];  

        $datos = $this->insert($data); 
        return $datos; 
    }

    public function mostrarSubFamiliaProducto($id){
        $datos = $this->find($id);
        return $datos;
    }
    
    public function actualizarSubFamiliaProducto($data){
        $FechaModificacion = date('Y-m-d H:i:s');
        $UsuarioModificacion = get_current_user();
        $dispositivo =  getenv('COMPUTERNAME');
        $id = $data['IdSubFamiliaProducto'];

        if(isset($data['EstadoSubFamiliaProducto'])){
            $data = [                 
                'EstadoSubFamiliaProducto'  => $data['EstadoSubFamiliaProducto'],            
                'FechaEliminacion'  => $FechaModificacion,
                'UsuarioEliminacion'  => $UsuarioModificacion, 
                'MaquinaEliminacion' => $dispositivo           
            ];
        }else{
            $data = [
                'NombreSubFamiliaProducto' => $data['NombreSubFamiliaProducto'],
                'IdFamiliaProducto'  => $data['IdFamiliaProducto'],
                'UsuarioModificacion' => $UsuarioModificacion,
                'FechaModificacion' => $FechaModificacion,
                'MaquinaModificacion' => $dispositivo
            ];            
        }
        $datos = $this->update($id, $data);         
        return $datos; 
    }

    public function insertarSubFamiliaExcel($data){

        $this->insert($data); 
        $id= $this->insertID;
        return $id; 
    }


}