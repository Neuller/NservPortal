<?php 
class produtos{
public function CadastrarProdutos($dados){
	$c = new conectar();
	$conexao = $c -> conexao();
	$data = date('Y-m-d');

	$sql = "INSERT INTO produtos (categoria, codigo, descricao, garantia, preco, preco_instalacao, estoque, nf, ncm, data_cadastro) 
	VALUES ('$dados[1]','$dados[0]', '$dados[2]','$dados[3]', '$dados[5]', '$dados[6]', '$dados[4]', '$dados[7]', '$dados[8]', '$data')";

	return mysqli_query($conexao, $sql);
}

public function obterDadosProdutos($idProduto){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "SELECT id_produto, categoria, codigo, descricao, garantia, preco, 
	preco_instalacao, estoque, nf, ncm, data_cadastro
	FROM produtos WHERE id_produto = '$idProduto' ";

	$result = mysqli_query($conexao, $sql);
	$mostrar = mysqli_fetch_row($result);

	$dados = array(
		'id_produto' => $mostrar[0],
		'categoria' => $mostrar[1],
		'codigo' => $mostrar[2],
		'descricao' => $mostrar[3],
		'garantia' => $mostrar[4],
		'preco' => $mostrar[5],
		'preco_instalacao' => $mostrar[6],
		'estoque' => $mostrar[7],
		'nf' => $mostrar[8],
		'ncm' => $mostrar[9],
		'data_cadastro'=> $mostrar[10]
	);
	return $dados;
}

public function editarProduto($dados){
	$c = new conectar();
	$conexao = $c -> conexao();

	$sql = "UPDATE produtos SET codigo = '$dados[1]', descricao = '$dados[2]', garantia = '$dados[3]',
	preco = '$dados[4]', preco_instalacao = '$dados[5]', estoque = '$dados[6]', nf = '$dados[7]', ncm = '$dados[8]'
    WHERE id_produto = '$dados[0]'";

	echo mysqli_query($conexao, $sql);
}

public function excluirProduto($idProduto){
	$c = new conectar();
	$conexao = $c -> conexao();

	$sql = "DELETE from produtos WHERE id_produto = '$idProduto' ";

	return mysqli_query($conexao, $sql);
}
}
?>