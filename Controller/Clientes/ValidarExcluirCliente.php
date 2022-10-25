<?php
require_once "../../Model/Conexao.php";
$c = new conectar();
$conexao = $c -> conexao();
$idCliente = $_POST["idCliente"];

    // 0 NAO EXISTE CADASTRO ASSOCIADO
    // 1 EXISTE CADASTRO ASSOCIADO

    if($idCliente != "") {
        /** VALIDACAO SERVICOS */
        $sqlServicos = "SELECT * FROM servicos WHERE id_cliente = '{$idCliente}'";
        $resultSqlServicos = mysqli_query($conexao, $sqlServicos);
        if(mysqli_num_rows($resultSqlServicos) > 0) {
            echo json_encode(1);
            return;
        }
        /** VALIDACAO VENDAS */
        $sqlVendas = "SELECT * FROM vendas WHERE id_cliente = '{$idCliente}'";
        $resultSqlVendas = mysqli_query($conexao, $sqlVendas);
        if(mysqli_num_rows($resultSqlVendas) > 0) {
            echo json_encode(1);
        } else { 
            echo json_encode(0);
        }
        return;
    }
?>