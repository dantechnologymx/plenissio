<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_programasalimentarios extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_catalogos');
		$this->load->model('M_servicios');
		$this->load->model('M_personas');
		$this->load->model('M_relaciones');
	}
	
	public function index(){
		if($this->validar()){
			$datos['servicios'] = $this->M_servicios->serviciosArea(2);
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_Inicio', $datos);
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
	//Funcion para ir a Canasta Basica
	public function canastaBasica($idpersona){
		if($this->validar()){
			$persona = $this->M_personas->curp($idpersona);
			$this->session->set_userdata('curpbuscada', $persona[0]->Curp);
			$this->session->set_userdata('idpersona', $idpersona);
			$datos["requisitos"] = $this->M_catalogos->getRequisitos();
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_canastaBasica',$datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir a Comedor Comunitario
	public function comedorComunitario($idpersona){
		if($this->validar()){
			$persona = $this->M_personas->curp($idpersona);
			$this->session->set_userdata('curpbuscada', $persona[0]->Curp);
			$datos["requisitos"] = $this->M_catalogos->getRequisitos();
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_comedorComunitario',$datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir a Nutre DIF
	public function nutreDIF($idpersona){
		if($this->validar()){
			$persona = $this->M_personas->curp($idpersona);
			$this->session->set_userdata('curpbuscada', $persona[0]->Curp);
			$datos["requisitos"] = $this->M_catalogos->getRequisitos();
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_nutreDIF', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir a Sujetos Vulnerables
	public function sujetosVulnerables($idpersona){
		if($this->validar()){
			$persona = $this->M_personas->curp($idpersona);
			$this->session->set_userdata('curpbuscada', $persona[0]->Curp);
			$datos["requisitos"] = $this->M_catalogos->getRequisitos();
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_sujetosVulnerables',$datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir a desayunos Escolares
	public function desayunosEscolares($idpersona){
		if($this->validar()){
			$persona= $this->M_personas->busquedaId($idpersona);
			$datos['persona'] = $persona;
			$datos['Estado']= $this->M_catalogos->getEstado($datos['persona']->Id_Estado);
			$datos['estadoCivil']= $this->M_catalogos->getEstadoCivil();
			$datos['escolaridad']= $this->M_catalogos->getEscolaridad();
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_desayunosEscolares', $datos);
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
				case '2':
					$this->canastaBasica($idpersona);
					break;
				case '3':
					$this->comedorComunitario($idpersona);
					break;
				case '14':
					$this->nutreDIF($idpersona);
					break;
				case '15':
					$this->sujetosVulnerables($idpersona);
					break;
				case '16':
					$this->desayunosEscolares($idpersona);
					break;
				case '28':
					$this->informacion($idpersona);
					break;
				default:
					index();
					break;
			}
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para guardar los datos del registro de la Documentacion y Encuesta ENHINA de Sujetos Vulnerables
	public function registroDocumentacionSV(){
		if($this->input->post()){
			$register = $this->M_catalogos->datosRegistro();
			foreach ($_POST['Id_Documentacion'] as $value) {
				$documento = array(
					"Id_Servicio" => $this->session->userdata('idServicio'),
					"Id_Documento" => $value,
					"Id_Estatus" => 8,
				);
				$documento = array_merge($documento,$register);
				$this->M_relaciones->guardarDocumentosSV($documento);
			}	
			$date = str_replace('/', '-', $_POST["fecha_ENHINA"]);
			$sujetoVulnerable = array(
				"Id_Servicio" =>$this->session->userdata('idServicio'),
				"fecha_ENHINA" => date("Y-m-d", strtotime($date)),
				"Id_Estatus" => 9,
				"Aplica" => 0,
				"Id_Estatus_Apoyo" => 2,
				);
			$sujetoVulnerable = array_merge($sujetoVulnerable,$register);
			$this->M_relaciones->guardarSujetosVulnerables($sujetoVulnerable);
			
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
	//Funcion para ir a la pagina principal para validar la ENHINA
	public function sujetosVulnerablesIndexAB(){
		if($this->validar()){
			$datos['servicios'] = $this->M_servicios->serviciosSujetosVulnerables(0,9);
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_sujetosVulnerablesIndexAB', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir verificar la aplicacion positiva de la encuesta ENHINA de Sujetos Vulnerables
	public function aplicaSV($idservicioSV){
		if($this->validar()){
				$this->M_servicios->actualizarEstatusSV($idservicioSV,1,9);
				$datos['servicios'] = $this->M_servicios->serviciosSujetosVulnerables(0,9);
				$this->load->view('menu/v_header');
				$this->load->view('programasalimentarios/v_sujetosVulnerablesIndexAB', $datos);
				$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir verificar la aplicacion negativa de la encuesta ENHINA
	public function noaplicaSV($idservicioSV){
		if($this->validar()){
			$this->M_servicios->actualizarObservacionesSV($idservicioSV,$_POST);	
			if( $this->db->affected_rows() == 0 ){ 
				$bandera = false;
			}
		    else {
		    	$bandera = true;
		    	$this->M_servicios->actualizarEstatusSV($idservicioSV,0,11);
		    }
			echo json_encode($bandera);	
		}else{
			$this->load->view('v_login');
		}
	}

	//Funcion para ir a la Lista de Espera de Sujetos Vulnerables
	public function listaEsperaSV(){
		if($this->validar()){
			$datos['servicios'] = $this->M_servicios->serviciosSujetosVulnerables(1,9);
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_listaEsperaSV', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para agregar al padron de Sujetos Vulnerables
	public function agregarSV($idservicioSV){
		if($this->validar()){
				$this->M_servicios->actualizarEstatusSV($idservicioSV,1,10);
				$datos['servicios'] = $this->M_servicios->serviciosSujetosVulnerables(1,9);
				$this->load->view('menu/v_header');
				$this->load->view('programasalimentarios/v_listaEsperaSV', $datos);
				$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para desistir de la lista de espera de Sujetos Vulnerables
	public function desistirSV($idservicioSV){
		if($this->validar()){
			$this->M_servicios->actualizarObservacionesSV($idservicioSV,$_POST);	
			if( $this->db->affected_rows() == 0 ){ 
				$bandera = false;
			}
		    else {
		    	$bandera = true;
		    	$this->M_servicios->actualizarEstatusSV($idservicioSV,1,12);
		    }
			echo json_encode($bandera);
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir al Padrón de Sujetos Vulnerables
	public function padronSV(){
		if($this->validar()){
			$datos['servicios'] = $this->M_servicios->serviciosSujetosVulnerables(1,10);
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_padronSV', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para remover del padron de Sujetos Vulnerables
	public function removerPadronSV($idservicioSV){
		if($this->validar()){
			$this->M_servicios->actualizarObservacionesSV($idservicioSV,$_POST);	
			if( $this->db->affected_rows() == 0 ){ 
				$bandera = false;
			}
		    else {
		    	$bandera = true;
		    	$this->M_servicios->actualizarEstatusSV($idservicioSV,1,13);
		    }
			echo json_encode($bandera);
		}else{
			$this->load->view('v_login');
		}
	}

	//Funcion para guardar los datos del registro de la Documentacion y Encuesta ENHINA de Comedor Comunitario
	public function registroDocumentacionCC(){
		if($this->input->post()){
			$register = $this->M_catalogos->datosRegistro();
			foreach ($_POST['Id_Documentacion'] as $value) {
				$documento = array(
					"Id_Servicio" => $this->session->userdata('idServicio'),
					"Id_Documento" => $value,
					"Id_Estatus" => 8,
				);
				$documento = array_merge($documento,$register);
				$this->M_relaciones->guardarDocumentosCC($documento);
			}	
			$date = str_replace('/', '-', $_POST["fecha_ENHINA"]);
			$comedorComunitario = array(
				"Id_Servicio" =>$this->session->userdata('idServicio'),
				"fecha_ENHINA" => date("Y-m-d", strtotime($date)),
				"Id_Estatus" => 9,
				"Aplica" => 0,
				"Id_Estatus_Apoyo" => 2,
				);
			$comedorComunitario = array_merge($comedorComunitario,$register);
			$this->M_relaciones->guardarComedorComunitario($comedorComunitario);
			
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
	//Funcion para ir a la pagina principal para validar la ENHINA de Comedor Comunitario
	public function comedorComunitarioIndex(){
		if($this->validar()){
			$datos['servicios'] = $this->M_servicios->serviciosComedorComunitario(0,9);
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_comedorComunitarioIndex', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir verificar la aplicacion positiva de la encuesta ENHINA de Sujetos Vulnerables
	public function aplicaCC($idservicioCC){
		if($this->validar()){
				$this->M_servicios->actualizarEstatusCC($idservicioCC,1,9);
				$datos['servicios'] = $this->M_servicios->serviciosComedorComunitario(0,9);
				$this->load->view('menu/v_header');
				$this->load->view('programasalimentarios/v_comedorComunitarioIndex', $datos);
				$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir verificar la aplicacion negativa de la encuesta ENHINA
	public function noaplicaCC($idservicioCC,$idpersona,$iddomicilio){
		if($this->validar()){
			$this->M_servicios->actualizarObservacionesCC($idservicioCC,$_POST);	
			if( $this->db->affected_rows() == 0 ){ 
				$bandera = false;
			}
		    else {
		    	$bandera = true;
		    	$this->M_servicios->actualizarEstatusCC($idservicioCC,0,11);
				$this->session->set_userdata('idPersona',$idpersona);
				$this->session->set_userdata('idDomicilio',$iddomicilio);
		    }
			echo json_encode($bandera);	
		}else{
			$this->load->view('v_login');
		}
	}

	//Funcion para ir a la Lista de Espera de Comedor Comunitario
	public function listaEsperaCC(){
		if($this->validar()){
			$datos['servicios'] = $this->M_servicios->serviciosComedorComunitario(1,9);
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_listaEsperaCC', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para agregar al padron de Comedor Comunitario
	public function agregarCC($idservicioCC){
		if($this->validar()){
				$this->M_servicios->actualizarEstatusCC($idservicioCC,1,10);
				$datos['servicios'] = $this->M_servicios->serviciosComedorComunitario(1,9);
				$this->load->view('menu/v_header');
				$this->load->view('programasalimentarios/v_listaEsperaCC', $datos);
				$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para desistir de la lista de espera de Comedor Comunitario
	public function desistirCC($idservicioCC){
		if($this->validar()){
			$this->M_servicios->actualizarObservacionesCC($idservicioCC,$_POST);	
			if( $this->db->affected_rows() == 0 ){ 
				$bandera = false;
			}
		    else {
		    	$bandera = true;
		    	$this->M_servicios->actualizarEstatusCC($idservicioCC,1,12);
		    }
			echo json_encode($bandera);
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir al Padrón de Comedor Comunitario
	public function padronCC(){
		if($this->validar()){
			$datos['servicios'] = $this->M_servicios->serviciosComedorComunitario(1,10);
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_padronCC', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para remover del padron de Comedor Comunitario
	public function removerPadronCC($idservicioCC){
		if($this->validar()){
			$this->M_servicios->actualizarObservacionesCC($idservicioCC,$_POST);	
			if( $this->db->affected_rows() == 0 ){ 
				$bandera = false;
			}
		    else {
		    	$bandera = true;
		    	$this->M_servicios->actualizarEstatusCC($idservicioCC,1,13);
		    }
			echo json_encode($bandera);
		}else{
			$this->load->view('v_login');
		}
	}

	//Funcion para guardar los datos del registro de la Documentacion y Valoracion Medica de Nutre DIF
	public function registroDocumentacionND(){
		if($this->input->post()){
			$register = $this->M_catalogos->datosRegistro();
			foreach ($_POST['Id_Documentacion'] as $value) {
				$documento = array(
					"Id_Servicio" => $this->session->userdata('idServicio'),
					"Id_Documento" => $value,
					"Id_Estatus" => 8,
				);
				$documento = array_merge($documento,$register);
				$this->M_relaciones->guardarDocumentosND($documento);
			}	
			$date = str_replace('/', '-', $_POST["fecha_Valoracion"]);
			$nutreDIF = array(
				"Id_Servicio" =>$this->session->userdata('idServicio'),
				"fecha_Valoracion" => date("Y-m-d", strtotime($date)),
				"Id_Estatus" => 9,
				"Aplica" => 0,
				"Id_Estatus_Apoyo" => 2,
				);
			$nutreDIF = array_merge($nutreDIF,$register);
			$this->M_relaciones->guardarNutreDIF($nutreDIF);
			
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
	//Funcion para ir a la pagina principal para validar la Valoracion Medica de Nutre DIF
	public function nutreDIFIndex(){
		if($this->validar()){
			$datos['servicios'] = $this->M_servicios->serviciosNutreDIF(0,9);
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_nutreDIFIndex', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir verificar la aplicacion positiva de la Valoración Medica de NutreDIF
	public function aplicaND($idservicioND){
		if($this->validar()){
				$this->M_servicios->actualizarEstatusND($idservicioND,1,9);
				$datos['servicios'] = $this->M_servicios->serviciosNutreDIF(0,9);
				$this->load->view('menu/v_header');
				$this->load->view('programasalimentarios/v_nutreDIFIndex', $datos);
				$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir verificar la aplicacion negativa de la Valoración Medica de NutreDIF
	public function noaplicaND($idservicioND){
		if($this->validar()){
			$this->M_servicios->actualizarObservacionesND($idservicioND,$_POST);	
			if( $this->db->affected_rows() == 0 ){ 
				$bandera = false;
			}
		    else {
		    	$bandera = true;
		    	$this->M_servicios->actualizarEstatusND($idservicioND,0,11);
		    }
			echo json_encode($bandera);	
		}else{
			$this->load->view('v_login');
		}
	}

	//Funcion para ir a la Lista de Espera de Nutre DIF
	public function listaEsperaND(){
		if($this->validar()){
			$datos['servicios'] = $this->M_servicios->serviciosNutreDIF(1,9);
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_listaEsperaND', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para agregar al padron de Nutre DIF
	public function agregarND($idservicioND){
		if($this->validar()){
				$this->M_servicios->actualizarEstatusND($idservicioND,1,10);
				$datos['servicios'] = $this->M_servicios->serviciosNutreDIF(1,9);
				$this->load->view('menu/v_header');
				$this->load->view('programasalimentarios/v_listaEsperaND', $datos);
				$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para desistir de la lista de espera de Nutre DIF
	public function desistirND($idservicioND){
		if($this->validar()){
			$this->M_servicios->actualizarObservacionesND($idservicioND,$_POST);	
			if( $this->db->affected_rows() == 0 ){ 
				$bandera = false;
			}
		    else {
		    	$bandera = true;
		    	$this->M_servicios->actualizarEstatusND($idservicioND,1,12);
		    }
			echo json_encode($bandera);
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir al Padrón de Nutre DIF
	public function padronND(){
		if($this->validar()){
			$datos['servicios'] = $this->M_servicios->serviciosNutreDIF(1,10);
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_padronND', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para remover del padron de Nutre DIF
	public function removerPadronND($idservicioND){
		if($this->validar()){
			$this->M_servicios->actualizarObservacionesND($idservicioND,$_POST);	
			if( $this->db->affected_rows() == 0 ){ 
				$bandera = false;
			}
		    else {
		    	$bandera = true;
		    	$this->M_servicios->actualizarEstatusND($idservicioND,1,13);
		    }
			echo json_encode($bandera);
		}else{
			$this->load->view('v_login');
		}
	}

	//Funcion para guardar los datos del registro de la Documentacion y Estudio Socioeconomico de Canasta Basica
	public function registroDocumentacionCB(){
		if($this->input->post()){
			$register = $this->M_catalogos->datosRegistro();
			foreach ($_POST['Id_Documentacion'] as $value) {
				$documento = array(
					"Id_Servicio" => $this->session->userdata('idServicio'),
					"Id_Documento" => $value,
					"Id_Estatus" => 8,
				);
				$documento = array_merge($documento,$register);
				$this->M_relaciones->guardarDocumentosCB($documento);
			}	
			$date = str_replace('/', '-', $_POST["fecha_EstSoc"]);
			$canastaBasica = array(
				"Id_Servicio" =>$this->session->userdata('idServicio'),
				"fecha_EstSoc" => date("Y-m-d", strtotime($date)),
				"Id_Estatus" => 9,
				"Aplica" => 0,
				"Id_Estatus_Apoyo" => 2,
				);
			$canastaBasica = array_merge($canastaBasica,$register);
			$this->M_relaciones->guardarCanastaBasica($canastaBasica);
			
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
	public function EstudioSocioeconomico()
	{
		if($this->validar()){
			$persona= $this->M_personas->busquedaId($this->session->userdata('idpersona'));
			$datos['persona'] = $persona;
			$datos['Estado']= $this->M_catalogos->getEstado($datos['persona']->Id_Estado);
			$datos['estadoCivil']= $this->M_catalogos->getEstadoCivil();
			$datos['escolaridad']= $this->M_catalogos->getEscolaridad();
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_EstudioSocieconomico', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir a la pagina principal para validar el Estudio Socioeconomico de Canasta Basica
	public function canastaBasicaIndex(){
		if($this->validar()){
			$datos['servicios'] = $this->M_servicios->serviciosCanastaBasica(0,9);
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_canastaBasicaIndex', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir verificar la aplicacion positiva del Estudio Socioeconomico de Canasta Basica
	public function aplicaCB($idservicioCB){
		if($this->validar()){
				$this->M_servicios->actualizarEstatusCB($idservicioCB,1,9);
				$datos['servicios'] = $this->M_servicios->serviciosCanastaBasica(0,9);
				$this->load->view('menu/v_header');
				$this->load->view('programasalimentarios/v_canastaBasicaIndex', $datos);
				$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir verificar la aplicacion negativa del Estudio Socioeconomico de Canasta Basica
	public function noaplicaCB($idservicioCB){
		if($this->validar()){
			$this->M_servicios->actualizarObservacionesCB($idservicioCB,$_POST);	
			if( $this->db->affected_rows() == 0 ){ 
				$bandera = false;
			}
		    else {
		    	$bandera = true;
		    	$this->M_servicios->actualizarEstatusCB($idservicioCB,0,11);
		    }
			echo json_encode($bandera);	
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir a la Lista de Espera de Canasta Basica
	public function listaEsperaCB(){
		if($this->validar()){
			$datos['servicios'] = $this->M_servicios->serviciosCanastaBasica(1,9);
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_listaEsperaCB', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para agregar al padron de Canasta Basica
	public function agregarCB($idservicioCB){
		if($this->validar()){
				$this->M_servicios->actualizarEstatusCB($idservicioCB,1,10);
				$datos['servicios'] = $this->M_servicios->serviciosCanastaBasica(1,9);
				$this->load->view('menu/v_header');
				$this->load->view('programasalimentarios/v_listaEsperaCB', $datos);
				$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para desistir de la lista de espera de Canasta Basica
	public function desistirCB($idservicioCB){
		if($this->validar()){
			$this->M_servicios->actualizarObservacionesCB($idservicioCB,$_POST);	
			if( $this->db->affected_rows() == 0 ){ 
				$bandera = false;
			}
		    else {
		    	$bandera = true;
		    	$this->M_servicios->actualizarEstatusCB($idservicioCB,1,12);
		    }
			echo json_encode($bandera);
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir al Padrón de Canasta Basica
	public function padronCB(){
		if($this->validar()){
			$datos['servicios'] = $this->M_servicios->serviciosCanastaBasica(1,10);
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_padronCB', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para remover del padron de Canasta Basica
	public function removerPadronCB($idservicioCB){
		if($this->validar()){
			$this->M_servicios->actualizarObservacionesCB($idservicioCB,$_POST);	
			if( $this->db->affected_rows() == 0 ){ 
				$bandera = false;
			}
		    else {
		    	$bandera = true;
		    	$this->M_servicios->actualizarEstatusCB($idservicioCB,1,13);
		    }
			echo json_encode($bandera);
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir a Información
	public function informacion($idpersona){
		if($this->validar()){
			//$this->M_servicios->actualizarEstatus($this->session->userdata('idServicio'));
			$persona = $this->M_personas->curp($idpersona);
			$this->session->set_userdata('curpbuscada', $persona[0]->Curp);
			$datos['programas'] =  $this->M_catalogos->getProgramasDIFArea(2);
			$this->load->view('menu/v_header');
			$this->load->view('programasalimentarios/v_informacion', $datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
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
				"Id_Area_DIF" => 2,
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

}

/* End of file c_programasalimentarios.php */
/* Location: ./application/controllers/c_programasalimentarios.php */
?>