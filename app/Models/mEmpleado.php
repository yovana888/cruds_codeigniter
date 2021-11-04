<?php
namespace App\Models;
use CodeIgniter\Model;

class mEmpleado extends Model
{   
    protected $table              = 'empleado';
    protected $primaryKey         = 'IdEmpleado';
    protected $returnType         = 'array';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  
    protected $allowedFields      = ['IdSede','FechaIngreso','Sueldo','EstadoEmpleado','FechaRegistro','UsuarioRegistro','UsuarioModificacion',
                                     'FechaModificacion','UsuarioEliminacion','FechaEliminacion','IdPersona','UsuarioEliminacion','FechaEliminacion'];
   
    public function obtenerEmpleados()
    {
        $query = $this->db->table('empleado')->select('*','p.NombreCompleto,p.ApellidoCompleto,p.Celular,p.TelefonoPersonal,p.NumeroDocumentoIdentidad','r.NombreRol','s.NombreSede')
        ->join('persona as p', 'p.IdPersona  = empleado.IdPersona','left')
        ->join('rol as r', 'p.IdRol  = r.IdRol','left')
        ->join('sede as s', 's.IdSede  = empleado.IdSede','left');
        return $query->get();
    }

    public function insertarPersonaEmpleado($data,$imagen)
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

        $dataempleado = array(
            'IdPersona'             => $ultimoId,
            'IdSede'                => $data['IdSede'],
            'Sueldo'                => $data['Sueldo'],
            'FechaIngreso'          => $data['FechaIngreso'],
            'EstadoEmpleado'        =>1,
			'FechaRegistro'         => date("Y-m-d H:i:s"),
            'UsuarioRegistro'       => get_current_user()
        );
        $datos = $this->insert($dataempleado);
        
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

    public function mostrarEmpleado($id){
        $query = $this->db->table('empleado')->select('*')
        ->join('persona as p', 'p.IdPersona  = empleado.IdPersona','left')
        ->where('empleado.IdEmpleado',$id);
        return $query->get();

    }

    public function actualizarEmpleado($data,$imagen)
    {
        $id = $data['IdEmpleado'];

    	if(isset($data['EstadoEmpleado'])){
            //si el estado es ==0 entonces es eliminacion si es 1 es modificacion del estado 
            if($data['EstadoEmpleado']==0){
                $dataempleado= [
                    'EstadoEmpleado'  => $data['EstadoEmpleado'],
                    'FechaEliminacion'      => date("Y-m-d H:i:s"),
                    'UsuarioEliminacion'    => get_current_user()
                ];
            }else{
                $dataempleado = [
                    'EstadoEmpleado'  => $data['EstadoEmpleado'],
                    'FechaModificacion'      => date("Y-m-d H:i:s"),
                    'UsuarioModificacion'    => get_current_user()
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
    
            //Modificamos Datos Empleado
	        $dataempleado = [
                'IdSede'                => $data['IdSede'],
                'Sueldo'                => $data['Sueldo'],
                'FechaIngreso'          => $data['FechaIngreso'],
                'FechaModificacion'      => date("Y-m-d H:i:s"),
                'UsuarioModificacion'    => get_current_user()
	        ];
        }
        $datos = $this->update($id,$dataempleado);
        
        return $datos;
    }

    public function insertarEmpleado($data,$imagen){
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

        $dataempleado = array(
            'IdPersona'             => $data['IdPersona'],
            'IdSede'                => $data['IdSede'],
            'Sueldo'                => $data['Sueldo'],
            'FechaIngreso'          => $data['FechaIngreso'],
            'EstadoEmpleado'         =>1,
			'FechaRegistro'        => date("Y-m-d H:i:s"),
            'UsuarioRegistro'      => get_current_user()
        );
        $datos = $this->insert($dataempleado);
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

    public function obtenerListadoSede()
    {
        $resultado =  $this->db->table('sede')->orderBy('NombreSede', 'ASC')->get();
        return $resultado;
    }
  
}