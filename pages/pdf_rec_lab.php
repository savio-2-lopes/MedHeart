<?php	

	include_once("conexao.php");

	$html = '<table border=1';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>ID</th>';
	$html .= '<th>Laboratório</th>';
	$html .= '<th>Paciente</th>';
	$html .= '<th>Prescrição</th>';
	$html .= '<th>Quantidade</th>';
	$html .= '<th>Data</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	
	$res = "SELECT * FROM requisicao_lab";
	$sql = mysqli_query($conexao, $res);

	while($sql1 = mysqli_fetch_assoc($sql)){
		$html .= '<tr><td>'.$sql1['id'] 		. "</td>";
		$html .= '<td>'.$sql1['lab'] 		. "</td>";
		$html .= '<td>'.$sql1['paciente'] 		. "</td>";
		$html .= '<td>'.$sql1['prescricao'] 	. "</td>";
		$html .= '<td>'.$sql1['quantidade'] 	. "</td>";
		$html .= '<td>'.$sql1['data'] 			. "</td>";
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
			<h1 style="text-align: center;">MedHeart - Relatório das requisições de laboratório</h1>
			'. $html .'
		');

	/************** Renderiza ********************/
	
	$dompdf->render();

	$dompdf->stream(
		"relatorio_historico_lab.pdf", 
		array(
			"Attachment" => false 
		)
	);
?>