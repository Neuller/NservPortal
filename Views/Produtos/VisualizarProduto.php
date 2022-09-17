<?php
session_start();
if (isset($_SESSION["User"])) {
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
				<div class="mx-auto">
                    <form id="frmProduto">
                        <div>
                            <!-- ID PRODUTO -->
                            <div>
                                <input type="text" hidden="" id="idProduto" name="idProduto">
                            </div>
                            <!-- ID GATEGORIA -->
                            <div>
                                <input type="text" hidden="" id="categoria" name="categoria">
                            </div>
                            <!-- CÓDIGO -->
                            <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
                                <div>
                                    <label>CÓDIGO<span class="required">*</span></label>
                                    <input type="text" readonly class="form-control input-sm codigo text-uppercase" id="codigoU" name="codigoU" maxlenght="10">
                                </div>
                            </div>
                            <!-- DESCRIÇÃO -->
                            <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
                                <div>
                                    <label>DESCRIÇÃO<span class="required">*</span></label>
                                    <textarea type="text" class="form-control input-sm text-uppercase" id="descricaoU" name="descricaoU" maxlength="100" rows="3" style="resize: none"></textarea>
                                </div>
                            </div>
                            <!-- GARANTIA -->
                            <div class="col-md-8 col-sm-8 col-xs-8 itensFormulario">
                                <div>
                                    <label>GARANTIA</label>
                                    <select class="form-control input-sm" id="garantiaU" name="garantiaU">
                                        <option value=""></option>
                                        <option value="FUNCIONAL">FUNCIONAL</option>
                                        <option value="30 DIAS">30 DIAS</option>
                                        <option value="90 DIAS">90 DIAS</option>
                                        <option value="06 MESES">06 MESES</option>
                                        <option value="12 MESES">12 MESES</option>
                                    </select>
                                </div>
                            </div>
                            <!-- ESTOQUE -->
                            <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
                                <div>
                                    <label>ESTOQUE<span class="required">*</span></label>
                                    <input type="text" class="form-control input-sm estoque text-uppercase" id="estoqueU" name="estoqueU" maxlenght="10">
                                </div>
                            </div>
                            <!-- VALOR UNIDADE -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>VALOR UNIDADE<span class="required">*</span></label>
                                    <input type="text" class="form-control input-sm text-uppercase" id="precoU" name="precoU">
                                </div>
                            </div>
                            <!-- VALOR INSTALADO -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>VALOR INSTALADO</label>
                                    <input type="text" class="form-control input-sm text-uppercase" id="precoInstalacaoU" name="precoInstalacaoU" maxlenght="10">
                                </div>
                            </div>
                            <!-- NF -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>ESTOQUE NF</label>
                                    <input type="text" class="form-control nf input-sm text-uppercase" id="nfU" name="nfU" maxlenght="10">
                                </div>
                            </div>
                            <!-- NCM -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>NCM</label>
                                    <input type="text" class="form-control ncm input-sm text-uppercase" id="ncmU" name="ncmU" maxlenght="10">
                                </div>
                            </div>
                            <!-- BOTÕES -->
                            <div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
                                <div class="btnRight">
                                    <span class="btn btn-danger btn-lg" id="btnCancelar" title="CANCELAR">CANCELAR</span>
                                    <span class="btn btn-warning btn-lg" id="btnSalvar" title="SALVAR">SALVAR</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
		</div>
	</body>
</html>

<script type="text/javascript">
	$(document).ready(function() {
        idProduto = "<?php echo @$idProduto ?>";
		carregarDados(idProduto);
	});

    $("#btnSalvar").click(function() {
        var descricao = $("#descricaoU").val();
        var preco = $("#precoU").val();
        var estoque = $("#estoqueU").val();
        var codigo = $("#codigo").val();
        var garantia = $("#garantiaU").val();

        if ((descricao == "") || (preco == "") || (estoque == "") || (codigo == "")) {
            alertify.error("VERIFIQUE OS CAMPOS OBRIGATORIOS");
            return false;
        }

        if(garantia == ""){
            $("#garantiaU").val("FUNCIONAL");
        }

        dados = $("#frmProduto").serialize();

        $.ajax({
            type: "POST",
            data: dados,
            url: "./Procedimentos/Produtos/EditarProdutos.php",
            success: function(r) {
                debugger;
                if (r == 1) {
                    $("#conteudo").load("./Principal.php");
                    alertify.success("SUCESSO");
                } else {
                    alertify.error("ERRO");
                }
            }
        });
    });

    $("#btnCancelar").click(function() {
		alertify.confirm("ATENÇÃO", "DESEJA CANCELAR?", function(){
            alertify.confirm().close();
			$("#frmProduto")[0].reset();
            $("#conteudo").load("./Principal.php");
        }, function() {}).set({
            labels: {
                ok: "SIM",
                cancel: "NÃO"
            }
        });
	});

    function carregarDados(id) {
        $.ajax({
            type: "POST",
            data: "idProduto=" + id,
            url: "./Procedimentos/Produtos/ObterDadosProdutos.php",
            success: function(r) {
                dado = jQuery.parseJSON(r);
                $("#idProduto").val(dado["id_produto"]);
                $("#idCategoria").val(dado["categoria"]);
                $("#codigoU").val(dado["codigo"]);
                $("#descricaoU").val(dado["descricao"]);
                $("#garantiaU").val(dado["garantia"]);
                $("#precoU").val(dado["preco"]);
                $("#precoInstalacaoU").val(dado["preco_instalacao"]);
                $("#estoqueU").val(dado["estoque"]);
                $("#nfU").val(dado["nf"]);
                $("#ncmU").val(dado["ncm"]);
            }
        });
    }
</script>
<?php
} else {
    header("location: ./index.php");
}
?>