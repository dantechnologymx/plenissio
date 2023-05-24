<?php
class M_domicilios extends CI_Model{
	//Funcion para guardar los datos del domicilio
	public function guardarDomicilio($datos){
		$this->db->insert("t_domicilios",$datos);
	}
	//Funcion para obtener el domicilio de una persona
	public function getDomicilio($idpersona)
	{
		return $this->db->select('*')
						->from('v_servicios')
						->where('Id_Persona',$idpersona)
						->group_by('Id_Domicilio')
						->get()
						->result();
	}
	
/* End of file m_domicilios.php */
/* Location: ./application/models/m_domicilios.php */
}
?>