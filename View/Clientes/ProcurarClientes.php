<?php
session_start();
if (isset($_SESSION["User"])) {
?>
<!DOCTYPE html>
<html>

<body>
    <div class="tblClientes container">
        <div class="cabecalho bgGray">
            <div class="text-center textCabecalho opacidade">
                <h3><strong>PROCURAR CLIENTES</strong></h3>
            </div>
        </div>
        <!-- TABELA DE CLIENTES -->
        <div class="row">
            <div class="col-sm-12 tabelas" align="center">
                <div id="tabelaClientes"></div>
            </div>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
$(document).ready(function($) {
    $("#tabelaClientes").load("./View/Clientes/TabelaClientes.php");
});

function visualizarCliente(idCliente) {
    $("#conteudo").load("./View/Clientes/VisualizarCliente.php?id=" + idCliente);
}
/** METODO EXCLUIR CLIENTE */
function excluirCliente(idCliente) {
    alertify.confirm("ATENÇÃO", "DESEJA EXCLUIR O REGISTRO?", function() {
        $.ajax({
            type: "POST",
            data: {
                "idCliente": idCliente
            },
            url: "./Controller/Clientes/ValidarExcluirCliente.php",
            success: function(r) {
                data = $.parseJSON(r);
                if (data == 0) {
                    $.ajax({
                        type: "POST",
                        data: "idCliente=" + idCliente,
                        url: "./Controller/Clientes/ExcluirCliente.php",
                        success: function(r) {
                            if (r == 1) {
                                $("#tabelaClientes").load(
                                    "./View/Clientes/TabelaClientes.php");
                                alertify.success("SUCESSO");
                            } else {
                                alertify.error("ERRO");
                            }
                        }
                    });
                } else {
                    alertify.error("NAO E POSSIVEL EXCLUIR");
                }
            }
        });
    }, function() {}).set({
        labels: {
            ok: "SIM",
            cancel: "NÃO"
        }
    });
}
</script>
<?php
} else {
	header("location:./index.php");
}
?>