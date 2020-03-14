<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Model
{


     function __construct()
     {

          parent::__construct();

     }

     public function chequear_auteticacion_usuario ($usuario, $clave) {
	   	$this->db->where('usuario', $usuario);
     	$this->db->where('clave', $clave);
     	$sentencia_sql = $this->db->get('usuarios');

     	if ($sentencia_sql->num_rows() == 1) {
     		return true;

    	 } 
    	 else
    	 	{ 
    	 		return false; 
    	 	}
}

}


?>