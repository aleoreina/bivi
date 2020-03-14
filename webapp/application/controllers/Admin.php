<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('sesiones');
		$this->_init();
	}


	private function _init()
	{

		comprobar_sesion();		
		$this->output->set_template('admin_web');
		$this->load->css('assets/themes/default/css/bootstrap.min.css');
		$this->load->css('assets/themes/default/css/admin.css');
		$this->load->js('assets/themes/default/js/jquery-3.2.1.min.js');
		$this->load->js('assets/themes/default/js/bootstrap.min.js');
	}

	public function index()
	{
		$this->load->view('admin/home_admin');
	}

	public function gestionartesis() {
		
	$this->load->view('admin/manager_tesis');	

	}




}
