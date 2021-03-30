<?php
	$dbuser="root";
	$dbpass="";
	$host="localhost";

	$dbname = "hospital";
	$mysqli = new mysqli($host, $dbuser, $dbpass, $dbname);
	
	if(!empty($_POST['nome_medicamento']))
	{
		$nome_medicamento=$_POST['nome_medicamento'];
		$result ="SELECT count(*) FROM cad_medicamento WHERE nome_medicamento=?";
		$stmt = $mysqli->prepare($result);
		$stmt->bind_param('s',$nome_medicamento);
		$stmt->execute();
		$stmt->bind_result($count);
		$stmt->fetch();
		$stmt->close();

	if($count>0)
		echo "<span style='color:red'> Medicamentos já cadastrado.</span>";
	}
?>

