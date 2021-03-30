<?php
	session_start ();
	if (! (isset ( $_SESSION ['login'] ))) 
	{
		header ( 'location:../index.php' );
	} 
	include('../config/DbFunction.php'); 	// Iniciando conexão para os objetos
	
	$obj	=	new DbFunction();			// Iniciando objeto 
	$rs		=	$obj->showMedico();			// Importando objeto 

	if(isset($_GET['del']))
	{
		$obj->deletar_medico(intval($_GET['del']));
	}
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
		<title>Visualizar Medico</title>
		<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
		<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
		<script src='locale/pt-br.js'></script>
		<link rel="stylesheet" href="css/style.css">
		<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<form method="post" ><br><br>
			<div id="wrapper">
				
				<!--- Leftbar --->
			
				<?php include('leftbar.php');?>
				<?php include('../config/header.php');?>
				
				<div id="page-wrapper"><br><br><br>
					<div class="content-wrapper">
						<section class="content-header">					
							<ol class="breadcrumb">
								<li>
									<a href="inicio.php">
										<span id="" style="color:#00bd9c;"><i class="fa fa-dashboard"></i></span>
										<span id="" style="color:#00bd9c;">&nbsp;Home</span>
									</a>
								</li>
								
								<li class="active"><span id="" style="color:#00bd9c;">Médicos</li></span>
								<li class="active"><span id="" style="color:#00bd9c;">Consultar</li></span>
							</ol>
						</section>
					</div><br>
					
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								
								<!--- Visualizar Médico --->
								
								<div class="panel-heading">
									<span id="" style="color:#666;"><strong>Consultar Médico</strong></span>
								</div>
								
								<!--- Tabela Médico --->
								
								<div class="panel-body">
									<div class="dataTable_wrapper">
										<table class="table table-striped table-bordered table-hover" id="dataTables-example"><br>
											<thead>
												<tr>
													<th><span id="" style="color:#666;">#<strong></span></th>
													<th><span id="" style="color:#666;">Nome<strong></span></th>
													<th><span id="" style="color:#666;">Email<strong></span></th>
													<th><span id="" style="color:#666;">Departamento<strong></span></th>
													<th><span id="" style="color:#666;">Formação<strong></span></th>
													<th><span id="" style="color:#666;">Ação
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<strong></span></th>
												</tr>
											</thead>
											
											<!--- Iniciando objetos --->										
											
											<tbody>		
												<?php 
													$sn			=	1;
													while($res	=	$rs->fetch_object())
													{
												?>	
											
												<!--- Contador --->										
											
												<tr class="odd gradeX">
													<td>
														<span id="" style="color:#666;"><?php echo $sn?></span>
													</td>
											
													<!--- Nome médico --->
											
													<td>
														<span id="" style="color:#666;"><?php echo htmlentities(strtolower($res->nome_medico));?></span>
													</td>
													
													<!--- Login --->										
											
													<td>
														<span id="" style="color:#666;"><?php echo htmlentities(strtolower($res->login));?></span>
													</td>
													
													<!--- Departamento --->										
												
													<td>
														<span id="" style="color:#666;"><?php echo htmlentities(strtolower($res->departamento));?></span>
													</td>
													
													<!--- Formação --->										
											
													<td>
														<span id="" style="color:#666;"><?php echo htmlentities(strtolower($res->educacao));?></span>
													</td>
														
													
													<!--- Editar Médico --->										
																								
													<td>
														<a href="editar_medico.php?id=
															<?php echo htmlentities($res->id);?>">
															<span class="btn btn-success ">
																<i class="fa fa-edit"></i>
																&nbsp;Editar
															</span>
														</a>
														
														<!--- Exportar relatório para PDF --->										
											
														
														<a href="pdf_medico.php">
															<span class="btn btn-info">
																<i class="fa fa-file-text-o"></i>
																&nbsp;Relatório
															</span>
														</a>
														
														<!--- Excluir --->
														
														<a href="ver_medico.php?del=
														<?php echo htmlentities($res->id); ?>"> 
														<button type="button" class="btn btn-danger">
														<i class="fa fa-trash-o"></i> 
															&nbsp;Excluir
														</button>
													</td>
												</tr>
												<?php $sn++;}?>   	           
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div><br><?php include_once('../config/footer.php');?><br><br><br><br>
					</div>
				</div>
			</div>
		</form>
		
		<!--- JQuery --->
		<script src="../bower_components/jquery/dist/jquery.min.js"></script>

		<!--- Bootstrap --->
		<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

		<!--- Metis Menu --->
		<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

		<!--- Datatable --->
		<script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
		
		<!--- DataTables --->
		<script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

		<!--- Custom Theme --->
		<script src="../dist/js/sb-admin-2.js"></script>
		
		<!--- Documento Verificação --->

		<script>
			$(document).ready(function() 
			{
				$('#dataTables-example').DataTable
				({
					"language": 
					{
						"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
					}
					
				});
			});
		</script>

	</body>
</html>
