<div class="row">
	<div class="span12">      		
		<div class="widget ">
			<div class="widget-header">
				<i class="icon-map-marker"></i>
				<h3>Registro de Domicilio  <small><?php echo strtoupper($this->session->userdata('curpbuscada')) ?></small></h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">
			

			  <form class="form-horizontal" method="post" id="datos" action="<?php echo site_url('C_ventanilla/guardarDomicilio');?>">
        	<fieldset>
        		
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
                  <input type="text" class="span3" name="Lada_Fax" />
                </div> <!-- /controls -->       
              </div> <!-- /control-group -->

              <div class="control-group">                     
                <label class="control-label" for="Fax">Fax</label>
                <div class="controls">
                  <input type="text" class="span3" name="Fax" />
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
                  <input type="text" class="span3" name="No_Int" />
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

            </div>

            <div class="form-actions span10">
              <button id="guardar" type="submit" class="btn btn-primary btn-large span4 offset2">Continuar &nbsp; <span class="icon-chevron-right"></span></button> 
            </div> <!-- /form-actions -->

        	</fieldset>
        </form>

			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
	</div> <!-- /span8 -->
</div> <!-- /row -->

<div id="fases" class="modal modal-xl hide fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-header alert-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="myModalLabel" class="blue bigger"><strong>Selecciona el Codigo Postal:</strong></h4></br>
  </div>
  <div class="modal-body overflow-visible">
    <div class="span12">
        <table id="example" class="table table-hover table-striped" cellspacing="0" width="100%">
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

<script type="text/javascript">
  $(document).on("ready",inicio);
  function inicio(){
    $("#BuscarCP").on("click",buscarCodPos);
    $("#guardar").on("click",guardar);
  }

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
    $( "#fases" ).modal('hide');
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
        var $tabla = $("#example");
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
        datatable();
        $( "#fases" ).modal('show');
      },
      error : function(jqXHR, textStatus, errorThrown) {
        console.log('Error ' + jqXHR +textStatus + errorThrown);
      }
    });
  }
  function guardar(e)
  {
    e.preventDefault();
    $.ajax({
      type : 'POST',
      url : "<?php echo site_url("C_ventanilla/guardarDomicilio") ?>",
      data :$("#datos").serialize(),
      dataType: 'json',
      success : function(data) {
        console.log(data);
        window.location = "<?php echo site_url().'/C_ventanilla/canalizacion/';?>";
      },
      error : function(jqXHR, textStatus, errorThrown) {
        alert('Error ' + jqXHR +textStatus + errorThrown);
      }
    });
  }
</script>
	