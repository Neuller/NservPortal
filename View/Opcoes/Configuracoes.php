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
                    <h3><strong>CONFIGURAÇÕES</strong></h3>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <span class="btn btn-block btn-lg btn-primary btnGroupConfiguracoes" id="alterarSenha" title="ALTERAR SENHA">ALTERAR SENHA</span>
                </div>
            </div>

            <div class="divForm">
                <div class="mx-auto">
                    <div id="formulario"></div>
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

        function initForm() {}

        function setEvents() {
            $("#alterarSenha").click(function() {
                $("#formulario").load("./View/Opcoes/AlterarSenha.php");
            });
        }
    </script>
<?php
} else {
    header("location:./index.php");
}
?>