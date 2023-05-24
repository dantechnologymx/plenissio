<link rel="stylesheet" href="<?php echo base_url();?>template/css/jquery.dataTables_themeroller.css" />
<link rel="stylesheet" href="<?php echo base_url();?>template/css/jquery.dataTables.css" />
<link rel="stylesheet" href="<?php echo base_url();?>template/css/jquery.dataTables.min.css" />

<div class="row">
  	<div class="span12">      		
  		<div class="widget ">
  			<div class="widget-header">
  				<i class="icon-th-large"></i>
  				<h3>Ventanilla Única <small> Ingrese el Nombre o la CURP para Iniciar</small></h3>
				</div> <!-- /widget-header -->
			
			<div class="widget-content">
				<div class="tabbable">
					<ul class="nav nav-tabs">
						<li <?php if(isSet($tab)){ if($tab == 1) {echo 'class="active"';} else { echo '';} } else { echo 'class="active"'; } ?> >
					    	<a href="#buscarUsuario" data-toggle="tab">Buscar Usuario</a>
					  	</li>
					  	<li <?php if(isSet($tab)){ if($tab == 2) {echo 'class="active"';} else { echo '';} } else { echo ''; } ?> >
					    	<a href="#nuevoUsuario" data-toggle="tab">Nuevo Usuario</a>
					  	</li>
					  	<li <?php if(isSet($tab)){ if($tab == 3) {echo 'class="active"';} else { echo '';} } else { echo ''; } ?> >
					  		<a href="#usuarioRegistrado" data-toggle="tab">Usuario Registrado</a>
					  	</li>
					</ul>
					<br>
					<div class="tab-content">
						<div class="tab-pane <?php if(isSet($tab)){ if($tab == 1) {echo 'active';} else { echo '';} } else { echo 'active'; } ?>" id="buscarUsuario">
							<div class="span2">&nbsp;</div>
							<form class="form-horizontal" role="form">
								<fieldset>

									<div class="controls">
										<input type="text" class="span6" name="Nombre_Conyugue" id="Nombre_Conyugue" autofocus />
					              		<input type="hidden" name="Id_conyugue" id="Id_conyugue" />
										<br />
									</div> <!-- /controls -->

									<div class="controls">
                                      	<div class="btn-group">
                                      		<ul class="dropdown-menu" id="searchResults"></ul>
                                    	</div>
                                    </div>

									<br />

									<div class="form-actions span6">
										<a class="btn btn-large btn-primary span4" data-toggle="tab" href="#nuevoUsuario">Nuevo &nbsp;<span class="icon-plus-sign"></span>
							            </a>
									</div> <!-- /form-actions -->

								</fieldset>
							</form>
						</div>
						<div class="tab-pane <?php if(isSet($tab)){ if($tab == 2) {echo 'active';} else { echo '';} } else { echo ''; } ?>" id="nuevoUsuario">
							<div class="span3">&nbsp;</div>
							<form class="form-horizontal" action="<?php echo site_url('c_ventanilla/busquedaCurp');?>" method ="post" id="form-curp" name="form-curp">
								<fieldset>

									<div class="control-group">											
										<label class="control-label" for="curp">CURP</label>
										<div class="controls">
											<input type="text" class="span3" id="curp" name="curp" required autofocus>
											<br />
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="controls">
										<div class="form-group text-center">
							                <label style="color:red"><?php if(isSet($texto)){echo $texto;} ?></label>
							            </div>
									</div> <!-- /controls -->	

									<div class="form-actions span4">
										<button type="submit" class="btn btn-primary btn-large span2">Buscar &nbsp; <span class="icon-search"></span></button> 
									</div> <!-- /form-actions -->
									
								</fieldset>
							</form>

							<br /><br />
							<div class="span3">&nbsp;</div>

							<form class="form-horizontal" action="<?php echo site_url('c_ventanilla/busquedaNombreCurp');?>" method ="post" id="form-name" name="form-name">
								<fieldset>
									
									<div class="control-group">											
										<label class="control-label" for="nombre_s">Nombre (s)</label>
										<div class="controls">
											<input type="text" class="span3" id="nombre_s" name="nombre_s" class="form-control" required <?php if(isSet($texto2)){echo 'value="'.$persona['nombre_s'].'"';} ?> >
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="control-group">											
										<label class="control-label" for="apellido1">Apellido Paterno</label>
										<div class="controls">
											<input type="text" class="span3" id="apellido1" name="apellido1" required <?php if(isSet($texto2)){echo 'value="'.$persona['apellido1'].'"';} ?> >
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="control-group">											
										<label class="control-label" for="apellido2">Apellido Materno</label>
										<div class="controls">
											<input type="text" class="span3" id="apellido2" name="apellido2" required <?php if(isSet($texto2)){echo 'value="'.$persona['apellido2'].'"';} ?> >
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="control-group">											
										<label class="control-label" for="estado">Estado</label>
										<div class="controls">
											<select class="selectpicker span3" id="estado" name="estado" required="required">
						                    	<?php foreach ($estados as $value) {
							                      	echo '<option ';
							                      	if (isSet($texto2) && ($persona['estado'] == $value->Nombre)) {
							                        echo 'selected';
							                      	}
							                      	echo ' value="'.$value->Nombre.'">'.$value->Nombre.'</option>';
						                    	} ?>
						                 	</select>
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="control-group">											
										<label class="control-label" for="fechaNacimiento">Fecha de Nacimiento</label>
										<div class="controls">
											<input type="text" class="span3" id="fechaNacimiento" name="fechaNacimiento" class="form-control" placeholder="DD/MM/AAAA" required <?php if(isSet($texto2)){echo 'value="'.$persona['fechaNacimiento'].'"';} ?> >
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="control-group">											
										<label class="control-label" for="sexo">Sexo</label>
										<div class="controls">
											<select class="selectpicker span3" id="sexo" name="sexo" required="required">
					                      		<option <?php if(isSet($texto2) && ($persona['sexo'] == "H")){echo 'selected';} ?> value="H">Hombre</option>
					                      		<option <?php if(isSet($texto2) && ($persona['sexo'] == "M")){echo 'selected';} ?> value="M">Mujer</option>
					                  		</select>
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="controls">
										<div class="span3">
        									<label style="color:red"><?php if(isSet($texto2)){echo $texto2;} ?></label>
      									</div>
									</div> <!-- /controls -->

									<div class="form-actions span4">
										<button type="submit" class="btn btn-primary btn-large span2" name="BuscarCurpxName" id="BuscarCurpxName">Buscar &nbsp; <span class="icon-search"></span></button> 
									</div> <!-- /form-actions -->

								</fieldset>
							</form>

							<div class="span3">&nbsp;</div>

							<form class="form-horizontal" action="<?php echo site_url('c_ventanilla/registroSinCurp');?>" method ="post" id="form-name" name="form-name">
								<fieldset>

									<input type="hidden" id="nombre_s" name="nombre_s" <?php if(isSet($texto2)){echo 'value="'.$persona['nombre_s'].'"';} ?> >

									<input type="hidden" id="apellido1" name="apellido1" <?php if(isSet($texto2)){echo 'value="'.$persona['apellido1'].'"';} ?> >

									<input type="hidden" id="apellido2" name="apellido2" <?php if(isSet($texto2)){echo 'value="'.$persona['apellido2'].'"';} ?> >

									<input type="hidden" id="estado" name="estado" <?php if(isSet($texto2)){echo 'value="'.$persona['estado'].'"';} ?> >

									<input type="hidden" id="fechaNacimiento" name="fechaNacimiento" <?php if(isSet($texto2)){echo 'value="'.$persona['fechaNacimiento'].'"';} ?> >

									<input type="hidden" id="sexo" name="sexo" <?php if(isSet($texto2)){echo 'value="'.$persona['sexo'].'"';} ?> >

									<div <?php if(isSet($texto2)){
					                            echo '';
					                          }else {
					                            echo 'style="display:none;"';
					                          } ?> class="form-actions span4">
										<button type="submit" class="btn btn-danger btn-large" name="RegistroSinCurp" id="RegistroSinCurp">Registrar sin CURP &nbsp; <span class="icon-ok-circle"></span></button> 
									</div> <!-- /form-actions -->	

								</fieldset>
							</form>								
						</div>
						
						<div class="tab-pane <?php if(isSet($tab)){ if($tab == 3) {echo 'active';} else { echo '';} } else { echo ''; } ?>" id="usuarioRegistrado">
							
							<table id="example" class="table table-hover table-striped" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>CURP</th>
										<th>Nombre</th>
										<th>Paterno</th>
										<th>Materno</th>
										<th>Sexo</th>
										<th>Fecha de Nacimiento</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($personas as $n){ ?>
									<tr>
										<td><?php echo $n->Curp ?></td>
										<td><?php echo $n->Nombre_S ?></td>
										<td><?php echo $n->Apellido_Paterno ?></td>
										<td><?php echo $n->Apellido_Materno ?></td>
										<td><?php echo $n->Sexo ?></td>
										<td><?php echo $n->Fecha_Nacimiento ?></td>
										<td class="text-center" title="Acciones">
											<a class="btn btn-info enc" href="<?php echo site_url().'/C_ventanilla/busquedaPersona'."/".$n->Id ?>">Seleccionar  <span class="icon-check"></span> </a>
											<a class="btn btn-warning" href="<?php echo site_url().'/C_ventanilla/modificarPersona'."/".$n->Id ?>">Modificar  <span class="icon-edit"></span> </a>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div> <!-- /widget-content -->	
		</div> <!-- /widget -->
    </div> <!-- /span8 -->
</div> <!-- /row -->
<script language="javascript" type="text/javascript">
$(document).ready(function() {
	  $("#example").DataTable({
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
} );
</script>
<script type="text/javascript">
$(document).on("ready",inicio);
function inicio(){
    $("#Nombre_Conyugue").focus(function(){
      $(this).select();
    });
    $('#Nombre_Conyugue').keyup(ajaxConyugue);
    //$("#RegistrarConyugue").on("click", registrarConyugue);
  }
  /**
   * [ajaxConyugue description]
   * @return {[type]} [description]
   */
  function ajaxConyugue() {
    //Console.log($("#Nombre_Conyugue").val());
    if ($('#Nombre_Conyugue').val() != '' && $('#Nombre_Conyugue').val() != ' ') {
      setTimeout(function(){
        $.ajax({
          type    : 'POST',
          url     : "<?php echo site_url("C_asistenciasocial/buscarPersona") ?>",
          data    : {Nombre_Conyugue: $("#Nombre_Conyugue").val()},
          dataType: 'html',
          success : function(data) {
            $("#searchResults").html(data);
            $("#searchResults").show();
          },
          error : function(jqXHR, textStatus, errorThrown) {
            alert('Error ' + jqXHR +textStatus + errorThrown);
          }
        });
      }, 750);
    } else {
      $("#searchResults").html('');
      $("#searchResults").hide();      
    }
  }
  function seleccionarPersona($idPersona){
    window.location.href = "<?php echo site_url("C_ventanilla/busquedaPersona") ?>"+"/"+$idPersona;
  }
</script>