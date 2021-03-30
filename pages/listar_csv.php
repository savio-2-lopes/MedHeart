<?php
	include("../conexao/conexao.php") ;
	
	$sql = "SELECT `id`,`nome`,`telefone` FROM registro_paciente";
	$query = mysqli_query($conexao, $sql);

	$numrows = mysqli_num_rows($query);
	
	$data = mysqli_fetch_all($query);
	
	function mysqli_fetch_all($query) 
	{
		$all = array();
		while ($all[] = mysqli_fetch_assoc($query)) 
		{
			$temp=$all;
		}
		return $temp;
	}
?>

<?php
 
	$fileName = 'example.csv';
	
	header('Content-Type: application/excel');
	header('Content-Disposition: attachment; filename="' . $fileName . '"');
	
	$fp = fopen('php://output', 'w');
	
	foreach ($data as $row)
	 {
		fputcsv($fp, $row);
	}
	 
	fclose($fp);
?>