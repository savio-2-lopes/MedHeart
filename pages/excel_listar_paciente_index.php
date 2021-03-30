<?php

	include("../conexao/conexao.php") ;
	
	$res = "SELECT `id`,`nome`,`telefone` FROM `registro_paciente`";
	$query = mysqli_query($conexao, $res);
	
	$numrows = mysqli_num_rows($query);

?>

<html>
	<head>
		<title>Formas de Pagamentos</title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	
	<body>
		<div class="container">
			<div class="panel">
				<div class="panel-heading">
					<h3>Formas de Pagamentos</h3>
						<div class="panel-body">
							<table border="1" class="table table-bordered table-striped">
								<tr>
								  <th>ID</th>
								  <th>Nome</th>
								  <th>Telefone</th>
								  <th>Opção</th>
								</tr>

								<?php
									while($row = mysqli_fetch_assoc($query))
									{
										echo '
											<tr>
											  <td>'.$row["id"].'</td>
											  <td>'.$row["nome"].'</td>
											  <td>'.$row["telefone"].'</td>
											</tr>
											';
									}
								  ?>
							</table>
								<a href="excel_listar_paciente.php">
									Exportar para Excel
								</a>

						</div>
				</div>

			</div>

		</div>
	</body>
</html>
