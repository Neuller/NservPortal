<?php 
require_once "../../Classes/Conexao.php";
	
$c= new conectar();
$conexao=$c->conexao();

$sql="SELECT ID, usuario, nome, email 
FROM usuarios
ORDER BY ID DESC";

$result=mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<head>
  	
</head>
<body>
	<div class="table-responsive">
		<table id="tabelaUsuarios" class="table table-hover table-condensed table-bordered">
			<!-- CABEÇALHO -->
			<thead>
				<tr>
					<td>Usuário</td>
					<td>Nome</td>
					<td>Email</td>
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
							<td>'.$mostrar[2].'</td>
							<td>'.$mostrar[3].'</td>
							<td>'.'<span data-toggle="modal" data-target="#atualizaUsuarioModal" class="btn btn-warning btn-md" title="EDITAR" onclick="adicionarDados('.$mostrar[0].')">
							<span class="glyphicon glyphicon-pencil"></span>
							</span>'.'</td>
							<td>'.'<span class="btn btn-danger btn-md" title="EXCLUIR" onclick="eliminarUsuario('.$mostrar[0].')">
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
		$('#tabelaUsuarios').DataTable(
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