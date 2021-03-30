<?php
	session_start ();
	if (!(isset ( $_SESSION ['login'] ))) 
	{
		header ( 'location:../index.php' );
	}
	include('conexao.php'); //Importando conexão com o database
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title> MedHeart </title>
		<link rel = "shortcut icon" href = "img/ico_hospital.png" />
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<!---- Titulo --->
		<title>Requisições</title>
		
		<!---- Bootstrap --->
		<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		
		<!---- Metis Menu--->
		<link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
		
		<!---- Custom Theme --->
		<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
		
		<!---- styles (geral) --->
		<link rel="stylesheet" href="css/style.css">
		
		<link rel = "stylesheet" type = "text/css" href = "search.css" />

		<!---- font awesome --->
		<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<form method="post" ><br><br>
			<div id="wrapper">
				
				<!--- Leftbar --->
				<?php include('leftbar.php');?>
				<?php include('../config/header.php');?>
				
				<br>
				
				<div id="page-wrapper"><br><br>
													
					<!--------------- Exibindo Pacientes -------------->
					
					<div class="col-sm-6 col-lg-3">
						<div class="card text-white bg-flat-color-4">
							<div class="card-body pb-0">
								<div class="dropdown float-right">
									
									&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										
									<a href="ver_paciente.php">
										<p class="fa fa-cog" alt = "Editar" style="color:#fff"></p>
									</a>
								</div>
								
								<!------ Selecionando dados do paciente do DB ------>
								
								<?php 
									$res = "Select * from  cadpaciente";
									$query = mysqli_query($conexao, $res);
									$contador = mysqli_num_rows($query);
								?>
								
								<!------ Contador ------>
																
								<h4 class="mb-0">
									<span class="count" style="font-size:25px;color:#fff">
										<?php echo $contador;?>
									</span>
								</h4>
										
								<p class="text-light">
									<span id="" style="color:#fff">
										Pacientes cadastrados
									</span>
								</p>

								<div class="chart-wrapper px-3" style="height:23px;" height="70">
									<canvas id="widgetChart4"></canvas>
								</div>	
							</div>
						</div>
					</div>
						
					<!--------------- Exibindo Médicos -------------->
					
					<div class="col-sm-6 col-lg-3">
						<div class="card text-white bg-flat-color-1">
							<div class="card-body pb-0">
								<div class="dropdown float-right">
									
									&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										
									<a href="ver_medico.php">
										<p class="fa fa-cog" alt = "Editar" style="color:#fff"></p>
									</a>
								</div>
								
								<!------ Selecionando dados do médico do DB ------>
								
								<?php 
									$res = "Select * from  cadmedico";
									$query = mysqli_query($conexao, $res);
									$contador = mysqli_num_rows($query);
								?>
								
								<!------ Contador ------>
																
								<h4 class="mb-0">
									<span class="count" style="font-size:25px;color:#fff">
										<?php echo $contador;?>
									</span>
								</h4>
										
								<p class="text-light">
									<span id="" style="color:#fff">
										Médicos cadastrados
									</span>
								</p>

								<div class="chart-wrapper px-3" style="height:23px;" height="70">
									<canvas id="widgetChart4"></canvas>
								</div>	
							</div>
						</div>
					</div>
						
					<!--------------- Exibindo Convênios -------------->
					
					<div class="col-sm-6 col-lg-3">
						<div class="card text-white bg-flat-color-5">
							<div class="card-body pb-0">
								<div class="dropdown float-right">
									
									&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										
									<a href="ver_convenio.php">
										<p class="fa fa-cog" alt = "Editar" style="color:#fff"></p>
									</a>
								</div>
								
								<!------ Selecionando dados do convenio do DB ------>
								
								<?php 
									$res = "Select * from  convenio";
									$query = mysqli_query($conexao, $res);
									$contador = mysqli_num_rows($query);
								?>
								
								<!------ Contador ------>
																
								<h4 class="mb-0">
									<span class="count" style="font-size:25px;color:#fff">
										<?php echo $contador;?>
									</span>
								</h4>
										
								<p class="text-light">
									<span id="" style="color:#fff">
										Convênios cadastrados
									</span>
								</p>

								<div class="chart-wrapper px-3" style="height:23px;" height="70">
									<canvas id="widgetChart4"></canvas>
								</div>	
							</div>
						</div>
					</div>
					<!------------- Exibindo Labs ------------->
						
					<div class="col-sm-6 col-lg-3">
						<div class="card text-white bg-flat-color-2">
							<div class="card-body pb-0">
								<div class="dropdown float-right"> 
										
									&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										
									<a href="ver_lab.php">
										<p class="fa fa-cog" alt = "Editar" style="color:#fff"></p>
									</a>
								</div>
                        
								<!------ Selecionar dados do lab no DB ------>
												
								<?php 
									$res = "Select * from  cad_lab";
									$query = mysqli_query($conexao, $res);
									$contador = mysqli_num_rows($query);
								?>
									
								<!------ Contador ------>
												
								<h4 class="mb-0">
									<span class="count" style="font-size:25px;color:#fff">
										<?php echo $contador;?>
									</span>
								</h4>
										
								<p class="text-light">
									<span id="" style="color:#fff">
										Laboratórios Disponíveis
									</span>
								</p>

								<div class="chart-wrapper px-3" style="height:23px;" height="70">
									<canvas id="widgetChart4"></canvas>
								</div>	
							</div>
						</div>
					</div><br><br><br><br><br><br><br>
					
					<div class="form-group">	
						<div class="col-lg-5">
							<div id="piechart" style="width: 500px; height: 400px;">
							
								<?php 
									$res = "Select * from  cadpaciente";
									$resultado = mysqli_query($conexao, $res);
									
									$cont_feminino 	= 0;
									$cont_masculino = 0;
									$cont_outros 	= 0;
									$cont_nao 		= 0;
										
									while($linha = mysqli_fetch_assoc($resultado))
									{
										if($linha['genero'] == 'feminino')
										{
											$cont_feminino++;
										}
										else if($linha['genero'] == 'masculino')
										{
											$cont_masculino++;
										}
										else if($linha['genero'] == 'outros')
										{
											$cont_outros++;
										}
										else 
										{
											$cont_nao++;
										}
									}
								?>
							</div>
						</div>
					</div>
					
					<div class="form-group">	
						<div class="col-lg-2">
							<div id="donutchart" style="width: 500px; height: 400px;">
								
								<?php 
									$rs 			= 	"SELECT * FROM cad_medicamento";
									$r		 		= 	mysqli_query($conexao, $rs);
									$medicamento 	= 	mysqli_num_rows($r);
									
									$res 			=	"SELECT * FROM cad_lab";
									$r1 			= 	mysqli_query($conexao, $res);
									$laboratorio 	= 	mysqli_num_rows($r1);
								
									$res1 			= 	"SELECT * FROM cad_equipamento";
									$r2 			= 	mysqli_query($conexao, $res1);
									$equipamento 	= 	mysqli_num_rows($r2);
								
								?>
						
							</div>
						</div><br><br><br><br><br><br><br><br><br><br><br><br>
					</div><br><br><br><br><br><br><?php include_once('../config/footer.php');?>
				</div>
			</div>
			
			<script src="../bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
			<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
			<script src="../bower_components/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
			<script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>
			<script type = "text/javascript" src "https://www.google.com/jsapi"></script>
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			
			<script type="text/javascript">
				google.charts.load('current', {'packages':['corechart']});
				google.charts.setOnLoadCallback(drawChart);

				function drawChart() 
				{
					var data = google.visualization.arrayToDataTable
					([
						['#', 			'Quantidade'],
						['Masculino',   <?php echo $cont_masculino; ?>],
						['Feminino',    <?php echo $cont_feminino; ?>],
						['Outros',  	<?php echo $cont_outros; ?>],
					]);
					
					var options = 
					{
						title: 'Pacientes por sexo'
					};
					
					var chart = new google.visualization.PieChart(document.getElementById('piechart'));
					chart.draw(data, options);
				}
			</script>
			
			<script type="text/javascript">
				google.charts.load("current", {packages:["corechart"]});
				google.charts.setOnLoadCallback(drawChart);
				function drawChart() 
				{
					var data = google.visualization.arrayToDataTable
					([
						['Task', 			'Hours per Day'],
						['Medicamento',     <?php echo $medicamento;?>],
						['Laboratórios',    <?php echo $laboratorio;?>],
						['Equipamento',  	<?php echo $equipamento;?>]
					]);

					var options = 
					{
					  title: 'Estoque',
					  pieHole: 0.4,
					};

					var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
					chart.draw(data, options);
				}
			</script>
		</form>
	</body>
</html>