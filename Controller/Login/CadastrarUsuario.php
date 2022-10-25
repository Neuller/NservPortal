<?php 
require_once "../../Model/Conexao.php";
require_once "../../Model/Usuarios.php";

$obj = new usuarios();

$grupo = strtoupper($_POST["grupoSelect"]);
$nome = strtoupper($_POST["nome"]);
$usuario = strtoupper($_POST["usuario"]);
$email = strtoupper($_POST["email"]);
$senha = $_POST["senha"];

$senha = sha1($_POST["senha"]);

$dados = array(
    $grupo,
    $nome,
    $usuario,
    $email,
    $senha
);

echo $obj -> CadastrarUsuario($dados);
?>