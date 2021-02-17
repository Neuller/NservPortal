<?php 

require_once "../../Classes/Conexao.php";
require_once "../../Classes/Clientes.php";

$obj = new clientes();

$dados = array(
$_POST['idClienteU'],
$_POST['nomeU'] = strtoupper($_POST['nomeU']),
$_POST['cpfU'] = strtoupper($_POST['cpfU']),
$_POST['cnpjU'] = strtoupper($_POST['cnpjU']),
$_POST['cepU'] = strtoupper($_POST['cepU']),
$_POST['bairroU'] = strtoupper($_POST['bairroU']),
$_POST['ufU'] = strtoupper($_POST['ufU']),
$_POST['enderecoU'] = strtoupper($_POST['enderecoU']),
$_POST['numeroU'] = strtoupper($_POST['numeroU']),
$_POST['complementoU'] = strtoupper($_POST['complementoU']),
$_POST['telefoneU'] = strtoupper($_POST['telefoneU']),
$_POST['telefone2U'] = strtoupper($_POST['telefone2U']),
$_POST['celularU'] = strtoupper($_POST['celularU']),
$_POST['celular2U'] = strtoupper($_POST['celular2U']),
$_POST['emailU'] = strtoupper($_POST['emailU'])
);

echo $obj-> editarCliente($dados);
?>