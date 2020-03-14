<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Busquedas extends CI_Model
{


     function __construct()
     {

          parent::__construct();

     }

     public function busqueda_home ($consulta, $anio, $tipo_de_trabajo) {
        $this->db->select('titulo, anio, autores, carrera, tipo_de_trabajo, filename');
        if ($anio == '- CUALQUIERA -') { $anio = ''; }
        if ($tipo_de_trabajo == '- CUALQUIERA -') { $tipo_de_trabajo = ''; } 
        if ($anio != '') {$this->db->where('anio', $anio);}
        if ($tipo_de_trabajo != '') {$this->db->where('tipo_de_trabajo', $tipo_de_trabajo);}
        $this->db->order_by("anio", "asc");
        $this->db->like('titulo', $consulta);
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


    public function buscar_trabajo_estandar_general ($busqueda) 

    {

         $this->db->select('*');
         $this->db->like('titulo', $busqueda);
         $this->db->or_like('anio', $busqueda);
         $this->db->or_like('tipo_de_trabajo', $busqueda);
         $this->db->or_like('carrera', $busqueda);
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


    public function buscar_todos_los_trabajos () 

    {
         $this->db->select('*');
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


    public function buscar_todos_los_tipos_de_trabajos () 

    {
         $this->db->select('*');
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



    public function buscar_trabajo_especifico ($categoria, $titulo, $anio, $autores, $carrera) { 

        $this->db->select('tipo_de_trabajo, titulo, anio, autores, carrera');
        $this->db->where('tipo_de_trabajo', $categoria);
        $this->db->where('titulo', $titulo);
        $this->db->where('anio', $anio);
        $this->db->where('autores', $autores);
        $this->db->where('carrera', $carrera);
        $this->db->from('trabajos');
        $sentencia_sql = $this->db->get(); 
        if ($sentencia_sql->num_rows() > 0) {
            return true;
         } 
         else
            { 
            return false; 
            }


    }




}


?>