<?php 
session_start();
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Financas.php";

$obj = new financas();

$dados = array(		
$_POST['referencia'] = strtoupper($_POST['referencia']),		
$_POST['descricao'] = strtoupper($_POST['descricao']),
$_POST['valor'] = strtoupper($_POST['valor']),
$_POST['dataVencimento'] = strtoupper($_POST['dataVencimento']),
);

echo $obj-> CadastrarBoletos($dados);
?>