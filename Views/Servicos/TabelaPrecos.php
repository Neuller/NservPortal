<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Servicos.php";
require_once "../../Classes/Utilitarios.php";

$c = new conectar();
$conexao = $c -> conexao();
$obj = new servicos();
$objUtils = new utilitarios();

$sql = "SELECT id_preco_servico, descricao, garantia, valor
FROM preco_servicos 
ORDER BY id_preco_servico DESC";

$result = mysqli_query($conexao, $sql);	
?>

<!DOCTYPE html>
<html>
<body>
	<div class="table-responsive">
		<table id="tablePrecos" class="table table-hover table-condensed table-bordered text-center table-striped">
			<thead>
				<tr>
					<td>DESCRIÇÃO</td>
                    <td>GARANTIA</td>
					<td>VALOR</td>
                    <td>EDITAR</td>
                    <td>EXCLUIR</td>
				</tr>
			</thead> 
			<tbody>
				<?php
					while($mostrar = mysqli_fetch_array($result))
					{
						echo 
						'
						<tr>
						<!-- DESCRIÇÃO -->
						<td>'.$mostrar[1].'</td>
						<!-- GARANTIA -->
						<td>'.$mostrar[2].'</td>
						<!-- VALOR -->
						<td>'.'R$ '.$mostrar[3].'</td>
						<!-- BOTÂO EDITAR -->
						<td>'.'<span class="btn btn-warning btn-md" data-toggle="modal" data-target="#editar" title="EDITAR" onclick="aDesenvolver()">
						<span class="glyphicon glyphicon-pencil"></span>
						</span>'.'</td>
						<!-- BOTÃO EXCLUIR -->
                        <td>'.'<span class="btn btn-danger btn-md" title="EXCLUIR" onclick="excluir('.$mostrar[0].')">
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
});
</script>