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
                    <h3><strong>ATUALIZAR TITULOS</strong></h3>
                </div>
            </div>
            <!-- FORMULÁRIO -->
            <div class="divFormulario">
                <div class="mx-auto">
                    <form id="frmAtualizarTitulo">
                        <div>
                            <!-- DESCRIÇÃO -->
                            <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
                                <div>
                                    <label>DESCRIÇÃO</label>
                                    <input type="text" class="form-control input-sm text-uppercase" id="descricao" name="descricao" maxlenght="500">
                                </div>
                            </div>
                        </div>
                        <!-- PAGAMENTO REALIZADO? -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>PAGAMENTO REALIZADO?</label>
                            </div>
                            <div>
                                <input type="radio" id="pagamentoRealizado" name="pagamentoRealizado" value="NAO" checked onclick="setDataPagamento()">
                                <label class="btnRadio">NÃO</label>
                                <input type="radio" id="pagamentoRealizado" name="pagamentoRealizado" value="SIM" onclick="setDataPagamento()">
                                <label class="btnRadio">SIM</label>
                            </div>
                        </div>
                        <!-- DATA DO PAGAMENTO -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>DATA DO PAGAMENTO</label>
                                <input type="date" class="form-control text-uppercase input-sm" id="dataPagamento" name="dataPagamento">
                            </div>
                        </div>
                        <!-- BOTÕES -->
                        <div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
                            <div class="btnRight">
                                <span class="btn btn-primary btn-lg" id="btnAtualizar" title="ATUALIZAR">ATUALIZAR</span>
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
            validarForm("frmAtualizarTitulo");
            camposObrigatorios(["descricao", "dataPagamento"], true);
        }

        function setEvents() {
            $('#btnAtualizar').click(function() {
                var validator = $("#frmAtualizarTitulo").validate();
                validator.form();
                var checkValidator = validator.checkForm();

                if (checkValidator == false) {
                    alertify.error("VERIFIQUE O(S) CAMPO(S) OBRIGATORIO(S)");
                    return false;
                }
            });
            function setDataPagamento() {
                var radios = $("input:radio[name = pagamentoRealizado]");
                if (radios == "NAO") {
                    
                    console.log("Nao");
                } else {
                    
                    console.log("Sim");
                }
            }

        }
    </script>
<?php
} else {
    header("location:./index.php");
}
?>