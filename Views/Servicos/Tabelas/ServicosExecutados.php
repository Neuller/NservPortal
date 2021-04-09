<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <body>
        <div class="table-responsive">
            <table id="servicosExecutados" class="table table-hover table-condensed table-bordered text-center table-striped">
                <thead>
                    <tr>
                        <td>DESCRIÇÃO</td>
                        <td>VALOR</td>
                        <td>GARANTIA</td>
                        <td>REMOVER</td>
                    </tr>
                </thead>
                <?php
                $total = 0; 
                if (isset($_SESSION['servicosTemp'])) :
                    $i = 0;
                    foreach (@$_SESSION['servicosTemp'] as $key) {
                        $d = explode("||", @$key);
                        $idProduto = $d[0];
                        $estoque = $d[4];
                ?>
                        <tr>
                            <td><?php echo $d[1] ?></td>
                            <td><?php echo "R$ " . $d[2] ?></td>
                            <td><?php echo $d[5] ?></td>
                            <td>
                                <span class="btn btn-danger btn-sm" title="REMOVER" onclick="remover('<?php echo $i; ?>')">
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
            url: "./Procedimentos/Servicos/RemoverServicos.php",
            success: function(r) {
                $('#servicosExecutados').load('./Views/Servicos/Tabelas/ServicosExecutados.php');
                alertify.success("ITEM REMOVIDO");
            }
        });
    }
</script>