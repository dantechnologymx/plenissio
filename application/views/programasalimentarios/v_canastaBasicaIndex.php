<div class="row">
	<div class="span12">      		
		<div class="widget ">
			<div class="widget-header">
				<i class="icon-user"></i>
				<h3>Programas Alimentarios  <small>Padrón de Solicitudes Nuevas para Verificación</small></h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">

				<h4>Verifica cada caso segun el resultado del Estudio Socioeconomico </h4>

				</br>
				
				<table id="example" class="table" cellspacing="0" width="100%">
        	<thead>
          		<tr class="alert alert-info">
                <th>Registro</th>
                <th>Solicitante</th>
                <th>Domicilio</th>
                <th>Localidad</th>
                <th>Municipio</th>
                <th>Fecha Estudio Socioeconomico</th>
                <th></th>
                <th></th>
          		</tr>
        	</thead>
        	<tbody>
        	<?php foreach ($servicios as $servicio) { ?>
            	<tr>
                <td><?php echo $servicio->Fecha_Registro; ?></td>
                <td><?php echo $servicio->Nombre_S." ".$servicio->Apellido_Paterno." ".$servicio->Apellido_Materno; ?></td>
                <td><?php echo $servicio->Tipo_Vialidad." ".$servicio->Nombre_Vialidad." #".$servicio->No_Ext1." ".$servicio->Tipo_Asentamiento." ".$servicio->Asentamiento; ?></td>
                <td><?php echo $servicio->Localidad; ?></td>
                <td><?php echo $servicio->Municipio; ?></td>
                <td><?php echo $servicio->fecha_EstSoc; ?></td>
                <td class="text-center"><a class = "btn btn-primary enc" href="<?php echo site_url().'/c_programasalimentarios/aplicaCB/'.$servicio->Id_Servicio_CB; ?>">Procede <span class="icon-ok"></span> </a></td>
                <td class="text-center"><a id="noaplicaCB" class = "btn btn-danger enc" href="#" data-toggle="modal" data-target="#modal_noprocede" onClick="modal(<?php echo $servicio->Id_Servicio_CB; ?>);" >No Procede <span class="icon-remove"></span> </a></td>
          		</tr>
          	<?php } ?>
        	</tbody>
      	</table>

			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
	</div> <!-- /span8 -->
</div> <!-- /row -->


<div id="modal_noprocede" class="modal hide fade" tabindex="-1" aria-labelledby="myModalLabel">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="myModalLabel" class="blue bigger">Observaciones por Improcedencia:</h4></br>
    </div>
    <form method="post" id="datos" action="<?php echo site_url('c_programasalimentarios/noaplicaCB');?>">
        <div class="modal-body overflow-visible">
          	<div class="row">
            	<div class="span5">
              		<textarea name="Observaciones" class="span5" cols="70" rows="5"></textarea>
            	</div>
          	</div>
        </div>
        <div class="modal-footer">
        	<button type="button" class="btn btn-primary btn-large span3 offset1" id="guardar">Guardar &nbsp; <span class="icon-save"></span></button>
        </div>
    </form>
</div>

<script type="text/javascript">
  $(document).on("ready",inicio);
  function inicio(){
    $("#guardar").on("click",guardar);
  }
  var Id_Servicio_CB;

  function modal(Idscb){
      Id_Servicio_CB = Idscb;
    }
  
  function guardar(e)
  {
    e.preventDefault();
    $.ajax({
      type : 'POST',
      url : "<?php echo site_url().'/c_programasalimentarios/noaplicaCB/' ?>"+Id_Servicio_CB,
      data :$("#datos").serialize(),
      dataType: 'json',
      success : function(data) {
        console.log(data);
        window.location = "<?php echo site_url().'/c_programasalimentarios/canastaBasicaIndex/';?>";
      },
      error : function(jqXHR, textStatus, errorThrown) {
        alert('Error ' + jqXHR +textStatus + errorThrown);
      }
    });
  }
</script>
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