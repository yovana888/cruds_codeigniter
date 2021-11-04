<?php
namespace App\Models;
use CodeIgniter\Model;

class mPersona extends Model{
    protected $table              = 'persona';
    protected $primaryKey         = 'IdPersona';
    protected $returnType         = 'array';    
    protected $allowedFields      = ['IdTipoPersona','NumeroDocumentoIdentidad','IdTipoDocumentoIdentidad','NombreCompleto','ApellidoCompleto',
                                     'RazonSocial','NombreComercial','RepresentanteLegal','CondicionContribuyente','EstadoContribuyente','IdRol',
                                     'FechaNacimiento','TelefonoFijo','Email','Celular','TelefonoPersonal','LugarNacimiento',
                                     'Nacionalidad','Observacion','IdGenero','IdEstadoCivil','EstadoPersona','Foto','UbicacionEmpresa',
                                     'MaquinaRegistro','FechaRegistro','UsuarioRegistro','UsuarioModificacion','FechaModificacion',
                                     'MaquinaModificacion','UsuarioEliminacion','FechaEliminacion','Foto','MaquinaEliminacion'];
    
    
    public function obtenerListadoPersona()
    {
        $query = $this->db->table('persona')->select('*','tp.NombreAbreviado')
        ->join('tipodocumentoidentidad as tp', 'tp.IdTipoDocumentoIdentidad  = persona.IdTipoDocumentoIdentidad','left');
        return $query->get();
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

    public function buscarPaisNacionalidad($search){
        $query = $this->db->table('pais')->like('NombrePais',$search);
        return $query->get();
    }
    
    public function buscarDepartamentoProvincia($search)
    {
       $result= $this->db->table('provincia as p')->select("CONCAT(d.NombreDepartamento,',', p.NombreProvincia) as lugar", FALSE)
        ->join('departamento as d', 'd.IdDepartamento  = p.IdDepartamento')
        ->like('d.NombreDepartamento', $search);
        $query =  $result->get();
        return $query;
    }

    public function insertarPersona($data,$imagen)
    {   
        if (file_exists('./assets/images/personas'.$imagen->getName())) {
            //no hace nada
         } else {
             $imagen->move('./assets/images/personas');
         }
        $direccionpersona= $data['DireccionPrincipal'];
        $direccionempresa= $data['DireccionEmpresa'];

        $data = array(
            'IdTipoPersona'              =>$data['IdTipoPersona'],
            'NumeroDocumentoIdentidad'   =>$data['NumeroDocumentoIdentidad'],
            'IdTipoDocumentoIdentidad'   =>$data['IdTipoDocumentoIdentidad'],
            'ApellidoCompleto'           =>$data['ApellidoCompleto'],
            'NombreCompleto'             =>$data['NombreCompleto'],
            'NombreComercial'            =>$data['NombreComercial'],
            'RepresentanteLegal'         =>$data['RepresentanteLegal'],
            'CondicionContribuyente'     =>$data['CondicionContribuyente'],
            'EstadoContribuyente'        =>$data['EstadoContribuyente'],
            'IdRol'                      =>$data['IdRol'],
            'FechaNacimiento'            =>$data['FechaNacimiento'],
            'RazonSocial'                =>$data['RazonSocial'],
            'TelefonoFijo'               =>$data['TelefonoFijo'],
            'Email'                      =>$data['Email'],
            'Celular'                    =>$data['Celular'],
            'TelefonoPersonal'           =>$data['TelefonoPersonal'],
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
        $datos = $this->insert($data);
        //agregamos las direcciones 
      
        $id_ultimo = $this->insertID; 
        
        if($direccionpersona!=""){
            $data_mm = array(
                'IdPersona'    =>  $id_ultimo,
                'Direccion'    =>  $direccionpersona,
                'Descripcion'  =>  'Direccion de la Persona',
                'EstadoDireccion'  =>1,
                'FechaRegistro'    => date("Y-m-d H:i:s"),
                'UsuarioRegistro'  => get_current_user()
            );
            $this->db->table('direccionpersona')->insert($data_mm);
        }

        if($direccionempresa!="" and $direccionempresa!=$direccionpersona ){
            $data_nn = array(
                'IdPersona'    =>  $id_ultimo,
                'Direccion'    =>  $direccionempresa,
                'Descripcion'  =>  'Direccion de la Razon Social',
                'EstadoDireccion'  =>1,
                'FechaRegistro'    => date("Y-m-d H:i:s"),
                'UsuarioRegistro'  => get_current_user()
            );
            $this->db->table('direccionpersona')->insert($data_nn);
        }

        return $datos;
    }

    public function mostrarDetalles($id){
        $query = $this->db->table('persona')->select('*,persona.MaquinaRegistro,persona.MaquinaEliminacion,
        persona.MaquinaModificacion,persona.FechaRegistro,persona.FechaModificacion,persona.FechaEliminacion,
        persona.UsuarioRegistro,persona.UsuarioEliminacion,persona.UsuarioModificacion',
        'r.NombreRol','g.NombreGenero','e.NombreEstadoCivil','tp.NombreTipoPersona')
       ->join('rol as r', 'r.IdRol = persona.IdRol','left')
       ->join('genero as g', 'g.IdGenero = persona.IdGenero','left')
       ->join('estadocivil as e', 'e.IdEstadoCivil = persona.IdEstadoCivil','left')
       ->join('tipopersona as tp', 'tp.IdTipoPersona = persona.IdTipoPersona','left')
       ->where('persona.IdPersona',$id);
        return $query->get();
    }

    public function mostrarDirecciones($id){
        $query=$this->db->table('direccionpersona')->where('IdPersona',$id);
        return $query->get();
    }

    public function  mostrarRazonSocial($id){
        $query= $this->db->table('persona as p')->select('p.NombreComercial,p.CondicionContribuyente,p.EstadoContribuyente,p.UbicacionEmpresa')->where('p.IdPersona',$id);
        return $query->get();
    }
    
    public function mostrarPersona($id){
        $datos = $this->find($id);
        return $datos;
    }

    public function actualizarPersona($data,$imagen)
    {
        $id = $data['IdPersona'];
        if(isset($data['EstadoPersona'])){
            //si el estado es ==0 entonces es eliminacion si es 1 es modificacion del estado 
            if($data['EstadoPersona']==0){
                $data = [
                    'EstadoPersona'         => $data['EstadoPersona'],
                    'FechaEliminacion'      => date("Y-m-d H:i:s"),
                    'UsuarioEliminacion'    => get_current_user(),
                    'MaquinaEliminacion'    => getenv('COMPUTERNAME')
                ];
            }else{
                $data = [
                    'EstadoPersona'          => $data['EstadoPersona'],
                    'FechaModificacion'      => date("Y-m-d H:i:s"),
                    'UsuarioModificacion'    => get_current_user(),
                    'MaquinaModificacion'    => getenv('COMPUTERNAME')
                ];
            }

    	}else{
            if (file_exists('./assets/images/personas'.$imagen->getName())) {
                //no hace nada
             } else {
                 $imagen->move('./assets/images/personas');
             }
	        $data = [
                'IdTipoPersona'              =>$data['IdTipoPersona'],
                'NumeroDocumentoIdentidad'   =>$data['NumeroDocumentoIdentidad'],
                'IdTipoDocumentoIdentidad'   =>$data['IdTipoDocumentoIdentidad'],
                'ApellidoCompleto'           =>$data['ApellidoCompleto'],
                'NombreCompleto'             =>$data['NombreCompleto'],
                'NombreComercial'            =>$data['NombreComercial'],
                'RepresentanteLegal'         =>$data['RepresentanteLegal'],
                'CondicionContribuyente'     =>$data['CondicionContribuyente'],
                'EstadoContribuyente'        =>$data['EstadoContribuyente'],
                'IdRol'                      =>$data['IdRol'],
                'FechaNacimiento'            =>$data['FechaNacimiento'],
                'RazonSocial'                =>$data['RazonSocial'],
                'TelefonoFijo'               =>$data['TelefonoFijo'],
                'Email'                      =>$data['Email'],
                'Celular'                    =>$data['Celular'],
                'TelefonoPersonal'           =>$data['TelefonoPersonal'],
                'LugarNacimiento'            =>$data['LugarNacimiento'],
                'Nacionalidad'               =>$data['Nacionalidad'],
                'Observacion'                =>$data['Observacion'],
                'IdGenero'                   =>$data['IdGenero'],
                'IdEstadoCivil'              =>$data['IdEstadoCivil'],
                'Foto'                       =>$data['NombreFoto'],
                'UbicacionEmpresa'           =>$data['UbicacionEmpresa'],
                'EstadoPersona'              =>1,
                'FechaModificacion'      => date("Y-m-d H:i:s"),
                'UsuarioModificacion'    => get_current_user(),
                'MaquinaModificacion'    => getenv('COMPUTERNAME')
	        ];
        }
        
        $datos = $this->update($id,$data);
        return $datos;
    }
    
}

