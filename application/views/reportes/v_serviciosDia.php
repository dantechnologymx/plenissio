<div class="row">
	<div class="span12">      		
		<div class="widget ">
			<div class="widget-header">
				<i class="icon-user"></i>
				<h3>Consulta de reporte del dia: <small><?php echo strtoupper($this->session->userdata('fechaconsulta')) ?></small></h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">

				<h4><strong>Información de Servicios Otorgados</strong></h4>

				<br />

				<div class="pricing-plans plans-1">

	                <div class="plan-container">
	                  	<div class="plan blue">
	                    	<div class="plan-header">     
		                      	<div class="plan-title">
		                          	Numeralia            
		                      	</div> <!-- /plan-title -->
	                    	</div> <!-- /plan-header --> 
	                    	<div class="plan-features">
	                      		<ul>
	                      			<table class="table" cellspacing="0" width="100%">
						              	<thead>
						                	<tr>
						                  		<th>Programa</th>
						                  		<th>Total</th>
						                	</tr>
						              	</thead>
						              	<tbody>
						              	<?php foreach($servicios as $n){ ?>
						                	<tr>
						                  		<th><?php  echo $n->Nombre; ?></th>
						                  		<th><?php  echo $n->Total; ?></th>
						                	</tr>
						              	<?php } ?>
						              	</tbody>
						            </table>
	                      		</ul>
	                    	</div> <!-- /plan-features -->
	                  	</div> <!-- /plan -->
	                </div> <!-- /plan-container -->

              	</div> <!-- /pricing-plans -->

			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
	</div> <!-- /span8 -->
</div> <!-- /row -->
	