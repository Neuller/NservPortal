<?php
session_start();
if (isset($_SESSION["User"])) {
?>
	<!DOCTYPE html>
	<html>

	<head>
		<?php require_once "../../Classes/Conexao.php";
		$c = new conectar();
		$conexao = $c->conexao();
		$idServico = $_GET["id"];
		?>
	</head>

	<body>
		<div class="container">
			<!-- CABEÇALHO -->
			<div class="cabecalho bgGray">
				<div class="text-center textCabecalho opacidade">
					<h3><strong>EDITAR SERVIÇO</strong></h3>
				</div>
			</div>

			<!-- FORMULÁRIO -->
			<div class="divFormulario">
				<div class="mx-auto">
					<form id="frmAtualizarServico">
						<div>
							<!-- ID -->
							<div>
								<input type="text" hidden="" id="idServico" name="idServico">
							</div>
							<!-- DIAGNÓSTICO -->
							<div class="col-md-12 col-sm-12 col-xs-12 separador itensFormulario">
								<div>
									<h4><strong>DIAGNÓSTICO TÉCNICO</strong></h4>
									<hr>
									<textarea type="text" class="form-control text-uppercase input-sm" id="diagnosticoU" name="diagnosticoU" maxlength="1000" rows="3" style="resize: none"></textarea>
								</div>
							</div>
							<!-- TÉCNICO -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario" id="divTecnico">
								<div id="divTecnico2">
									<label>TÉCNICO</label>
									<select class="form-control input-sm" id="tecnicoU" name="tecnicoU">
										<option value="">SELECIONE UM TECNICO</option>
										<?php
										$sql = "SELECT id_tecnico, nome 
								    	FROM tecnicos";
										$result = mysqli_query($conexao, $sql);
										?>
										<?php while ($mostrar = mysqli_fetch_row($result)) : ?>
											<option value="<?php echo $mostrar[0]; ?>"><?php echo $mostrar[1]; ?></option>
										<?php endwhile; ?>
									</select>
								</div>
							</div>

							<!-- INFORMAÇÕES DO SERVIÇO -->
							<div class="col-md-12 col-sm-12 col-xs-12 separador">
								<div class="text-left">
									<h4><strong>INFORMAÇÕES DO SERVIÇO</strong></h4>
								</div>
								<hr>
							</div>
							<!-- STATUS -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>STATUS DO SERVIÇO</label>
									<select class="form-control input-sm" id="selectStatusU" name="selectStatusU">
										<option value="">SELECIONE UM STATUS</option>
										<option value="AGUARDANDO AUTORIZACAO DO CLIENTE">AGUARDANDO AUTORIZACAO DO CLIENTE</option>
										<option value="A RECEBER">A RECEBER</option>
										<option value="AUTORIZADO">AUTORIZADO</option>
										<option value="DISPONIVEL PARA ENTREGA">DISPONIVEL PARA ENTREGA</option>
										<option value="ENTREGA REALIZADA">ENTREGA REALIZADA</option>
										<option value="ENVIADO PARA TERCEIRO">ENVIADO PARA TERCEIRO</option>
										<option value="NA BANCADA">NA BANCADA</option>
										<option value="ORCAMENTO">ORÇAMENTO</option>
										<option value="RETORNO">RETORNO</option>
										<option value="SERVICO RECUSADO">SERVICO RECUSADO</option>
									</select>
								</div>
							</div>
							<!-- GARANTIA -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>GARANTIA</label>
									<select class="form-control text-uppercase input-sm" id="garantiaU" name="garantiaU" maxlength="100">
										<option value="">SELECIONE UMA GARANTIA</option>
										<option value="FUNCIONAL">FUNCIONAL</option>
										<option value="30 DIAS">30 DIAS</option>
										<option value="90 DIAS">90 DIAS</option>
										<option value="06 MESES">06 MESES</option>
										<option value="12 MESES">12 MESES</option>
									</select>
								</div>
							</div>
							<!-- ORDEM DE SERVIÇO -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>ORDEM DE SERVIÇO</label>
									<input type="number" readonly class="form-control text-uppercase input-sm" id="ordemServicoU" name="ordemServicoU">
								</div>
							</div>
							<!-- DATA DE ENTREGA -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>DATA DE ENTREGA</label>
									<input type="date" class="form-control text-uppercase input-sm" id="dataSaidaU" name="dataSaidaU">
								</div>
							</div>
							<!-- DATA DE COMUNICADO AO CLIENTE -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>DATA DE COMUNICADO AO CLIENTE</label>
									<input type="date" class="form-control text-uppercase input-sm" id="dataComunicadoU" name="dataComunicadoU">
								</div>
							</div>
							<!-- NF-E EMITIDA? -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>NF-E EMITIDA?</label>
								</div>
								<div>
									<input type="radio" id="nfeEmitidaU" name="nfeEmitidaU" value="NAO" checked>
									<label class="btnRadio">NÃO</label>
									<input type="radio" id="nfeEmitidaU" name="nfeEmitidaU" value="SIM">
									<label class="btnRadio">SIM</label>
								</div>
							</div>
							<!-- SERVIÇOS -->
							<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
									<label>SERVIÇOS</label>
									<!-- <textarea type="text" class="form-control text-uppercase input-sm" id="servicoU" name="servicoU" maxlength="1000" rows="3" style="resize: none"></textarea> -->
									<select class="form-control input-sm" id="servicoSelect" name="servicoSelect">
										<option value="">SELECIONE UM SERVIÇO</option>
										<?php
										$sql = "SELECT id_preco_servico, descricao, garantia, valor FROM preco_servicos ORDER BY id_preco_servico DESC";
										$result = mysqli_query($conexao, $sql);
										while ($servico = mysqli_fetch_row($result)) :
										?>
											<option value="<?php echo $servico[0] ?>"><?php echo $servico[1] ?></option>
										<?php endwhile; ?>
									</select>
								</div>
							</div>
							<!-- QUANTIDADE -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>QUANTIDADE</label>
									<input type="number" class="form-control input-sm estoque text-uppercase" id="qtdServico" name="qtdServico">
								</div>
							</div>
							<!-- VALOR DA UNIDADE -->
							<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>VALOR DA UNIDADE</label>
									<input type="number" class="form-control input-sm text-uppercase" id="precoServico" name="precoServico">
								</div>
							</div>
							<!-- ADICIONAR AO CARRINHO - SERVICOS -->
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="btnRight">
									<span class="btn btn-success btn-lg" id="btnAdicionarServico" title="ADICIONAR">ADICIONAR</span>
								</div>
							</div>
							<!-- TABELA SERVICOS -->
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div align="center">
									<div id="servicosExecutados"></div>
								</div>
								<input type="hidden" class="form-control input-sm text-uppercase" id="dadosTblServicos" name="dadosTblServicos">
							</div>
							<!-- VALOR TOTAL DE SERVIÇOS -->
							<div class="col-xs-4 col-md-4 col-sm-4 itensFormulario">
								<div>
									<label>VALOR TOTAL DE SERVIÇOS</label>
									<input readonly type="number" class="form-control input-sm text-uppercase" id="totalServicos" name="totalServicos">
								</div>
							</div>

							<!-- PRODUTOS -->
							<div class="col-md-12 col-sm-12 col-xs-12 separador">
								<div class="text-left">
									<h4><strong>PRODUTOS</strong></h4>
								</div>
								<hr>
							</div>
							<!-- PRODUTO -->
							<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
									<label>PRODUTO</label>
									<select class="form-control input-sm" id="produtoSelect" name="produtoSelect">
										<option value="">SELECIONE UM PRODUTO</option>
										<?php
										$sql = "SELECT id_produto, codigo, descricao FROM produtos ORDER BY id_produto DESC";
										$result = mysqli_query($conexao, $sql);
										while ($produto = mysqli_fetch_row($result)) :
										?>
											<option value="<?php echo $produto[0] ?>"><?php echo $produto[1] ?> - <?php echo $produto[2] ?></option>
										<?php endwhile; ?>
									</select>
								</div>
							</div>
							<!-- QUANTIDADE EM ESTOQUE -->
							<div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
								<div>
									<label>QUANTIDADE EM ESTOQUE</label>
									<input type="text" readonly class="form-control input-sm estoque text-uppercase" id="estoqueView" name="estoqueView">
								</div>
							</div>
							<!-- QUANTIDADE -->
							<div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
								<div>
									<label>QUANTIDADE</label>
									<input type="number" class="form-control input-sm estoque text-uppercase" id="qtdProduto" name="qtdProduto">
								</div>
							</div>
							<!-- VALOR DA UNIDADE -->
							<div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
								<div>
									<label>VALOR DA UNIDADE</label>
									<input type="number" class="form-control input-sm text-uppercase" id="precoProduto" name="precoProduto">
								</div>
							</div>
							<!-- BOTÕES -->
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="btnRight">
									<span class="btn btn-lg btn-success" id="btnAdicionarProduto" title="ADICIONAR">ADICIONAR</span>
									<!-- <span class="btn btn-warning" id="btnLimpar" title="Limpar">LIMPAR</span> -->
								</div>
							</div>
							<!-- TABELA PRODUTOS -->
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div align="center">
									<div id="carrinhoProdutos"></div>
								</div>

								<input type="hidden" class="form-control input-sm text-uppercase" id="dadosTblProdutos" name="dadosTblProdutos">
							</div>
							<!-- VALOR TOTAL DE PRODUTOS -->
							<div class="col-xs-4 col-md-4 col-sm-4 itensFormulario">
								<div>
									<label>VALOR TOTAL DE PRODUTOS</label>
									<input readonly type="number" class="form-control input-sm text-uppercase" id="totalProdutos" name="totalProdutos">
								</div>
							</div>


							<!-- INFORMAÇÕES DE PAGAMENTO -->
							<div id="infoPagamento"></div>

							<!-- OBSERVAÇÕES -->
							<div id="observacoes"></div>

							<!-- BOTÕES -->
							<div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
								<div class="btnRight">
									<span class="btn btn-danger btn-lg" id="btnCancelar" title="CANCELAR">CANCELAR</span>
									<span class="btn btn-warning btn-lg" id="btnEditar" title="EDITAR">EDITAR</span>
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
			$("#servicoSelect").select2();
			$("#produtoSelect").select2();
			$("#valorServico").hide();
			$("#garantiaServico").hide();
			$("#servicosExecutados").load("./Views/Servicos/Tabelas/ServicosExecutados.php");
			$("#carrinhoProdutos").load("./Views/Servicos/Tabelas/CarrinhoProdutos.php");
			$("#infoPagamento").load("./Views/Componentes/InformacoesPagamento.php");
			$("#observacoes").load("./Views/Componentes/Observacoes.php");
			idServico = "<?php echo @$idServico ?>";
			carregarDados(idServico);

			$(document).keyup(function(e) {
				var str = e.keyCode;
				if (str == 27) {
					cancelar();
				}
			});

			validarForm("frmAtualizarServico");
			camposObrigatorios(["selectStatusU"], true);
		}

		function setEvents() {
			// ADICIONAR SERVICO NA TABELA
			$("#btnAdicionarServico").click(function() {
				camposObrigatorios(["qtdServico", "precoServico"], true);
				var validator = $("#frmAtualizarServico").validate();
				validator.form();
				var checkValidator = validator.checkForm();

				if (checkValidator == false) {
					alertify.error("VERIFIQUE O(S) CAMPO(S) OBRIGATORIO(S)");
					return false;
				}

				dados = $("#frmAtualizarServico").serialize();

				$.ajax({
					type: "POST",
					data: dados,
					url: "./Procedimentos/Servicos/AdicionarServicos.php",
					success: function(r) {
						$("#servicosExecutados").load("./Views/Servicos/Tabelas/ServicosExecutados.php");
						$("#servicoSelect").val("").change();
						$("#qtdServico").val("");
						camposObrigatorios(["qtdServico", "precoServico"], false);
						atualizarValorTotal();
						alertify.success("SERVIÇO ADICIONADO");
						atualizarCampoAuxServicos();
						calcularTroco();
						calcularValorTotal();
					}
				});
			});

			// ADICIONAR PRODUTO NA TABELA
			$("#btnAdicionarProduto").click(function() {
				camposObrigatorios(["produtoSelect", "qtdProduto", "precoProduto"], true);
				var validator = $("#frmAtualizarServico").validate();
				validator.form();
				var checkValidator = validator.checkForm();

				if (checkValidator == false) {
					alertify.error("VERIFIQUE O(S) CAMPO(S) OBRIGATORIO(S)");
					return false;
				}

				quantidade = 0;
				quantidadeEstoque = 0;
				quantidade = parseInt($('#qtdProduto').val());
				quantidadeEstoque = parseInt($('#estoqueView').val());

				if ((quantidade > quantidadeEstoque) || (quantidade == 0)) {
					alertify.error("QUANTIDADE INDISPONÍVEL");
					quantidade = $('#qtdProduto').val("");
					return false;
				} else {
					quantidadeEstoque = parseInt($('#estoqueView').val());
				}

				dados = $("#frmAtualizarServico").serialize();

				$.ajax({
					type: "POST",
					data: dados,
					url: "./Procedimentos/Servicos/AdicionarProdutos.php",
					success: function(r) {
						$("#carrinhoProdutos").load("./Views/Servicos/Tabelas/CarrinhoProdutos.php");
						$("#produtoSelect").val("").change();
						$("#qtdProduto").val("");
						camposObrigatorios(["produtoSelect", "qtdProduto", "precoProduto"], false);
						atualizarValorTotal();
						alertify.success("PRODUTO ADICIONADO");
					}
				});
			});

			// EDITAR SERVIÇO
			$("#btnEditar").click(function() {
				var validator = $("#frmAtualizarServico").validate();
				validator.form();
				var checkValidator = validator.checkForm();

				if (checkValidator == false) {
					alertify.error("VERIFIQUE O(S) CAMPO(S) OBRIGATORIO(S)");
					return false;
				}

				var tableServicos = $("#servicosExecutados").tableToJSON();
				console.log("TABELA: " + tableServicos);
				var tableProdutos = $("#carrinhoProdutos").tableToJSON();
				console.log("TABELA: " + tableProdutos);
				dados = $("#frmAtualizarServico").serialize();
				console.log("DADOS: " + dados);

				$.ajax({
					type: "POST",
					data: dados,
					url: "./Procedimentos/Servicos/EditarServicos.php",
					success: function(r) {
						if (r == 1) {
							$("#tabelaServicosEntrada").load("./Views/Servicos/TabelaServicos.php");
							$("#tabelaUltimosServicos").load("./Views/Inicio/tabelaUltimosServicos.php");
							$("#conteudo").load("./Views/Servicos/ProcurarServicos.php");
							alertify.success("REGISTRO ATUALIZADO");
						} else {
							alertify.error("ERRO");
						}
					}
				});
			});

			$("#btnCancelar").click(function() {
				cancelar();
			});

			function cancelar() {
				alertify.confirm("ATENÇÃO", "DESEJA CANCELAR?", function() {
					alertify.confirm().close();
					$("#frmAtualizarServico")[0].reset();
					$("#conteudo").load("./Views/Servicos/ProcurarServicos.php");
				}, function() {});
			}

			$("#servicoSelect").change(function() {
				var servico = $("#servicoSelect").val();
				$.ajax({
					type: "POST",
					data: "idServico=" + servico,
					url: "./Procedimentos/Servicos/Consultas/ObterDadosServicosPrestados.php",
					success: function(r) {
						dado = jQuery.parseJSON(r);
						$("#precoServico").val(dado["valor"]);
					}
				});
			});

			$("#produtoSelect").change(function() {
				var produto = $("#produtoSelect").val();
				$.ajax({
					type: "POST",
					data: "idProduto=" + produto,
					url: "./Procedimentos/Vendas/ObterDadosProdutos.php",
					success: function(r) {
						dado = jQuery.parseJSON(r);
						$("#estoqueView").val(dado["estoque"]);
						$("#precoProduto").val(dado["preco"]);
					}
				});
			});
		}

		// FORA DO ESCOPO
		function carregarDados(id) {
			$.ajax({
				type: "POST",
				data: "idServico=" + id,
				url: "./Procedimentos/Servicos/ObterDadosServicos.php",
				success: function(r) {
					dado = jQuery.parseJSON(r);
					$("#idServico").val(dado["id_servico"]);
					$("#selectStatusU").val(dado["status"]);
					$("#informacaoU").val(dado["observacao"]);
					$("#ordemServicoU").val(dado["ordem_servico"]);
					$("#servicoU").val(dado["servico_realizado"]);
					// VERIFICA TÉCNICO
					var identificadorTecnico = dado["id_tecnico"];
					if ((identificadorTecnico === "0") || (identificadorTecnico === "") || (identificadorTecnico === null)) {
						$("#tecnicoU").val("");
					} else {
						$("#tecnicoU").val(identificadorTecnico);
					}
					$("#garantiaU").val(dado["garantia"]);
					$("#precoU").val(dado["valor_total"]);
					$("#valorTerceiroU").val(dado["valor_terceiro"]);
					$("#dataSaidaU").val(dado["data_saida"]);
					$("#diagnosticoU").val(dado["diagnostico"]);
					// VERIFICAR NF-E
					var $radios = $("input:radio[name = nfeEmitidaU]");
					if (dado["nf_emitida"] === "NAO") {
						$radios.filter("[value = NAO]").prop("checked", true);
						console.log("NOTA FISCAL NÃO EMITIDA.");
					} else if (dado["nf_emitida"] === "SIM") {
						$radios.filter("[value = SIM]").prop("checked", true);
						console.log("NOTA FISCAL JÁ EMITIDA.");
					} else {
						$radios.filter("[value = NAO]").prop("checked", true);
						console.log("NÃO FOI POSSÍVEL IDENTIFICAR EMISSÃO DE NOTA.");
					}
				}
			});
		}

		function atualizarValorTotal() {
			let totalServicos = parseFloat($("#totalServicos").val());
			let totalProdutos = parseFloat($("#totalProdutos").val());
			let valorTotalServico = 0;
			valorTotalServico = totalServicos + totalProdutos;
			$("#valorTotalServico").val(valorTotalServico.toFixed(2));
			$("#valorTotal").val(valorTotalServico.toFixed(2));
		}

		function setValorPagamento() {
			let valorTotal = parseFloat($("#valorTotal").val());
			$("#valorPagamento").val(valorTotal.toFixed(2));
		}
	</script>
<?php
} else {
	header("location: ./index.php");
}
?>