<?php
class M_relaciones extends CI_Model{
	//Funcion para guardar los datos del la relacion Servicio-Adulto Mayor
	public function guardarTerapia($datos){
		$this->db->insert("t_servicio_adultomayor",$datos);
	}
	//Funcion para guardar los datos del la relacion Servicio-Apoyo Directo
	public function guardarApoyoDirecto($datos){
		$this->db->insert("t_servicio_apoyosdirectos",$datos);
	}
	//Funcion para guardar los datos del la relacion Servicio-Apoyo Unico
	public function guardarApoyoUnico($datos){
		$this->db->insert("t_servicio_apoyosunicos",$datos);
	}
	//Funcion para guardar los datos del la relacion Servicio-Documentos Sujetos Vulnerables
	public function guardarDocumentosSV($datos){
		$this->db->insert("t_documentacion_sujetosvulnerables",$datos);
	}
	//Funcion para guardar los datos del la relacion Servicio-SujetoVulnerable
	public function guardarSujetosVulnerables($datos){
		$this->db->insert("t_servicio_sujetovulnerable",$datos);
	}
	//Funcion para guardar los datos del la relacion Servicio-Documentos Comedor Comunitario
	public function guardarDocumentosCC($datos){
		$this->db->insert("t_documentacion_comedorcomunitario",$datos);
	}
	//Funcion para guardar los datos del la relacion Servicio-ComedorComunitario
	public function guardarComedorComunitario($datos){
		$this->db->insert("t_servicio_comedorcomunitario",$datos);
	}
	//Funcion para guardar los datos del la relacion Servicio-Documentos NutreDIF
	public function guardarDocumentosND($datos){
		$this->db->insert("t_documentacion_nutredif",$datos);
	}
	//Funcion para guardar los datos del la relacion Servicio-NutreDIF
	public function guardarNutreDIF($datos){
		$this->db->insert("t_servicio_nutredif",$datos);
	}
	//Funcion para guardar los datos del la relacion Servicio-Documentos Canasta Basica
	public function guardarDocumentosCB($datos){
		$this->db->insert("t_documentacion_canastabasica",$datos);
	}
	//Funcion para guardar los datos del la relacion Servicio-CanastaBasica
	public function guardarCanastaBasica($datos){
		$this->db->insert("t_servicio_canastabasica",$datos);
	}
	//Funcion para guardar los datos del la relacion Informacion-Servicios
	public function guardarInformacion($datos){
		$this->db->insert("t_informacion_servicios",$datos);
	}
	//Funcion para guardar los datos del la relacion Servicio-Informacion General
	public function guardarServicioInformacion($datos){
		$this->db->insert("t_servicios_informaciongeneral",$datos);
	}
/*	//Funcion para guardar los datos del la relacion Persona-Domicilio
	public function guardarDomicilioPersona($datos){
		$this->db->insert("t_persona_domicilio",$datos);
	}*/
	//Funcion para guardar los datos del la relacion servicio_EntrevistaInicial
	public function guardarEntrevistaInicial($datos){
		$this->db->insert("t_servicio_entrevista",$datos);
	}
/* End of file m_relaciones.php */
/* Location: ./application/models/m_relaciones.php */
}
?>