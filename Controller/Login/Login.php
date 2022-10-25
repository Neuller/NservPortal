<?php 
session_start();

require_once "../../Model/Conexao.php";
require_once "../../Model/Usuarios.php";

$obj = new usuarios();

$dados = array(
$_POST["login"],
$_POST["senha"]
);

echo $obj -> login($dados);
?>