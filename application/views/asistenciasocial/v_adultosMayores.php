<div class="row">
	<div class="span12">      		
		<div class="widget ">
			<div class="widget-header">
				<i class="icon-user"></i>
				<h3>Asistencia Social <small><?php echo strtoupper($this->session->userdata('curpbuscada')) ?></small></h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">

				<h4>Registro a las terapias ocupacionales: </h4>

				<form method="post" role="form" id="canalizacion" name="canalizacion">
					<fieldset>

						<table class="table table-hover table-striped" cellspacing="0" width="100%">
			              	<thead>
			                	<tr>
				                  	<th></th>
				                 	<th>Nombre</th>
				                  	<th>Objetivo</th>
			                	</tr>
			              	</thead>
			              	<tbody>
			              		<?php foreach ($cursos as $curso) { ?>
			                  		<tr>
			                  			<td>
			                    			<div class="control-group">
								                <div class="controls">
								                    <label class="checkbox"> &nbsp;
								                        <input type="checkbox" name="Id_Terapia_Ocupacional[]" value="<?php  echo $curso->Id; ?>">
								                    </label>
								                </div>
								            </div>
			                  			</td>
			                  			<td><?php echo $curso->Nombre; ?></td>
			                  			<td><?php echo $curso->Objetivo; ?></td>
			                		</tr>
			              		<?php } ?>
			              	</tbody>
			            </table>

			            <div class="form-actions span10">
			              	<button id="guardar" type="submit" class="btn btn-primary btn-large span5 offset2">Registrar &nbsp; <span class="icon-chevron-right"></span></button> 
			            </div> <!-- /form-actions -->
					
					</fieldset>
				</form>
			
			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
	</div> <!-- /span8 -->
</div> <!-- /row -->

<script type="text/javascript">
  $(document).on("ready",inicio);
  function inicio(){
    $("#guardar").on("click",guardar);
  }
  function guardar(e)
  {
    //$( "#modal_aceptar" ).modal('show');
    //window.location = "<?php echo site_url().'c_ventanilla/ventanilla';?>";
    e.preventDefault();
    $.ajax({
      type : 'POST',
      url : "<?php echo site_url("c_asistenciasocial/registroAdultoMayor") ?>",
      data :$("#canalizacion").serialize(),
      dataType: 'json',
      success : function(data) {
        console.log(data);
        window.location = "<?php echo site_url().'/c_asistenciasocial/index';?>";
      },
      error : function(jqXHR, textStatus, errorThrown) {
        alert('Error ' + jqXHR +textStatus + errorThrown);
      }
    });
  }
</script>
	