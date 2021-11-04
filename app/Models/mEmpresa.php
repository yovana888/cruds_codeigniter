<?php
namespace App\Models;
use CodeIgniter\Model;

class mEmpresa extends Model
{   
    protected $table              = 'empresa';
    protected $primaryKey         = 'IdEmpresa';
    protected $returnType         = 'array';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  
    protected $allowedFields      = ['CodigoEmpresa','RazonSocial','NombreComercial','RepresentanteLegal','DomicilioFiscal','Logo','HostSMTP','FechaRegistro','UsuarioRegistro','UsuarioModificacion','FechaModificacion','EstadoEmpresa',
    'NombreCertificado','ClaveCertificado','UsuarioSMTP','PuertoSMTP','ClaveSMTP','Email','UsuarioSOL','ClaveSOL','FechaInicioCertificadoDigitalPrincipal','FechaFinCertificadoDigitalPrincipal'];
   
    public function obtenerEmpresa()
    {
        $query = $this->db->table('empresa');
        return $query->get();
    }

   
    public function insertarEmpresa($data,$logo)
    {   
        if (file_exists('./assets/images/empresa'.$logo->getName())) {
            //no hace nada
         } else {
             $logo->move('./assets/images/empresa');
         }
        $data = array(
            'NombreCertificado'   => $data['NombreCertificado'],
            'ClaveCertificado'    => $data['ClaveCertificado'],
            'CodigoEmpresa'       => $data['CodigoEmpresa'],
            'RazonSocial'         => $data['RazonSocial'],
            'NombreComercial'     => $data['NombreComercial'],
            'RepresentanteLegal'  => $data['RepresentanteLegal'],
            'DomicilioFiscal'     => $data['DomicilioFiscal'],
            'Logo'                => $data['NombreFoto'],
            'HostSMTP'            => $data['HostSMTP'],
            'UsuarioSMTP'         => $data['UsuarioSMTP'],
            'PuertoSMTP'          => $data['PuertoSMTP'],
            'ClaveSMTP'           => $data['ClaveSMTP'],
            'Email'               => $data['Email'],
            'FechaRegistro'       => date("Y-m-d H:i:s"),
            'UsuarioRegistro'     => get_current_user(),
            'EstadoEmpresa'       => 'A',
            'UsuarioSOL'                             => $data['UsuarioSOL'],
            'ClaveSOL'                               => $data['ClaveSOL'],
            'FechaInicioCertificadoDigitalPrincipal' => $data['FechaInicioCertificadoDigitalPrincipal'],
            'FechaFinCertificadoDigitalPrincipal'    => $data['FechaFinCertificadoDigitalPrincipal']
        );
        $datos = $this->insert($data);
        return $datos;
    }

    public function mostrarEmpresa($id){
        $datos = $this->find($id);
        return $datos;
    }

    public function actualizarEmpresa($data,$logo)
    {
        if (file_exists('./assets/images/empresa'.$logo->getName())) {
            //no hace nada
         } else {
             $logo->move('./assets/images/empresa');
         }
        $id = $data['IdEmpresa'];	
	    $data =array(
                'NombreCertificado' => $data['NombreCertificado'],
                'ClaveCertificado' => $data['ClaveCertificado'],
                'CodigoEmpresa'       => $data['CodigoEmpresa'],
                'RazonSocial'         => $data['RazonSocial'],
                'NombreComercial'     => $data['NombreComercial'],
                'RepresentanteLegal'  => $data['RepresentanteLegal'],
                'DomicilioFiscal'     => $data['DomicilioFiscal'],
                'Logo'                => $data['NombreFoto'],
                'HostSMTP'            => $data['HostSMTP'],
                'UsuarioSMTP'         => $data['UsuarioSMTP'],
                'PuertoSMTP'          => $data['PuertoSMTP'],
                'ClaveSMTP'           => $data['ClaveSMTP'],
                'Email'               => $data['Email'],
                'FechaModificacion'   => date("Y-m-d H:i:s"),
                'UsuarioModificacion' => get_current_user(),
                'UsuarioSOL'                             => $data['UsuarioSOL'],
                'ClaveSOL'                               => $data['ClaveSOL'],
                'FechaInicioCertificadoDigitalPrincipal' => $data['FechaInicioCertificadoDigitalPrincipal'],
                'FechaFinCertificadoDigitalPrincipal'    => $data['FechaFinCertificadoDigitalPrincipal']
        );
        
        
        $datos = $this->update($id,$data);
        return $datos;
    }
  

}
