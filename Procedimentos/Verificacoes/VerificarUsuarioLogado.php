<?php
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Utilitarios.php";

$c = new conectar();
$conexao = $c -> conexao();
$obj = utilitarios();

$idUsuario = $_SESSION['IDUser'];

echo $obj -> nomeUsuario($idUsuario);
?>