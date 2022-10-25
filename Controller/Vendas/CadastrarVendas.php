<?php 
	session_start();
	require_once "../../Model/Conexao.php";
    require_once "../../Model/Vendas.php";
	
	$obj = new vendas();
	$c = new conectar();

	$dados = array(
		$_POST['formaPagamento'] = strtoupper($_POST['formaPagamento']),		
		$_POST['total'] = strtoupper($_POST['total']),
		$_POST['valorPagamento'] = strtoupper($_POST['valorPagamento']),
		$_POST['desconto'] = strtoupper($_POST['desconto']),
		$_POST['troco'] = strtoupper($_POST['troco']),
		$_POST['saldoDevedor'] = strtoupper($_POST['saldoDevedor']),
		$_POST['valorTotal'] = strtoupper($_POST['valorTotal']),
		$_POST['observacao'] = strtoupper($_POST['observacao'])
	);

	if(count($_SESSION['vendasTemp']) == 0){
		echo 0;
	}else{
		$result = $obj -> CadastrarVendas($dados);
		unset($_SESSION['vendasTemp']);
		echo $result;
	}
?>