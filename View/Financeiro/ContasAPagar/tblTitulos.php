<?php
require_once "../../../Model/Conexao.php";
require_once "../../../Model/Utilitarios.php";

$c = new conectar();
$conexao = $c -> conexao();
$objUtils = new utilitarios();

$dataAtual = date('m');

$sql = "SELECT id_contas_a_pagar, id_usuario, tipo, descricao, referencia, data_vencimento, valor, status
FROM contas_a_pagar 
ORDER BY data_vencimento ASC";

$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html>
	<body>
		<div class="table-responsive">
			<table id="tabelaTitulos" class="table table-hover table-condensed table-bordered text-center table-striped">
				<thead>
					<tr>
						<td>DESCRIÇÃO</td>
						<td>DATA DE VENCIMENTO</td>
						<td>VALOR</td>
						<td>STATUS</td>
						<td>ATUALIZAR</td>
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
                                <td>'.$mostrar[3].'</td>
                                <td>'.$objUtils -> data($mostrar[5]).'</td>	
                                <td>'.$mostrar[6].'</td>	
                                <td>'.$mostrar[7].'</td>	
                                <!-- BOTÃO ATUALIZAR -->
                                <td>'.'<span class="btn btn-warning btn-md" data-toggle="modal" title="ATUALIZAR" data-target="#atualizarTitulo" onclick="atualizarTitulo('.$mostrar[0].')"">
                                <span class="glyphicon glyphicon-pencil"></span>
                                </span>'.'</td>		
                                <!-- BOTÃO EXCLUIR -->
                                <td>'.'<span class="btn btn-danger btn-md" data-toggle="modal" title="EXCLUIR" data-target="#excluirTitulo" onclick="excluirTitulo('.$mostrar[0].')"">
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
