<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Desconectarse extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('empty_web');
		$this->load->css('assets/themes/default/css/bootstrap.min.css');
		$this->load->css('assets/themes/default/css/global_app.css');
		$this->load->js('assets/themes/default/js/bootstrap.min.js');
		$this->load->js('assets/themes/default/js/jquery-3.2.1.min.js');
	}

	public function index()
	{

		if(isset($_SESSION['usuario'])) {
			foreach ($_SESSION as $llave => $valor) {
				unset($_SESSION[$llave]);
				

			}
				$this->load->view('login/home_logout');

				 $this->output->set_header('refresh:5; url='.site_url(""));
		}
		else {
			redirect('./');
		}



	}


}
