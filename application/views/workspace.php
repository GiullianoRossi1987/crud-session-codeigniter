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
		<div class="container-fluid full-width">
			<div class="row">
				<div class="col-md-12 col-12 collapse" id="col-add">
					<div class="form">
						<div class="input-group">
							<label for="i-a-livro" class="form-label">Livro: </label>
							<input id="i-a-livro" type="text" class="form-control"/>
						</div>
						<div class="input-group">
							<label for="i-a-editora" class="form-label">Editora: </label>
							<input id="i-a-editora" type="text" class="form-control"/>
						</div>
						<div class="input-group">
							<label for="i-a-autor" class="form-label">Autor: </label>
							<input id="i-a-autor" type="text" class="form-control"/>
						</div>
						<div class="input-group">
							<label for="i-a-publicacao" class="form-label">Publicacao: </label>
							<input id="i-a-publicacao" class="form-control" type="date"/>
						</div>
						<button class="btn btn-lg btn-success" type="button" id="add-livro">Adicionar Livro</button>
					</div>
				</div>
				<button class="btn btn-lg btn-primary" id="collapse-add" type="button"><span class="fas fa-plus"></span> Livro</button>
			</div>
		</div>
		<hr>
		<div class="container-fluid full-width">
			<div class="row">
				<div class="col-12 col-md-12">
					<table id="spawn" class="table">
						<tr>
							<th>Cod</th>
							<th>Livro</th>
							<th>Editora</th>
							<th>Autor</th>
							<th>Publicado em</th>
							<th>Alterar</th>
							<th>Remover</th>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<div class="modal fade" tabindex="-1" id="modal-update" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-head">
						<h1 id="md-l"></h1>
					</div>
					<div class="modal-body">
						<div class="input-group">
							<label for="i-u-livro" class="form-label">Livro: </label>
							<input id="i-u-livro" type="text" class="form-control"/>
						</div>
						<div class="input-group">
							<label for="i-u-editora" class="form-label">Editora: </label>
							<input id="i-u-editora" type="text" class="form-control"/>
						</div>
						<div class="input-group">
							<label for="i-u-autor" class="form-label">Autor: </label>
							<input id="i-u-autor" type="text" class="form-control"/>
						</div>
						<div class="input-group">
							<label for="i-u-publicacao" class="form-label">Publicacao: </label>
							<input id="i-u-publicacao" class="form-control" type="date"/>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-lg" type="button" data-dismiss="modal">Cancelar &times;</button>
						<button class="btn btn-lg btn-success" type="button" id="alt-livro">Alterar Livro</button>
					</div>
				</div>
			</div>
		</div>


		<!-- Scripts -->

		<script src="http://codeigniter-wrk.sol/assets/jquery/lib/jquery-3.4.1.min.js"></script>
		<script src="http://codeigniter-wrk.sol/assets/bootstrap/dist/js/bootstrap.js"></script>
		<script type="text/javascript">

			function genDelButton(livro){
				var bt = document.createElement("button");
				bt.setAttribute("livro", livro.nm_livro);
				bt.innerHTML = "<span class=\"fas fa-times\"></span>";
				bt.classList.add("bt-remove");
				bt.classList.add("btn");
				bt.classList.add("btn-danger");
				bt.onclick = function(){
					$.post({
						url: "livro/rm",
						data: { "livro": livro.nm_livro },
						success: function(resp){
						alert("Deletado");
						window.location.reload();
					}
				});}

				return bt;
			}

			function genUpdButton(livro){
				var bt = document.createElement("button");
				bt.setAttribute("livro", livro.nm_livro);
				bt.innerHTML = "<span class=\"fas fa-edit\"></span>";
				bt.classList.add("bt-update");
				bt.classList.add("btn");
				bt.classList.add("btn-secondary");
				bt.onclick = function(){
					$("#modal-update").modal("show");

					$("#i-u-livro").val(livro.nm_livro);
					$("#i-u-editora").val(livro.nm_editora);
					$("#i-u-autor").val(livro.nm_autor);
					$("#i-u-publicacao").val(livro.dt_publicado);

					$("#alt-livro").attr("livro", livro.nm_livro);
				}
				return bt;
			}

			
			
			$(document).ready(function(){
				$.post({
					url: "livros",
					dataType: "json",
					success: function(resp){
						resp.forEach(livro =>{
							var row_table = document.createElement("tr");
							var td_nome = document.createElement("td");
							var td_editora = document.createElement("td");
							var td_autor = document.createElement("td");
							var td_pub = document.createElement("td");
							var td_cod = document.createElement("td");
							var td_rm = document.createElement("td");
							var td_al = document.createElement("td");

							td_cod.innerText = livro.cd_livro;
							td_nome.innerText = livro.nm_livro;
							td_editora.innerText = livro.nm_editora;
							td_autor.innerText = livro.nm_autor;
							td_pub.innerText = livro.dt_publicado;
							td_rm.appendChild(genDelButton(livro));
							td_al.appendChild(genUpdButton(livro));

							row_table.appendChild(td_cod);
							row_table.appendChild(td_nome);
							row_table.appendChild(td_editora);
							row_table.appendChild(td_autor);
							row_table.appendChild(td_pub);
							row_table.appendChild(td_al);
							row_table.appendChild(td_rm);
							$("#spawn").append(row_table);
						});
				       	}
				});
			});

			$("#add-livro").on("click", function(){
				$.post({
					url: "livro/add",
					data: {
						"livro": $("#i-a-livro").val(),
						"editora": $("#i-a-editora").val(),
						"autor": $("#i-a-autor").val(),
						"publicacao": $("#i-a-publicacao").val()
					},
					success: function(resp){ 
						alert("adicionado");
						window.location.reload();
					}
				});
			});

			$(document).on("click", "#alt-livro", function(){
				$.post({
					url: "livro/up",
					data: {
						livro: $(this).attr("livro"),
						n_livro: $("#i-u-livro").val(),
						n_editora: $("#i-u-editora").val(),
						n_autor: $("#i-u-autor").val(),
						n_publicado: $("#i-u-publicacao").val()
					},
					success: function(resp){
						alert("alterado");

						$("#modal-update").modal("hide");

						$("#i-u-livro").val(null);
						$("#i-u-editora").val(null);
						$("#i-u-autor").val(null);
						$("#i-u-publicacao").val(null);

						$("#alt-livro").attr("livro", null);
						window.location.reload();
					}

				});
			});
			
					


			$("#collapse-add").on("click", function(){
				$("#col-add").collapse("toggle");
			});

		</script>
	</body>
</html>

