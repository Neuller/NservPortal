<?php 
require_once "../../Model/Conexao.php";
require_once "../../Model/Tecnicos.php";

$obj = new tecnicos();

$dados = array(
$_POST['idTecnicos'],
$_POST['nomeU'],
$_POST['enderecoU']
);

echo $obj-> editarTecnicos($dados);
?>