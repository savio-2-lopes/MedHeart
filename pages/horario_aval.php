<?php
	$dbuser	=	"root";
	$dbpass	=	"";
	$host	=	"localhost";

	$dbname = "hospital";
	$mysqli = new mysqli($host, $dbuser, $dbpass, $dbname);
	
	if(!empty($_POST['data']))
	{
		$data	=	$_POST['data'];
		$result =	"SELECT count(*) FROM cad_prescricao WHERE data=?";
		$stmt 	= 	$mysqli->prepare($result);
		$stmt->bind_param('s',$data);
		$stmt->execute();
		$stmt->bind_result($count);
		$stmt->fetch();
		$stmt->close();

	if($count>0)
		echo "<span style='color:red'> Agendamento existente nessa data.</span>";
	}
?>

