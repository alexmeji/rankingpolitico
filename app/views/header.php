  <!DOCTYPE html>
  <?php
 if(!Session::has('idusuario')){
    header('location:../');
    die();
 }
 else
 {
  //var_dump(Session::all());
 }
?>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">

    <title>Ranking Politico V1.0</title>

    <link href="css/style.default.css" rel="stylesheet">
    <link href="css/jquery.datatables.css" rel="stylesheet">
    <link href="css/jquery.gritter.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/morris.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-timepicker.min.css" />
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <!-- Preloader -->
  <div id="preloader">
      <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
  </div>

  <section>
    
    <div class="leftpanel">
      
      <div class="logopanel">
          <h1><span>[</span> Ranking Politico <span>]</span></h1>
      </div><!-- logopanel -->
          
      <div class="leftpanelinner">    
          
          <!-- This is only visible to small devices -->
          <div class="visible-xs hidden-sm hidden-md hidden-lg">   
              <div class="media userlogged">
                  <img alt="" src="images/photos/loggeduser.png" class="media-object">
                  <div class="media-body">
                      <h4>Alex Mejicanos</h4>
                      <span>"HackatonCivico"</span>
                  </div>
              </div>
            
              <h5 class="sidebartitle actitle">Cuenta</h5>
              <ul class="nav nav-pills nav-stacked nav-bracket mb30">
                <li><a href="#" class="btn-salir"><i class="fa fa-sign-out"></i> <span>Cerrar Sesión</span></a></li>
              </ul>
          </div>
        
        <h5 class="sidebartitle">Navegación</h5>
        <ul class="nav nav-pills nav-stacked nav-bracket">
          <li ><a href="#/panel"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
          <li ><a href="#/usuarios"><i class="fa fa-user"></i> <span>Usuarios</span></a></li>
          <li ><a href="#/tipoorganizacion"><i class="fa  fa-bookmark"></i> <span>Tipo Organizacion</span></a></li>
          <li ><a href="#/organizacion"><i class="fa  fa-building-o"></i> <span>Organizacion</span></a></li>
          <li ><a href="#/candidaturas"><i class="fa  fa-briefcase"></i> <span>Candidaturas</span></a></li>
          <li ><a href="#/puestos"><i class="fa  fa-road"></i> <span>Puestos</span></a></li>
          <li ><a href="#/candidatos"><i class="fa  fa-users"></i> <span>Candidatos</span></a></li>
          <li ><a href="#/logros"><i class="fa  fa-tags"></i> <span>Logros</span></a></li>
          <li ><a href="#/criterios"><i class="fa  fa-gavel"></i> <span>Criterios</span></a></li>
          <li ><a href="#/criterioscandidatos"><i class="fa  fa-sort-amount-desc"></i> <span>Criterios Candidatos</span></a></li>
          <li ><a href="#/preguntas"><i class="fa  fa-list"></i> <span>Preguntas</span></a></li>
        </ul>
        
        
      </div><!-- leftpanelinner -->
    </div><!-- leftpanel -->
    
    <div class="mainpanel">
      
      <div class="headerbar">
        
        <a class="menutoggle"><i class="fa fa-bars"></i></a>
        
        
        
        <div class="header-right">
          <ul class="headermenu">
            
            <li>
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                  <img src="images/photos/loggeduser.png" alt="" />
                  Alex Mejicanos
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                  <li><a class="btn-salir" href="#"><i class="glyphicon glyphicon-log-out"></i> Cerrar Sesión</a></li>
                </ul>
              </div>
            </li>
            
          </ul>
        </div><!-- header-right -->
        
      </div><!-- headerbar -->