<?php	

	include_once("conexao.php");

	$html = '<table border=1';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>ID</th>';
	$html .= '<th>Título</th>';
	$html .= '<th>Data</th>';
	$html .= '<th>Paciente</th>';
	$html .= '<th>Horário</th>';
	$html .= '<th>Medicamento</th>';
	$html .= '<th>Anotações</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	
	$res = "SELECT * FROM cadprescricao";
	$sql = mysqli_query($conexao, $res);

	while($sql1 = mysqli_fetch_assoc($sql)){
		$html .= '<tr><td>'.$sql1['id'] 		. "</td>";
		$html .= '<td>'.$sql1['titulo'] 		. "</td>";
		$html .= '<td>'.$sql1['data'] 			. "</td>";
		$html .= '<td>'.$sql1['paciente'] 		. "</td>";
		$html .= '<td>'.$sql1['historico'] 		. "</td>";
		$html .= '<td>'.$sql1['medicamento'] 	. "</td>";
		$html .= '<td>'.$sql1['anotacoes'] 		. "</td>";
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
			<h1 style="text-align: center;">MedHeart - Relatório das Prescrições Médicas</h1>
			'. $html .'
		');

	/************** Renderiza ********************/
	
	$dompdf->render();

	$dompdf->stream(
		"relatorio_prescricao.pdf", 
		array(
			"Attachment" => false 
		)
	);
?>