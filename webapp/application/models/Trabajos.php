<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trabajos extends CI_Model
{


     function __construct()
     {

          parent::__construct();

     }

    public function agregar_trabajo ($titulo, $categoria, $anio, $autores, $especialidad, $filename) {

        $array_ayudante = array('titulo' => $titulo, 'tipo_de_trabajo' => $categoria, 'anio' => $anio, 'autores' => $autores, 'carrera' => $especialidad, 'filename' => $filename);
        $this->db->insert('trabajos', $array_ayudante);

}


	public function eliminar_trabajo_por_id($id_trabajo) {
		$array_ayudante = array('id' => $id_trabajo);
		$this->db->delete('trabajos', $array_ayudante);
	}


    public function obtener_nombre_del_fichero ($id) {
        $this->db->select('filename');
        $this->db->where('id', $id);
        $this->db->from('trabajos');
                $sentencia_sql = $this->db->get();

        if ($sentencia_sql->num_rows() > 0) {
            return $sentencia_sql->result();
         } 
         else
            { 
                return false; 
            }
    }


}

?>