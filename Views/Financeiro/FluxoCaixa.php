<?php
session_start();
if (isset($_SESSION['User'])) {
?>

<html>
	<body>
		<div class="container">
			<div class="cabecalho bgGray">
				<div class="text-center textCabecalho opacidade">
					<h3><strong>FLUXO DE CAIXA</strong></h3>
				</div>
            </div>

			<!-- FORMULÁRIO -->
			<div class="divFormulario">
				<div class="mx-auto">
					<form id="frmFluxoCaixa">
                        <!-- REFERÊNCIA -->
                        <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
							<div>
								<label>REFERÊNCIA</label>
								<input type="text" readonly class="form-control input-sm align text-uppercase" id="data" name="data">
							</div>
						</div>
                        <!-- STATUS -->
                        <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
                            <div>
                                <label>STATUS</label>
                                <input type="text" readonly class="form-control input-sm text-uppercase" id="status" name="status">
                            </div>
                        </div>
                        <!-- BOTÕES -->
						<div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
                            <div class="btnRight">
                                <span class="btn btn-danger" id="btnFecharCaixa" title="FECHAR CAIXA">FECHAR CAIXA</span>
                                <span class="btn btn-success" id="btnAbrirCaixa" title="ABRIR CAIXA">ABRIR CAIXA</span>
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
        moment.locale('pt-br');
        var data = moment().format('DD/MM/YYYY');
        $("#data").val(data);
        setStatusCaixa();
	});
	
	function setStatusCaixa() {
        var dados = $('#frmFluxoCaixa').serialize();
        $.ajax({
            type: "POST",
            data: dados,
            url: "./Procedimentos/Financeiro/VerificarStatusCaixa.php",
            success: function(r) {
                retorno = $.parseJSON(r);
                $("#status").val(retorno);
                if (retorno == "ABERTO") {
                    $("#btnAbrirCaixa").hide();
                    $("#btnFecharCaixa").show();
                } else if(retorno == "FECHADO"){
                    $("#btnAbrirCaixa").hide();
                    $("#btnFecharCaixa").hide();
                } else {
                    $("#btnAbrirCaixa").show();
                    $("#btnFecharCaixa").hide();
                }
            }
		});
    }

    $('#btnAbrirCaixa').click(function() {
        $('#conteudo').load("./Views/Financeiro/AbrirCaixa.php");	
	});
    $('#btnFecharCaixa').click(function() {
        $('#conteudo').load("./Views/Financeiro/FecharCaixa.php");	
	});
</script>

<?php
} else {
	header("location:./index.php");
}
?>