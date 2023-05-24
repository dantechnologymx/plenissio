 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_login');
		$this->load->model('M_catalogos');
		$this->load->model('M_personas');
		$this->load->model('M_servicios');
	}
	
	public function index(){
		$this->load->view('v_login');
	}
	public function login(){
		if($this->input->post()){
			//Verificar Usuario y Contraseña
			$usuario= $this->M_login->login($this->input->post('usuario'),md5(sha1($this->input->post('password'))));
			if(!is_object($usuario)){
				//Contraseña y/o Usuario Invalido					
				$this->session->sess_destroy();
				$error['texto']="Usuario y/o contraseña no validos";
				$this->load->view('v_login',$error);
			}else{
				//Inicio Sesión Satisfactorio
				$this->M_login->inicio($usuario->Id);
				$nombre = $usuario->Nombre_S." ".$usuario->Apellido_Paterno." ".$usuario->Apellido_Materno;
				$this->session->set_userdata('idUsuario',$usuario->Id);					 
				$this->session->set_userdata('nombre',$nombre);
				$this->session->set_userdata('idRol',$usuario->Id_Rol);
				$Rol = $usuario->Id_Rol;

				switch ($Rol)
				{
					case '8':
						$datos['estados']= $this->M_catalogos->getEstados();
						$datos['personas']= $this->M_personas->getPersonas();
						$this->load->view('menu/v_header');
						$this->load->view('ventanilla/index', $datos);
						$this->load->view('menu/v_footer');
					break;

					case '3':
						$datos['servicios'] = $this->M_servicios->serviciosArea(1);
						$this->load->view('menu/v_header');
						$this->load->view('asistenciasocial/v_Inicio', $datos);
						$this->load->view('menu/v_footer');
					break;

					case '4':
						$datos['servicios'] = $this->M_servicios->serviciosArea(2);
						$this->load->view('menu/v_header');
						$this->load->view('programasalimentarios/v_Inicio', $datos);
						$this->load->view('menu/v_footer');
					break;

					case '5':
						//Juridico
					break;

					case '6':
						//Medico
					break;

					case '7':
						//Preescolar
					break;

					default:
						$datos['estados']= $this->M_catalogos->getEstados();
						$datos['personas']= $this->M_personas->getPersonas();
						$this->load->view('menu/v_header');
						$this->load->view('ventanilla/index', $datos);
						$this->load->view('menu/v_footer');
					break;

				}
			}
		}
	}
	public function cerrarSesion(){
		$this->session->sess_destroy();
		$this->session->set_userdata('idUsuario',null);
		$this->session->set_userdata('nombre',null);
		$this->session->set_userdata('idRol',null);
		$this->load->view('v_login');
	}
	//Funcion para mostrar la vista para cambiar la contraseña.
	public function cambiarCon(){
		if($this->validar()){
			$this->load->view('menu/v_header');
			$this->load->view('usuario/v_cambio');
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para cambiar la contraseña.
	public function setContrasena(){
		if($this->input->post()){
			$idusario = $this->input->post('idUsuario');
			$pass = md5(sha1($this->input->post('pass')));
			$this->M_login->setPass($idusario,$pass);
		}
	}
	//Funcion para mostrar la vista para agregar nuevo usuario.
	public function usuarios(){
		if($this->validar()){
			$datos['roles']= $this->M_catalogos->getRoles();
			$this->load->view('menu/v_header');
			$this->load->view('usuario/v_nuevoUs',$datos);
			$this->load->view('menu/v_footer');
		}else{
			$this->load->view('v_login');
		}
	}
	//Funcion para agregar nuevo usuario.
	public function setUsuario(){
		if($this->input->post()){
			$persona = $this->input->post('persona');
			$nombre = $this->input->post('nombre');
			$pass = md5(sha1($this->input->post('pass')));
			$perfil = $this->input->post('perfil');
			$this->M_login->setUsuario($nombre,$pass,$perfil,$persona);
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

/* End of file c_login.php */
/* Location: ./application/controllers/c_login.php */
?>