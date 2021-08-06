<?php
session_start();
if (isset($_SESSION['User'])) {
?>
<!DOCTYPE html>
<html>
	<head>
		<?php require_once "../../Classes/Conexao.php"; 
		$c = new conectar();
		$conexao = $c -> conexao();
		$idCliente = $_GET["id"];
		?>
	</head>

	<body>
		<div class="container">
			<!-- CABEÇALHO -->
			<div class="cabecalho bgGray">
				<div class="text-center textCabecalho opacidade">
					<h3><strong>VISUALIZAR CLIENTE</strong></h3>
				</div>
			</div>

			<!-- FORMULÁRIO -->
			<div class="divFormulario">
				<div class="mx-auto">
					<form id="frmClientesView">
						<div>
							<!-- FORMULÁRIO DADOS PESSOAIS -->
							<div class='col-md-12 col-sm-12 col-xs-12'>
								<div class="text-left">
									<h4><strong>DADOS PESSOAIS </strong><span class="glyphicon glyphicon-user ml-15"></span></h4>
								</div>
								<hr>
							</div>
							<!-- ID CLIENTE -->
							<div>
								<input type="text" hidden="" id="idClienteV" name="idClienteV">
							</div>
							<!-- NOME -->
							<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
									<label>NOME COMPLETO</label>
									<input readonly type="text" class="form-control input-sm align text-uppercase" id="nomeV" name="nomeV">
								</div>
							</div>
							<!-- CPF -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>CPF</label>
									<input readonly type="text" class="form-control input-sm align text-uppercase" id="cpfV" name="cpfV">
								</div>
							</div>
							<!-- CNPJ -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>CNPJ</label>
									<input readonly type="text" class="form-control input-sm align text-uppercase" id="cnpjV" name="cnpjV">
								</div>
							</div>
							<!-- E-MAIL -->
							<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
									<label>E-MAIL</label>
									<input readonly type="text" class="form-control input-sm align text-uppercase" id="emailV" name="emailV">
								</div>
							</div>

							<!-- FORMULÁRIO ENDEREÇO -->
							<div class='separador col-md-12 col-sm-12 col-xs-12'>
								<div class="text-left">
									<h4><strong>ENDEREÇO </strong><span class="glyphicon glyphicon-home ml-15"></span></h4>
								</div>
								<hr>
							</div>
							<!-- CEP -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>CEP</label>
									<input readonly type="text" class="form-control input-sm align text-uppercase" id="cepV" name="cepV">
								</div>
							</div>
							<!-- BAIRRO -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>BAIRRO</label>
								<input readonly type="text" class="form-control input-sm align text-uppercase" id="bairroV" name="bairroV">
							</div>
							</div>
							<!-- ENDEREÇO -->
							<div class="col-md-8 col-sm-8 col-xs-8 itensFormulario">
								<div>
									<label>ENDEREÇO</label>
									<input readonly type="text" class="form-control input-sm align text-uppercase" id="enderecoV" name="enderecoV">
								</div>
							</div>
							<!-- UF -->
							<div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
								<div>
									<label>UF</label>
									<input readonly type="text" class="form-control input-sm align text-uppercase" id="ufV" name="ufV">
								</div>
							</div>
							<!-- NÚMERO -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>NÚMERO</label>
									<input readonly type="text" class="form-control input-sm align text-uppercase" id="numeroV" name="numeroV">
								</div>
							</div>
							<!-- COMPLEMENTO -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>COMPLEMENTO</label>
									<input readonly type="text" class="form-control input-sm align text-uppercase" id="complementoV" name="complementoV">
								</div>
							</div>

							<!-- FORMULÁRIO TELEFONES -->
							<div class='separador col-md-12 col-sm-12 col-xs-12'>
								<div class="text-left">
									<h4><strong>TELEFONES </strong><span class="glyphicon glyphicon-phone-alt ml-15"></span></h4>
								</div>
								<hr>
							</div>
							<!-- TELEFONE -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>TELEFONE</label>
									<input readonly type="text" class="form-control input-sm align text-uppercase" id="telefoneV" name="telefoneV">
								</div>
							</div>
							<!-- CELULAR -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>CELULAR</label>
									<input readonly type="text" class="form-control input-sm align text-uppercase" id="celularV" name="celularV">
								</div>
							</div>		
							<!-- TELEFONE ALTERNATIVO -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>TELEFONE ALTERNATIVO</label>
									<input readonly type="text" class="form-control input-sm align text-uppercase" id="telefone2V" name="telefone2V">
								</div>
							</div>
							<!-- CELULAR ALTERNATIVO -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>CELULAR ALTERNATIVO</label>
									<input readonly type="text" class="form-control input-sm align text-uppercase" id="celular2V" name="celular2V">
								</div>
							</div>	
							<!-- BOTÕES -->
							<div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
								<div class="btnRight">
									<span class="btn btn-danger btn-lg" id="btnVoltar" title="VOLTAR">VOLTAR</span>
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
	$(document).ready(function($) {
		idCliente = "<?php echo @$idCliente ?>";
		carregarDados(idCliente);
	});

	$('#btnVoltar').click(function() {
		$('#frmClientesView')[0].reset();
		$('#conteudo').load("./Views/Clientes/ProcurarClientes.php");
	});

	function carregarDados(id) {
		$.ajax({
			type: "POST",
			data: "idCliente=" + id,
			url: "./Procedimentos/Clientes/ObterDadosCliente.php",
			success: function(r) {
				dado = jQuery.parseJSON(r);
				$('#idClienteV').val(dado['id_cliente']);
				$('#nomeV').val(dado['nome']);
				$('#cpfV').val(dado['cpf']);
				$('#cnpjV').val(dado['cnpj']);
				$('#cepV').val(dado['cep']);
				$('#bairroV').val(dado['bairro']);
				$('#ufV').val(dado['uf']);
				$('#enderecoV').val(dado['endereco']);
				$('#numeroV').val(dado['numero']);
				$('#complementoV').val(dado['complemento']);
				$('#telefoneV').val(dado['telefone']);
				$('#telefone2V').val(dado['telefone2']);
				$('#celularV').val(dado['celular']);
				$('#celular2V').val(dado['celular2']);
				$('#emailV').val(dado['email']);
			}
		});
	}
</script>
<?php
} else {
	header("location:./index.php");
}
?>
