<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Servicos.php";
require_once "../../Classes/Utilitarios.php";

$c = new conectar();
$conexao = $c -> conexao();
$obj = new servicos();
$objUtils = new utilitarios();

$sql = "SELECT id_servico, id_cliente, equipamento, observacao, serial_number, valor_total, data_cadastro, data_saida, status 
FROM servicos 
ORDER BY id_servico DESC";

$result = mysqli_query($conexao, $sql);	
?>

<!DOCTYPE html>
<html>
<body>
	<div class="table-responsive">
		<table id="tableServicos" class="table table-hover table-condensed table-bordered text-center table-striped">
			<thead>
				<tr>
					<td>CLIENTE</td>
					<td>CELULAR</td>
					<td>N° SERIAL</td>
					<td>DATA DE ENTRADA</td>
					<td>STATUS</td>
					<td>ORDEM DE SERVIÇO</td>
					<td>EDITAR</td>
					<td>VISUALIZAR</td>
				</tr>
			</thead> 
			<tbody>
				<?php
					while($mostrar = mysqli_fetch_array($result))
					{
						$data = date('d/m/Y', strtotime($mostrar[6]));
						echo 
						'
						<tr>
						<!-- CLIENTE -->
							<td>'.$obj -> nomeCliente($mostrar[1]).'</td>
						<!-- CELULAR -->
							<td>'.$objUtils -> celularCliente($mostrar[1]).'</td>
						<!-- NÚMERO DE SERIAL -->
							<td>'.$mostrar[4].'</td>
						<!-- DATA DE ENTRADA -->
							<td>'.$data.'</td>
						<!-- STATUS	-->
						<td>'.$mostrar[8].'</td>
						<!-- ORDEM DE SERVIÇO -->
							<td>'.'<a href="./Procedimentos/Servicos/OrdemServico.php?idServ='.$mostrar[0].'" target="_BLANK" title="IMPRIMIR" class="btn btn-danger btn-sm">
							<span class="glyphicon glyphicon-print"></span>
							</a>'.'</td>
						<!-- BOTÂO EDITAR -->
							<td>'.'<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarServicos" title="EDITAR" onclick="editarServicos('.$mostrar[0].')">
							<span class="glyphicon glyphicon-pencil"></span>
							</span>'.'</td>
						<!-- BOTÃO VISUALIZAR -->
							<td>'.'<span class="btn btn-default btn-sm" data-toggle="modal" data-target="#visualizarServicos" title="VISUALIZAR" onclick="visualizarServicos('.$mostrar[0].')">
							<span class="glyphicon glyphicon-search"></span>
							</span>'.'</td>							
						</tr>
						';
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>

<script>
$(document).ready(function(){
    $('#tableServicos').DataTable(
		{	
			"language": {
			"lengthMenu": "_MENU_ REGISTROS POR PÁGINA",
			"zeroRecords": "NENHUM REGISTRO ENCONTRADO",
			"info": "PÁGINA _PAGE_ DE _PAGES_",
			"infoEmpty": "Nenhum registro foi encontrado",
			"infoFiltered": "(FILTRADO DE _MAX_ REGISTROS NO TOTAL)",
			"search": "PESQUISAR:",
			"paginate":{
				"first":      "PRIMEIRO",
				"last":       "ÚLTIMO",
				"next":       "PRÓXIMO",
				"previous":   "ANTERIOR"
			}
        	}
		}
	);
});
</script>