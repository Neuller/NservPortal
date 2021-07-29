<?php
session_start();
if (isset($_SESSION['User'])) {
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
            <!-- CABEÇALHO -->
            <div class="cabecalho bgGray">
                <div class="text-center textCabecalho opacidade">
                    <h3><strong> BOLETOS</strong></h3>
                </div>
            </div>
            <!-- FORMULÁRIO -->
            <div class="divFormulario">
                <div class="mx-auto">
                    <form id="frmBoletos">
                        <div>
                            <!-- FORMULÁRIO DADOS USUÁRIOS -->

                            <!-- REFERÊNCIA -->
                            <div class="col-md-3 col-sm-3 col-xs-3 itensFormulario">
                                <div>
                                    <label>REFERÊNCIA</label>
                                    <input type="date" class="form-control input-sm text-uppercase" id="referencia" name="referencia">
                                </div>
                            </div>
                            <!-- DESCRIÇÃO -->
                            <div class="col-md-9 col-sm-9 col-xs-9 itensFormulario">
                                <div>
                                    <label>DESCRIÇÃO</label>
                                    <input type="text" class="form-control input-sm align text-uppercase" id="descricao" name="descricao" maxlenght="100">
                                </div>
                            </div>
                            <!-- DATA DE VENCIMENTO -->
                            <div class="col-md-3 col-sm-3 col-xs-3 itensFormulario">
                                <div>
                                    <label>DATA DE VENCIMENTO</label>
                                    <input type="date" class="form-control input-sm text-uppercase" id="dataVencimento" name="dataVencimento">
                                </div>
                            </div>
                            <!-- VALOR -->
                            <div class="col-md-3 col-sm-3 col-xs-3 itensFormulario">
                                <div>
                                    <label>VALOR</label>
                                    <input type="number" class="form-control input-sm align text-uppercase" id="valor" name="valor">
                                </div>
                            </div>
                        </div><!-- BOTÕES -->
                        <div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
                            <div class="btnRight">
                                <span class="btn btn-primary" id="btnCadastrar" title="CADASTRAR">CADASTRAR</span>
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
            validarForm("frmBoletos");
            camposObrigatorios(["referencia", "descricao", "valor", "dataVencimento"], true);
        }

        function setEvents() {
            $("#btnCadastrar").click(function() {
                var validator = $("#frmBoletos").validate();
                validator.form();
                var checkValidator = validator.checkForm();

                if (checkValidator == false) {
                    alertify.error("PREENCHA TODOS OS CAMPOS OBRIGATÓRIOS");
                    return false;
                }

                dados = $("#frmBoletos").serialize();

                $.ajax({
                    type: "POST",
                    data: dados,
                    url: "./Procedimentos/Financeiro/Boletos/CadastrarBoletos.php",
                    success: function(r) {
                        if (r > 0) {
                            $("#frmBoletos")[0].reset();
                            alertify.success("CADASTRO REALIZADO");
                        } else {
                            alertify.error("NÃO FOI POSSÍVEL CADASTRAR");
                        }
                    }
                });
            });
        }
    </script>
<?php
} else {
    header("location:./index.php");
}
?>