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
		$idServico = $_GET["id"];
		?>
	</head>

	<body>
		<div class="container">
			<!-- CABEÇALHO -->
			<div class="cabecalho bgGray">
				<div class="text-center textCabecalho opacidade">
					<h3><strong>VISUALIZAR SERVIÇO</strong></h3>
				</div>
			</div>

			<!-- FORMULÁRIO -->
			<div class="divFormulario">
				<div class="mx-auto">
						<form id="frmVisualizaServico">
							<div>
							<!-- ID -->
							<div>
								<input readonly type="text" hidden="" id="idServicoView" name="idServicoView">
							</div>
							<!-- DADOS DO CLIENTE -->
							<div class='col-md-12 col-sm-12 col-xs-12 separador itensFormulario'>
								<div>
									<h4><strong>DADOS DO CLIENTE </strong><span class="glyphicon glyphicon-user ml-15"></span></h4>
									<hr>
									<input class="form-control input-sm" readonly id="clienteView" name="clienteView"></input>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>TELEFONE</label>
									<input class="form-control input-sm" readonly id="telefoneClienteView" name="telefoneClienteView"></input>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>CELULAR</label>
									<input class="form-control input-sm" readonly id="celularClienteView" name="celularClienteView"></input>
								</div>
							</div>
							<!-- DIAGNÓSTICO -->
							<div class='col-md-12 col-sm-12 col-xs-12 separador itensFormulario'>
								<div>
									<h4><strong>DIAGNÓSTICO TÉCNICO </strong><span class="glyphicon glyphicon-file ml-15"></span></h4>
									<hr>
									<textarea type="text" readonly class="form-control input-sm" id="diagnosticoView" name="diagnosticoView" rows="3" style="resize: none"></textarea>
								</div>
							</div>
							<!-- TÉCNICO -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>TÉCNICO</label>
									<input class="form-control input-sm" readonly id="tecnicoView" name="tecnicoView"></input>
								</div>
							</div>
							<!-- FORMULÁRIO INFORMAÇÕES DO EQUIPAMENTO / SERVIÇO -->
							<div class='col-md-12 col-sm-12 col-xs-12 separador'>
								<div class="text-left">
									<h4><strong>INFORMAÇÕES DO EQUIPAMENTO E SERVIÇO </strong><span class="glyphicon glyphicon-wrench ml-15"></span></h4>
								</div>
								<hr>
							</div>
							<!-- ORDEM DE SERVIÇO -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>ORDEM DE SERVIÇO</label>
									<input class="form-control input-sm" readonly id="ordemServicoView" name="ordemServicoView"></input>
								</div>
							</div>
							<!-- STATUS -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>STATUS DO SERVIÇO</label>
									<input class="form-control input-sm" readonly id="statusView" name="statusView"></input>
								</div>
							</div>
							<!-- EQUIPAMENTO -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>EQUIPAMENTO / MARCA / MODELO</label>
									<input type="text" readonly class="form-control input-sm" id="equipamentoView" name="equipamentoView">
								</div>
							</div>
							<!-- NÚMERO DE SÉRIE -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>NÚMERO DE SÉRIE</label>
									<input type="text" readonly class="form-control input-sm" id="serialNumberView" name="serialNumberView">
								</div>
							</div>
							<!-- OBSERVAÇÕES -->
							<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
									<label>OBSERVAÇÕES</label>
									<textarea type="text" readonly class="form-control input-sm text-uppercase" id="informacaoView" name="informacaoView" rows="3" style="resize: none"></textarea>
								</div>
							</div>
							<!-- SERVIÇO EXECUTADO -->
							<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
									<label>SERVIÇO(s) EXECUTADO(s)</label>
									<textarea type="text" readonly class="form-control input-sm" id="servicoView" name="servicoView" rows="3" style="resize: none"></textarea>
								</div>
							</div>
							<!-- VALOR DE TERCEIRO -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>VALOR DE TERCEIRO</label>
									<input type="number" readonly class="form-control input-sm" id="valorTerceiroView" name="valorTerceiroView">
								</div>
							</div>
							<!-- VALOR TOTAL -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>VALOR TOTAL</label>
									<input type="number" readonly class="form-control input-sm" id="precoView" name="precoView">
								</div>
							</div>
							<!-- GARANTIA -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>GARANTIA</label>
									<input type="text" readonly class="form-control input-sm" id="garantiaView" name="garantiaView"></input>
								</div>
							</div>
							<!-- DATA DE ENTREGA -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>DATA DE ENTREGA</label>
									<input type="text" readonly class="form-control input-sm" id="dataSaidaView" name="dataSaidaView">
								</div>
							</div>
							<!-- NF-E EMITIDA? -->
							<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
									<label>NF-E EMITIDA?</label>
								</div>
								<div id="nfeEmitidaForm">
									<input type="radio" disabled id="nfeEmitidaView" name="nfeEmitidaView" value="NAO" checked>
									<label class="btnRadio">NÃO</label>
									<input type="radio" disabled id="nfeEmitidaView" name="nfeEmitidaView" value="SIM">
									<label class="btnRadio">SIM</label>
								</div>
							</div>	
							<!-- BOTÕES -->
							<div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
								<div class="btnRight">
									<span class="btn btn-danger" id="btnVoltar" title="VOLTAR">VOLTAR</span>
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
		idServico = "<?php echo @$idServico ?>";
		carregarDados(idServico);
	});

	$(document).keyup(function(e) { 
		var str = e.keyCode;
		if(str == 27){
			voltar();
		}
	}); 

	$('#btnVoltar').click(function() {
		voltar();
	});

	function voltar(){
		$('#frmVisualizaServico')[0].reset();
		$('#conteudo').load("./Views/Servicos/ProcurarServicos.php");
	}

	function carregarDados(id){
		$.ajax({
				type: "POST",
				data: "idServico=" + id,
				url: "./Procedimentos/Servicos/ObterDadosServicos.php",
				success: function(r) {
					dado = jQuery.parseJSON(r);
					// DADOS CLIENTE
					$.ajax({
						type: "POST",
						data: "idCliente=" + dado.id_cliente,
						url: './Procedimentos/Utilitarios/ObterDadosResumidoCliente.php',
					}).then(function(data) {
						var result = JSON.parse(data);
						var nomeCliente = result[0];
						var telefoneCliente = result[1];
						var celularCliente = result[2];
						$('#clienteView').val(nomeCliente);
						$('#telefoneClienteView').val(telefoneCliente);
						$('#celularClienteView').val(celularCliente);
					});
					$('#idServicoView').val(dado['id_servico']);
					$('#equipamentoView').val(dado['equipamento']);
					$('#ordemServicoView').val(dado['ordem_servico']);
					$('#serialNumberView').val(dado['serial_number']);
					$('#selectStatusView').val(dado['status']);
					// NOME DO TECNICO
					$.ajax({
						type: "POST",
						data: "idTecnico=" + dado.id_tecnico,
						url: './Procedimentos/Utilitarios/ObterNomeTecnico.php',
					}).then(function(data) {
						var nomeTecnico = JSON.parse(data);
						$('#tecnicoView').val(nomeTecnico);
					});
					$('#informacaoView').val(dado['observacao']);
					$('#diagnosticoView').val(dado['diagnostico']);
					$('#servicoView').val(dado['servico_realizado']);
					$('#garantiaView').val(dado['garantia']);
					$('#precoView').val(dado['valor_total']);
					$('#valorTerceiroView').val(dado['valor_terceiro']);
					$('#dataSaidaView').val(dado['data_saida']);
					// VERIFICAR NF-E
					var $radios = $('input:radio[name = nfeEmitidaView]');
					if (dado['nf_emitida'] === "NAO") {
						$radios.filter('[value = NAO]').prop('checked', true);
						console.log("NOTA FISCAL NÃO EMITIDA.");
					} else if (dado['nf_emitida'] === "SIM") {
						$radios.filter('[value = SIM]').prop('checked', true);
						console.log("NOTA FISCAL JÁ EMITIDA.");
					} else {
						$radios.filter('[value = NAO]').prop('checked', true);
						console.log("NÃO FOI POSSÍVEL IDENTIFICAR EMISSÃO DE NOTA.");
					}
				}
			});
	}
</script>

<?php
} else {
	header("location: ./index.php");
}
?>