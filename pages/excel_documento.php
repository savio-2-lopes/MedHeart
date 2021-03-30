<?php
	include("conexao.php") ;
	
	$res =	"SELECT * FROM cadpaciente";
	$query = mysqli_query($conexao, $res);
	$numrows = mysqli_num_rows($query);

	$columnHeader ='';
	$columnHeader = "ID"."\t"."Paciente"."\t"."Paciente"."\t"."Titulo"."\t"."Arquivo"."\t";

	$setData='';

	while($rec = mysqli_fetch_assoc($query))
	{
		$rowData = '';
		foreach($rec as $value)
		{
			$value = '"' . $value . '"' . "\t";
			$rowData .= $value;
		}
		$setData .= trim($rowData)."\n";
	}


	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=relatório.xlsx");
	header("Pragma: no-cache");
	header("Expires: 0");

	echo ucwords($columnHeader)."\n".$setData."\n";

?>
