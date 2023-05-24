<!DOCTYPE html>
<html lang="es"> 
<head>
	<title>DIF Municipal Colima</title>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>template/img/favicon.ico">
	<meta charset="utf-8" />
	<base href="<?php echo base_url(); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>template/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>template/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/css/login.css" />
	
</head>	
<body class="body">
	<div class="container contenedor">
	  	<div class="row">
	        <div class="col-sm-6 col-md-4 col-md-offset-4">
		        <div class="panel panel-primary caja">
		            <img src="<?php echo base_url(); ?>template/img/logo_dif.png"/>
		            <br/>
		            <br/>
	  				<div class="panel-heading">
	  					<h3 class="panel-title text-center">Inicio de Sesión</h3>
	  				</div>
	  				<div class="panel-body">
			            <form class="form-signin" role="form" action="<?php echo site_url('c_login/login');?>" method ="post" id="form-login" name="form-login">
			                <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
			                <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
			                <button class="btn btn-lg btn-primary btn-block" type="submit">
			                    Entrar &nbsp; <span class="glyphicon glyphicon-log-in"></span></button>
			            </form>
			            <div class="form-group text-center">
							<label style="color:red"><?php if(isSet($texto)){echo $texto;} ?></label>
						</div>
			        </div>
				</div>
	        </div>
	    </div>
	</div>
</body>
</html>