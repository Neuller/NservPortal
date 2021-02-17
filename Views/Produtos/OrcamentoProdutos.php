<?php
session_start();
if (isset($_SESSION['User'])) {
?>
<!DOCTYPE html>
<html>
    <body>
        <div class="container">
			<div class="cabecalho bgGray">
				<div class="text-center textCabecalho opacidade">
					<h3><strong>ORÇAMENTOS DE PRODUTOS</strong></h3>
				</div>
			</div>

			<!-- COMPUTADOR CELERON G4930 -->
			<div id="celeron" class="orcamentos">
				<article>
					<div class="text-center">
						<a href="#">
							<img class="img-responsive img-thumbnail" src="./Img/Produtos/iconPDF.png" width="100px" height="100px">
						</a>
					</div>
					<div class="text-center">
						<section class="conteudoOrcamentos">
							<span>COMPUTADOR CELERON G4930</span>
						</section>
					</div>
				</article>
			</div>
			<!-- COMPUTADOR CORE I3 9º GE -->
			<div id="corei3" class="orcamentos">
				<article>
					<div class="text-center">
						<a href="#">
							<img class="img-responsive img-thumbnail" src="./Img/Produtos/iconPDF.png" width="100px" height="100px">
						</a>
					</div>
					<div class="text-center">
						<section class="conteudoOrcamentos">
							<span>COMPUTADOR CORE I3 9º GE</span>
						</section>
					</div>
				</article>
			</div>
			<!-- COMPUTADOR CORE I5 9º GE -->
			<div id="corei5" class="orcamentos">
				<article>
					<div class="text-center">
						<a href="#">
							<img class="img-responsive img-thumbnail" src="./Img/Produtos/iconPDF.png" width="100px" height="100px">
						</a>
					</div>
					<div class="text-center">
						<section class="conteudoOrcamentos">
							<span>COMPUTADOR CORE I5 9º GE</span>
						</section>
					</div>
				</article>
			</div>
		</div>
	</body>
</html>

<script type="text/javascript">
    $(document).ready(function() {
    });

	$("#celeron").click(function(e) {
	window.open("./Views/Produtos/Orcamentos/CPU CELERON G4930.pdf");
	});

	$("#corei3").click(function(e) {
	window.open("./Views/Produtos/Orcamentos/CPU CORE I3 9GE.pdf");
	});

	$("#corei5").click(function(e) {
	window.open("./Views/Produtos/Orcamentos/CPU CORE I5 9GE.pdf");
	});
</script>
<?php
} else {
    header("location: ./index.php");
}
?>