<?php
namespace App\Models;
use CodeIgniter\Model;

class mTransportista extends Model
{   
    protected $table              = 'transportista';
    protected $primaryKey         = 'IdTransportista';
    protected $returnType         = 'array';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  
    protected $allowedFields      = ['NumeroConstanciaInscripcion','NumeroLicenciaConducir','EstadoTransportista',
                                     'MaquinaRegistro','FechaRegistro','UsuarioRegistro','UsuarioModificacion',
                                     'FechaModificacion','MaquinaModificacion','UsuarioEliminacion',
                                     'FechaEliminacion','MaquinaEliminacion','IdPersona'];
   
    public function obtenerTransportistas()
    {
        $query = $this->db->table('transportista')->select('*','p.NombreCompleto,p.ApellidoCompleto,p.Celular,p.TelefonoPersonal,p.NumeroDocumentoIdentidad','r.NombreRol')
        ->join('persona as p', 'p.IdPersona  = transportista.IdPersona','left')
        ->join('rol as r', 'p.IdRol  = r.IdRol','left');
        return $query->get();
    }

    public function insertarPersonaTransportista($data,$imagen)
    {   
        if (file_exists('./assets/images/personas'.$imagen->getName())) {
            //no hace nada
         } else {
             $imagen->move('./assets/images/personas');
         }

         if($data['CondicionContribuyente']=='' and $data['EstadoContribuyente']=='' and $data['IdTipoDocumentoIdentidad']=='4'){
             $estado='ACTIVO';
             $condicion='HABIDO';
         }else {
             $estado=$data['EstadoContribuyente'];
             $condicion=$data['CondicionContribuyente'];
         }

         //Insertamos Persona

         $datapersona = array(
            'IdTipoPersona'              =>$data['IdTipoPersona'],
            'NumeroDocumentoIdentidad'   =>$data['NumeroDocumentoIdentidad'],
            'IdTipoDocumentoIdentidad'   =>$data['IdTipoDocumentoIdentidad'],
            'ApellidoCompleto'           =>$data['ApellidoCompleto'],
            'NombreCompleto'             =>$data['NombreCompleto'],
            'NombreComercial'            =>$data['NombreComercial'],
            'RepresentanteLegal'         =>'-',
            'CondicionContribuyente'     =>$condicion,
            'EstadoContribuyente'        =>$estado,
            'IdRol'                      =>$data['IdRol'],
            'FechaNacimiento'            =>$data['FechaNacimiento'],
            'RazonSocial'                =>$data['RazonSocial'],
            'TelefonoFijo'               =>$data['TelefonoFijo'],
            'Email'                      =>$data['Email'],
            'Celular'                    =>$data['Celular'],
            'TelefonoPersonal'           =>$data['InputTelefono'],
            'LugarNacimiento'            =>$data['LugarNacimiento'],
            'Nacionalidad'               =>$data['Nacionalidad'],
            'Observacion'                =>$data['Observacion'],
            'IdGenero'                   =>$data['IdGenero'],
            'IdEstadoCivil'              =>$data['IdEstadoCivil'],
            'Foto'                       =>$data['NombreFoto'],
            'UbicacionEmpresa'           =>$data['UbicacionEmpresa'],
            'EstadoPersona'              =>1,
			'FechaRegistro'        => date("Y-m-d H:i:s"),
            'UsuarioRegistro'      => get_current_user(),
            'MaquinaRegistro'      => getenv('COMPUTERNAME')
        );

        $this->db->table('persona')->insert($datapersona);
        $maxId=$this->db->table('persona')->selectMax('IdPersona')->get();
        foreach($maxId->getResult() as $row) {
            $ultimoId=$row->IdPersona;
        }

        $datatransportista = array(
            'IdPersona'             => $ultimoId,
            'NumeroConstanciaInscripcion' => $data['NumeroConstanciaInscripcion'],
            'NumeroLicenciaConducir'      => $data['NumeroLicenciaConducir'],
            'EstadoTransportista'         =>1,
			'FechaRegistro'        => date("Y-m-d H:i:s"),
            'UsuarioRegistro'      => get_current_user(),
            'MaquinaRegistro'      => getenv('COMPUTERNAME')
        );
        $datos = $this->insert($datatransportista);
        
        if($data['Direccion']!=""){
            $data_mm = array(
                'IdPersona'    =>  $ultimoId,
                'Direccion'    =>  $data['Direccion'],
                'Descripcion'  =>  'Direccion de la Persona',
                'EstadoDireccion'  =>1,
                'FechaRegistro'    => date("Y-m-d H:i:s"),
                'UsuarioRegistro'  => get_current_user()
            );
            $this->db->table('direccionpersona')->insert($data_mm);
        }
        return $datos;
    }

    public function mostrarTransportista($id){
        $query = $this->db->table('transportista')->select('*')
        ->join('persona as p', 'p.IdPersona  = transportista.IdPersona','left')
        ->where('transportista.IdTransportista',$id);
        return $query->get();

    }

    public function actualizarTransportista($data,$imagen)
    {
        $id = $data['IdTransportista'];

    	if(isset($data['EstadoTransportista'])){
            //si el estado es ==0 entonces es eliminacion si es 1 es modificacion del estado 
            if($data['EstadoTransportista']==0){
                $datatransportista= [
                    'EstadoTransportista'  => $data['EstadoTransportista'],
                    'FechaEliminacion'      => date("Y-m-d H:i:s"),
                    'UsuarioEliminacion'    => get_current_user(),
                    'MaquinaEliminacion'    => getenv('COMPUTERNAME')
                ];
            }else{
                $datatransportista = [
                    'EstadoTransportista'  => $data['EstadoTransportista'],
                    'FechaModificacion'      => date("Y-m-d H:i:s"),
                    'UsuarioModificacion'    => get_current_user(),
                    'MaquinaModificacion'    => getenv('COMPUTERNAME')
                ];
            }


    	}else{
            //Modificamos Datos Persona
             if (file_exists('./assets/images/personas'.$imagen->getName())) {
                //no hace nada
             } else {
                 $imagen->move('./assets/images/personas');
             }
    
             $datapersona = array(
                'ApellidoCompleto'           =>$data['ApellidoCompleto'],
                'NombreCompleto'             =>$data['NombreCompleto'],
                'IdRol'                      =>$data['IdRol'],
                'FechaNacimiento'            =>$data['FechaNacimiento'],
                'TelefonoFijo'               =>$data['TelefonoFijo'],
                'Email'                      =>$data['Email'],
                'Celular'                    =>$data['Celular'],
                'TelefonoPersonal'           =>$data['InputTelefono'],
                'LugarNacimiento'            =>$data['LugarNacimiento'],
                'Nacionalidad'               =>$data['Nacionalidad'],
                'Observacion'                =>$data['Observacion'],
                'IdGenero'                   =>$data['IdGenero'],
                'IdEstadoCivil'              =>$data['IdEstadoCivil'],
                'Foto'                       =>$data['NombreFoto'],
                'UbicacionEmpresa'           =>$data['UbicacionEmpresa'],
                'FechaModificacion'      => date("Y-m-d H:i:s"),
                'UsuarioModificacion'    => get_current_user(),
                'MaquinaModificacion'    => getenv('COMPUTERNAME')
            );
            $IdPersona=$data['IdPersona'];

            $this->db->table('persona')->where('IdPersona', $IdPersona)->update($datapersona);
    
            //Modificamos Datos Transportista
	        $datatransportista = [
                'NumeroConstanciaInscripcion' => $data['NumeroConstanciaInscripcion'],
                'NumeroLicenciaConducir'      => $data['NumeroLicenciaConducir'],
                'FechaModificacion'      => date("Y-m-d H:i:s"),
                'UsuarioModificacion'    => get_current_user(),
                'MaquinaModificacion'    => getenv('COMPUTERNAME')
	        ];
        }
        $datos = $this->update($id,$datatransportista);
        
        return $datos;
    }

    public function insertarTransportista($data,$imagen){
        //Puede editar Persona :D 

        if (file_exists('./assets/images/personas'.$imagen->getName())) {
            //no hace nada
         } else {
             $imagen->move('./assets/images/personas');
         }

         $datapersona = array(
            'ApellidoCompleto'           =>$data['ApellidoCompleto'],
            'NombreCompleto'             =>$data['NombreCompleto'],
            'IdRol'                      =>$data['IdRol'],
            'FechaNacimiento'            =>$data['FechaNacimiento'],
            'TelefonoFijo'               =>$data['TelefonoFijo'],
            'Email'                      =>$data['Email'],
            'Celular'                    =>$data['Celular'],
            'TelefonoPersonal'           =>$data['InputTelefono'],
            'LugarNacimiento'            =>$data['LugarNacimiento'],
            'Nacionalidad'               =>$data['Nacionalidad'],
            'Observacion'                =>$data['Observacion'],
            'IdGenero'                   =>$data['IdGenero'],
            'IdEstadoCivil'              =>$data['IdEstadoCivil'],
            'Foto'                       =>$data['NombreFoto'],
            'UbicacionEmpresa'           =>$data['UbicacionEmpresa'],
            'FechaModificacion'      => date("Y-m-d H:i:s"),
            'UsuarioModificacion'    => get_current_user(),
            'MaquinaModificacion'    => getenv('COMPUTERNAME')
        );
        $IdPersona=$data['IdPersona'];

        $this->db->table('persona')->where('IdPersona', $IdPersona)->update($datapersona);

        $datatransportista = array(
            'IdPersona'             => $data['IdPersona'],
            'NumeroConstanciaInscripcion' => $data['NumeroConstanciaInscripcion'],
            'NumeroLicenciaConducir'      => $data['NumeroLicenciaConducir'],
            'EstadoTransportista'         =>1,
			'FechaRegistro'        => date("Y-m-d H:i:s"),
            'UsuarioRegistro'      => get_current_user(),
            'MaquinaRegistro'      => getenv('COMPUTERNAME')
        );
        $datos = $this->insert($datatransportista);
        return $datos;

    }

    public function buscarPersona($search){
        $result= $this->db->table('persona as p')->select("*,p.IdPersona,r.NombreRol", FALSE)
        ->join('rol as r', 'r.IdRol = p.IdRol','left')
        ->like('p.NombreCompleto', $search)
        ->orlike('p.ApellidoCompleto', $search)
        ->orlike('p.NumeroDocumentoIdentidad', $search);
        $query =  $result->get();
        return $query;
    }

    public function obtenerListadoRol()
    {
        $resultado =  $this->db->table('rol')->orderBy('NombreRol', 'ASC')->get();
        return $resultado;
    } 

    public function obtenerListadoEstadoCivil()
    {
        $resultado =  $this->db->table('estadocivil')->get();
        return $resultado;
    } 

    public function obtenerListadoTipoPersona()
    {
        $resultado =  $this->db->table('tipopersona')->orderBy('NombreTipoPersona', 'ASC')->get();
        return $resultado;
    }

    public function obtenerListadoTipoDocumentoIdentidad()
    {
        $resultado =  $this->db->table('tipodocumentoidentidad')->get();
        return $resultado;
    }
  
}