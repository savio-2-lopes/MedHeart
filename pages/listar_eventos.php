<?php
/*
 * @author Cesar Szpak - Celke - cesar@celke.com.br
 * @pagina desenvolvida usando FullCalendar,
 * o código é aberto e o uso é free,
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 */

include 'conexao.php';

$query_events = "SELECT id, paciente, medico, horario, departamento,  data_inicial, data_final, status FROM agendamento";
$resultado_events = $con->prepare($query_events);
$resultado_events->execute();

$eventos = [];

while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $id = $row_events['id'];
    $paciente = $row_events['paciente'];
    $medico = $row_events['medico'];
    $data = $row_events['horario'];
	$data = $row_events['departamento'];
    $data_inicial = $row_events['data_inicial'];
    $data_final = $row_events['data_final'];
	$status = $row_events['status'];
	
    $eventos[] = [
        'id' => $id, 
        'paciente' => $paciente, 
        'medico' => $medico, 
        'horario' => $horario, 
		'departamento' => $departamento,
        'data_inicial' => $data_inicial, 
		'data_final' => $data_final, 
		'status' => $status, 
        ];
}

echo json_encode($eventos);