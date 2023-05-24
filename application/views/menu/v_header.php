<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>DIF Municipal Colima</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="shortcut icon" href="<?php echo base_url(); ?>template/img/favicon.ico">
<link href="<?php echo base_url();?>template/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>template/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="<?php echo base_url();?>template/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url();?>template/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>template/css/pages/dashboard.css" rel="stylesheet">
<link href="<?php echo base_url();?>template/css/pages/faq.css" rel="stylesheet">
<link href="<?php echo base_url();?>template/css/pages/plans.css" rel="stylesheet">
<link href="<?php echo base_url();?>template/css/pages/reports.css" rel="stylesheet">
<link href="<?php echo base_url();?>template/css/pages/signin.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>template/css/fonts/flaticon.css" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<script type="text/javascript" src="<?php echo base_url();?>template/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/js/utf8.js"></script>

<link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
<!-- <script src="<?php echo base_url(); ?>template/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>template/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>template/js/jQuery/jQuery-2.2.0.min.js"></script> -->

</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index2.php"><span class="logo-lg"><img src="<?php echo base_url(); ?>template/img/logo_dif.png" width="150" height="40"/></span></a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> <?php echo $this->session->userdata('nombre') ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo site_url('C_login/cambiarCon'); ?>"><i
                            class="icon-cog"></i> Configuración</a></li>
              <li><a href="<?php echo site_url('C_login/cerrarSesion'); ?>"><i
                            class="icon-signout"></i> Cerrar Sesión</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Buscar">
        </form>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <?php switch ($this->session->userdata('idRol')) {
          case '8': ?>

            <li class="active"><a href="<?php echo site_url('c_ventanilla/ventanilla2');?>"><i class="icon-list-alt"></i><span>Ventanilla Única</span> </a> </li>

          <?php break;
          case '3': ?>

            <li class="active"><a href="<?php echo site_url().'/C_asistenciasocial/index';?>"><i class="fa flaticon-asis-social"></i><span>Asistencia Social</span></a></li>
            <!-- @Este link se debe cambiar por la lista de asistencia para adultos mayores -->
            <li><a href="<?php echo '#'; //site_url().'/C_asistenciasocial/adultosMayores';?>"><i class="fa fa-exclamation-triangle"></i> <span>Adultos Mayores</span></a></li>
            <!-- @Verificar este link-->
            <li><a href="<?php echo '#'; //site_url().'/C_asistenciasocial/apoyosDirectos';?>"><i class="fa fa-exclamation-triangle"></i><span>Apoyos Directos del DIF</span></a></li>
            <!-- @Este link se debe cambiar por la lista de asistencia para mavi y sus grupos -->
            <li><a href="<?php echo '#'; //site_url().'/C_asistenciasocial/MAVI';?>"><i class="fa fa-exclamation-triangle"></i><span>MAVI</span></b></a></li>

          <?php break;
          case '4': ?>

            <li class="active"><a href="<?php echo site_url().'/C_programasalimentarios/index';?>"><i class="icon-leaf"></i><span>Programas Alimentarios</span> </a></li>

            <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa flaticon-canasta-basica"></i><span>Canasta Basica</span> <b class="caret"></b><i class="icon-caret-down"></i></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?php echo site_url().'/C_programasalimentarios/canastaBasicaIndex';?>"><i class="fa flaticon-canasta-basica"></i><span> Inicio</span></a>
                <li>
                  <a href="<?php echo site_url().'/C_programasalimentarios/listaEsperaCB';?>"><i class="fa flaticon-canasta-basica"></i><span> Lista de Espera</span></a>
                </li>
                <li>
                  <a href="<?php echo site_url().'/C_programasalimentarios/padronCB';?>"><i class="fa flaticon-canasta-basica"></i><span>Padron de Beneficiarios</span></a>
                </li>
              </ul>
            </li>

            <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa flaticon-comedor-comunitario"></i><span>Comedor Comunitario</span> <b class="caret"></b><i class="icon-caret-down"></i></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?php echo site_url().'/C_programasalimentarios/comedorComunitarioIndex';?>"><i class="fa flaticon-comedor-comunitario"></i><span> Inicio</span></a>
                </li>
                <li>
                  <a href="<?php echo site_url().'/C_programasalimentarios/listaEsperaCC';?>"><i class="fa flaticon-canasta-basica"></i><span> Lista de Espera</span></a>
                </li>
                <li>
                  <a href="<?php echo site_url().'/C_programasalimentarios/padronCC';?>"><i class="fa flaticon-canasta-basica"></i><span> Padron de Beneficiarios</span></a>
                </li>
              </ul>
            </li>

            <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-exclamation-triangle"></i><span>Nutre DIF</span> <b class="caret"></b><i class="icon-caret-down"></i></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?php echo site_url().'/C_programasalimentarios/nutreDIFIndex';?>"><i class="fa fa-exclamation-triangle"></i><span> Nutre DIF</span></a>
                </li>
                <li>
                  <a href="<?php echo site_url().'/C_programasalimentarios/listaEsperaND';?>"><i class="fa flaticon-canasta-basica"></i><span> Lista de Espera</span></a>
                </li>
                <li>
                  <a href="<?php echo site_url().'/C_programasalimentarios/padronND';?>"><i class="fa flaticon-canasta-basica"></i><span> Padron de Beneficiarios</span></a>
                </li>
              </ul>
            </li>

            <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-exclamation-triangle"></i><span>Asis. Alim. a Sujetos Vulnerables</span> <b class="caret"></b><i class="icon-caret-down"></i></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?php echo site_url().'/C_programasalimentarios/sujetosVulnerablesIndexAB';?>"><i class="fa fa-exclamation-triangle"></i><span> Inicio</span></a>
                </li>
                <li>
                  <a href="<?php echo site_url().'/C_programasalimentarios/listaEsperaSV';?>"><i class="fa flaticon-canasta-basica"></i><span> Lista de Espera</span></a>
                </li>
                <li>
                  <a href="<?php echo site_url().'/C_programasalimentarios/padronSV';?>"><i class="fa flaticon-canasta-basica"></i><span> Padron de Beneficiarios</span></a>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-exclamation-triangle"></i><span> Desayunos Escolares</span></a></li>

          <?php break;
          case '5': ?>

            <li class="active"><a href="<?php echo site_url().'/C_serviciosjuridicos/index';?>"><i class="icon-legal"></i><span>Servicios Jurídicos</span> </a> </li>
            <li><a href="#"><i class="fa fa-exclamation-triangle"></i><span> Asesoria Jurídica Diversa</span></a></li>
            <li><a href="#"><i class="fa fa-exclamation-triangle"></i><span> Regularización de Estado Civil</span></a></li>
            <li><a href="#"><i class="fa fa-exclamation-triangle"></i><span> Matrimonios Colectivos</span></a></li>
            <li><a href="#"><i class="fa fa-exclamation-triangle"></i><span> Reporte de Maltrato a Personas</span></a></li>
            <li><a href="#"><i class="fa fa-exclamation-triangle"></i><span> Pensión Alimenticia</span></a></li> 

          <?php break;
          case '6': ?>

            <li class="active"><a href="<?php echo site_url().'/C_serviciosmedicos/index';?>"><i class="icon-user-md"></i><span>Servicios Medicos</span> </a> </li>
            <li><a href="#"><i class="fa fa-exclamation-triangle"></i><span> Homeopatia</span></a></li>
            <li><a href="#"><i class="fa fa-exclamation-triangle"></i><span> Odontología</span></a></li>
            <li><a href="#"><i class="fa fa-exclamation-triangle"></i><span> Medicina General</span></a></li>
            <li><a href="#"><i class="fa fa-exclamation-triangle"></i><span> Psicología</span></a></li>
            <li><a href="#"><i class="fa fa-exclamation-triangle"></i><span> Nutriología</span></a></li>
            <li><a href="#"><i class="fa fa-exclamation-triangle"></i><span> Botica</span></a></li>

          <?php break;
          case '7': ?>

            <li class="active"><a href="<?php echo site_url().'/C_preescolar/index';?>"><i class="icon-user-md"></i><span>Preescolar</span> </a> </li>

          <?php break;
          case '11': ?>

            <li class="active"><a href="<?php echo site_url().'/C_presidencia/index';?>"><i class="icon-long-arrow-down"></i><span>Presidencia</span> </a> </li>
            <!-- <li><a href="#"><i class="fa fa-exclamation-triangle"></i><span> Homeopatia</span></a></li>
            <li><a href="#"><i class="fa fa-exclamation-triangle"></i><span> Odontología</span></a></li>
            <li><a href="#"><i class="fa fa-exclamation-triangle"></i><span> Medicina General</span></a></li>
            <li><a href="#"><i class="fa fa-exclamation-triangle"></i><span> Psicología</span></a></li>
            <li><a href="#"><i class="fa fa-exclamation-triangle"></i><span> Nutriología</span></a></li>
            <li><a href="#"><i class="fa fa-exclamation-triangle"></i><span> Botica</span></a></li> -->

          <?php break;
          case '9': ?>

            <li class="active"><a href="<?php echo site_url().'/C_administrativo/index';?>"><i class="icon-long-arrow-down"></i><span>Administrativo</span> </a> </li>

          <?php break;
          case '10': ?>

            <li class="active"><a href="<?php echo site_url().'/C_voluntariado/index';?>"><i class="icon-long-arrow-down"></i><span>Voluntariado</span> </a> </li>

          <?php break;
          default: ?>

            <li class="active"><a href="<?php echo site_url('c_ventanilla/ventanilla');?>"><i class="icon-list-alt"></i><span>Ventanilla Única</span> </a> </li>

            <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa flaticon-asis-social"></i><span>A. Social</span> <b class="caret"></b><i class="icon-caret-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url().'/C_asistenciasocial/index';?>"><i class="icon-group"></i>&nbsp;<span>Inicio</span> </a> </li>
                <!-- @Este link se debe cambiar por la lista de asistencia para adultos mayores -->
                <li><a href="<?php echo '#'; //site_url().'/C_asistenciasocial/adultosMayores';?>"><i class="fa fa-exclamation-triangle"></i>&nbsp;<span> Adultos Mayores</span></a></li>
                <!-- @Verificar este link -->
                <li><a href="<?php echo '#'; //site_url().'/C_asistenciasocial/apoyosDirectos';?>"><i class="fa fa-exclamation-triangle"></i>&nbsp;<span> Apoyos Directos del DIF</span></a></li>
                <!-- @Este link se debe cambiar por la lista de asistencia para mavi y sus grupos -->
                <li><a href="<?php echo '#'; //site_url().'/C_asistenciasocial/MAVI';?>"><i class="fa fa-exclamation-triangle"></i> &nbsp; <span>MAVI</span></a></li>
              </ul>
            </li>

            <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa flaticon-prog-alimentario"></i><span>P. Alimentarios</span> <b class="caret"></b><i class="icon-caret-down"></i></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?php echo site_url().'/C_programasalimentarios/index';?>"><i class="icon-leaf"></i>&nbsp;<span>Inicio</span></a>
                </li>
                <li>
                  <a href="<?php echo site_url().'/C_programasalimentarios/canastaBasicaIndex';?>"><i class="fa flaticon-canasta-basica"></i>&nbsp;<span> Canasta Basica</span></a>
                  <ul class="dropdown-submenu">
                    <li>
                      <a href="<?php echo site_url().'/C_programasalimentarios/listaEsperaCB';?>"><i class="fa flaticon-canasta-basica"></i>&nbsp;<span> Lista de Espera</span></a>
                    </li>
                    <li>
                      <a href="<?php echo site_url().'/C_programasalimentarios/padronCB';?>"><i class="fa flaticon-canasta-basica"></i>&nbsp;<span> Padron de Beneficiarios</span></a>
                    </li>
                  </ul>
                </li>
                <li><a href="<?php echo site_url().'/C_programasalimentarios/comedorComunitarioIndex';?>"><i class="fa flaticon-comedor-comunitario"></i>&nbsp;<span> Comedor Comunitario</span></span></a>
                  <ul class="dropdown-submenu">
                    <li>
                      <a href="<?php echo site_url().'/C_programasalimentarios/listaEsperaCC';?>"><i class="fa flaticon-canasta-basica"></i>&nbsp;<span> Lista de Espera</span></a>
                    </li>
                    <li>
                      <a href="<?php echo site_url().'/C_programasalimentarios/padronCC';?>"><i class="fa flaticon-canasta-basica"></i>&nbsp;<span> Padron de Beneficiarios</span></a>
                    </li>
                  </ul>
                </li>
                <li><a href="<?php echo site_url().'/C_programasalimentarios/nutreDIFIndex';?>"><i class="fa fa-exclamation-triangle"></i>&nbsp;<span> Nutre DIF</span></a>
                  <ul class="dropdown-submenu pull-left">
                    <li>
                      <a href="<?php echo site_url().'/C_programasalimentarios/listaEsperaND';?>"><i class="fa flaticon-canasta-basica"></i>&nbsp;<span> Lista de Espera</span></a>
                    </li>
                    <li>
                      <a href="<?php echo site_url().'/C_programasalimentarios/padronND';?>"><i class="fa flaticon-canasta-basica"></i>&nbsp;<span> Padron de Beneficiarios</span></a>
                    </li>
                  </ul>
                </li>
                <li><a href="<?php echo site_url().'/C_programasalimentarios/sujetosVulnerablesIndexAB';?>"><i class="fa fa-exclamation-triangle"></i>&nbsp;<span> Asis. Alim. a Sujetos Vulnerables</span></a>
                  <ul class="dropdown-submenu pull-left">
                    <li>
                      <a href="<?php echo site_url().'/C_programasalimentarios/listaEsperaSV';?>"><i class="fa flaticon-canasta-basica"></i>&nbsp;<span> Lista de Espera</span></a>
                    </li>
                    <li>
                      <a href="<?php echo site_url().'/C_programasalimentarios/padronSV';?>"><i class="fa flaticon-canasta-basica"></i>&nbsp;<span> Padron de Beneficiarios</span></a>
                    </li>
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i>&nbsp;<span> Desayunos Escolares</span></a></li>
              </ul>
            </li>

            <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-legal"></i><span>S. Jurídicos</span> <b class="caret"></b><i class="icon-caret-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url().'/C_serviciosjuridicos/index';?>"><i class="icon-group"></i>&nbsp;<span>Inicio</span> </a> </li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i>&nbsp;<span> Asesoria Jurídica Diversa</span></a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i>&nbsp;<span> Regularización de Estado Civil</span></a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i>&nbsp;<span> Matrimonios Colectivos</span></a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i>&nbsp;<span> Reporte de Maltrato a Personas</span></a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i><span> Pensión Alimenticia</span></a></li>
              </ul>
            </li>

            <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user-md"></i><span>S. Medicos</span> <b class="caret"></b><i class="icon-caret-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url().'/C_serviciosmedicos/index';?>"><i class="icon-group"></i>&nbsp;<span>Inicio</span> </a> </li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i>&nbsp;<span> Homeopatia</span></a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i>&nbsp;<span> Odontología</span></a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i>&nbsp;<span> Medicina General</span></a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i>&nbsp;<span> Psicología</span></a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i>&nbsp;<span> Nutriología</span></a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i>&nbsp;<span> Botica</span></a></li>
              </ul>
            </li>

            <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa flaticon-asis-infantil"></i><span>Preescolar</span> <b class="caret"></b><i class="icon-caret-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url().'/C_preescolar/index';?>"><i class="icon-group"></i>&nbsp;<span>Inicio</span> </a> </li>
                <!-- @<li><a href="#"><i class="fa fa-exclamation-triangle"></i> Persona Moral</a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i> Asociación Civil</a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i> Otros</a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i> Canalizados por el Ayuntamiento</a></li> -->
              </ul>
            </li>

            <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Presidencia</span> <b class="caret"></b><i class="icon-caret-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url().'/C_presidencia/index';?>"><i class="icon-group"></i>&nbsp;<span>Inicio</span> </a> </li>
                <!-- @<li><a href="#"><i class="fa fa-exclamation-triangle"></i> Persona Moral</a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i> Asociación Civil</a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i> Otros</a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i> Canalizados por el Ayuntamiento</a></li> -->
              </ul>
            </li>

            <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Administrativo</span> <b class="caret"></b><i class="icon-caret-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url().'/C_administrativo/index';?>"><i class="icon-group"></i>&nbsp;<span>Inicio</span> </a> </li>
                <li><a href="<?php echo site_url().'/C_login/usuarios';?>"><i class="fa fa-exclamation-triangle"></i>&nbsp;<span> Nuevo Usuario</span></a></li>
                <!-- @<li><a href="#"><i class="fa fa-exclamation-triangle"></i> Persona Moral</a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i> Asociación Civil</a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i> Otros</a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i> Canalizados por el Ayuntamiento</a></li> -->
              </ul>
            </li>

            <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Voluntariado</span> <b class="caret"></b><i class="icon-caret-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url().'/C_voluntariado/index';?>"><i class="icon-group"></i>&nbsp;<span>Inicio</span> </a> </li>
                <!-- @<li><a href="#"><i class="fa fa-exclamation-triangle"></i> Persona Moral</a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i> Asociación Civil</a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i> Otros</a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i> Canalizados por el Ayuntamiento</a></li> -->
              </ul>
            </li>

            <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-bar-chart"></i><span>Reportes</span> <b class="caret"></b><i class="icon-caret-down"></i></a>
              <ul class="dropdown-menu">
                <?php $todayh = getdate(); 
                      $d = $todayh['mday'];
                      $m = $todayh['mon'];
                      $y = $todayh['year'];?>
                <li><a href="<?php echo site_url().'/C_reportes/inicioReporteDia/';?>"><i class="icon-report"></i>&nbsp;<span>Inicio</span> </a></li>
                <li><a href="<?php echo site_url().'/C_reportes/serviciosDia/';echo "$y-$m-$d";?>"><i class="fa fa-file-o"></i> &nbsp;<span>Servicios del día</span></a></li>
              </ul>
            </li>

            <!-- @<li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="">Icons</a></li>
                <li><a href="">FAQ</a></li>
                <li><a href="">Pricing Plans</a></li>
                <li><a href="">Login</a></li>
                <li><a href="">Signup</a></li>
                <li><a href="">404</a></li>
              </ul>
            </li> -->

          <?php break;
        } ?>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
<div class="main">
  <div class="main-inner">
    <div class="container">