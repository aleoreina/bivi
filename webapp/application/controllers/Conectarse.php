<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conectarse extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('session'));
		$this->load->model('login');
		$this->load->library('recaptcha');
		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('public_web');
		$this->load->css('assets/themes/default/css/bootstrap.min.css');
		$this->load->css('assets/themes/default/css/global_app.css');
		$this->load->js('assets/themes/default/js/bootstrap.min.js');
		$this->load->js('assets/themes/default/js/jquery-3.2.1.min.js');
	}

	public function index()
	{	
		if (!isset($_SESSION['usuario']) ) {
		redirect('conectarse/autenticar');	
		}
		else
		{
			redirect('/');	

		}
		
	}


	public function autenticar() {

        $data = array(
            'widget' => $this->recaptcha->getWidget(),
            'script' => $this->recaptcha->getScriptTag(),
        );
       

		// INVOCO LAS LIBRERIAS DE ASISTENCIA
		// AYUDANTE DE LOS FORMULARIOS
		$this->load->helper('form');
		// LIBRERIA PARA VALIDACION
		$this->load->library('form_validation');

		// REGLAS DE VALIDACION
		$this->form_validation->set_rules('usuario', 'Usuario', 'required|alpha_numeric');
		$this->form_validation->set_rules('clave', 'Clave', 'required|alpha_numeric');

		if($this->form_validation->run() == false) {
			$this->load->view('login/home_login', $data);
		}	
		else {
			// ESTABLECIENDO VARIABLES DE FORMULARIO
			$usuario = $this->input->post('usuario');
			$clave = $this->input->post('clave');
       		$recaptcha = $this->input->post('g-recaptcha-response');
       		$response = $this->recaptcha->verifyResponse($recaptcha);

            
            if (isset($response['success']) and $response['success'] === true) {

			if($this->login->chequear_auteticacion_usuario($usuario, $clave)) {
			
				// ESTABLECEMOS LA VARIABLES DE SESION
				$_SESSION['usuario'] = $usuario; 
				redirect('/admin');

			} else {
				$data['error'] = 'El usuario o la contraseña estan mal..';
				$this->load->view('login/home_login', $data);
			}
}

            else {
            	$data['error'] = 'Por favor, la verifique el captcha..';
				$this->load->view('login/home_login', $data);
            }

}


	

}

		public function Desconectarse() {

			redirect('/Desconectarse');

		 }

}
