<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_ventanilla extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_personas');
		$this->load->model('M_servicios');
		$this->load->model('M_catalogos');
		$this->load->model('M_domicilios');
	}
	
	public function index(){
		$this->load->view('v_login');
	}
	//Funcion para validar que esta dentro de sesion
	public function validar(){
		if($this->session->userdata('nombre')!=null)
			return true;
		else
			return false;
	}
	//Funcion para realizar la busqueda por curp desde la ventanilla
	public function busquedaCurp(){
		if($this->input->post()){
			//Verificar curp en la base de datos
			$persona= $this->M_personas->busquedaCurp($this->input->post('curp'));
			if(!is_object($persona)){
				//La persona no existe en la base de datos					
				//Se manda llamar al procedimiento para consultar el webservice de RENAPO
				//$url = "http://proveedores.col.gob.mx/REST_Services/CURP/index.php/CURP/getInfo/format/php/".$this->input->post('curp');
				$url = "http://wsrenapo.col.gob.mx/curp/apiV1/obtener/info?curp=".$this->input->post('curp')."&allstr=true.json";
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

					$this->session->set_userdata('curpbuscada',$this->input->post('curp'));
					$datos['localidades']= $this->M_catalogos->getLocalidades();
					$datos['tipoVialidad']= $this->M_catalogos->getTipoVialidad();
					$datos['procedencia']= $this->M_catalogos->getProcedenciaSolicitud();
					$datos['estadoCivil']= $this->M_catalogos->getEstadoCivil();
					$datos['escolaridad']= $this->M_catalogos->getEscolaridad();
					$datos['idEstado']= $this->M_catalogos->getIdEstado($data_final[4]);
					$datos['persona'] = $data_final;
					$this->load->view('menu/v_header');
					$this->load->view('ventanilla/v_captura', $datos);
					$this->load->view('menu/v_footer');
				}else{
					//Si hay error se despliega el mensaje para verificar la CURP
					//echo $data;
					$error['personas']= $this->M_personas->getPersonas();
					$error['estados']= $this->M_catalogos->getEstados();
					$error['texto']="CURP No encontrada";
					$error['tab'] = 2;
					$this->load->view('menu/v_header');
					$this->load->view('ventanilla/index',$error);
					$this->load->view('menu/v_footer');
				}
			}else{
				//Persona si existe en la base de datos
				//Se consulta si ya ha recibido servicios por parte del DIF.
				$servicios = $this->M_servicios->busqueda($persona->Id);
				if(empty($servicios)){
					//No tiene servicios registrados la persona
					//Se carga la vista con los datos de la persona (Vista como la anterior)
					$datos['localidades']= $this->M_catalogos->getLocalidades();
					$datos['tipoVialidad']= $this->M_catalogos->getTipoVialidad();
					$datos['procedencia']= $this->M_catalogos->getProcedenciaSolicitud();
					$datos['estadoCivil']= $this->M_catalogos->getEstadoCivil();
					$datos['escolaridad']= $this->M_catalogos->getEscolaridad();
					$datos['persona'] = $persona;
					$datos['Estado']= $this->M_catalogos->getEstado($datos['persona']->Id_Estado);
					$this->session->set_userdata('curpbuscada',$this->input->post('curp'));
					$this->session->set_userdata('idPersona',$persona->Id);
					$this->load->view('menu/v_header');
					$this->load->view('ventanilla/v_captura2', $datos);
					$this->load->view('menu/v_footer');
				}else{
					//Tiene servicios registrados
					//Se carga la vista con los servicios recibidos al momento
					$datos['persona'] = $persona;
					$datos['servicios'] = $this->M_servicios->servicios($persona->Id);
					$this->session->set_userdata('curpbuscada',$this->input->post('curp'));
					$this->session->set_userdata('idPersona',$persona->Id);
					$this->load->view('menu/v_header');
					$this->load->view('ventanilla/v_apoyos', $datos);
					$this->load->view('menu/v_footer');

				}
			}
		}
	}
	//Funcion para ir a registrar un nuevo usuario de ventanilla unica
	public function ventanilla(){
		if($this->validar()){
			$datos['personas']= $this->M_personas->getPersonas();
			$datos['estados']= $this->M_catalogos->getEstados();
			$this->load->view('menu/v_header');
			$this->load->view('ventanilla/index',$datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para ir a ventanilla unica

	//Modificar esta funcion para activar el segundo panel como el principal
	/*public function ventanilla2(){
		if($this->validar()){
			$this->load->view('menu/v_menu');
			$this->load->view('v_buscador');
		}else{
			$this->load->view('v_login');
		}
	}*/
	//Funcion para hacer la busqueda de codigos postales
	public function buscarCodigoPostal(){
		if($this->input->get('Codigo_Postal')<>0){
			$datos['codigopostal'] = $this->M_catalogos->getCodigoPostal($this->input->get('Codigo_Postal'));
			if (count($datos['codigopostal'])>0) {
				echo json_encode($datos);
			}else{
				$datos = true;
				echo json_encode($datos);
			}
		}else{
			$datos['codigopostal'] = $this->M_catalogos->getAllCodigoPostal();
			echo json_encode($datos);
		}
	}
	//Funcion para guardar los datos de un nuevo beneficiario
	public function guardarDatos(){
		if($this->input->post()){
			$register = $this->M_catalogos->datosRegistro();
			$datospersona = array_slice($_POST, 0, 11);
			$datosdomicilio = array_slice($_POST, 12, 19);
			$datospersona = array_merge($datospersona,$register);
			$this->M_personas->guardarPersona($datospersona);
			$this->session->set_userdata('idPersona',$this->db->insert_id());
			$datosdomicilio = array_merge($datosdomicilio,$register);
			$this->M_domicilios->guardarDomicilio($datosdomicilio);
			$this->session->set_userdata('idDomicilio',$this->db->insert_id());
			if( $this->db->affected_rows() == 0 ) $bandera = false;
		    else $bandera = true;
			echo json_encode($bandera);		
		}
	}
	//Funcion para llamar la canalizacion
	public function canalizacion($iddom = 0){
		if($this->validar()){
			if ($iddom != null) {
				$this->session->set_userdata('idDomicilio',$iddom);
			}
			$datos['programas'] =  $this->M_catalogos->getProgramasDIF();
			$this->load->view('menu/v_header');
			$this->load->view('ventanilla/v_canalizacion',$datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para realizar la busqueda por nombre desde la ventanilla
	public function busquedaNombreCurp(){
		if($this->input->post()){
			//Realizamos la bsqueda en el WSRENAPO para conseguir la curp
			//$url = "http://proveedores.col.gob.mx/REST_Services/CURP/index.php/CURP/getCurp/format/php/".urlencode($this->input->post('nombre_s'))."/".urlencode($this->input->post('apellido1'))."/".urlencode($this->input->post('apellido2'))."/".$this->input->post('estado')."/".$this->input->post('fechaNacimiento')."/".$this->input->post('sexo');
			$url = "http://wsrenapo.col.gob.mx/curp/apiV1/obtener/curp?nombre=".urlencode($this->input->post('nombre_s'))."&apellido1=".urlencode($this->input->post('apellido1'))."&apellido2=".urlencode($this->input->post('apellido2'))."&entidad=".urlencode($this->input->post('estado'))."&fnac=".$this->input->post('fechaNacimiento')."&sexo=".$this->input->post('sexo').".json";
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_USERPWD, "seder:9ef19416916a9cbbe979573f179522f7"); 
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_URL, $url); 
			$data = curl_exec($curl); 
			curl_close($curl);
			$response = json_decode($data);
			//echo $data;
			//print_r($response);
			//Se verifica el resultado obtenido de la RENAPO
			if ($response->REST_Service->status_response == "TRUE") {
					//Si todo esta bien
					$this->busquedaCurp2($response->response->CURP);
					//echo $data_final[0];
				}else{
					//Si hay error se despliega el mensaje para verificar el nombre de la persona o registrar sin curp
					//echo $data;
					$error['persona'] = array(
						'nombre_s' => $this->input->post('nombre_s'),
						'apellido1' => $this->input->post('apellido1'),
						'apellido2' => $this->input->post('apellido2'),
						'estado' => $this->input->post('estado'),
						'fechaNacimiento' => $this->input->post('fechaNacimiento'),
						'sexo' => $this->input->post('sexo'),
						);
					$error['personas']= $this->M_personas->getPersonas();
					$error['estados']= $this->M_catalogos->getEstados();
					$error['texto2']="Persona no encontrada";
					$error['tab'] = 2;
					$this->load->view('menu/v_header');
					$this->load->view('ventanilla/index',$error);
					$this->load->view('menu/v_footer');
				}
		}else{// Enviar registro sin curp
			$error['personas']= $this->M_personas->getPersonas();
			$error['estados']= $this->M_catalogos->getEstados();
			$error['texto2']="Enviar registro sin curp";
			$error['tab'] = 2;
			$this->load->view('menu/v_header');
			$this->load->view('ventanilla/index',$error);
			$this->load->view('menu/v_footer');

		}
	}
	public function busquedaCurp2($curp){
		if($this->input->post()){
			//Verificar curp en la base de datos
			$persona= $this->M_personas->busquedaCurp($curp);
			if(!is_object($persona)){
				//La persona no existe en la base de datos					
				//Se manda llamar al procedimiento para consultar el webservice de RENAPO
				//$url = "http://proveedores.col.gob.mx/REST_Services/CURP/index.php/CURP/getInfo/format/php/".$curp;
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

					//Se carga la vista con los datos que regrese el webservice (Vista igual a la siguiente)
					$this->session->set_userdata('curpbuscada',$curp);
					$datos['localidades']= $this->M_catalogos->getLocalidades();
					$datos['tipoVialidad']= $this->M_catalogos->getTipoVialidad();
					$datos['procedencia']= $this->M_catalogos->getProcedenciaSolicitud();
					$datos['estadoCivil']= $this->M_catalogos->getEstadoCivil();
					$datos['escolaridad']= $this->M_catalogos->getEscolaridad();
					$datos['idEstado']= $this->M_catalogos->getIdEstado($data_final[4]);
					$datos['persona'] = $data_final;
					$this->load->view('menu/v_header');
					$this->load->view('ventanilla/v_captura', $datos);
					$this->load->view('menu/v_footer');
				}else{
					//Si hay error se despliega el mensaje para verificar la CURP
					//echo $data;
					$error['personas']= $this->M_personas->getPersonas();
					$error['estados']= $this->M_catalogos->getEstados();
					$error['texto']="CURP No encontrada";
					$this->load->view('menu/v_header');
					$this->load->view('ventanilla/index',$error);
					$this->load->view('menu/v_footer');
				}
			}else{
				//Persona si existe en la base de datos
				//Se consulta si ya ha recibido servicios por parte del DIF.
				$servicios = $this->M_servicios->busqueda($persona->Id);
				if(empty($servicios)){
					//No tiene servicios registrados la persona
					//Se carga la vista con los datos de la persona (Vista como la anterior)
					$datos['localidades']= $this->M_catalogos->getLocalidades();
					$datos['tipoVialidad']= $this->M_catalogos->getTipoVialidad();
					$datos['procedencia']= $this->M_catalogos->getProcedenciaSolicitud();
					$datos['estadoCivil']= $this->M_catalogos->getEstadoCivil();
					$datos['escolaridad']= $this->M_catalogos->getEscolaridad();
					$datos['persona'] = $persona;
					$datos['Estado']= $this->M_catalogos->getEstado($datos['persona']->Id_Estado);
					$this->session->set_userdata('curpbuscada',$curp);
					$this->session->set_userdata('idPersona',$persona->Id);
					$this->load->view('menu/v_header');
					$this->load->view('ventanilla/v_captura2', $datos);
					$this->load->view('menu/v_footer');
				}else{
					//Tiene servicios registrados
					//Se carga la vista con los servicios recibidos al momento
					$datos['persona'] = $persona;
					$datos['servicios'] = $this->M_servicios->servicios($persona->Id);
					$this->session->set_userdata('curpbuscada',$this->input->post('curp'));
					$this->session->set_userdata('idPersona',$persona->Id);
					$this->load->view('menu/v_header');
					$this->load->view('ventanilla/v_apoyos', $datos);
					$this->load->view('menu/v_footer');

				}
			}
		}
	}
	//Funcion para guardar los datos de una canalizacion
	public function canalizar(){
		if($this->input->post()){
			date_default_timezone_set('America/Mexico_City');
			foreach ($_POST['Id_Programa_DIF'] as $value) {
				$servicio = array(
					"Id_Persona" => $this->session->userdata('idPersona'),
					"Id_Domicilio" => $this->session->userdata('idDomicilio'),
					"Id_Programa_DIF" => $value,
					"Id_Estatus" => 6,
					"Fecha_Registro" => date("Y-m-d"),
					"Hora_Registro" => date("H:i:s"),
					"Id_Usuario" => $this->session->userdata('idUsuario'),
				);
				$this->M_servicios->guardarServicio($servicio);
			}
			
			if( $this->db->affected_rows() == 0 ) $bandera = false;
		    else $bandera = true;
			echo json_encode($bandera);		
		}
	}
	//Funcion para guardar los datos de un beneficiario existente sin domicilio
	public function guardarDatos2(){
		if($this->input->post()){
			$register = $this->M_catalogos->datosRegistro();
			
			$persona = array_slice($_POST, 0, 3);
			$datospersona = array_merge($persona, $register);

			$domicilio = array_slice($_POST, 4, 19);
			$datosdomicilio = array_merge($domicilio, $register);

			$this->M_personas->actualizarPersona($datospersona, $this->session->userdata('idPersona'));
			$this->M_domicilios->guardarDomicilio($datosdomicilio);
			$this->session->set_userdata('idDomicilio',$this->db->insert_id());
			if( $this->db->affected_rows() == 0 ) $bandera = false;
		    else $bandera = true;
			echo json_encode($bandera);		
		}
	}
	//Funcion para guardar los datos de un beneficiario sin curp
	public function registroSinCurp(){
		if($this->input->post()){
			$datos['persona'] = $_POST;
			$this->session->set_userdata('curpbuscada','abcd012345efghij67');
			$datos['localidades']= $this->M_catalogos->getLocalidades();
			$datos['tipoVialidad']= $this->M_catalogos->getTipoVialidad();
			$datos['procedencia']= $this->M_catalogos->getProcedenciaSolicitud();
			$datos['estadoCivil']= $this->M_catalogos->getEstadoCivil();
			$datos['escolaridad']= $this->M_catalogos->getEscolaridad();
			$datos['idEstado']= $this->M_catalogos->getIdEstado($_POST['estado']);
			$this->load->view('menu/v_header');
			$this->load->view('ventanilla/v_captura3', $datos);
			$this->load->view('menu/v_footer');
		}
	}
	//Funcion para hacer la busqueda de domicilio de una persona
	public function buscarDomicilio(){
		if($this->session->userdata('idPersona')!=null){
			$datos['domicilio'] = $this->M_domicilios->getDomicilio($this->session->userdata('idPersona'));
			echo json_encode($datos);
		}else{
			$datos = true;
			echo json_encode($datos);
		}
	}
	//Funcion para realizar la busqueda por persona desde la ventanilla
	public function busquedaPersona($idPersona){
		//Persona si existe en la base de datos
		//Se consulta si ya ha recibido servicios por parte del DIF.
		$servicios = $this->M_servicios->busqueda($idPersona);
		if(empty($servicios)){
			//No tiene servicios registrados la persona
			//Se carga la vista con los datos de la persona (Vista como la anterior)
			$datos['localidades']= $this->M_catalogos->getLocalidades();
			$datos['tipoVialidad']= $this->M_catalogos->getTipoVialidad();
			$datos['procedencia']= $this->M_catalogos->getProcedenciaSolicitud();
			$datos['estadoCivil']= $this->M_catalogos->getEstadoCivil();
			$datos['escolaridad']= $this->M_catalogos->getEscolaridad();
			$datos['persona'] = $this->M_personas->busquedaId($idPersona);
			$datos['Estado']= $this->M_catalogos->getEstado($datos['persona']->Id_Estado);
			$this->session->set_userdata('curpbuscada',$datos['persona']->Curp);
			$this->session->set_userdata('idPersona',$idPersona);
			$this->load->view('menu/v_header');
			$this->load->view('ventanilla/v_captura2', $datos);
			$this->load->view('menu/v_footer');
		}else{
			//Tiene servicios registrados
			//Se carga la vista con los servicios recibidos al momento
			$datos['persona'] = $this->M_personas->busquedaId($idPersona);
			$datos['servicios'] = $this->M_servicios->servicios($idPersona);
			$this->session->set_userdata('curpbuscada',$datos['persona']->Curp);
			$this->session->set_userdata('idPersona',$idPersona);
			$this->load->view('menu/v_header');
			$this->load->view('ventanilla/v_apoyos', $datos);
			$this->load->view('menu/v_footer');
		} 		
	}
	//Funcion para cargar la vista para modificar los datos de una persona.
	public function modificarPersona($idPersona){
		$datos['estadoCivil']= $this->M_catalogos->getEstadoCivil();
		$datos['escolaridad']= $this->M_catalogos->getEscolaridad();
		$datos['persona'] = $this->M_personas->busquedaId($idPersona);
		$datos['Estado']= $this->M_catalogos->getEstados();
		$datos['EstadoNombre']= $this->M_catalogos->getEstado($datos['persona']->Id_Estado);
		$datos['domicilios'] = $this->M_domicilios->getDomicilio($idPersona);
		$this->session->set_userdata('curpbuscada',$datos['persona']->Curp);
		$this->session->set_userdata('idPersona',$idPersona);
		$this->load->view('menu/v_header');
		$this->load->view('ventanilla/v_actualizacion', $datos);
		$this->load->view('menu/v_footer');
	}
	//Funcion actualizar los datos de una persona registrada
	public function actualizarDatos(){
		if($this->input->post()){
			//print_r($_POST);
			$register = $this->M_catalogos->datosRegistro();
			$datos1 = array_slice($_POST, 0, 5);
			$date = array_slice($_POST, 5, 1);
			$datos2 = array_slice($_POST, 6, 5);
			$fecha = $date["Fecha_Nacimiento"];
			$fecha = str_replace('/', '-', $fecha);
			$fecha = date("Y-m-d", strtotime($fecha));
			$date = array('Fecha_Nacimiento' => $fecha);
			$datospersona = array_merge($datos1,$date,$datos2,$register);
			$this->M_personas->actualizarPersona($datospersona, $this->session->userdata('idPersona'));
			if( $this->db->affected_rows() == 0 )
				$bandera = false;
		    else
		    	$bandera = true;
			echo json_encode($bandera);		
		}
	}
	//Funcion para realizar la busqueda por curp desde la ventanilla
	public function CurpSearch($curp){
		$persona= $this->M_personas->busquedaCurp($curp);
		$registros = $this->M_personas->contarCurp($curp);
		if(!is_object($persona)){
			//Se manda llamar al procedimiento para consultar el webservice de RENAPO
			//$url = "http://proveedores.col.gob.mx/REST_Services/CURP/index.php/CURP/getInfo/format/php/".$this->input->post('curp');
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
				$datos = true;
				echo json_encode($datos);
			}
		}else{
			if ($registros > 1){
				$datos = false;
				echo json_encode($datos);	
			}else{
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
					$datos = true;
					echo json_encode($datos);
				}
			}
			
		}
	}
	//Funcion para llamar nuevo domicilio
	public function domicilio(){
		if($this->validar()){
			$datos['localidades']= $this->M_catalogos->getLocalidades();
			$datos['tipoVialidad']= $this->M_catalogos->getTipoVialidad();
			$this->load->view('menu/v_header');
			$this->load->view('ventanilla/v_domicilio',$datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para guardar los datos de un nuevo domicilio al beneficiario
	public function guardarDomicilio(){
		if($this->input->post()){
			//print_r($_POST);
			$register = $this->M_catalogos->datosRegistro();
			$domicilio = array_slice($_POST, 1, 19);
			$datosdomicilio = array_merge($domicilio,$register);
			$this->M_domicilios->guardarDomicilio($datosdomicilio);
			$this->session->set_userdata('idDomicilio',$this->db->insert_id());
			if( $this->db->affected_rows() == 0 ) $bandera = false;
		    else $bandera = true;
			echo json_encode($bandera);		
		}
	}
	//Funcion para solo buscar una curp en lo local
	public function busquedaCurpLocal($curp){
		if($this->input->post()){
			$persona= $this->M_personas->busquedaCurp($curp);
			if(!is_object($persona)){
				$datos = false;
				echo json_encode($datos);
			}else{
				$datos['persona'] = $persona;
				echo json_encode($datos);
			}		
		}
	}

}
/* End of file c_ventanilla.php */
/* Location: ./application/controllers/c_ventanilla.php */
?>