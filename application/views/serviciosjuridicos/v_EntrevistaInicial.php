	
<div class="row">
	<div class="span13">      		
		<div class="widget ">
			<div class="widget-header">
				<i class="icon-user"></i>
				<h3>Asistencia Social  <small><?php echo strtoupper($this->session->userdata('curpbuscada')); ?></small></h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">

				<h4>Entrevista Inicial</h4>

				<br />

				<form method="post" id="datos" action="<?php echo site_url('C_asistenciasocial/guardarEntrevista');?>">
					<fieldset>

						<div class="span5 form-horizontal">
							<div class="control-group">                     
                      			<label class="control-label" for="Folio">Folio</label>
                      			<div class="controls">
                        			<input type="text" class="span3" name="Folio" />
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
			                          		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">Datos Personales</a>
			                        	</div>
			                        	<div id="collapseOne" class="accordion-body collapse in">
			                          		<div class="accordion-inner">

			                          			<input type="hidden" name="Id_Persona" id="Id_Persona" value="<?php echo $this->session->userdata('idPersona'); ?>" />

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
					                            </div>

					                            <br />

					                            <table id="example" class="table table-hover table-striped" cellspacing="0" width="100%">
										          	<thead>
										            	<tr>
										              		<th>Consume</th>
										              		<th>Frecuencia de Consumo</th>
										            	</tr>
										          	</thead>
										          	<tbody>
										            	<tr>
										            		<td>Tabaco</td>
										              		<td>
											              		<select class="selectpicker show-tick form-control" name="Frecuencia_Tabaco">
											                      <?php foreach ($consumo as $value) {
											                      echo '<option value="'.$value->Id.'">'.$value->Nombre.'</option>';
											                      } ?>
											                    </select>
										                    </td>
										            	</tr>
										            	<tr>
										            		<td>Alcohol</td> 
										              		<td>
										              			<select class="selectpicker show-tick form-control" name="Frecuencia_Alcohol">
											                      <?php foreach ($consumo as $value) {
											                      echo '<option value="'.$value->Id.'">'.$value->Nombre.'</option>';
											                      } ?>
											                    </select>
										              		</td>
										            	</tr>
										            	<tr>
										            		<td>Drogas</td> 
										              		<td>
										              			<select class="selectpicker show-tick form-control" name="Frecuencia_Drogas">
											                      <?php foreach ($consumo as $value) {
											                      echo '<option value="'.$value->Id.'">'.$value->Nombre.'</option>';
											                      } ?>
											                    </select>
										              		</td>
										            	</tr>
										          	</tbody>
										        </table>

			                          		</div>
			                        	</div>
			                      	</div>

			                      	<div class="accordion-group">
			                        	<div class="accordion-heading">
			                          		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">Datos del Conyuge</a>
			                        	</div>
			                        	<div id="collapseTwo" class="accordion-body collapse">
			                          		<div class="accordion-inner">

			                          			<input type="hidden" name="Id_conyugue" id="Id_conyugue" value="0" />

			                          			<div class="span12 form-horizontal">
													<button id="Nuevo_conyuge" class="btn btn-warning span4 offset3">Registrar &nbsp;<span class="icon-plus-sign"></span></button>
												</div>

												<br /><br />

			                          			<div class="span5 form-horizontal">
													<div class="control-group">                     
									              		<label class="control-label" for="CurpSearch">Busqueda por CURP</label>
									              		<div class="controls">
									                		<div class="input-append">
									                  			<input type="text" class="span3 m-wrap" name="CurpSearch" id="CurpSearch" required="required" />
									                  			<a id="btnbuscarCURP" class="btn btn-warning" type="submit" ><i class="icon-search"></i></a>
									                		</div>
									              		</div> <!-- /controls -->       
									            	</div> <!-- /control-group -->

									            	<div id="error" class="controls" style="display:none;">
											            <label id="etiqueta" style="color:red"><strong>prueba</strong></label>
													</div> <!-- /controls -->
									            </div>

									            <div class="span6 form-horizontal">
									            	<div class="control-group">                     
									              		<label class="control-label" for="Search_Nombre_Conyugue">Busqueda en DIF</label>
									              		<div class="controls">
															<input type="text" class="span4" name="Search_Nombre_Conyugue" id="Search_Nombre_Conyugue" autofocus />
															<br />
														</div> <!-- /controls -->

														<div class="controls">
					                                      	<div class="btn-group">
					                                      		<ul class="dropdown-menu" id="searchResults"></ul>
					                                    	</div>
					                                    </div> <!-- /controls -->       
									            	</div> <!-- /control-group -->

									            </div>

			                          			<div class="span5 form-horizontal">

					                            	<div class="control-group">                     
								              			<label class="control-label" for="Nombre_Conyuge">Nombre</label>
								              			<div class="controls">
								                			<input type="text" class="span3" id="Nombre_Conyuge" name="Nombre_Conyuge" disabled="true" />
								              			</div> <!-- /controls -->       
								            		</div> <!-- /control-group -->

								            		<div class="control-group">                     
								              			<label class="control-label" for="Domicilio_Conyuge">Domicilio</label>
								              			<div class="controls">
								                			<input type="text" class="span3" id="Domicilio_Conyuge" name="Domicilio_Conyuge" disabled="true" />
								              			</div> <!-- /controls -->       
								            		</div> <!-- /control-group -->

								            		<div class="control-group">                     
								              			<label class="control-label" for="Telefono_Conyuge">Telefono</label>
								              			<div class="controls">
								                			<input type="text" class="span3" id="Telefono_Conyuge" name="Telefono_Conyuge" disabled="true" />
								              			</div> <!-- /controls -->       
								            		</div> <!-- /control-group -->

								            		<div class="control-group">                     
								              			<label class="control-label" for="Estado_Civil_Conyuge">Estado Civil</label>
								              			<div class="controls">
								                			<input type="text" class="span3" id="Estado_Civil_Conyuge" name="Estado_Civil_Conyuge" disabled="true" />
								              			</div> <!-- /controls -->       
								            		</div> <!-- /control-group -->

					                            </div>
					                            <div class="span6 form-horizontal">

					                            	<div class="control-group">                     
								              			<label class="control-label" for="Edad_Conyuge">Edad</label>
								              			<div class="controls">
								                			<input type="text" class="span3" id="Edad_Conyuge" name="Edad_Conyuge" disabled="true" />
								              			</div> <!-- /controls -->       
								            		</div> <!-- /control-group -->

								            		<div class="control-group">                     
								              			<label class="control-label" for="Sexo_Conyuge">Sexo</label>
								              			<div class="controls">
								                			<input type="text" class="span3" id="Sexo_Conyuge" name="Sexo_Conyuge" disabled="true" />
								              			</div> <!-- /controls -->       
								            		</div> <!-- /control-group -->

								            		<div class="control-group">                     
								              			<label class="control-label" for="Escolaridad_Conyuge">Escolaridad</label>
								              			<div class="controls">
								                			<input type="text" class="span3" id="Escolaridad_Conyuge" name="Escolaridad_Conyuge" disabled="true" />
								              			</div> <!-- /controls -->       
								            		</div> <!-- /control-group -->

								            		<div class="control-group">                     
								              			<label class="control-label" for="Ocupacion_Conyuge">Ocupación</label>
								              			<div class="controls">
								                			<input type="text" class="span3" id="Ocupacion_Conyuge" name="Ocupacion_Conyuge" disabled="true" />
								              			</div> <!-- /controls -->       
								            		</div> <!-- /control-group -->

								            		<div class="control-group">                     
								              			<label class="control-label" for="Ingreso_Conyuge">Ingreso</label>
								              			<div class="controls">
								                			<input type="text" class="span3" id="Ingreso_Conyuge" name="Ingreso_Conyuge" required="required" />
								              			</div> <!-- /controls -->       
								            		</div> <!-- /control-group -->
					                            </div>

					                            <br />

					                            <table id="example_Conyuge" class="table table-hover table-striped" cellspacing="0" width="100%">
										          	<thead>
										            	<tr>
										              		<th>Consume</th>
										              		<th>Frecuencia de Consumo</th>
										            	</tr>
										          	</thead>
										          	<tbody>
										            	<tr>
										            		<td>Tabaco</td> 
										              		<td>
										              			<select class="selectpicker show-tick form-control" name="Frecuencia_Tabaco_Conyuge">
											                      <?php foreach ($consumo as $value) {
											                      echo '<option value="'.$value->Id.'">'.$value->Nombre.'</option>';
											                      } ?>
											                    </select>
										              		</td>
										            	</tr>
										            	<tr>
										            		<td>Alcohol</td> 
										              		<td>
										              			<select class="selectpicker show-tick form-control" name="Frecuencia_Alcohol_Conyuge">
											                      <?php foreach ($consumo as $value) {
											                      echo '<option value="'.$value->Id.'">'.$value->Nombre.'</option>';
											                      } ?>
											                    </select>
										              		</td>
										            	</tr>
										            	<tr>
										            		<td>Drogas</td>
										              		<td>
										              			<select class="selectpicker show-tick form-control" name="Frecuencia_Drogas_Conyuge">
											                      <?php foreach ($consumo as $value) {
											                      echo '<option value="'.$value->Id.'">'.$value->Nombre.'</option>';
											                      } ?>
											                    </select>
										              		</td>
										            	</tr>
										          	</tbody>
										        </table>
			                            		
			                          		</div>
			                        	</div>
			                      	</div>

			                      	<div class="accordion-group">
			                        	<div class="accordion-heading">
			                          		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">Hijos bajo su dependencia</a>
			                        	</div>
			                        	<div id="collapseThree" class="accordion-body collapse">
			                          		<div class="accordion-inner">
					                            
					                            <br />

					                            <div class="span12">
													<a id="Nuevo_dependiente" class="btn btn-warning span4 offset3">Agregar &nbsp;<span class="icon-plus-sign"></span></a>
												</div>

												<input type="hidden" name="Dependientes" id="Dependientes" />

					                            <table id="example_dependiente" class="table table-hover table-striped" cellspacing="0" width="100%">
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

										          	</tbody>
										        </table>
			                            		
			                          		</div>
			                        	</div>
			                      	</div>

			                      	<div class="accordion-group">
			                        	<div class="accordion-heading">
			                          		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">Hechos que motivaron la solicitud del servicio</a>
			                        	</div>
			                        	<div id="collapseFour" class="accordion-body collapse">
			                          		<div class="accordion-inner">
					                            
					                            <br />

						              			<div class="controls">
						                			<textarea class="span11" name="Hechos" cols="70" rows="7"></textarea>
						              			</div> <!-- /controls -->       

			                          		</div>
			                        	</div>
			                      	</div>

			                      	<div class="accordion-group">
			                        	<div class="accordion-heading">
			                          		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">Observaciones</a>
			                        	</div>
			                        	<div id="collapseFive" class="accordion-body collapse">
			                          		<div class="accordion-inner">
					                            
					                            <br />

						              			<div class="controls">
						                			<textarea class="span11" name="Observaciones" cols="70" rows="7"></textarea>
						              			</div> <!-- /controls -->       

			                          		</div>
			                        	</div>
			                      	</div>

			                    </div> <!-- /accordion -->
							</div> <!-- /controls -->	
						</div> <!-- /control-group -->

						<div class="form-actions span11">
			            	<button id="guardar" type="submit" class="btn btn-primary btn-large span4 offset3">Guardar &nbsp; <span class="icon-save"></span></button> 
			            </div> <!-- /form-actions -->

					</fieldset>
				</form>

			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
	</div> <!-- /span8 -->
</div> <!-- /row -->

<div id="modal_conyugue" class="modal modal-xl hide fade" tabindex="-1" aria-labelledby="myModalLabel_conyugue" aria-hidden="true" style="display: block;">
  	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 id="myModalLabel_conyugue" class="blue bigger"><strong>Registro del Conyugue</strong></h3></br>
  	</div>
  	<form class="form-horizontal" method="post" id="datos_conyugue">
		<fieldset>
		  	<div class="modal-body overflow-visible">
		  		<div class="span12">
		  			<div class="widget ">
                  		<div class="widget-header">
                    		<i class="icon-user"></i>
                    		<h3>Datos Personales</h3>
                  		</div>
                  		<div class="widget-content">
    			
					    	<div class="span5">

					        	<input type="hidden" name="Curp" id="Curp" value="ABCD012345EFGHIJ67" />

					        	<input type="hidden" id="bandera_conyugue" value="1" />
					                  
					            <div class="control-group">                     
					              <label class="control-label" for="Nombre_S">Nombre(s)</label>
					              <div class="controls">
					                <input type="text" class="span3" id="Nombre_S" name="Nombre_S" required="required" disabled="true" />
					                <input type="hidden" id="Nombre_S_h" name="Nombre_S" />
					              </div> <!-- /controls -->       
					            </div> <!-- /control-group -->

					            <div class="control-group">                     
					              <label class="control-label" for="Apellido_Paterno">Apellido Paterno</label>
					              <div class="controls">
					                <input type="text" class="span3" id="Apellido_Paterno" name="Apellido_Paterno" required="required" disabled="true" />
					                <input type="hidden" id="Apellido_Paterno_h" name="Apellido_Paterno" />
					              </div> <!-- /controls -->       
					            </div> <!-- /control-group -->

					            <div class="control-group">                     
					              <label class="control-label" for="Apellido_Materno">Apellido Materno</label>
					              <div class="controls">
					                <input type="text" class="span3" id="Apellido_Materno" name="Apellido_Materno" required="required" disabled="true" />
					                <input type="hidden" id="Apellido_Materno_h" name="Apellido_Materno" />
					              </div> <!-- /controls -->       
					            </div> <!-- /control-group -->

					            <div id="Nac_sinCurp" class="control-group">                     
					              <label class="control-label" for="Id_Estado">Lugar de Nacimiento</label>
					              <div class="controls">
					                <select class="selectpicker show-tick form-control" name="Id_Estado" required="required">
					                  <?php foreach ($estados as $value) {
					                  echo '<option value="'.$value->Id.'">'.$value->Nombre.'</option>';
					                  } ?>
					                </select>
					              </div> <!-- /controls -->       
					            </div> <!-- /control-group -->

					            <div id="Nac_conCurp" class="control-group">                     
					              <label class="control-label" for="Estado">Lugar de Nacimiento</label>
					              <div class="controls">
					                <input type="text" class="span3" id="Estado" name="Estado" required="required" disabled="true" />
					                <input type="hidden" id="Id_Estado_h" name="Id_Estado" />
					              </div> <!-- /controls -->       
					            </div> <!-- /control-group -->

					            <div class="control-group">                     
					              <label class="control-label" for="Fecha_Nacimiento">Fecha de Nacimiento</label>
					              <div class="controls">
					                <input type="text" class="span3" id="Fecha_Nacimiento" name="Fecha_Nacimiento" required="required" disabled="true" value="<?php //echo $persona[5] ;?>" />
					                <input type="hidden" id="Fecha_Nacimiento_h" name="Fecha_Nacimiento" value="<?php //$date = str_replace('/', '-', $persona[5]); echo date("Y-m-d", strtotime($date));?>" />
					              </div> <!-- /controls -->       
					            </div> <!-- /control-group -->

							</div>
					        <div class="span5">

					            <div class="control-group">                     
					              <label class="control-label" for="Sexo">Sexo</label>
					              <div class="controls">
					                <input type="text" class="span3" id="Sexo" name="Sexo" required="required" disabled="true" />
					                <input type="hidden" id="Sexo_h" name="Sexo" />
					              </div> <!-- /controls -->       
					            </div> <!-- /control-group -->

					            <div class="control-group">                     
					              <label class="control-label" for="Nacionalidad">Nacionalidad</label>
					              <div class="controls">
					                <input type="text" class="span3" id="Nacionalidad" name="Nacionalidad" required="required" disabled="true" />
					                <input type="hidden" id="Nacionalidad_h" name="Nacionalidad" />
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
			    		</div>
		    		</div>
		    	</div>

    			<div class="span12">
    				<div class="widget">
                  		<div class="widget-header">
                    		<i class="icon-map-marker"></i>
                    		<h3>Domicilio</small></h3>
                  		</div>
                  		<div class="widget-content">
  
			    			<div class="span5">
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
			    			<div class="span5">
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
		    		</div>
		    	</div>

  			</div>
		  	<div class="modal-footer">
		    	<button type="button" class="btn btn-primary btn-large offset2" id="aceptar_conyugue">Guardar</button>
		  	</div>
    	</fieldset>
	</form>
</div>

<div id="fases" class="modal modal-xl hide fade" tabindex="-3" aria-labelledby="myModalLabel_fases" aria-hidden="true" style="display: block;">
  	<div class="modal-header alert-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="myModalLabel_fases" class="blue bigger"><strong>Selecciona el Codigo Postal:</strong></h4></br>
  	</div>
  	<div class="modal-body overflow-visible">
    	<div class="span12">
        	<table id="example_CP" class="table table-hover table-striped" cellspacing="0" width="100%">
	          	<thead>
	            	<tr>
	              		<th>Tipo de Domicilio</th>
	              		<th>Codigo Postal</th>
	              		<th>Tipo de Asentamiento</th>
	              		<th>Asentamiento</th>
	              		<th>Municipio</th>
	              		<th>Estado</th>
	            	</tr>
	          	</thead>
	          	<tbody>
	            	<tr>
	              		<td><button class="btn btn-warning form-control fase" href="#fases" data-toggle="modal">Continuar <span class="icon-signin"></span></button></td>
	            	</tr>
	          	</tbody>
        	</table>
    	</div>                  
  	</div>
</div>

<div id="modal_dependiente" class="modal modal-xl hide fade" tabindex="-1" aria-labelledby="myModalLabel_dependiente" aria-hidden="true" style="display: block;">
  	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="myModalLabel_dependiente" class="blue bigger"><strong>Registro de Hijos</strong></h4></br>
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
	              			<input type="text" id="Nombre_dependiente" name="Nombre" />
	              		</td>
	              		<td>
	              			<input type="text" id="Edad_dependiente" name="Edad" />
	              		</td>
	            		<td>
	              			<select class="selectpicker show-tick" id="Estado_Civil_dependiente" name="Id_Estado_Civil">
		                      	<?php foreach ($estadoCivil as $value) {
		                      	echo '<option value="'.$value->Id.'">'.$value->Nombre.'</option>';
		                      	} ?>
		                    </select>
	              		</td>
	              		<td>
	              			<select class="selectpicker show-tick" id="Escolaridad_dependiente" name="Id_Escolaridad">
		                      	<?php foreach ($escolaridad as $value) {
		                      	echo '<option value="'.$value->Id.'">'.$value->Nombre.'</option>';
		                      	} ?>
		                    </select>
	              		</td>
	              		<td>
	              			<input type="text" id="Ocupacion_dependiente" name="Ocupacion" />
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

<div id="modal_aceptar" class="modal hide fade" tabindex="-1" aria-labelledby="myModalLabel">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal">&times;</button>
    	<h4 id="myModalLabel" class="blue bigger"></h4></br>
  	</div>
  	<div class="modal-footer">
    	<button type="button" class="btn btn-primary btn-large offset2" id="aceptar">Aceptar</button>
  	</div>
</div>


<script type="text/javascript">
	var band = false;
  $(document).on("ready",inicio);

  function inicio(){
  	$("#Nuevo_dependiente").on("click", agregarDependiente);
  	$("#Nuevo_conyuge").on("click", agregarConyuge);
    $("#btnbuscarCURP").on("click", buscarCURP);
    $("#Search_Nombre_Conyugue").focus(function(){
      $(this).select();
    });
    $('#Search_Nombre_Conyugue').keyup(ajaxConyugue);
    $("#BuscarCP").on("click",buscarCodPos);
    $("#aceptar_conyugue").on("click",guardarConyuge);
    $("#aceptar_dependiente").on("click",registrarDependiente);
    $("#aceptar").on("click",home);
    $("#guardar").on("click",guardarEntrevista);
  }

  function agregarDependiente()
  {
  	$("#modal_dependiente").modal('show');
  }

  function agregarConyuge()
  {
  	$("#bandera_conyugue").val(2);
	conyugueSinCurp();
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
	        if (data == false) {
	        	$.ajax({
		        	type    : 'GET',
		        	url     : "<?php echo site_url("C_asistenciasocial/busquedaCurp/") ?>"+value,
		        	dataType: 'json',
			        success : function(data_second) {
			        	if (data_second == false) {
			        		$("#bandera_conyugue").val(2);
			        		conyugueSinCurp();
			        		$("#modal_conyugue").modal('show');
			        	}else{
			        		console.log(data_second);
			        		$("#bandera_conyugue").val(1);
			        		conyugueNuevo();
			        		$("#Curp").val(data_second.persona[0]);
			        		$("#Nombre_S").val(data_second.persona[1]);
			        		$("#Nombre_S_h").val(data_second.persona[1]);
			        		$("#Apellido_Paterno").val(data_second.persona[2]);
			        		$("#Apellido_Paterno_h").val(data_second.persona[2]);
			        		$("#Apellido_Materno").val(data_second.persona[3]);
			        		$("#Apellido_Materno_h").val(data_second.persona[3]);
			        		$("#Estado").val(data_second.persona[4]);
			        		$("#Id_Estado_h").val(data_second.idEstado[0].Id);
			        		$("#Fecha_Nacimiento").val(data_second.persona[5]);
			        		var Fecha_N = data_second.persona[5].split('/');
			        		$("#Fecha_Nacimiento_h").val(Fecha_N[2] + '-' + Fecha_N[1] + '-' + Fecha_N[0]);
			        		$("#Sexo").val(data_second.persona[6]);
			        		$("#Sexo_h").val(data_second.persona[6]);
			        		var Nacionalidad;
			        		if (data_second.persona[7]=="MEX"){Nacionalidad = "MEXICANA";}else{Nacionalidad = data_second.persona[7];}
			        		$("#Nacionalidad").val(Nacionalidad);
			        		$("#Nacionalidad_h").val(Nacionalidad);
			        		$("#modal_conyugue").modal('show');
			        	}
			        },
			        error : function(jqXHR, textStatus, errorThrown) {
			            alert('Error ' + jqXHR +textStatus + errorThrown);
			        }
		        });
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

  function selectCP(td,ta,id,idta,idtd,ida,idm,ide,cp,a,m,e){
    $("#Tipo_Domicilio").val(td);
    $("#Tipo_Asentamiento").val(ta);
    $("#Asentamiento").val(a);
    $("#Municipio").val(m);
    $("#Estado").val(e);
    $("#Codigo_Postal").val(cp);
    $("#Tipo_Domicilio_hidden").val(idtd);
    $("#Tipo_Asentamiento_hidden").val(idta);
    $("#Asentamiento_hidden").val(ida);
    $("#Municipio_hidden").val(idm);
    $("#Estado_hidden").val(ide);
    $("#Codigo_Postal_hidden").val(id);
    $("#fases").modal('hide');
    $("#modal_conyugue").modal('show');
  }
  function buscarCodPos(e)
  {
    var value = $("#Codigo_Postal").val();
    if (value == null ) { value = 0;}
    e.preventDefault();
    $.ajax({
      type : 'GET',
      url : "<?php echo site_url("C_ventanilla/buscarCodigoPostal") ?>"+"?Codigo_Postal="+value,
      //data : ajax_data,
      dataType: 'json',
      success : function(data) {
        console.log(data);
        var $tabla = $("#example_CP");
        $tabla.find("tr:gt(0)").remove();
        if (data == true) {
          $tabla.append(
            '<tr><td colspan="6" align="center"><h1>No se encontró el Codigo Postal</h1></td></tr>');
        }else{
          for (var idx in data.codigopostal){
            $tabla.append(
              "<tr><td>" + data.codigopostal[idx].Tipo_Domicilio + 
              "</td><td>" + data.codigopostal[idx].Codigo_Postal + 
              "</td><td>" + data.codigopostal[idx].Tipo_Asentamiento + 
              "</td><td>" + data.codigopostal[idx].Asentamiento + 
              "</td><td>" + data.codigopostal[idx].Municipio +
              "</td><td>" + data.codigopostal[idx].Estado + 
              '</td><td><button class="btn btn-warning form-control fase" onclick="'+"selectCP('"
              + data.codigopostal[idx].Tipo_Domicilio + 
              "','" + data.codigopostal[idx].Tipo_Asentamiento +
              "','" + data.codigopostal[idx].Id +
              "','" + data.codigopostal[idx].Id_Tipo_Asentamiento +
              "','" + data.codigopostal[idx].Id_Tipo_Domicilio +
              "','" + data.codigopostal[idx].Id_Asentamiento +
              "','" + data.codigopostal[idx].Id_Municipio +
              "','" + data.codigopostal[idx].Id_Estado +
              "','" + data.codigopostal[idx].Codigo_Postal +
              "','" + data.codigopostal[idx].Asentamiento +
              "','" + data.codigopostal[idx].Municipio +
              "','" + data.codigopostal[idx].Estado +"')"+'" href="#" data-toggle="modal" >Seleccionar <span class="glyphicon glyphicon-check"></span></button></td></tr>'); 
          }
        }
        $("#modal_conyugue").modal('hide');        
        $("#fases").modal('show');
      },
      error : function(jqXHR, textStatus, errorThrown) {
        console.log('Error ' + jqXHR +textStatus + errorThrown);
      }
    });
  }

  function guardarConyuge(e)
  {
  	var bandera = $("#bandera_conyugue").val();
	e.preventDefault();
    $.ajax({
      type : 'POST',
      url : "<?php echo site_url("C_asistenciasocial/guardarConyugue/") ?>",
      data :$("#datos_conyugue").serialize(),
      dataType: 'json',
      success : function(data) {
        console.log(data);
        if (bandera != 1){
	        $("#Id_conyugue").val(data);
	        $("#Nombre_Conyuge").val("NUEVO REGISTRO SIN CURP");
	        $("#Domicilio_Conyuge").val("NUEVO REGISTRO SIN CURP");
	        $("#Telefono_Conyuge").val("NUEVO REGISTRO SIN CURP");
	        $("#Estado_Civil_Conyuge").val("NUEVO REGISTRO SIN CURP");
	        $("#Edad_Conyuge").val("NUEVO REGISTRO SIN CURP");
	        $("#Sexo_Conyuge").val("NUEVO REGISTRO SIN CURP");
	        $("#Escolaridad_Conyuge").val("NUEVO REGISTRO SIN CURP");
	        $("#Ocupacion_Conyuge").val("NUEVO REGISTRO SIN CURP");
	        $("#myModalLabel").text("Registro del Conyuge realizado correctamente");
	        $("#modal_aceptar").modal('show');
	        $("#modal_conyugue").modal('hide');
	        //Opcion 2 para que aparezcan los datos
	        //seleccionarPersona(data);
        }else{
        	$("#Id_conyugue").val(data);
	        $("#Nombre_Conyuge").val("NUEVO REGISTRO");
	        $("#Domicilio_Conyuge").val("NUEVO REGISTRO");
	        $("#Telefono_Conyuge").val("NUEVO REGISTRO");
	        $("#Estado_Civil_Conyuge").val("NUEVO REGISTRO");
	        $("#Edad_Conyuge").val("NUEVO REGISTRO");
	        $("#Sexo_Conyuge").val("NUEVO REGISTRO");
	        $("#Escolaridad_Conyuge").val("NUEVO REGISTRO");
	        $("#Ocupacion_Conyuge").val("NUEVO REGISTRO");
	        $("#myModalLabel").text("Registro del Conyuge realizado correctamente");
	        $("#modal_aceptar").modal('show');
	        $("#modal_conyugue").modal('hide');
	        //Opcion 2 para que aparezcan los datos
	        //seleccionarPersona(data);
        }
      },
      error : function(jqXHR, textStatus, errorThrown) {
        alert('Error ' + jqXHR +textStatus + errorThrown);
      }
    });	
  }

  function conyugueSinCurp(){
  	$("#Nombre_S").prop('disabled', false);
	$("#Nombre_S_h").prop('disabled', true);
	$("#Apellido_Paterno").prop('disabled', false);
	$("#Apellido_Paterno_h").prop('disabled', true);
	$("#Apellido_Materno").prop('disabled', false);
	$("#Apellido_Materno_h").prop('disabled', true);
	$("#Estado").prop('disabled', true);
	$("#Id_Estado_h").prop('disabled', true);
	$("#Fecha_Nacimiento").prop('disabled', false);
	$("#Fecha_Nacimiento_h").prop('disabled', true);
	$("#Sexo").prop('disabled', false);
	$("#Sexo_h").prop('disabled', true);
	$("#Nacionalidad").prop('disabled', false);
	$("#Nacionalidad_h").prop('disabled', true);
	$("#Curp").val("ABCD012345EFGHIJ67");
	$("#Nombre_S").val("");
	$("#Nombre_S_h").val("");
	$("#Apellido_Paterno").val("");
	$("#Apellido_Paterno_h").val("");
	$("#Apellido_Materno").val("");
	$("#Apellido_Materno_h").val("");
	$("#Estado").val("");
	$("#Id_Estado_h").val("");
	$("#Fecha_Nacimiento").val("");
	$("#Fecha_Nacimiento_h").val("");
	$("#Sexo").val("");
	$("#Sexo_h").val("");
	$("#Nacionalidad").val("");
	$("#Nacionalidad_h").val("");
	$("#Nac_conCurp").prop('disabled',true);
	$("#Nac_conCurp").hide();
	$("#Nac_sinCurp").show();
  }

  function conyugueNuevo(){
  	$("#Nombre_S").prop('disabled', true);
	$("#Nombre_S_h").prop('disabled', false);
	$("#Apellido_Paterno").prop('disabled', true);
	$("#Apellido_Paterno_h").prop('disabled', false);
	$("#Apellido_Materno").prop('disabled', true);
	$("#Apellido_Materno_h").prop('disabled', false);
	$("#Estado").prop('disabled', true);
	$("#Id_Estado_h").prop('disabled', false);
	$("#Fecha_Nacimiento").prop('disabled', true);
	$("#Fecha_Nacimiento_h").prop('disabled', false);
	$("#Sexo").prop('disabled', true);
	$("#Sexo_h").prop('disabled', false);
	$("#Nacionalidad").prop('disabled', true);
	$("#Nacionalidad_h").prop('disabled', false);
	$("#Nac_sinCurp").prop('disabled',true);
	$("#Nac_sinCurp").hide();
	$("#Nac_conCurp").show();
  }

  function home(e){
   $("#modal_aceptar").modal('hide');
   if (band = true) {
   	window.location = "<?php echo site_url().'/C_serviciosjuridicos/index';?>";
   }
  }

  function registrarDependiente(){
    var Nombre_dependiente = $("#Nombre_dependiente").val();
    var Edad_dependiente = $("#Edad_dependiente").val();
    var Estado_Civil_dependiente = $("#Estado_Civil_dependiente option:selected").html();
    var Escolaridad_dependiente = $("#Escolaridad_dependiente option:selected").html();
    var Id_Estado_Civil_dependiente = $("select[id=Estado_Civil_dependiente]").val();
    var Id_Escolaridad_dependiente = $("select[id=Escolaridad_dependiente]").val();
    var Ocupacion_dependiente = $("#Ocupacion_dependiente").val();
    var fila = '';
    fila += '<tr>';
    fila += '<td>' + Nombre_dependiente + '</td>';
    fila += '<td>' + Edad_dependiente + '</td>';
    fila += '<td>' + Estado_Civil_dependiente + '</td>';
    fila += '<td>' + Escolaridad_dependiente + '</td>';
    fila += '<td>' + Ocupacion_dependiente + '</td>';
    fila += '</tr>';
    $("#example_dependiente").append(fila);
    $("#Dependientes").val($("#Dependientes").val() + Nombre_dependiente +','+ Edad_dependiente + ',' + Id_Estado_Civil_dependiente + ',' + Id_Escolaridad_dependiente + ',' + Ocupacion_dependiente + '@');
    $("#modal_dependiente").modal('hide');
    $("#Nombre_dependiente").val('');
    $("#Edad_dependiente").val('');
    $("#Ocupacion_dependiente").val('');
  }

  function guardarEntrevista(e){
  	$("#Search_Nombre_Conyugue").prop('disabled',true);
  	$("#CurpSearch").prop('disabled',true);
  	e.preventDefault();
    $.ajax({
      type : 'POST',
      url : "<?php echo site_url("C_serviciosjuridicos/guardarEntrevista") ?>",
      data :$("#datos").serialize(),
      dataType: 'json',
      success : function(data) {
        console.log(data);
        band = true;
        $("#myModalLabel").text("Entrevista Guardada correctamente");
        $("#modal_aceptar").modal('show');
      },
      error : function(jqXHR, textStatus, errorThrown) {
        alert('Error ' + jqXHR +textStatus + errorThrown);
      }
    });
  }
</script>
	