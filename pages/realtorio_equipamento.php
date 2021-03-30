<?php	

	include_once("conexao.php");

	$html = '<table border=1';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>ID</th>';
	$html .= '<th>Nome do Equipamento</th>';
	$html .= '<th>Categoria do Medicamento</th>';
	$html .= '<th>Uso Clinico</th>';
	$html .= '<th>Data de Validade</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	
	$res = "SELECT * FROM cad_equipamento";
	$sql = mysqli_query($conexao, $res);

	while($sql1 = mysqli_fetch_assoc($sql))
	{
		$html .= '<tr><td>'.$sql1['id'] . "</td>";
		$html .= '<td>'.$sql1['nome_equipamento'] . "</td>";
		$html .= '<td>'.$sql1['categoria'] . "</td>";
		$html .= '<td>'.$sql1['clinico'] . "</td>";
		$html .= '<td>'.$sql1['data_validade'] . "</td>";
	}
	$html .= '</tbody>';
	$html .= '</table';

	use Dompdf\Dompdf;

	/************** Requer a instância ********************/
	
	require_once("dompdf/autoload.inc.php");

	/************** criando instância ********************/
	
	$dompdf = new DOMPDF();

	/************** HTML ********************/
	
	$dompdf->load_html('
			<h1 style="text-align: center;">MedHeart - Relatório de Equipamento</h1>
			'. $html .'
		');

	/************** Renderiza ********************/
	
	$dompdf->render();

	$dompdf->stream(
		"relatorio_equipamento.pdf", 
		array(
			"Attachment" => false 
		)
	);
?>