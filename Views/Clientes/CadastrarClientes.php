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
		?>
</head>

<body>
    <div class="container">
        <!-- CABEÇALHO -->
        <div class="cabecalho bgGray">
            <div class="text-center textCabecalho opacidade">
                <h3><strong>CADASTRAR CLIENTES</strong></h3>
            </div>
        </div>
        <!-- FORMULÁRIO -->
        <div class="divFormulario">
            <div class="mx-auto">
                <form id="frmClientes">
                    <div>
                        <!-- FORMULÁRIO DADOS PESSOAIS -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="text-left">
                                <h4><strong>DADOS PESSOAIS </strong><span class="glyphicon glyphicon-user ml-15"></span>
                                </h4>
                            </div>
                            <hr>
                        </div>
                        <!-- NOME -->
                        <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
                            <div>
                                <label>NOME COMPLETO</label>
                                <input type="text" class="form-control input-sm text-uppercase" id="nome" name="nome"
                                    maxlenght="100">
                            </div>
                        </div>
                        <!-- CPF -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>CPF</label>
                                <input type="text" class="form-control input-sm align cpf text-uppercase"
                                    placeholder="###.###.###-##" id="cpf" name="cpf" maxlenght="100">
                            </div>
                        </div>
                        <!-- CNPJ -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>CNPJ</label>
                                <input type="text" class="form-control input-sm align cnpj text-uppercase"
                                    placeholder="##.###.###/####-##" id="cnpj" name="cnpj" maxlenght="100">
                            </div>
                        </div>
                        <!-- E-MAIL -->
                        <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
                            <div>
                                <label>E-MAIL</label>
                                <input type="text" class="form-control input-sm align text-uppercase"
                                    placeholder="exemplo@exemplo.com" id="email" name="email" maxlenght="100">
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
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>CEP</label>
                                <input type="text" class="form-control input-sm align cep text-uppercase"
                                    placeholder="#####-###" id="cep" name="cep" maxlenght="100">
                            </div>
                        </div>
                        <!-- BAIRRO -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>BAIRRO</label>
                                <input type="text" class="form-control input-sm align text-uppercase" id="bairro"
                                    name="bairro" maxlenght="100">
                            </div>
                        </div>
                        <!-- ENDEREÇO -->
                        <div class="col-md-8 col-sm-8 col-xs-8 itensFormulario">
                            <div>
                                <label>ENDEREÇO</label>
                                <input type="text" class="form-control input-sm align text-uppercase" id="endereco"
                                    name="endereco" maxlenght="100">
                            </div>
                        </div>
                        <!-- UF -->
                        <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
                            <div>
                                <label>UF</label>
                                <input type="text" class="form-control input-sm align text-uppercase" id="uf" name="uf"
                                    maxlenght="100">
                            </div>
                        </div>
                        <!-- NÚMERO -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>NÚMERO</label>
                                <input type="text" class="form-control input-sm align text-uppercase" id="numero"
                                    name="numero" maxlenght="100">
                            </div>
                        </div>
                        <!-- COMPLEMENTO -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>COMPLEMENTO</label>
                                <input type="text" class="form-control input-sm align text-uppercase" id="complemento"
                                    name="complemento" maxlenght="100">
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
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>TELEFONE</label>
                                <input type="text" class="form-control input-sm align telefone text-uppercase"
                                    placeholder="(##) ####-####" id="telefone" name="telefone" maxlenght="100">
                            </div>
                        </div>
                        <!-- CELULAR -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>CELULAR</label>
                                <input type="text" class="form-control input-sm align celular text-uppercase"
                                    placeholder="(##) # ####-####" id="celular" name="celular" maxlenght="100">
                            </div>
                        </div>
                        <!-- TELEFONE ALTERNATIVO -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>TELEFONE ALTERNATIVO</label>
                                <input type="text" class="form-control input-sm align telefone2 text-uppercase"
                                    placeholder="(##) ####-####" id="telefone2" name="telefone2" maxlenght="100">
                            </div>
                        </div>
                        <!-- CELULAR ALTERNATIVO -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>CELULAR ALTERNATIVO</label>
                                <input type="text" class="form-control input-sm align celular2 text-uppercase"
                                    placeholder="(##) # ####-####" id="celular2" name="celular2" maxlenght="100">
                            </div>
                        </div>
                        <!-- BOTÕES -->
                        <div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
                            <div class="btnRight">
                                <span class="btn btn-primary btn-lg" id="btnCadastrar"
                                    title="CADASTRAR">CADASTRAR</span>
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
    $(".telefone2").mask("(99) 9999-9999");
    $(".celular").mask("(99) 9 9999-9999");
    $(".celular2").mask("(99) 9 9999-9999");

    $(".cep").change(function() {
        let cep = $("#cep").val();
        let urlPesquisaCep = "https://viacep.com.br/ws/" + cep + "/json";

        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: urlPesquisaCep,
            success: function(r) {
                $("#bairro").val(r.bairro);
                $("#endereco").val(r.logradouro);
                $("#complemento").val(r.complemento);
                $("#uf").val(r.uf);
            },
            error: function() {
                alertify.error("CEP INVÁLIDO");
                $("#cep").val("");
                return false;
            }
        });
    });

    validarForm("frmClientes");
    camposObrigatorios(["nome", "celular"], true);
});

$("#btnCadastrar").click(function() {
    let cpf = $("#cpf").val();
    let cnpj = $("#cnpj").val();
    let celular = $("#celular").val();

    let validator = $("#frmClientes").validate();
    validator.form();
    let checkValidator = validator.checkForm();

    if (checkValidator == false) {
        alertify.error("VERIFIQUE OS CAMPOS OBRIGATORIOS");
        return false;
    }

    dados = $("#frmClientes").serialize();
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
                dados = $("#frmClientes").serialize();
                $.ajax({
                    type: "POST",
                    data: dados,
                    url: "./Procedimentos/Clientes/CadastrarClientes.php",
                    success: function(r) {
                        if (r == 1) {
                            $("#frmClientes")[0].reset();
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
</script>
<?php
} else {
	header("location:./index.php");
}
?>