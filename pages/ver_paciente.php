<?php
	session_start();
	if (! (isset ( $_SESSION ['login'] ))) 
	{
		header ( 'location:../index.php' );
	} 
	include('../config/DbFunction.php');
	$obj	=	new DbFunction();			//	Iniciando objeto
	$rs		=	$obj->showPaciente();		//	Habilitando objeto paciente

	if(isset($_GET['del']))					// 	Deletar Paciente
	{
		$obj->deletar_paciente(intval($_GET['del']));
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
		<title>Consultar pacientes</title>
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
								<li class="active"><span id="" style="color:#00bd9c;">Paciente</li></span>
								<li class="active"><span id="" style="color:#00bd9c;">Consultar</li></span>
							</ol>
						</section>
					</div><br>
					
					<div class="row">
						<div class="col-lg-12">
							
							<!--- Visualizar Paciente --->
		
							<div class="panel panel-default">
								<div class="panel-heading">
									<span id="" style="color:#666666;"><strong>Consultar Paciente</strong></span>
								</div>
		
								<!--- Tabela de pacientes --->
		
								<div class="panel-body">
									<div class="dataTable_wrapper">
										<table class="table table-striped table-bordered table-hover" id="dataTables-example">
											<thead>
												<tr>
													<th><span id="" style="color:#666666;"><strong>#</strong></span></th>
													<th><span id="" style="color:#666666;"><strong>Nome</strong></span></th>
													<th><span id="" style="color:#666666;"><strong>Email</strong></span></th>
													<th><span id="" style="color:#666666;"><strong>Tipos Sanguíneos</strong></span></th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<th><span id="" style="color:#666666;"><strong>Alergia</strong></span></th>
													<th><span id="" style="color:#666666;"><strong>Telefone</strong></span></th>
													<th><span id="" style="color:#666666;"><strong>Ação</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												</tr>
											</thead>
										
											<tbody>
												<?php 
													$sn			=	1;
													while($res	=	$rs->fetch_object())
													{
												?>	
													
												<!--- Tabela de Pacientes --->
		
												<tr class="odd gradeX">
		
													<!--- Contador --->
		
													<td>
														<span id="" style="color:#666666;"><?php echo $sn?>
													</td>
													
													<!--- Primeiro Nome --->
		
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->primeiro_nome));?>
													</td>
													
													<!--- Email --->
		
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->email));?></span>
													</td>
													
													<!--- Tipo sanguineo --->
		
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtoupper($res->tipo_sanguineo));?></span>
													</td>
													
													<!--- Alergia --->
		
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->alergia));?></span>
													</td>
													
													<!--- Telefone --->
		
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtoupper($res->telefone));?></span>
													</td>
													
													<!--- Ação --->
														
													<td>
														<a href="editar_paciente.php?id=
															<?php echo htmlentities($res->id);?>">
															<span class="btn btn-success ">
																<i class="fa fa-edit"></i>
																&nbsp;Editar
															</span>
														</a>
														
														<!--- Relatório  --->
															
														
														<a href="pdf_documento.php">
															<span class="btn btn-info">
																<i class="fa fa-file-text-o"></i>
																&nbsp;Relatório
															</span>
														</a>
														
														<!--- Excluir --->
														

														<a href="ver_paciente.php?del=
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
						</div>
					</div><?php include_once('../config/footer.php');?><br><br><br><br>
				</div>
			</div>
		</form>
			
		<!----------------------- jQuery --------------------->
		<script src="../bower_components/jquery/dist/jquery.min.js"></script>

		<!----------------------- Bootstrap Core JavaScript --------------------->
		<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

		<!----------------------- Metis Menu Plugin JavaScript --------------------->
		<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

		<!----------------------- DataTables JavaScript --------------------->
		<script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
		
		<script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

		<!----------------------- Custom Theme JavaScript -->
		<script src="../dist/js/sb-admin-2.js"></script>

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