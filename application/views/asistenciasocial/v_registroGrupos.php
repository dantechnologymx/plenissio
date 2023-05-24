<div class="row">
	<div class="span12">      		
		<div class="widget ">
			<div class="widget-header">
				<i class="icon-user"></i>
				<h3>Asistencia Social  <small><?php echo strtoupper($this->session->userdata('curpbuscada')); ?></small></h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">

				<h4>Conformacion de Nuevos Grupos</h4>

				<br />

				<form method="post" id="datos" action="<?php echo site_url('C_asistenciasocial/guardarAsistencia');?>">
					<fieldset>

						<div class="span11 form-horizontal">
							<div class="control-group">                     
		              			<label class="control-label" for="NombreGrupo">Nombre del Grupo</label>
		              			<div class="controls">
		                			<input type="text" class="span8" name="NombreGrupo" required="required" />
		              			</div> <!-- /controls -->       
		            		</div> <!-- /control-group -->
	            		</div>

	            		<div class="span5 form-horizontal">
	            			<div class="control-group">                     
                      			<label class="control-label" for="FechaInicio">Fecha de Inicio</label>
                      			<div class="controls">
                        			<input type="text" class="span3" name="FechaInicio" required="required" placeholder="DD/MM/YYYY" />
                      			</div> <!-- /controls -->       
                    		</div> <!-- /control-group -->
	            		</div>

	            		<div class="span6 form-horizontal">
	            			<div class="control-group">                     
                      			<label class="control-label" for="FechaTermino">Fecha de Termino</label>
                      			<div class="controls">
                        			<input type="text" class="span3" name="FechaTermino" required="required" placeholder="DD/MM/YYYY" />
                      			</div> <!-- /controls -->       
                    		</div> <!-- /control-group -->
	            		</div>

	            		<div>
							
							<h3>Integrantes</h3>
							<button id="agregarIntegrantes" class="btn btn-warning span4 offset3">Agregar &nbsp;<span class="icon-plus-sign"></span></button>
							<br />

	                        <table id="Integrantes" class="table table-hover table-striped" cellspacing="0" width="100%">
					          	<thead>
					            	<tr>
					              		<th>Participante</th>
					              		<th></th>
					            	</tr>
					          	</thead>
					          	<tbody>
					            	<tr>
					            		<td></td>
				              			<td class="text-center"><a id="quitarIntegrante" class = "btn btn-danger enc" href="#" onClick="modal();" >Quitar <span class="icon-remove"></span> </a></td>
					            	</tr>
					          	</tbody>
					        </table>

					        <br />

				        </div>
						
						<div class="span11 form-horizontal">
							<div class="control-group">                     
		              			<label class="control-label" for="LugarImparticion">Lugar de Impartición</label>
		              			<div class="controls">
		                			<input type="text" class="span8" name="LugarImparticion" required="required" />
		              			</div> <!-- /controls -->       
		            		</div> <!-- /control-group -->
						</div>

						<div class="span11 form-horizontal">
							<div class="control-group">                     
		              			<label class="control-label" for="Observaciones">Observaciones:</label>
		              			<div class="controls">
		              				<textarea class="span11" name="Observaciones" cols="70" rows="7"></textarea>
		              			</div> <!-- /controls -->       
		            		</div> <!-- /control-group -->
						</div>

						<div class="form-actions span11">
			            	<button id="guardar" type="submit" class="btn btn-primary btn-large span4 offset3">Guardar &nbsp; <span class="icon-save"></span></button> 
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
  	$("#Nuevo_dependiente").on("click", agregarDependiente);
  	$("#Nuevo_conyuge").on("click", agregarConyuge);
    $("#btnbuscarCURP").on("click", buscarCURP);
    $("#Search_Nombre_Conyugue").focus(function(){
      $(this).select();
    });
    $('#Search_Nombre_Conyugue').keyup(ajaxConyugue);
    //$("#actualizarmanual").on("click",actualizarmanual);
    //$("#actualizarcurp").on("click",actualizarcurp);
    //$("#aceptar").on("click",home);
    //$("#domicilio").on("click",domicilio);
  }
</script>
	