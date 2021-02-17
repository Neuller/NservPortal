<?php
session_start();
if (isset($_SESSION['User'])) {
?>
<!DOCTYPE html>
<html>
	<body>
        <div class="tblVendas container">
            <div class="cabecalho bgGray">
                <div class="text-center textCabecalho opacidade">
					<h3><strong>PROCURAR VENDAS</strong></h3>
				</div>
            </div>
            <!-- TABELA -->
			<div class="row">
				<div class="col-sm-12 tabelas" align="center">
					<div id="tabelaVendas"></div>
				</div>
            </div>
        </div>
    </body>
</html>

<script type="text/javascript">
	$(document).ready(function() {
        $('#tabelaVendas').load('./Views/Vendas/TabelaVendas.php');
    });
</script>
<?php
} else {
    header("location: ./index.php");
}
?>