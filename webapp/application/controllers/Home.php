<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
  		$this->load->helper(array('url', 'html'));
  		$this->load->library('session');
		$this->load->model('Obtenerparametros');
		$this->load->model('Busquedas');
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
		// OBTENEMOS LOS PARAMETROS
		$data['tipo_de_trabajos'] = $this->Obtenerparametros->obtener_tipos_de_trabajo();
		$data['anio_trabajos'] =  $this->Obtenerparametros->obtener_fecha_de_trabajos();
		if ($data['tipo_de_trabajos'] && $data['anio_trabajos'] !== false) {
		// INVOCO LAS LIBRERIAS DE ASISTENCIA
		// AYUDANTE DE LOS FORMULARIOS
		$this->load->helper('form');
		// LIBRERIA PARA VALIDACION
		$this->load->library('form_validation');
		$this->form_validation->set_rules('campo_consulta', 'Consulta', 'required|alpha_numeric_spaces');
	if($this->form_validation->run() == false) {
		$this->load->view('home/home_search', $data);
		}	
		else {
			$consulta_realizada = $this->input->post('campo_consulta');
			$anio_consulta_realizada = $this->input->post('anio_consulta');
			$tipodetrabajo_consulta_realizada = $this->input->post('tipo_de_trabajo_consulta');
			$resultado = $this->Busquedas->busqueda_home($consulta_realizada, $anio_consulta_realizada, $tipodetrabajo_consulta_realizada);
			if($resultado != false) {
				$data['datos_busqueda'] = $resultado;
				$this->load->view('search/search_custom', $data);
				}
				else {
					$data['error'] = 'Disculpe, No hay ningun documentos relacionados con su busqueda.';
					$this->load->view('home/home_search', $data);

				}

		}



		}
		else {
			$data['error'] = '¡No hay archivos registrados!';
			$this->load->view('home/home_sin_trabajos', $data);

		}



	}



/*

	function logout()
 {
        $data = array('login' => '', 'uname' => '', 'uid' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
 		redirect('home');
 }*/
}
