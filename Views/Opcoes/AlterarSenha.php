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

        <div class="divForm">
            <div class="mx-auto">
                <form id="frmAlterarSenha">
                    <div>
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