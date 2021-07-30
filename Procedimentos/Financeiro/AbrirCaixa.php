<?php 
	session_start();
	require_once "../../Classes/Conexao.php";
    require_once "../../Classes/Financas.php";
	
	$c = new conectar();
	$obj = new financas();

	$dados = array(
		$_POST['totalQtdNotas'] = strtoupper($_POST['totalQtdNotas']),		
		$_POST['totalNotas'] = strtoupper($_POST['totalNotas']),
        $_POST['totalQtdMoedas'] = strtoupper($_POST['totalQtdMoedas']),
        $_POST['totalMoedas'] = strtoupper($_POST['totalMoedas']),
        $_POST['data'] = strtoupper($_POST['data']),
		$_POST['caixaInicial'] = strtoupper($_POST['caixaInicial'])
	);

	echo $obj-> AbrirCaixa($dados);
?>