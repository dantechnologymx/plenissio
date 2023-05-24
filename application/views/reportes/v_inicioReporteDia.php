<div class="row">
	<div class="span12">      		
		<div class="widget ">
			<div class="widget-header">
				<i class="icon-user"></i>
				<h3>Reportes por día</h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">

				<h4><strong>Selecciona el Reporte</strong></h4>

				<br />

				<div class="pricing-plans plans-4">

	                <div class="plan-container">
	                  	<div class="plan blue">
	                    	<div class="plan-header">     
		                      	<div class="plan-title">
		                          	Reporte de Hoy            
		                      	</div> <!-- /plan-title -->
	                    	</div> <!-- /plan-header --> 
	                    	<div class="plan-features">
	                      		<ul>
	                      			<li>
		                      			<?php $todayh = getdate(); 
				                        $d = $todayh['mday'];
				                        $m = $todayh['mon'];
				                        $y = $todayh['year'];?>
				                        <div class="shortcuts">
						                	<a class='shortcut' href="<?php echo site_url().'/C_reportes/serviciosDia/';echo "$y-$m-$d";?>">
						                		<i class="shortcut-icon icon-calendar"></i>
						                	</a>
						                </div>
						            </li>
	                      		</ul>
	                    	</div> <!-- /plan-features -->
	                  	</div> <!-- /plan -->
	                </div> <!-- /plan-container -->

	                <div class="plan-container">
	                  	<div class="plan blue">
	                    	<div class="plan-header">     
		                      	<div class="plan-title">
		                          	Reporte por dia             
		                      	</div> <!-- /plan-title -->
	                    	</div> <!-- /plan-header --> 
	                    	<div class="plan-features">
	                      		<ul>
	                      			<li>
		                      			<div class="control-group">                     
					                      	<label class="control-label" for="fecha">Fecha</label>
					                      	<div class="controls">
					                        	<input type="text" id="fecha" name="fecha" class="span2" placeholder="YYYY-MM-DD" required autofocus>
					                      	</div> <!-- /controls -->       
					                    </div> <!-- /control-group -->
					                </li>
					                <li>
					                	<button id="btn-generar" type="submit" class="btn btn-primary btn-large span2">Generar &nbsp; <span class="icon-ok"></span></button> 
					                </li>
	                      		</ul>
	                    	</div> <!-- /plan-features -->
	                  	</div> <!-- /plan -->
	                </div> <!-- /plan-container -->

	                <div class="plan-container">
	                  	<div class="plan blue">
	                    	<div class="plan-header">     
		                      	<div class="plan-title">
		                          	Reporte por fechas             
		                      	</div> <!-- /plan-title -->
	                    	</div> <!-- /plan-header --> 
	                    	<div class="plan-features">
	                      		<ul>
	                      			<li>
		                      			<div class="control-group">                     
					                      	<label class="control-label" for="fechainicial">De:</label>
					                      	<div class="controls">
					                        	<input type="text" id="fechainicial" class="span2" placeholder="YYYY-MM-DD" required autofocus>
					                      	</div> <!-- /controls -->       
					                    </div> <!-- /control-group -->
					                </li>
					                <li>
		                      			<div class="control-group">                     
					                      	<label class="control-label" for="fechafinal">A:</label>
					                      	<div class="controls">
					                        	<input type="text" id="fechafinal" class="span2" placeholder="YYYY-MM-DD" required autofocus>
					                      	</div> <!-- /controls -->       
					                    </div> <!-- /control-group -->
					                </li>
					                <li>
					                	<button id="btn-generar-2fechas" type="submit" class="btn btn-primary btn-large span2">Generar &nbsp; <span class="icon-ok"></span></button> 
					                </li>
	                      		</ul>
	                    	</div> <!-- /plan-features -->
	                  	</div> <!-- /plan -->
	                </div> <!-- /plan-container -->

	                <div class="plan-container">
	                  	<div class="plan blue">
	                    	<div class="plan-header">     
		                      	<div class="plan-title">
		                          	Reporte por mes             
		                      	</div> <!-- /plan-title -->
	                    	</div> <!-- /plan-header --> 
	                    	<div class="plan-features">
	                      		<ul>
	                      			<li>
	                      				<select class="selectpicker show-tick form-control" id="fechames" name="mes" required="required">
								            <option value="1">Enero</option>
								            <option value="2">Febrero</option>
								            <option value="3">Marzo</option>
								            <option value="4">Abril</option>
								            <option value="5">Mayo</option>
								            <option value="6">Junio</option>
								            <option value="7">Julio</option>
								            <option value="8">Agosto</option>
								            <option value="9">Septiembre</option>
								            <option value="10">Octubre</option>
								            <option value="11">Noviembre</option>
								            <option value="12">Diciembre</option>
								        </select>
	                      			</li>
	                      			<li>
						                <button id="btn-generar-mes" type="submit" class="btn btn-primary btn-large span2">Generar &nbsp; <span class="icon-ok"></span></button> 
					                </li>
	                      		</ul>
	                    	</div> <!-- /plan-features -->
	                  	</div> <!-- /plan -->
	                </div> <!-- /plan-container -->

              	</div> <!-- /pricing-plans -->
			
			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
	</div> <!-- /span8 -->
</div> <!-- /row -->

<script type="text/javascript">
  $(document).on("ready",inicio);
  function inicio(){
    $("#btn-generar").on("click",generar);
    $("#btn-generar-2fechas").on("click",generar2);
    $("#btn-generar-mes").on("click",generar3);
  }
  function generar()
  {
    var url = "<?php echo site_url("/C_reportes/serviciosDia/");?>"+$("#fecha").val();
    $(location).attr('href',url);
  }
  function generar2()
  {
    var url = "<?php echo site_url("/C_reportes/serviciosPeriodo/");?>"+$("#fechainicial").val()+"/"+$("#fechafinal").val();
    $(location).attr('href',url);
  }
  function generar3()
  {
    var fechainicial;
    var fechafinal;
    switch($("#fechames").val()){
      case "1":
        fechainicial = "2017-01-01";
        fechafinal = "2017-01-31";
      break;
      case "2":
        fechainicial = "2017-02-01";
        fechafinal = "2017-02-28";
      break;
      case "3":
        fechainicial = "2017-03-01";
        fechafinal = "2017-03-31";
      break;
      case "4":
        fechainicial = "2017-04-01";
        fechafinal = "2017-04-30";
      break;
      case "5":
        fechainicial = "2017-05-01";
        fechafinal = "2017-05-31";
      break;
      case "6":
        fechainicial = "2017-06-01";
        fechafinal = "2017-06-30";
      break;
      case "7":
        fechainicial = "2017-07-01";
        fechafinal = "2017-07-31";
      break;
      case "8":
        fechainicial = "2017-08-01";
        fechafinal = "2017-08-31";
      break;
      case "9":
        fechainicial = "2017-09-01";
        fechafinal = "2017-09-30";
      break;
      case "10":
        fechainicial = "2017-10-01";
        fechafinal = "2017-10-31";
      break;
      case "11":
        var fechainicial = '2016-11-01';
        var fechafinal = '2016-11-30';
      break;
      case "12":
        fechainicial = "2016-12-01";
        fechafinal = "2016-12-31";
      break;
    }
    var url = "<?php echo site_url("/C_reportes/serviciosPeriodo/");?>"+fechainicial+"/"+fechafinal;
    $(location).attr('href',url);
  }
</script>
	