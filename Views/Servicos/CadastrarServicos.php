<?php
session_start();
if (isset($_SESSION["User"])) {
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
                    <h3><strong>CADASTRAR SERVIÇOS</strong></h3>
                </div>
            </div>
            <!-- FORMULÁRIO -->
            <div class="divFormulario">
                <div class="mx-auto">
                    <form id="frmNovoServico" name="frmNovoServico" data-toggle="validator" role="form">
                        <div>
                            <!-- FORMULÁRIO DADOS DO CLIENTE -->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="text-left">
                                    <h4><strong>DADOS DO CLIENTE </strong><span class="glyphicon glyphicon-user ml-15"></span></h4>
                                </div>
                                <hr>
                            </div>
                            <!-- CLIENTE -->
                            <div class="col-md-8 col-sm-8 col-xs-8 itensFormulario">
                                <div>
                                    <label>CLIENTE</label>
                                    <select class="form-control input-sm" id="clienteSelect" name="clienteSelect">
                                        <option value="">SELECIONE UM CLIENTE</option>
                                        <?php
                                        $sql = "SELECT id_cliente, nome, celular FROM clientes ORDER BY id_cliente DESC";
                                        $result = mysqli_query($conexao, $sql);

                                        while ($cliente = mysqli_fetch_row($result)) :
                                        ?>
                                            <option value="<?php echo $cliente[0] ?>"><?php echo $cliente[1] ?> - <?php echo $cliente[2] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <!-- FORMULÁRIO INFORMAÇÕES DO EQUIPAMENTO / SERVIÇO -->
                            <div class="col-md-12 col-sm-12 col-xs-12 separador">
                                <div class="text-left">
                                    <h4><strong>INFORMAÇÕES DO EQUIPAMENTO E SERVIÇO </strong><span class="glyphicon glyphicon-wrench ml-15"></span></h4>
                                </div>
                                <hr>
                            </div>
                            <!-- TIPO DO EQUIPAMENTO -->
                            <div class="col-md-8 col-sm-8 col-xs-8 itensFormulario">
                                <div>
                                    <label>TIPO DO EQUIPAMENTO</label>
                                    <select class="form-control input-sm" id="tipoEquipamento" name="tipoEquipamento">
                                        <option value="">SELECIONE UM TIPO</option>
                                        <option value="DESKTOP">DESKTOP</option>
                                        <option value="NETBOOK">NETBOOK</option>
                                        <option value="NOTEBOOK">NOTEBOOK</option>
                                        <option value="MONITOR">MONITOR</option>
                                        <option value="IMPRESSORA">IMPRESSORA</option>
                                        <option value="OUTROS">OUTROS</option>
                                    </select>
                                </div>
                            </div>
                            <!-- ORDEM DE SERVIÇO -->
                            <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
                                <div>
                                    <label>ORDEM DE SERVIÇO</label>
                                    <input type="text" readonly class="form-control input-sm text-uppercase" id="ordem" name="ordem">
                                </div>
                            </div>
                            <!-- EQUIPAMENTO -->
                            <div class="col-md-8 col-sm-8 col-xs-8 itensFormulario" id="groupEquipamento">
                                <div>
                                    <label>EQUIPAMENTO / MARCA / MODELO</label>
                                    <input type="text" class="form-control input-sm text-uppercase" id="equipamento" name="equipamento" maxlength="1000">
                                </div>
                            </div>
                            <!-- NÚMERO DE SÉRIE -->
                            <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario" id="groupSerialNumber">
                                <div>
                                    <label>NÚMERO DE SÉRIE</label>
                                    <input type="text" class="form-control input-sm text-uppercase" id="serialNumber" name="serialNumber" maxlength="500">
                                </div>
                            </div>
                            <!-- CHECKBOX OBSERVACOES -->
                            <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario" class="groupCheckObservacoes" id="groupCheckObservacoes">
                                <label>ITENS DEIXADOS PELO CLIENTE</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="chkFonte" name="chkFonte" value="SIM">
                                        <label class="form-check-label" for="chkFonte">FONTE DE ALIMENTAÇÃO</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="chkPerifericos" name="chkPerifericos" value="SIM">
                                        <label class="form-check-label" for="chkPerifericos">PERIFÉRICOS</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="chkCabos" name="chkCabos" value="SIM">
                                        <label class="form-check-label" for="chkCabos">CABOS</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="chkOutros" name="chkOutros" value="SIM">
                                        <label class="form-check-label" for="chkOutros">OUTROS</label>
                                    </div>
                                </div>
                            </div>
                            <!-- STATUS -->
                            <div class="col-md-8 col-sm-8 col-xs-8 itensFormulario">
                                <div>
                                    <label>STATUS DO SERVIÇO</label>
                                    <select class="form-control input-sm" id="StatusSelect" name="StatusSelect">
                                        <option value="">SELECIONE UM STATUS</option>
                                        <option value="AUTORIZADO">AUTORIZADO</option>
                                        <option value="ORCAMENTO">ORÇAMENTO</option>
                                        <option value="RETORNO">RETORNO</option>
                                    </select>
                                </div>
                            </div>
                            <!-- TAXA DE SERVICO AUTORIZADO -->
                            <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario" id="grouptaxaServicoAutorizado">
                                <div>
                                    <label>TAXA DE SERVICO AUTORIZADO</label>
                                    <input type="number" class="form-control input-sm text-uppercase" id="taxaServicoAutorizado" name="taxaServicoAutorizado">
                                </div>
                            </div>
                            <!-- TAXA DE ORÇAMENTO RECUSADO -->
                            <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario" id="grouptaxaOrcamentoRecusado">
                                <div>
                                    <label>TAXA DE ORÇAMENTO RECUSADO</label>
                                    <input type="text" readonly class="form-control input-sm text-uppercase" id="taxaOrcamentoRecusado" name="taxaOrcamentoRecusado">
                                </div>
                            </div>
                            <!-- MENSAGEM AVISO ORÇAMENTO RECUSADO -->
                            <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario avisoOrcamentoRecusado" id="avisoOrcamentoRecusado">
                                <div>
                                    <span>SERÁ COBRADO UMA TAXA NO VALOR DE R$ 25,00 CASO O ORÇAMENTO SEJA RECUSADO PELO CLIENTE!</span>
                                </div>
                            </div>
                            <!-- OBSERVAÇÕES -->
                            <div class="col-md-12 col-sm-12 col-xs-12 separador">
                                <div class="text-left">
                                    <h4><strong>OBSERVAÇÕES </strong> <span class="glyphicon glyphicon-exclamation-sign ml-15"></span></h4>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
                                <div>
                                    <textarea type="text" class="form-control input-sm text-uppercase" id="observacao" name="observacao" maxlength="1000" rows="3" style="resize: none"></textarea>
                                </div>
                            </div>
                            <!-- BOTÕES -->
                            <div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
                                <div class="btnRight">
                                    <span class="btn btn-primary" id="btnCadastrar" title="CADASTRAR" type="submit">CADASTRAR</span>
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
            $("#clienteSelect").select2();
            ocultarCampos();
            gerarNovaOrdem();
            validarForm("frmNovoServico");
            camposObrigatorios(["clienteSelect", "tipoEquipamento", "StatusSelect"], true);
        }

        function setEvents() {
            $("#btnCadastrar").click(function() {
                var validator = $("#frmNovoServico").validate();
                validator.form();
                var checkValidator = validator.checkForm();

                if (checkValidator == false) {
                    alertify.error("PREENCHA TODOS OS CAMPOS OBRIGATÓRIOS");
                    return false;
                }

                dados = $("#frmNovoServico").serialize();

                $.ajax({
                    type: "POST",
                    data: dados,
                    url: "./Procedimentos/Servicos/CadastrarServicos.php",
                    success: function(r) {
                        if (r > 0) {
                            $("#frmNovoServico")[0].reset();
                            $("#clienteSelect").val("").change();
                            ocultarCampos();
                            alertify.success("CADASTRO REALIZADO");
                            // IMPRIMIR COMPROVANTE?
                            alertify.confirm("ATENÇÃO", "DESEJA IMPRIMIR ORDEM DE SERVIÇO?", function() {
                                const id = r;
                                console.log(id);
                                alertify.confirm().close();
                                window.open("./Procedimentos/Servicos/OrdemServico/CriarOrdemServicoEntrada.php?idServ=" + id);
                                $("#conteudo").load("./Views/Servicos/CadastrarServicos.php");
                            }, function() {});
                        } else {
                            alertify.error("NÃO FOI POSSÍVEL CADASTRAR");
                        }
                    }
                });
            });

            $("#tipoEquipamento").change(function() {
                var tipo = $("#tipoEquipamento").val();
                bloquearCampos(["equipamento", "serialNumber"], false);
                limparCampos(["equipamento", "serialNumber"]);
                esconderCampos(["groupEquipamento", "groupSerialNumber", "groupCheckObservacoes"]);

                if (tipo == "DESKTOP") {
                    $("#equipamento").val("DESKTOP");
                    $("#serialNumber").val("DESKTOP");
                    bloquearCampos(["equipamento", "serialNumber"], true);
                    mostrarCampos(["groupEquipamento", "groupSerialNumber"]);
                    camposObrigatorios(["equipamento", "serialNumber"], false);
                    var validator = $("#frmNovoServico").validate();
                    validator.resetForm();
                } else if (tipo != "DESKTOP" && tipo != "") {
                    mostrarCampos(["groupEquipamento", "groupSerialNumber", "groupCheckObservacoes"]);
                    camposObrigatorios(["equipamento", "serialNumber"], true);
                } else {
                    esconderCampos(["groupEquipamento", "groupSerialNumber"]);
                    camposObrigatorios(["equipamento", "serialNumber"], false);
                }
            });

            $("#StatusSelect").change(function() {
                esconderCampos(["grouptaxaOrcamentoRecusado", "avisoOrcamentoRecusado", "grouptaxaServicoAutorizado"]);
                limparCampos(["taxaOrcamentoRecusado"]);
                var status = $("#StatusSelect").val();

                if (status == "ORCAMENTO") {
                    mostrarCampos(["grouptaxaOrcamentoRecusado", "avisoOrcamentoRecusado"]);
                    $("#taxaOrcamentoRecusado").val("R$ 25,00");
                } else if (status == "AUTORIZADO") {
                    mostrarCampos(["grouptaxaServicoAutorizado"]);
                } else {
                    esconderCampos(["grouptaxaOrcamentoRecusado", "avisoOrcamentoRecusado", "grouptaxaServicoAutorizado"]);
                    limparCampos(["taxaOrcamentoRecusado"]);
                }
            });

            $("#chkFonte").click(function() {});

            $("#chkPerifericos").click(function() {
                setObservacoes();
            });

            $("#chkCabos").click(function() {
                setObservacoes();
            });

            $("#chkOutros").click(function() {
                setObservacoes();
            });

        }

        function gerarNovaOrdem() {
            $.ajax({
                url: "./Procedimentos/Servicos/GerarNovaOrdem.php",
                success: function(r) {
                    if (r >= 1) {
                        $("#ordem").val(r);
                    }
                }
            });
        }

        function ocultarCampos() {
            esconderCampos(["groupEquipamento", "groupSerialNumber", "grouptaxaOrcamentoRecusado", "avisoOrcamentoRecusado", "grouptaxaServicoAutorizado", "groupCheckObservacoes"]);
        }

        function setObservacoes() {
            var checkPerifericos = $("#chkPerifericos").is(":checked");
            var checkCabos = $("#chkCabos").is(":checked");
            var checkOutros = $("#chkOutros").is(":checked");

            if (checkPerifericos || checkCabos || checkOutros) {
                camposObrigatorios(["observacao"], true);
            } else {
                camposObrigatorios(["observacao"], false);
            }
        }
    </script>

<?php
} else {
    header("location:./index.php");
}
?>