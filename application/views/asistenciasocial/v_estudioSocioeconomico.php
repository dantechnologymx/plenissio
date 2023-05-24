<div class="row">
	<div class="span13">      		
		<div class="widget ">
			<div class="widget-header">
				<i class="icon-user"></i>
				<h3>Asistencia Social  <small><?php echo strtoupper($this->session->userdata('curpbuscada')); ?></small></h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">

				<h2>Estudio Socioeconomico</h2>

				<br />

				<form method="post" id="datos" action="<?php echo site_url('C_asistenciasocial/guardarEstudioS');?>">
					<fieldset>

						<div class="span5 form-horizontal">
							<div class="control-group">                     
                      			<label class="control-label" for="NoCaso">No. de Caso</label>
                      			<div class="controls">
                        			<input type="text" class="span3" name="NoCaso" />
                      			</div> <!-- /controls -->       
                    		</div> <!-- /control-group -->
						</div>

						<div class="span6 form-horizontal">
							<div class="control-group">                     
                      			<label class="control-label" for="Fecha">Fecha</label>
                      			<div class="controls">
                        			<input type="text" class="span3" name="Fecha" required="required" placeholder="DD/MM/YYYY" />
                      			</div> <!-- /controls -->       
                    		</div> <!-- /control-group -->
						</div>

						<br /><br />

						<div class="control-group">
							<div class="controls">
                                                
								<div class="accordion" id="accordion2">
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">Collapsible Group Item #1</a>
                                        </div>
                                        <div id="collapseOne" class="accordion-body collapse in">
                                            <div class="accordion-inner">
                                            	
												<input type="hidden" name="Id_Persona" id="Id_Persona" value="<?php echo $this->session->userdata('idPersona'); ?>" />


						                            	<div class="control-group">                     
									              			<label class="control-label" for="Nombre">Nombre</label>
									              			<div class="controls">
									                			<input type="text" class="span3" name="Nombre" disabled="true" value="<?php echo utf8_decode($persona->Nombre_S." ".$persona->Apellido_Paterno." ".$persona->Apellido_Materno) ;?>" />
									              			</div> <!-- /controls -->       
									            		</div> <!-- /control-group -->

									            		<div class="control-group">                     
									              			<label class="control-label" for="Domicilio">Domicilio</label>
									              			<div class="controls">
									                			<textarea rows="4" class="span3" name="Domicilio" disabled="true"><?php echo $domicilio[0]->Tipo_Vialidad." ".$domicilio[0]->Nombre_Vialidad." ".$domicilio[0]->No_Ext1." ".$domicilio[0]->Tipo_Asentamiento." ".$domicilio[0]->Asentamiento." ".$domicilio[0]->Municipio." ".$domicilio[0]->Estado; ?></textarea>
									              			</div> <!-- /controls -->       
									            		</div> <!-- /control-group -->

									            		<div class="control-group">                     
									              			<label class="control-label" for="Telefono">Telefono</label>
									              			<div class="controls">
									                			<input type="text" class="span3" name="Telefono" disabled="true" value="<?php echo $domicilio[0]->Lada_Tel." ".$domicilio[0]->Telefono; ?>" />
									              			</div> <!-- /controls -->       
									            		</div> <!-- /control-group -->

									            		<div class="control-group">                     
									              			<label class="control-label" for="Estado_Civil">Estado Civil</label>
									              			<div class="controls">
									                			<input type="text" class="span3" name="Estado_Civil" required="required" disabled="true"
									                			value="<?php foreach ($estadoCivil as $value) {
												                      			if ($value->Id == $persona->Id_Estado_Civil){
												                      				echo $value->Nombre;
												                      			}
												                      } ?>" />
									              			</div> <!-- /controls -->       
									            		</div> <!-- /control-group -->

									            		<div class="control-group">                     
									              			<label class="control-label" for="L_Nacimiento">Lugar de Nacimiento</label>
									              			<div class="controls">
									                			<input type="text" class="span3" name="L_Nacimiento" required="required" disabled="true"
									                			value="<?php foreach ($estados as $value) {
												                      			if ($value->Id == $persona->Id_Estado){
												                      				echo $value->Nombre;
												                      			}
												                      } ?>" />
									              			</div> <!-- /controls -->       
									            		</div> <!-- /control-group -->


						                            


                                        	</div>
                                        </div>
                                    </div>

                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">Collapsible Group Item #2</a>
                                        </div>
                                        <div id="collapseTwo" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                                            Anim pariatur cliche...
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div> <!-- /controls -->	
						</div> <!-- /control-group -->

			                
								<div class="accordion" id="accordion2">

			                      	<div class="accordion-group">
			                        	<div class="accordion-heading">
			                          		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">Datos del Beneficiario</a>
			                        	</div>
			                        	<div id="collapseOne" class="accordion-body collapse in">
			                          		<div class="accordion-inner">

			                          			<input type="hidden" name="Id_Persona" id="Id_Persona" value="<?php echo $this->session->userdata('idPersona'); ?>" />

												<div class="span12">
						                            <div class="span5 form-horizontal">

						                            	<div class="control-group">                     
									              			<label class="control-label" for="Nombre">Nombre</label>
									              			<div class="controls">
									                			<input type="text" class="span3" name="Nombre" disabled="true" value="<?php echo utf8_decode($persona->Nombre_S." ".$persona->Apellido_Paterno." ".$persona->Apellido_Materno) ;?>" />
									              			</div> <!-- /controls -->       
									            		</div> <!-- /control-group -->

									            		<div class="control-group">                     
									              			<label class="control-label" for="Domicilio">Domicilio</label>
									              			<div class="controls">
									                			<textarea rows="4" class="span3" name="Domicilio" disabled="true"><?php echo $domicilio[0]->Tipo_Vialidad." ".$domicilio[0]->Nombre_Vialidad." ".$domicilio[0]->No_Ext1." ".$domicilio[0]->Tipo_Asentamiento." ".$domicilio[0]->Asentamiento." ".$domicilio[0]->Municipio." ".$domicilio[0]->Estado; ?></textarea>
									              			</div> <!-- /controls -->       
									            		</div> <!-- /control-group -->

									            		<div class="control-group">                     
									              			<label class="control-label" for="Telefono">Telefono</label>
									              			<div class="controls">
									                			<input type="text" class="span3" name="Telefono" disabled="true" value="<?php echo $domicilio[0]->Lada_Tel." ".$domicilio[0]->Telefono; ?>" />
									              			</div> <!-- /controls -->       
									            		</div> <!-- /control-group -->

									            		<div class="control-group">                     
									              			<label class="control-label" for="Estado_Civil">Estado Civil</label>
									              			<div class="controls">
									                			<input type="text" class="span3" name="Estado_Civil" required="required" disabled="true"
									                			value="<?php foreach ($estadoCivil as $value) {
												                      			if ($value->Id == $persona->Id_Estado_Civil){
												                      				echo $value->Nombre;
												                      			}
												                      } ?>" />
									              			</div> <!-- /controls -->       
									            		</div> <!-- /control-group -->

									            		<div class="control-group">                     
									              			<label class="control-label" for="L_Nacimiento">Lugar de Nacimiento</label>
									              			<div class="controls">
									                			<input type="text" class="span3" name="L_Nacimiento" required="required" disabled="true"
									                			value="<?php foreach ($estados as $value) {
												                      			if ($value->Id == $persona->Id_Estado){
												                      				echo $value->Nombre;
												                      			}
												                      } ?>" />
									              			</div> <!-- /controls -->       
									            		</div> <!-- /control-group -->

						                            </div>

						                            <div class="span6 form-horizontal">

						                            	<div class="control-group">                     
									              			<label class="control-label" for="Edad">Edad</label>
									              			<div class="controls">
									                			<input type="text" class="span3" name="Edad" required="required" disabled="true" value="<?php echo $edad; ?>" />
									              			</div> <!-- /controls -->       
									            		</div> <!-- /control-group -->

									            		<div class="control-group">                     
									              			<label class="control-label" for="Sexo">Sexo</label>
									              			<div class="controls">
									                			<input type="text" class="span3" name="Sexo" required="required" disabled="true" value="<?php echo $persona->Sexo ;?>" />
									              			</div> <!-- /controls -->       
									            		</div> <!-- /control-group -->

									            		<div class="control-group">                     
									              			<label class="control-label" for="Escolaridad">Escolaridad</label>
									              			<div class="controls">
									                			<input type="text" class="span3" name="Escolaridad" required="required" disabled="true"
									                			value="<?php foreach ($escolaridad as $value) {
												                      			if ($value->Id == $persona->Id_Escolaridad)
												                      				echo $value->Nombre;
												                      } ?>" />
									              			</div> <!-- /controls -->       
									            		</div> <!-- /control-group -->

									            		<div class="control-group">                     
									              			<label class="control-label" for="Ocupacion">Ocupación</label>
									              			<div class="controls">
									                			<input type="text" class="span3" name="Ocupacion" required="required" disabled="true" value="<?php echo $persona->Ocupacion; ?>" />
									              			</div> <!-- /controls -->       
									            		</div> <!-- /control-group -->

									            		<div class="control-group">                     
									              			<label class="control-label" for="Ingreso">Ingreso</label>
									              			<div class="controls">
									                			<input type="text" class="span3" name="Ingreso" required="required"/>
									              			</div> <!-- /controls -->       
									            		</div> <!-- /control-group -->

									            		<div class="control-group">                     
									              			<label class="control-label" for="T_Radicar">Tiempo de Radicar en el Estado</label>
									              			<div class="controls">
									                			<input type="text" class="span3" name="T_Radicar" required="required"/>
									              			</div> <!-- /controls -->       
									            		</div> <!-- /control-group -->

						                            </div><!-- /span6 --> 

												</div><!-- /span12 --> 
			                          		</div><!-- /accordion-inner --> 
			                        	</div><!-- /collapseOne -->
			                      	</div><!-- /accordion-group -->
			                      	

			                    </div> <!-- /accordion -->

						<div class="form-actions span11">
			            	<button id="guardar" type="submit" class="btn btn-primary btn-large span4 offset3">Guardar &nbsp; <span class="icon-save"></span></button> 
			            </div> <!-- /form-actions -->

					</fieldset>
				</form>

			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
	</div> <!-- /span8 -->
</div> <!-- /row -->

//Revisar los modales para los datos de la vista.

<div id="modal_solicitante" class="modal modal-xl hide fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
  	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 id="myModalLabel" class="blue bigger"><strong>Registro del Solicitante</strong></h3></br>
  	</div>
  	<form class="form-horizontal" method="post" id="datos_conyugue" action="<?php echo site_url('C_asistenciasocial/guardarEntrevista');?>">
		<fieldset>
		  	<div class="modal-body overflow-visible">
		  		<div class="span12">
    				<h4 class="blue bigger"><strong>Datos Personales</strong></h4></br>
    			</div>
		    	<div class="span6">

		        	<input type="hidden" name="Curp" value="<!-- <?php echo strtoupper($this->session->userdata('curpbuscada')) ;?> -->" />
		                  
		            <div class="control-group">                     
		              <label class="control-label" for="Nombre_S">Nombre(s)</label>
		              <div class="controls">
		                <input type="text" class="span3" name="Nombre_S" required="required" disabled="true" value="<?php //echo utf8_decode($persona[1]) ;?> " />
		                <input type="hidden" name="Nombre_S" value=" <?php //echo utf8_decode($persona[1]) ;?> " />
		              </div> <!-- /controls -->       
		            </div> <!-- /control-group -->

		            <div class="control-group">                     
		              <label class="control-label" for="Apellido_Paterno">Apellido Paterno</label>
		              <div class="controls">
		                <input type="text" class="span3" name="Apellido_Paterno" required="required" disabled="true" value="<?php //echo utf8_decode($persona[2]) ;?>" />
		                <input type="hidden" name="Apellido_Paterno" value=" <?php //echo utf8_decode($persona[2]) ;?> " />
		              </div> <!-- /controls -->       
		            </div> <!-- /control-group -->

		            <div class="control-group">                     
		              <label class="control-label" for="Apellido_Materno">Apellido Materno</label>
		              <div class="controls">
		                <input type="text" class="span3" name="Apellido_Materno" required="required" disabled="true" value="<?php //echo utf8_decode($persona[3]) ;?> " />
		                <input type="hidden" name="Apellido_Materno" value="<?php //echo utf8_decode($persona[3]) ;?>" />
		              </div> <!-- /controls -->       
		            </div> <!-- /control-group -->

		            <div class="control-group">                     
		              <label class="control-label" for="Estado">Lugar de Nacimiento</label>
		              <div class="controls">
		                <input type="text" class="span3" name="Estado" required="required" disabled="true" value="<?php //echo $persona[4]; ?>" />
		                <input type="hidden" name="Id_Estado" value="<?php //echo $idEstado[0]->Id; ?>" />
		              </div> <!-- /controls -->       
		            </div> <!-- /control-group -->

		            <div class="control-group">                     
		              <label class="control-label" for="Fecha_Nacimiento">Fecha de Nacimiento</label>
		              <div class="controls">
		                <input type="text" class="span3" name="Fecha_Nacimiento" required="required" disabled="true" value="<?php //echo $persona[5] ;?>" />
		                <input type="hidden" name="Fecha_Nacimiento" value="<?php //$date = str_replace('/', '-', $persona[5]); echo date("Y-m-d", strtotime($date));?>" />
		              </div> <!-- /controls -->       
		            </div> <!-- /control-group -->

				</div>
		        <div class="span6">

		            <div class="control-group">                     
		              <label class="control-label" for="Sexo">Sexo</label>
		              <div class="controls">
		                <input type="text" class="span3" name="Sexo" required="required" disabled="true" value="<?php //echo $persona[6] ;?>" />
		                <input type="hidden" name="Sexo" value="<?php //echo $persona[6] ;?>" />
		              </div> <!-- /controls -->       
		            </div> <!-- /control-group -->

		            <div class="control-group">                     
		              <label class="control-label" for="Nacionalidad">Nacionalidad</label>
		              <div class="controls">
		                <input type="text" class="span3" name="Nacionalidad" required="required" disabled="true" value="<?php //echo ($persona[7]=="MEX") ? "MEXICANA":$persona[7]; ?> " />
		                <input type="hidden" name="Nacionalidad" value="<?php //echo ($persona[7]=="MEX") ? "MEXICANA":$persona[7]; ?>" />
		              </div> <!-- /controls -->       
		            </div> <!-- /control-group -->

		            <div class="control-group">                     
		              <label class="control-label" for="Id_Estado_Civil">Estado Civil</label>
		              <div class="controls">
		                <select class="selectpicker show-tick form-control" name="Id_Estado_Civil" required="required">
		                  <?php foreach ($estadoCivil as $value) {
		                  echo '<option value="'.$value->Id.'">'.$value->Nombre.'</option>';
		                  } ?>
		                </select>
		              </div> <!-- /controls -->       
		            </div> <!-- /control-group -->

		            <div class="control-group">                     
		              <label class="control-label" for="Id_Escolaridad">Escolaridad</label>
		              <div class="controls">
		                <select class="selectpicker show-tick form-control" name="Id_Escolaridad" required="required">
		                  <?php foreach ($escolaridad as $value) {
		                  echo '<option value="'.$value->Id.'">'.$value->Nombre.'</option>';
		                  } ?>
		                </select>
		              </div> <!-- /controls -->       
		            </div> <!-- /control-group -->

		            <div class="control-group">                     
		              <label class="control-label" for="Ocupacion">Ocupación</label>
		              <div class="controls">
		                <input type="text" class="span3" name="Ocupacion" required="required"/>
		              </div> <!-- /controls -->       
		            </div> <!-- /control-group -->
    			</div>
    			</br></br>
    			<div class="span12">
    				<h4 class="blue bigger"><strong>Domicilio</strong></h4></br>
    			</div>
    			<div class="span6">
    				<div class="control-group">                     
                      <label class="control-label" for="Codigo_Postal">Codigo Postal</label>
                      <div class="controls">
                        <div class="input-append">
                          <input type="text" class="span2 m-wrap" name="Codigo_Postal" id="Codigo_Postal" required="required" />
                          <input type="hidden" name="Id_CP" id="Codigo_Postal_hidden" />
                          <button class="btn btn-warning" type="button" id="BuscarCP"><i class="icon-search"></i></button>
                        </div>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="Lada_Tel">Lada</label>
                      <div class="controls">
                        <input type="text" class="span1" name="Lada_Tel" />
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="Telefono">Telefono</label>
                      <div class="controls">
                        <input type="text" class="span2" name="Telefono" />
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="Lada_Fax">Lada</label>
                      <div class="controls">
                        <input type="text" class="span1" name="Lada_Fax" />
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="Fax">Fax</label>
                      <div class="controls">
                        <input type="text" class="span2" name="Fax" />
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="Tipo_Domicilio">Tipo de Domicilio</label>
                      <div class="controls">
                        <input type="text" class="span3" name="Tipo_Domicilio" id="Tipo_Domicilio" disabled="true" required="required"/>
                        <input type="hidden" name="Id_Tipo_Domicilio" id="Tipo_Domicilio_hidden"/>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="Id_Tipo_Vialidad">Tipo de Vialidad</label>
                      <div class="controls">
                        <select class="selectpicker show-tick form-control" name="Id_Tipo_Vialidad" required="required">
                          <?php foreach ($tipoVialidad as $value) {
                          echo '<option value="'.$value->Id.'">'.$value->Nombre.'</option>';
                        } ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="Nombre_Vialidad">Nombre Vialidad</label>
                      <div class="controls">
                        <input type="text" class="span3" name="Nombre_Vialidad" required="required" />
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="No_Ext1">No. Ext. 1</label>
                      <div class="controls">
                        <input type="text" class="span1" name="No_Ext1" required="required"/>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="No_Ext2">No. Ext. 2</label>
                      <div class="controls">
                        <input type="text" class="span1" name="No_Ext2" />
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
    			</div>
    			<div class="span6">
    				<div class="control-group">                     
                      <label class="control-label" for="No_Int">No. Int.</label>
                      <div class="controls">
                        <input type="text" class="span1" name="No_Int" />
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="Entre_Vialidades">Entre Vialidades</label>
                      <div class="controls">
                        <input type="text" class="span3" name="Entre_Vialidades" />
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="Vialidad_Posterior">Vialidad Posterior</label>
                      <div class="controls">
                        <input type="text" class="span3" name="Vialidad_Posterior" />
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="Descripcion_Ubicacion">Descripción de la Ubicación</label>
                      <div class="controls">
                        <input type="text" class="span3" name="Descripcion_Ubicacion" required="required"/>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="Tipo_Asentamiento">Tipo de Asentamiento</label>
                      <div class="controls">
                        <input type="text" class="span3" id="Tipo_Asentamiento" disabled="true" required="required" />
                        <input type="hidden" name="Id_Tipo_Asentamiento" id="Tipo_Asentamiento_hidden" />
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="Asentamiento">Nombre de Asentamiento</label>
                      <div class="controls">
                        <input type="text" class="span3" name="Asentamiento" id="Asentamiento" disabled="true" required="required" />
                        <input type="hidden" name="Id_Asentamiento" id="Asentamiento_hidden" />
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="Id_Localidad">Localidad</label>
                      <div class="controls">
                        <select class="selectpicker show-tick form-control" name="Id_Localidad" required="required">
                          <?php foreach ($localidades as $value) {
                            echo '<option value="'.$value->Id.'">'.utf8_decode($value->Nombre).'</option>';
                          } ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="Municipio">Municipio</label>
                      <div class="controls">
                        <input type="text" class="span3" name="Municipio" id="Municipio" disabled="true" required="required" />
                        <input type="hidden" name="Id_Municipio" id="Municipio_hidden" />
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="Estado">Estado</label>
                      <div class="controls">
                        <input type="text" class="span3" name="Estado" id="Estado" disabled="true" required="required" />
                        <input type="hidden" name="Id_Estado_Dom" id="Estado_hidden" />
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ProcedenciaSolicitud">¿Como llegaron al DIF?</label>
                      <div class="controls">
                        <select class="selectpicker show-tick form-control" name="ProcedenciaSolicitud" required="required">
                          <?php foreach ($procedencia as $value) {
                            echo '<option value="'.$value->Id.'">'.$value->Nombre.'</option>';
                          } ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
    			</div>


  			</div>
		  	<div class="modal-footer">
		    	<button type="button" class="btn btn-primary btn-large offset2" id="aceptar_conyugue">Guardar</button>
		  	</div>
    	</fieldset>
	</form>
</div>

<div id="modal_dependiente" class="modal modal-xl hide fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
  	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="myModalLabel" class="blue bigger"><strong>Registro de Hijos</strong></h4></br>
  	</div>
  	<div class="modal-body overflow-visible">
    	<div>
        	<table id="table_dependiente" class="table table-hover table-striped" cellspacing="0">
	          	<thead>
	            	<tr>
		              	<th>Nombre</th>
		              	<th>Edad</th>
		              	<th>Estado Civil</th>
		              	<th>Escolaridad</th>
		              	<th>Ocupacion</th>
	            	</tr>
	          	</thead>
	          	<tbody>
	            	<tr>
	            		<td>
	              			<input type="text" name="Nombre" />
	              		</td>
	              		<td>
	              			<input type="text" name="Edad" />
	              		</td>
	            		<td>
	              			<select class="selectpicker show-tick" name="Id_Estado_Civil">
		                      	<?php foreach ($estadoCivil as $value) {
		                      	echo '<option value="'.$value->Id.'">'.$value->Nombre.'</option>';
		                      	} ?>
		                    </select>
	              		</td>
	              		<td>
	              			<select class="selectpicker show-tick" name="Id_Escolaridad">
		                      	<?php foreach ($escolaridad as $value) {
		                      	echo '<option value="'.$value->Id.'">'.$value->Nombre.'</option>';
		                      	} ?>
		                    </select>
	              		</td>
	              		<td>
	              			<input type="text" name="Ocupacion" />
	              		</td>
	            	</tr>
	          	</tbody>
	        </table>
    	</div>                  
  	</div>
  	<div class="modal-footer">
    	<button type="button" class="btn btn-primary btn-large offset2" id="aceptar_dependiente">Agregar</button>
  	</div>
</div>


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

  function agregarDependiente()
  {
  	$("#modal_dependiente").modal('show');
  }

  function agregarConyuge()
  {
  	$("#modal_conyugue").modal('show');
  }

  function ajaxConyugue() {
    //Console.log($("#Nombre_Conyugue").val());
    if ($('#Search_Nombre_Conyugue').val() != '' && $('#Search_Nombre_Conyugue').val() != ' ') {
      setTimeout(function(){
        $.ajax({
          type    : 'POST',
          url     : "<?php echo site_url("C_asistenciasocial/buscarPersona") ?>",
          data    : {Nombre_Conyugue: $("#Search_Nombre_Conyugue").val()},
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
    $('#Id_conyugue').val($idPersona);
    $.ajax({
      type : 'POST',
      url : "<?php echo site_url("C_asistenciasocial/busquedaPersona/") ?>"+$idPersona,
      //data :$("#datosmanual").serialize(),
      dataType: 'json',
      success : function(data) {
        console.log(data);
        $("#Id_conyugue").val(data.persona.Id);
        $("#Nombre_Conyuge").val(Utf8.decode(data.persona.Nombre_S + " " + data.persona.Apellido_Materno + " " + data.persona.Apellido_Materno));
        $("#Domicilio_Conyuge").val(Utf8.decode(data.domicilio[0].Tipo_Vialidad + " " + data.domicilio[0].Nombre_Vialidad + " " + data.domicilio[0].No_Ext1 + " " + data.domicilio[0].Tipo_Asentamiento + " " + data.domicilio[0].Asentamiento + " " + data.domicilio[0].Municipio + " " + data.domicilio[0].Estado));
        $("#Telefono_Conyuge").val(data.domicilio[0].Lada_Tel + " " + data.domicilio[0].Telefono);
        data.estadoCivil.forEach(function(element){
        	if (element.Id == data.persona.Id_Estado_Civil) {
        		$("#Estado_Civil_Conyuge").val(element.Nombre);
        	}
        });
        $("#Edad_Conyuge").val(data.edad);
        $("#Sexo_Conyuge").val(data.persona.Sexo);
        data.escolaridad.forEach(function(element){
        	if (element.Id == data.persona.Id_Escolaridad) {
        		$("#Escolaridad_Conyuge").val(element.Nombre);
        	}
        });
        $("#Ocupacion_Conyuge").val(data.persona.Ocupacion);
      },
      error : function(jqXHR, textStatus, errorThrown) {
        alert('Error ' + jqXHR +textStatus + errorThrown);
      }
    });
    $("#searchResults").hide();
  }

  function buscarCURP(e)
  {
    var value = $("#CurpSearch").val();
    if (value == null ) { value = 0 ;}
    if (value == 0) {
    	alert("Debe colocar la CURP para su Busqueda");
    }
    else {
	    e.preventDefault();
	    $.ajax({
	      type : 'GET',
	      //Modificar por la Busqueda de la CURP
	      url : "<?php echo site_url("C_asistenciasocial/CurpSearch") ?>"+"/"+value,
	      dataType: 'json',
	      success : function(data) {
	        console.log(data);
	        //Realizar funcion exclusiva para este apartado en C_asistenciasocial
	        //Realizar el llenado de los campos con los datos devueltos por la CURP.
	        if (data == false) {
	        	//Buscar en el webservice y lanzar modal.
	        }else{
		        $("#Id_conyugue").val(data.persona.Id);
		        $("#Nombre_Conyuge").val(Utf8.decode(data.persona.Nombre_S + " " + data.persona.Apellido_Materno + " " + data.persona.Apellido_Materno));
		        $("#Domicilio_Conyuge").val(Utf8.decode(data.domicilio[0].Tipo_Vialidad + " " + data.domicilio[0].Nombre_Vialidad + " " + data.domicilio[0].No_Ext1 + " " + data.domicilio[0].Tipo_Asentamiento + " " + data.domicilio[0].Asentamiento + " " + data.domicilio[0].Municipio + " " + data.domicilio[0].Estado));
		        $("#Telefono_Conyuge").val(data.domicilio[0].Lada_Tel + " " + data.domicilio[0].Telefono);
		        data.estadoCivil.forEach(function(element){
		        	if (element.Id == data.persona.Id_Estado_Civil) {
		        		$("#Estado_Civil_Conyuge").val(element.Nombre);
		        	}
		        });
		        $("#Edad_Conyuge").val(data.edad);
		        $("#Sexo_Conyuge").val(data.persona.Sexo);
		        data.escolaridad.forEach(function(element){
		        	if (element.Id == data.persona.Id_Escolaridad) {
		        		$("#Escolaridad_Conyuge").val(element.Nombre);
		        	}
		        });
		        $("#Ocupacion_Conyuge").val(data.persona.Ocupacion);
		    }
	      },
	      error : function(jqXHR, textStatus, errorThrown) {
	        console.log('Error ' + jqXHR +textStatus + errorThrown);
	      }
	    });
    }
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

  function home(e){
    window.location = "<?php echo site_url().'/C_ventanilla/ventanilla';?>";
  }

  function domicilio(e){
    window.location = "<?php echo site_url().'/C_ventanilla/domicilio';?>";
  }
</script>
	