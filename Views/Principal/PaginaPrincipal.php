<?php
session_start();
if (isset($_SESSION["User"])) {
?>
<!DOCTYPE html>
<html>
	<body>
		<div class="container">
			<div>
				<!-- USUÁRIO LOGADO -->
				<div class="text-left col-md-12 col-sm-12 col-xs-12 textCabecalho">
						<div id="nomeUsuario"></div>
				</div>
				<!-- STATUS DO CAIXA -->
				<div class="text-left col-md-12 col-sm-12 col-xs-12 textCabecalho">
					<div id="statusCaixa"></div>
				</div>
				<!-- FALE CONOSCO -->
				<div class="cabecalho bgGray">
					<div class="text-center textCabecalho opacidade">
						<h3><strong>FALE CONOSCO</strong></h3>
					</div>
				</div>
				<!-- TELEFONES -->
				<div class="contatos">
					<article class="conteudo bgGradientFaleConosco">
						<div class="text-center">
							<section class="conteudoContatos">
								<i class="fas fa-phone fa-4x textContatos"></i>
							</section>
						</div>
						<div class="text-center">
							<section class="conteudoContatos">
								<div class="text-center">
									<p class="h5 textContatos">(31) 9 9273-1661</p>
									<p class="h5 textContatos">(31) 9 9246-6484</p>
								</div>
							</section>
						</div>
					</article>
				</div>
				<!-- CELULARES -->
				<div class="contatos">
					<article class="conteudo bgGradientFaleConosco">
						<div class="text-center">
							<section class="conteudoContatos">
								<i class="fab fa-whatsapp fa-4x textContatos"></i>
							</section>
						</div>
						<div class="text-center">
							<section class="conteudoContatos">
								<div class="text-center">
									<p class="h5 textContatos">(31) 3390-1115</p>
								</div>
							</section>
						</div>
					</article>
				</div>
				<!-- ENDEREÇO -->
				<div class="contatos">
					<article class="conteudo bgGradientFaleConosco">
						<div class="text-center">
							<section class="conteudoContatos">
								<i class="fas fa-home fa-4x textContatos"></i>
							</section>
						</div>
						<div class="text-center">
							<section class="conteudoContatos">
								<div class="text-center">
									<p class="h5 textContatos">RUA CEL. JOÃO CAMARGOS - 255</p>
									<p class="h5 textContatos">LOJA 01 - CONTAGEM/MG</p>
								</div>
							</section>
						</div>
					</article>
				</div>
				<!-- E-MAIL -->
				<div class="contatos">
					<article class="conteudo bgGradientFaleConosco">
						<div class="text-center">
							<section class="conteudoContatos">
								<i class="fas fa-envelope fa-4x textContatos"></i>
							</section>
						</div>
						<div class="text-center">
							<section class="conteudoContatos">
								<div class="text-center">
									<p class="h5 textContatos">NSERV@HOTMAIL.COM</p>
								</div>
							</section>
						</div>
					</article>
				</div>
				<!-- SERVIÇOS DO MES -->
				<div>
					<div class="servicosMes bgGray">
						<div class="text-center textCabecalho opacidade">
							<h3><strong>SERVIÇOS DO MÊS</strong></h3>
						</div>
					</div>
					<!-- TABELA SERVICOS DO MES -->
					<div class="row">
						<div class="col-sm-12" align="center">
							<div id="tabelaServicosMes"></div>
						</div>
					</div>
				</div>
				<!-- VENDAS DO MES -->
				<div>
					<div class="vendasMes bgGray">
						<div class="text-center textCabecalho opacidade">
							<h3><strong>VENDAS DO MÊS</strong></h3>
						</div>
					</div>
					<!-- TABELA VENDAS DO MES -->
					<div class="row">
						<div class="col-sm-12 tabelas" align="center">
							<div id="tabelaVendasMes"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#tabelaServicosMes").load("./Views/Principal/tabelaServicosMes.php");
			$("#tabelaVendasMes").load("./Views/Principal/tabelaVendasMes.php");
			moment.locale("pt-br");
			var data = moment().format("DD/MM/YYYY");
			getStatusCaixa(data);
			getDadosUsuarioLogado();
		});

		// function editarServicos(idServico) {
		// 	$("#conteudo").load("./Views/Servicos/EditarServicos.php?id=" + idServico);
		// }

		function VisualizarServico(idServico) {
			$("#conteudo").load("./Views/Servicos/VisualizarServico.php?id=" + idServico);
		}

		function getDadosUsuarioLogado() {
			$.ajax({
				type: "POST",
				url: "./Procedimentos/Usuarios/ObterDadosUsuario.php",
				success: function(r) {
					retorno = $.parseJSON(r);
					if(retorno != null && retorno != undefined) {
						$("#nomeUsuario").text("SEJA BEM VINDO, " + retorno.nome + "!");
					}
				}
			});
		}

		function getStatusCaixa(data) {
			$.ajax({
				type: "POST",
				data: "data=" + data,
				url: "./Procedimentos/Financeiro/VerificarStatusCaixa.php",
				success: function(r) {
					retorno = $.parseJSON(r);
					if (retorno == null) {
						$("#statusCaixa").text("STATUS DO CAIXA: FECHADO");
					} else {
						$("#statusCaixa").text("STATUS DO CAIXA: " + retorno);
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