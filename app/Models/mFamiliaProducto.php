<?php namespace App\Models;

use CodeIgniter\Model;

class mFamiliaProducto extends Model
{
    
    protected $table      = 'familiaproducto';
    protected $primaryKey = 'IdFamiliaProducto';
    protected $returnType     = 'array';     
    protected $allowedFields = [
        'NombreFamiliaProducto','EstadoFamiliaProducto','InicialesFamiliaNombreProducto',
        'InicialesFamiliaCodigoNombreProducto','EstadoNoEspecificado',
        'FechaRegistro','UsuarioRegistro','MaquinaRegistro','FechaModificacion',
        'UsuarioModificacion','MaquinaModificacion','FechaEliminacion','UsuarioEliminacion','MaquinaEliminacion'
    ];     

    public function obtenerListadoFamiliaProducto(){
        $datos = $this->where('EstadoNoEspecificado','0')->findAll();
        return $datos; 
    }    
     
    public function insertarFamiliaProducto($data){

        $FechaRegistro = date('Y-m-d H:i:s');
        $UsuarioRegistro = get_current_user();
        $dispositivo =  getenv('COMPUTERNAME');
        
        $data = [
            'NombreFamiliaProducto' => $data['NombreFamiliaProducto'], 
            'InicialesFamiliaNombreProducto' => $data['InicialesFamiliaNombreProducto'],
            'InicialesFamiliaCodigoNombreProducto'=> $data['InicialesFamiliaCodigoNombreProducto'],
            'EstadoFamiliaProducto'  => '1',
            'EstadoNoEspecificado'  => '0',
            'FechaRegistro'  => $FechaRegistro,
            'UsuarioRegistro'  => $UsuarioRegistro,
            'MaquinaRegistro'  => $dispositivo,

        ];  

        $datos = $this->insert($data);
        $id_ultimo = $this->insertID; 
         
        $data_mm = array(
            'NombreSubFamiliaProducto'  =>'NO ESPECIFICADO',
            'EstadoSubFamiliaProducto'  =>1,
            'IdFamiliaProducto'  =>$id_ultimo,
            'EstadoNoEspecificado' =>1,
            'FechaRegistro'      => $FechaRegistro,
            'UsuarioRegistro'    => $UsuarioRegistro,
            'MaquinaRegistro'    => $dispositivo
        );
        $this->db->table('subfamiliaproducto')->insert($data_mm);

        return $datos; 
    }

    public function mostrarFamiliaProducto($id){
        $datos = $this->find($id);
        return $datos;
    }
    
    public function actualizarFamiliaProducto($data){
        $FechaModificacion = date('Y-m-d H:i:s');
        $UsuarioModificacion = get_current_user();
        $dispositivo =  getenv('COMPUTERNAME');
        $id = $data['IdFamiliaProducto'];

        if(isset($data['EstadoFamiliaProducto'])){
            $data = [                 
                'EstadoFamiliaProducto'  => $data['EstadoFamiliaProducto'],             
                'FechaEliminacion'  => $FechaModificacion,
                'UsuarioEliminacion'  => $UsuarioModificacion, 
                'MaquinaEliminacion' => $dispositivo           
            ];
        }else{
            $data = [
                'NombreFamiliaProducto' => $data['NombreFamiliaProducto'], 
                'InicialesFamiliaNombreProducto' => $data['InicialesFamiliaNombreProducto'],
                'InicialesFamiliaCodigoNombreProducto'=> $data['InicialesFamiliaCodigoNombreProducto'], 
                'UsuarioModificacion' => $UsuarioModificacion,
                'FechaModificacion' => $FechaModificacion,
                'MaquinaModificacion' => $dispositivo
            ];            
        }
        $datos = $this->update($id, $data);         
        return $datos; 
    }

    public function insertarFamiliaExcel($data)
    {
        $datos = $this->insert($data);
        $id_ultimo = $this->insertID; 
         
        $data_mm = array(
            'NombreSubFamiliaProducto'  =>'NO ESPECIFICADO',
            'EstadoSubFamiliaProducto'  =>1,
            'IdFamiliaProducto'  =>$id_ultimo,
            'EstadoNoEspecificado' =>1,
            'FechaRegistro'      => date("Y-m-d H:i:s"),
            'UsuarioRegistro'    => get_current_user(),
            'MaquinaRegistro'    => getenv('COMPUTERNAME')
        );
        $this->db->table('subfamiliaproducto')->insert($data_mm);

        return $id_ultimo; 
    }

}