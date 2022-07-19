<?php
session_start();
?>

<!DOCTYPE html>
<html>

<body>
    <div class="table-responsive">
        <table id="carrinhoProdutos" class="table table-hover table-condensed table-bordered text-center table-striped">
            <thead>
                <tr>
                    <td>DESCRIÇÃO</td>
                    <td>QUANTIDADE</td>
                    <td>VALOR UN</td>
                    <td>REMOVER</td>
                </tr>
            </thead>
            <?php
            $total = 0;
            if (isset($_SESSION["produtosTemp"])) :
                $i = 0;
                foreach (@$_SESSION["produtosTemp"] as $key) {
                    $d = explode("||", @$key);
                    $idProduto = $d[0];
            ?>
                    <tr>
                        <td><?php echo $d[1] ?></td>
                        <td><?php echo $d[2] ?></td>
                        <td><?php echo "R$ " . $d[3] ?></td>
                        <td>
                            <span class="btn btn-danger btn-md" title="REMOVER" onclick="removerProduto('<?php echo $i; ?>')">
                                <span class="glyphicon glyphicon-remove"></span>
                            </span>
                        </td>
                    </tr>
            <?php
                    $calculoTotal = $d[2] * $d[3];
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
        atualizarValorTotal();
    });

    function removerProduto(index) {
        $.ajax({
            type: "POST",
            data: "index=" + index,
            url: "./Procedimentos/Servicos/RemoverProdutos.php",
            success: function(r) {
                $("#carrinhoProdutos").load("./Views/Servicos/Tabelas/CarrinhoProdutos.php");
                atualizarValorTotal();
                alertify.success("PRODUTO REMOVIDO");
            }
        });
    }
</script>