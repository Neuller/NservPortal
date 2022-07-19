<?php 
session_start();
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Usuarios.php";

$obj = new usuarios();
$senha = sha1($_POST['senha']);

$dados = array(
$_POST['grupoUsuario'] = strtoupper($_POST['grupoUsuario']),		
$_POST['nome'] = strtoupper($_POST['nome']),		
$_POST['login'] = strtoupper($_POST['login']),
$_POST['email'] = strtoupper($_POST['email']),
$senha
);

echo $obj-> CadastrarUsuarios($dados);
?>