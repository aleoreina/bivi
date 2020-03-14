<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestionarcategorias extends CI_Controller {

	function __construct()
	{
		parent::__construct();
  		$this->load->helper(array('url', 'html'));
  		$this->load->library('session');
		$this->load->model('Obtenerparametros');
		$this->load->model('Categorias');
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
		// LIBRERIA DE AYUDANTE
		$this->load->helper('form');
		// LIBRERIA PARA VALIDACION

		$if_Eliminar = !empty($this->input->post('Eliminar_cat'));
		$if_Modificar = !empty($this->input->post('Modificar_cat'));
		$anti_burla = 0;

		if ($if_Eliminar || $if_Eliminar == 1) {
		if ($if_Eliminar == 1) {
			$this->eliminar($this->input->post('Eliminar_cat'));
			$anti_burla = 1;

		}
		if ($if_Modificar == 1) {
			if ($anti_burla != 1) {
				$this->Modificar($this->input->post('Modificar_cat'));
			}
		}

}  else {
		// OBTENEMOS LOS PARAMETROS
		$data['datos_categorias'] = $this->Obtenerparametros->obtener_tipos_de_trabajo();
		if ($data['datos_categorias'] != false) {
			$this->load->view('admin/gestionar_categorias', $data);
		}
		else {
			$data['error'] = 'No hay categorias registradas';
			$this->load->view('admin/gestionar_categorias', $data);

		}
	}
	}

	public function agregar () {
		// INVOCO LAS LIBRERIAS DE ASISTENCIA
		// AYUDANTE DE LOS FORMULARIOS
		$this->load->helper('form');

		// LIBRERIA PARA VALIDACION
		$this->load->library('form_validation');
		$this->form_validation->set_rules('categoria_a_agregar', 'Categoria', 'required');

		if($this->form_validation->run() == false) {
		$this->load->view('admin/agregar_categoria');
		}	
		else {

			$categoria_a_agregar = $this->input->post('categoria_a_agregar');

			if (!$this->Obtenerparametros->obtener_tipo_de_trabajo_especifico($categoria_a_agregar)) {
				$this->Categorias->agregar_categoria($categoria_a_agregar);
				redirect('admin/gestionar/categorias/');
			}
			else {
				$data['error'] = 'La categoria cuyo nombre ' . $categoria_a_agregar . ' ya existe. Intente otro nombre';
				$this->load->view('admin/agregar_categoria', $data);
			}
}

	}


	public function eliminar($id_eliminar) {
	
	$trabajos_rel_categoria = $this->Categorias->buscar_trabajos_por_id_categoria($id_eliminar);

		if ($trabajos_rel_categoria != true) {
				$this->Categorias->eliminar_categoria_por_id($id_eliminar);
				redirect('admin/gestionar/categorias');
		}
		else {
			$data['error'] = 'La categoria que elijio tiene trabajos registrados y no se puede eliminar. (Primero elimine todos los trabajos relacionados a esta categoria y luego intente nuevamente a eliminarla.';
			$this->load->view('admin/gestionar_categorias_not', $data);

		}


	}

}
