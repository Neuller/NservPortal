<?php 
require_once "../../Model/Conexao.php";

$c = new conectar();
$conexao = $c->conexao();

$sql = "SELECT ID_Status, Nome_Status 
FROM status
ORDER BY ID_Status DESC";

$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<head>
  	
</head>
<body>
	<div class="table-responsive">
		<table id="tabelaStatus" class="table table-hover table-condensed table-bordered">
			<!-- CABEÇALHO -->
			<thead>
				<tr>
					<td>Descrição</td>
					<td>Editar</td>
					<td>Excluir</td>
				</tr>
			</thead>
			<tbody>
				<?php
					while($mostrar=mysqli_fetch_array($result))			
					{
						echo 
						'
						<tr>
						<td>'.$mostrar[1].'</td>
						<td>'.'<span class="btn btn-warning btn-md" data-toggle="modal" data-target="#atualizaStatus" onclick="adicionarDado('.$mostrar[0].','.$mostrar[1].')">
						<span class="glyphicon glyphicon-pencil"></span>
						</span>'.'</td>
						<td>'.'<span class="btn btn-danger btn-md" onclick="eliminarStatus('.$mostrar[0].')">
						<span class="glyphicon glyphicon-remove"></span>
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
		$('#tabelaStatus').DataTable(
			{	
				"language": {
				"lengthMenu": "_MENU_ registros por página",
				"zeroRecords": "Nada enconstrado, desculpe",
				"info": "Página _PAGE_ de _PAGES_",
				"infoEmpty": "Nenhum registro foi encontrado",
				"infoFiltered": "(Filtrado de _MAX_ registros no total)",
				"search": "Pesquisar:",
				"paginate":{
					"first":      "Primeiro",
					"last":       "Ultimo",
					"next":       "Próximo",
					"previous":   "Anterior"
				}
				}
			}
		);
	});
</script>