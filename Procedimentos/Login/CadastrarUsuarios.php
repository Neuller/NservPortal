<?php 

require_once "../../Classes/Conexao.php";
require_once "../../Classes/Usuarios.php";

$obj = new usuarios();

$grupo = $_POST['grupoSelect'];
$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$senha = sha1($_POST['senha']);

$dados = array(
    $grupo,
    $nome,
    $usuario,
    $email,
    $senha
);

echo $obj -> CadastrarUsuarios($dados);
?>