<?php
session_start();
if (isset($_SESSION["User"])) {
?>
    <!DOCTYPE html>
    <html>

    <body>
        <div class="container">
            <div class="cabecalho bgGray">
                <div class="text-center textCabecalho opacidade">
                    <h3><strong>PROCURAR PRODUTOS</strong></h3>
                </div>
            </div>

            <div class="divFormulario">
                <div class="mx-auto">
                    <form id="frmProcurarProdutos">
                        <div>
                            <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <label>SELECIONE UMA CATEGORIA</label>
                                <select class="form-control input-sm" id="categoria" name="categoria">
                                    <option value=""></option>
                                    <option value="hardDisk">HARD DISK (HD)</option>
                                    <option value="memoria">MEMÓRIA</option>
                                    <option value="placaVideo">PLACA DE VÍDEO</option>
                                    <option value="placaMae">PLACA MÃE</option>
                                    <option value="processador">PROCESSADOR</option>
                                    <option value="gabinete">GABINETE</option>
                                    <option value="monitor">MONITOR</option>
                                    <option value="impressora">IMPRESSORA</option>
                                    <option value="outros">OUTROS</option>
                                </select>
                            </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="tabelas" align="center">
                    <div id="tabelaProdutos"></div>
                </div>
            </div>
    </body>

    </html>

    <script type="text/javascript">
        $(document).ready(function($) {
            atualizarTabela();
        });

        $("#categoria").change(function() {
            atualizarTabela();
        });

        function visualizarProdutos(idProduto) {
        $("#conteudo").load("./Views/Produtos/VisualizarProdutos.php?id="+idProduto);
    }
        
    function excluirProduto(idProduto) {
        alertify.confirm("ATENÇÃO", "DESEJA EXCLUIR O PRODUTO?", function() {
             $.ajax({
                type: "POST",
                data: "idProduto=" + idProduto,
                url: "./Procedimentos/Produtos/ExcluirProduto.php",
                success: function(r) {
                    if (r == 1) {
                        atualizarTabela();
                        alertify.success("PRODUTO EXCLUÍDO");
                        } else {
                            atualizarTabela();
                            alertify.error("NÃO FOI POSSÍVEL O PRODUTO");
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

        function atualizarTabela(){
            let categoria = $("#categoria").val();
            $("#tabelaProdutos").load("./Views/Produtos/TabelaProdutos.php?categoria=" + categoria);
        }
    </script>
<?php
} else {
    header("location:./index.php");
}
?>