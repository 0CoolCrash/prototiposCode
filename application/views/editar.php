<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	$modeloZapa = htmlspecialchars($_GET["id_za"]);
		if(!preg_match("/^[0-9]+$/", $modeloZapa)){	
			$modeloZapa = 1;
		}
		
		if(empty($_GET["id_za"])){
			header('Location: Lista');
		} 
		
?><!DOCTYPE html>
<html lang="es">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<head>
	<meta charset="UTF-8">
	<title> Añadir Usuario </title>
	<style type="text/css">
	body {
		background-color: #e0e0e0e;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
	<script>
	
	function Campo(){
			if (document.getElementById('color').value <= 0){
				document.getElementById('upda').disabled=true;
			} else {
				document.getElementById('upda').disabled=false;
			}	
	}
	
	$(document).ready(function(){
		var identico = $("#ident").val();
		$.ajax({ 
			type: "POST",
			data: {"iden":identico},
			url     : "<?php echo base_url(); ?>Editar/Consulit",
			success : function (data) { 
			data = JSON.parse(data);
				document.getElementById("nombre").value=data[0].nombre_za;
				document.getElementById("numero").value=data[0].numero_za;
				document.getElementById("color").value=data[0].color_za;
			},
			error: function (xhr) { 
				alert("error");
			}
		});
	});

	</script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Menú</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="Lista">Zapateria El mago</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Catalogo de Zapatos</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">usuario <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Login"> Salir </a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
		
<br />
		<div class="container">	
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<h4>Actualizar datos</h4>
					</div>
					<form action="<?php echo base_url(); ?>Editar/updateZa" method="POST">
					<input hidden id="ident" name="ident" value="<?php echo $modeloZapa; ?>">
					<div class="panel-body" id="GetDatos">
							<label for="nombre"> Nombre </label>
									<input type="text" class="form-control" name="nombre" value="<?php ?>" required placeholder="Ingrese nombre de zapato" id="nombre">
										<br />
									<label for="numero"> Número </label>
									<input type="number" class="form-control" name="numero" required placeholder="25" id="numero">
										<br />	
									<label for="color"> Color </label>
									<input type="text" class="form-control" name="color" required placeholder="color de zapato" id="color" onkeyup="Campo()">
										<br />
									
									<center><a href="Lista" class="btn btn-danger"> Cancelar</a>
									<input type="submit" class="btn btn-success" id="upda" name="upda" value="Añadir" disabled="true"></center>
							</form>
					</div>
				</div>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>