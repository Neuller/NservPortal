<?php
session_start();
if (isset($_SESSION["User"])) {
?>

    <!DOCTYPE html>
    <html>

    <head>
        <?php require_once "./Dependencias.php" ?>
        <?php require_once "./Classes/Conexao.php";
        $c = new conectar();
        $conexao = $c->conexao();
        $idUsuario = $_SESSION["IDUser"];
        ?>
    </head>

    <body>
        <div class="bgGray">
            <div class="container">
                <!-- IMAGEM LOGO -->
                <div class="logo">
                    <a class="navbar-brand" id="logo" href="#"><img class="img-responsive img-thumbnail" src="./Img/NSERV.png" title="PÁGINA INICIAL" width="200px" height="150px"></a>
                </div>

                <!-- BOTAO MENU PRINCIPAL -->
                <div class="btnMenuPrincipal">
                    <span class="btn btn-danger btn-lg" id="btnExibirMenu" title="MENU"><span class="glyphicon glyphicon-menu-hamburger btn-lg"></span>MENU</span>
                </div>
            </div>

            <!-- BANNER PRINCIPAL -->
            <div class="bannerPrincipal">
                <img src="./Img/BANNER_2021.png" class="img-fluid imagemBanner" title="SISTEMA DE GESTÃO NSERV">
            </div>

            <!-- MENU PRINCIPAL --> 
            <div class="container">
                <div id="menuPrincipal" class="bgGray menuPrincipal"></div>
            </div>
        </div>

        <!-- CONTEUDO -->
        <div id="conteudo"></div>

        <!-- FOOTER -->
        <footer class="bgGradient text-left foot fixed-bottom">
            <div class="text-left p-3">
                © 2022 COPYRIGHT
            </div>
        </footer>
    </body>

    </html>

    <script type="text/javascript">
        $(document).ready(function($) {
            initForm();
            setEvents();
        });

        function initForm() {
            $("#conteudo").load("./Views/Principal/PaginaPrincipal.php");
            $("#menuPrincipal").load("./Views/Menu/MenuPrincipal.php");
        }

        function setEvents() {
            // LOGO
            $("#logo").click(function(e) {
                $("#conteudo").load("./Views/Principal/PaginaPrincipal.php");
            });
            // MENU PRINCIPAL
            $("#btnExibirMenu").click(function(e) {
                const t = 1000;
                $("#menuPrincipal").slideToggle(t);
            });
        }

        function aDesenvolver() {
            alertify.error("FUNCIONALIDADE INDISPONIVEL");
        }
    </script>

<?php
} else {
    header("location: ./index.php");
}
?>