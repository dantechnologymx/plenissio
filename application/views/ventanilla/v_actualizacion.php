<div class="row">
	<div class="span6">

		<div class="widget widget-nopad">
			<div class="widget-header">
				<i class="icon-edit"></i>
				<h3>Cambio Manual</h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">

				<br />

				<h3>&nbsp;&nbsp;&nbsp;&nbsp;Datos Personales</h3>

				<br />

				<form class="form-horizontal" method="post" id="datosmanual" action="<?php echo site_url('C_ventanilla/actualizarDatos');?>">
					<fieldset>

						<div class="control-group">                     
                      		<label class="control-label" for="Curp">CURP</label>
                  			<div class="controls">
                    			<input type="text" class="span3" name="Curp" required="required" value="<?php echo utf8_decode($persona->Curp) ;?>" />
                  			</div> <!-- /controls -->       
                    	</div> <!-- /control-group -->
						
						<div class="control-group">                     
                      		<label class="control-label" for="Nombre_S">Nombre(s)</label>
                  			<div class="controls">
                    			<input type="text" class="span3" name="Nombre_S" required="required" value="<?php echo utf8_decode($persona->Nombre_S) ;?>" />
                  			</div> <!-- /controls -->       
                    	</div> <!-- /control-group -->

		                <div class="control-group">                     
		                  	<label class="control-label" for="Apellido_Paterno">Apellido Paterno</label>
		                  	<div class="controls">
		                    	<input type="text" class="span3" name="Apellido_Paterno" required="required" value="<?php echo utf8_decode($persona->Apellido_Paterno) ;?>" />
		                  	</div> <!-- /controls -->       
		                </div> <!-- /control-group -->

	                    <div class="control-group">                     
	                      	<label class="control-label" for="Apellido_Materno">Apellido Materno</label>
	                      	<div class="controls">
	                        	<input type="text" class="span3" name="Apellido_Materno" required="required" value="<?php echo utf8_decode($persona->Apellido_Materno) ;?>" />
	                      	</div> <!-- /controls -->       
	                    </div> <!-- /control-group -->

		                <div class="control-group">                     
		                  	<label class="control-label" for="Estado">Lugar de Nacimiento</label>
		                  	<div class="controls">
		                  		<select class="selectpicker show-tick form-control" name="Id_Estado" required="required">
		                          	<?php foreach ($Estado as $value) {
		                          	echo '<option value="'.$value->Id.'"';
		                          	if ($value->Id == $persona->Id_Estado) {
		                            	echo ' selected';
		                          		}
		                          		echo '>'.$value->Nombre.'</option>';
		                         	 } ?>
		                        </select>
		                  	</div> <!-- /controls -->       
		                </div> <!-- /control-group -->

	                    <div class="control-group">                     
	                      	<label class="control-label" for="Fecha_Nacimiento">Fecha de Nacimiento</label>
	                      	<div class="controls">
	                        	<input type="text" class="span3" name="Fecha_Nacimiento" required="required" value="<?php echo date_format(new DateTime($persona->Fecha_Nacimiento), 'd/m/Y'); ?>" />
	                      	</div> <!-- /controls -->       
	                    </div> <!-- /control-group -->

	                    <div class="control-group">                     
	                      	<label class="control-label" for="Sexo">Sexo</label>
	                      	<div class="controls">
	                        	<input type="text" class="span3" name="Sexo" required="required" value="<?php echo $persona->Sexo ;?>" />
	                      	</div> <!-- /controls -->       
	                    </div> <!-- /control-group -->

	                    <div class="control-group">                     
	                      	<label class="control-label" for="Nacionalidad">Nacionalidad</label>
	                      	<div class="controls">
	                        	<input type="text" class="span3" name="Nacionalidad" required="required" value="<?php echo $persona->Nacionalidad; ;?>" />
	                      	</div> <!-- /controls -->       
	                    </div> <!-- /control-group -->

	                    <div class="control-group">                     
	                      	<label class="control-label" for="Id_Estado_Civil">Estado Civil</label>
	                      	<div class="controls">
	                        	<select class="selectpicker show-tick form-control" name="Id_Estado_Civil" required="required">
	                          		<?php foreach ($estadoCivil as $value) {
			                        echo '<option value="'.$value->Id.'"';
			                        if ($value->Id == $persona->Id_Estado_Civil) {
			                          	echo ' selected';
			                        }
			                        	echo '>'.$value->Nombre.'</option>';
			                        } ?>
	                        	</select>
	                      	</div> <!-- /controls -->       
	                    </div> <!-- /control-group -->

	                    <div class="control-group">                     
	                      	<label class="control-label" for="Id_Escolaridad">Escolaridad</label>
	                      	<div class="controls">
	                        	<select class="selectpicker show-tick form-control" name="Id_Escolaridad" required="required">
		                          	<?php foreach ($escolaridad as $value) {
		                          	echo '<option value="'.$value->Id.'"';
		                          	if ($value->Id == $persona->Id_Escolaridad) {
		                            	echo ' selected';
		                          	}
		                          		echo '>'.$value->Nombre.'</option>';
		                          	} ?>
	                        	</select>
	                      	</div> <!-- /controls -->       
	                    </div> <!-- /control-group -->

	                    <div class="control-group">                     
	                      	<label class="control-label" for="Ocupacion">Ocupación</label>
	                      	<div class="controls">
	                        	<input type="text" class="span3" name="Ocupacion" required="required" value="<?php echo $persona->Ocupacion; ?>"/>
	                      	</div> <!-- /controls -->       
	                    </div> <!-- /control-group -->

                		<button id="actualizarmanual" type="submit" class="btn btn-primary btn-large span4 offset1">Actualizar &nbsp; <span class="icon-refresh"></span></button> 

					</fieldset>
				</form>
			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
	</div>
	<div class="span6">

		<div class="widget widget-nopad">
			<div class="widget-header">
				<i class="icon-edit"></i>
				<h3>Cambio por CURP</h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">

				<br />

				<h3>&nbsp;&nbsp;&nbsp;&nbsp;Datos Personales</h3>

				<br />

				<div class="form-horizontal">
					<div class="control-group">                     
	              		<label class="control-label" for="CurpSearch">Nueva CURP</label>
	              		<div class="controls">
	                		<div class="input-append">
	                  			<input type="text" class="span3 m-wrap" name="CurpSearch" id="CurpSearch" required="required" />
	                  			<button id="btnbuscarCURP" class="btn btn-warning" type="submit" ><i class="icon-search"></i></button>
	                		</div>
	              		</div> <!-- /controls -->       
	            	</div> <!-- /control-group -->

	            	<div id="error" class="controls" style="display:none;">
			            <label id="etiqueta" style="color:red"><strong>prueba</strong></label>
					</div> <!-- /controls -->
	            </div>

				<form class="form-horizontal" method="post" id="datoscurp" action="<?php echo site_url('C_ventanilla/actualizarDatos');?>">
					<fieldset>

						<div class="control-group">                     
                      		<label class="control-label" for="Curp">CURP</label>
                  			<div class="controls">
                    			<input id="Curp" type="text" class="span3" name="Curp" required="required" disabled="true" value="<?php echo utf8_decode($persona->Curp) ;?>"/>
                  			</div> <!-- /controls -->
                  			<input id="Curphidden" type="hidden" name="Curp" value="<?php echo utf8_decode($persona->Curp) ;?>" />     
                    	</div> <!-- /control-group -->
						
						<div class="control-group">                     
                      		<label class="control-label" for="Nombre_S">Nombre(s)</label>
                  			<div class="controls">
                    			<input id="Nombre_S" type="text" class="span3" name="Nombre_S" required="required" disabled="true" value="<?php echo utf8_decode($persona->Nombre_S) ;?>"/>
                  			</div> <!-- /controls -->
                  			<input id="Nombre_Shidden" type="hidden" name="Nombre_S" value="<?php echo utf8_decode($persona->Nombre_S) ;?>" />
                    	</div> <!-- /control-group -->

		                <div class="control-group">                     
		                  	<label class="control-label" for="Apellido_Paterno">Apellido Paterno</label>
		                  	<div class="controls">
		                    	<input id="Apellido_Paterno" type="text" class="span3" name="Apellido_Paterno" required="required" disabled="true" value="<?php echo utf8_decode($persona->Apellido_Paterno) ;?>"/>
		                  	</div> <!-- /controls -->
		                  	<input id="Apellido_Paternohidden" type="hidden" name="Apellido_Paterno" value="<?php echo utf8_decode($persona->Apellido_Paterno) ;?>" />    
		                </div> <!-- /control-group -->

	                    <div class="control-group">                     
	                      	<label class="control-label" for="Apellido_Materno">Apellido Materno</label>
	                      	<div class="controls">
	                        	<input id="Apellido_Materno" type="text" class="span3" name="Apellido_Materno" required="required" disabled="true" value="<?php echo utf8_decode($persona->Apellido_Materno) ;?>"/>
	                      	</div> <!-- /controls -->
	                      	<input id="Apellido_Maternohidden" type="hidden" name="Apellido_Materno" value="<?php echo utf8_decode($persona->Apellido_Materno) ;?>" />      
	                    </div> <!-- /control-group -->

		                <div class="control-group">                     
		                  	<label class="control-label" for="Estado">Lugar de Nacimiento</label>
		                  	<div class="controls">
		                    	<input id="Estado" type="text" class="span3" name="Estado" required="required" disabled="true" value="<?php echo strtoupper($EstadoNombre[0]->Nombre); ?>"/>
		                  	</div> <!-- /controls -->
		                  	<input id="Id_Estado" type="hidden" name="Id_Estado" value="<?php echo $persona->Id_Estado; ?>" />  
		                </div> <!-- /control-group -->

	                    <div class="control-group">                     
	                      	<label class="control-label" for="Fecha_Nacimiento">Fecha de Nacimiento</label>
	                      	<div class="controls">
	                        	<input id="Fecha_Nacimiento" type="text" class="span3" name="Fecha_Nacimiento" required="required" disabled="true" value="<?php echo date_format(new DateTime($persona->Fecha_Nacimiento), 'd/m/Y') ;?>"/>
	                      	</div> <!-- /controls -->
	                      	<input id="Fecha_Nacimientohidden" type="hidden" name="Fecha_Nacimiento" value="<?php echo date_format(new DateTime($persona->Fecha_Nacimiento), 'd/m/Y') ;?>" />       
	                    </div> <!-- /control-group -->

	                    <div class="control-group">                     
	                      	<label class="control-label" for="Sexo">Sexo</label>
	                      	<div class="controls">
	                        	<input id="Sexo" type="text" class="span3" name="Sexo" required="required" disabled="true" value="<?php echo $persona->Sexo ;?>"/>
	                      	</div> <!-- /controls -->
	                      	<input id="Sexohidden" type="hidden" name="Sexo" value="<?php echo utf8_decode($persona->Sexo) ;?>" />      
	                    </div> <!-- /control-group -->

	                    <div class="control-group">                     
	                      	<label class="control-label" for="Nacionalidad">Nacionalidad</label>
	                      	<div class="controls">
	                        	<input id="Nacionalidad" type="text" class="span3" name="Nacionalidad" required="required" disabled="true" value="<?php echo $persona->Nacionalidad; ;?>"/>
	                      	</div> <!-- /controls -->
	                      	<input id="Nacionalidadhidden" type="hidden" name="Nacionalidad" value="<?php echo utf8_decode($persona->Nacionalidad) ;?>" />      
	                    </div> <!-- /control-group -->

	                    <div class="control-group">                     
	                      	<label class="control-label" for="Id_Estado_Civil">Estado Civil</label>
	                      	<div class="controls">
	                        	<select class="selectpicker show-tick form-control" name="Id_Estado_Civil" required="required">
	                          		<?php foreach ($estadoCivil as $value) {
			                        echo '<option value="'.$value->Id.'"';
			                        if ($value->Id == $persona->Id_Estado_Civil) {
			                          	echo ' selected';
			                        }
			                        	echo '>'.$value->Nombre.'</option>';
			                        } ?>
	                        	</select>
	                      	</div> <!-- /controls -->       
	                    </div> <!-- /control-group -->

	                    <div class="control-group">                     
	                      	<label class="control-label" for="Id_Escolaridad">Escolaridad</label>
	                      	<div class="controls">
	                        	<select class="selectpicker show-tick form-control" name="Id_Escolaridad" required="required">
		                          	<?php foreach ($escolaridad as $value) {
		                          	echo '<option value="'.$value->Id.'"';
		                          	if ($value->Id == $persona->Id_Escolaridad) {
		                            	echo ' selected';
		                          	}
		                          		echo '>'.$value->Nombre.'</option>';
		                          	} ?>
	                        	</select>
	                      	</div> <!-- /controls -->       
	                    </div> <!-- /control-group -->

	                    <div class="control-group">                     
	                      	<label class="control-label" for="Ocupacion">Ocupación</label>
	                      	<div class="controls">
	                        	<input type="text" class="span3" name="Ocupacion" required="required" value="<?php echo $persona->Ocupacion; ?>"/>
	                      	</div> <!-- /controls -->       
	                    </div> <!-- /control-group -->

                		<button id="actualizarcurp" type="submit" class="btn btn-primary btn-large span4 offset1">Actualizar &nbsp; <span class="icon-refresh"></span></button> 

					</fieldset>
				</form>
			</div> <!-- /widget-content -->
		</div> <!-- /widget -->

	</div> <!-- /span6 -->
</div> <!-- /row -->

<div class="row">
	<div class="span12">
		<div class="widget widget-nopad">
			<div class="widget-header">
				<i class="icon-map-marker"></i>
				<h3>Domicilios Registrados</h3>
				<!-- <div class="pull-right">
					<button id="domicilio" type="submit" class="btn btn-warning span2" style=" margin-top: 3%;">Nuevo Domicilio <span class="icon-plus-sign"></span></button>
				</div> -->
			</div> <!-- /widget-header -->
			<div class="widget-content">

			<table class="table table-hover table-striped" cellspacing="0" width="100%">
              	<thead>
                	<tr>
              			<th>Codigo Postal</th>
                  		<th>Domicilio</th>
              			<th>Municipio</th>
              			<th>Estado</th>
                	</tr>
              	</thead>
              	<tbody>
              		<?php foreach ($domicilios as $domicilio) { ?>
	                  	<tr>
	                  		<td><?php echo $domicilio->Codigo_Postal; ?></td>
	                  		<td><?php echo $domicilio->Tipo_Vialidad." ".$domicilio->Nombre_Vialidad." ".$domicilio->No_Ext1." ".$domicilio->Tipo_Asentamiento." ".$domicilio->Asentamiento; ?></td>
	                		<td><?php echo $domicilio->Municipio; ?></td>
	                  		<td><?php echo $domicilio->Estado; ?></td>
	                	</tr>
              		<?php } ?>
              	</tbody>
            </table>

		
			</div> <!-- /widget-content -->
		</div> <!-- /widget -->

	</div> <!-- /span12 -->
</div> <!-- /row -->

<div id="modal_aceptar" class="modal hide fade" tabindex="-1" aria-labelledby="myModalLabel">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal">&times;</button>
    	<h4 id="myModalLabel" class="blue bigger">Persona Actualizada Correctamente</h4></br>
  	</div>
  	<div class="modal-footer">
    	<button type="button" class="btn btn-primary btn-large offset2" id="aceptar">Aceptar</button>
  	</div>
</div>

<script type="text/javascript">
  $(document).on("ready",inicio);

  function inicio(){
    $("#btnbuscarCURP").on("click", buscarCURP);
    $("#actualizarmanual").on("click",actualizarmanual);
    $("#actualizarcurp").on("click",actualizarcurp);
    $("#aceptar").on("click",home);
    $("#domicilio").on("click",domicilio);
  }

  function actualizarmanual(e)
  {
    e.preventDefault();
    $.ajax({
      type : 'POST',
      url : "<?php echo site_url("C_ventanilla/actualizarDatos/") ?>",
      data :$("#datosmanual").serialize(),
      dataType: 'json',
      success : function(data) {
        console.log(data);
        $("#modal_aceptar").modal('show');
      },
      error : function(jqXHR, textStatus, errorThrown) {
        alert('Error ' + jqXHR +textStatus + errorThrown);
      }
    });
  }

  function actualizarcurp(e)
  {
    e.preventDefault();
    $.ajax({
      type : 'POST',
      url : "<?php echo site_url("C_ventanilla/actualizarDatos") ?>",
      data :$("#datoscurp").serialize(),
      dataType: 'json',
      success : function(data) {
        console.log(data);
        //LLamar modal para usuario actualizado correctamente
        $("#modal_aceptar").modal('show');
      },
      error : function(jqXHR, textStatus, errorThrown) {
        alert('Error ' + jqXHR +textStatus + errorThrown);
      }
    });
  }

  function buscarCURP(e)
  {
    var value = $("#CurpSearch").val();
    if (value == null ) { value = '';}
    e.preventDefault();
    $.ajax({
      type : 'GET',
      //Modificar por la Busqueda de la CURP
      url : "<?php echo site_url("C_ventanilla/CurpSearch") ?>"+"/"+value,
      dataType: 'json',
      success : function(data) {
        console.log(data);
        //Realizar el llenado de los campos con los datos devueltos por la CURP.
        if (data == false) {
        	$("#etiqueta").text("PERSONA YA REGISTRADA");
        	document.getElementById("error").style.display="block";
        }else{
	        if (data == true){
	        	$("#etiqueta").text("CURP No encontrada");
	        	document.getElementById("error").style.display="block";
	        }else{
	        	$("#Curp").val(data.persona[0]);
	        	$("#Curphidden").val(data.persona[0]);
	        	$("#Nombre_S").val(data.persona[1]);
	        	$("#Nombre_Shidden").val(data.persona[1]);
	        	$("#Apellido_Paterno").val(data.persona[2]);
	        	$("#Apellido_Paternohidden").val(data.persona[2]);
	        	$("#Apellido_Materno").val(data.persona[3]);
	        	$("#Apellido_Maternohidden").val(data.persona[3]);
	        	$("#Estado").val(data.persona[4]);
	        	$("#Id_Estado").val(data.idEstado[0].Id);
	        	$("#Fecha_Nacimiento").val(data.persona[5]);
	        	$("#Fecha_Nacimientohidden").val(data.persona[5]);
	        	$("#Sexo").val(data.persona[6]);
	        	$("#Sexohidden").val(data.persona[6]);
	        	if (data.persona[7] == "MEX" ) {
	        		$("#Nacionalidad").val("MEXICANA");
	        		$("#Nacionalidadhidden").val("MEXICANA");
	        	}else{
	        		$("#Nacionalidad").val(data.persona[7]);
	        		$("#Nacionalidadhidden").val(data.persona[7]);
	        	}
	        }
	    }
      },
      error : function(jqXHR, textStatus, errorThrown) {
        console.log('Error ' + jqXHR +textStatus + errorThrown);
      }
    });
  }

  function home(e){
    window.location = "<?php echo site_url().'/C_ventanilla/ventanilla';?>";
  }

  function domicilio(e){
    window.location = "<?php echo site_url().'/C_ventanilla/domicilio';?>";
  }
</script>

	