<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Busqueda_tesis extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('public_web');
		$this->load->css('assets/themes/default/css/bootstrap.min.css');

		$this->load->js('assets/themes/default/js/jquery-3.2.1.min.js');
				$this->load->js('assets/themes/default/js/bootstrap.min.js');
	}

	public function index()
	{
		$this->load->view('search/search_custom');
	}


}
