<?php
class M_catalogos extends CI_Model{
	//Funcion para obtener los datos del catalogo Tipo de Vialidad
	public function getTipoVialidad()
	{
		return $this->db->select('*')
						->from('tc_tipo_vialidad')
						->order_by('Nombre', 'asc')
						->get()
						->result();
	}
	//Funcion para obtener los datos del catalogo Localidades solo para el Municipio de Colima
	public function getLocalidades()
	{
		return $this->db->select('*')
						->from('tc_localidades')
						->order_by('Id_Municipio', 'asc')
						->order_by('Nombre', 'asc')
						->get()
						->result();
	}
	//Funcion para obtener todos los datos relacionados con el Codigo Postal
	public function getCodigoPostal($codigoPostal)
	{
		return $this->db->select('*')
						->from('v_codigo_postal')
						->where('Codigo_Postal',$codigoPostal)
						->get()
						->result();
	}
	//Funcion para obtener los datos del Catalogo Programas DIF
	public function getProgramasDIF()
	{
		return $this->db->select('*')
						->from('tc_programas_dif')
						->order_by('Nombre', 'asc')
						->get()
						->result();
	}
	//Funcion para obtener los datos del catalogo Estados
	public function getEstados()
	{
		return $this->db->select('*')
						->from('tc_estados')
						->order_by('Nombre', 'asc')
						->get()
						->result();
	}
	//Funcion para obtener los datos del catalogo Procedencia de la Solicitud
	public function getProcedenciaSolicitud()
	{
		return $this->db->select('*')
						->from('tc_procedencia_solicitud')
						->order_by('Nombre', 'asc')
						->get()
						->result();
	}
	//Funcion para obtener los datos del catalogo Estado Civil
	public function getEstadoCivil()
	{
		return $this->db->select('*')
						->from('tc_estado_civil')
						->order_by('Nombre', 'asc')
						->get()
						->result();
	}
	//Funcion para obtener los datos del catalogo Escolaridad
	public function getEscolaridad()
	{
		return $this->db->select('*')
						->from('tc_escolaridad')
						->order_by('Nombre', 'asc')
						->get()
						->result();
	}
	//Funcion para obtener el ID del catalogo Estado
	public function getIdEstado($estado)
	{
		return $this->db->select('Id')
						->from('tc_estados')
						->like('Nombre',$estado,'none')
						->get()
						->result();
	}
	//Funcion para obtener el Nombre del catalogo Estado
	public function getEstado($id)
	{
		return $this->db->select('Nombre')
						->from('tc_estados')
						->like('Id',$id,'none')
						->get()
						->result();
	}
	//Funcion para obtener el Nombre del catalogo Estado por Clave Curp
	public function getEstadoCveCurp($idcurp)
	{
		return $this->db->select('Nombre')
						->from('tc_estados')
						->where('IdCurp',$idcurp)
						//->like('IdCurp',$idcurp,'none')
						->get()
						->result();
	}
	//Funcion para obtener todos los datos relacionados con todos los Codigos Postales
	public function getAllCodigoPostal()
	{
		return $this->db->select('*')
						->from('v_codigo_postal')
						->order_by('Municipio', 'asc')
						->order_by('Asentamiento', 'asc')
						->get()
						->result();
	}
	//Funcion para obtener los datos del catalogo Terapia Ocupacional
	public function getTerapiaOcupacional()
	{
		return $this->db->select('*')
						->from('tc_terapia_ocupacional')
						->order_by('Nombre', 'asc')
						->get()
						->result();
	}
	//Funcion para obtener los datos del catalogo Documentacion
	public function getRequisitos()
	{
		return $this->db->select('*')
						->from('tc_documentacion')
						->order_by('Nombre', 'asc')
						->get()
						->result();
	}
	//Funcion para obtener los datos del catalogo Frecuencia Apoyo
	public function getFrecuenciaApoyo()
	{
		return $this->db->select('*')
						->from('tc_frecuencia_apoyo')
						->order_by('Nombre', 'asc')
						->get()
						->result();
	}
	//Funcion para obtener los datos del Catalogo Programas DIF por area
	public function getProgramasDIFArea($area)
	{
		return $this->db->select('*')
						->from('tc_programas_dif')
						->where('Id_Area_DIF',$area)
						->order_by('Nombre', 'asc')
						->get()
						->result();
	}
	//Funcion para obtener los datos del catalogo Roles
	public function getRoles()
	{
		return $this->db->select('*')
						->from('tc_roles')
						->order_by('Nombre', 'asc')
						->get()
						->result();
	}
	//Funcion para obtener los datos del catalogo Frecuencia de Consumo
	public function getFrecuenciaConsumo()
	{
		return $this->db->select('*')
						->from('tc_frecuencia_consumo')
						->order_by('Id', 'asc')
						->get()
						->result();
	}
	//Funcion de utileria para agregar el registro de fecha y usuarioa todos los servicios
	public function datosRegistro()
	{
		date_default_timezone_set('America/Mexico_City');
		return array(
				"DateRegister" => date("Y-m-d h:i:s a"),
				"Id_Usuario" => $this->session->userdata('idUsuario'),
			);
	}

/* End of file m_catalogos.php */
/* Location: ./application/models/m_catalogos.php */
}
?>
