<?php
session_start();
if (isset($_SESSION['User'])) {
?>
<!DOCTYPE html>
<html>
	<body>
		<div class="tblPreco container">
			<div class="cabecalho bgGray">
				<div class="text-center textCabecalho opacidade">
					<h3><strong>TABELA DE PREÇOS</strong></h3>
				</div>
			</div>
			<!-- TABELA -->
			<div class="row">
				<div class="col-sm-12" align="center">
					<div id="tabelaPrecos"></div>
				</div>
			</div>
			<!-- BOTÕES -->
			<div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
                <div class="btnRight">
                    <span class="btn btn-success" id="btnNovo" title="NOVO">NOVO</span>
                </div>
			</div>
		</div>
	</body>	
</html>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tabelaPrecos').load('./Views/Servicos/TabelaPrecos.php');
	});
	
	$('#btnNovo').click(function() {
		$('#conteudo').load("./Views/Servicos/CadastrarPrecoServicos.php");
	});

	function excluir(id) {
		alertify.confirm('ATENÇÃO', 'DESEJA EXCLUIR O REGISTRO?', function() {
			$.ajax({
				type: "POST",
				data: "id=" + id,
				url: "./Procedimentos/Servicos/ExcluirPrecoServicos.php",
				success: function(r) {
					if (r == 1) {
						$('#tabelaPrecos').load('./Views/Servicos/TabelaPrecos.php');
						alertify.success("EXCLUÍDO");
					} else {
						alertify.error("NÃO FOI POSSÍVEL EXCLUIR");
					}
				}
			});
		}, function() {
			// alertify.error('OPERAÇÃO CANCELADA')
		});
	}
</script>

<?php
} else {
	header("location:./index.php");
}
?>