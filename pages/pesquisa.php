<?php
	session_start();
	if (!(isset ( $_SESSION ['login'] ))) 
	{
		header ( 'location:../index.php' );
	}
	include('../config/DbFunction.php');	
	include('conexao.php');
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
		<title>Cadastrar Convênio</title>
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
										<span id="" style="color:#00bd9c;">
											<i class="fa fa-dashboard"></i>
										</span>
										<span id="" style="color:#00bd9c;">&nbsp;Home</span>
									</a>
								</li>
								
								<li class="active">
									<span id="" style="color:#00bd9c;">
										Pesquisa
									</span>
								</li>
								
								<li class="active">
									<span id="" style="color:#00bd9c;">
										Consulta
									</span>
								</li>
							</ol>
						</section>
					</div>
					
					<div class="row">
						<div class="col-lg-12"><br>
							<form name="search" method="post" style="padding-top: 20px" >
								<div class="card-box">
												<div class="input-group">
													<input class="form-control" type="text" name="searchdata" id="searchdata" placeholder="Buscar por nomes..." />
													<span class="input-group-btn" style = "color:#fff">	
														
														<button type="submit" style = "color:#fff" name="search" id="submit" class="btn btn-primary btn-sm">
															<i class="fa fa-search"></i>
														</button>
														
													</span>
												</div><br>
											</div>
										</form>

										<?php
											if(isset($_POST['search']))
											{
												$sdata=$_POST['searchdata'];
										?>
										
										<h4 align="center">Resultados encontrados: Palavra-chave - "<?php echo $sdata;?>"</h4><br>
										<div class="card-body">
											<table class="table">
												<thead>
													<tr>
														<tr>
															<th>#</th>
															<th>Nome do Paciente</th>
															<th>Contato</th>    
															<th>Ação</th>
														</tr>
													</tr>
												</thead>
										
												<?php
													$res = "SELECT * FROM cadpaciente WHERE primeiro_nome LIKE '%$sdata%' || email LIKE '%$sdata%' ";
													$ret = $conexao->query($res);
													$num = mysqli_num_rows($ret);
													if($num>0)
													{
														$cnt	=	1;	
														while ($row	=	mysqli_fetch_array($ret)) 
														{
												?>
											
												<tr>
													<td><?php 	echo $cnt;					?></td>
													<td><?php  	echo $row['primeiro_nome'];	?></td>
													<td><?php  	echo $row['email'];			?></td>
														<td>
															<a href="editar_paciente.php?id=
																<?php echo $row['id'];?>">
																<span class="btn btn-success ">
																	<i class="fa fa-edit"></i>
																	&nbsp;Editar
																</span>
															</a>
															
															<!--- Relatório  --->
															
															<a href="ver_paciente.php">
																<span class="btn btn-info">
																	<i class="fa fa-eye"></i>
																	&nbsp;Consultar
																</span>
															</a>
															
															<!--- Excluir --->
															
															<a href="ver_paciente.php?del=
															<?php echo $row['id'];?>">
															<button type="button" class="btn btn-danger">
															<i class="fa fa-trash-o"></i> 
																&nbsp;Excluir
															</button>													
													</tr>
													<?php}}?>
													
													<?php 
														$cnt	=	$cnt+1;
														}}
														else 
														{ 
													?>

													<tr>
														<td colspan="8"> Nenhum dado de paciente encontrado na pesquisa</td>
													</tr>

													<?php } ?>
													
													
													
													<!--- Medicamento --->
													
													<thead>
														<tr>
															<tr>
																<th>#</th>
																<th>Nome do Medicamento</th>
																<th>Categoria</th>    
																<th>Ação</th>
															</tr>
														</tr>
													</thead>
										
													<?php
														$rs = "SELECT * FROM cad_medicamento WHERE nome_medicamento LIKE '%$sdata%' || categoria LIKE '%$sdata%' ";
														$rt = $conexao->query($rs);
														$n 	= mysqli_num_rows($rt);
														if($n>0)
														{
															$snt	=	1;
															while ($rw	=	mysqli_fetch_array($rt)) 
															{
													?>
											
													<tr>
														<td><?php 	echo $snt;						?></td>
														<td><?php  	echo $rw['nome_medicamento'];	?></td>
														<td><?php  	echo $rw['categoria'];			?></td>
															
														<td>
															<a href="editar_medicamento.php?id=
																<?php echo $rw['id'];?>">
																<span class="btn btn-success ">
																	<i class="fa fa-edit"></i>
																	&nbsp;Editar
																</span>
															</a>
															
															<!--- Relatório  --->
															
															<a href="ver_medicamentos.php">
																<span class="btn btn-info">
																	<i class="fa fa-eye"></i>
																	&nbsp;Consultar
																</span>
															</a>
															
															<!--- Excluir --->
															
															<a href="ver_medicamentos.php?del=
															<?php echo $rw['id'];?>">
															<button type="button" class="btn btn-danger">
															<i class="fa fa-trash-o"></i> 
																&nbsp;Excluir
															</button>
															
														</td>															
													</tr>
													<?php}}?>
													
													<?php 
														$snt++;
														}}
														else 
														{ 
													?>

													<tr>
														<td colspan="8"> Nenhum dado de medicamento encontrado na pesquisa</td>
													</tr>

													<?php } ?>
													
													
													<!--- Laboratório --->
													
													
													<thead>
														<tr>
															<tr>
																<th>#</th>
																<th>Tipo de Laboratório</th>
																<th>Médico</th>    
																<th>Ação</th>
															</tr>
														</tr>
													</thead>
													<?php
														$rs = "SELECT * FROM cad_lab WHERE tipo_lab LIKE '%$sdata%' || medico LIKE '%$sdata%' ";
														$rt = $conexao->query($rs);
														$n 	= mysqli_num_rows($rt);
														if($n>0)
														{
															$tnt = 1;
															while ($rw	=	mysqli_fetch_array($rt)) 
															{
													?>
											
													<tr>
														<td><?php 	echo $tnt;					?></td>
														<td><?php  	echo $rw['tipo_lab'];		?></td>
														<td><?php  	echo $rw['medico'];			?></td>
															
														<td>
															<a href="editar_lab.php?id=
																<?php echo $rw['id'];?>">
																<span class="btn btn-success ">
																	<i class="fa fa-edit"></i>
																	&nbsp;Editar
																</span>
															</a>
															
															<!--- Relatório  --->
															
															<a href="ver_lab.php">
																<span class="btn btn-info">
																	<i class="fa fa-eye"></i>
																	&nbsp;Consultar
																</span>
															</a>
															
															<!--- Excluir --->
															
															<a href="ver_lab.php?del=
															<?php echo $rw['id'];?>">
															<button type="button" class="btn btn-danger">
															<i class="fa fa-trash-o"></i> 
																&nbsp;Excluir
															</button>
														</td>
													</tr>
													<?php}}?>
													
													<?php 
														$tnt++;
														}}
														else 
														{ 
													?>

													<tr>
														<td colspan="8"> Nenhum dado de Laboratório encontrado na pesquisa</td>
													</tr>

													<?php }} ?>
													
											</table>
										</div><br>
									</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><?php include_once('../config/footer.php');?><br>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
								
			<!--- JQuery --->
			<script src="../bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
			
			<!--- Bootstrap --->
			<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>

			<!--- Metis Menu --->
			<script src="../bower_components/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>

			<!-- Custom Theme JavaScript -->
			<script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>
		</form>
	</body>
</html>