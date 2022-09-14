<?php
session_start();
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Usuarios.php";

$c = new conectar();
$conexao = $c -> conexao();
$obj = new usuarios();

$idUsuario = $_SESSION["id_usuario"];

echo json_encode($obj -> obterDadosUsuario($idUsuario));
?>