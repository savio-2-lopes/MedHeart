<?php
	include("../conexao/conexao.php") ;
	
	$sql = 
	$query = mysqli_query("SELECT `id`, `data`, `paciente`, `descricao` FROM `adicionar_historico_medico`");
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
	
	foreach ($data as $row)
	{
		fputcsv($fp, $row);
	}
 
	fclose($fp);
?>