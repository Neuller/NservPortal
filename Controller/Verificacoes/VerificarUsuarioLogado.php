<?php
require_once "../../Model/Conexao.php";
require_once "../../Model/Utilitarios.php";

$c = new conectar();
$conexao = $c -> conexao();
$obj = utilitarios();

$idUsuario = $_SESSION["id_usuario"];

echo $obj -> nomeUsuario($idUsuario);
?>