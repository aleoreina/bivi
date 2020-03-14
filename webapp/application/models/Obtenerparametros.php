<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obtenerparametros extends CI_Model
{


     function __construct()
     {

          parent::__construct();

     }

     public function obtener_tipos_de_trabajo () {
        $this->db->distinct();
        $this->db->select('id, tipo_de_trabajo');
        $this->db->from('tipos_de_trabajo');
     	$sentencia_sql = $this->db->get();

     	if ($sentencia_sql->num_rows() > 0) {
     		return $sentencia_sql->result();
    	 } 
    	 else
    	 	{ 
    	 		return false; 
    	 	}
}


     public function obtener_tipo_de_trabajo_especifico ($categoria_especifica) {
        $this->db->select('tipo_de_trabajo');
        $this->db->where('tipo_de_trabajo', $categoria_especifica);
        $this->db->from('tipos_de_trabajo');
        $sentencia_sql = $this->db->get();

        if ($sentencia_sql->num_rows() > 0) {
            return $sentencia_sql->result();
         } 
         else
            { 
                return false; 
            }
}


    public function obtener_fecha_de_trabajos() {
        $this->db->distinct();
        $this->db->select('anio');
        $this->db->from('trabajos');
        $this->db->order_by("anio", "asc");
        $sentencia_sql = $this->db->get();

        if ($sentencia_sql->num_rows() > 0) {
            return $sentencia_sql->result();
         } 
         else
            { 
                return false; 
            }


    }

    public function obtener_nombre_categoria_por_id($id_categoria) {

        $this->db->select('tipo_de_trabajo');
        $this->db->where('id', $id_categoria);
        $this->db->from('tipos_de_trabajo');
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