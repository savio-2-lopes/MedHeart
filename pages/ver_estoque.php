<?php
	session_start ();
	if (! (isset ( $_SESSION ['login'] ))) 
	{
		header ( 'location:../index.php' );
	} 
	include('conexao.php');					// Conexão com o Banco de Dados
	include('../config/DbFunction.php');	// Conexão com os objetos
		
	$obj	=	new DbFunction();			// Iniciando objetos
	$rs		=	$obj->showMed();			// Objeto
	$ress	=	$obj->showEqui();			// Objeto
		
	if(isset($_GET['del']))
	{	   
		$obj->deletar_medicamento(intval($_GET['del']));	
		$obj->deletar_equipamento(intval($_GET['del']));
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
		<title>Visualizar Estoque</title>
		<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
		<script src='locale/pt-br.js'></script>
		<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
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
								
								<li class="active"><span id="" style="color:#00bd9c;">Estoque</li></span>
								<li class="active"><span id="" style="color:#00bd9c;">Consultar</li></span>
							</ol>
						</section>
					</div><br>

					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								
								<!--- Ver Medicamentos --->
								
								<div class="panel-heading">
									<span id="" style="color:#666666;"><strong>Consultar Medicamentos</strong></span>
								</div>

								<!--- Iniciando tabela do medicamentos --->
								
								<div class="panel-body"><br>
									<div class="dataTable_wrapper">
										<table class="table table-striped table-bordered table-hover" id="dataTables-example">
											<thead>
												<tr>
													<th><span id="" style="color:#666666;"><strong>#</strong></span></th>
													<th><span id="" style="color:#666666;"><strong>Nome</strong></span></th>
													<th><span id="" style="color:#666666;"><strong>Categoria</strong></span></th>
													<th><span id="" style="color:#666666;"><strong>Efeito</strong></span></th>
													<th><span id="" style="color:#666666;"><strong>Quantidade</strong></span>&nbsp;</th>
													<th><span id="" style="color:#666666;"><strong>Preço</strong></span></th>
													<th><span id="" style="color:#666666;"><strong>Validade</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
													<th><span id="" style="color:#666666;"><strong>Ação</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
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
															
														<a href="pdf_medicamento.php">
															<span class="btn btn-info">
																<i class="fa fa-eye"></i>
																&nbsp;Imprimir
															</span>
														</a>
														
														<!--- Excluir --->
															
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
							</div>
						</div>	
					</div>
					
					<!--- Equipamentos --->
					
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								
								<!--- Ver Equipamentos --->
																
								<div class="panel-heading">
									<span id="" style="color:#666666;"><strong>Ver Equipamentos</strong></span>
								</div>

								<!--- Iniciando tabela do medicamentos --->
								
								<div class="panel-body">
									<div class="dataTable_wrapper"><br>
										<table class="table table-striped table-bordered table-hover" id="dataTables-s">
											<thead>
												<tr>
													<th><span id="" style="color:#666666;"><strong>	#										</strong></span></th>
													<th><span id="" style="color:#666666;"><strong>	Nome									</strong></span></th>
													<th><span id="" style="color:#666666;"><strong>	Uso clinico								</strong></span></th>
													<th><span id="" style="color:#666666;"><strong>	Quantidade								</strong></span></th>
													<th><span id="" style="color:#666666;"><strong>	Preço									</strong></span></th>
													<th><span id="" style="color:#666666;"><strong>	Validade&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	</strong></span></th>
													<th><span id="" style="color:#666666;"><strong>	Ação&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	</strong></span></th>
												</tr>
											</thead>
											
											<!--- Iniciando objetos --->												
											
											<tbody>
												<?php 
													$sn			=	1;
													while($re	=	$ress->fetch_object()){
												?>	
												
												<!--- Contador --->
												
												<tr class="odd gradeX">
													<td>
														<span id="" style="color:#666666;"><?php echo $sn?></span>
													</td>
													
													<!--- Nome Medicamento --->
													
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($re->nome_equipamento));?></span>
													</td>
													
													<!--- Efeito --->
													
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($re->clinico));?></span>
													</td>
													
													<!--- Quantidade --->
													
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($re->quantidade));?></span>
													</td>
													
													<!--- Preço total --->
													
													<td>
														<span id="" style="color:#666666;"><?php echo 'R$'; echo ($re->preco * $re->quantidade);?></span>
													</td>
													
													<!--- Data Validade --->
													
													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($re->data_validade));?></span>
													</td>

													<!--- Ação --->
														
													<td>
														<a href="editar_equipamento.php?id=
															<?php echo htmlentities($re->id);?>">
															<span class="btn btn-success ">
																<i class="fa fa-edit"></i>
																&nbsp;Editar
															</span>
														</a>
														
														<!--- Relatório  --->
															
														<a href="realtorio_equipamento.php">
															<span class="btn btn-info">
																<i class="fa fa-file-text-o"></i>
																&nbsp;Relatório
															</span>
														</a>
														
														<!--- Excluir --->
															
														<a href="ver_equipamento.php?del=
														<?php echo htmlentities($re->id); ?>"> 
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
								</div><?php include_once('../config/footer.php');?><br><br><br><br>
							</div>
						</div>
					</div>
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
		
		<script>
			$(document).ready(function() 
			{
				$('#dataTables-s').DataTable
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
