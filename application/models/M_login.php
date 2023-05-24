<?php
class M_login extends CI_Model{
	//Funcion para obtener los datos requeridos en el Inicio de Sesión
	public function login($usuario,$password){
		return $this->db->select('per.Nombre_S, per.Apellido_Paterno, per.Apellido_Materno, user.Id, user.Usuario, user.Contraseña, user.Id_Rol, user.Cedula_Profesional')
						->from('t_usuarios user')
						->join('t_personas per', 'per.Id = user.Id_Persona')
						->where('Usuario',$usuario)
						->where('Contraseña',$password)
						->get()
						->row();
	}
	//Funcion para actualizar la fecha y hora de la sesión del usuario.
	public function inicio($idusuario){
		date_default_timezone_set('America/Mexico_City');
		$this->db->set('Ultimo_Ingreso',date("Y-m-d h:i:s a"))
				 ->where('Id',$idusuario)
				 ->update('t_usuarios');
	}
	//Funcion para cambiar la contraseña en la base de datos.
	public function setPass($idUsuario,$pass){
		$this->db->set('Contraseña',$pass);
		$this->db->where('Id', $idUsuario);
		$this->db->update('t_usuarios');
	}
	//Funcion para dar de alta un Usuario Nuevo en el Sistema.
	public function setUsuario($nombre,$pass,$perfil,$persona){
		date_default_timezone_set('America/Mexico_City');
		$this->db->set('Usuario',$nombre)
				 ->set('Contraseña',$pass)
				 ->set('Id_Rol',$perfil)
				 ->set('Id_Persona',$persona)
				 ->set('DateRegister', date("Y-m-d h:i:s a"))
				 ->set('Id_Usuario', $this->session->userdata('idUsuario'))
				 ->insert('t_usuarios');
	}
/* End of file m_login.php */
/* Location: ./application/models/m_login.php */
}
?>