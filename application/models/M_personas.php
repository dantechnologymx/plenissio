<?php
class M_personas extends CI_Model{
	//Funcion para obtener los datos de una persona
	public function busquedaCurp($curp){
		return $this->db->where('Curp',$curp)
						->get('t_personas')
						->row();
	}
	//Funcion para obtener la cantidad de personas registradas en una curp
	public function contarCurp($curp){
		return $this->db->where('Curp',$curp)
						->count_all_results('t_personas');
	}
	//Funcion para guardar los datos de una persona
	public function guardarPersona($datos){
		$this->db->insert("t_personas",$datos);
	}
	//Funcion para actualizar los datos de una persona
	public function actualizarPersona($datos,$idpersona){
		$this->db->where('Id',$idpersona)
				 ->update('t_personas', $datos);
	}
	//Funcion para obtener la curp en base a su Id
	public function curp($idpersona){
		return $this->db->select('Curp')
						->from('t_personas')
						->where('Id',$idpersona)
						->get()
						->result();
	}
	//Funcion para obtener los datos de una persona por Id
	public function busquedaId($id){
		return $this->db->where('Id',$id)
						->get('t_personas')
						->row();
	}
	/**
	 * [buscarPersonas description]
	 * @param  [type] $criterio [description]
	 * @return [type]           [description]
	 */
	public function buscarPersona($criterio){
		$li = "";
		$personas = $this->db->select('Id, Nombre_S, Apellido_Paterno, Apellido_Materno, CONCAT(Nombre_S, " ", Apellido_Paterno, " ", Apellido_Materno) AS nombreCompleto')
						->from('t_personas')
						->like('CONCAT(Nombre_S, " ", Apellido_Paterno, " ", Apellido_Materno)', $criterio)
						->order_by('nombreCompleto', 'ASC')
						->get()
						->result();
		foreach ($personas as $persona) {
			$nombreCompleto = $persona->nombreCompleto;
			$li .= "<li class=".'""'." onclick='seleccionarPersona(".$persona->Id.",".'"'.$nombreCompleto.'"'.")'>&nbsp;&nbsp;".$nombreCompleto."</li>".'<li class="divider span5"></li>';
		}
		return $li;
	}
 
 	//Funcion para obtener la curp en base a su Id
	public function getPersonas(){
		return $this->db->select('*')
						->from('t_personas')
						->get()
						->result();
	}
	//Funcion para obtener el Id de una persona
	public function searchId($curp){
		return $this->db->select('Id')
						->from('t_personas')
						->where('Curp',$curp)
						->get()
						->result();
	}
	//Funcion para guardar los datos de un dependiente
	public function guardarDependiente($datos){
		$this->db->insert("t_dependientes",$datos);
	}

/* End of file m_personas.php */
/* Location: ./application/models/m_personas.php */
}
?>