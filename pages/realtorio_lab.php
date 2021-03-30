<?php	

	include_once("conexao.php");

	$html = '<table border=1';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>ID</th>';
	$html .= '<th>Tipo de Lab</th>';
	$html .= '<th>Medico responsavel</th>';
	$html .= '<th>Qunatidade</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	
	$res = "SELECT * FROM cad_lab";
	$sql = mysqli_query($conexao, $res);

	while($sql1 = mysqli_fetch_assoc($sql)){
		$html .= '<tr><td>'.$sql1['id'] . "</td>";
		$html .= '<td>'.$sql1['tipo_lab'] . "</td>";
		$html .= '<td>'.$sql1['medico'] . "</td>";
		$html .= '<td>'.$sql1['quantidade'] . "</td>";
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
			<h1 style="text-align: center;">MedHeart - Relatório de Pacientes</h1>
			'. $html .'
		');

	/************** Renderiza ********************/
	
	$dompdf->render();

	$dompdf->stream(
		"relatorio.pdf", 
		array(
			"Attachment" => false 
		)
	);
?>