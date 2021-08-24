<?php
session_start();
if (isset($_SESSION["User"])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <?php require_once "../../Classes/Conexao.php";
        $c = new conectar();
        $conexao = $c->conexao();
        ?>
    </head>
    <html>

    <body>
        <div class="col-md-12 col-sm-12 col-xs-12 separador">
            <div class="text-left">
                <h4><strong>SERVIÇOS</strong></h4>
            </div>
            <hr>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
            <div>
                <label>SERVIÇOS</label>
                <select class="form-control input-sm" id="servicoSelect" name="servicoSelect">
                    <option value="">SELECIONE UM SERVIÇO</option>
                    <?php
                    $sql = "SELECT id_preco_servico, descricao, garantia, valor FROM preco_servicos ORDER BY id_preco_servico DESC";
                    $result = mysqli_query($conexao, $sql);
                    while ($servico = mysqli_fetch_row($result)) :
                    ?>
                        <option value="<?php echo $servico[0] ?>"><?php echo $servico[1] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
        <!-- QUANTIDADE -->
        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
            <div>
                <label>QUANTIDADE</label>
                <input type="number" class="form-control input-sm estoque text-uppercase" id="qtdServico" name="qtdServico">
            </div>
        </div>
        <!-- VALOR DA UNIDADE -->
        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
            <div>
                <label>VALOR DA UNIDADE</label>
                <input type="number" class="form-control input-sm text-uppercase" id="precoServico" name="precoServico">
            </div>
        </div>
        <!-- ADICIONAR AO CARRINHO - SERVICOS -->
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="btnRight">
                <span class="btn btn-success btn-lg" id="btnAdicionarServico" title="ADICIONAR">ADICIONAR</span>
            </div>
        </div>
        <!-- TABELA SERVICOS -->
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div align="center">
                <div id="carrinhoServicos"></div>
            </div>
        </div>
        <!-- VALOR TOTAL DE SERVIÇOS -->
        <div class="col-xs-4 col-md-4 col-sm-4 itensFormulario">
            <div>
                <label>VALOR TOTAL DE SERVIÇOS</label>
                <input readonly type="number" class="form-control input-sm text-uppercase" id="totalServicos" name="totalServicos">
            </div>
        </div>
    </body>

    </html>

    <script type="text/javascript">
        $(document).ready(function() {
            initForm();
        });

        function initForm(){
            $("#carrinhoServicos").load("./Views/Componentes/Tabelas/CarrinhoServicos.php");
        }
    </script>

<?php
} else {
    header("location:./index.php");
}
?>