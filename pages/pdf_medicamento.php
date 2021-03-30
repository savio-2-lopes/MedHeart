<?php	

	include_once("conexao.php");

	$html = '<table border=1';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>ID</th>';
	$html .= '<th>Medicamento</th>';
	$html .= '<th>Categoria</th>';
	$html .= '<th>Efeito</th>';
	$html .= '<th>Quantidade</th>';
	$html .= '<th>Preço</th>';
	$html .= '<th>Data de Validade</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	
	$res = "SELECT * FROM cad_medicamento";
	$sql = mysqli_query($conexao, $res);

	while($sql1 = mysqli_fetch_assoc($sql)){
		$html .= '<tr><td>'.$sql1['id'] 			. "</td>";
		$html .= '<td>'.$sql1['nome_medicamento'] 	. "</td>";
		$html .= '<td>'.$sql1['categoria'] 			. "</td>";
		$html .= '<td>'.$sql1['efeito'] 			. "</td>";
		$html .= '<td>'.$sql1['quantidade'] 		. "</td>";
		$html .= '<td>'.$sql1['preco'] 				. "</td>";
		$html .= '<td>'.$sql1['data_validade'] 		. "</td>";
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
			<h1 style="text-align: center;">MedHeart - Relatório dos Medicamentos</h1>
			'. $html .'
		');

	/************** Renderiza ********************/
	
	$dompdf->render();

	$dompdf->stream(
		"relatorio_medicamento.pdf", 
		array(
			"Attachment" => false 
		)
	);
?>