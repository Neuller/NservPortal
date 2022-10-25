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
            <div class="cabecalho bgGray">
                <div class="text-center textCabecalho opacidade">
                    <h3><strong>CADASTRAR PRODUTOS</strong></h3>
                </div>
            </div>
            <!-- FORMULÁRIO -->
            <div class="divFormulario">
                <div class="mx-auto">
                    <form id="frmProdutos">
                        <div>
                            <!-- CATEGORIA -->
                            <div class="col-md-8 col-sm-8 col-xs-8 itensFormulario">
                                <div>
                                    <label>CATEGORIA</label>
                                    <select class="form-control input-sm" id="categoria" name="categoria">
                                        <option value="">SELECIONE UMA CATEGORIA</option>
                                        <option value="CEM">C&M INFO</option>
                                        <option value="GABINETE">GABINETE</option>
                                        <option value="HARD DISK">HARD DISK</option>
                                        <option value="IMPRESSORA">IMPRESSORA</option>
                                        <option value="MEMORIA">MEMORIA</option>
                                        <option value="MONITOR">MONITOR</option>
                                        <option value="PLACA DE VIDEO">PLACA DE VIDEO</option>
                                        <option value="PLACA MAE">PLACA MAE</option>
                                        <option value="PROCESSADOR">PROCESSADOR</option>
                                        <option value="OUTROS">OUTROS</option>
                                    </select>
                                </div>
                            </div>
                            <!-- CÓDIGO -->
                            <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
                                <div>
                                    <label>CÓDIGO</label>
                                    <input type="text" class="form-control input-sm codigo text-uppercase" id="codigo" name="codigo" maxlenght="10">
                                </div>
                            </div>
                            <!-- DESCRIÇÃO -->
                            <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
                                <div>
                                    <label>DESCRIÇÃO</label>
                                    <textarea type="text" class="form-control input-sm text-uppercase" id="descricao" name="descricao" maxlength="1000" rows="3" style="resize: none"></textarea>
                                </div>
                            </div>
                            <!-- GARANTIA -->
                            <div class="col-md-8 col-sm-8 col-xs-8 itensFormulario">
                                <div>
                                    <label>GARANTIA</label>
                                    <select class="form-control input-sm" id="garantia" name="garantia">
                                        <option value="">SELECIONE UM PRAZO DE GARANTIA</option>
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
                                    <label>ESTOQUE</label>
                                    <input type="number" class="form-control input-sm estoque text-uppercase" id="estoque" name="estoque" maxlenght="10">
                                </div>
                            </div>
                            <!-- VALOR UNIDADE -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>VALOR UNIDADE</label>
                                    <input type="number" class="form-control input-sm text-uppercase" id="preco" name="preco" maxlenght="10">
                                </div>
                            </div>
                            <!-- VALOR INSTALADO -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>VALOR INSTALADO</label>
                                    <input type="number" class="form-control input-sm text-uppercase" id="precoInstalacao" name="precoInstalacao" maxlenght="10">
                                </div>
                            </div>
                            <!-- NF -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>ESTOQUE NF</label>
                                    <input type="text" class="form-control nf input-sm text-uppercase" id="nf" name="nf" maxlenght="10">
                                </div>
                            </div>
                            <!-- NCM -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>NCM</label>
                                    <input type="text" class="form-control ncm input-sm text-uppercase" id="ncm" name="ncm" maxlenght="10">
                                </div>
                            </div>
                            <!-- BOTÂO CADASTRAR -->
                            <div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
                                <div class="btnRight">
                                    <span class="btn btn-primary btn-lg" id="btnCadastrar" title="CADASTRAR">CADASTRAR</span>
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
            $(".codigo").mask("9999999999");
            $(".estoque").mask("9999999999");
            $(".nf").mask("9999999999");
            $(".ncm").mask("9999999999");

            $("#codigo").change(function() {
                var codProduto = $("#codigo").val();
                $.ajax({
                    type: "POST",
                    data: {
                        "codProduto": codProduto
                    },
                    url: "./Controller/Verificacoes/ValidarCodProduto.php",
                    success: function(r) {
                        data = $.parseJSON(r);
                        if (data == 0) {

                        } else {
                            alertify.error("CODIGO EXISTENTE");
                            $("#codigo").val("");
                        }
                    }
                });
            });
            validarForm("frmProdutos");
            camposObrigatorios(["categoria", "codigo", "preco", "descricao", "estoque"], true);
        }

        function setEvents() {
            $("#btnCadastrar").click(function() {
                var descricao = $("#descricao").val();
                var preco = $("#preco").val();
                var categoria = $("#categoria").val();
                var estoque = $("#estoque").val();
                var codigo = $("#codigo").val();
                var garantia = $("#garantia").val();
                var tabela = "produtos"

                var validator = $("#frmProdutos").validate();
                validator.form();
                var checkValidator = validator.checkForm();

                if (checkValidator == false) {
                    alertify.error("VERIFIQUE OS CAMPOS OBRIGATORIOS");
                    return false;
                }
                if ((descricao == "") || (preco == "") || (categoria == "") || (estoque == "") || (codigo == "")) {
                    alertify.error("VERIFIQUE OS CAMPOS OBRIGATORIOS");
                    return false;
                }

                if (garantia == "") {
                    $("#garantia").val("FUNCIONAL");
                }

                dados = $("#frmProdutos").serialize();

                $.ajax({
                    type: "POST",
                    data: dados,
                    url: "./Controller/Produtos/CadastrarProdutos.php",
                    success: function(r) {
                        if (r == 1) {
                            $("#frmProdutos")[0].reset();
                            alertify.success("SUCESSO");
                        } else {
                            alertify.error("ERRO");
                        }
                    }
                });
            });
        }
    </script>
<?php
} else {
    header("location: ./index.php");
}
?>