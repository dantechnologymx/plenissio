<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_serviciosmedicos extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_catalogos');
		$this->load->model('M_servicios');
		$this->load->model('M_personas');
		$this->load->model('M_relaciones');
		$this->load->model('M_domicilios');
	}
	
	public function index(){
		if($this->validar()) {
			$datos['servicios'] = $this->M_servicios->serviciosArea(4);
			$this->load->view('menu/v_header');
			$this->load->view('serviciosmedicos/v_Inicio', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para validar que esta dentro de sesion
	public function validar(){
		if($this->session->userdata('nombre')!=null)
			return true;
		else
			return false;
	}
				
}

/* End of file c_asistenciasocial.php */
/* Location: ./application/controllers/c_asistenciasocial.php */
?>