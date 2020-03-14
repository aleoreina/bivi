<?php
if (!defined('BASEPATH')){exit('No direct script access allowed');}
if (!function_exists('comprobar_sesiones')) {
    function comprobar_sesion() {

		if (!isset($_SESSION['usuario'] ) ) {
		redirect('/conectarse');	
		}
		
    }
}
    ?>