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
        ?>
    </head>

    <body>
        <div class="container">
            <div class="cabecalho bgGray">
                <div class="text-center textCabecalho opacidade">
                    <h3><strong>CADASTRAR ORÇAMENTOS</strong></h3>
                </div>
            </div>

            <div class="divFormulario">
                <div class="mx-auto">
                    <form id="frmOrcamentos">
                        <div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="text-left">
                                    <h4><strong>DADOS DO DESTINATÁRIO </strong></h4>
                                </div>
                                <hr>
                            </div>
                            <!-- CLIENTE -->
                            <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
                                <div>
                                    <label>CLIENTE</label>
                                    <select class="form-control input-sm" id="clienteSelect" name="clienteSelect">
                                        <option value="">SELECIONE UM CLIENTE</option>
                                        <?php
                                        $sql = "SELECT id_cliente, nome, celular FROM clientes ORDER BY id_cliente DESC";
                                        $result = mysqli_query($conexao, $sql);

                                        while ($cliente = mysqli_fetch_row($result)) :
                                        ?>
                                            <option value="<?php echo $cliente[0] ?>"><?php echo $cliente[1] ?> - <?php echo $cliente[2] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <!-- RESPONSAVEL -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>RESPONSÁVEL</label>
                                    <input type="text" class="form-control input-sm align text-uppercase" id="resp" name="resp">
                                </div>
                            </div>

                            <!-- PRODUTOS-->
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
                            <!-- QUANTIDADE -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>QUANTIDADE</label>
                                    <input type="number" class="form-control input-sm estoque text-uppercase quantidade" id="quantidade" name="quantidade" maxlenght="10">
                                </div>
                            </div>
                            <!-- VALOR DA UNIDADE -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>VALOR DA UNIDADE</label>
                                    <input type="number" class="form-control input-sm text-uppercase" id="precoView" name="precoView">
                                </div>
                            </div>
                            <!-- BOTÕES -->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="btnRight">
                                    <span class="btn btn-lg btn-success" id="btnAdicionar" title="ADICIONAR">ADICIONAR</span>
                                    <!-- <span class="btn btn-warning" id="btnLimpar" title="Limpar">LIMPAR</span> -->
                                </div>
                            </div>
                            <!-- TABELA PRODUTOS -->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div align="center">
                                    <div id="carrinhoProdutos"></div>
                                </div>
                            </div>
                            <!-- TOTAL -->
                            <div class="col-xs-3 col-md-3 col-sm-3 itensFormulario">
                                <div>
                                    <label>TOTAL</label>
                                    <input readonly type="text" class="form-control input-sm text-uppercase" id="totalProdutos" name="totalProdutos">
                                </div>
                            </div>

                            <!-- COMPONENTE SERVIÇOS -->
                            <div id="componenteServicos"></div>

                            <!-- BOTÕES -->
                            <div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
                                <div class="btnRight">
                                    <span class="btn btn-lg btn-light glyphicon glyphicon-floppy-disk" id="btnSalvar" title="SALVAR"></span>
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
            $("#carrinhoProdutos").load("./Views/Orcamentos/Tabelas/CarrinhoProdutos.php");
            $("#componenteServicos").load("./Views/Componentes/InformacoesServicos.php");
            $("#clienteSelect").select2();
            $("#produtoSelect").select2();
            validarForm("frmOrcamentos");
            camposObrigatorios(["clienteSelect"], true);
        }

        function setEvents() {
            $("#btnSalvar").click(function() {
                var validator = $("#frmOrcamentos").validate();
                validator.form();
                var checkValidator = validator.checkForm();

                if (checkValidator == false) {
                    alertify.error("VERIFIQUE O(S) CAMPO(S) OBRIGATORIO(S)");
                    return false;
                }
            });

            $("#produtoSelect").change(function() {
                var produto = $("#produtoSelect").val();
                $.ajax({
                    type: "POST",
                    data: "idProduto=" + produto,
                    url: "./Procedimentos/Produtos/ObterDadosProdutos.php",
                    success: function(r) {
                        dado = jQuery.parseJSON(r);
                        $("#precoView").val(dado["preco"]);
                    }
                });
            });

            $("#btnAdicionar").click(function() {
                camposObrigatorios(["produtoSelect", "quantidade"], true);
                var validator = $("#frmOrcamentos").validate();
                validator.form();
                var checkValidator = validator.checkForm();

                if (checkValidator == false) {
                    alertify.error("VERIFIQUE O(S) CAMPO(S) OBRIGATORIO(S)");
                    return false;
                }

                dados = $("#frmOrcamentos").serialize();

                $.ajax({
                    type: "POST",
                    data: dados,
                    url: "./Procedimentos/Orcamentos/Tabelas/AdicionarProduto.php",
                    success: function(r) {
                        $("#carrinhoProdutos").load("./Views/Orcamentos/Tabelas/CarrinhoProdutos.php");
                        $("#produtoSelect").val("").change();
                        $("#estoqueView").val("");
                        $("#precoView").val("");
                        $("#quantidade").val("");
                        alertify.success("PRODUTO ADICIONADO");
                    }
                });
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
    </script>
<?php
} else {
    header("location:./index.php");
}
?>