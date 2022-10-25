<?php 
session_start();

require_once "../../Model/Conexao.php";
require_once "../../Model/Tecnicos.php";

$nome = $_POST['nome'];
$data = date("Y-m-d");
$endereco = $_POST['endereco'];

$obj = new tecnicos();

$dados = array(
$nome,
$data,
$endereco
);

echo $obj-> adicionarTecnicos($dados);
?>