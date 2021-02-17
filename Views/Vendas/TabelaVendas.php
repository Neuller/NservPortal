<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Vendas.php";
require_once "../../Classes/Utilitarios.php";

$c = new conectar();
$conexao = $c -> conexao();
$objUtils = new utilitarios();

$sql = "SELECT id_venda, id_cliente, id_produto, id_usuario, valor_total, data_venda, total, forma_pagamento, valor_pagamento, 
desconto, troco, saldo_devedor, quantidade, valor_unitario
FROM vendas 
GROUP BY id_venda
ORDER BY data_venda DESC";

$result = mysqli_query($conexao,$sql);	
?>

<!DOCTYPE html>
	<body>
		<div class="table-responsive">
			<table id="tableVendas" class="table table-hover table-condensed table-bordered text-center table-striped">
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
							<td>'.'<span class="btn btn-default btn-sm" data-toggle="modal" data-target="#visualizarVendas" title="VISUALIZAR" onclick="aDesenvolver()">
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
    $('#tableVendas').DataTable(
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