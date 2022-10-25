<?php
require_once "../../Model/Conexao.php";
$c = new conectar();
$conexao = $c -> conexao();
$cpf = $_POST["CPF"];
$cnpj = $_POST["CNPJ"];
$celular = $_POST["CELULAR"];
$telefone = $_POST["TELEFONE"];

    // 0 NAO CADASTRADO
    // 1 CADASTRADO

    /** VALIDACAO CPF */
    if($cpf != "") {
        $sql = "SELECT * FROM clientes WHERE cpf = '{$cpf}'";
        $result = mysqli_query($conexao, $sql);
        if(mysqli_num_rows($result) > 0) {
            echo json_encode(1);
        } else { 
            echo json_encode(0); 
        }
    /** VALIDACAO CNPJ */
    } else if ($cnpj != "") {
        $sql = "SELECT * FROM clientes WHERE cnpj = '{$cnpj}'";
        $result = mysqli_query($conexao, $sql);
        if(mysqli_num_rows($result) > 0) {
            echo json_encode(1);
        } else { 
            echo json_encode(0); 
        }
    }
    /** VALIDACAO CELULAR */
    if($celular != "") {
        $sql = "SELECT * FROM clientes WHERE celular = '{$celular}'";
        $result = mysqli_query($conexao, $sql);
        if(mysqli_num_rows($result) > 0) {
            echo json_encode(1);
        } else { 
            echo json_encode(0); 
        }
    } else if ($telefone != "") {
        $sql = "SELECT * FROM clientes WHERE telefone = '{$telefone}'";
        $result = mysqli_query($conexao, $sql);
        if(mysqli_num_rows($result) > 0) {
            echo json_encode(1);
        } else { 
            echo json_encode(0); 
        }
    }
?>