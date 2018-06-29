<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<head>
	<meta charset="UTF-8">
	<title> Accede a nuestra tienda </title>
		<!-- Latest compiled and minified CSS -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		background-image: #e0e0e0;
		margin:0;
		padding:0;
		font-family: 'Amaranth', sans-serif;
	}
	
	input[type='text'], 
	input[type='password'] {
			outline: 0px;
			margin-bottom:20px;
			width: 100%;
			height:40px;
			color:#212121;
			font-size:15px;
			border-radius:10px;
	}
	::-webkit-input-placeholder { /* Chrome/Opera/Safari */
		color: #e0e0e0;
		text-align:center;
	}
	::-moz-placeholder { /* Firefox 19+ */
		color: #e0e0e0;
		text-align:center;
	}
	:-ms-input-placeholder { /* IE 10+ */
		color: #e0e0e0;
		text-align:center;
	}
	:-moz-placeholder { /* Firefox 18- */
		color: #e0e0e0;
		text-align:center;
	}
	
	.titulo {
		font-size:3rem;
	}
	</style>

<script>
	function Campo_vacio(){
      if (document.getElementById('clave').value <= 0){
			document.getElementById('enviar').disabled=true;
		} else {
			document.getElementById('enviar').disabled=false;
        }
   }
   
   
   function CampoNull(){
      if (document.getElementById('passwordD').value <= 0){
			document.getElementById('enviar2').disabled=true;
		} else {
			document.getElementById('enviar2').disabled=false;
        }
   }
   
</script>
</head>
<body>

<div class="container">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<div class="panel panel-info">
					<div class="panel-heading">
						<center><p class="titulo">Login</p></center>
					</div>
					<div class="pane-body">
						<br />
						<form action="<?php echo base_url(); ?>Login/Access" method="POST">
							<input type="text" id="usuario" class="form-control" required name="usuario" placeholder="example">
							<br />
							<input type="password" required class="form-control" name="clave" id="clave" placeholder="********" onkeyup="Campo_vacio()">
							<center>
							<input type="reset" class="btn btn-default" value="Limpiar">
							<input type="submit" class="btn btn-success" id="enviar" name="enviar"value="Acceder" disabled="true">
							</center>
						</form>
						<br />
					</div>
					<div class="panel-footer">
						<a href="" data-toggle="modal" data-target="#registro" class="btn btn-info"> Registrate </a>
					</div>
					</div>
				</div>
				<div class="col-md-4">
				</div>
				
			</div>
		</div>
<div class="modal fade" id="registro" role="dialog" style="background-color: rgba(0,0,0,.5);"> 
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal-danger">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> <i class="fa fa-upload"></i> &nbsp;  Registrate </h4>
        </div>
		<form action="<?php echo base_url(); ?>Login/anadirUser" method="POST">
        <div class="modal-body">
          <div class="row">
				<div class="col-md-12">
					<input type="text" name="nombreu" required autofocus id="nombreu" class="form-control" aria-describedby="basic-addon1">
				</div>
			</div>
			<br />
			<div class="row">
				<div class="col-sm-12">
						<input type="password" name="passwordD" required id="passwordD" class="form-control" placeholder="*******" aria-describedby="basic-addon1" onkeyup="CampoNull()">
				</div>
			</div>
        </div>
        <div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-trash"></i> Cancelar</button>
			<input type="submit" class="btn btn-success" id="enviar2" name="enviar2" value="Registrar" disabled="true">
        </div>
		</form>
      </div>
    </div>
  </div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>