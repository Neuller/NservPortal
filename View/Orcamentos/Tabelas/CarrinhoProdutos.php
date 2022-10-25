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
                        <td>QUANTIDADE</td>
                        <td>VALOR UN</td>
                        <td>REMOVER</td>
                    </tr>
                </thead>
                <?php
                $total = 0; // INICIALIZAR VALOR TOTAL
                if (isset($_SESSION['viewProdutosTemp'])) :
                    $i = 0;
                    foreach (@$_SESSION['viewProdutosTemp'] as $key) {
                        $d = explode("||", @$key);
                        $idProduto = $d[0];
                        $estoque = $d[4];
                ?>
                        <tr>
                            <td><?php echo $d[1] ?></td>
                            <td><?php echo $d[4] ?></td>
                            <td><?php echo "R$ " . $d[2] ?></td>
                            <td>
                                <span class="btn btn-danger btn-sm" title="REMOVER" onclick="remover('<?php echo $i; ?>')">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </span>
                            </td>
                        </tr>
                <?php
                        $calculoTotal = $d[2] * $d[4];
                        $total = $total + $calculoTotal;
                        $i++;
                    }
                endif;
                ?>
            </table>
        </div>
    </body>
</html>

<script type="text/javascript">
    $(document).ready(function() {
        total = "<?php echo @$total ?>";
        $("#totalProdutos").val(total);
    });

    function remover(index) {
        $.ajax({
            type: "POST",
            data: "index=" + index,
            url: "./Controller/Orcamentos/Tabelas/RemoverProduto.php",
            success: function(r) {
                $('#carrinhoProdutos').load('./View/Orcamentos/Tabelas/CarrinhoProdutos.php');
                alertify.success("PRODUTO REMOVIDO");
                var total = $('#totalProdutos').val("");
                $('#valorTotal').val(total);
            }
        });
    }
</script>