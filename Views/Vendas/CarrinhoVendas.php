<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <body>
        <div class="table-responsive">
            <table id="carrinhoVendasTemp" class="table table-hover table-condensed table-bordered text-center table-striped">
                <thead>
                    <tr>
                        <td>DESCRIÇÃO</td>
                        <td>VALOR UN</td>
                        <td>QUANTIDADE</td>
                        <td>REMOVER</td>
                    </tr>
                </thead>
                <?php
                $total = 0; // INICIALIZAR VALOR TOTAL
                $cliente = ""; // INICIALIZAR NOME DO CLIENTE
                if (isset($_SESSION['vendasTemp'])) :
                    $i = 0;
                    foreach (@$_SESSION['vendasTemp'] as $key) {
                        $d = explode("||", @$key);
                        $idProduto = $d[0];
                        $estoque = $d[4];
                ?>
                        <tr>
                            <td><?php echo $d[1] ?></td>
                            <td><?php echo "R$ " . $d[2] ?></td>
                            <td><?php echo $d[5] ?></td>
                            <td>
                                <span class="btn btn-danger btn-sm" title="REMOVER" onclick="remover('<?php echo $i; ?>'), atualizarEstoque('<?php echo $idProduto; ?>,<?php echo $estoque; ?>')">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </span>
                            </td>
                        </tr>
                <?php
                        $calculoTotal = $d[2] * $d[5];
                        $total = $total + $calculoTotal;
                        $i++;
                        $cliente = $d[3];
                    }
                endif;
                ?>
            </table>
        </div>
    </body>
</html>

<script type="text/javascript">
    $(document).ready(function() {
        nome = "<?php echo @$cliente ?>";
        $('#nomeCliente').text(nome);

        total = "<?php echo @$total ?>";
        $("#total").val(total);
    });

    function remover(index) {
        $.ajax({
            type: "POST",
            data: "index=" + index,
            url: "./Procedimentos/Vendas/RemoverProdutos.php",
            success: function(r) {
                $('#carrinhoVendasTemp').load('./Views/Vendas/CarrinhoVendas.php');
                alertify.success("PRODUTO REMOVIDO DO CARRINHO");
                limparCamposPagamentos();
                var total = $('#total').val("");
                $('#valorTotal').val(total);
            }
        });
    }

    function atualizarEstoque(dados) {
        $.ajax({
            type: "POST",
            data: "dados=" + dados,
            url: "./Procedimentos/Vendas/AtualizarEstoque.php",
            success: function(r) {
                $('#carrinhoVendasTemp').load('./Views/Vendas/CarrinhoVendas.php');
            }
        });
    }
</script>