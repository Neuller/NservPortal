<?php 
    require_once "../../Model/Conexao.php";

    $c = new conectar();
    $conexao = $c -> conexao();

    $dados = $_POST['dados'];

    $converte_array = explode(",",$dados );

    $idProduto = $converte_array[0];
    $estoque = $converte_array[1];

    $sql = "UPDATE produtos SET estoque = '$estoque' WHERE id_produto = '$idProduto' ";

    mysqli_query($conexao, $sql); 
?>