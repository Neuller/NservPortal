<?php
require_once "../../Model/Conexao.php";
require_once "../../Model/Produtos.php";

$c = new conectar();
$conexao = $c -> conexao();
$obj = new produtos();
$categoria = $_GET["categoria"];

$sql = "SELECT id_produto, categoria, codigo, descricao, preco, preco_instalacao, estoque, nf, ncm
FROM produtos
WHERE categoria = '$categoria'
AND status = 'ATIVO'
ORDER BY id_produto DESC";

$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html>
<body>
	<div class="table-responsive">
		<table id="tblProdutos" class="table table-hover table-condensed table-bordered text-center table-striped">
			<thead>
				<tr>
					<td>CÓDIGO</td>
					<td>DESCRIÇÃO</td>
					<td>VALOR UNITÁRIO</td>
					<td>VISUALIZAR</td>
					<td>INATIVAR</td>
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
						<!-- BOTÃO VISUALIZAR -->
						<td>' . '<span class="btn btn-default btn-lg" data-toggle="modal" data-target="#visualizarProduto" title="VISUALIZAR" onclick="visualizarProduto('.$mostrar[0].')">
						<span class="glyphicon glyphicon-search"></span>
						</span>' . '</td>
						<!-- BOTÃO EXCLUIR -->
						<td>' . '<span class="btn btn-danger btn-lg" title="EXCLUIR" onclick="inativarProduto('.$mostrar[0].')">
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
		$('#tblProdutos').DataTable(
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