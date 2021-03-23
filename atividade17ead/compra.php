<!DOCTYPE html>
<html>
<head>
	<title>Livros</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo2.css">
</head>
<body  bgcolor="Gainsboro">
		<?php
		$servename = "localhost";
		$username = "root";
		$password = "";
		$dbname = "bd_tiago_livros";

$conn = new mysqli($servename,$username,$password,$dbname);

if ($conn->connect_error) {
	die("Falha ao conectar: " . $conn->connect_error);	
}


$sql = "SELECT * FROM livros WHERE idlivro = " . $_POST["idlivro"];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	
	echo "<form action='dados.php' method='POST'>";
	while ($row = $result->fetch_assoc()) {	
			echo "<div><h1>". $row["titulolivro"]."</h1>";
			echo "<div id='imagem'>";	
			echo "<img src='imagens\\". $row["imagem"] . " ' height='300'>";
			echo "</div>";
			echo "<div id='descricao'>";
			echo "<b style='font-size:20px;line-height:30px;'>Autor/Autores:</b><br>";
			echo " " . $row["autoreslivro"] . "<br>";
			echo "<br>";
			echo "<b style='font-size:20px;line-height:20px;'>Quantidade de paginas: " . $row["qtdepaginas"] . "</b><br>";
			echo "<br>";
			echo "<b style='font-size:35px;line-height:40px;'>Preço: R$ " . $row["precolivro"] . "</b><br>";
			echo "<br>";
			$qtdeestoque = $row["qtdeestoque"];
			echo "Quantidade: <select name='qtdeestoque'>";
			for ($i=1; $i <= $qtdeestoque ; $i++) { 
				echo "<option>$i</option>";
			}
			echo "</select>";
			echo "<br><br>";
			echo "<button name='idlivro' value='" . $row["idlivro"] . "'> Comprar </button>";
			echo "</div>";
			echo "</div>";

		
	}
	echo "</form>";
}
else
{
	echo "0 resultados";
}
$conn->close();
		

		?>

		<div class="footer">
			<hr>
<footer style="text-align: center;">Tiago Camargo</footer>
</div>
</body>
</html>
