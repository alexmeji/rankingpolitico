<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">

  <title>Ranking Politico v1.0</title>

  <link href="css/style.default.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="signin">

<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
  
    <div class="signinpanel">
        
        <div class="row">
            
            <div class="col-md-7">
                
                <div class="signin-info">
                    <div class="logopanel">
                        <h1><span>[</span> Ranking Politico GT <span>]</span></h1>
                    </div><!-- logopanel -->
                
                    <div class="mb20"></div>
                
                    <h5><strong>Bienvenido a la pagina de Ranking Politico GT!</strong></h5>
                    <ul>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> Listado de Partidos Politicos </li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> Listado de Candidatos </li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> CV Candidatos </li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> Ranking Candidatos </li>
                    </ul>
                    <div class="mb20"></div>
                    
                </div><!-- signin0-info -->
            
            </div><!-- col-sm-7 -->
            
            <div class="col-md-5">
                
                <form id="form-login">
                    <h4 class="nomargin">Ingresar</h4>
                    <p class="mt5 mb20">Ingresa para acceder al sistema.</p>
                
                    <input type="text" class="form-control uname" placeholder="Usuario" name="usuario" />
                    <input type="password" class="form-control pword" placeholder="Clave" name="password" />
                    <a href="#"><small>¿Olvidaste tu Clave?</small></a>
                    <button id="btn-login" class="btn btn-success btn-block">Ingresar</button>
                    
                </form>
            </div><!-- col-sm-5 -->
            
        </div><!-- row -->
        
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2015. Todos los derechos reservados ( HackatonCivicoGT )
            </div>
            <div class="pull-right">
                Creada Por: <a href="http://hackatoncivica.com/" target="_blank">#RankingPoliticoGT</a>
            </div>
        </div>
        
    </div><!-- signin -->
  
</section>




<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/retina.min.js"></script>

<script src="js/custom.js"></script>

<script>

$(document).ready(function(){
    $("#btn-login").on('click',function(e){
      e.preventDefault();
    $.getJSON("ws/login", $("#form-login").serialize(), function (data) {
          if (!data.resultado)
      {
              alert(data.mensaje);
          } 
      else 
      {
            setTimeout("window.location.href = 'control'", 700);
          }
      })
        .done(function () {
            //No implementado
        })
        .fail(function () {
            console.log("Error al acceder al Servicio");
        })
        .always(function () {
            //No implementado
        });


    });
});
</script>

</body>
</html>
