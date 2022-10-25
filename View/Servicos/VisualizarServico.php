<?php
	session_start();
	if (isset($_SESSION["User"])) {
?>
<!DOCTYPE html>
<html>

<head>
    <?php require_once "../../Model/Conexao.php";
		$c = new conectar();
		$conexao = $c -> conexao();
		$idServico = $_GET["id"];
		?>
</head>

<body>
    <div class="container">
        <!-- CABEÇALHO -->
        <div class="cabecalho bgGray">
            <div class="text-center textCabecalho opacidade">
                <h3><strong>ORDEM DE SERVIÇO</strong></h3>
            </div>
        </div>

        <!-- FORMULÁRIO -->
        <div class="divFormulario">
            <div class="mx-auto">
                <form id="frmAtualizarServico">
                    <div>
                        <!-- ID -->
                        <div>
                            <input type="text" hidden="" id="idServico" name="idServico">
                        </div>
                        <!-- DIAGNÓSTICO -->
                        <div class="col-md-12 col-sm-12 col-xs-12 separador itensFormulario">
                            <div>
                                <h4><strong>DIAGNÓSTICO TÉCNICO</strong></h4>
                                <hr>
                                <textarea type="text" class="form-control text-uppercase input-sm" id="diagnosticoU"
                                    name="diagnosticoU" maxlength="1000" rows="3" style="resize: none"></textarea>
                            </div>
                        </div>
                        <!-- TÉCNICO -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario" id="divTecnico">
                            <div id="divTecnico2">
                                <label>TÉCNICO</label>
                                <select class="form-control input-sm" id="tecnicoU" name="tecnicoU">
                                    <option value="">SELECIONE UM TECNICO</option>
                                    <?php
										$sql = "SELECT id_tecnico, nome 
								    	FROM tecnicos";
										$result = mysqli_query($conexao, $sql);
										?>
                                    <?php while ($mostrar = mysqli_fetch_row($result)) : ?>
                                    <option value="<?php echo $mostrar[0]; ?>"><?php echo $mostrar[1]; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <!-- INFORMACOES DO EQUIPAMENTO E SERVICO -->
                        <div class="col-md-12 col-sm-12 col-xs-12 separador">
                            <div class="text-left">
                                <h4><strong>INFORMAÇÕES DO EQUIPAMENTO E SERVIÇO</strong></h4>
                            </div>
                            <hr>
                        </div>
                        <!-- ORDEM DE SERVIÇO -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>ORDEM DE SERVIÇO</label>
                                <input type="number" readonly class="form-control text-uppercase input-sm"
                                    id="ordemServicoU" name="ordemServicoU">
                            </div>
                        </div>
                        <!-- STATUS -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>STATUS DO SERVIÇO</label>
                                <select class="form-control input-sm" id="selectStatusU" name="selectStatusU">
                                    <option value="">SELECIONE UM STATUS</option>
                                    <option value="AGUARDANDO AUTORIZACAO DO CLIENTE">AGUARDANDO AUTORIZACAO DO CLIENTE
                                    </option>
                                    <option value="A RECEBER">A RECEBER</option>
                                    <option value="AUTORIZADO">AUTORIZADO</option>
                                    <option value="DISPONIVEL PARA ENTREGA">DISPONIVEL PARA ENTREGA</option>
                                    <option value="ENTREGA REALIZADA">ENTREGA REALIZADA</option>
                                    <option value="ENVIADO PARA TERCEIRO">ENVIADO PARA TERCEIRO</option>
                                    <option value="NA BANCADA">NA BANCADA</option>
                                    <option value="ORCAMENTO">ORÇAMENTO</option>
                                    <option value="RETORNO">RETORNO</option>
                                    <option value="SERVICO RECUSADO">SERVICO RECUSADO</option>
                                </select>
                            </div>
                        </div>
                        <!-- SERVIÇO EXECUTADO -->
                        <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
                            <div>
                                <label>SERVIÇO(s) EXECUTADO(s)</label>
                                <textarea type="text" class="form-control text-uppercase input-sm" id="servicoU"
                                    name="servicoU" maxlength="1000" rows="3" style="resize: none"></textarea>
                            </div>
                        </div>
                        <!-- VALOR DE TERCEIRO -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>VALOR DE TERCEIRO</label>
                                <input type="text" class="form-control text-uppercase valorTerceiro input-sm"
                                    id="valorTerceiroU" name="valorTerceiroU" maxlength="10">
                            </div>
                        </div>
                        <!-- VALOR TOTAL -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>VALOR TOTAL</label>
                                <input type="text" class="form-control text-uppercase valorTotal input-sm" id="precoU"
                                    name="precoU" maxlength="10">
                            </div>
                        </div>
                        <!-- GARANTIA -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>GARANTIA</label>
                                <select class="form-control text-uppercase input-sm" id="garantiaU" name="garantiaU"
                                    maxlength="100">
                                    <option value="">SELECIONE UMA GARANTIA</option>
                                    <option value="FUNCIONAL">FUNCIONAL</option>
                                    <option value="30 DIAS">30 DIAS</option>
                                    <option value="90 DIAS">90 DIAS</option>
                                    <option value="06 MESES">06 MESES</option>
                                    <option value="12 MESES">12 MESES</option>
                                </select>
                            </div>
                        </div>
                        <!-- DATA DE ENTREGA -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>DATA DE ENTREGA</label>
                                <input type="date" class="form-control text-uppercase input-sm" id="dataSaidaU"
                                    name="dataSaidaU">
                            </div>
                        </div>
                        <!-- NF-E EMITIDA? -->
                        <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
                            <div>
                                <label>NF-E EMITIDA?</label>
                            </div>
                            <div>
                                <input type="radio" id="nfeEmitidaU" name="nfeEmitidaU" value="NAO" checked>
                                <label class="btnRadio">NÃO</label>
                                <input type="radio" id="nfeEmitidaU" name="nfeEmitidaU" value="SIM">
                                <label class="btnRadio">SIM</label>
                            </div>
                        </div>
                        <!-- OBSERVAÇÕES -->
                        <div class="col-md-12 col-sm-12 col-xs-12 separador">
                            <div class="text-left">
                                <h4><strong>OBSERVAÇÕES </strong> <span
                                        class="glyphicon glyphicon-exclamation-sign ml-15"></span></h4>
                            </div>
                            <hr>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
                            <div>
                                <textarea type="text" class="form-control input-sm text-uppercase" id="informacaoU"
                                    name="informacaoU" maxlength="100" rows="3" style="resize: none"></textarea>
                            </div>
                        </div>
                        <!-- BOTÕES -->
                        <div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
                            <div class="btnRight">
                                <span class="btn btn-danger btn-lg" id="btnCancelar" title="CANCELAR">CANCELAR</span>
                                <span class="btn btn-warning btn-lg" id="btnSalvar" title="SALVAR">SALVAR</span>
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
    idServico = "<?php echo @$idServico ?>";
    obterDadosServico(idServico);
    $(document).keyup(function(e) {
        var str = e.keyCode;
        if (str == 27) {
            cancelar();
        }
    });
    validarForm("frmAtualizarServico");
    camposObrigatorios(["selectStatusU"], true);
});

$("#btnSalvar").click(function() {
    var validator = $("#frmAtualizarServico").validate();
    validator.form();
    var checkValidator = validator.checkForm();
    let idServico = getValor("idServico");

    if (checkValidator == false) {
        alertify.error("VERIFIQUE OS CAMPOS OBRIGATORIOS");
        return false;
    }

    dados = $("#frmAtualizarServico").serialize();

    $.ajax({
        type: "POST",
        data: dados,
        url: "./Controller/Servicos/EditarServicos.php",
        success: function(r) {
            if (r == 1) {
                $("#tabelaServicosEntrada").load("./View/Servicos/TabelaServicos.php");
                $("#tabelaUltimosServicos").load("./View/Inicio/tabelaUltimosServicos.php");
                alertify.success("SUCESSO");
                // IMPRIMIR COMPROVANTE?
                alertify.confirm("ATENÇÃO", "DESEJA IMPRIMIR ORDEM DE SERVIÇO?", function() {
                    alertify.confirm().close();
                    window.open("./Controller/Servicos/OrdemServico.php?idServ=" +
                        idServico);
                }, function() {}).set({
                    labels: {
                        ok: "SIM",
                        cancel: "NÃO"
                    }
                });
                $("#conteudo").load("./View/Servicos/ProcurarServicos.php");
            } else {
                alertify.error("ERRO");
            }
        }
    });
});
$("#btnCancelar").click(function() {
    cancelar();
});

function obterDadosServico(id) {
    $.ajax({
        type: "POST",
        data: "idServico=" + id,
        url: "./Controller/Servicos/ObterDadosServicos.php",
        success: function(r) {
            dado = jQuery.parseJSON(r);
            $("#idServico").val(dado["id_servico"]);
            $("#selectStatusU").val(dado["status"]);
            $("#informacaoU").val(dado["observacao"]);
            $("#ordemServicoU").val(dado["ordem_servico"]);
            $("#servicoU").val(dado["servico_realizado"]);
            // VERIFICA TÉCNICO
            var identificadorTecnico = dado["id_tecnico"];
            if ((identificadorTecnico === "0") || (identificadorTecnico === "") || (identificadorTecnico ===
                    null)) {
                $("#tecnicoU").val("");
            } else {
                $("#tecnicoU").val(identificadorTecnico);
            }
            $("#garantiaU").val(dado["garantia"]);
            $("#precoU").val(dado["valor_total"]);
            $("#valorTerceiroU").val(dado["valor_terceiro"]);
            $("#dataSaidaU").val(dado["data_saida"]);
            $("#diagnosticoU").val(dado["diagnostico"]);
            // VERIFICAR NF-E
            var $radios = $("input:radio[name = nfeEmitidaU]");
            if (dado["nf_emitida"] === "NAO") {
                $radios.filter("[value = NAO]").prop("checked", true);
            } else if (dado["nf_emitida"] === "SIM") {
                $radios.filter("[value = SIM]").prop("checked", true);
            } else {
                $radios.filter("[value = NAO]").prop("checked", true);
            }
        }
    });
}

function cancelar() {
    alertify.confirm("ATENÇÃO", "DESEJA CANCELAR?", function() {
        alertify.confirm().close();
        $("#frmAtualizarServico")[0].reset();
        $("#conteudo").load("./View/Servicos/ProcurarServicos.php");
    }, function() {}).set({
        labels: {
            ok: "SIM",
            cancel: "NÃO"
        }
    });
}
</script>
<?php
	} else {
		header("location: ./index.php");
	}
?>