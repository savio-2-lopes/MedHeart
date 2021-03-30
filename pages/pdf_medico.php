<?php	

	include_once("conexao.php");

	$html = '<table border=1';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>ID</th>';
	$html .= '<th>Nome Médico</th>';
	$html .= '<th>Telefone</th>';
	$html .= '<th>Departamento</th>';
	$html .= '<th>Login</th>';
	$html .= '<th>Educação</th>';
	$html .= '<th>Experiência</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	
	$res = "SELECT * FROM cadmedico";
	$sql = mysqli_query($conexao, $res);

	while($sql1 = mysqli_fetch_assoc($sql)){
		$html .= '<tr><td>'.$sql1['id'] 		. "</td>";
		$html .= '<td>'.$sql1['nome_medico'] 	. "</td>";
		$html .= '<td>'.$sql1['telefone'] 		. "</td>";
		$html .= '<td>'.$sql1['departamento'] 	. "</td>";
		$html .= '<td>'.$sql1['login'] 			. "</td>";
		$html .= '<td>'.$sql1['educacao'] 		. "</td>";
		$html .= '<td>'.$sql1['experiencia'] 	. "</td>";
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
			<h1 style="text-align: center;">MedHeart - Relatório de Todos os médicos</h1>
			'. $html .'
		');

	/************** Renderiza ********************/
	
	$dompdf->render();

	$dompdf->stream(
		"relatorio_medico.pdf", 
		array(
			"Attachment" => false 
		)
	);
?>