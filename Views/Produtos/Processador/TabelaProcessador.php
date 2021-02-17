<?php
require_once "../../../Classes/Conexao.php";
require_once "../../../Classes/Produtos.php";

$c = new conectar();
$conexao = $c -> conexao();
$obj = new produtos();

$sql = "SELECT id_produto, categoria, codigo, descricao, preco, preco_instalacao, estoque, nf, ncm
FROM produtos
WHERE categoria = 'PROCESSADOR'
ORDER BY id_produto DESC";

$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html>
<body>
	<div class="table-responsive">
		<table id="tabelaProcessadorLoad" class="table table-hover table-condensed table-bordered text-center table-striped">
			<!-- CABEÇALHO -->
			<thead>
				<tr>
					<td>CÓDIGO</td>
					<td>DESCRIÇÃO</td>
					<td>VALOR UNITÁRIO</td>
					<td>EDITAR</td>
					<td>VISUALIZAR</td>
					<td>EXCLUIR</td>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($mostrar = mysqli_fetch_array($result)) {
					echo
						'
						<tr>
						<td>' . $mostrar[2] . '</td>
						<td>' . $mostrar[3] . '</td>
						<td>' . 'R$ '. $mostrar[4] . '</td>
						<!-- BOTÂO EDITAR -->
						<td>' . '<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarProduto" title="EDITAR" onclick="editarProdutos('.$mostrar[0].')">
						<span class="glyphicon glyphicon-pencil"></span>
						</span>' . '</td>
						<!-- BOTÃO VISUALIZAR -->
						<td>' . '<span class="btn btn-default btn-sm" data-toggle="modal" data-target="#visualizarProduto" title="VISUALIZAR" onclick="visualizarProdutos('.$mostrar[0].')">
						<span class="glyphicon glyphicon-search"></span>
						</span>' . '</td>
						<!-- BOTÃO EXCLUIR -->
						<td>' . '<span class="btn btn-danger btn-sm" title="EXCLUIR" onclick="excluirProduto('.$mostrar[0].')">
						<span class="glyphicon glyphicon-remove"></span>
						</span>' . '</td>
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
	$(document).ready(function() {
		$('#tabelaProcessadorLoad').DataTable(
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