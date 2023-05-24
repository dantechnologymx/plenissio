<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_reportes extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_reportes');
		//$this->load->model('M_catalogos');
	}
	
	public function index(){
		if($this->validar()){
			$this->load->view('menu/v_header');
			$this->load->view('reportes/v_Inicio', $datos);
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
	//Funcion para llamar la vista principal de los reportes por dia.
	public function inicioReporteDia(){
		if($this->validar()){
			$this->load->view('menu/v_header');
			$this->load->view('reportes/v_inicioReporteDia');
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para obtener reporte en pantalla de los servicios del día
	public function serviciosDia($fecha){
		if($this->validar()){
			echo $fecha;
			$datos['servicios']= $this->M_reportes->consultarServiciosDia($fecha);
			$this->session->set_userdata('fechaconsulta',$fecha);
			$this->load->view('menu/v_header');
			$this->load->view('reportes/v_serviciosDia', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para obtener reporte en pantalla de los servicios dentro de un rango de fechas
	public function serviciosPeriodo($fechainicial,$fechafinal){
		if($this->validar()){
			$datos['servicios']= $this->M_reportes->consultarServiciosPeriodo($fechainicial,$fechafinal);
			$this->session->set_userdata('fechaconsulta',$fechainicial." y ".$fechafinal);
			$this->load->view('menu/v_header');
			$this->load->view('reportes/v_serviciosDia', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}

}

/* End of file C_reportes.php */
/* Location: ./application/controllers/C_reportes.php */
?>