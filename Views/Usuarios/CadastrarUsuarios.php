<?php
session_start();
if (isset($_SESSION['User'])) {
?>
	<!DOCTYPE html>
	<html>

	<head>
		<?php require_once "../../Classes/Conexao.php";
		$c = new conectar();
		$conexao = $c->conexao();
		?>
	</head>

	<body>
		<div class="container">
			<!-- CABEÇALHO -->
			<div class="cabecalho bgGray">
				<div class="text-center textCabecalho opacidade">
					<h3><strong>CADASTRAR USUÁRIOS</strong></h3>
				</div>
			</div>
			<!-- FORMULÁRIO -->
			<div class="divFormulario">
				<div class="mx-auto">
					<form id="frmUsuarios">
						<div>
							<!-- FORMULÁRIO DADOS USUÁRIOS -->

							<!-- NOME -->
							<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
									<label>NOME COMPLETO</label>
									<input type="text" class="form-control input-sm text-uppercase" id="nome" name="nome" maxlenght="100">
								</div>
							</div>
							<!-- LOGIN -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>LOGIN</label>
									<input type="text" class="form-control input-sm text-uppercase" id="login" name="login" maxlenght="100">
								</div>
							</div>
							<!-- SENHA -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>SENHA</label>
									<input type="password" class="form-control input-sm align text-uppercase" id="senha" name="senha" maxlenght="100">
								</div>
							</div>
							<!-- GRUPO -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>GRUPO</label>
									<select class="form-control input-sm" id="grupoUsuario" name="grupoUsuario">
										<option value="">SELECIONE UM GRUPO</option>
										<option value="ADMIN">ADMIN</option>
										<option value="ADMIN/FINAN">ADMIN/FINAN</option>
										<option value="GERAL">GERAL</option>
									</select>
								</div>
							</div>
							<!-- E-MAIL -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>E-MAIL</label>
									<input type="text" class="form-control input-sm align text-uppercase" placeholder="exemplo@exemplo.com" id="email" name="email" maxlenght="100">
								</div>
							</div>

						</div><!-- BOTÕES -->
						<div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
							<div class="btnRight">
								<span class="btn btn-primary btn-lg" id="btnCadastrar" title="CADASTRAR">CADASTRAR</span>
							</div>
						</div>
				</div>
				</form>
			</div>
		</div>
		</div>
	</body>

	</html>

	<script type="text/javascript">
		$(document).ready(function() {
			initForm();
			setEvents();
		});

		function initForm() {
			validarForm("frmUsuarios");
			camposObrigatorios(["nome", "login", "email", "senha", "grupoUsuario"], true);
		}

		function setEvents() {
			$("#btnCadastrar").click(function() {
				var validator = $("#frmUsuarios").validate();
				validator.form();
				var checkValidator = validator.checkForm();

				if (checkValidator == false) {
					alertify.error("VERIFIQUE O(S) CAMPO(S) OBRIGATORIO(S)");
					return false;
				}

				dados = $("#frmUsuarios").serialize();

				$.ajax({
					type: "POST",
					data: dados,
					url: "./Procedimentos/Usuarios/CadastrarUsuarios.php",
					success: function(r) {
						if (r > 0) {
							$("#frmUsuarios")[0].reset();
							alertify.success("SUCESSO");
						} else {
							alertify.error("ERRO");
						}
					}
				});
			});
		}
	</script>
<?php
} else {
	header("location:./index.php");
}
?>