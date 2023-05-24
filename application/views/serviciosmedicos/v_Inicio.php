<div class="row">
	<div class="span12">      		
		<div class="widget ">
			<div class="widget-header">
				<i class="icon-group"></i>
				<h3>Servicios Medicos <small> Solicitudes para Atención</small></h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">

				<h4>Selecciona un caso: </h4>

				<table id="example" class="table" cellspacing="0" width="100%">
		            <thead>
		              	<tr class="alert alert-info">
		              		<th>Registro</th>
			                <th>Programa</th>
			                <th>Solicitante</th>
			                <th>Domicilio</th>
			                <th>Localidad</th>
			                <th>Municipio</th>
			                <th></th>
		              	</tr>
		            </thead>
		            <tbody>
		            	<?php foreach ($servicios as $servicio) {
		              		if ($servicio->Id_Estatus != 5) { ?>
				                <tr <?php if ($servicio->Id_Estatus == 6) {echo 'class = "alert alert-warning"';} else { echo 'class = "alert alert-danger"';}?> >
				                <td><?php echo $servicio->Fecha_Registro; ?></td>
				                <td><?php echo $servicio->Programa_DIF; ?></td>
				                <td><?php echo $servicio->Nombre_S." ".$servicio->Apellido_Paterno." ".$servicio->Apellido_Materno; ?></td>
				                <td><?php echo $servicio->Tipo_Vialidad." ".$servicio->Nombre_Vialidad." #".$servicio->No_Ext1." ".$servicio->Tipo_Asentamiento." ".$servicio->Asentamiento; ?></td>
				                <td><?php echo $servicio->Localidad; ?></td>
				                <td><?php echo $servicio->Municipio; ?></td>
				                <td class="text-center"><a <?php if ($servicio->Id_Estatus == 6) {echo 'class = "btn btn-warning enc"';} else { echo 'class = "btn btn-danger enc"';}?> href="<?php echo site_url().'/c_serviciosmedicos/canalizar/'.$servicio->Id_Programa_DIF.'/'.$servicio->Id_Persona.'/'.$servicio->Id; ?>">Seleccionar  <span class="icon-ok-sign"></span> </a></td>
		              			</tr>
		              		<?php }
		            	} ?>
		            </tbody>
		        </table>
			
			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
	</div> <!-- /span8 -->
</div> <!-- /row -->
	
<script type="text/javascript">
$(document).on("ready",datatable);

function datatable(e){
if ( $.fn.dataTable.isDataTable( '#example' ) ) {
  table = $('#example').DataTable();
  table.destroy();
}
var tabla =$("#example").DataTable({
     "sPaginationType": "full_numbers",
     "oLanguage": {
         "oPaginate": {
             "sPrevious": "Anterior",
             "sNext": "Siguiente",
             "sLast": "Última",
             "sFirst": "Primera"
         },
         "sLengthMenu": 'Mostrar <select>' +
          '<option value="5">5</option>' +
          '<option value="10">10</option>' +
         '<option value="15">15</option>' +
         '<option value="20">20</option>' +
         '<option value="30">30</option>' +
          '</select> registros',
         "sInfo": "Mostrando del _START_ a _END_ (Total: _TOTAL_ resultados)",
         "sInfoFiltered": " Filtrados de MAX registros",
         "sInfoEmpty": " ",
         "sZeroRecords": "No se encontraron registros",
         "sProcessing": "Espere, por favor...",
         "sSearch": "Buscar:",
     }
  });
}
</script>