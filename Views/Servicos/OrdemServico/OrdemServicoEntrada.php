<?php
require_once "../../../Classes/Conexao.php";
require_once "../../../Classes/Servicos.php";
require_once "../../../Classes/Utilitarios.php";

$objUtils = new utilitarios();

$c = new conectar();
$conexao = $c->conexao();

$idServico = $_GET['idServ'];

$sql = "SELECT id_servico, id_cliente, equipamento, observacao, servico_realizado, id_tecnico, serial_number, garantia, 
valor_total, data_cadastro, data_saida, diagnostico, status, ordem_servico
FROM servicos WHERE id_servico = '$idServico'";

$result = mysqli_query($conexao, $sql);

$mostrar = mysqli_fetch_row($result);

$idCliente = $mostrar[1];
$equipamento = $mostrar[2];
$observacoes = $mostrar[3];
$serialNumber = $mostrar[6];
$valorTotal = $mostrar[8];
$dataEntrada = $mostrar[9];
$dataSaida = $mostrar[10];
$status = $mostrar[12];
$ordemServ = $mostrar[13];
?>

<html>
<link rel="stylesheet" type="text/css" href="../../../Lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../../Css/OrdemServico.css">

<!-- TÍTULO -->
<title>ORDEM DE SERVICO - NSERV</title>

<head class="container">
    <div class="text-center">
        <!-- TÍTULO DA PÁGINA -->
        <title>NSERV</title>
        <!-- ICONE DA PÁGINA -->
        <link rel="icon" href="../../../Img/Icon.png">

        <!-- CABEÇALHO -->
        <div class="cabecalho">
            <div class="logo">
                <img src="../../../Img/Documentos/BannerOrcamento.png" width="600" widht="600">
            </div>
        </div>
    </div>
</head>

<body class="formulario container">
    <!-- ORDEM DE SERVIÇO -->
    <div class="text-center" align="center">
        <div class="tituloOrdemServico">
            <?php
            echo "<span><strong>ORDEM DE SERVIÇO - #" . $ordemServ . "</strong></span>";
            ?>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- DATA DE ENTRADA -->
        <div class="text-right dataEntrada">
            <?php
            echo "<span>DATA DE ENTRADA: " . $objUtils->data($dataEntrada) . "</span>";
            ?>
        </div>
        <form class="formularioOrdemServico fonteOrdemServico">
            <!-- INFORMAÇÕES DO CLIENTE -->
            <div>
                <div class="text-left">
                    <label><strong>DADOS DO CLIENTE</strong></label>
                </div>
                <hr>
            </div>
            <?php
            $sql_cliente = "SELECT nome, cpf, cnpj, cep, bairro, uf, endereco, numero, complemento, telefone, celular, email
            FROM clientes WHERE id_cliente = '$idCliente'";

            $result = mysqli_query($conexao, $sql_cliente);
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
                        <span><?php echo $informacoesCliente[11]; ?></span>
                    </div>
                </div>
                <div class="dadosCliente">
                    <div>
                        <span>CEP:</span>
                        <span><?php echo $informacoesCliente[3]; ?></span>
                    </div>
                    <div>
                        <span>ENDEREÇO:</span>
                        <span><?php echo $informacoesCliente[6]; ?></span>
                    </div>
                    <div>
                        <span>BAIRRO:</span>
                        <span><?php echo $informacoesCliente[4]; ?></span>
                    </div>
                    <div>
                        <span>NUMERO:</span>
                        <span><?php echo $informacoesCliente[7]; ?></span>
                    </div>
                    <div>
                        <span>COMPLEMENTO:</span>
                        <span><?php echo $informacoesCliente[8]; ?></span>
                    </div>
                </div>
                <div class="dadosCliente">
                    <span>TELEFONE:</span>
                    <span><?php echo $informacoesCliente[9]; ?></span>
                </div>
                <div>
                    <span>CELULAR:</span>
                    <span><?php echo $informacoesCliente[10]; ?></span>
                </div>
            <?php } ?>

            <!-- INFORMAÇÕES DO EQUIPAMENTO E SERVIÇOS -->
            <div class="equipamentoServicos">
                <div class="text-left">
                    <label><strong>EQUIPAMENTO E SERVIÇOS</strong></label>
                </div>
                <hr>
            </div>
            <div class="dadosEquipamento">
                <!-- STATUS ORÇAMENTO -->
                <div>
                    <?php if ($status == "ORCAMENTO") {
                        echo
                            "
                            <div>
                                <span>
                                    <strong>ORDEM: ORÇAMENTO</strong>
                                </span>
                            </div>
                            ";
                        }
                    ?>
                </div>
                <!-- EQUIPAMENTO -->
                <div>
                    <span>EQUIPAMENTO:</span>
                    <span><?php echo $equipamento; ?></span>
                </div>
                <!-- NÚMERO DE SÉRIE -->
                <div>
                    <span>NÚMERO DE SÉRIE:</span>
                    <span><?php echo $serialNumber; ?></span>
                </div>
                <!-- OBSERVAÇÕES -->
                <div>
                    <span>OBSERVAÇÕES: </span>
                    <span><?php echo $observacoes;  ?></span>
                </div>
            </div>
        </form>

        <!-- CONDIÇÕES DE SERVIÇOS -->
        <div class="equipamentoServicos">
            <div class="text-center" align="center">
                <div>
                    <span><strong>CONDIÇÕES DE SERVIÇOS</strong></span>
                </div>
            </div>
            <div class="text-justity condicoesServico">
                <?php if ($status == "ORCAMENTO") {
                    echo
                    "
                    <div class='itensFormulario'>
                        <span>
                            <strong>ORÇAMENTOS</strong>
                        </span>
                    </div>
                    <div class='itensFormulario'>
                        <span>
                            SERÁ COBRADO UMA TAXA DE R$ 25,00 PARA ORÇAMENTOS RECUSADOS PELO CLIENTE.
                        </span>
                    </div>
                    ";
                }
                ?>
                <div class="itensFormulario">
                    <span>
                        <strong>DO BEM ESQUECIDO PELO CLIENTE</strong>
                    </span>
                </div>
                <div class="itensFormulario">
                    <span>
                        O PROPRIETÁRIO DE EQUIPAMENTO ELETRÔNICO, QUE O ENTREGOU A UM PRESTADOR DE SERVIÇO
                        DE ASSISTÊNCIA TÉCNICA PARA CONCERTO,
                        OBRIGASSE A RETIRAR O BEM NO PRAZO MÁXIMO DE 60 (SESSENTA) DIAS,
                        CONTADOS DA DATA DE CONTATO DO ESTABELECIMENTO
                        COMUNICANDO A REALIZAÇÃO DO CONCERTO OU DE SUA IMPOSSIBILIDADE.
                        SUJEITO AO PAGAMENTO DE TAXA DIÁRIA NO VALOR DE R$ 01,00 À TÍTULO DE GUARDA.
                    </span>
                </div>
            </div>
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