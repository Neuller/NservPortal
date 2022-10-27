<?php
require_once "../../Model/Conexao.php";
require_once "../../Model/Utilitarios.php";

$objUtils = new utilitarios();

$c = new conectar();
$conexao = $c -> conexao();

$idVenda = $_GET["idVenda"];

$sql = "SELECT id_venda, id_cliente, id_produto, id_usuario, valor_total, data_venda, total, forma_pagamento, valor_pagamento, 
desconto, troco, saldo_devedor, observacao, quantidade, valor_unitario
FROM vendas WHERE id_venda = '$idVenda' GROUP BY id_venda";

$result = mysqli_query($conexao, $sql);

$mostrar = mysqli_fetch_row($result);

$codigoVenda = $mostrar[0];
$idCliente = $mostrar[1];
$idVendedor = $mostrar[3];
$valorTotal = $mostrar[4];
$dataVenda = $mostrar[5];
$formaPagamento = $mostrar[7];
$valorPagamento = $mostrar[8];
$descontos = $mostrar[9];
$troco = $mostrar[10];
?>

<html>
<link rel="stylesheet" type="text/css" href="../../Lib/bootstrap/css/bootstrap.css">

<!-- TÍTULO -->
<title>COMPROVANTE DE VENDA - NSERV</title>

<head class="container">
    <div class="text-center">
        <!-- TÍTULO DA PÁGINA -->
        <title>Nserv</title>
        <!-- ICONE DA PÁGINA -->
        <link rel="icon" href="../../Img/Icon.png">


        <!-- CABEÇALHO -->
        <div class="cabecalho">
            <div class="logo">
                <!-- LOGO -->
                <img src="../../Img/banner.png" width="600" widht="600">
            </div>
        </div>
    </div>
</head>

<body class="formulario container">
    <!-- ORDEM DE SERVIÇO -->
    <div class="text-center" align="center">
        <div class="titulo">
            <span><strong>COMPROVANTE DE VENDA</strong></span>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- DATA DA VENDA -->
        <div class="text-right">
            <?php
            echo "<span>DATA DA VENDA: " . $objUtils->data($dataVenda) . "</span>";
            ?>
        </div>
        <form class="dadosFormulario">
            <!-- INFORMAÇÕES DO CLIENTE -->
            <div>
                <div class="text-left">
                    <label><strong>INFORMAÇÕES DO CLIENTE</strong></label>
                </div>
                <hr>
            </div>
            <?php
            $sql = "SELECT nome, cpf, cnpj, cep, bairro, endereco, numero, complemento, telefone, celular, email
            FROM clientes WHERE id_cliente = '$idCliente'";

            $result = mysqli_query($conexao, $sql);
            while ($informacoesCliente = mysqli_fetch_row($result)) {
            ?>
            <div class="dadosCliente">
                <div>
                    <span>NOME:</span>
                    <span><?php echo $informacoesCliente[0]; ?></span>
                </div>
                <div>
                    <span>CPF:</span>
                    <span><?php echo $informacoesCliente[1]; ?></span>
                </div>
                <div>
                    <span>CNPJ:</span>
                    <span><?php echo $informacoesCliente[2]; ?></span>
                </div>
                <div>
                    <span>EMAIL:</span>
                    <span><?php echo $informacoesCliente[10]; ?></span>
                </div>
            </div>
            <div class="dadosCliente">
                <div>
                    <span>CEP:</span>
                    <span><?php echo $informacoesCliente[3]; ?></span>
                </div>
                <div>
                    <span>ENDEREÇO:</span>
                    <span><?php echo $informacoesCliente[5]; ?></span>
                </div>
                <div>
                    <span>BAIRRO:</span>
                    <span><?php echo $informacoesCliente[4]; ?></span>
                </div>
                <div>
                    <span>NUMERO:</span>
                    <span><?php echo $informacoesCliente[6]; ?></span>
                </div>
                <div>
                    <span>COMPLEMENTO:</span>
                    <span><?php echo $informacoesCliente[7]; ?></span>
                </div>
            </div>
            <div class="dadosCliente">
                <span>TELEFONE:</span>
                <span><?php echo $informacoesCliente[8]; ?></span>
            </div>
            <div>
                <span>CELULAR:</span>
                <span><?php echo $informacoesCliente[9]; ?></span>
            </div>
            <?php } ?>
            <!-- INFORMAÇÕES DO EQUIPAMENTO E SERVIÇOS -->
            <div class="produtosServicos">
                <div class="text-left">
                    <label><strong>PRODUTO(S)</strong></label>
                </div>
                <hr>
            </div>
            <div class="dadosProdutosServicos">
                <?php 
                    $sql="SELECT ve.id_venda, ve.id_cliente, ve.id_produto, ve.id_usuario, ve.valor_total, ve.data_venda, ve.quantidade, 
                    pro.codigo, pro.descricao, pro.garantia, pro.preco
                    FROM vendas as ve
                    INNER JOIN produtos as pro
                    ON ve.id_produto = pro.id_produto
                    and id_venda = '$idVenda'";
                                
                    $resultado = mysqli_query($conexao, $sql);
                    
                    while($item = mysqli_fetch_row($resultado)){
                ?>
                <div class="informacoesProdutos">
                    <ul>
                        <li>
                            <span>CÓDIGO: <?php echo $item[7] ?></span>
                            <br>
                            <span>DESCRIÇÃO: <?php echo $item[8] ?></span>
                            <br>
                            <span>VALOR UN: R$ <?php echo $item[10] ?></span>
                            <br>
                            <span>QUANTIDADE: <?php echo $item[6] ?></span>
                            <br>
                            <span>GARANTIA: <?php echo $item[9] ?></span>
                        </li>
                    </ul>
                </div>
                <?php			    
 				}
 			    ?>

                <!-- VENDEDOR -->
                <div>
                    <span>
                        <?php 
                        if(($idVendedor == 0) || ($idVendedor == null) || ($idVendedor == "")){
                            echo "";
                        }else{
                            echo "<span>VENDEDOR: </span>".$objUtils -> nomeColaborador($idVendedor);
                        } 
                    ?>
                    </span>
                </div>

                <!-- FORMA DE PAGAMENTO -->
                <div>
                    <span>
                        <?php 
                        if(($formaPagamento == 0) || ($formaPagamento == null) || ($formaPagamento == "")){
                            echo "";
                        }else{
                            echo "<span>FORMA DE PAGAMENTO: </span>".$formaPagamento;
                        } 
                    ?>
                    </span>
                </div>

                <!-- TOTAL -->
                <?php 
                    $sql="SELECT SUM(total) FROM vendas WHERE id_venda = '$idVenda' GROUP BY id_venda";
                    $resultado = mysqli_query($conexao, $sql);
                    while ($result = mysqli_fetch_row($resultado)) {
                    $total = $result[0];
                ?>
                <div>
                    <span>
                        <?php 
                        if(($total == 0) || ($total == null) || ($total == "")){
                            echo "";
                        }else{
                            echo "<span>TOTAL: R$ </span>".$total;
                        } 
                    ?>
                    </span>
                </div>
                <?php
                    }
                ?>

                <!-- DESCONTOS -->
                <div>
                    <span>
                        <?php 
                        if(($descontos == 0) || ($descontos == null) || ($descontos == "")){
                            echo "";
                        }else{
                            echo "<span>DESCONTO: R$ </span>".$descontos;
                        } 
                    ?>
                    </span>
                </div>

                <!-- VALOR TOTAL -->
                <div>
                    <span>
                        <?php 
                        if(($valorTotal == 0) || ($valorTotal == null) || ($valorTotal == "")){
                            echo "";
                        }else{
                            echo "<span>VALOR TOTAL (C/ DESCONTO): </span>"."R$ ".$valorTotal;
                        } 
                    ?>
                    </span>
                </div>

                <!-- VALOR DO PAGAMENTO -->
                <div>
                    <span>
                        <?php 
                        if(($valorPagamento == 0) || ($valorPagamento == null) || ($valorPagamento == "")){
                            echo "";
                        }else{
                            echo "<span>VALOR DO PAGAMENTO: R$ </span>".$valorPagamento;
                        } 
                    ?>
                    </span>
                </div>

                <!-- TROCO -->
                <div>
                    <span>
                        <?php 
                        if(($troco == 0) || ($troco == null) || ($troco == "")){
                            echo "";
                        }else{
                            echo "<span>TROCO: R$ </span>".$troco;
                        } 
                    ?>
                    </span>
                </div>
            </div>
        </form>

        <!-- MENSAGEM -->
        <div class="produtosServicos">
            <div class="text-center msgFidelidade">
                <span>
                    A QUALIDADE É A NOSSA MELHOR GARANTIA DE FIDELIDADE AO CLIENTE,
                    NOSSA MAIS FORTE DEFESA CONTRA A CONCORRÊNCIA E O ÚNICO CAMINHO PARA O CRESCIMENTO E PARA OS LUCROS.
                    AGRADECEMOS A PREFERÊNCIA!
                </span>
            </div>
        </div>
    </div>
</body>

</html>

<style>
.titulo {
    margin: 30px;
}

.formulario {
    position: fixed;
}

.dadosFormulario {
    margin-top: 5px;
    border: 1px solid #000;
    padding: 15px;
}

.produtosServicos {
    margin-top: 30px;
}

.informacoesProdutos {
    margin-bottom: 10px;
}

.msgFidelidade {
    margin-top: 15px;
    font-size: 11px;
}

.dadosCliente,
.dadosProdutosServicos {
    font-size: 13px;
}
</style>