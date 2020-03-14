<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestionartrabajos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
  		$this->load->helper(array('url', 'html', 'form'));
  				$this->load->helper('sesiones');
  		$this->load->library('session');
		$this->load->model('Obtenerparametros');
		$this->load->model('Categorias');
		$this->load->model('Busquedas');
				$this->load->model('Trabajos');
		$this->load->library('form_validation');
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


		if ($this->input->post('eliminar_trabajo') != NULL) {

			$fichero = $this->Trabajos->obtener_nombre_del_fichero($this->input->post('eliminar_trabajo'));

						$this->eliminar($this->input->post('eliminar_trabajo'), $fichero[0]->filename);


		}

		$limite_de_busqueda = 5;

		// INVOCO LAS LIBRERIAS DE ASISTENCIA
		// AYUDANTE DE LOS FORMULARIOS
		$this->load->helper('form');
		// LIBRERIA PARA VALIDACION
		$this->load->library('form_validation');

		$data['NULL'] = "NULL";

		$trabajos_disponibles = $this->Busquedas->buscar_todos_los_trabajos();
		$tipos_de_trabajos_disponibles = $this->Busquedas->buscar_todos_los_tipos_de_trabajos();


		$data['limite_de_busqueda'] = $limite_de_busqueda;
		if ($tipos_de_trabajos_disponibles !== false) {

		if ($trabajos_disponibles != false ) {

			$data['total_trabajos'] = count($trabajos_disponibles);

		if ( $this->input->post('contador_desde_pagina') !== NULL ) {

			$contador_de_busqueda = $limite_de_busqueda;
			$data['start_busqueda'] = $this->input->post('contador_desde_pagina') + 1; 

			$control_1 = $data['start_busqueda'] + $limite_de_busqueda;

			if ($control_1 > count($trabajos_disponibles)) {

				$data['end_busqueda'] = count($trabajos_disponibles) - 1;

			}
			else 
			{
			$data['end_busqueda'] = $data['start_busqueda'] + $limite_de_busqueda - 1;

			}

		

}
		else {

			$contador_de_busqueda = $limite_de_busqueda;
			$data['start_busqueda'] = 0;
			if (count($trabajos_disponibles) > $limite_de_busqueda) {

			$data['end_busqueda'] = $contador_de_busqueda - 1;

			}
			else {
			$data['end_busqueda'] = count($trabajos_disponibles) - 1;
			}

		}

		$data['puedes_registrar'] = true;
		$data['trabajos_disponibles'] = $trabajos_disponibles;
		$this->load->view('admin/gestionar_trabajos', $data);
		} else 
		{
		   $data['error'] = "No hay trabajos registrados";
		   $data['puedes_registrar'] = true;
		   $this->load->view('admin/gestionar_trabajos', $data);
		}

		}
		else {
			$data['error'] = "Usted debe ir a categorias y registrar primero cuales son los tipos de categorias pertinentes a los trabajos que se almacenaran en esta biblioteca. <br>(Debe existir por lo menos una).";
		   $this->load->view('admin/gestionar_trabajos', $data);
		}




	}


	public function agregar() {






	$data['tipos_de_trabajos'] = $this->Obtenerparametros->obtener_tipos_de_trabajo();


	if ($_POST != NULL ) {




$this->form_validation->set_rules('titulo_del_trabajo', 'Titulo del trabajo', 'required');
$this->form_validation->set_rules('tipo_de_trabajo_agregar', 'Categoria', 'required|alpha_numeric_spaces');
$this->form_validation->set_rules('anio', 'Año', 'required|numeric');
$this->form_validation->set_rules('autores', 'Autores', 'required');
$this->form_validation->set_rules('carrera', 'Carrera', 'required|alpha_numeric_spaces');

		$anio_de_trabajo = $this->input->post('anio');  
		$categoria = str_replace(" ", "_", $this->input->post('tipo_de_trabajo_agregar'));
		$titulo = str_replace(" ", "_",  $this->input->post('titulo_del_trabajo'));


$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
$numerodeletras=16; 
$letras_aleatoria = "";
for($i=0;$i<$numerodeletras;$i++)
{
    $letras_aleatoria .= substr($caracteres,rand(0,strlen($caracteres)),1);
}


		$file_name = $anio_de_trabajo . "-" . $categoria .  "-" . $letras_aleatoria;

 	$config['upload_path']          = './documentos/';
    $config['allowed_types']        = 'pdf';
    $config['file_name']        = $file_name;


    $config['max_filename_increment'] = 0;
     $config['max_filename'] = 0;
     $config['remove_spaces'] = 0;
    $this->load->library('upload', $config);
}



		if($this->form_validation->run() == false) {
		$this->load->view('admin/agregar_trabajo', $data);
		}	
		else {



                if ($_FILES != NULL) {

                if (!$this->upload->do_upload('trabajo_de_grado_pdf'))
                {

   $data['error'] = $this->upload->display_errors();


				$this->load->view('admin/agregar_trabajo', $data);

                }
                else
                {


        $data['titulo_del_trabajo'] = $this->input->post('titulo_del_trabajo');
     	$data['anio'] = $this->input->post('anio');  
		$data['categoria'] = $this->input->post('tipo_de_trabajo_agregar');


		$data['autores'] = $this->input->post('autores');

	
		$data['carrera'] = $this->input->post('carrera');

		$data['nombre_del_archivo'] =  $file_name . ".pdf";

        $data['upload_status'] = "OK";


        if(!$this->Busquedas->buscar_trabajo_especifico($data['categoria'], $data['titulo_del_trabajo'], $data['anio'],$data['autores'],  $data['carrera'])) {


	$registrar_datos = $this->Trabajos->agregar_trabajo ($data['titulo_del_trabajo'], $data['categoria'], $data['anio'], $data['autores'], $data['carrera'], $data['nombre_del_archivo']);




        $this->load->view('admin/trabajo_agregado', $data);


        }

        else {

        $this->load->view('admin/trabajo_existe', $data);

        }

        
                }
			        
			
} else {


$this->load->view('admin/agregar_trabajo', $data);

	}}
}

public function eliminar ($id, $nombre_del_archivo) {


	unlink('./documentos/' . $nombre_del_archivo);
	$this->Trabajos->eliminar_trabajo_por_id($id);
	redirect('admin/gestionar/archivos');


}

}
