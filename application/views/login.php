<?php defined("BASEPATH") or die("No direct scripts allowed"); ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Login Livraria</title>
		<link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/general.css">
	</head>
	<style>
		#col-login{
			margin-left: auto;
			margin-right: auto;
			margin-top: 15%;
			border: 1px solid black;
			padding: 20px 20px;
		}
	</style>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-6" id="col-login">
					<form class="form" method="POST" action="usuario/a_login">
						<h1 class="mb-3 text-center">Login</h1>
						<div class="input-group input-group-inline">
							<label for="i-nome" class="form-label input-group-prepend">Nome</label>
							<input class="form-control" id="i-nome" type="text" name="nome"/>
						</div>
						<br>
						<div class="input-group input-group-inline">
							<label for="i-senha" class="form-label input-group-prepend">Senha</label>
							<input class="form-control" id="i-senha" type="password" name="senha"/>
							<button class="btn input-group-append" id="show-password" type="button"><span class="fas fa-eye"></button>
						</div>
						<button class="btn btn-block btn-success" type="submit">Login</button>
						<br>
						<small>
							<a href="http://codeigniter-wrk.sol/usuario/cadastro">Não tem uma conta? Cadastre-se</a>
						<small>
					</form>
				</div>
			</div>
		</div>


		<!-- Scripts -->

		<script src="assets/jquery/lib/jquery-3.4.1.min.js"></script>
		<script src="assets/bootstrap/dist/js/bootstrap.js"></script>
		<script type="text/javascript">
			$(document).on("click", "#show-password", function() {
				$("#i-senha").prop("type", $("#i-senha").prop("type") == "password" ? "text" : "password");
			});
		</script>
	</body>
</html>
		

