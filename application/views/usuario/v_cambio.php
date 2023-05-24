<div class="row">
  <div class="span3"> </div>
  <div class="span6">          
    <div class="widget ">
      <div class="widget-header">
        <i class="icon-cog"></i>
        <h3>Configuración <small>Cambio de Contraseña</small></h3>
      </div> <!-- /widget-header -->
      <div class="widget-content">

        <!-- Main content -->
<!--         <section class="content"> -->
          <form id="cam" name="cam" class="form-horizontal">
            <fieldset>
                    
              <div class="control-group">                     
                <label class="control-label" for="usuario">Usuario:</label>
                <div class="controls">
                  <input type="hidden" id="usuario" name="usuario" value="<?php echo $this->session->userdata('idUsuario');?>"/>
                  <input type="text" class="span4 disabled" id="username" value="<?php echo $this->session->userdata("nombre");?>" disabled>
                  <p class="help-block">Recuerda poner una contraseña segura pero fácil de recordar</p>
                </div> <!-- /controls -->       
              </div> <!-- /control-group -->

              <br /><br />
              
              <div class="control-group">                     
                <label class="control-label" for="pass1">Contraseña:</label>
                <div class="controls">
                  <input type="password" class="span4" name="pass1" id="pass1" placeholder="**************">
                </div> <!-- /controls -->     
              </div> <!-- /control-group -->

              <div class="controls">
                <div class="errorP1 span3"></div>
              </div> <!-- /controls -->  
              
              <div class="control-group">                     
                <label class="control-label" for="pass2">Confirmar Contraseña:</label>
                <div class="controls">
                  <input type="password" class="span4" name="pass2" id="pass2" placeholder="**************">
                </div> <!-- /controls -->       
              </div> <!-- /control-group -->

              <div class="controls">
                <div class="errorP2 span3"></div> 
              </div> <!-- /controls --> 
              
              <div class="controls"> 
                <div class="errorP3 span3"></div>
              </div> <!-- /controls -->

              <br />

              <div class="form-actions span3">
                <button type="button" class="btn btn-primary btn-large" id="cambio" name="cambio">Cambiar contraseña</button> 
              </div> <!-- /form-actions -->

            </fieldset>
          </form>
        <!-- </section><!-- /.content -->

      </div> <!-- /widget-content -->
    </div> <!-- /widget -->
  </div> <!-- /span12 -->
</div> <!-- /row -->

<div id="modal_aceptar" class="modal hide fade" tabindex="-1" aria-labelledby="myModalLabel">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 id="myModalLabel" class="blue bigger">Cambio de Contraseña Satisfactorio</h4></br>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary btn-large offset2" id="aceptar">Aceptar</button>
    </div>
</div>

<script type="text/javascript">
$(document).on("ready",inicio);
  function inicio(){
    $("#cambio").on("click",guardar);
    $("#aceptar").on("click",home);
    $("#pass1").on("keypress",function(){
        $(".errorP1").html("");
        $(".errorP1").removeClass("alert alert-danger");
        $(".errorP3").html("");
        $(".errorP3").removeClass("alert alert-warning");
    });
    $("#pass2").on("keypress",function(){
        $(".errorP2").html("");
        $(".errorP2").removeClass("alert alert-danger");
    });
  }
  function validar(){
    var error = false;
      with(document.cam){
        if(pass1.value==''){
            $(".errorP1").html("Ingrese una contraseña");
            $(".errorP1").addClass("alert alert-danger");
            error = true;
        }
        if(pass2.value==''){
            $(".errorP2").html("Repita la contraseña");
            $(".errorP2").addClass("alert alert-danger");
            error = true;
        }
        if(pass1.value != pass2.value){
            $(".errorP3").html("Contraseñas no coinciden");
            $(".errorP3").addClass("alert alert-warning");
            $("#EP3").addClass("alert alert-danger");
            error = true;
        }
        return error;
      }
  }
  function home(e){
    window.location = "<?php echo site_url().'/C_ventanilla/ventanilla/';?>";
  }
  function guardar(){
    if(!validar()){
      idUsuario = $('#usuario').val();
      pass = $('#pass1').val();
      //alert(pass);
      $.ajax({
        type : 'POST',
        url : "<?php echo site_url("C_login/setContrasena") ?>",
        data : {
        'idUsuario' : idUsuario, 'pass' : pass
        },
        success : function(data) {
          console.log(data);
          $("#modal_aceptar").modal('show');
        },
        error : function() {
          alert('Error');
        }
      });
    }
  }
</script>

