<?php
session_start();
if (isset($_SESSION['User'])) {
?>
<!DOCTYPE html>
<html>
	<head>
		<?php require_once "../../Model/Conexao.php"; 
		$c = new conectar();
		$conexao = $c -> conexao();
		?>
    </head>
	<body>
		<div class="container">
			<div class="cabecalho bgGray">
				<div class="text-center textCabecalho opacidade">
					<h3><strong>ABRIR CAIXA</strong></h3>
				</div>
			</div>
			<!-- FORMULÁRIO CONTABILIZAR NOTAS -->
			<div class="divFormulario">
				<div class="mx-auto">
					<form id="frmContabilizarNotas">   
                        <div class='col-md-12 col-sm-12 col-xs-12'>
							<div class="text-left">
								<h4><strong>ETAPA 1 - CONTABILIZAR NOTAS</strong></h4>
							</div>
							<hr>
                            <div class="text-left itensFormulario">
								<ul>
                                    <li>INFORME A QUANTIDADE DE NOTAS</li>
                                </ul>
							</div>
						</div>
                        <!-- NOTA DE DOIS REAIS -->
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <article>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <img src="./Img/Financeiro/Notas/nota2.png" class="img-thumbnail" width="200px" height="150px">
                                    </section>
                                </div>
                                <div class="text-center textCabecalho opacidade">
                                    <span>DOIS REAIS</span>
                                </div>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <div class="text-center">
                                        <input type="number" class="form-control input-sm text-uppercase" id="nota2" name="nota2" maxlenght="10">
                                        </div>
                                    </section>
                                </div>
                            </article>
                        </div>
                        <!-- NOTA DE CINCO REAIS -->
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <article>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <img src="./Img/Financeiro/Notas/nota5.png" class="img-thumbnail" width="200px" height="150px">
                                    </section>
                                </div>
                                <div class="text-center textCabecalho opacidade">
                                    <span>CINCO REAIS</span>
                                </div>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <div class="text-center">
                                            <input type="number" class="form-control input-sm text-uppercase" id="nota5" name="nota5" maxlenght="10">
                                        </div>
                                    </section>
                                </div>
                            </article>
                        </div>
                        <!-- NOTA DE DEZ REAIS -->
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <article>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <img src="./Img/Financeiro/Notas/nota10.png" class="img-thumbnail" width="200px" height="150px">
                                    </section>
                                </div>
                                <div class="text-center textCabecalho opacidade">
                                    <span>DEZ REAIS</span>
                                </div>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <div class="text-center">
                                            <input type="number" class="form-control input-sm text-uppercase" id="nota10" name="nota10" maxlenght="10">
                                        </div>
                                    </section>
                                </div>
                            </article>
                        </div>
                        <!-- NOTA DE VINTE REAIS -->
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <article>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <img src="./Img/Financeiro/Notas/nota20.png" class="img-thumbnail" width="200px" height="150px">
                                    </section>
                                </div>
                                <div class="text-center textCabecalho opacidade">
                                    <span>VINTE REAIS</span>
                                </div>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <div class="text-center">
                                            <input type="number" class="form-control input-sm text-uppercase" id="nota20" name="nota20" maxlenght="10">
                                        </div>
                                    </section>
                                </div>
                            </article>
                        </div>
                        <!-- NOTA DE CINQUENTA REAIS -->
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <article>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <img src="./Img/Financeiro/Notas/nota50.png" class="img-thumbnail" width="200px" height="150px">
                                    </section>
                                </div>
                                <div class="text-center textCabecalho opacidade">
                                    <span>CINQUENTA REAIS</span>
                                </div>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <div class="text-center">
                                            <input type="number" class="form-control input-sm text-uppercase" id="nota50" name="nota50" maxlenght="10">
                                        </div>
                                    </section>
                                </div>
                            </article>
                        </div>
                        <!-- NOTA DE CEM REAIS -->
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <article>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <img src="./Img/Financeiro/Notas/nota100.png" class="img-thumbnail" width="200px" height="150px">
                                    </section>
                                </div>
                                <div class="text-center textCabecalho opacidade">
                                    <span>CEM REAIS</span>
                                </div>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <div class="text-center">
                                            <input type="number" class="form-control input-sm text-uppercase" id="nota100" name="nota100" maxlenght="10">
                                        </div>
                                    </section>
                                </div>
                            </article>
                        </div>
                        <!-- NOTA DE DUZENTOS REAIS -->
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <article>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <img src="./Img/Financeiro/Notas/nota200.png" class="img-thumbnail" width="200px" height="150px">
                                    </section>
                                </div>
                                <div class="text-center textCabecalho opacidade">
                                    <span>DUZENTOS REAIS</span>
                                </div>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <div class="text-center">
                                            <input type="number" class="form-control input-sm text-uppercase" id="nota200" name="nota200" maxlenght="10">
                                        </div>
                                    </section>
                                </div>
                            </article>
                        </div>
                        <!-- QUANTIDADE DE NOTAS -->
                        <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
                            <div>
                                <label class="col-md-12 col-sm-12 col-xs-12">QUANTIDADE DE NOTAS</label>
                                <input type="text" readonly class="col-md-4 col-sm-4 col-xs-4 form-control input-sm align text-uppercase" id="qtdNotas" name="qtdNotas">
                            </div>
                        </div>
                        <!-- VALOR TOTAL -->
                        <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
                            <div>
                                <label class="col-md-12 col-sm-12 col-xs-12">TOTAL</label>
                                <input type="text" readonly class="col-md-4 col-sm-4 col-xs-4 form-control input-sm align text-uppercase" id="valorTotalNotas" name="valorTotalNotas">
                            </div>
                        </div>
                        <!-- BOTÕES -->
                        <div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
                            <div class="btnRight">
                                <span class="btn btn-success btn-lg" id="btnAvancar1" title="AVANÇAR">AVANÇAR</span>
                            </div>
                        </div>
					</form>

                    <!-- FORMULÁRIO CONTABILIZAR MOEDAS -->
                    <form id="frmContabilizarMoedas">   
                        <div class='col-md-12 col-sm-12 col-xs-12'>
							<div class="text-left">
								<h4><strong>ETAPA 2 - CONTABILIZAR MOEDAS</strong></h4>
							</div>
                            <hr>
                            <div class="text-left itensFormulario">
								<ul>
                                    <li>INFORME A QUANTIDADE DE MOEDAS</li>
                                </ul>
							</div>
						</div>
						<!-- MOEDA DE CINCO CENTAVOS -->
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <article>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <img src="./Img/Financeiro/Moedas/moeda5.png" class="img-thumbnail" width="200px" height="150px">
                                    </section>
                                </div>
                                <div class="text-center textCabecalho opacidade">
                                    <span>CINCO CENTAVOS</span>
                                </div>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <div class="text-center">
                                        <input type="number" class="form-control input-sm text-uppercase" id="moeda5" name="moeda5" maxlenght="10">
                                        </div>
                                    </section>
                                </div>
                            </article>
                        </div>
						<!-- MOEDA DE DEZ CENTAVOS -->
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <article>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <img src="./Img/Financeiro/Moedas/moeda10.png" class="img-thumbnail" width="200px" height="150px">
                                    </section>
                                </div>
                                <div class="text-center textCabecalho opacidade">
                                    <span>DEZ CENTAVOS</span>
                                </div>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <div class="text-center">
                                        <input type="number" class="form-control input-sm text-uppercase" id="moeda10" name="moeda10" maxlenght="10">
                                        </div>
                                    </section>
                                </div>
                            </article>
                        </div>
						<!-- MOEDA DE VINTE E CINCO CENTAVOS -->
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <article>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <img src="./Img/Financeiro/Moedas/moeda25.png" class="img-thumbnail" width="200px" height="150px">
                                    </section>
                                </div>
                                <div class="text-center textCabecalho opacidade">
                                    <span>VINTE E CINCO CENTAVOS</span>
                                </div>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <div class="text-center">
                                        <input type="number" class="form-control input-sm text-uppercase" id="moeda25" name="moeda25" maxlenght="10">
                                        </div>
                                    </section>
                                </div>
                            </article>
                        </div>
						<!-- MOEDA DE CINQUENTA CENTAVOS -->
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <article>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <img src="./Img/Financeiro/Moedas/moeda50.png" class="img-thumbnail" width="200px" height="150px">
                                    </section>
                                </div>
                                <div class="text-center textCabecalho opacidade">
                                    <span>CINQUENTA CENTAVOS</span>
                                </div>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <div class="text-center">
                                        <input type="number" class="form-control input-sm text-uppercase" id="moeda50" name="moeda50" maxlenght="10">
                                        </div>
                                    </section>
                                </div>
                            </article>
                        </div>
						<!-- MOEDA DE UM REAL -->
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <article>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <img src="./Img/Financeiro/Moedas/moeda100.png" class="img-thumbnail" width="200px" height="150px">
                                    </section>
                                </div>
                                <div class="text-center textCabecalho opacidade">
                                    <span>UM REAL</span>
                                </div>
                                <div class="text-center itensFormulario">
                                    <section>
                                        <div class="text-center">
                                        <input type="number" class="form-control input-sm text-uppercase" id="moeda100" name="moeda100" maxlenght="10">
                                        </div>
                                    </section>
                                </div>
                            </article>
                        </div>
                        <!-- QUANTIDADE DE MOEDAS -->
                        <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
                            <div>
                                <label class="col-md-12 col-sm-12 col-xs-12">QUANTIDADE DE MOEDAS</label>
                                <input type="text" readonly class="col-md-4 col-sm-4 col-xs-4 form-control input-sm align text-uppercase" id="qtdMoedas" name="qtdMoedas">
                            </div>
                        </div>
                        <!-- VALOR TOTAL -->
                        <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
							<div>
								<label class="col-md-12 col-sm-12 col-xs-12">TOTAL</label>
								<input type="text" readonly class="col-md-4 col-sm-4 col-xs-4 form-control input-sm align text-uppercase" id="valorTotalMoedas" name="valorTotalMoedas">
							</div>
						</div>
                        <!-- BOTÕES -->
                        <div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
                            <div class="btnRight">
                                <span class="btn btn-success btn-lg" id="btnAvancar2" title="AVANÇAR">AVANÇAR</span>
                            </div>
                        </div>
					</form>

                    <!-- FORMULÁRIO CONFIRMAR DADOS -->
                    <form id="frmConfirmarDados">   
                        <div class='col-md-12 col-sm-12 col-xs-12'>
							<div class="text-left">
								<h4><strong>ETAPA 3 - CONFIRMAR DADOS</strong></h4>
							</div>
							<hr>
						</div>
                        <!-- QUANTIDADE DE NOTAS -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
							<div>
								<label>QUANTIDADE DE NOTAS</label>
								<input type="text" readonly class="form-control input-sm align text-uppercase" id="totalQtdNotas" name="totalQtdNotas">
							</div>
						</div>
                        <!-- VALOR TOTAL DE NOTAS -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
							<div>
								<label>TOTAL</label>
								<input type="text" readonly class="form-control input-sm align text-uppercase" id="totalNotas" name="totalNotas">
							</div>
						</div>
                        <!-- QUANTIDADE DE MOEDAS -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
							<div>
								<label>QUANTIDADE DE MOEDAS</label>
								<input type="text" readonly class="form-control input-sm align text-uppercase" id="totalQtdMoedas" name="totalQtdMoedas">
							</div>
						</div>
                        <!-- VALOR TOTAL DE MOEDAS -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
							<div>
								<label>TOTAL</label>
								<input type="text" readonly class="form-control input-sm align text-uppercase" id="totalMoedas" name="totalMoedas">
							</div>
						</div>
                        <!-- REFERÊNCIA -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
							<div>
								<label>REFERÊNCIA</label>
								<input type="text" readonly class="form-control input-sm align text-uppercase" id="data" name="data">
							</div>
						</div>
                        <!-- CAIXA INICIAL -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
							<div>
								<label>CAIXA INICIAL</label>
								<input type="text" readonly class="form-control input-sm align text-uppercase" id="caixaInicial" name="caixaInicial">
							</div>
						</div>
                        <!-- BOTÕES -->
                        <div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
                            <div class="btnRight">
                                <span class="btn btn-danger btn-lg" id="btnCancelar" title="CANCELAR">CANCELAR</span>
                                <span class="btn btn-success btn-lg" id="btnAbrirCaixa" title="ABRIR CAIXA">ABRIR CAIXA</span>
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
        $('#frmContabilizarMoedas').hide();
        $('#frmConfirmarDados').hide();
    });
    
    // ETAPA 1
    $('#nota2').change(function() {
        const valorTotal = calcularTotalNotas();
        $("#valorTotalNotas").val(valorTotal);
        const qtdNotas = calcularQtdNotas();
        $("#qtdNotas").val(qtdNotas);
    });
    $('#nota5').change(function() {
        const valorTotal = calcularTotalNotas();
        $("#valorTotalNotas").val(valorTotal);
        const qtdNotas = calcularQtdNotas();
        $("#qtdNotas").val(qtdNotas);
    });
    $('#nota10').change(function() {
        const valorTotal = calcularTotalNotas();
        $("#valorTotalNotas").val(valorTotal);
        const qtdNotas = calcularQtdNotas();
        $("#qtdNotas").val(qtdNotas);
    });
    $('#nota20').change(function() {
        const valorTotal = calcularTotalNotas();
        $("#valorTotalNotas").val(valorTotal);
        const qtdNotas = calcularQtdNotas();
        $("#qtdNotas").val(qtdNotas);
    });
    $('#nota50').change(function() {
        const valorTotal = calcularTotalNotas();
        $("#valorTotalNotas").val(valorTotal);
        const qtdNotas = calcularQtdNotas();
        $("#qtdNotas").val(qtdNotas);
    });
    $('#nota100').change(function() {
        const valorTotal = calcularTotalNotas();
        $("#valorTotalNotas").val(valorTotal);
        const qtdNotas = calcularQtdNotas();
        $("#qtdNotas").val(qtdNotas);
    });
    $('#nota200').change(function() {
        const valorTotal = calcularTotalNotas();
        $("#valorTotalNotas").val(valorTotal);
        const qtdNotas = calcularQtdNotas();
        $("#qtdNotas").val(qtdNotas);
    });
    function calcularTotalNotas() {
        const qtdNota2 = $("#nota2").val();
        const qtdNota5 = $("#nota5").val();
        const qtdNota10 = $("#nota10").val();
        const qtdNota20 = $("#nota20").val();
        const qtdNota50 = $("#nota50").val();
        const qtdNota100 = $("#nota100").val();
        const qtdNota200 = $("#nota200").val();

        var nota2 = qtdNota2 * 2;
        var nota5 = qtdNota5 * 5;
        var nota10 = qtdNota10 * 10;
        var nota20 = qtdNota20 * 20;
        var nota50 = qtdNota50 * 50;
        var nota100 = qtdNota100 * 100;
        var nota200 = qtdNota200 * 200;

        var valorTotal = nota2 + nota5 + nota10 + nota20 + nota50 + nota100 + nota200;
        return valorTotal;
    }
    function calcularQtdNotas() {
        const qtdNota2 = $("#nota2").val();
        const qtdNota5 = $("#nota5").val();
        const qtdNota10 = $("#nota10").val();
        const qtdNota20 = $("#nota20").val();
        const qtdNota50 = $("#nota50").val();
        const qtdNota100 = $("#nota100").val();
        const qtdNota200 = $("#nota200").val();

        var nota2 = qtdNota2 * 1;
        var nota5 = qtdNota5 * 1;
        var nota10 = qtdNota10 * 1;
        var nota20 = qtdNota20 * 1;
        var nota50 = qtdNota50 * 1;
        var nota100 = qtdNota100 * 1;
        var nota200 = qtdNota200 * 1;

        var qtdNotas = 0;
        qtdNotas = nota2 + nota5 + nota10 + nota20 + nota50 + nota100 + nota200;
        return parseInt(qtdNotas);
    }
    $('#btnAvancar1').click(function() {
        var dadosfrmContabilizarNotas = $('#frmContabilizarNotas').serialize();
        var valorTotalNotas = $("#valorTotalNotas").val();
        if(valorTotalNotas == ""){
            alertify.error("VALOR TOTAL INVÁLIDO");
			return false;
        }else{
            $('#frmContabilizarNotas').hide();
            $('#frmContabilizarMoedas').show();
        }
    });

    // ETAPA 2
    $('#moeda5').change(function() {
        const valorTotal = calcularTotalMoedas();
        $("#valorTotalMoedas").val(valorTotal);
        const qtdMoedas = calcularQtdMoedas();
        $("#qtdMoedas").val(qtdMoedas);
	});
	$('#moeda10').change(function() {
        const valorTotal = calcularTotalMoedas();
        $("#valorTotalMoedas").val(valorTotal);
        const qtdMoedas = calcularQtdMoedas();
        $("#qtdMoedas").val(qtdMoedas);
	});
	$('#moeda25').change(function() {
        const valorTotal = calcularTotalMoedas();
        $("#valorTotalMoedas").val(valorTotal);
        const qtdMoedas = calcularQtdMoedas();
        $("#qtdMoedas").val(qtdMoedas);
	});
	$('#moeda50').change(function() {
        const valorTotal = calcularTotalMoedas();
        $("#valorTotalMoedas").val(valorTotal);
        const qtdMoedas = calcularQtdMoedas();
        $("#qtdMoedas").val(qtdMoedas);
	});
	$('#moeda100').change(function() {
        const valorTotal = calcularTotalMoedas();
        $("#valorTotalMoedas").val(valorTotal);
        const qtdMoedas = calcularQtdMoedas();
        $("#qtdMoedas").val(qtdMoedas);
    });
    function calcularTotalMoedas() {
        const qtdMoeda5 = $("#moeda5").val();
        const qtdMoeda10 = $("#moeda10").val();
        const qtdMoeda25 = $("#moeda25").val();
        const qtdMoeda50 = $("#moeda50").val();
        const qtdMoeda100 = $("#moeda100").val();

        var moeda5 = qtdMoeda5 * 0.05;
        var moeda10 = qtdMoeda10 * 0.10;
        var moeda25 = qtdMoeda25 * 0.25;
        var moeda50 = qtdMoeda50 * 0.50;
        var moeda100 = qtdMoeda100 * 1;

        var valorTotal = moeda5 + moeda10 + moeda25 + moeda50 + moeda100;
        return parseFloat(valorTotal.toFixed(2));
    }
    function calcularQtdMoedas() {
        const qtdMoeda5 = $("#moeda5").val();
        const qtdMoeda10 = $("#moeda10").val();
        const qtdMoeda25 = $("#moeda25").val();
        const qtdMoeda50 = $("#moeda50").val();
        const qtdMoeda100 = $("#moeda100").val();

        var moeda5 = qtdMoeda5 * 1;
        var moeda10 = qtdMoeda10 * 1;
        var moeda25 = qtdMoeda25 * 1;
        var moeda50 = qtdMoeda50 * 1;
        var moeda100 = qtdMoeda100 * 1;

        var qtdMoedas = 0;
        qtdMoedas = moeda5 + moeda10 + moeda25 + moeda50 + moeda100;
        return qtdMoedas;
    }
    $('#btnAvancar2').click(function() {
        var dadosfrmContabilizarMoedas = $('#frmContabilizarMoedas').serialize();
        var valorTotalMoedas = $("#valorTotalMoedas").val();
        if(valorTotalMoedas == ""){
            alertify.error("VALOR TOTAL INVÁLIDO");
			return false;
        }else{
            $('#frmContabilizarNotas').hide();
            $('#frmContabilizarMoedas').hide();
            $('#frmConfirmarDados').show();
            calcularTotal();
            // CONFIRMAR DADOS
            moment.locale('pt-br');
            var data = moment().format('DD/MM/YYYY');
            $("#data").val(data);
        }
    });

    // ETAPA 3
    $('#btnCancelar').click(function() {	
		alertify.confirm('ATENÇÃO', 'DESEJA CANCELAR?', function(){
            alertify.confirm().close();
            $('#conteudo').load("./View/Financeiro/FluxoCaixa.php");
        }, function(){
            // alertify.error('OPERAÇÃO CANCELADA');
        });
	});
    $('#btnAbrirCaixa').click(function() {	
		dados = $('#frmConfirmarDados').serialize();
        $.ajax({
		    type: "POST",
		 	data: dados,
		 	url: "./Controller/Financeiro/AbrirCaixa.php",
		 	success: function(r) {
                 if(r > 0){
                    $('#frmConfirmarDados')[0].reset();
                    alertify.success("CAIXA ABERTO");
                    $('#conteudo').load("./View/Financeiro/FluxoCaixa.php");
                 }else{
                    alertify.error("NÃO FOI POSSÍVEL ABRIR O CAIXA");
                    return false;
                 }
		 	}
		 });
	});

    function calcularTotal() {
        // DADOS CONTABILIZAR NOTAS
        var qtdNotas = $("#qtdNotas").val();
        $("#totalQtdNotas").val(qtdNotas);
        var totalNotas = $("#valorTotalNotas").val();
        $("#totalNotas").val(totalNotas);
        // DADOS CONTABILIZAR MOEDAS
        var qtdMoedas = $("#qtdMoedas").val();
        $("#totalQtdMoedas").val(qtdMoedas);
        var totalMoedas = $("#valorTotalMoedas").val();
        $("#totalMoedas").val(totalMoedas);

        const valorTotalNotas = calcularTotalNotas();
        const valorTotalMoedas = calcularTotalMoedas();

        var caixaInicial = valorTotalNotas + valorTotalMoedas;
  
        $("#caixaInicial").val(caixaInicial);
    }
</script>
<?php
} else {
	header("location:./index.php");
}
?>