<!DOCTYPE html>
<html>
<head>
	<title>Livros</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo4.css">
</head>
<body>
<?php
$servename = "localhost";
$username = "root";
$password = "";
$dbname = "bd_tiago_livros";


$idlivro = $_POST["idlivro"];
$qtdeestoque = $_POST["qtdeestoque"];

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$endereco = $_POST["endereco"];
$num = $_POST["num"];
$compl = $_POST["compl"];
$cep = $_POST["cep"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];


$conn = new mysqli($servename,$username,$password,$dbname);


if ($conn->connect_error) {
	die("Falha ao conectar: " . $conn->connect_error);	
}
$sql = "SELECT * FROM livros WHERE idlivro = " . $idlivro;
$result = $conn->query($sql);
echo "<h2>Confira as informações</h2>";
echo "<br><b>Dados do produto</b><br>";
echo "<table border=1 width='70%'>";
echo "<tr>";
echo "<th  width='50%'>Produtos</th>";
echo "<th  width='10%'>Qtde</th>";
echo "<th  width='20%'>Preço</th>";
echo "<th>Total</th>";
echo "</tr>";

if ($result->num_rows > 0)
{
	echo "<form action='comprou.php' method='POST'>";
	$row = $result->fetch_assoc();

	echo "<tr><td>";
	echo $row["titulolivro"];
	echo "</td><td>"; 
	echo $qtdeestoque;
	echo "</td><td>";
	$precolivro  = $row["precolivro"];
	echo "R$ " 	. number_format($precolivro,2,',','.');
	$total = "R$ " . number_format($precolivro * $qtdeestoque,2,',','.');
	echo "</td><td>";
	echo $total;
	echo "</td></tr></table>";

	echo "<br><b>dados cliente:<b><br>";
	echo "<table  width='70%'><tr><td colspan='3'>";
	echo "Nome: " . $_POST["nome"];
	echo "</td></tr><tr><td colspan='3'>";
	echo "Endereço: " . $_POST["endereco"];
	echo ", Nº: " . $_POST["num"];
	echo " " . $_POST["compl"];
	echo "</tr></td><tr><td>";
	echo "CEP: " . $_POST["cep"] . "</td><td>";
	echo "Cidade: " . $_POST["cidade"] . "</td><td>";
	echo "Estado: " . $_POST["estado"] . "</td></tr></table>";
	echo "<br><br>";
	echo "<input type='hidden' name='quantidade' value='$qtdeestoque'>";
	echo "<input type='hidden' name='nome' value='$nome'>";
	echo "<input type='hidden' name='cpf' value='$cpf'>";
	echo "<input type='hidden' name='endereco' value='$endereco'>";
	echo "<input type='hidden' name='num' value='$num'>";
	echo "<input type='hidden' name='compl' value='$compl'>";
	echo "<input type='hidden' name='cep' value='$cep'>";
	echo "<input type='hidden' name='cidade' value='$cidade'>";
	echo "<input type='hidden' name='estado' value='$estado'>";
	echo "<input type='hidden' name='total' value='" . $precolivro * $qtdeestoque ." '>";
	echo "<button name='codigo' value='" . $row["idlivro"] . "'>Finalizar compra</button>";
	echo "</form>";
}
else
{
	echo "0 Resultados: " . $conn->error;
}
$conn->close();

	?>
</body>
</html>
<br><hr>
<footer style="text-align: center;">Tiago Camargo</footer>