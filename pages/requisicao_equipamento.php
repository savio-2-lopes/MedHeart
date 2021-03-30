<?php
	session_start ();

	if (! (isset ( $_SESSION ['login'] ))) 
	{
		header ( 'location:../index.php' );
	}

	include('conexao.php');	
	include('../config/DbFunction.php');		
	$obj 	= 	new DbFunction();
	
	$rs 	= 	$obj->showEqui();
	$rs1 	= 	$obj->showPaciente();
	
	if(isset($_POST['submit']))
	{
		
		/*********** Pegando os dados *****************/
		
		$equipamento 	= 	$_POST['equipamento'];
		$paciente 		= 	$_POST['paciente'];
		$prescricao 	= 	$_POST['prescricao'];
		$quantidade 	= 	$_POST['quantidade'];
		$data 			= 	$_POST['data'];		
		
		/*********** Pegando os dados do bd *****************/		
		
		$res = "INSERT INTO requisicao_equipamento(equipamento, paciente, prescricao, quantidade, data)VALUES('$equipamento','$paciente','$prescricao', '$data')";
		$sql = $conexao->query($res);
		
		$equipamento 	= 	$sql['equipamento'];
		$paciente 		= 	$sql['paciente'];
		$prescricao 	= 	$sql['prescricao'];
		$quantidade 	= 	$sql['quantidade'];
		$data 			= 	$sql['data'];		
		
		/************* Verificando UPDATE ***********************/
		
		if($sql == '')
		{
			echo "<script language='javascript'>window.alert('Ocorreu um erro, ao requisitar o equipamento!');</script>";
		}
		else
		{
			echo "<script language='javascript'>window.alert('Equipamento requisitado com sucesso!'); </script>";
		}
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
		<title>Requisições</title>
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
								
								<li class="active"><span id="" style="color:#00bd9c;">Equipamento</li></span>
								<li class="active"><span id="" style="color:#00bd9c;">Requisicao</li></span>
							</ol>
						</section>
					</div><br>

					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									Requisição Equipamento
								</div>
								
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-10"><br>
										
											<!------- Selecionando Equipamento ------->
											
											<div class="form-group">
												<div class="col-lg-3">
													<label>
														Equipamento
														<span id="" style="font-size:11px;color:red">
															*
														</span>	
													</label>
												</div>
													
												<div class="col-lg-6">
													<select class="form-control" name="equipamento" id="equipamento"  onchange="showSub(this.value)" required="required" >			
														<option VALUE="">SELECIONE</option>
														
														<?php 	
															while($res=$rs->fetch_object())
															{
														?>
													
														<option VALUE="
															<?php echo htmlentities($res->id);?>">
															<?php echo htmlentities($res->nome_equipamento)?>
														</option>
																
														<?php }?>   
													</select>
												</div>									
											</div><br><br>

											<!----- Selecionando Paciente ----->

											<div class="form-group">
												<div class="col-lg-3">
													<label>
														 Paciente
														<span id="" style="font-size:11px;color:red">
															*
														</span>
													</label>
												</div>
												
												<div class="col-lg-6">
													<select class="form-control" name="paciente" id="paciente"  onchange="showSub(this.value)" required="required" >			
														<option VALUE="">SELECIONE</option>
														
														<?php 	
															while($res=$rs1->fetch_object())
															{
														?>
													
														<option VALUE="
															<?php echo htmlentities($res->id);?>">
															<?php echo htmlentities($res->primeiro_nome)?>
														</option>
																
														<?php }?>   
													</select>
												</div><br><br><br>
												
												<!---------- Prescrição -------------->

												<div class="form-group">
													<div class="col-lg-3">
														<label>
															 Prescrição
															<span id="" style="font-size:11px;color:red">
																*
															</span>
														</label>
													</div>
													
													
													<div class="col-lg-6">
												   		<select class="form-control" name="prescricao" id="prescricao"  onchange="showSub(this.value)" required="required" >			
															<option VALUE="">SELECIONE</option>
															<?php 	
																while($res2=$rs2->fetch_object())
																{
															?>
															<option VALUE="
																<?php echo htmlentities($res2->id);?>">
																<?php echo htmlentities($res2->data)?>
															</option>	
															<?php }?>   
														</select>
												   
												</div><br><br>	
												
												<!---------- Quantidade de equipamento ------------>
												
												<div class="form-group">
													<div class="col-lg-3">
														<label>
															 Quantidade
															<span id="" style="font-size:11px;color:red">
																*
															</span>
														</label>
													</div>
													
													<div class="col-lg-3">
														<input  class="form-control" type="number"  min="1" max="5" name="quantidade"  id="quantidade" >
												   </div>
												</div><br><br>	

												<!---------- Data Final -------------->

												<div class="form-group">
													<div class="col-lg-3">
														
														<label>
															Data de Prescrição
															
															<span id="" style="font-size:11px;color:red">
																*
															</span>
														</label>
													</div>
													
													<div class="col-lg-6">
														<input class="form-control" type = "date" name="data" id="data" required="required"  >
														<span id="data" style="font-size:12px;"></span>
													</div>
												</div>	
													
												<!------------------ Requisicao equipamento --------------------------->
												
												<div class="form-group">
													<div class="col-lg-4"></div>
											
													<div class="col-lg-6"><br><br>
														<input type="submit" class="btn btn-primary"  name="submit" value="Requisitar Equipamento"></button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</form>

		<!-- jQuery -->
		<script src="../bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>

		<!-- Metis Menu Plugin JavaScript -->
		<script src="../bower_components/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>

		<!-- Custom Theme JavaScript -->
		<script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>
		
	</body>

</html>
