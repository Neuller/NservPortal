<html>

<body>
    <div class="col-md-12 col-sm-12 col-xs-12 separador">
        <div class="text-left">
            <h4><strong>INFORMAÇÕES DE PAGAMENTO</strong></h4>
        </div>
        <hr>
    </div>
    <!-- FORMA DE PAGAMENTO -->
    <div class="col-xs-12 col-md-12 col-sm-12 itensFormulario">
        <div>
            <label>FORMA DE PAGAMENTO</label>
            <select class="form-control input-sm" id="formaPagamento" name="formaPagamento">
                <option value="">SELECIONE UMA FORMA DE PAGAMENTO</option>
                <option value="CREDITO">CARTÃO DE CREDITO</option>
                <option value="DEBITO">CARTÃO DE DÉBITO</option>
                <option value="DINHEIRO">DINHEIRO</option>
                <option value="PIX">PIX</option>
                <option value="TRANSFERENCIA">TRANSFERÊNCIA</option>
            </select>
        </div>
    </div>
    <!-- VALOR DE TERCEIRO -->
    <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
        <div>
            <label>VALOR DE TERCEIRO</label>
            <input type="number" class="form-control text-uppercase valorTerceiro input-sm" id="valorTerceiro" name="valorTerceiro" maxlenght="10">
        </div>
    </div>
    <!-- VALOR TOTAL DO SERVIÇO -->
    <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
        <div>
            <label>VALOR TOTAL DO SERVIÇO</label>
            <input type="number" readonly class="form-control text-uppercase input-sm" id="valorTotalServico" name="valorTotalServico" maxlenght="10">
        </div>
    </div>
    <!-- DESCONTOS -->
    <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
        <div>
            <label>DESCONTOS</label>
            <input type="number" class="form-control input-sm text-uppercase" id="desconto" name="desconto" maxlenght="10">
        </div>
    </div>
    <!-- VALOR TOTAL -->
    <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
        <div>
            <label>VALOR TOTAL A SER PAGO</label>
            <input type="number" readonly class="form-control text-uppercase input-sm" id="valorTotal" name="valorTotal" maxlenght="10">
        </div>
    </div>
    <!-- VALOR DO PAGAMENTO -->
    <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
        <div>
            <label>VALOR DO PAGAMENTO</label>
            <input type="number" class="form-control input-sm text-uppercase" id="valorPagamento" name="valorPagamento" maxlenght="10">
        </div>
    </div>
    <!-- TROCO -->
    <div class="col-md-4 col-sm-4 col-xs-4 itensFormulario troco">
        <div>
            <label>TROCO</label>
            <input readonly type="number" class="form-control input-sm text-uppercase" id="troco" name="troco" maxlenght="10">
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        setEvents();
        atualizarValorTotal();
    });

    function setEvents() {
        $("#desconto").change(function() {
            calcularValorTotal();
            calcularTroco();
        });

        $("#valorPagamento").change(function() {
            calcularTroco();
        });
    }

    function calcularTroco() {
        let valorPagamento = parseFloat($("#valorPagamento").val());
        let valorTotal = parseFloat($("#valorTotal").val());
        let troco = 0;

        if (valorPagamento < valorTotal) {
            alertify.error("VALOR INCORRETO");
            $("#valorPagamento").val("");
            $("#troco").val("");
            return false;
        } else {
            troco = valorPagamento - valorTotal;
            $("#troco").val(troco.toFixed(2));
        }
    }

    function calcularValorTotal() {
        let valorTotalServico = parseFloat($("#valorTotalServico").val());
        let desconto = parseFloat($("#desconto").val());
        let valorTotal = 0;
        valorTotal = valorTotalServico - desconto;
        $("#valorTotal").val(valorTotal.toFixed(2));
    }
</script>