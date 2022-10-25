<?php 
class tecnicos{
// MÉTODO ADICIONAR
public function adicionarTecnicos($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "INSERT into tecnicos (nome, dataCadastro, endereco) 
	VALUES ('$dados[0]','$dados[1]', '$dados[2]')";

	return mysqli_query($conexao, $sql);
}
// MÉTODO EDITAR  
public function editarTecnicos($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "UPDATE tecnicos SET nome = '$dados[1]', endereco = '$dados[2]' 
	WHERE idTecnico = '$dados[0]' ";

	echo mysqli_query($conexao, $sql);
}
// MÉTODO EXCLUIR 
public function excluirTecnicos($idTecnicos){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "DELETE from tecnicos WHERE idTecnico = '$idTecnicos' ";

	return mysqli_query($conexao, $sql);
}
// MÉTODO RETORNAR DADOS 
public function obterDadosTecnicos($idTecnicos){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "SELECT idTecnico, nome, endereco
	FROM tecnicos 
	WHERE idTecnico = '$idTecnicos' ";

	$result = mysqli_query($conexao, $sql);
	$mostrar = mysqli_fetch_row($result);

	$dados = array(
		'idTecnicos' => $mostrar[0],
		'nome' => $mostrar[1],
		'endereco' => $mostrar[2]
	);
	return $dados;
}
}
?>