<?php
session_start();
if (isset($_SESSION["User"])) {
?>
<!DOCTYPE html>
<html>

<head>
    <?php require_once "../../Model/Conexao.php";
        $c = new conectar();
        $conexao = $c->conexao();
        ?>
</head>

<body>
    <div class="container">
        <!-- CABEÇALHO -->
        <div class="cabecalho bgGray">
            <div class="text-center textCabecalho opacidade">
                <h3><strong>CADASTRAR VENDAS </strong></h3>
            </div>
        </div>

        <!-- FORMULÁRIO DE CADASTRO -->
        <div class="divFormulario">
            <div class="mx-auto">
                <form id="frmVendas">
                    <!-- INFORMAÇÕES DO CLIENTE -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="text-left">
                            <h4><strong>INFORMAÇÕES DO CLIENTE </strong> <span
                                    class="glyphicon glyphicon-user ml-15"></span></h4>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-8 col-sm-8 col-xs-8 itensFormulario">
                        <div>
                            <label>CLIENTE<span class="required">*</span></label>
                            <select class="form-control input-sm" id="clienteSelect" name="clienteSelect">
                                <option value="">SELECIONE UM CLIENTE</option>
                                <?php
                                    $sql = "SELECT id_cliente, nome, celular FROM clientes ORDER BY id_cliente DESC";
                                    $result = mysqli_query($conexao, $sql);
                                    while ($cliente = mysqli_fetch_row($result)) :
                                    ?>
                                <option value="<?php echo $cliente[0] ?>"><?php echo $cliente[1] ?> -
                                    <?php echo $cliente[2] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <!-- INFORMAÇÕES DO PRODUTO -->
                    <div class="col-md-12 col-sm-12 col-xs-12 separador">
                        <div class="text-left">
                            <h4><strong>INFORMAÇÕES DO PRODUTO </strong><span
                                    class="glyphicon glyphicon-hdd ml-15"></span></h4>
                        </div>
                        <hr>
                    </div>
                    <!-- PRODUTO -->
                    <div class="col-md-8 col-sm-8 col-xs-8 itensFormulario">
                        <div>
                            <label>PRODUTO<span class="required">*</span></label>
                            <select class="form-control input-sm" id="produtoSelect" name="produtoSelect">
                                <option value="">SELECIONE UM PRODUTO</option>
                                <?php
                                    $sql = "SELECT id_produto, codigo, descricao FROM produtos ORDER BY id_produto DESC";
                                    $result = mysqli_query($conexao, $sql);
                                    while ($produto = mysqli_fetch_row($result)) :
                                    ?>
                                <option value="<?php echo $produto[0] ?>"><?php echo $produto[1] ?> -
                                    <?php echo $produto[2] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <!-- QUANTIDADE EM ESTOQUE -->
                    <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
                        <div>
                            <label>QUANTIDADE EM ESTOQUE</label>
                            <input type="text" readonly class="form-control input-sm estoque text-uppercase"
                                id="estoqueView" name="estoqueView">
                        </div>
                    </div>
                    <!-- VALOR DA UNIDADE -->
                    <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                        <div>
                            <label>VALOR DA UNIDADE</label>
                            <input type="text" readonly class="form-control input-sm text-uppercase" id="precoView"
                                name="precoView">
                        </div>
                    </div>
                    <!-- QUANTIDADE -->
                    <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                        <div>
                            <label>QUANTIDADE<span class="required">*</span></label>
                            <input type="number" class="form-control input-sm estoque text-uppercase quantidade"
                                id="quantidade" name="quantidade" maxlenght="10">
                        </div>
                    </div>
                    <!-- BOTÕES -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="btnRight">
                            <span class="btn btn-success btn-lg" id="btnAdicionar" title="ADICIONAR">ADICIONAR <span
                                    class="fas fa-shopping-cart ml-15"></span></span>
                            <!-- <span class="btn btn-warning" id="btnLimpar" title="Limpar">LIMPAR</span> -->
                        </div>
                    </div>

                    <!-- CARRINHO -->
                    <div class="cabecalho bgGray">
                        <div class="text-center textCabecalho opacidade">
                            <h3><strong>CARRINHO </strong><span class="fas fa-shopping-cart ml-15"></span></h3>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 tabelas">
                        <div align="center">
                            <div id="carrinhoVendas"></div>
                        </div>
                    </div>

                    <!-- INFORMAÇÕES DE PAGAMENTO -->
                    <div class="col-xs-12 col-md-12 col-sm-12 separador">
                        <div class="text-left">
                            <h4><strong>INFORMAÇÕES DE PAGAMENTO</strong></h4>
                        </div>
                        <hr>
                    </div>
                    <!-- FORMA DE PAGAMENTO -->
                    <div class="col-xs-8 col-md-8 col-sm-8 itensFormulario">
                        <div>
                            <label>FORMA DE PAGAMENTO<span class="required">*</span></label>
                            <select class="form-control input-sm" id="formaPagamento" name="formaPagamento">
                                <option value="">SELECIONE UMA FORMA DE PAGAMENTO</option>
                                <option value="CREDITO">CARTÃO DE CREDITO</option>
                                <option value="DEBITO">CARTÃO DE DÉBITO</option>
                                <option value="DINHEIRO">DINHEIRO</option>
                                <option value="PIX">PIX</option>
                                <option value="TRANSFERENCIA">TRANSFERÊNCIA</option>
                            </select>
                        </div>
                    </div>
                    <!-- TOTAL -->
                    <div class="col-xs-4 col-md-4 col-sm-4 itensFormulario">
                        <div>
                            <label>TOTAL</label>
                            <input readonly type="number" class="form-control input-sm text-uppercase" id="total"
                                name="total" maxlenght="10">
                        </div>
                    </div>
                    <!-- VALOR DO PAGAMENTO -->
                    <div class="col-xs-6 col-md-6 col-sm-6 itensFormulario">
                        <div>
                            <label>VALOR DO PAGAMENTO</label>
                            <input type="number" class="form-control input-sm text-uppercase" id="valorPagamento"
                                name="valorPagamento" maxlenght="10">
                        </div>
                    </div>
                    <!-- DESCONTOS -->
                    <div class="col-xs-6 col-md-6 col-sm-6 itensFormulario desconto">
                        <div>
                            <label>DESCONTOS</label>
                            <input type="number" class="form-control input-sm text-uppercase" id="desconto"
                                name="desconto" maxlenght="10">
                        </div>
                    </div>
                    <!-- TROCO -->
                    <div class="col-xs-6 col-md-6 col-sm-6 itensFormulario troco">
                        <div>
                            <label>TROCO</label>
                            <input readonly type="number" class="form-control input-sm text-uppercase" id="troco"
                                name="troco" maxlenght="10">
                        </div>
                    </div>
                    <!-- SALDO DÉBITO -->
                    <div class="col-xs-6 col-md-6 col-sm-6 itensFormulario saldoDevedor">
                        <div>
                            <label>SALDO DEVEDOR</label>
                            <input readonly type="number" class="form-control input-sm text-uppercase" id="saldoDevedor"
                                name="saldoDevedor" maxlenght="10">
                        </div>
                    </div>
                    <!-- VALOR TOTAL -->
                    <div class="col-xs-6 col-md-6 col-sm-6 itensFormulario">
                        <div>
                            <label>VALOR TOTAL</label>
                            <input readonly type="number" class="form-control input-sm text-uppercase" id="valorTotal"
                                name="valorTotal" maxlenght="10">
                        </div>
                    </div>
                    <!-- OBSERVAÇÕES -->
                    <div class="col-md-12 col-sm-12 col-xs-12 separador">
                        <div class="text-left">
                            <h4><strong>OBSERVAÇÕES </strong> <span
                                    class="glyphicon glyphicon-exclamation-sign ml-15"></span></h4>
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
                        <div>
                            <textarea type="text" class="form-control input-sm text-uppercase" id="observacao"
                                name="observacao" maxlength="1000" rows="3" style="resize: none"></textarea>
                        </div>
                    </div>
                    <!-- BOTÕES -->
                    <div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
                        <div class="btnRight">
                            <span class="btn btn-primary btn-lg" id="btnCadastrar" title="CADASTRAR">CADASTRAR</span>
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
    $("#carrinhoVendas").load("./View/Vendas/CarrinhoVendas.php");
    $("#clienteSelect").select2();
    $("#produtoSelect").select2();
    $("#desconto").prop("disabled", true);
    $("#valorPagamento").prop("disabled", true);
    $(".saldoDevedor").hide();
});

$("#produtoSelect").change(function() {
    let produto = $("#produtoSelect").val();
    $.ajax({
        type: "POST",
        data: "idProduto=" + produto,
        url: "./Controller/Vendas/ObterDadosProdutos.php",
        success: function(r) {
            if (r != 1) {
                dado = jQuery.parseJSON(r);
                $("#estoqueView").val(dado["estoque"]);
                $("#precoView").val(dado["preco"]);
            } else {
                limparCampo(["estoqueView", "precoView"]);
            }
        }
    });
});

$("#formaPagamento").change(function() {
    var total = $("#total").val();
    var formaPagamento = $("#formaPagamento").val();
    if (formaPagamento != "") {
        $("#valorPagamento").prop("disabled", false);
        $("#desconto").prop("disabled", false);
        $("#valorPagamento").val(total);
        calculaTotal();
    } else {
        $("#valorPagamento").prop("disabled", true);
        $("#desconto").prop("disabled", true);
        $("#valorTotal").val("");
        limparCampoPagamentos();
        resetFormPagamentos();
    }
});

$("#total").change(function() {
    $("#valorPagamento").prop("disabled", false);
    $("#formaPagamento").val("");
    calculaTotal();
});

$("#valorPagamento").change(function() {
    var valorPagamento = $("#valorPagamento").val();
    var total = $("#total").val();
    if (valorPagamento != "") {
        $("#desconto").prop("disabled", false);
        $("#desconto").val("");
        calculaTotal();
    } else {
        $("#desconto").prop("disabled", true);
        $("#desconto").val("");
        $("#troco").val("");
        $("#total").val(total);
        $(".desconto").show();
        $(".troco").show();
        $(".saldoDevedor").hide();
        $("#saldoDevedor").val("");
    }

});

$("#desconto").change(function() {
    calculaTotal();
});

$("#btnAdicionar").click(function() {
    var produto = $("#produtoSelect").val();
    var quantidade = $("#quantidade").val();

    if ((produto == "") || (quantidade == "")) {
        alertify.error("VERIFIQUE OS CAMPOS OBRIGATORIOS");
        return false;
    }

    quantidade = 0;
    quantidadeEstoque = 0;
    quantidade = parseInt($("#quantidade").val());
    quantidadeEstoque = parseInt($("#estoqueView").val());

    if ((quantidade > quantidadeEstoque) || (quantidade == 0)) {
        alertify.error("QUANTIDADE INDISPONÍVEL");
        quantidade = $("#quantidade").val("");
        return false;
    } else {
        quantidadeEstoque = parseInt($("#estoqueView").val());
    }

    dados = $("#frmVendas").serialize();

    $.ajax({
        type: "POST",
        data: dados,
        url: "./Controller/Vendas/AdicionarProdutos.php",
        success: function(r) {
            $("#carrinhoVendas").load("./View/Vendas/CarrinhoVendas.php");
            $("#produtoSelect").val("").change();
            $("#estoqueView").val("");
            $("#precoView").val("");
            $("#quantidade").val("");
            alertify.success("PRODUTO ADICIONADO AO CARRINHO");
            limparCampoPagamentos();
        }
    });
});

$("#btnLimpar").click(function() {
    $.ajax({
        url: "../../Controller/Vendas/LimparTabelaVendasTemporaria.php",
        success: function(r) {
            $("#carrinhoVendas").load("./View/Vendas/CarrinhoVendas.php");
        }
    });
});

$("#btnCadastrar").click(function() {
    var cliente = $("#clienteSelect").val();
    var valorPagamento = $("#valorPagamento").val();
    var formaPagamento = $("#formaPagamento").val();

    if ((cliente == "") || (valorPagamento == "") || (formaPagamento == "")) {
        alertify.error("VERIFIQUE OS CAMPOS OBRIGATORIOS");
        return false;
    }

    dados = $("#frmVendas").serialize();

    $.ajax({
        type: "POST",
        data: dados,
        url: "./Controller/Vendas/CadastrarVendas.php",
        success: function(r) {
            debugger;
            if (r > 0) {
                $("#carrinhoVendas").load("./View/Vendas/CarrinhoVendas.php");
                $("#clienteSelect").val("").change();
                $("#frmVendas")[0].reset();
                alertify.success("SUCESSO");
                // IMPRIMIR COMPROVANTE?
                alertify.confirm("ATENÇÃO", "DESEJA IMPRIMIR COMPROVANTE DE VENDA?", function() {
                    const id = r;
                    alertify.confirm().close();
                    window.open("./Controller/Vendas/CriarComprovante.php?idVenda=" + id);
                }, function() {}).set({
                    labels: {
                        ok: "SIM",
                        cancel: "NÃO"
                    }
                });
            } else if (r == 0) {
                alertify.alert("ATENÇÃO", "CARRINHO VAZIO");
            } else {
                alertify.error("ERRO");
            }
        }
    });
});

// FUNÇÕES
function calculaTotal() {
    var total = $("#total").val();
    var desconto = $("#desconto").val();
    var valorPagamento = $("#valorPagamento").val();
    var valorTotal = total - desconto;
    $("#valorTotal").val(valorTotal.toFixed(2));
    calculaTroco();
}

function calculaTroco() {
    var desconto = $("#desconto").val();
    var valorPagamento = $("#valorPagamento").val();
    var total = $("#total").val();
    var totalDesconto = total - desconto;
    var totalTroco = valorPagamento - totalDesconto;
    if (totalTroco < 0) {
        $(".saldoDevedor").show();
        $(".troco").hide();
        $("#troco").val("");
        $(".desconto").hide();
        $("#desconto").val("");
        $("#saldoDevedor").val(Math.abs(totalTroco));
    } else {
        $(".saldoDevedor").hide();
        $(".troco").show();
        $(".desconto").show();
        $("#saldoDevedor").val("");
    }
    $("#troco").val(totalTroco.toFixed(2));
}

function limparCampoPagamentos() {
    $("#valorPagamento").val("");
    $("#desconto").val("");
    $("#troco").val("");
    $("#saldoDevedor").val("");
}

function resetFormPagamentos() {
    $("#desconto").prop("disabled", true);
    $(".saldoDevedor").hide();
    $(".desconto").show();
    $(".troco").show();
}
</script>
<?php
} else {
    header("location: ./index.php");
}
?>