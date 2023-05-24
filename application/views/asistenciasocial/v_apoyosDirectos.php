	
<div class="row">
	<div class="span12">      		
		<div class="widget ">
			<div class="widget-header">
				<i class="icon-hand-right"></i>
				<h3>Asistencia Social <small><?php echo strtoupper($this->session->userdata('curpbuscada')) ?></small></h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">

			<h4><strong>Apoyos Directos DIF</strong></h4>

			</br>

			<form method="post" id="datos" action="<?php echo site_url("c_asistenciasocial/registroApoyosDirectos");?>">
				<fieldset>

					<div class="span5"> 
                		<div class="widget ">
                			<div class="widget-content">

								<div class="control-group">                     
			                      	<label class="control-label" for="Apoyo_Solicitado">Apoyo Solicitado</label>
			                  		<div class="controls">
			                    		<input type="text" class="span4" name="Apoyo_Solicitado" required="required" />
			                  		</div> <!-- /controls -->       
			                    </div> <!-- /control-group -->

			                    <div class="control-group">                     
			                      	<label class="control-label" for="Cantidad_Solicitada">Cantidad Solicitada</label>
			                  		<div class="controls">
			                  			<div class="input-prepend">
			                  				<span class="add-on">$</span>
			                  				<input type="text" class="span4" name="Cantidad_Solicitada" required="required" />
			                    		</div>
			                  		</div> <!-- /controls -->       
			                    </div> <!-- /control-group -->

			                    <div class="control-group">                     
			                      	<label class="control-label" for="Precio_Total">Costo Total</label>
			                  		<div class="controls">
			                  			<div class="input-prepend">
			                  				<span class="add-on">$</span>
			                    			<input type="text" class="span4" name="Precio_Total" required="required" />
			                    		</div>
			                  		</div> <!-- /controls -->       
			                    </div> <!-- /control-group -->

			                    <div class="control-group">                     
			                      	<label class="control-label" for="Id_Frecuencia_Apoyo">Frecuencia de Apoyo</label>
			                  		<div class="controls">
			                    		<select class="selectpicker show-tick span4" name="Id_Frecuencia_Apoyo" required="required">
							              	<?php foreach ($frecuenciaApoyo as $value) {
							              	echo '<option value="'.$value->Id.'">'.$value->Nombre.'</option>';
							            	} ?>
							            </select>
			                  		</div> <!-- /controls -->       
			                    </div> <!-- /control-group -->

			                    <div class="control-group">                     
			                      	<label class="control-label" for="Respuesta">Respuesta a la petición</label>
			                  		<div class="controls">
			                    		<input type="text" class="span4" name="Respuesta" required="required" />
			                  		</div> <!-- /controls -->       
			                    </div> <!-- /control-group -->

			                    <div class="control-group">                     
			                      	<label class="control-label" for="Procede">¿Procede?</label>
			                  		<div class="controls">
			                    		<select class="selectpicker show-tick span4" name="Procede" >
							            	<option value="1">SI</option>
							             	<option value="2">NO</option>
							            </select>
			                  		</div> <!-- /controls -->       
			                    </div> <!-- /control-group -->

			                    <div class="control-group">                     
			                      	<label class="control-label" for="Visita_Domicilio">Visita a Domicilio</label>
			                  		<div class="controls">
			                    		<select class="selectpicker show-tick span4" name="Visita_Domicilio" >
							              	<option value="2">NO</option>
							              	<option value="1">SI</option>
							            </select>
			                  		</div> <!-- /controls -->       
			                    </div> <!-- /control-group -->

			               	</div><!-- /widget-content -->
                		</div><!-- /widget -->
                	</div><!-- /span5 -->

			        <div class="span6"> 
                		<div class="widget ">
                			<div class="widget-content">

			                    <div class="control-group">                     
			                      	<label class="control-label" for="Apoyo_DIF">Apoyo por DIF Municipal</label>
			                  		<div class="controls">
			                  			<div class="input-prepend">
			                  				<span class="add-on">$</span>
			                    			<input type="text" class="span5" name="Apoyo_DIF" />
			                    		</div>
			                  		</div> <!-- /controls -->       
			                    </div> <!-- /control-group -->

			                    <div class="control-group">                     
			                      	<label class="control-label" for="Nombre_Otra_Institucion">Institución Ajena al DIF que apoya</label>
			                  		<div class="controls">
			                    		<input type="text" class="span5" name="Nombre_Otra_Institucion" />
			                  		</div> <!-- /controls -->       
			                    </div> <!-- /control-group -->

			                    <div class="control-group">                     
			                      	<label class="control-label" for="Apoyo_Otra_Institucion">Apoyo ajeno al DIF</label>
			                  		<div class="controls">
			                  			<div class="input-prepend">
			                  				<span class="add-on">$</span>
			                    			<input type="text" class="span5" name="Apoyo_Otra_Institucion" />
			                    		</div>
			                  		</div> <!-- /controls -->       
			                    </div> <!-- /control-group -->

			                    <div class="control-group">                     
			                      	<label class="control-label" for="Fecha_Entrega">Fecha de Entrega</label>
			                  		<div class="controls">
			                    		<input type="text" name="Fecha_Entrega" class="span5" placeholder="DD/MM/AAAA" />
			                  		</div> <!-- /controls -->       
			                    </div> <!-- /control-group -->

			                    <div class="control-group">                     
			                      	<label class="control-label" for="No_Caso">No. de Caso</label>
			                  		<div class="controls">
			                    		<input type="text" class="span5" name="No_Caso" />
			                  		</div> <!-- /controls -->       
			                    </div> <!-- /control-group -->

			                    <div class="control-group">                     
			                      	<label class="control-label" for="Responsable_Atencion">Responsable de Atención</label>
			                  		<div class="controls">
			                    		<input type="text" class="span5" name="Responsable_Atencion" required="required" />
			                  		</div> <!-- /controls -->       
			                    </div> <!-- /control-group -->

			                    <div class="control-group">                     
			                      	<label class="control-label" for="Responsable_Entrega">Responsable de Entrega</label>
			                  		<div class="controls">
			                    		<input type="text" class="span5" name="Responsable_Entrega" />
			                  		</div> <!-- /controls -->       
			                    </div> <!-- /control-group -->

				            </div><!-- /widget-content -->
                		</div><!-- /widget -->
                	</div><!-- /span6 -->

                	<div class="form-actions span10">
		              	<button id="guardar" type="submit" class="btn btn-primary btn-large span5 offset2">Registrar &nbsp; <span class="icon-chevron-right"></span></button> 
		            </div> <!-- /form-actions -->

				
				</fieldset>
			</form>
			
			
			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
	</div> <!-- /span8 -->
</div> <!-- /row -->

<div id="modal_estsoc" class="modal hide fade" tabindex="-1" aria-labelledby="myModalLabel">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal">&times;</button>
    	<h4 id="myModalLabel" class="blue bigger"><strong>Estudio Socio-Economico</strong></h4></br>
  	</div>
  	<div class="modal-body overflow-visible">
    	<div>
    	<h2><strong>¿Registrarlo?</strong></h2>
    	</div>
	</div>
  	<div class="modal-footer">
  		<button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelar">En otro momento</button>
        <button type="button" class="btn btn-primary btn-large" id="aceptar">¡Si! Hagamoslo</button>
  	</div>
</div>


<script type="text/javascript">
  $(document).on("ready",inicio);
  function inicio(){
    $("#guardar").on("click",guardar);
    $("#cancelar").on("click",cancelar);
    $("#aceptar").on("click",aceptar);
  }
  function guardar(e)
  {
    e.preventDefault();
    $.ajax({
      type : 'POST',
      url : "<?php echo site_url("c_asistenciasocial/registroApoyosDirectos") ?>",
      data :$("#datos").serialize(),
      dataType: 'json',
      success : function(data) {
        console.log(data);
        $("#modal_estsoc").modal('show');
      },
      error : function(jqXHR, textStatus, errorThrown) {
        alert('Error ' + jqXHR +textStatus + errorThrown);
      }
    });
  }
  function cancelar(){
  	$("#modal_estsoc").modal('hide');
  	window.location = "<?php echo site_url().'/c_asistenciasocial/index/';?>";
  }
  function aceptar() {
  	window.location = "<?php echo site_url().'/c_asistenciasocial/estudioSocioeconomico/';?>";
  }
</script>
	