<?php
	session_start ();
	if (! (isset ( $_SESSION ['login'] ))) 
	{
		header ( 'location:../index.php' );
	} 
	include('conexao.php');						// Conexão com o Banco de dados
	include('../config/DbFunction.php');		// Conexao com os Objeto
	$obj = new DbFunction();					// Iniciando Objetos
	$rs  = $obj->showPrescricao();				// Importando Objeto
	$rs1 = $obj->showMedico();					// Importando Objeto
		
	if(isset($_GET['del']))
	{	   
		$obj->deletar_prescricao(intval($_GET['del']));
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
		<title>Cosultar Prescrições</title>
		<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
		<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
		<link rel="stylesheet" href="css/style.css">
		<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<form method="post" ><br><br>
			<div id="wrapper">
				
				<!--- Leftbar --->
				
				<?php include('leftbar.php');			?>
				<?php include('../config/header.php');	?>
				
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
								<li class="active"><span id="" style="color:#00bd9c;">Prescrições</li></span>
								<li class="active"><span id="" style="color:#00bd9c;">Consultar</li></span>
							</ol>
						</section>
					</div><br>

					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								
								<!--- Ver Prescrições --->
								
								<div class="panel-heading">
									<span id="" style="color:#666666;"><strong>Consultar Prescrições</strong></span>
								</div><br>
								
								<!--- Tabela do Prescrições --->
								
								<div class="panel-body">
									<div class="dataTable_wrapper">
										<table class="table table-striped table-bordered table-hover" id="dataTables-example">
											<thead>
												<tr>
													<th><span id="" style="color:#666666;"><strong>#</strong>&nbsp;&nbsp;&nbsp;&nbsp;</th>
													<th><span id="" style="color:#666666;"><strong>Título</strong></th>
													<th><span id="" style="color:#666666;"><strong>Data</strong></th>
													<th><span id="" style="color:#666666;"><strong>Paciente</strong></th>
													<th><span id="" style="color:#666666;"><strong>Horário</strong></th>
													<th><span id="" style="color:#666666;"><strong>Medicamento</strong></th>
													<th><span id="" style="color:#666666;"><strong>Anotações</strong></th>
													<th><span id="" style="color:#666666;"><strong>Ação</strong></th>
												</tr>
											</thead>
												
											<!--- Iniciando Objetos --->
												
											<tbody>
												<?php 
													$sn			=	1;
													while($res	=	$rs->fetch_object()){
												?>	
													
												<!--- Contador --->
													
												<tr class="odd gradeX">
													<td>
														<span id="" style="color:#666666;"><?php echo $sn?></span>
													</td>
														
													<!--- Titulo --->
														
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->titulo));?></span>
													</td>
													
													<!--- Data --->
														
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->data));?></span>
													</td>
														
													<!--- Paciente --->
														
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->paciente));?></span>
													</td>
														
													<!--- Historico --->
														
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->historico));?></span>
													</td>
													
													<!--- Medicamento --->
														
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->medicamento));?></span>
													</td>
														
													<!--- Anotações --->
														
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->anotacoes));?></span>
													</td>
														
													<!--- Ação --->
														
													<td>
														&nbsp;
														<a href="editar_prescricao.php?id=
															<?php echo htmlentities($res->id);?>">
															<span class="btn btn-success ">
																<i class="fa fa-edit"></i>
																&nbsp;Editar
															</span>
														</a>
														
														<!--- Relatório  --->
															
														&nbsp;
														<a href="pdf_prescricao.php">
															<span class="btn btn-info">
																<i class="fa fa-file-text-o"></i>
																&nbsp;Relatório
															</span>
														</a>
														
														<!--- Excluir --->
															
														&nbsp;
														<a href="ver_prescricoes.php?del=
														<?php echo htmlentities($res->id); ?>"> 
														<span class="btn btn-danger">
														<i class="fa fa-trash-o"></i> 
															&nbsp;Excluir
														</span>
													</td>
												</tr>
												<?php $sn++;}?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div><br><?php include_once('../config/footer.php');?><br><br><br><br>
				</div>
			</div>
		</form>
															
		<!--- jQuery --->
		<script src="../bower_components/jquery/dist/jquery.min.js"></script>

		<!--- Bootstrap --->
		<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

		<!--- Metis Menu --->
		<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

		<!--- DataTable --->
		<script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
		
		<!--- DataTable Plugin --->
		<script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

		<!--- Custom Theme --->
		<script src="../dist/js/sb-admin-2.js"></script>
		
		<!--- Documento --->
		
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
