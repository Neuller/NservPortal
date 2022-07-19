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
            <div class="cabecalho bgGray">
                <div class="text-center textCabecalho opacidade">
                    <h3><strong>ALTERAR SENHA</strong></h3>
                </div>
            </div>
            <!-- FORMULÁRIO -->
            <div class="divForm">
                <div class="mx-auto">
                    <form id="frmAlterarSenha">
                        <div>
                            <!-- SENHA ANTIGA -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>SENHA ANTIGA</label>
                                    <input type="text" class="form-control input-sm text-uppercase" id="senhaAntiga" name="senhaAntiga" maxlenght="100">
                                </div>
                            </div>
                            <!-- -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label></label>
                                </div>
                            </div>
                            <!-- -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label></label>
                                </div>
                            </div>
                            <!-- NOVA SENHA -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label> NOVA SENHA</label>
                                    <input type="password" class="form-control input-sm text-uppercase" id="novaSenha" name="novaSenha" maxlenght="12">
                                </div>
                            </div>
                            <!-- -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label></label>
                                </div>
                            </div>
                            <!-- -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label></label>
                                </div>
                            </div>
                            <!-- CONFIRMAR NOVA SENHA -->
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label> CONFIRMAR NOVA SENHA</label>
                                    <input type="password" class="form-control input-sm text-uppercase" id="confirmarNovaSenha" name="confirmarNovaSenha" maxlenght="12">
                                </div>
                            </div>
                            <!-- BOTÕES -->
                            <div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
                                <div class="btnRight">
                                    <span class="btn btn-lg btn-primary" id="btnAlterarSenha" title="ALTERAR SENHA">ALTERAR SENHA</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
            validarForm("frmAlterarSenha");
            camposObrigatorios(["senhaAntiga", "novaSenha", "confirmarNovaSenha"], true);
        }

        function setEvents() {
            $("#btnAlterarSenha").click(function() {
                var validator = $("#frmAlterarSenha").validate();
                validator.form();
                var checkValidator = validator.checkForm();
                var novaSenha = $("#novaSenha").val();
                var confirmarNovaSenha = $("#confirmarNovaSenha").val();
                if (checkValidator == false) {
                    alertify.error("VERIFIQUE O(S) CAMPO(S) OBRIGATORIO(S)");
                    return false;
                } {}
                if ((novaSenha != confirmarNovaSenha)) {
                    alertify.error("AS SENHAS SÃO DIFERENTES");
                    return false;
                }
            });
        }
    </script>
<?php
} else {
    header("location:./index.php");
}
?>