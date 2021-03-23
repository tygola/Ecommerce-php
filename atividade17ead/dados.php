<!DOCTYPE html>
<html>
<head>
	<title>Dados Pessoais</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo3.css">
</head>
<body>
	<form action="finaliza.php" method="POST">
		<fieldset>
		<legend>Endereço de entrega</legend>
		<p><label>Remetente:</label>
		<input type="text" name="nome" size="50" required>
		<p><label class="menores">CPF:</label>
		<input type="text" name="cpf" required></p>
		<p><label>Endereço:</label>
		<input type="text" name="endereco" size="86" required></p>
		<p><label>Numero:</label>
		<input type="text" name="num" size="4" required>
		<label class="menores">Compl.:</label>
		<input type="text" name="compl" size="30">
		<label class="menores">CEP:</label>
		<input type="text" name="cep" required></p>
		<p><label>Cidade:</label>
		<input type="text" name="cidade" required>
		<label class="menores">Estado:</label>
		<input type="text" name="estado" size="2" required></p>

	</fieldset>

	<?php
	$idlivro = $_POST["idlivro"];
	$qtdeestoque = $_POST["qtdeestoque"];
	echo "<input type='hidden' name='qtdeestoque' value='$qtdeestoque'";
	echo "<br>";
	echo "<button name='idlivro' value='$idlivro'> Comprar </button>";

	?>

	</form>
</body>
</html>
<br><hr>
<footer style="text-align: center;">Tiago Camargo</footer>