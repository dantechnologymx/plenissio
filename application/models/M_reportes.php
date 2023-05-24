<?php
class M_reportes extends CI_Model{
	//Funcion para obtener los servicios del dia
	/*public function consultarServiciosDia($fecha){
		return $this->db->select('tc_programas_dif.Nombre', count('t_servicios.Id_Programa_DIF'))
						->from('t_servicios', 'tc_programas_dif' )
						->join('tc_programas_dif', 't_servicios.Id_Programa_DIF = tc_programas_dif.Id')
						//->where('t_servicios.Fecha_Registro', "'" . $fecha . "'")
						->group_by('t_servicios.Id_Programa_DIF')
						->get()
						->result();
	}*/
	//Funcion para consultar los servicios de una determinada fecha.
	public function consultarServiciosDia($fecha){
		return $this->db->query("SELECT `tc_programas_dif`.`Nombre`, Count(`t_servicios`.`Id_Programa_DIF`) AS Total FROM `t_servicios` , `tc_programas_dif` WHERE `t_servicios`.`Id_Programa_DIF` = `tc_programas_dif`.`Id` AND `t_servicios`.`Fecha_Registro` = '$fecha' GROUP BY `tc_programas_dif`.`Nombre`")
						->result();

	}
	//Funcion para consultar los servicios de un determinado periodo.
	public function consultarServiciosPeriodo($fechainicial,$fechafinal){
		return $this->db->query("SELECT `tc_programas_dif`.`Nombre`, Count(`t_servicios`.`Id_Programa_DIF`) AS Total FROM `t_servicios` , `tc_programas_dif` WHERE `t_servicios`.`Id_Programa_DIF` = `tc_programas_dif`.`Id` AND `t_servicios`.`Fecha_Registro` BETWEEN '$fechainicial' AND '$fechafinal' GROUP BY `tc_programas_dif`.`Nombre`")
						->result();

	}


/* End of file M_reportes.php */
/* Location: ./application/models/M_reportes.php */
}
?>