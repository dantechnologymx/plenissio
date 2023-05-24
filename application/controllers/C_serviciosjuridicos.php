<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_serviciosjuridicos extends CI_Controller {
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
			$datos['servicios'] = $this->M_servicios->serviciosArea(3);
			$this->load->view('menu/v_header');
			$this->load->view('serviciosjuridicos/v_Inicio', $datos);
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
			$this->session->set_userdata('idPrograma', $idprograma);
			switch ($idprograma) {
				case '17':
					$this->EntrevistaInicial($idpersona);
					break;
				case '18':
					$this->EntrevistaInicial($idpersona);
					break;
				case '19':
					$this->EntrevistaInicial($idpersona);
					break;
				case '30':
					$this->EntrevistaInicial($idpersona);
					break;
				case '4':
					$this->EntrevistaInicial($idpersona);
					break;
				
				default:
					index();
					break;
			}
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir a MAVI
	public function EntrevistaInicial($idpersona){
		if($this->validar()){
			$datos['domicilio'] = $this->M_domicilios->getDomicilio($idpersona);
			$persona = $this->M_personas->busquedaId($idpersona);
			$datos['persona'] = $persona;
			$datos['estadoCivil']= $this->M_catalogos->getEstadoCivil();
			$datos['escolaridad']= $this->M_catalogos->getEscolaridad();
			$datos['consumo']= $this->M_catalogos->getFrecuenciaConsumo();
			$datos['edad'] = $this->calculaEdad($persona->Fecha_Nacimiento);
			$datos['localidades']= $this->M_catalogos->getLocalidades();
			$datos['tipoVialidad']= $this->M_catalogos->getTipoVialidad();
			$datos['procedencia']= $this->M_catalogos->getProcedenciaSolicitud();
			$datos['estados']= $this->M_catalogos->getEstados();
			//print_r($datos['domicilio']);
			$this->session->set_userdata('curpbuscada', $persona->Curp);
			$this->session->set_userdata('idPersona',$idpersona);
			$this->load->view('menu/v_header');
			$this->load->view('serviciosjuridicos/v_EntrevistaInicial', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}

	//Funcion para calcular la edad
    public function calculaEdad($fecha) {
	    list($Y,$m,$d) = explode("-",$fecha);
	    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
	}

	//Funcion para guardar la entrevista Inicial para MAVI
	public function guardarEntrevista(){
		if($this->input->post()){
			$register = $this->M_catalogos->datosRegistro();
			$tmp1 = array_slice($_POST, 0, 1);
			$fecha = array_slice($_POST, 1, 1);
			$tmp2 = array_slice($_POST, 2, 10);
			$dependientes = array_slice($_POST, 12, 1);
			$tmp3 = array_slice($_POST, 13, 2);
			if ($fecha["Fecha"] <> null) {
				$date = str_replace('/', '-', $fecha["Fecha"]);
				$fecha = array(
				"Fecha" => date("Y-m-d", strtotime($date)),
				);
			}
			$tmp = array(
				"Id_Servicio" => $this->session->userdata('idServicio'),
				"Id_Programa" => $this->session->userdata('idPrograma'),
				"Id_Area_DIF" => 3,
			);
			$entrevistainicial = array_merge($tmp,$tmp1,$fecha,$tmp2,$tmp3,$register);
			//mandar guardar la entrevista
			$this->M_relaciones->guardarEntrevistaInicial($entrevistainicial);
			$idEntrevista = $this->db->insert_id();
			if( $this->db->affected_rows() == 0 ){
				$bandera = false;
			}else {
				$bandera = true;
				$this->M_servicios->actualizarEstatus($this->session->userdata('idServicio'));
			}
			//print_r($dependientes);

		     if ($dependientes['Dependientes'] == "") {
				echo json_encode($bandera);
		     }else{
				$tmp4 = explode ('@', $dependientes['Dependientes']);
				$cont = count($tmp4);
				for ($i=0; $i < $cont-1 ; $i++) { 
					$tmp5[$i] = explode(',', $tmp4[$i]);
				}
				foreach ($tmp5 as $value) {
					$depen = array(
					"Id_Servicio" => $this->session->userdata('idServicio'),
					"Id_Entrevista" =>$idEntrevista,
					"Nombre" => $value[0],
					"Edad" => $value[1],
					"Id_Estado_Civil" => $value[2],
					"Id_Escolaridad" => $value[3],
					"Ocupacion" => $value[4],
					);
					//Enviar a guardar dependiente
					$depen = array_merge($depen,$register);
					$this->M_personas->guardarDependiente($depen);
				}
				echo json_encode($bandera);
			}
		}
	}
				
}

/* End of file c_serviciosjuridicos.php */
/* Location: ./application/controllers/c_serviciosjuridicos.php */
?>