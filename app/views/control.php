<?php include('header.php'); ?>

	<div id="contenido-dinamico">
		<div class="tile-stats tile-red">Contenido Dinamico</div>
	</div>

	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/jquery-migrate-1.2.1.min.js"></script>
	<script src="js/sammy.min.js"></script>
	<script type="text/javascript">

		$(".btn-salir").on("click", salirSistema);
	
		var ratPack = $.sammy(function(e) {
		this.element_selector = '#contenido-dinamico';

		this.get('#/', function(context) {
			context.app.swap('');
			context.$element().load("layouts/panel",function(){});
		});

		this.get('#/panel', function(context) {
			context.app.swap('');
			$("#main-menu").find('li').removeClass('active');
			context.$element().load("layouts/panel",function(){});
			$("#menu-panel").parent().addClass('active');
		});

		this.get('#/usuarios', function(context) {
			context.app.swap('');
			$("#main-menu").find('li').removeClass('active');
			context.$element().load("layouts/usuarios",function(){});
			$("#menu-panel").parent().addClass('active');
		});

		this.get('#/tipoorganizacion', function(context) {
			context.app.swap('');
			$("#main-menu").find('li').removeClass('active');
			context.$element().load("layouts/tipoorganizacion",function(){});
			$("#menu-panel").parent().addClass('active');
		});

		this.get('#/organizacion', function(context) {
			context.app.swap('');
			$("#main-menu").find('li').removeClass('active');
			context.$element().load("layouts/organizacion",function(){});
			$("#menu-panel").parent().addClass('active');
		});

		this.get('#/candidaturas', function(context) {
			context.app.swap('');
			$("#main-menu").find('li').removeClass('active');
			context.$element().load("layouts/candidaturas",function(){});
			$("#menu-panel").parent().addClass('active');
		});

		this.get('#/puestos', function(context) {
			context.app.swap('');
			$("#main-menu").find('li').removeClass('active');
			context.$element().load("layouts/puestos",function(){});
			$("#menu-panel").parent().addClass('active');
		});

		this.get('#/candidatos', function(context) {
			context.app.swap('');
			$("#main-menu").find('li').removeClass('active');
			context.$element().load("layouts/candidatos",function(){});
			$("#menu-panel").parent().addClass('active');
		});

		this.get('#/logros', function(context) {
			context.app.swap('');
			$("#main-menu").find('li').removeClass('active');
			context.$element().load("layouts/logros",function(){});
			$("#menu-panel").parent().addClass('active');
		});

		this.get('#/criterios', function(context) {
			context.app.swap('');
			$("#main-menu").find('li').removeClass('active');
			context.$element().load("layouts/criterios",function(){});
			$("#menu-panel").parent().addClass('active');
		});

		this.get('#/criterioscandidatos', function(context) {
			context.app.swap('');
			$("#main-menu").find('li').removeClass('active');
			context.$element().load("layouts/criterioscandidatos",function(){});
			$("#menu-panel").parent().addClass('active');
		});

		this.get('#/preguntas', function(context) {
			context.app.swap('');
			$("#main-menu").find('li').removeClass('active');
			context.$element().load("layouts/preguntas",function(){});
			$("#menu-panel").parent().addClass('active');
		});

		this.notFound = function(context,url){
			console.log("Url no encontrada");
       	 }
    	});

	$(function() {
		ratPack.run('#/');
	});

	function salirSistema( e )
	{	
		e.preventDefault();
		$.ajax(
		{
			type: "GET",
			url: "/ws/logout",
			dataType: "json",
			data: {},
			success:function(result)
			{
				if(result.resultado)
				{
					setTimeout(function(){
						window.location.href = "/";	
					},300);
				}
				else
				{
					alert(result.mensaje);
				}
			},
			error: function(error)
			{
				alert(error);
				console.error(error);
			}
		});
	}

  </script>
<?php include('footer.php'); ?>