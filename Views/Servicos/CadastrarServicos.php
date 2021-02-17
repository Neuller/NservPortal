<?php
session_start();
if (isset($_SESSION['User'])) {
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
					<h3><strong>CADASTRAR SERVIÇOS</strong></h3>
				</div>
			</div>
			<!-- FORMULÁRIO -->
			<div class="divFormulario">
				<div class="mx-auto">
                    <form id="frmNovoServico">
                        <div>
                            <!-- FORMULÁRIO DADOS DO CLIENTE -->
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                <div class="text-left">
                                    <h4><strong>DADOS DO CLIENTE </strong><span class="glyphicon glyphicon-user ml-15"></span></h4>
                                </div>
                                <hr>
                            </div>
                            <!-- CLIENTE -->
                            <div class="col-md-8 col-sm-8 col-xs-8 itensFormulario">
                                <div>
                                    <label>CLIENTE<span class="required">*</span></label>
                                    <select class="form-control input-sm" id="clienteSelect" name="clienteSelect">
                                        <option value="0">SELECIONE UM CLIENTE</option>
                                        <!-- PHP -->
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
                            <div class='col-md-12 col-sm-12 col-xs-12 separador'>
                                <div class="text-left">
                                    <h4><strong>INFORMAÇÕES DO EQUIPAMENTO E SERVIÇO </strong><span class="glyphicon glyphicon-wrench ml-15"></span></h4>
                                </div>
                                <hr>
                            </div>
                            <!-- EQUIPAMENTO -->
                            <div class="col-md-8 col-sm-8 col-xs-8 itensFormulario">
                                <div>
                                    <label>EQUIPAMENTO / MARCA / MODELO<span class="required">*</span></label>
                                    <input type="text" class="form-control input-sm text-uppercase" id="equipamento" name="equipamento" maxlength="1000">
                                </div>
                            </div>
                            <!-- NÚMERO DE SÉRIE -->
                            <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
                                <div>
                                    <label>NÚMERO DE SÉRIE<span class="required">*</span></label>
                                    <input type="text" class="form-control input-sm text-uppercase" id="serialNumber" name="serialNumber" maxlength="500">
                                </div>
                            </div>
                            <!-- STATUS -->
                            <div class="col-md-8 col-sm-8 col-xs-8 itensFormulario">
                                <div>
                                    <label>STATUS DO SERVIÇO<span class="required">*</span></label>
                                    <select class="form-control input-sm" id="StatusSelect" name="StatusSelect">
                                        <option value="">SELECIONE UM STATUS</option>
                                        <option value="ENTRADA">ENTRADA</option>
                                        <option value="ORCAMENTO">ORÇAMENTO</option>
                                        <option value="RETORNO">RETORNO</option>
                                    </select>
                                </div>
                            </div>
                            <!-- NÚMERO DE SÉRIE -->
                            <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
                                <div>
                                    <label>ORDEM DE SERVIÇO</label>
                                    <input type="text" readonly class="form-control input-sm text-uppercase" id="ordem" name="ordem">
                                </div>
                            </div>
                            <!-- OBSERVAÇÕES -->
                            <div class='col-md-12 col-sm-12 col-xs-12 separador'>
                                <div class="text-left">
                                    <h4><strong>OBSERVAÇÕES </strong> <span class="glyphicon glyphicon-exclamation-sign ml-15"></span></h4>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
                                <div>
                                    <label>OBSERVAÇÕES</label>
                                    <textarea type="text" class="form-control input-sm text-uppercase" id="observacao" name="observacao" maxlength="1000" 
                                    rows="3" style="resize: none" placeholder="COM FONTE DE ALIMENTAÇÃO, PERIFÉRICOS DEIXADOS PELO CLIENTE, ETC..."></textarea>
                                </div>
                            </div>
                            <!-- BOTÕES -->
							<div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
								<div class="btnRight">
                                    <span class="btn btn-primary" id="btnCadastrar" title="CADASTRAR">CADASTRAR</span>
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
        $('#clienteSelect').select2();
        gerarNovaOrdem();
    });

    $('#btnCadastrar').click(function() {
        var nomeCliente = $("#clienteSelect").val();
        var status = $("#StatusSelect").val();
        var equipamento = $("#equipamento").val();
        var serialnumber = $("#serialnumber").val();

        if ((nomeCliente == "") || (status == "") || (equipamento == "") || (serialnumber == "")) {
            alertify.error("PREENCHA TODOS OS CAMPOS OBRIGATÓRIOS");
            return false;
        }

        dados = $('#frmNovoServico').serialize();

        $.ajax({
            type: "POST",
            data: dados,
            url: "./Procedimentos/Servicos/CadastrarServicos.php",
            success: function(r) {
                if (r > 1) {
                    $('#frmNovoServico')[0].reset();
                    $("#clienteSelect").val("0").change();
                    alertify.success("CADASTRO REALIZADO");
                    // IMPRIMIR COMPROVANTE?
                    alertify.confirm('ATENÇÃO', 'DESEJA IMPRIMIR ORDEM DE SERVIÇO?', function(){
                        const id = r;
                        alertify.confirm().close();
                        window.open("./Procedimentos/Servicos/OrdemServico.php?idServ=" + id);
                        $('#conteudo').load("./Views/Servicos/CadastrarServicos.php");
                    }, function(){
                    });
                } else {
                    alertify.error("NÃO FOI POSSÍVEL CADASTRAR");
                }
            }
        });
    });

    function gerarNovaOrdem(){
        $.ajax({
            url: "./Procedimentos/Servicos/GerarNovaOrdem.php",
            success: function(r) {
                debugger;
                if (r >= 1) {
                    $("#ordem").val(r);
                    debugger;
                } else {
                }
            }
        });
    }
</script>
<?php
} else {
    header("location:./index.php");
}
?>