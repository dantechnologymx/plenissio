<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_asistenciasocial extends CI_Controller {
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
			$datos['servicios'] = $this->M_servicios->serviciosArea(1);
			$this->load->view('menu/v_header');
			$this->load->view('asistenciasocial/v_Inicio', $datos);
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
	//Funcion para ir a Adultos Mayores
	public function adultosMayores($idpersona){
		if($this->validar()){
			$persona = $this->M_personas->curp($idpersona);
			$this->session->set_userdata('curpbuscada', $persona[0]->Curp);
			$datos["cursos"] = $this->M_catalogos->getTerapiaOcupacional();
			$this->load->view('menu/v_header');
			$this->load->view('asistenciasocial/v_adultosMayores', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir a Información
	public function informacion($idpersona){
		if($this->validar()){
			$persona = $this->M_personas->curp($idpersona);
			$this->session->set_userdata('curpbuscada', $persona[0]->Curp);
			$datos['programas'] =  $this->M_catalogos->getProgramasDIFArea(1);
			$this->load->view('menu/v_header');
			$this->load->view('asistenciasocial/v_informacion', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir a Apoyos Directos
	public function apoyosDirectos($idpersona){
		if($this->validar()){
			$persona = $this->M_personas->curp($idpersona);
			$this->session->set_userdata('idPersona',$idpersona);
			$this->session->set_userdata('curpbuscada', $persona[0]->Curp);
			$datos['frecuenciaApoyo']= $this->M_catalogos->getFrecuenciaApoyo();
			$this->load->view('menu/v_header');
			$this->load->view('asistenciasocial/v_apoyosDirectos', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir a MAVI
	public function MAVI($idpersona){
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
			$this->load->view('asistenciasocial/v_MAVI', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
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
	//Funcion para guardar los datos de un registro a Adulto Mayor
	public function registroAdultoMayor(){
		if($this->input->post()){
			$register = $this->M_catalogos->datosRegistro();
			foreach ($_POST['Id_Terapia_Ocupacional'] as $value) {
				$terapia = array(
					"Id_Servicio" => $this->session->userdata('idServicio'),
					"Id_Terapia_Ocupacional" => $value,
					"Id_Estatus" => 1,
				);
				$terapia = array_merge($terapia,$register);
				$this->M_relaciones->guardarTerapia($terapia);
			}
			if( $this->db->affected_rows() == 0 ){ 
				$bandera = false;
			}
		    else {
		    	$bandera = true;
		    	$this->M_servicios->actualizarEstatus($this->session->userdata('idServicio'));
		    }
			echo json_encode($bandera);		
		}
	}
	//Funcion para guardar los datos de un registro de Apoyo Directo
	public function registroApoyosDirectos(){
		if($this->input->post()){
			$register = $this->M_catalogos->datosRegistro();
			$tmp1 = array_slice($_POST, 0, 10);
			$fecha = array_slice($_POST, 10, 1);
			$tmp2 = array_slice($_POST, 11, 3);
			if ($fecha["Fecha_Entrega"] <> null) {
				$date = str_replace('/', '-', $fecha["Fecha_Entrega"]);
				$fecha = array(
				"Fecha_Entrega" => date("Y-m-d", strtotime($date)),
				);
			}
			$tmp = array(
				"Id_Servicio" => $this->session->userdata('idServicio'),
			);
			$apoyodirecto = array_merge($tmp,$tmp1,$fecha,$tmp2,$register);

			$this->M_relaciones->guardarApoyoDirecto($apoyodirecto);
			
			if( $this->db->affected_rows() == 0 ){ 
				$bandera = false;
			}
		    else {
		    	$bandera = true;
		    	$this->M_servicios->actualizarEstatus($this->session->userdata('idServicio'));
		    }
			echo json_encode($bandera);		
		}
	}
	//Funcion para guardar los datos de un registro de Apoyo de Unica Ocasion
	public function registroApoyosUnicos(){
		if($this->input->post()){
			$register = $this->M_catalogos->datosRegistro();
			$tmp1 = array_slice($_POST, 0, 4);
			$fecha = array_slice($_POST, 4, 1);
			$tmp2 = array_slice($_POST, 5, 1);
			if ($fecha["Fecha_Entrega"] <> null) {
				$date = str_replace('/', '-', $fecha["Fecha_Entrega"]);
				$fecha = array(
				"Fecha_Entrega" => date("Y-m-d", strtotime($date)),
				);
			}
			$tmp = array(
				"Id_Servicio" => $this->session->userdata('idServicio'),
			);
			$apoyounico = array_merge($tmp,$tmp1,$fecha,$tmp2,$register);

			$this->M_relaciones->guardarApoyoUnico($apoyounico);
			
			if( $this->db->affected_rows() == 0 ){ 
				$bandera = false;
			}
		    else {
		    	$bandera = true;
		    	$this->M_servicios->actualizarEstatus($this->session->userdata('idServicio'));
		    }
			echo json_encode($bandera);		
		}
	}
	//Funcion para guardar los datos de un registro de consulta de Información
	public function registroInformacion(){
		if($this->input->post()){
			$register = $this->M_catalogos->datosRegistro();
			foreach ($_POST['Id_Programa_DIF'] as $value) {
				$informacion = array(
					"Id_Servicio" => $this->session->userdata('idServicio'),
					"Id_Programa_DIF" => $value,
				);
				$informacion = array_merge($informacion,$register);
				$this->M_relaciones->guardarInformacion($informacion);
			}
			$servicioInformacion = array(
				"Id_Servicio" =>$this->session->userdata('idServicio'),
				"Id_Area_DIF" => 1,
				"Observaciones" => $_POST['Observaciones'],
				);
			$servicioInformacion = array_merge($servicioInformacion,$register);
			$this->M_relaciones->guardarServicioInformacion($servicioInformacion);

			if( $this->db->affected_rows() == 0 ){ 
				$bandera = false;
			}
		    else {
		    	$bandera = true;
		    	$this->M_servicios->actualizarEstatus($this->session->userdata('idServicio'));
		    }
			echo json_encode($bandera);		
		}
	}
	//funcion para buscar una persona de forma dinamica en los inputs
	public function buscarPersona(){
		//echo $_POST['Nombre_Conyugue'];
        $searchResult = $this->M_personas->buscarPersona($_POST['Nombre_Conyugue']);
        echo ($searchResult);
    }
    //Funcion para calcular la edad
    public function calculaEdad($fecha) {
	    list($Y,$m,$d) = explode("-",$fecha);
	    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
	}
	//Funcion para realizar busqueda de persona por medio del Id
	public function busquedaPersona($idPersona){
		//Persona si existe en la base de datos
		$datos['persona'] = $this->M_personas->busquedaId($idPersona);
		//$datos['Estado']= $this->M_catalogos->getEstado($datos['persona']->Id_Estado);
		$datos['domicilio'] = $this->M_domicilios->getDomicilio($idPersona);
		$datos['estadoCivil']= $this->M_catalogos->getEstadoCivil();
		$datos['edad'] = $this->calculaEdad($datos['persona']->Fecha_Nacimiento);
		$datos['escolaridad']= $this->M_catalogos->getEscolaridad();
		echo json_encode($datos);
	}
	//Funcion para realizar busqueda de persona por medio de la CURP
	public function CurpSearch($curp){
		//Persona si existe en la base de datos
		$idPersona = $this->M_personas->searchId($curp);
		if (!empty($idPersona)) {
			$datos['persona'] = $this->M_personas->busquedaId($idPersona[0]->Id);
			//$datos['Estado']= $this->M_catalogos->getEstado($datos['persona']->Id_Estado);
			$datos['domicilio'] = $this->M_domicilios->getDomicilio($idPersona[0]->Id);
			$datos['estadoCivil']= $this->M_catalogos->getEstadoCivil();
			$datos['edad'] = $this->calculaEdad($datos['persona']->Fecha_Nacimiento);
			$datos['escolaridad']= $this->M_catalogos->getEscolaridad();
			echo json_encode($datos);
		}else{
			$datos = false;
			echo json_encode($datos);
		}
	}
	//Funcion para realizar la busqueda por curp desde la entrevistainicial
	public function busquedaCurp($curp){
		$url = "http://wsrenapo.col.gob.mx/curp/apiV1/obtener/info?curp=".$curp."&allstr=true.json";
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_USERPWD, "seder:9ef19416916a9cbbe979573f179522f7"); 
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_URL, $url); 
		$data = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($data);

		//Se verifica el resultado obtenido de la RENAPO
		if ($response->REST_Service->status_response == "TRUE") {
			//Si todo esta bien
			$nombreEstado = $this->M_catalogos->getEstadoCveCurp($response->response->cveEntidadNac);
			$data_final = array();
			$data_final[0] = $response->response->CURP;
			$data_final[1] = $response->response->nombres;
			$data_final[2] = $response->response->apellido1;
			$data_final[3] = $response->response->apellido2;
			$data_final[4] = $nombreEstado[0]->Nombre;
			$data_final[5] = $response->response->fechNac;
			if ($response->response->sexo == "M"){
				$data_final[6] = "Mujer";
			}else{
				$data_final[6] = "Hombre";
			}
			$data_final[7] = $response->response->nacionalidad;

			$datos['idEstado']= $this->M_catalogos->getIdEstado($data_final[4]);
			$datos['persona'] = $data_final;
			echo json_encode($datos);
		}else{
			//Si hay error se despliega el mensaje para verificar la CURP
			$datos = false;
			echo json_encode($datos);
		}
	}
	//Funcion para registrar un nuevo registro de conyugue
	public function guardarConyugue(){
		if($this->input->post()){
			$register = $this->M_catalogos->datosRegistro();
			$datospersona = array_slice($_POST, 0, 11);
			$datosdomicilio = array_slice($_POST, 12, 19);
			$datospersona = array_merge($datospersona,$register);
			$this->M_personas->guardarPersona($datospersona);
			$idPersona = $this->db->insert_id();
			$datosdomicilio = array_merge($datosdomicilio,$register);
			$this->M_domicilios->guardarDomicilio($datosdomicilio);
			$idDomicilio = $this->db->insert_id();
			$servicio = array(
				"Id_Persona" =>$idPersona,
				"Id_Domicilio" => $idDomicilio,
				"Id_Programa_DIF" => 46,
				"Id_Estatus" => 2,
				"Fecha_Registro" => date("Y-m-d"),
				"Hora_Registro" => date("H:i:s"),
				"Fecha_Atencion" => date("Y-m-d"),
				"Hora_Atencion" => date("H:i:s"),
				"Id_Usuario" => $this->session->userdata('idUsuario'),
			);
			$this->M_servicios->guardarServicio($servicio);
			 if( $this->db->affected_rows() == 0 ) $bandera = false;
		     	else $bandera = $idPersona;
			echo json_encode($bandera);		
		}
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
				"Id_Programa" =>5,
				"Id_Area_DIF" => 1,
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
	//Funcion para ir al Estudio Socioeconomico
	public function estudioSocioeconomico(){
		if($this->validar()){
			$datos['persona'] = $this->M_personas->busquedaId($this->session->userdata('idPersona'));
			$datos['domicilio'] = $this->M_domicilios->getDomicilio($this->session->userdata('idPersona'));
			$datos['estadoCivil']= $this->M_catalogos->getEstadoCivil();
			$datos['escolaridad']= $this->M_catalogos->getEscolaridad();
			//$datos['consumo']= $this->M_catalogos->getFrecuenciaConsumo();
			$datos['edad'] = $this->calculaEdad($datos['persona']->Fecha_Nacimiento);
			//$datos['localidades']= $this->M_catalogos->getLocalidades();
			//$datos['tipoVialidad']= $this->M_catalogos->getTipoVialidad();
			//$datos['procedencia']= $this->M_catalogos->getProcedenciaSolicitud();
			$datos['estados']= $this->M_catalogos->getEstados();
			$this->load->view('menu/v_header');
			$this->load->view('asistenciasocial/v_estudioSocioeconomico', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}

}

/* End of file c_asistenciasocial.php */
/* Location: ./application/controllers/c_asistenciasocial.php */
?>