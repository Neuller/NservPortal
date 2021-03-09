<?php
session_start();
if (isset($_SESSION['User'])) {
?>
<!DOCTYPE html>
<html>
	<body>
		<div class="tblImpressora container">
			<div class="cabecalho bgGray">
				<div class="text-center textCabecalho opacidade">
                    <h3><strong>TABELA DE PRODUTOS - IMPRESSORA</strong></h3>
				</div>
			</div>
			<!-- TABELA -->
			<div class="row">
				<div class="col-sm-12 tabelas" align="center">
					<div id="tabelaImpressora"></div>
				</div>
			</div>
		</div>
	</body>	
</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tabelaImpressora').load('./Views/Produtos/Impressora/TabelaImpressora.php');
    });
    
    function editarProdutos(idProduto) {
        $('#conteudo').load("./Views/Produtos/EditarProdutos.php"+idProduto);
    }

    function visualizarProdutos(idProduto) {
        $('#conteudo').load("./Views/Produtos/VisualizarProdutos.php"+idProduto);
    }
        
    function excluirProduto(idProduto) {
        alertify.confirm('ATENÇÃO', 'DESEJA EXCLUIR O REGISTRO?', function() {
             $.ajax({
                type: "POST",
                data: "idProduto=" + idProduto,
                url: "./Procedimentos/Produtos/ExcluirProduto.php",
                success: function(r) {
                    if (r == 1) {
                        $('#tabelaImpressora').load('./Views/Produtos/Impressora/TabelaImpressora.php');
                        alertify.success("REGISTRO EXCLUÍDO");
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