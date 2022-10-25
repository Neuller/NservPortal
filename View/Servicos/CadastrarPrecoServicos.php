<?php
session_start();
if (isset($_SESSION["User"])) {
?>
<!DOCTYPE html>
<html>
	<head>
		<?php require_once "../../Model/Conexao.php";
		$c = new conectar();
		$conexao = $c -> conexao();
		?>
	</head>
	<body>
		<div class="container">
			<!-- CABEÇALHO -->
			<div class="cabecalho bgGray">
				<div class="text-center textCabecalho opacidade">
					<h3><strong>CADASTRAR PREÇO DE SERVIÇOS</strong></h3>
				</div>
			</div>
			<!-- FORMULÁRIO -->
			<div class="divFormulario">
				<div class="mx-auto">
					<form id="frmPrecoServicos">
						<div>
							<!-- DESCRIÇÃO -->
							<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
									<label>DESCRIÇÃO</label>
									<input type="text" class="form-control input-sm text-uppercase" id="descricao" name="descricao" maxlenght="500">
								</div>
							</div>
							<!-- GARANTIA -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>GARANTIA</label>
									<select class="form-control text-uppercase input-sm" id="garantia" name="garantia" maxlength="100">
										<option value="">SELECIONE UMA GARANTIA</option>
										<option value="FUNCIONAL">FUNCIONAL</option>
										<option value="30 DIAS">30 DIAS</option>
										<option value="90 DIAS">90 DIAS</option>
									</select>
								</div>
							</div>
							<!-- VALOR -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>VALOR</label>
									<input type="number" class="form-control text-uppercase valorTotal input-sm" id="valor" name="valor" maxlength="10">
								</div>
							</div>
							<!-- BOTÕES -->
							<div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
								<div class="btnRight">
									<span class="btn btn-danger btn-lg" id="btnVoltar" title="VOLTAR">VOLTAR</span>
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
		validarForm("frmPrecoServicos");
		camposObrigatorios(["descricao", "valor"], true);
		setEvents();
	});

	function setEvents() {
		$("#btnCadastrar").click(function() {
			var validator = $("#frmPrecoServicos").validate();
			validator.form();
			var checkValidator = validator.checkForm();

			if (checkValidator == false) {
				alertify.error("VERIFIQUE O(S) CAMPO(S) OBRIGATORIO(S)");
				return false;
			}
			var garantia = $("#garantia").val();

			if (garantia == "") {
				$("#garantia").val("FUNCIONAL");
			}

			dados = $("#frmPrecoServicos").serialize();
			$.ajax({
				type: "POST",
				data: dados,
				url: "./Controller/Servicos/CadastrarPrecoServicos.php",
				success: function(r) {
					if (r == 1) {
						$("#frmPrecoServicos")[0].reset();
						alertify.success("SUCESSO");
					} else {
						alertify.error("ERRO");
					}
				}
			});
		});

		$("#btnVoltar").click(function() {
			$("#frmPrecoServicos")[0].reset();
			$("#conteudo").load("./View/Servicos/PrecoServicos.php");
		});
	}
</script>
<?php
} else {
	header("location:./index.php");
}
?>