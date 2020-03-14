<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias extends CI_Model
{


     function __construct()
     {

          parent::__construct();

     }

     public function agregar_categoria ($categoria_a_agregar) {
        $array_ayudante = array('tipo_de_trabajo' => $categoria_a_agregar);
        $this->db->insert('tipos_de_trabajo', $array_ayudante);

}

	public function eliminar_categoria_por_id($id_categoria) {
		$array_ayudante = array('id' => $id_categoria);
		$this->db->delete('tipos_de_trabajo', $array_ayudante);
	}


    public function buscar_trabajos_por_id_categoria($id_categoria) {
        $this->db->distinct();
        $this->db->select('tipo_de_trabajo');
        $this->db->where('id', $id_categoria);
        $this->db->from('tipos_de_trabajo');
        $primera_sentencia = $this->db->get();

        if ($primera_sentencia->num_rows() > 0) {

            $resultado = $primera_sentencia->result();


        $this->db->select('*');
        $this->db->where('tipo_de_trabajo', $resultado[0]->tipo_de_trabajo);
        $this->db->from('trabajos');
        $segunda_sentencia = $this->db->get();


        if ($segunda_sentencia->num_rows() > 0) {
            return true;
         } 
         else
            { 
                return false; 
            }


         } 
         else
            { 
                return false; 
            }






    }



}

?>