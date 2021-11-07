<?php defined("BASEPATH") or die("No direct scripts allowed"); ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Login Livraria</title>
		<link rel="stylesheet" href="http://codeigniter-wrk.sol/assets/bootstrap/dist/css/bootstrap.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
		<link rel="stylesheet" href="http://codeigniter-wrk.sol/assets/general.css">
	</head>
	<style>
		#col-login{
			margin-left: auto;
			margin-right: auto;
			margin-top: 15%;
			border: 1px solid black;
			padding: 20px 20px;
		}
		#alerta-senha{
			background-color: #ff7f7f7f;
			color: red;
			padding: 10px 10px;
		}
	</style>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-6" id="col-login">
					<form class="form" method="POST" action="a_cadastro">
						<h1 class="mb-3 text-center">Cadastro</h1>
						<div class="input-group input-group-inline">
							<label for="i-nome" class="form-label input-group-prepend">Nome</label>
							<input class="form-control" id="i-nome" type="text" name="nome"/>
						</div>
						<br>
						<div class="input-group input-group-inline">
							<label for="i-senha" class="form-label input-group-prepend">Senha</label>
							<input class="form-control" id="i-senha" type="password" name="senha"/>
							<button class="btn input-group-append" id="show-password" type="button"><span class="fas fa-eye"></span></button>
						</div>
						<div class="input-group input-group-inline">
							<label for="i-confirmacao" class="for-label input-group-prepend">Confirme sua senha</label>
							<input class="form-control" id="i-confirmacao" type="password" name="confirmacao"/>
							<button class="btn input-group-append" id="show-confirmacao" type="button"><span class="fas fa-eye"></span></button>
						</div>
						<br>
						<div id="alerta-senha" class="collapse"><span class="fas fa-info-circle"></span>As senhas não são compativeis</div>
						<br>
						<button class="btn btn-block btn-success" type="submit">Cadastrar</button>
					</form>
				</div>
			</div>
		</div>


		<!-- Scripts -->

		<script src="http://codeigniter-wrk.sol/assets/jquery/lib/jquery-3.4.1.min.js"></script>
		<script src="http://codeigniter-wrk.sol/assets/bootstrap/dist/js/bootstrap.js"></script>
		<script type="text/javascript">
			$(document).on("click", "#show-password", function() {
				$("#i-senha").prop("type", $("#i-senha").prop("type") == "password" ? "text" : "password");
			});

			$(document).on("click", "#show-confirmacao", function() { 
				$("#i-confirmacao").prop("type", $("#i-confirmacao").prop("type") == "password" ? "text" : "password");
			});

			$("#i-senha, #i-confirmacao").on("keyup keydown change", function(){
				if($("#i-senha").val() != $("#i-confirmacao").val()){
					$("#alerta-senha").collapse('show');
				}
				else $("#alerta-senha").collapse('hide');
			});

		</script>
	</body>
</html>

