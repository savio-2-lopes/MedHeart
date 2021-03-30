<?php
	session_start ();
	if (! (isset ( $_SESSION ['login'] ))) 
	{
		header ( 'location:../index.php' );
	} 
	include('conexao.php');					// Conexão com o Banco de dados
	include('../config/DbFunction.php');	// Iniciando conexão com os objetos
	$obj	=	new DbFunction();			// Objeto
	$rs		=	$obj->showMed();			// Iniciando Objeto Medico
	if(isset($_GET['del']))
	{	   
		$obj->deletar_medicamento(intval($_GET['del']));
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
		<title>Visualizar Medicamentos</title>
		<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
		<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
		<link rel="stylesheet" href="css/style.css">
		<script src='locale/pt-br.js'></script>
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
								
								<li class="active"><span id="" style="color:#00bd9c;">Medicamentos</li></span>
								<li class="active"><span id="" style="color:#00bd9c;">Visualizar</li></span>
							</ol>
						</section>
					</div><br>

					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								
								<!--- Ver Medicamento --->
								
								<div class="panel-heading">
									<span id="" style="color:#666666;"><strong>Ver Medicamento</strong></span>
								</div>

								<!--- Iniciando tabela do medicamentos --->
								
								<div class="panel-body">
									<div class="dataTable_wrapper">
										<table class="table table-striped table-bordered table-hover" id="dataTables-example">
											<thead>
												<tr>
													<th><span id="" style="color:#666;">#</span></th>
													<th><span id="" style="color:#666;">Nome</span></th>
													<th><span id="" style="color:#666;">Categoria</span></th>
													<th><span id="" style="color:#666;">Sintoma</span></th>
													<th><span id="" style="color:#666;">Quantidade</span></th>
													<th><span id="" style="color:#666;">Preço</span></th>
													<th><span id="" style="color:#666;">Validade&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></th>
													<th><span id="" style="color:#666;">Ação&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></th>
												</tr>
											</thead>
											
											<!--- Iniciando objetos --->												
											
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
													
													<!--- Nome Medicamento --->
													
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->nome_medicamento));?></span>
													</td>
													
													<!--- Categoria --->
													
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->categoria));?></span>
													</td>
													
													<!--- Efeito --->
													
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->efeito));?></span>
													</td>
													
													<!--- Quantidade --->
													
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->quantidade));?></span>
													</td>
													
													<!--- Preço total --->
													
													<td>
														<span id="" style="color:#666666;"><?php echo 'R$'; echo ($res->preco * $res->quantidade);?></span>
													</td>
													
													<!--- Data Validade --->
													
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->data_validade));?></span>
													</td>

													<!--- Ação --->
														
													<td>
														<a href="editar_medicamento.php?id=
															<?php echo htmlentities($res->id);?>">
															<span class="btn btn-success ">
																<i class="fa fa-edit"></i>
																&nbsp;Editar
															</span>
														</a>
														
														<!--- Relatório  --->
															
														&nbsp;
														<a href="pdf_medicamento.php">
															<span class="btn btn-info">
																<i class="fa fa-file-text-o"></i>
																&nbsp;Relatório
															</span>
														</a>
														
														<!--- Excluir --->
															
														&nbsp;
														<a href="ver_medicamentos.php?del=
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
							</div><?php include_once('../config/footer.php');?><br><br><br><br>
						</div><br>
					</div>
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
		
		<!--- DataTable --->
		<script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

		<!--- Custom CSS --->
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