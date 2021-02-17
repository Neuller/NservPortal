<?php
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Utilitarios.php";

$c = new conectar();
$conexao = $c -> conexao();
$objUtils = new utilitarios();

$dataAtual = date('m');

$sql = "SELECT id_venda, id_cliente, id_produto, id_usuario, valor_total, data_venda
FROM vendas 
where MONTH(data_venda) = ".$dataAtual."
GROUP BY id_venda
ORDER BY data_venda DESC";

$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html>
	<body>
		<div class="table-responsive">
			<table id="tabelaVendasMes" class="table table-hover table-condensed table-bordered text-center table-striped">
				<thead>
					<tr>
						<td>CLIENTE</td>
						<td>DATA DA VENDA</td>
						<td>COMPROVANTE</td>
						<td>VISUALIZAR</td>
					</tr>
				</thead> 
				<tbody>
					<?php
						while($mostrar = mysqli_fetch_array($result))
						{
							$data = date('d/m/Y', strtotime($mostrar[5]));
							echo 
							'
							<tr>
							<!-- CLIENTE -->
							<td>'.$objUtils -> nomeCliente($mostrar[1]).'</td>
							<!-- DATA DE CADASTRO -->
							<td>'.$data.'</td>	
							<!-- COMPROVANTE -->
							<td>'.'<a href="./Procedimentos/Vendas/CriarComprovante.php?idVenda='.$mostrar[0].'" target="_BLANK" class="btn btn-danger btn-sm" title="IMPRIMIR">
							<span class="glyphicon glyphicon-print"></span>
							</a>'.'</td>			
							<!-- BOTÃO VISUALIZAR -->
							<td>'.'<span class="btn btn-default btn-sm" data-toggle="modal" title="VISUALIZAR" data-target="#visualizarVendas" onclick="aDesenvolver()">
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

</script>