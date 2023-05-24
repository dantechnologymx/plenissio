<div class="row">
  <div class="span3"> </div>
  <div class="span6">          
    <div class="widget ">
      <div class="widget-header">
        <i class="icon-cog"></i>
        <h3>Administrador <small>Nuevo Usuario</small></h3>
      </div> <!-- /widget-header -->
      <div class="widget-content">

        <h4 class="offset1">Formulario para dar de alta un usuario</h4>

        <br />

        <form id="cam" name="cam" class="form-horizontal">
          <fieldset>

            <div class="controls">
              <input type="text" class="span4" name="Nombre_Conyugue" id="Nombre_Conyugue" autofocus />
              <input type="hidden" name="Id_conyugue" id="Id_conyugue" />
              <br />
            </div> <!-- /controls -->

            <div class="controls">
              <div class="btn-group">
                <ul class="dropdown-menu" id="searchResults"></ul>
              </div>
            </div>

            <br /><br />
                  
            <div class="control-group">                     
              <label class="control-label" for="usuario">Usuario:</label>
              <div class="controls">
                <input type="text" class="span4" id="usuario" name="usuario" placeholder="Usuario"/>
                <p class="help-block">Recuerda poner una contraseña segura pero fácil de recordar</p>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->

            <div class="controls">
              <div class="errorU span3"></div>
            </div> <!-- /controls --> 

            <br />
            
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

            <div class="control-group">                     
              <label class="control-label" for="perfil">Perfil:</label>
              <div class="controls">
                <select class="selectpicker show-tick form-control" name="perfil" id="perfil">
                  <?php foreach ($roles as $value) {
                  echo '<option value="'.$value->Id.'">'.$value->Nombre.'</option>';
                  } ?>
                </select>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->

            <div class="controls">
              <div class="errorP2 span3"></div> 
            </div> <!-- /controls -->

            <div class="controls"> 
              <div class="errorP span3"></div>
            </div> <!-- /controls -->
            
            <div class="controls"> 
              <div class="errorP3 span3"></div>
            </div> <!-- /controls -->

            <br />

            <div class="form-actions span3">
              <button type="button" class="btn btn-primary btn-large" id="cambio" name="cambio">Registrar</button> 
            </div> <!-- /form-actions -->

          </fieldset>
        </form>

      </div> <!-- /widget-content -->
    </div> <!-- /widget -->
  </div> <!-- /span12 -->
</div> <!-- /row -->

<div id="modal_aceptar" class="modal hide fade" tabindex="-1" aria-labelledby="myModalLabel">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 id="myModalLabel" class="blue bigger">Usuario Registrado Correctamente</h4></br>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary btn-large offset2" id="aceptar">Aceptar</button>
    </div>
</div>


<script type="text/javascript">
$(document).on("ready",inicio);
function inicio(){
    $("#Nombre_Conyugue").focus(function(){
      $(this).select();
    });
    $('#Nombre_Conyugue').keyup(ajaxConyugue);
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
    $("#usuario").on("keypress",function(){
        $(".errorU").html("");
        $(".errorU").removeClass("alert alert-danger");
    });
    $("#perfil").on("change",function(){
        $(".errorP").html("");
        $(".errorP").removeClass("alert alert-danger");
    });
  }
  /**
   * [ajaxConyugue description]
   * @return {[type]} [description]
   */
  function ajaxConyugue() {
    //Console.log($("#Nombre_Conyugue").val());
    if ($('#Nombre_Conyugue').val() != '' && $('#Nombre_Conyugue').val() != ' ') {
      setTimeout(function(){
        $.ajax({
          type    : 'POST',
          url     : "<?php echo site_url("C_asistenciasocial/buscarPersona") ?>",
          data    : {Nombre_Conyugue: $("#Nombre_Conyugue").val()},
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
  function seleccionarPersona($idPersona,$Nombre){
    $('#Nombre_Conyugue').val($Nombre);
    $("#Id_conyugue").val($idPersona);
    $("#searchResults").hide();
  }
  function validar(){
    var error = false;
      with(document.cam){
        if(usuario.value==''){
            $(".errorU").html("Ingrese nombre de usuario");
            $(".errorU").addClass("alert alert-danger");
            error = true;
        }
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
        if(perfil.value == 0){
            $(".errorP").html("Seleccione un perfil");
            $(".errorP").addClass("alert alert-danger");
            error = true;
        }
        return error;
      }
  }
  function home(e){
    window.location = "<?php echo site_url().'/C_login/usuarios/';?>";
  }
  function guardar(){
    if(!validar()){
      persona = $('#Id_conyugue').val();
      nombre = $('#usuario').val();
      pass = $('#pass1').val();
      perfil = $('#perfil').val();
      console.log(persona);
      console.log(nombre);
      console.log(pass);
      console.log(perfil);
      //alert(pass);
      $.ajax({
        type : 'POST',
        url : "<?php echo site_url("C_login/setUsuario") ?>",
        data : {
        'nombre' : nombre, 'pass' : pass, 'perfil':perfil, 'persona':persona
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

