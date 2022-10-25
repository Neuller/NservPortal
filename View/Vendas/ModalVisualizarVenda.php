<!-- VERIFICA SESSÃO LOGADA -->
<?php
session_start();
if (isset($_SESSION['User'])) {
?>
<?php require_once "../../Model/Conexao.php";
	$c = new conectar();  
    $conexao = $c->conexao();
	$sql = "SELECT ID_Status, Nome_Status FROM status";
	$result = mysqli_query($conexao, $sql);
?>
<div class="modal fade" id="visualizarServico" tabindex="-1" role="dialog" aria-labelledby="modalVisualizar">
	<div class="modal-dialog modal-lg" role="document" data-keyboard="true">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="modal-content col-md-12 col-sm-12 col-xs-12">
				<!-- TÍTULO -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center" id="myModalLabel">VISUALIZAR</h4>
				</div>
				<!-- FORMULÁRIO	-->
				<div class="modal-body">
					<form id="frmVisualizaServico">
						<!-- ID -->
						<div>
							<input readonly type="text" hidden="" id="idServicoView" name="idServicoView">
						</div>
						<!-- DIAGNÓSTICO -->
						<div class='col-md-12 col-sm-12 col-xs-12 separador itensFormularioCadastro'>
							<div>
								<h4><strong>DIAGNÓSTICO TÉCNICO</strong><span class="glyphicon glyphicon-file ml-15"></span></h4>
								<hr>
								<textarea type="text" readonly class="form-control input-sm" id="diagnosticoView" name="diagnosticoView" rows="3" style="resize: none"></textarea>
							</div>
						</div>
						<!-- TÉCNICO -->
						<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
							<div>
								<label>TÉCNICO</label>
								<input class="form-control input-sm" readonly id="tecnicoView" name="tecnicoView"></input>
							</div>
						</div>
						<!-- FORMULÁRIO INFORMAÇÕES DO EQUIPAMENTO / SERVIÇO -->
						<div class='col-md-12 col-sm-12 col-xs-12 separador'>
							<div class="text-left">
								<h4><strong>INFORMAÇÕES DO EQUIPAMENTO E SERVIÇO</strong><span class="glyphicon glyphicon-wrench ml-15"></span></h4>
							</div>
							<hr>
						</div>
						<!-- EQUIPAMENTO -->
						<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
							<div>
								<label>EQUIPAMENTO / MARCA / MODELO</label>
								<input type="text" readonly class="form-control input-sm" id="equipamentoView" name="equipamentoView">
							</div>
						</div>
						<!-- NÚMERO DE SÉRIE -->
						<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
							<div>
								<label>NÚMERO DE SÉRIE</label>
								<input type="text" readonly class="form-control input-sm" id="serialNumberView" name="serialNumberView">
							</div>
						</div>
						<!-- STATUS -->
						<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
							<div>
								<label>STATUS DO SERVIÇO</label>
								<input class="form-control input-sm" readonly id="selectStatusView" name="selectStatusView"></input>
							</div>
						</div>			
						<!-- DATA DE ENTREGA -->
						<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
							<div>
								<label>DATA DE ENTREGA</label>
								<input type="text" readonly class="form-control input-sm" id="dataSaidaView" name="dataSaidaView">
							</div>
						</div>
						<!-- OBSERVAÇÕES -->
						<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
							<div>
								<label>OBSERVAÇÕES</label>
								<textarea type="text" readonly class="form-control input-sm text-uppercase" id="informacaoView" name="informacaoView" rows="3" style="resize: none"></textarea>
							</div>
						</div>								
						<!-- SERVIÇO EXECUTADO -->
						<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
							<div>
								<label>SERVIÇO(s) EXECUTADO(s)</label>
								<textarea type="text" readonly class="form-control input-sm" id="servicoView" name="servicoView" rows="3" style="resize: none"></textarea>
							</div>
						</div>						
						<!-- VALOR TOTAL -->
						<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
							<div>
								<label>VALOR TOTAL</label>
								<input type="number" readonly class="form-control input-sm" id="precoView" name="precoView">
							</div>
						</div>
						<!-- GARANTIA -->
						<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
							<div>
								<label>GARANTIA</label>
								<input type="text" readonly class="form-control input-sm" id="garantiaView" name="garantiaView"></input>
							</div>
						</div>
						<!-- NF-E EMITIDA? -->
						<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
							<div>
								<label>NF-E EMITIDA?</label>
							</div>
							<form id="nfeEmitidaForm">				
								<input type="radio" class="custom-control-input" disabled id="nfeEmitidaView" name="nfeEmitidaView" value="NAO" checked>
								<label class="custom-control-label btnRadio">NÃO</label>											
								<input type="radio" class="custom-control-input" disabled id="nfeEmitidaView" name="nfeEmitidaView" value="SIM">
								<label class="custom-control-label btnRadio">SIM</label>				
							</form>		
						</div>		
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- SE NÂO ESTIVAR LOGADO RETORNA À PÁGINA INICIAL -->
<?php
} else {
	header("location:../../index.php");
}
?>