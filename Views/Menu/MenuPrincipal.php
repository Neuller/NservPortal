<html>

<body>
    <nav class="navbar-expand navbar-light">
        <div id="navbar">
            <ul class="nav navbar-nav">
                <!-- CLIENTES -->
                <li class="dropdown">
                    <a class="dropdown-toggle itensMenu" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        CLIENTES
                    </a>
                    <ul class="dropdown-menu">
                        <li><a id="cadastrarClientes" href="#">NOVO CLIENTE</a></li>
                        <li><a id="procurarClientes" href="#">PROCURAR CLIENTES</a></li>
                    </ul>
                </li>

                <!-- DOCUMENTOS -->
                <li class="dropdown">
                    <a class="dropdown-toggle itensMenu" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        DOCUMENTOS
                    </a>
                    <ul class="dropdown-menu">
                        <li><a id="dadosEmpresa" href="#">DADOS EMPRESARIAL</a></li>
                    </ul>
                </li>

                <!-- FINANCEIRO -->
                <li class="dropdown">
                    <a class="dropdown-toggle itensMenu" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        FINANCEIRO
                    </a>
                    <ul class="dropdown-menu">
                        <!-- <li><a id="contasAPagar" href="#">CONTAS A PAGAR</a></li> -->
                        <li><a id="fluxoCaixa" href="#">FLUXO DE CAIXA</a></li>
                    </ul>
                </li>

                <!-- ORÇAMENTOS -->
                <!-- <li class="dropdown">
                    <a class="dropdown-toggle itensMenu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        ORÇAMENTOS
                    </a>
                    <ul class="dropdown-menu">
                        <li><a id="cadastrarOrcamentos" href="#">NOVO ORÇAMENTO</a></li>
                    </ul>
                </li> -->

                <!-- PRODUTOS -->
                <li class="dropdown">
                    <a class="dropdown-toggle itensMenu" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        PRODUTOS
                    </a>
                    <ul class="dropdown-menu">
                        <li><a id="cadastrarProdutos" href="#">NOVO PRODUTO</a></li>
                        <li><a id="procurarProdutos" href="#">PROCURAR PRODUTOS</a></li>
                    </ul>
                </li>

                <!-- SERVIÇOS -->
                <li class="dropdown">
                    <a class="dropdown-toggle itensMenu" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        SERVIÇOS
                    </a>
                    <ul class="dropdown-menu">
                        <li><a id="cadastrarServicos" href="#">NOVO SERVIÇO</a></li>
                        <li><a id="procurarServicos" href="#">PROCURAR SERVIÇOS</a></li>
                        <li><a id="precoServicos" href="#">TABELA DE PREÇOS</a></li>
                    </ul>
                </li>

                <!-- USUARIOS -->
                <!-- <li class="dropdown">
                    <a class="dropdown-toggle itensMenu" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        USUÁRIOS
                    </a>
                    <ul class="dropdown-menu">
                        <li><a id="cadastrarUsuarios" href="#">CADASTRAR USUÁRIO</a></li>
                        <li><a id="procurarUsuarios" href="#">PROCURAR USUÁRIO</a></li>
                    </ul>
                </li> -->

                <!-- VENDAS -->
                <li class="dropdown">
                    <a class="dropdown-toggle itensMenu" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        VENDAS
                    </a>
                    <ul class="dropdown-menu">
                        <li><a id="cadastrarVendas" href="#">NOVA VENDA</a></li>
                        <li><a id="procurarVendas" href="#">PROCURAR VENDAS</a></li>
                    </ul>
                </li>

                <!-- OPÇÕES -->
                <li class="dropdown">
                    <a class="dropdown-toggle itensMenu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        OPÇÕES
                    </a>
                    <ul class="dropdown-menu">
                        <!-- <li><a id="configuracoes" href="#">CONFIGURAÇÕES</a></li> -->
                        <li>
                            <a style="color: red" href="./Procedimentos/Sair.php"><span class="glyphicon glyphicon-off"></span> SAIR</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</body>

</html>

<script type="text/javascript">
$(document).ready(function($) {
    initForm();
    setEvents();
});

function initForm() {
    $('#menuPrincipal').hide();
}

function setEvents() {
    // CLIENTES
    $("#cadastrarClientes").click(function(e) {
        $('#conteudo').load("./Views/Clientes/CadastrarClientes.php");
    });
    $("#procurarClientes").click(function(e) {
        $('#conteudo').load("./Views/Clientes/ProcurarClientes.php");
    });
    // DOCUMENTOS
    $("#dadosEmpresa").click(function(e) {
        window.open("./Views/Documentos/DadosEmpresarial.pdf");
    });
    // FINANCEIRO
    $("#contasAPagar").click(function(e) {
        $('#conteudo').load("./Views/Financeiro/ContasAPagar/ContasAPagar.php");
    });
    $("#fluxoCaixa").click(function(e) {
        $('#conteudo').load("./Views/Financeiro/FluxoCaixa.php");
    });
    // ORÇAMENTOS
    // $("#cadastrarOrcamentos").click(function(e) {
    //     $('#conteudo').load("./Views/Orcamentos/CadastrarOrcamentos.php");
    // });

    // PRODUTOS
    $("#cadastrarProdutos").click(function(e) {
        $('#conteudo').load("./Views/Produtos/CadastrarProdutos.php");
    });
    $("#procurarProdutos").click(function(e) {
        $('#conteudo').load("./Views/Produtos/ProcurarProdutos.php");
    });
    // SERVIÇOS
    $("#cadastrarServicos").click(function(e) {
        $('#conteudo').load("./Views/Servicos/CadastrarServicos.php");
    });
    $("#procurarServicos").click(function(e) {
        $('#conteudo').load("./Views/Servicos/ProcurarServicos.php");
    });
    $("#precoServicos").click(function(e) {
        $('#conteudo').load("./Views/Servicos/PrecoServicos.php");
    });
    // USUÁRIOS
    $("#cadastrarUsuarios").click(function(e) {
        $('#conteudo').load("./Views/Usuarios/CadastrarUsuarios.php");
    });
    //OPCOES
    $("#configuracoes").click(function(e) {
        $('#conteudo').load("./Views/Opcoes/Configuracoes.php");
    });
    // VENDAS
    $("#cadastrarVendas").click(function(e) {
        moment.locale("pt-br");
        var data = moment().format("DD/MM/YYYY");
        $.ajax({
            type: "POST",
            data: "data=" + data,
            url: "./Procedimentos/Financeiro/VerificarStatusCaixa.php",
            success: function(r) {
                retorno = $.parseJSON(r);
                if (retorno == "ABERTO") {
                    $('#conteudo').load("./Views/Vendas/CadastrarVendas.php");
                } else {
                    alertify.error("VERIFIQUE O STATUS DO CAIXA");
                }
            }
        });
    });
    $("#procurarVendas").click(function(e) {
        $('#conteudo').load("./Views/Vendas/ProcurarVendas.php");
    });
}
</script>