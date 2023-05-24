<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_administrativo extends CI_Controller {
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
			$datos['servicios'] = $this->M_servicios->serviciosArea(7);
			$this->load->view('menu/v_header');
			$this->load->view('administrativo/v_Inicio', $datos);
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
	//Funcion para canalizar al servicio solicitado.
	public function canalizar($idprograma = 0,$idpersona = 0,$idservicio=0){
		if($this->validar()){
			$this->session->set_userdata('idServicio', $idservicio);
			switch ($idprograma) {
				case '1':
					$this->adultosMayores($idpersona);
					break;
				case '5':
					$this->MAVI($idpersona);
					break;
				case '29':
					$this->informacion($idpersona);
					break;
				case '27':
					$this->apoyosDirectos($idpersona);
					break;
				
				default:
					index();
					break;
			}
		}else{
			$this->load->view('v_login');
		}
	}
				
}

/* End of file c_asistenciasocial.php */
/* Location: ./application/controllers/c_asistenciasocial.php */
?>