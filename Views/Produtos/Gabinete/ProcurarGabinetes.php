<?php
session_start();
if (isset($_SESSION['User'])) {
?>
<!DOCTYPE html>
<html>
	<body>
		<div class="tblGabinete container">
			<div class="cabecalho bgGray">
				<div class="text-center textCabecalho opacidade">
                    <h3><strong>TABELA DE PRODUTOS - GABINETE</strong></h3>
				</div>
			</div>
			<!-- TABELA -->
			<div class="row">
				<div class="col-sm-12 tabelas" align="center">
					<div id="tabelaGabinete"></div>
				</div>
			</div>
		</div>
	</body>	
</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tabelaGabinete').load('./Views/Produtos/Gabinete/TabelaGabinete.php');
    });
    
    // PREENCHER MODAL EDITAR
    function editarProdutos(idProduto) {
        $('#conteudo').load('./Views/Produtos/EditarProdutos.php');
        $.ajax({
            type: "POST",
            data: "idProduto=" + idProduto,
            url: "./Procedimentos/Produtos/ObterDadosProdutos.php",
            success: function(r) {
                dado = jQuery.parseJSON(r);
                $('#idProduto').val(dado['id_produto']);
                $('#idCategoria').val(dado['categoria']);
                $('#codigoU').val(dado['codigo']);
                $('#descricaoU').val(dado['descricao']);
                $('#garantiaU').val(dado['garantia']);
                $('#precoU').val(dado['preco']);
                $('#precoInstalacaoU').val(dado['preco_instalacao']);
                $('#estoqueU').val(dado['estoque']);
                $('#nfU').val(dado['nf']);
                $('#ncmU').val(dado['ncm']);
            }
        });
    }

    // PREENCHER MODAL VISUALIZAR
    function visualizarProdutos(idProduto) {
        $('#conteudo').load('./Views/Produtos/VisualizarProdutos.php');
        $.ajax({
            type: "POST",
            data: "idProduto=" + idProduto,
            url: "./Procedimentos/Produtos/ObterDadosProdutos.php",
            success: function(r) {
                dado = jQuery.parseJSON(r);
                $('#idProdutoView').val(dado['id_produto']);
                $('#idCategoriaView').val(dado['categoria']);
                $('#codigoView').val(dado['codigo']);
                $('#descricaoView').val(dado['descricao']);
                $('#garantiaView').val(dado['garantia']);
                $('#estoqueView').val(dado['estoque']);
                $('#precoView').val(dado['preco']);
                $('#precoInstalacaoView').val(dado['preco_instalacao']);
                $('#nfView').val(dado['nf']);
                $('#ncmView').val(dado['ncm']);
            }
        });
    }
        
    // EXCLUIR PRODUTO
    function excluirProduto(idProduto) {
        alertify.confirm('ATENÇÃO', 'DESEJA EXCLUIR O REGISTRO?', function() {
             $.ajax({
                type: "POST",
                data: "idProduto=" + idProduto,
                url: "./Procedimentos/Produtos/ExcluirProduto.php",
                success: function(r) {
                    if (r == 1) {
                        $('#tabelaGabinete').load('./Views/Produtos/Gabinete/TabelaGabinete.php');
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