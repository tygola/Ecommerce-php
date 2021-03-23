<!DOCTYPE html>
<html>
<head>
	<title>Livros</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body bgcolor="Gainsboro">
		<h1>Livros</h1>
		<hr>

		<?php
$servename = "localhost";
$username = "root";
$password = "";
$dbname = "bd_tiago_livros";

$conn = new mysqli($servename,$username,$password,$dbname);



if ($conn->connect_error) {
	die("Falha ao conectar: " . $conn->connect_error);	
}


$sql = "SELECT * FROM livros";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	
	echo "<form action='compra.php' method='POST'>";
	while ($row = $result->fetch_assoc()) {
		if ($row["qtdeestoque"] > 0) {
			
			echo "<div>";
			echo $row["titulolivro"];
			echo "<br>";
			echo $row["autoreslivro"];
			echo "<br>";
			echo "<img src='imagens\\". $row["imagem"] . " ' height='150'>";
			echo "<br>";
			echo $row["qtdepaginas" ] . " paginas";
			echo "<br>";
			echo "R$ ". $row["precolivro"];
			echo "<br>";
			//echo "<input type='image' src ='imagens/comprar.png' name='idlivro'value='". $row["qtdeestoque"] . "' height='32'>";
			echo "<button name='idlivro' value='" . $row["idlivro"] . "'> Comprar </button>";
			echo "</div>";

		}
			else {
			echo "<div>";
			echo $row["titulolivro"];
			echo "<br>";
			echo $row["autoreslivro"];
			echo "<br>";
			echo "<img src='imagens\\". $row["imagem"] . " ' height='150'>";
			echo "<br>";
			echo $row["qtdepaginas" ] . " paginas";
			echo "<br>";
			echo "R$ ". $row["precolivro"];
			echo "<br>";
			echo "<button disabled name='qtdeestoque' value='" . $row["idlivro"] . "'> <del style='color:red;'>Indisponivel</del> </button>";
			echo "</div>";
	}
		
		}
		
	echo "</form>";
}
else
{
	echo "0 resultados";
}


$conn->close();
?>
<br>
</body>
</html>

