<div class="row">
	<div class="span12">      		
		<div class="widget ">
			<div class="widget-header">
				<i class="icon-user"></i>
				<h3><?php echo $persona->Nombre_S." ".$persona->Apellido_Paterno." ".$persona->Apellido_Materno; ?> &nbsp;  <small><?php echo strtoupper($this->session->userdata('curpbuscada')) ?></small></h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">
				<div class="span11">

					<table class="table table-hover">
			            <thead>
			              <tr class="alert alert-info">
			                <th>Programa DIF</th>
			                <th>Area DIF</th>
			                <th>Domicilio</th>
			                <th>Localidad</th>
			                <th>Municipio</th>
			                <th></th>
			              </tr>
			            </thead>
			            <tbody>
			              <?php foreach ($servicios as $servicio) {
			                switch ($servicio->Id_Estatus) {
			                  case '5':?>
			                    <tr class="alert alert-success">
			                      <td><?php echo $servicio->Programa_DIF; ?></td>
			                      <td><?php echo $servicio->Area_DIF; ?></td>
			                      <td><?php echo $servicio->Tipo_Vialidad." ".$servicio->Nombre_Vialidad." #".$servicio->No_Ext1." ".$servicio->Tipo_Asentamiento." ".$servicio->Asentamiento; ?></td>
			                      <td><?php echo $servicio->Localidad; ?></td>
			                      <td><?php echo $servicio->Municipio; ?></td>
			                      <td>
			                        <div class="col-lg-1">
			                          <a href="#" id="seleccionar" class="btn btn-lg btn-success" >Ver &nbsp;
			                            <span class="glyphicon glyphicon-chevron-right"></span>
			                          </a>
			                        </div>
			                      </td>
			                    </tr>
			                  <?php
			                  break;
			          
			                  case '6':?>
			                    <tr class="alert alert-warning">
			                      <td><?php echo $servicio->Programa_DIF; ?></td>
			                      <td><?php echo $servicio->Area_DIF; ?></td>
			                      <td><?php echo $servicio->Tipo_Vialidad." ".$servicio->Nombre_Vialidad." #".$servicio->No_Ext1." ".$servicio->Tipo_Asentamiento." ".$servicio->Asentamiento; ?></td>
			                      <td><?php echo $servicio->Localidad; ?></td>
			                      <td><?php echo $servicio->Municipio; ?></td>
			                      <td>
			                        <div class="col-lg-1">
			                          <a href="#" id="seleccionar" class="btn btn-lg btn-warning" >Ver &nbsp;
			                            <span class="glyphicon glyphicon-chevron-right"></span>
			                          </a>
			                        </div>
			                      </td>
			                    </tr>
			                  <?php
			                  break;
			                  
			                  case '7':?>
			                    <tr class="alert alert-danger">
			                      <td><?php echo $servicio->Programa_DIF; ?></td>
			                      <td><?php echo $servicio->Area_DIF; ?></td>
			                      <td><?php echo $servicio->Tipo_Vialidad." ".$servicio->Nombre_Vialidad." #".$servicio->No_Ext1." ".$servicio->Tipo_Asentamiento." ".$servicio->Asentamiento; ?></td>
			                      <td><?php echo $servicio->Localidad; ?></td>
			                      <td><?php echo $servicio->Municipio; ?></td>
			                      <td>
			                        <div class="col-lg-1">
			                          <a href="#" id="seleccionar" class="btn btn-lg btn-danger" >Ver &nbsp;
			                            <span class="glyphicon glyphicon-chevron-right"></span>
			                          </a>
			                        </div>
			                      </td>
			                    </tr>
			                  <?php
			                  break;
			                }
			              } ?>
			            </tbody>
			          </table>

		        	<div class="form-actions span10">
                		<button id="BuscarDomicilio" type="submit" class="btn btn-primary btn-large span4 offset2">Canalizar &nbsp; <span class="icon-chevron-right"></span></button> 
              		</div> <!-- /form-actions -->

		          </div>
			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
	</div> <!-- /span8 -->
</div> <!-- /row -->

<div id="fases" class="modal modal-xl hide fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
  	<div class="modal-header alert-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="myModalLabel" class="blue bigger"><strong>Selecciona el Domicilio:</strong></h4></br>
  	</div>
  	<div class="modal-body overflow-visible">
    	<div class="span12">
        	<table id="example" class="table table-hover table-striped" cellspacing="0" width="100%">
              	<thead>
                	<tr>
	                  	<th>Codigo Postal</th>
	                  	<th>Domicilio</th>
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
  	<div class="modal-footer">
      <button id="domicilio" class="btn btn-warning btn-large offset2">Nuevo Domicilio <span class="icon-plus-sign"></span></button>
    </div>
</div>

<script type="text/javascript">
  $(document).on("ready",inicio);
  function inicio(){
    $("#BuscarDomicilio").on("click",buscarDom);
    $("#domicilio").on("click",domicilio);
  }
  function selectDom(iddom){
    $( "#fases" ).modal('hide');
    window.location = "<?php echo site_url().'/c_ventanilla/canalizacion/';?>"+iddom;
  }
  function buscarDom(e)
  {
    //var value = $("#Codigo_Postal").val();
    //if (value == null ) { value = 0;}
    e.preventDefault();
    $.ajax({
      type : 'GET',
      url : "<?php echo site_url("c_ventanilla/BuscarDomicilio") ?>",
      //data : ajax_data,
      dataType: 'json',
      success : function(data) {
        console.log(data);
        var $tabla = $("#example");
        $tabla.find("tr:gt(0)").remove();
        if (data == true) {
          $tabla.append(
            '<tr><td colspan="6" align="center"><h1>No se encontró Domicilio</h1></td></tr>');
        }else{
          for (var idx in data.domicilio){
            $tabla.append(
              "<tr><td>" + data.domicilio[idx].Codigo_Postal + 
              "</td><td>" + data.domicilio[idx].Tipo_Vialidad + " " + data.domicilio[idx].Nombre_Vialidad + " No " + data.domicilio[idx].No_Ext1 + " "+ data.domicilio[idx].Tipo_Asentamiento + " " + data.domicilio[idx].Asentamiento + 
              "</td><td>" + data.domicilio[idx].Municipio +
              "</td><td>" + data.domicilio[idx].Estado + 
              '</td><td><button class="btn btn-warning form-control fase" onclick="'+"selectDom('"
              + data.domicilio[idx].Id_Domicilio + "')"+'" href="#" data-toggle="modal" >Seleccionar <span class="glyphicon glyphicon-check"></span></button></td></tr>'); 
          }
        }
        $( "#fases" ).modal('show');
      },
      error : function(jqXHR, textStatus, errorThrown) {
        console.log('Error ' + jqXHR +textStatus + errorThrown);
      }
    });
  }
  function domicilio(e){
    window.location = "<?php echo site_url().'/C_ventanilla/domicilio';?>";
  }
</script>
	