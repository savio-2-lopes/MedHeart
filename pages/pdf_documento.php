<?php	
		include_once("conexao.php");

		$html = '<table border=2';	
		$html .= '<thead>';
		$html .= '<tr>';
		$html .= '<th>Id</th>';
		$html .= '<th>Primeiro Nome</th>';
		$html .= '<th>Último Nome</th>';
		$html .= '<th>Gênero</th>';
		$html .= '<th>Data Nascimento</th>';
		$html .= '<th>Tipo Sanguineo</th>';
		$html .= '<th>Religião</th>';
		$html .= '<th>Telefone</th>';
		$html .= '<th>Email</th>';
		$html .= '</tr>';
		$html .= '</thead>';
		$html .= '<tbody>';

		$res = "SELECT * FROM cadpaciente";
		$sql = $conexao->query($res);
		
		while($sql1 = mysqli_fetch_assoc($sql))
		{
			$html .= '<tr><td>'	.$sql1['id']				. "</td>";
			$html .= '<td>'		.$sql1['primeiro_nome'] 	. "</td>";
			$html .= '<td>'		.$sql1['ultimo_nome'] 		. "</td>";
			$html .= '<td>'		.$sql1['genero'] 			. "</td>";
			$html .= '<td>'		.$sql1['data_nascimento'] 	. "</td>";
			$html .= '<td>'		.$sql1['tipo_sanguineo'] 	. "</td>";
			$html .= '<td>'		.$sql1['religiao'] 			. "</td>";
			$html .= '<td>'		.$sql1['telefone'] 			. "</td>";
			$html .= '<td>'		.$sql1['email'] 			. "</td>";
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