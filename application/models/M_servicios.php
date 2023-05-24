<?php
class M_servicios extends CI_Model{
	//Funcion para obtener los servicios de una persona
	public function busqueda($idpersona){
		return $this->db->select('serv.Id, serv.Id_Domicilio, prodif.Nombre Programa_DIF, serv.Id_Estatus')
						->from('t_servicios serv')
						->join('tc_programas_dif prodif','serv.Id_Programa_DIF = prodif.Id')
						->where('Id_Persona',$idpersona)
						->get()
						->result();
	}
	//Funcion para guardar los datos de un servicio
	public function guardarServicio($datos){
		$this->db->insert("t_servicios",$datos);
	}
	//Funcion para obtener los detalles de los servicios de una persona
	public function servicios($idpersona){
		return $this->db->select('*')
						->from('v_servicios')
						->where('Id_Persona',$idpersona)
						->order_by('Id_Estatus', 'asc')
						->get()
						->result();
	}
	//Funcion para obtener los servicios por area
	public function serviciosArea($idarea){
		return $this->db->select('*')
						->from('v_servicios')
						->where('Id_Area_DIF',$idarea)
						->order_by('Hora_Registro', 'desc')
						->order_by('Fecha_Registro', 'desc')
						->order_by('Id_Estatus', 'asc')
						->get()
						->result();
	}
	//Funcion para actualizar el estatus de un servicio
	public function actualizarEstatus($idservicio){
		$datos = array(
					"Id_Estatus" => 5,
					"Fecha_Atencion" => date("Y-m-d"),
					"Hora_Atencion" => date("H:i:s"),
				);
		$this->db->where('Id',$idservicio)
				 ->update('t_servicios', $datos);
	}
	//Funcion para obtener los detalles de los servicios a sujetos vulnerables
	public function serviciosSujetosVulnerables($aplica,$IdEstatus){
		return $this->db->select('*')
						->from('v_servicios_sujetosvulnerables')
						->where('Aplica',$aplica)
						->where('Id_Estatus',$IdEstatus)
						->get()
						->result();
	}
	//Funcion para actualizar el estatus de un servicio a Sujetos Vulnerables
	public function actualizarEstatusSV($idservicio,$aplica,$idestatus){
		$datos = array(
					"Aplica" => $aplica,
					"Id_Estatus" => $idestatus,
				);
		$this->db->where('Id',$idservicio)
				 ->update('t_servicio_sujetovulnerable', $datos);
	}
	//Funcion para actualizar las observaciones por improcedencia de un servicio a Sujetos Vulnerables
	public function actualizarObservacionesSV($idservicio,$observaciones){
		$this->db->where('Id',$idservicio)
				 ->update('t_servicio_sujetovulnerable', $observaciones);
	}
	//Funcion para obtener los detalles de los servicios de Comedor Comunitario
	public function serviciosComedorComunitario($aplica,$IdEstatus){
		return $this->db->select('*')
						->from('v_servicios_comedorcomunitario')
						->where('Aplica',$aplica)
						->where('Id_Estatus',$IdEstatus)
						->get()
						->result();
	}
	//Funcion para actualizar el estatus de un servicio de Comedor Comunitario
	public function actualizarEstatusCC($idservicio,$aplica,$idestatus){
		$datos = array(
					"Aplica" => $aplica,
					"Id_Estatus" => $idestatus,
				);
		$this->db->where('Id',$idservicio)
				 ->update('t_servicio_comedorcomunitario', $datos);
	}
	//Funcion para actualizar las observaciones por improcedencia de un servicio de Comedor Comunitario
	public function actualizarObservacionesCC($idservicio,$observaciones){
		$this->db->where('Id',$idservicio)
				 ->update('t_servicio_comedorcomunitario', $observaciones);
	}
	//Funcion para obtener los detalles de los servicios de Nutre DIF
	public function serviciosNutreDIF($aplica,$IdEstatus){
		return $this->db->select('*')
						->from('v_servicios_nutredif')
						->where('Aplica',$aplica)
						->where('Id_Estatus',$IdEstatus)
						->get()
						->result();
	}
	//Funcion para actualizar el estatus de un servicio de NutreDIF
	public function actualizarEstatusND($idservicio,$aplica,$idestatus){
		$datos = array(
					"Aplica" => $aplica,
					"Id_Estatus" => $idestatus,
				);
		$this->db->where('Id',$idservicio)
				 ->update('t_servicio_nutredif', $datos);
	}
	//Funcion para actualizar las observaciones por improcedencia de un servicio Nutre DIF
	public function actualizarObservacionesND($idservicio,$observaciones){
		$this->db->where('Id',$idservicio)
				 ->update('t_servicio_nutredif', $observaciones);
	}
	//Funcion para obtener los detalles de los servicios de CanastaBasica
	public function serviciosCanastaBasica($aplica,$IdEstatus){
		return $this->db->select('*')
						->from('v_servicios_canastabasica')
						->where('Aplica',$aplica)
						->where('Id_Estatus',$IdEstatus)
						->get()
						->result();
	}
	//Funcion para actualizar el estatus de un servicio a Canasta Basica
	public function actualizarEstatusCB($idservicio,$aplica,$idestatus){
		$datos = array(
					"Aplica" => $aplica,
					"Id_Estatus" => $idestatus,
				);
		$this->db->where('Id',$idservicio)
				 ->update('t_servicio_canastabasica', $datos);
	}
	//Funcion para actualizar las observaciones por improcedencia de un servicio de Canasta Basica
	public function actualizarObservacionesCB($idservicio,$observaciones){
		$this->db->where('Id',$idservicio)
				 ->update('t_servicio_canastabasica', $observaciones);
	}


/* End of file m_servicios.php */
/* Location: ./application/models/m_servicios.php */
}
?>