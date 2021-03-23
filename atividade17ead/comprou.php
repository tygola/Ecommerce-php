<!DOCTYPE html>
<html>
<head>
	<title>Livros</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	$servename = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bd_tiago_livros";


		$nome = $_POST["nome"];
		$cpf = $_POST["cpf"];
		$endereco = $_POST["endereco"];
		$num = $_POST["num"];
		$compl = $_POST["compl"];
		$cep = $_POST["cep"];
		$cidade = $_POST["cidade"];
		$estado = $_POST["estado"];
		$codigo = $_POST["codigo"];
		$quantidade = $_POST["quantidade"];
		$total = $_POST["total"];

$conn = new mysqli($servename,$username,$password,$dbname);

if ($conn->connect_error) {
	die("Falha ao conectar: " . $conn->connect_error);	
}

$sql = "SELECT * FROM clientes WHERE CPF = '$cpf'";
		$result = $conn->query($sql);
		if ($result->num_rows == 0) {
				$create = "INSERT INTO clientes (remetente,enderco,numero,compl,cep,cidade,cpf,estado) values('$nome','$endereco',$num,'$compl','$cep','$cidade','$cpf','$estado')";
				
				if ($conn->query($create) === TRUE) {
					echo "Cadastro Realizado com sucesso";
				}else{
					echo "Erro ao realizar cadastro" . $conn->error;
				}
			}	
		else{
			echo "Cliente já cadastrado";
			echo "<br>";
		}

		$selecionarCliente = "SELECT * FROM clientes WHERE CPF = $cpf";
		$resultado = $conn->query($selecionarCliente);

		$row = $result->fetch_assoc();
		$consultarLivros = "SELECT * FROM livros WHERE idlivro = " . $codigo;
		$consulta = $conn->query($consultarLivros);

		if ($consulta->num_rows > 0) {
			$linha = $consulta->fetch_assoc();
			$qtde_atual = $linha["qtdeestoque"];
			$qtde_final = $qtde_atual - $quantidade;

			$atualizarBanco = "UPDATE livros SET qtdeestoque = '$qtde_final' WHERE idlivro = '$codigo'";
			if($conn->query($atualizarBanco) == TRUE){
				$data = getdate(date("U"));
				$dcompra = "$data[mday]/$data[month]/$data[year]";

				$registrarCompra = "INSERT INTO vendas(datavenda,qtdevendida,idlivro,precototal) VALUES('$dcompra','$quantidade','$codigo','$total')";
				if($conn->query($registrarCompra) === TRUE){
					echo "<h1> Obrigado por comprar conosco</h1>";

				}else{
					echo "Erro ao cadastrar compra" . $conn->error;
				}


			}else{
				echo "Erro ao atualizar banco" . $conn->error;
			}
		}

	?>

	<br><br>
	<a href="index.php">Voltar</a>


</body>
</html>
<br><hr>
<footer style="text-align: center;">Tiago Camargo</footer>