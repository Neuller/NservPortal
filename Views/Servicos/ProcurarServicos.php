<?php
session_start();
if (isset($_SESSION['User'])) {
?>
<!DOCTYPE html>
<html>
	<body>
		<div class="tblServicos container">
			<div class="cabecalho bgGray">
				<div class="text-center textCabecalho opacidade">
					<h3><strong>PROCURAR SERVIÇOS</strong></h3>
				</div>
			</div>
			<!-- TABELA -->
			<div class="row">
				<div class="col-sm-12 tabelas" align="center">
					<div id="tabelaServicos"></div>
				</div>
			</div>
		</div>
	</body>	
</html>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tabelaServicos').load('./Views/Servicos/TabelaServicos.php');
	});

	function editarServicos(idServico) {
		$('#conteudo').load('./Views/Servicos/EditarServicos.php');
		$.ajax({
			type: "POST",
			data: "idServico=" + idServico,
			url: "./Procedimentos/Servicos/ObterDadosServicos.php",
			success: function(r) {
				dado = jQuery.parseJSON(r);
				$('#idServico').val(dado['id_servico']);
				$("#selectStatusU").val(dado['status']).prop('selected', true);
				$('#informacaoU').val(dado['observacao']);
				$('#ordemServicoU').val(dado['ordem_servico']);
				$('#servicoU').val(dado['servico_realizado']);
				// VERIFICA TÉCNICO RESPONSÁVEL
				var identificadorTecnico = dado['id_tecnico'];
				if ((identificadorTecnico === "0") || (identificadorTecnico === "") || (identificadorTecnico === null)) {
					$("#tecnicoU").val("0");
				} else {
					$('#tecnicoU').val(identificadorTecnico);
				}
				$('#garantiaU').val(dado['garantia']);
				$('#precoU').val(dado['valor_total']);
				$('#valorTerceiroU').val(dado['valor_terceiro']);
				$('#dataSaidaU').val(dado['data_saida']);
				$('#diagnosticoU').val(dado['diagnostico']);
				// VERIFICAR NF-E
				var $radios = $('input:radio[name = nfeEmitidaU]');
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

	function visualizarServicos(idServico) {
		$('#conteudo').load('./Views/Servicos/VisualizarServicos.php');
		$.ajax({
			type: "POST",
			data: "idServico=" + idServico,
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
				$('#statusView').val(dado['status']);
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
	header("location:./index.php");
}
?>