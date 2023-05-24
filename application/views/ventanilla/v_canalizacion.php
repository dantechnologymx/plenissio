<div class="row">
  <div class="span12">          
    <div class="widget ">
      <div class="widget-header">
        <i class="icon-user"></i>
        <h3>Canalización <small><?php echo strtoupper($this->session->userdata('curpbuscada')) ?></small></h3>
      </div> <!-- /widget-header -->
      <div class="widget-content">
        <form method="post" role="form" id="canalizacion" name="canalizacion">
          <fieldset>
            <div class="row">
              <div class="pricing-plans plans-4">
                <div class="plan-container">
                  <div class="plan green">
                    <div class="plan-header">     
                      <div class="plan-title">
                          Asistencia Social             
                      </div> <!-- /plan-title -->
                    </div> <!-- /plan-header --> 
                    <div class="plan-features">
                      <ul>
                        <?php foreach($programas as $n){ 
                          if ($n->Id_Area_DIF == 1) {
                          ?>
                          <li>
                            <div class="control-group">
                              <div class="controls">
                                <label class="checkbox"> &nbsp;
                                  <input type="checkbox" name="Id_Programa_DIF[]" value="<?php  echo $n->Id; ?>">
                                  <?php  echo $n->Nombre; ?>
                                </label>
                              </div>
                            </div>
                          </li>
                        <?php }
                        } ?>
                      </ul>
                    </div> <!-- /plan-features -->
                  </div> <!-- /plan -->
                </div> <!-- /plan-container -->

                <div class="plan-container">
                  <div class="plan yellow">
                    <div class="plan-header">     
                      <div class="plan-title">
                          Programas Alimentarios             
                      </div> <!-- /plan-title -->
                    </div> <!-- /plan-header --> 
                    <div class="plan-features">
                      <ul>
                        <?php foreach($programas as $n){ 
                          if ($n->Id_Area_DIF == 2 && $n->Id <> 28) {
                          ?>    
                          <li>
                            <div class="control-group">
                              <div class="controls">
                                <label class="checkbox"> &nbsp;
                                  <input type="checkbox" name="Id_Programa_DIF[]" value="<?php  echo $n->Id; ?>">
                                  <?php  echo $n->Nombre; ?>
                                </label>
                              </div>
                            </div>
                          </li>
                        <?php }
                        } ?>
                      </ul>
                    </div> <!-- /plan-features -->
                  </div> <!-- /plan -->
                </div> <!-- /plan-container -->

                <div class="plan-container">
                  <div class="plan blue">
                    <div class="plan-header">     
                      <div class="plan-title">
                          Servicios Jurídicos             
                      </div> <!-- /plan-title -->
                    </div> <!-- /plan-header --> 

                    <div class="plan-features">
                      <ul>
                        <?php foreach($programas as $n){ 
                          if ($n->Id_Area_DIF == 3) {
                          ?>
                          <li>
                            <div class="control-group">
                              <div class="controls">
                                <label class="checkbox"> &nbsp;
                                  <input type="checkbox" name="Id_Programa_DIF[]" value="<?php  echo $n->Id; ?>">
                                  <?php  echo $n->Nombre; ?>
                                </label>
                              </div>
                            </div>
                          </li>
                        <?php }
                        } ?>
                      </ul>
                    </div> <!-- /plan-features -->
                  </div> <!-- /plan -->
                </div> <!-- /plan-container -->

                <div class="plan-container">
                  <div class="plan orange">
                    <div class="plan-header">     
                      <div class="plan-title">
                          Voluntariado DIF             
                      </div> <!-- /plan-title -->
                    </div> <!-- /plan-header --> 
                    <div class="plan-features">
                      <ul>
                        <?php foreach($programas as $n){ 
                          if ($n->Id_Area_DIF == 8) {
                          ?>
                          <li>
                            <div class="control-group">
                              <div class="controls">
                                <label class="checkbox"> &nbsp;
                                  <input type="checkbox" name="Id_Programa_DIF[]" value="<?php  echo $n->Id; ?>">
                                  <?php  echo $n->Nombre; ?>
                                </label>
                              </div>
                            </div>
                          </li>
                        <?php }
                        } ?>
                      </ul>
                    </div> <!-- /plan-features -->
                  </div> <!-- /plan -->
                </div> <!-- /plan-container -->

              </div> <!-- /pricing-plans -->
            </div>
            <div class="row">
              <div class="pricing-plans plans-4">

                <div class="plan-container">
                  <div class="plan green">
                    <div class="plan-header">     
                      <div class="plan-title">
                          Presidencia y/o Dirección             
                      </div> <!-- /plan-title -->
                    </div> <!-- /plan-header --> 
                    <div class="plan-features">
                      <ul>
                        <?php foreach($programas as $n){ 
                          if ($n->Id_Area_DIF == 6) {
                          ?>    
                          <li>
                            <div class="control-group">
                              <div class="controls">
                                <label class="checkbox"> &nbsp;
                                  <input type="checkbox" name="Id_Programa_DIF[]" value="<?php  echo $n->Id; ?>">
                                  <?php  echo $n->Nombre; ?>
                                </label>
                              </div>
                            </div>
                          </li>
                        <?php }
                        } ?>
                      </ul>
                    </div> <!-- /plan-features -->
                  </div> <!-- /plan -->
                </div> <!-- /plan-container -->

                <div class="plan-container">
                  <div class="plan">
                    <div class="plan-header">     
                      <div class="plan-title">
                          Dirección Administrativa             
                      </div> <!-- /plan-title -->
                    </div> <!-- /plan-header --> 

                    <div class="plan-features">
                      <ul>
                        <?php foreach($programas as $n){ 
                          if ($n->Id_Area_DIF == 7) {
                          ?>
                          <li>
                            <div class="control-group">
                              <div class="controls">
                                <label class="checkbox"> &nbsp;
                                  <input type="checkbox" name="Id_Programa_DIF[]" value="<?php  echo $n->Id; ?>">
                                  <?php  echo $n->Nombre; ?>
                                </label>
                              </div>
                            </div>
                          </li>
                        <?php }
                        } ?>
                      </ul>
                    </div> <!-- /plan-features -->
                  </div> <!-- /plan -->
                </div> <!-- /plan-container -->

                <div class="plan-container">
                  <div class="plan red">
                    <div class="plan-header">     
                      <div class="plan-title">
                          Servicios Medicos             
                      </div> <!-- /plan-title -->
                    </div> <!-- /plan-header --> 
                    <div class="plan-features">
                      <ul>
                        <?php foreach($programas as $n){ 
                          if ($n->Id_Area_DIF == 4) {
                          ?>
                          <li>
                            <div class="control-group">
                              <div class="controls">
                                <label class="checkbox"> &nbsp;
                                  <input type="checkbox" name="Id_Programa_DIF[]" value="<?php  echo $n->Id; ?>">
                                  <?php  echo $n->Nombre; ?>
                                </label>
                              </div>
                            </div>
                          </li>
                        <?php }
                        } ?>
                      </ul>
                    </div> <!-- /plan-features -->
                  </div> <!-- /plan -->
                </div> <!-- /plan-container -->

                <div class="plan-container">
                  <div class="plan purple">
                    <div class="plan-header">     
                      <div class="plan-title">
                          Preescolar Rosario Castellanos             
                      </div> <!-- /plan-title -->
                    </div> <!-- /plan-header --> 
                    <div class="plan-features">
                      <ul>
                        <?php foreach($programas as $n){ 
                          if ($n->Id_Area_DIF == 5) {
                          ?>
                          <li>
                            <div class="control-group">
                              <div class="controls">
                                <label class="checkbox"> &nbsp;
                                  <input type="checkbox" name="Id_Programa_DIF[]" value="<?php  echo $n->Id; ?>">
                                  <?php  echo $n->Nombre; ?>
                                </label>
                              </div>
                            </div>
                          </li>
                        <?php }
                        } ?>
                      </ul>
                    </div> <!-- /plan-features -->
                  </div> <!-- /plan -->
                </div> <!-- /plan-container -->

              </div> <!-- /pricing-plans -->
            </div>

            <div class="form-actions span10">
              <button id="guardar" type="submit" class="btn btn-primary btn-large span5 offset2">Continuar &nbsp; <span class="icon-chevron-right"></span></button> 
            </div> <!-- /form-actions -->

          </fieldset>
        </form>
      </div> <!-- /widget-content -->
    </div> <!-- /widget -->
  </div> <!-- /span8 -->
</div> <!-- /row -->

<div id="modal_aceptar" class="modal hide fade" tabindex="-1" aria-labelledby="myModalLabel">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 id="myModalLabel" class="blue bigger">Registro Canalizado Correctamente</h4></br>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-primary btn-large offset2" id="aceptar">Aceptar</button>
  </div>
</div>

<script type="text/javascript">
  $(document).on("ready",inicio);
  function inicio(){
    $("#guardar").on("click",guardar);
   $("#aceptar").on("click",home);
  }
  function guardar(e)
  {
    //$( "#modal_aceptar" ).modal('show');
    //window.location = "<?php echo site_url().'c_ventanilla/ventanilla';?>";
    e.preventDefault();
    $.ajax({
      type : 'POST',
      url : "<?php echo site_url("c_ventanilla/canalizar") ?>",
      data :$("#canalizacion").serialize(),
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
  function home(e){
    window.location = "<?php echo site_url().'/c_ventanilla/ventanilla';?>";
  }
</script>
  