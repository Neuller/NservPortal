<?php
session_start();
if (isset($_SESSION['User'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <?php require_once "../../../Classes/Conexao.php";
        $c = new conectar();
        $conexao = $c->conexao();
        ?>
    </head>

    <body>
        <div class="container">
            <!-- CABEÇALHO -->
            <div class="cabecalho bgGray">
                <div class="text-center textCabecalho opacidade">
                    <h3><strong>CONTAS A PAGAR</strong></h3>
                </div>
            </div>
            <!-- FORMULÁRIO -->
            <div class="divFormulario">
                <div class="mx-auto">
                    <form id="frmContasAPagar">
                        <div>
                            <!-- CADASTRAR TÍTULO -->
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                <div class="text-left">
                                    <h4><strong>CADASTRAR TÍTULO</strong></h4>
                                </div>
                                <hr>
                            </div>
                            <!-- TIPO -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>TIPO</label>
                                    <select class="form-control input-sm" id="tipo" name="tipo">
                                        <option value="">SELECIONE UM TIPO</option>
                                        <option value="BOLETO">BOLETO</option>
                                        <option value="OUTROS">OUTROS</option>
                                    </select>
                                </div>
                            </div>
                            <!-- REFERÊNCIA -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>REFERÊNCIA</label>
                                    <input type="text" readonly class="form-control input-sm text-uppercase" id="referencia" name="referencia">
                                </div>
                            </div>
                            <!-- DESCRIÇÃO -->
                            <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
                                <div>
                                    <label>DESCRIÇÃO</label>
                                    <input type="text" class="form-control input-sm align text-uppercase" id="descricao" name="descricao" maxlenght="100">
                                </div>
                            </div>
                            <!-- DATA DE VENCIMENTO -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>DATA DE VENCIMENTO</label>
                                    <input type="date" class="form-control input-sm text-uppercase" id="dataVencimento" name="dataVencimento">
                                </div>
                            </div>
                            <!-- VALOR -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>VALOR</label>
                                    <input type="number" class="form-control input-sm align text-uppercase" id="valor" name="valor">
                                </div>
                            </div>
                            <!-- BOTÕES -->
                            <div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
                                <div class="btnRight">
                                    <span class="btn btn-primary btn-lg" id="btnCadastrar" title="CADASTRAR">CADASTRAR</span>
                                </div>
                            </div>

                            <!-- TÍTULOS EM ANDAMENTO -->
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                <div class="text-left">
                                    <h4><strong>TÍTULOS EM ANDAMENTO</strong></h4>
                                </div>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 tabelas tblMt" align="center">
                                    <div id="tblTitulos"></div>
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
            validarForm("frmContasAPagar");
            camposObrigatorios(["tipo", "descricao", "valor", "dataVencimento"], true);
            moment.locale('pt-br');
            var data = moment().format('DD/MM/YYYY');
            $("#referencia").val(data);
            $('#tblTitulos').load('./Views/Financeiro/ContasAPagar/tblTitulos.php');
        }

        function setEvents() {
            $("#btnCadastrar").click(function() {
                var validator = $("#frmContasAPagar").validate();
                validator.form();
                var checkValidator = validator.checkForm();

                if (checkValidator == false) {
                    alertify.error("VERIFIQUE O(S) CAMPO(S) OBRIGATORIO(S)");
                    return false;
                }

                dados = $("#frmContasAPagar").serialize();

                $.ajax({
                    type: "POST",
                    data: dados,
                    url: "./Procedimentos/Financeiro/ContasAPagar/ContasAPagar.php",
                    success: function(r) {
                        if (r > 0) {
                            $("#frmContasAPagar")[0].reset();
                            $('#tblTitulos').load("./Views/Financeiro/ContasAPagar/tblTitulos.php");
                            alertify.success("SUCESSO");
                        } else {
                            alertify.error("ERRO");
                        }
                    }
                });
            });
        }

        function excluirTitulo(idTitulo) {
            alertify.confirm('ATENÇÃO', 'DESEJA EXCLUIR O TÍTULO?', function() {
                $.ajax({
                    type: "POST",
                    data: "idTitulo=" + idTitulo,
                    url: "./Procedimentos/Financeiro/ContasAPagar/ExcluirTitulo.php",
                    success: function(r) {
                        if (r == 1) {
                            $('#tblTitulos').load("./Views/Financeiro/ContasAPagar/tblTitulos.php");
                            alertify.success("TÍTULO EXCLUÍDO");
                        } else {
                            alertify.error("NÃO FOI POSSÍVEL EXCLUIR");
                        }
                    }
                });
            });
        }

        function atualizarTitulo(idTitulo) {
            $('#conteudo').load("./Views/Financeiro/AtualizarTitulos.php?id=" + idTitulo);
        }
    </script>
<?php
} else {
    header("location:./index.php");
}
?>