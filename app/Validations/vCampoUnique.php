<?php
namespace App\Validations;

class vCampoUnique
{   
    

    public function validarCamposUnidadMedida($data){
        $db  = \Config\Database::connect();
        $CodigoUnidadMedidaSunat  = $data['CodigoUnidadMedidaSunat'];
        $NombreUnidadMedida       = $data['NombreUnidadMedida'];
        $AbreviaturaUnidadMedida  = $data['AbreviaturaUnidadMedida'];
        
        if(empty($data['IdUnidadMedida'])){
        	$validacion= $db->table('unidadmedida')->where('NombreUnidadMedida',$NombreUnidadMedida)
               ->orWhere('CodigoUnidadMedidaSunat', $CodigoUnidadMedidaSunat)
               ->orWhere('AbreviaturaUnidadMedida', $AbreviaturaUnidadMedida)->get();
        }else{
        	$id = $data['IdUnidadMedida'];
            $validacion= $db->table('unidadmedida')->where('NombreUnidadMedida',$NombreUnidadMedida)
                ->where('IdUnidadMedida !=', $id)
                ->orWhere('CodigoUnidadMedidaSunat', $CodigoUnidadMedidaSunat)
                ->where('IdUnidadMedida !=', $id)
                ->orWhere('AbreviaturaUnidadMedida', $AbreviaturaUnidadMedida)
                ->where('IdUnidadMedida !=', $id)->get();
        }

        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
        	$mensaje='error';
        }
        return $mensaje;
    }
    public function validarCamposTipoExistencia($data){
        $db  = \Config\Database::connect();
        $NombreTipoExistencia = $data['NombreTipoExistencia'];
        $CodigoTipoExistencia  = $data['CodigoTipoExistencia'];
        if(empty($data['IdTipoExistencia'])){
        	$validacion= $db->table('tipoexistencia')->where('NombreTipoExistencia',$NombreTipoExistencia)
       		->orWhere('CodigoTipoExistencia', $CodigoTipoExistencia)->get();
        }else{
        	$id =	$data['IdTipoExistencia'];
        	$validacion= $db->table('tipoexistencia')->where('NombreTipoExistencia', $NombreTipoExistencia)
        	->where('IdTipoExistencia !=', $id)->orwhere('CodigoTipoExistencia', $CodigoTipoExistencia)
        	->where('IdTipoExistencia !=', $id)->get();
        }

        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
        	$mensaje='error';
        }
        return $mensaje;
    }

    public function validarCamposTipoOperacion($data){
        $db  = \Config\Database::connect();
        $CodigoSunat = $data['CodigoSUNAT'];
        $CodigoTipoOperacion = $data['CodigoTipoOperacion'];
        $NombreTipoOperacion = $data['NombreTipoOperacion'];

        if(empty($data['IdTipoOperacion'])){
        	$validacion= $db->table('tipooperacion')->where('NombreTipoOperacion',$NombreTipoOperacion)
               ->orWhere('CodigoSUNAT', $CodigoSunat)
               ->orWhere('CodigoTipoOperacion', $CodigoTipoOperacion)->get();
        }else{
        	$id =	$data['IdTipoOperacion'];
            $validacion= $db->table('tipooperacion')->where('NombreTipoOperacion',$NombreTipoOperacion)
                ->where('IdTipoOperacion !=', $id)
                ->orwhere('CodigoTipoOperacion', $CodigoTipoOperacion)
                ->where('IdTipoOperacion !=', $id)
                ->orwhere('CodigoSUNAT', $CodigoSunat)
                ->where('IdTipoOperacion !=', $id)->get();
        }

        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
        	$mensaje='error';
        }
        return $mensaje;

    }
    public function validarCamposRol($data)
    {
        $db  = \Config\Database::connect();
        $NombreRol = $data['NombreRol'];

        if(empty($data['IdRol'])){
        	$validacion= $db->table('rol')->where('NombreRol',$NombreRol)->get();
        }else{
        	$id =	$data['IdRol'];
        	$validacion= $db->table('rol')->where('NombreRol',$NombreRol)
            ->where('IdRol !=', $id)->get();        
        }

        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
            $mensaje='error';
        }
        
        return $mensaje;
    
    }

    public function validarCamposTipoPersona($data)
    {
        $db  = \Config\Database::connect();
        $NombreTipoPersona = $data['NombreTipoPersona'];

        if(empty($data['IdTipoPersona'])){
        	$validacion= $db->table('tipopersona')->where('NombreTipoPersona',$NombreTipoPersona)->get();
        }else{
        	$id =	$data['IdTipoPersona'];
        	$validacion= $db->table('tipopersona')->where('NombreTipoPersona',$NombreTipoPersona)
            ->where('IdTipoPersona !=', $id)->get();        
        }

        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
            $mensaje='error';
        }
        
        return $mensaje;
    
    }

    public function validarCamposGiroNegocio($data)
    {
        $db  = \Config\Database::connect();
        $NombreGiroNegocio = $data['NombreGiroNegocio'];

        if(empty($data['IdGiroNegocio'])){
        	$validacion= $db->table('gironegocio')->where('NombreGiroNegocio',$NombreGiroNegocio)->get();
        }else{
        	$id =	$data['IdGiroNegocio'];
        	$validacion= $db->table('gironegocio')->where('NombreGiroNegocio',$NombreGiroNegocio)
            ->where('IdGiroNegocio !=', $id)->get();        
        }
    }
    public function validarCamposMoneda($data)
    {
        $db  = \Config\Database::connect();
        $CodigoMoneda = $data['CodigoMoneda'];
        $NombreMoneda = $data['NombreMoneda'];
         
        if(empty($data['IdMoneda'])){
            $validacion= $db->table('moneda')->where('CodigoMoneda',$CodigoMoneda)
            ->orWhere('NombreMoneda', $NombreMoneda)->get();
        }else{
        	$id =	$data['IdMoneda'];
        	$validacion= $db->table('moneda')->where('CodigoMoneda', $CodigoMoneda)
        	->where('IdMoneda !=', $id)->orWhere('NombreMoneda', $NombreMoneda)->where('IdMoneda !=', $id)->get();
        }

        $respuesta = $validacion->getResultArray();
        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
        	$mensaje='error';
        }
        return $mensaje;
    }  

    public function validarCamposModuloSistema($data)
    {
        $db  = \Config\Database::connect();
        $NombreModuloSistema = $data['NombreModuloSistema'];
        $AtajoModulo  = $data['AtajoModulo'];
        $UrlModulo  = $data['UrlModulo'];
        if(empty($data['IdModuloSistema'])){
        	$validacion= $db->table('modulosistema')->where('NombreModuloSistema',$NombreModuloSistema)
       		->orWhere('AtajoModulo', $AtajoModulo)->orWhere('UrlModulo', $UrlModulo)->get();
        }else{
        	$id =	$data['IdModuloSistema'];
        	$validacion= $db->table('modulosistema')->where('NombreModuloSistema', $NombreModuloSistema)
        	->where('IdModuloSistema !=', $id)->orwhere('AtajoModulo', $AtajoModulo)
        	->where('IdModuloSistema !=', $id)->get();
        }

        $respuesta = $validacion->getResultArray();
        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
        	$mensaje='error';
        }
        return $mensaje;
    }     

    public function validarCamposGrupoParametro($data)
    {
        $db  = \Config\Database::connect();
        $NombreGrupoParametro = $data['NombreGrupoParametro'];
         
        if(empty($data['IdGrupoParametro'])){
        	$validacion= $db->table('grupoparametro')->where('NombreGrupoParametro',$NombreGrupoParametro)->get();
        }else{
        	$id =	$data['IdGrupoParametro'];
        	$validacion= $db->table('grupoparametro')->where('NombreGrupoParametro', $NombreGrupoParametro)
        	->where('IdGrupoParametro !=', $id)->get();
        }

        $respuesta = $validacion->getResultArray();
        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
            $mensaje='error';
        }
        
        
    }
       

    public function validarCamposDepartamento($data)
    {
        $db  = \Config\Database::connect();
        $NombreDepartamento = $data['NombreDepartamento'];
        $CodigoUbigeoDepartamento  = $data['CodigoUbigeoDepartamento'];
        if(empty($data['IdDepartamento'])){
        	$validacion= $db->table('departamento')->where('NombreDepartamento',$NombreDepartamento)
       		->orWhere('CodigoUbigeoDepartamento', $CodigoUbigeoDepartamento)->get();
        }else{
        	$id =	$data['IdDepartamento'];
        	$validacion= $db->table('departamento')->where('NombreDepartamento', $NombreDepartamento)
        	->where('IdDepartamento !=', $id)->orwhere('CodigoUbigeoDepartamento', $CodigoUbigeoDepartamento)
        	->where('IdDepartamento !=', $id)->get();
        }

        $respuesta = $validacion->getResultArray();
        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
        	$mensaje='El Codigo o nombre ya esta registrado';
        	$mensaje='error';
        }
        return $mensaje;
    }
    //Ya no esta en uso por ahora
    public function validarCamposProvincia($data)
   
    {

        $db  = \Config\Database::connect();
        $NombreProvincia = $data['NombreProvincia'];
        $IdDepartamento = $data['IdDepartamento'];
        $CodigoUbigeoProvincia  = $data['CodigoUbigeoProvincia'];

        if(empty($data['IdProvincia'])){
            $validacion= $db->table('provincia')->where('NombreProvincia', $NombreProvincia)
            ->where('IdDepartamento', $IdDepartamento)->orwhere('CodigoUbigeoProvincia', $CodigoUbigeoProvincia)
            ->where('IdDepartamento', $IdDepartamento)->get();
        }else{
        	$IdProvincia = $data['IdProvincia'];
            $validacion=$db->table('provincia')->where('NombreProvincia', $NombreProvincia)
            ->where('IdDepartamento =', $IdDepartamento)->where('IdProvincia !=', $IdProvincia)
            ->orwhere('CodigoUbigeoProvincia', $CodigoUbigeoProvincia)
            ->where('IdDepartamento =', $IdDepartamento)->where('IdProvincia !=', $IdProvincia)->get();
            

        }

        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
            $mensaje='error';
        }
        return $mensaje;
    }

    public function validarCamposDistrito($data)
    {

        $db  = \Config\Database::connect();
        $NombreDistrito = $data['NombreDistrito'];
        $IdProvincia = $data['IdProvincia'];
        $CodigoUbigeoDistrito  = $data['CodigoUbigeoDistrito'];

        if(empty($data['IdDistrito'])){
            $validacion= $db->table('distrito')->where('NombreDistrito', $NombreDistrito)
            ->where('IdProvincia', $IdProvincia)->orwhere('CodigoUbigeoDistrito', $CodigoUbigeoDistrito)
            ->where('IdProvincia', $IdProvincia)->get();
        }else{
            $IdDistrito = $data['IdDistrito'];
            $validacion=$db->table('distrito')->where('NombreDistrito', $NombreDistrito)
            ->where('IdProvincia =', $IdProvincia)->where('IdDistrito !=', $IdDistrito)
            ->orwhere('CodigoUbigeoDistrito', $CodigoUbigeoDistrito)
            ->where('IdProvincia =', $IdProvincia)->where('IdDistrito !=', $IdDistrito)->get();

        }

        if($validacion->getResultArray()==null){
            $mensaje='';
        }else{
            $mensaje='error';
        }
        return $mensaje;
    }

}
