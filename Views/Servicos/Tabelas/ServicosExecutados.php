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
                    <td>QUANTIDADE</td>
                    <td>VALOR UN</td>
                    <td>REMOVER</td>
                </tr>
            </thead>
            <?php
            $total = 0;
            if (isset($_SESSION["servicosTemp"])) :
                $i = 0;
                foreach (@$_SESSION["servicosTemp"] as $key) {
                    $d = explode("||", @$key);
                    $idProduto = $d[0];
            ?>
                    <tr>
                        <td class="descricao"><?php echo $d[1] ?></td>
                        <td><?php echo $d[2] ?></td>
                        <td><?php echo "R$ " . $d[3] ?></td>
                        <td>
                            <span class="btn btn-danger btn-md" title="REMOVER" onclick="removerServico('<?php echo $i; ?>')">
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
        $("#totalServicos").val(total);
        atualizarValorTotal();
    });

    function removerServico(index) {
        $.ajax({
            type: "POST",
            data: "index=" + index,
            url: "./Procedimentos/Servicos/RemoverServicos.php",
            success: function(r) {
                $("#servicosExecutados").load("./Views/Servicos/Tabelas/ServicosExecutados.php");
                atualizarValorTotal();
                alertify.success("SERVIÇO REMOVIDO");
            }
        });
    }

    function atualizarCampoAuxServicos() {
        console.log("atualizarCampoAuxServicos");
        var content = $("#servicosExecutados").closest('tr').find('td').text();
        $("#dadosTblServicos").val(content);
        console.log("content:" + content);
    }
</script>