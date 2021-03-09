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
        $idProduto = $_GET["id"];
		?>
	</head>

    <body>
        <div class="container">
            <!-- CABEÇALHO -->
            <div class="cabecalho bgGray">
                <div class="text-center textCabecalho opacidade">
                    <h3><strong>VISUALIZAR PRODUTO</strong></h3>
                </div>
            </div>
            <!-- FORMULÁRIO -->
            <div class="divFormulario">
			    <div class="mx-auto">
                    <form id="frmVisualizarProduto">
                        <div>
                            <!-- ID PRODUTO -->
                            <div>
                                <input type="text" hidden="" id="idProdutoView" name="idProdutoView">
                            </div>
                            <!-- ID GATEGORIA -->
                            <div>
                                <input type="text" hidden="" id="idCategoriaView" name="idCategoriaView">
                            </div>
                            <!-- CÓDIGO -->
                            <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
                                <div>
                                    <label>CÓDIGO</label>
                                    <input type="text" readonly class="form-control input-sm codigo text-uppercase" id="codigoView" name="codigoView">
                                </div>
                            </div>
                            <!-- DESCRIÇÃO -->
                            <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
                                <div>
                                    <label>DESCRIÇÃO</label>
                                    <textarea type="text" readonly class="form-control input-sm text-uppercase" id="descricaoView" name="descricaoView" rows="3" style="resize: none"></textarea>
                                </div>
                            </div>
                            <!-- GARANTIA -->
                            <div class="col-md-8 col-sm-8 col-xs-8 itensFormulario">
                                <div>
                                    <label>GARANTIA</label>
                                    <input type="text" readonly class="form-control input-sm codigo text-uppercase" id="garantiaView" name="garantiaView">
                                </div>
                            </div>
                            <!-- ESTOQUE -->
                            <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
                                <div>
                                    <label>ESTOQUE</label>
                                    <input type="text" readonly class="form-control input-sm estoque text-uppercase estoqueView" id="estoqueView" name="estoqueView">
                                </div>
                            </div>
                            <!-- VALOR UNIDADE -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>VALOR UNIDADE</label>
                                    <input type="text" readonly class="form-control input-sm text-uppercase" id="precoView" name="precoView">
                                </div>
                            </div>
                            <!-- VALOR INSTALADO -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>VALOR INSTALADO</label>
                                    <input type="text" readonly class="form-control input-sm text-uppercase" id="precoInstalacaoView" name="precoInstalacaoView">
                                </div>
                            </div>
                            <!-- NF -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>ESTOQUE NF</label>
                                    <input type="text" readonly class="form-control nf input-sm text-uppercase" id="nfView" name="nfView">
                                </div>
                            </div>
                            <!-- NCM -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>NCM</label>
                                    <input type="text" readonly class="form-control ncm input-sm text-uppercase" id="ncmView" name="ncmView">
                                </div>
                            </div>
                            <!-- AVISO INDISPONIBILIDADE DE ESTOQUE -->
                            <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario avisoDanger">
                                <span>ITEM INDISPONÍVEL EM ESTOQUE, CONSULTE DISPONIBILIDADE E VALOR COM O FORNECEDOR!</span>
                            </div>
                            <!-- BOTOES -->
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
        idProduto = "<?php echo @$idProduto ?>";
        carregarDados(idProduto);
        $(".avisoDanger").hide();
    });

	$('#btnVoltar').click(function() {
		$('#frmVisualizarProduto')[0].reset();
		$('#conteudo').load("./Principal.php");
	});

    function carregarDados(id) {
        $.ajax({
            type: "POST",
            data: "idProduto=" + id,
            url: "./Procedimentos/Produtos/ObterDadosProdutos.php",
            success: function(r) {
                dado = jQuery.parseJSON(r);
                $('#idProdutoView').val(dado['id_produto']);
                $('#idCategoriaView').val(dado['categoria']);
                $('#codigoView').val(dado['codigo']);
                $('#descricaoView').val(dado['descricao']);
                $('#garantiaView').val(dado['garantia']);
                $('#estoqueView').val(dado['estoque']);
                if(dado['estoque'] == 0){
                    estoqueIndisponivel();
                }
                $('#precoView').val(dado['preco']);
                $('#precoInstalacaoView').val(dado['preco_instalacao']);
                $('#nfView').val(dado['nf']);
                $('#ncmView').val(dado['ncm']);
            }
        });
    }

    function estoqueIndisponivel() {
        $(".avisoDanger").show();
        $('.estoqueView').css('border', '1px solid red');
    }
</script>
<?php
} else {
	header("location: ./index.php");
}
?>