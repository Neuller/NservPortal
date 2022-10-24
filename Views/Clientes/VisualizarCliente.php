<?php
session_start();
if (isset($_SESSION["User"])) {
?>
<!DOCTYPE html>
<html>

<head>
    <?php require_once "../../Classes/Conexao.php"; 
		$c = new conectar();
		$conexao = $c -> conexao();
		$idCliente = $_GET["id"];
		?>
</head>

<body>
    <div class="container">
        <!-- CABEÇALHO -->
        <div class="cabecalho bgGray">
            <div class="text-center textCabecalho opacidade">
                <h3><strong>EDITAR CLIENTE</strong></h3>
            </div>
        </div>
        <!-- FORMULÁRIO -->
        <div class="divFormulario">
            <div class="mx-auto">
                <form id="frmClientesU">
                    <div>
                        <!-- FORMULÁRIO DADOS PESSOAIS -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="text-left">
                                <h4><strong>DADOS PESSOAIS </strong><span class="glyphicon glyphicon-user ml-15"></span>
                                </h4>
                            </div>
                            <hr>
                        </div>
                        <!-- ID CLIENTE -->
                        <div>
                            <input type="text" hidden="" id="idClienteU" name="idClienteU">
                        </div>
                        <!-- NOME -->
                        <div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormulario">
                            <div>
                                <label>NOME COMPLETO</label>
                                <input type="text" class="form-control input-sm align text-uppercase" id="nomeU"
                                    name="nomeU" maxlenght="50">
                            </div>
                        </div>
                        <!-- CPF -->
                        <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>CPF</label>
                                <input type="text" class="form-control input-sm align cpf text-uppercase" id="cpfU"
                                    name="cpfU">
                            </div>
                        </div>
                        <!-- CNPJ -->
                        <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>CNPJ</label>
                                <input type="text" class="form-control input-sm align cnpj text-uppercase" id="cnpjU"
                                    name="cnpjU">
                            </div>
                        </div>
                        <!-- E-MAIL -->
                        <div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormulario">
                            <div>
                                <label>E-MAIL</label>
                                <input type="text" class="form-control input-sm align text-uppercase"
                                    placeholder="exemplo@exemplo.com" id="emailU" name="emailU">
                            </div>
                        </div>

                        <!-- FORMULÁRIO ENDEREÇO -->
                        <div class="separador col-md-12 col-sm-12 col-xs-12">
                            <div class="text-left">
                                <h4><strong>ENDEREÇO </strong><span class="glyphicon glyphicon-home ml-15"></span></h4>
                            </div>
                            <hr>
                        </div>
                        <!-- CEP -->
                        <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>CEP</label>
                                <input type="text" class="form-control input-sm align cep text-uppercase"
                                    placeholder="#####-###" id="cepU" name="cepU">
                            </div>
                        </div>
                        <!-- BAIRRO -->
                        <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>BAIRRO</label>
                                <input type="text" class="form-control input-sm align text-uppercase" id="bairroU"
                                    name="bairroU">
                            </div>
                        </div>
                        <!-- ENDEREÇO -->
                        <div class="mb-20px col-md-8 col-sm-8 col-xs-8 itensFormulario">
                            <div>
                                <label>ENDEREÇO</label>
                                <input type="text" class="form-control input-sm align text-uppercase" id="enderecoU"
                                    name="enderecoU">
                            </div>
                        </div>
                        <!-- UF -->
                        <div class="mb-20px col-md-4 col-sm-4 col-xs-4 itensFormulario">
                            <div>
                                <label>UF</label>
                                <input type="text" class="form-control input-sm align text-uppercase" id="ufU"
                                    name="ufU">
                            </div>
                        </div>
                        <!-- NÚMERO -->
                        <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>NÚMERO</label>
                                <input type="text" class="form-control input-sm align text-uppercase" id="numeroU"
                                    name="numeroU">
                            </div>
                        </div>
                        <!-- COMPLEMENTO -->
                        <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>COMPLEMENTO</label>
                                <input type="text" class="form-control input-sm align text-uppercase" id="complementoU"
                                    name="complementoU">
                            </div>
                        </div>

                        <!-- FORMULÁRIO TELEFONES -->
                        <div class="separador col-md-12 col-sm-12 col-xs-12">
                            <div class="text-left">
                                <h4><strong>TELEFONES </strong><span class="glyphicon glyphicon-phone-alt ml-15"></span>
                                </h4>
                            </div>
                            <hr>
                        </div>
                        <!-- TELEFONE -->
                        <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>TELEFONE</label>
                                <input type="text" class="form-control input-sm align telefone text-uppercase"
                                    placeholder="(##) ####-####" id="telefoneU" name="telefoneU">
                            </div>
                        </div>
                        <!-- CELULAR -->
                        <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>CELULAR<span class="required">*</span></label>
                                <input type="text" class="form-control input-sm align celular text-uppercase"
                                    placeholder="(##) # ####-####" id="celularU" name="celularU">
                            </div>
                        </div>
                        <!-- TELEFONE ALTERNATIVO -->
                        <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>TELEFONE ALTERNATIVO</label>
                                <input type="text" class="form-control input-sm align telefone text-uppercase"
                                    placeholder="(##) ####-####" id="telefone2U" name="telefone2U">
                            </div>
                        </div>
                        <!-- CELULAR ALTERNATIVO -->
                        <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>CELULAR ALTERNATIVO</label>
                                <input type="text" class="form-control input-sm align celular text-uppercase"
                                    placeholder="(##) # ####-####" id="celular2U" name="celular2U">
                            </div>
                        </div>
                        <!-- BOTÕES -->
                        <div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
                            <div class="btnRight">
                                <span class="btn btn-danger btn-lg" id="btnCancelar" title="CANCELAR">CANCELAR</span>
                                <span class="btn btn-warning btn-lg" id="btnEditar" title="EDITAR">EDITAR</span>
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
$(document).ready(function($) {
    $(".cpf").mask("999.999.999-99");
    $(".cnpj").mask("99.999.999/9999-99");
    $(".cep").mask("99999-999");
    $(".telefone").mask("(99) 9999-9999");
    $(".celular").mask("(99) 9 9999-9999");
    idCliente = "<?php echo @$idCliente ?>";
    carregarDados(idCliente);
});


$(".cep").change(function() {
    var cep = $("#cepU").val();
    var urlPesquisaCep = "https://viacep.com.br/ws/" + cep + "/json";

    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: urlPesquisaCep,
        success: function(r) {
            $("#bairroU").val(r.bairro);
            $("#enderecoU").val(r.logradouro);
            $("#complementoU").val(r.complemento);
            $("#ufU").val(r.uf);
        },
        error: function() {
            alertify.error("CEP INVÁLIDO");
            $("#cepU").val("");
            return false;
        }
    });
});

$("#btnEditar").click(function() {
    var nome = $("#nome").val();
    var cpf = $("#cpfU").val();
    var cnpj = $("#cnpjU").val();
    var celular = $("#celularU").val();

    if ((nome == "") || (celular == "")) {
        alertify.error("VERIFIQUE OS CAMPOS OBRIGATORIOS");
        return false;
    }

    $.ajax({
        type: "POST",
        data: {
            "CPF": cpf,
            "CNPJ": cnpj,
            "CELULAR": celular
        },
        url: "./Procedimentos/Clientes/ValidarCadastroCliente.php",
        success: function(r) {
            data = $.parseJSON(r);
            if (data == 0) {
                dados = $("#frmClientesU").serialize();
                $.ajax({
                    type: "POST",
                    data: dados,
                    url: "./Procedimentos/Clientes/EditarCliente.php",
                    success: function(r) {
                        if (r == 1) {
                            $("#frmClientesU")[0].reset();
                            $("#conteudo").load(
                            "./Views/Clientes/ProcurarClientes.php");
                            alertify.success("SUCESSO");
                        } else {
                            alertify.error("ERRO");
                        }
                    }
                });
            } else {
                alertify.error("CADASTRO EXISTENTE");
            }
        }
    });
});

$("#btnCancelar").click(function() {
    alertify.confirm("ATENÇÃO", "DESEJA CANCELAR?", function() {
        alertify.confirm().close();
        $("#frmClientesU")[0].reset();
        $("#conteudo").load("./Views/Clientes/ProcurarClientes.php");
    }, function() {}).set({
        labels: {
            ok: "SIM",
            cancel: "NÃO"
        }
    });
});

function carregarDados(id) {
    $.ajax({
        type: "POST",
        data: "idCliente=" + id,
        url: "./Procedimentos/Clientes/ObterDadosCliente.php",
        success: function(r) {
            dado = jQuery.parseJSON(r);
            $("#idClienteU").val(dado["id_cliente"]);
            $("#nomeU").val(dado["nome"]);
            $("#cpfU").val(dado["cpf"]);
            $("#cnpjU").val(dado["cnpj"]);
            $("#cepU").val(dado["cep"]);
            $("#bairroU").val(dado["bairro"]);
            $("#ufU").val(dado["uf"]);
            $("#enderecoU").val(dado["endereco"]);
            $("#numeroU").val(dado["numero"]);
            $("#complementoU").val(dado["complemento"]);
            $("#telefoneU").val(dado["telefone"]);
            $("#telefone2U").val(dado["telefone2"]);
            $("#celularU").val(dado["celular"]);
            $("#celular2U").val(dado["celular2"]);
            $("#emailU").val(dado["email"]);
        }
    });
}
</script>
<?php
} else {
	header("location:./index.php");
}
?>