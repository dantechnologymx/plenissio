<div class="row">
	<div class="span12">      		
		<div class="widget ">
			<div class="widget-header">
				<i class="icon-info-sign"></i>
				<h3>Programas Alimentarios  <small><?php echo strtoupper($this->session->userdata('curpbuscada')) ?></small></h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">
			
				<h4><strong>Información de Apoyos</strong></h4>

				</br>

				<form method="post" id="datos" action="<?php echo site_url("C_programasalimentarios/registroInformacion");?>">
					<fieldset>

						<div class="pricing-plans plans-1">
						<div class="plan-container">
							<div class="plan blue">
              				<div class="plan-header">     
                      			<div class="plan-title">
                          			Programas Alimentarios             
                      			</div> <!-- /plan-title -->
                    		</div> <!-- /plan-header -->
              				<div class="plan-features">
              					<ul>
	                				<?php foreach($programas as $n){ 
	                  					if ($n->Nombre <> "Información de Programas Alimentarios") {
	        							?>
	        								<li>
		    									<div class="control-group">
									                <div class="controls">
									                    <label class="checkbox"> &nbsp;
									                        <input type="checkbox" name="Id_Programa_DIF[]" value="<?php  echo $n->Id; ?>"><?php  echo $n->Nombre; ?>
									                    </label>
									                </div>
									            </div>
									        </li>
	                					<?php }
	                				} ?>
	                			</ul>
              				</div>
              				</div>
            			</div>
            			</div>

            			<div class="control-group">                     
                      		<label class="control-label" for="Observaciones"><h4>Observaciones: </h4></label>
                 			<div class="controls">
                 				<textarea class="span12" name="Observaciones" cols="70" rows="5"></textarea>
                  			</div> <!-- /controls -->       
                    	</div> <!-- /control-group -->



            			<div class="form-actions span10">
			              	<button id="guardar" type="submit" class="btn btn-primary btn-large span5 offset2">Guardar &nbsp; <span class="icon-save"></span></button> 
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
    e.preventDefault();
    $.ajax({
      type : 'POST',
      url : "<?php echo site_url("C_programasalimentarios/registroInformacion") ?>",
      data :$("#datos").serialize(),
      dataType: 'json',
      success : function(data) {
        console.log(data);
        window.location = "<?php echo site_url().'/C_programasalimentarios/index/';?>";
      },
      error : function(jqXHR, textStatus, errorThrown) {
        alert('Error ' + jqXHR +textStatus + errorThrown);
      }
    });
  }
</script>
	