<div class="row">
	<div class="span12">      		
		<div class="widget ">
			<div class="widget-header">
				<i class="icon-user"></i>
				<h3>Programas Alimentarios  <small><?php echo strtoupper($this->session->userdata('curpbuscada')) ?></small></h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">

				<h4>Registro de documentacion entregada para Nutre DIF: </h4>

				<form method="post" role="form" id="documentacion" name="documentacion" action="<?php echo site_url('c_programasalimentarios/registroDocumentacionND');?>">
					<fieldset>

						<table class="table table-hover table-striped span11" cellspacing="0" width="100%">
			              	<thead>
			                	<tr>
			                  		<th></th>
			                  		<th>Documento</th>
			                	</tr>
			              	</thead>
			              	<tbody>
			              	<?php foreach ($requisitos as $requisito) { ?>
			                  	<tr>
			                  		<td>
			                  			<div class="control-group">
							                <div class="controls">
							                    <label class="checkbox">
							                        <input type="checkbox" name="Id_Documentacion[]" value="<?php  echo $requisito->Id; ?>">
							                    </label>
							                </div>
							            </div>
			                  		</td>
			                  		<td><?php echo $requisito->Nombre; ?></td>
			                	</tr>
			              	<?php } ?>
			              	</tbody>
			            </table>
						
						<div class="control-group">                     
                      		<label class="control-label" for="fecha_Valoracion"><h4>Fecha de Valoración Valoración Medica </h4></label>
                 			<div class="controls">
                 				<input type="text" class="span11" name="fecha_Valoracion" required="required" placeholder="DD/MM/AAAA" />
                  			</div> <!-- /controls -->       
                    	</div> <!-- /control-group -->

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
    e.preventDefault();
    $.ajax({
      type : 'POST',
      url : "<?php echo site_url("c_programasalimentarios/registroDocumentacionND") ?>",
      data :$("#documentacion").serialize(),
      dataType: 'json',
      success : function(data) {
        console.log(data);
        window.location = "<?php echo site_url().'/c_programasalimentarios/nutreDIFIndex';?>";
      },
      error : function(jqXHR, textStatus, errorThrown) {
        alert('Error ' + jqXHR +textStatus + errorThrown);
      }
    });
  }
</script>
	