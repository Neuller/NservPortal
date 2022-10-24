<?php
require_once "./Classes/Conexao.php";

$obj = new conectar();
$conexao = $obj -> conexao();

$sql = "SELECT * FROM usuarios WHERE grupo_usuario = 'admin' OR 'ADMIN' ";
$result = mysqli_query($conexao, $sql);

$validar = 0;
if (mysqli_num_rows($result) > 0) {
	$validar = 1;
}
?>

<?php require_once "./Dependencias.php" ?>

<!DOCTYPE html>
<html lang="pt-br" class="Personalizado">

<body class="bgGray">
	<div class="container conteudo">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-default formLogin">

				<div class="panel-heading">
					OLÁ! ACESSE JÁ.
				</div>

				<div class="panel panel-body">
					<!-- IMAGEM -->
					<div class="imagemPainel">
						<img src="Img/NSERV.png" width="100%">
					</div>
					<form id="frmLogin" class="col-md-12 col-sm-12 col-xs-12">
						<!-- LOGIN -->
						<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
							<div>
								<label>LOGIN</label>
								<input type="text" class="form-control input-sm text-uppercase" name="login" id="login">
							</div>
						</div>
						<!-- SENHA -->
						<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
							<div>
								<label>SENHA</label>
								<input type="password" class="form-control input-sm text-uppercase" name="senha" id="senha">
							</div>
						</div>
						<!-- BOTÕES -->
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="btnRight">
								<?php if (!$validar) : ?>
									<span class="btn btn-success btn-lg" id="registrar" title="REGISTRAR">REGISTRAR</span>
								<?php endif; ?>
								<span class="btn btn-primary btn-lg" id="acessar" title="ACESSAR">ACESSAR</span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

<script type="text/javascript">
	$(document).ready(function() {
		validarForm("frmLogin");
		camposObrigatorios(["login", "senha"], true);
		setEvents();
	});

	function setEvents() {
		$("#acessar").click(function() {
			var validator = $("#frmLogin").validate();
			validator.form();
			var checkValidator = validator.checkForm();

			if (checkValidator == false) {
				alertify.error("VERIFIQUE OS CAMPOS OBRIGATORIOS");
				return false;
			}

			dados = $("#frmLogin").serialize();

			$.ajax({
				type: "POST",
				data: dados,
				url: "./Procedimentos/Login/Login.php",
				success: function(r) {
					if (r == 1) {
						window.location = "./Principal.php";
					} else {
						alertify.error("ACESSO NEGADO");
					}
				}
			});
		});

		$("#registrar").click(function() {
			window.location = "./Registrar.php";
		});

		$("#senha").keypress(function(event) {
			if (event.keyCode === 13) {
				$("#acessar").click();
			}
		});
	}
</script>