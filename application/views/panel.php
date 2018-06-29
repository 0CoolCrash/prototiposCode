<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<head>
	<meta charset="UTF-8">
	<title> Bienvenido </title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<style type="text/css">
	body {
		background-color: #e0e0e0e;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	</style>
	<script>
		function CampoVac(){
			if (document.getElementById('color').value <= 0){
				document.getElementById('ana').disabled=true;
			} else {
				document.getElementById('ana').disabled=false;
			}	
	}

function Eliminar(id_za) { 
	event.preventDefault();
	 var respuesta=confirm("¿Está seguro que desea Eliminarlo?");
     if(respuesta==true)
		$.ajax({ 
			type: "POST",
			data: {"idzapa":id_za},
			url     : "<?php echo base_url(); ?>Lista/Eliminar",
			success : function (data) { 
				alert('Eliminado Correctamente');
				window.location = 'Lista';
			},
			error: function (xhr) { 
				alert("error");
			}
		});
	else
         return 0;	 
	}
		
	$.post(baseurl="Lista/Consultar",
		function(data){
			//alert(data);
			var obj = JSON.parse(data);
			$.each(obj, function(i, item){
				$('#zapatos').append(
					'<tr>'+
						'<td>'+item.nombre_za+'</td>'+
						'<td>'+item.numero_za+'</td>'+
						'<td>'+item.color_za+'</td>'+
						'<td><button class="btn btn-danger" onclick="Eliminar('+item.id_za+')"> Eliminar </button></td>'+
						'<td><a href="Editar?id_za='+item.id_za+'" class="btn btn-warning"> Editar </a></td>'+
					'</tr>'
				);
			})
		});

	</script>
	

<!-- Latest compiled and minified JavaScript -->
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Gabino Salinas <span class="caret"></span></a>
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
				<div class="col-md-12">
					<p style="float:right;"><a href="" data-toggle="modal" data-target="#anadirZapata" class="btn btn-info">Añadir nuevos modelos</a></p>
				</div>
			</div>
			<br />
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover" id="zapatos">
						<thead>
							<tr>
								<th>Nombre del Zapato</th>
								<th>Número</th>
								<th>Color</th>
								<th colspan="3"><center>Opciones </center></th>
							</tr>
							</thead>
								<tbody>									
								</tbody>
					</table>
				</div>
			</div>
		</div>

		
		
		
		
<div class="modal fade" id="anadirZapata" role="dialog" style="background-color: rgba(0,0,0,.5);"> 
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal-danger">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> <i class="fa fa-upload"></i> &nbsp;  Registrar nuevo modelo </h4>
        </div>
		<form action="<?php echo base_url(); ?>Lista/guardarZa" method="POST">
        <div class="modal-body">
        	<label for="nombre"> Nombre </label>
			<input type="text" class="form-control" name="nombre" required placeholder="Ingrese nombre de zapato" id="nombre">
				<br />
			<label for="numero"> Número </label>
			<input type="number" class="form-control" name="numero" required placeholder="25" id="numero">
				<br />	
			<label for="color"> Color </label>
			<input type="text" class="form-control" name="color" required placeholder="color de zapato" id="color" onkeyup="CampoVac()">
				<br />
					
        </div>
        <div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-trash"></i> Cancelar</button>
			<input type="submit" class="btn btn-success" id="ana" name="ana" value="Añadir" disabled="true">
        </div>
		</form>
		</form>
      </div>
    </div>
  </div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>