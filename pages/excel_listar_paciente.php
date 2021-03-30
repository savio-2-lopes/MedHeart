<?php
	include("../conexao/conexao.php") ;

	$res = "SELECT `id`,`nome`,`telefone` FROM registro_paciente";

	$query = mysqli_query($conexao, $res);
	$numrows = mysqli_num_rows($query);

	$columnHeader ='';
	$columnHeader = "ID.no"."\t"."Nome"."\t"."Telefone"."\t"."Opcao"."\t";

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
	header("Content-Disposition: attachment; filename=Book record sheet.xls");
	header("Pragma: no-cache");
	header("Expires: 0");

	echo ucwords($columnHeader)."\n".$setData."\n";

?>
