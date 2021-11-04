<?php
namespace App\Models;
use CodeIgniter\Model;

class mDistrito extends Model
{
    protected $table              = 'distrito';
    protected $primaryKey         = 'IdDistrito';
    protected $returnType         = 'array';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $allowedFields      = ['NombreDistrito','CodigoUbigeoDistrito','IdProvincia','IndicadorEstado' ];

    public function obtenerDistritos()
    {
        /*$query = $this->db->table('distrito')->select('*','d.NombreDepartamento','p.NombreProvincia')
                 ->join('provincia as p', 'p.IdProvincia = distrito.IdProvincia')
                 ->join('departamento as d', 'd.IdDepartamento = p.IdDepartamento'); 
        return $query->get();*/
        $query = "SELECT dis.IdDistrito,dis.NombreDistrito,dis.CodigoUbigeoDistrito,dis.IndicadorEstado,d.NombreDepartamento,p.NombreProvincia
        FROM distrito AS dis INNER JOIN provincia AS p ON dis.IdProvincia = p.IdProvincia 
        INNER JOIN departamento AS d ON p.IdDepartamento=d.IdDepartamento";
        return $datos = $this->query($query);
    }

    public function obtenerDepartamentos()
    {
        $datos = $this->db->table('departamento')->orderBy('NombreDepartamento', 'ASC');
        return $datos->get();
    }

    public function obtenerProvincias($id)
    {
        $datos = $this->db->table('provincia')->where('IdDepartamento',$id)->orderBy('NombreProvincia', 'ASC');
        return $datos->get();
    }

    public function mostrarDistrito($id)
    {
        $query = $this->db->table('distrito')->select('*','p.NombreProvincia,p.IdProvincia','d.NombreDepartamento,d.IdDepartamento')
        ->join('provincia as p', 'p.IdProvincia = distrito.IdProvincia', 'left')
        ->join('departamento as d', 'd.IdDepartamento = p.IdDepartamento', 'left')
        ->where('distrito.IdDistrito',$id);
        return $query->get();
    }

    //aqui registrar

    public function insertarDistrito($data)
    {
        $data = array(
            'CodigoUbigeoDistrito'   =>$data['CodigoUbigeoDistrito'],
            'NombreDistrito'         =>$data['NombreDistrito'],
            'IdProvincia'          =>$data['IdProvincia'],
            'IndicadorEstado'         => 'A'
        );
        $datos = $this->insert($data);
        return $datos;
    }

    public function actualizarDistrito($data)
    {
        $id = $data['IdDistrito'];

        if(isset($data['IndicadorEstado'])){
            $data = [
                'IndicadorEstado'  => $data['IndicadorEstado']
            ];
        }else{
            $data = [
                'CodigoUbigeoDistrito'   =>$data['CodigoUbigeoDistrito'],
                'NombreDistrito'         =>$data['NombreDistrito'],
                'IdProvincia'          =>$data['IdProvincia'],
                'IdDepartamento'          =>$data['IdDepartamento']
            ];
        }

        $datos = $this->update($id,$data);
        return $datos;
    }


}
