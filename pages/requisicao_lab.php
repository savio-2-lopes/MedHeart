<?php
	session_start ();

	if (! (isset ( $_SESSION ['login'] ))) 
	{
		header ( 'location:../index.php' );
	}

	include('conexao.php');	
	include('../config/DbFunction.php');		
	$obj 	= 	new DbFunction();
	$rs 	= 	$obj->showLab();
	$rs1 	= 	$obj->showPaciente();	
	$rs2   	= 	$obj->showPrescricao();
	
	if(isset($_POST['submit']))
	{
		
		/*********** Pegando os dados *****************/
		
		$lab 		= $_POST['lab'];
		$paciente 	= $_POST['paciente'];
		$prescricao = $_POST['prescricao'];
		$quantidade = $_POST['quantidade'];
		$data 		= $_POST['data'];		
		
		/*********** Pegando os dados do bd *****************/		
		
		$query = mysqli_query($conexao, "INSERT INTO requisicao_lab(lab, paciente, prescricao, quantidade, data)VALUES('$lab','$paciente', '$prescricao', '$quantidade', '$data')");
		
		/************* Verificando ***********/

		if($query)
		{
			echo "<script language='javascript'>window.alert('Laboratório requisitado com sucesso!'); </script>";
			echo "<script>window.location.href='ver_rec_lab.php'</script>";	
		}
		else
		{
			echo "<script language='javascript'>window.alert('Ocorreu um erro fazer requisição do Laboratório!');</script>";
			echo "<script>window.location.href='requisicao_lab.php'</script>";	
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
								
								<li class="active"><span id="" style="color:#00bd9c;">Laboratório</li></span>
								<li class="active"><span id="" style="color:#00bd9c;">Requisições</li></span>
							</ol>
						</section>
					</div><br>
					
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<span id="" style="color:#666666;"><strong>Requisição Laboratório</strong></span>
								</div>
								
								
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group"><br>
										
											<!------- Selecionando Laboratório ------->
										
												<div class="col-lg-2">
													<label>
														<span id="" style="color:#666666;"><strong>Laboratório</strong></span>
														<span id="" style="font-size:11px;color:red">
															*
														</span>	
													</label>
												</div>
													
												<div class="col-lg-4">
													<select class="form-control" name="lab" id="lab"  onchange="showSub(this.value)" required="required" >			
														<option VALUE="">SELECIONE</option>
														<?php 	
															while($res=$rs->fetch_object())
															{
														?>
														<option VALUE="
															<?php echo htmlentities($res->id);?>">
															<?php echo htmlentities($res->tipo_lab)?>
														</option>		
														<?php }?>   
													</select>
												</div>
													
												<!----- Selecionando Paciente ----->
												
												<div class="col-lg-2">
													<label>
														<span id="" style="color:#666666;"><strong>Paciente</strong></span>
														<span id="" style="font-size:11px;color:red">
															*
														</span>
													</label>
												</div>
												
												<div class="col-lg-4">
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
												</div>
											</div><br><br>
												
											<!---------- Prescrição -------------->
												
											<div class="form-group">
												<div class="col-lg-2">
													<label>
														<span id="" style="color:#666666;"><strong>Prescrição</strong></span>
														<span id="" style="font-size:11px;color:red">
															*
														</span>
													</label>
												</div>
													
												<div class="col-lg-4">
													<select class="form-control" name="prescricao" id="prescricao"  onchange="showSub(this.value)" required="required" >
														<option VALUE="">SELECIONE</option>
																
														<?php 	
															while($res1	=	$rs2->fetch_object())
															{
														?>	
														<option VALUE="
															<?php echo htmlentities($res1->id);?>">
															<?php echo htmlentities($res1->titulo)?>
														</option>
																	
														<?php }?>   
													</select>
												</div>
												
												<!---------- Quantidade de Medicamentos ------------>
												
												<div class="col-lg-2">
													<label>
														<span id="" style="color:#666666;"><strong>Quantidade</strong></span>
														<span id="" style="font-size:11px;color:red">
															*
														</span>
													</label>
												</div>
													
												<div class="col-lg-2">
													<input class="form-control" type="number"  min="1" max="5" name="quantidade"  id="quantidade" >
												</div>
											</div><br><br>	
											
											<!---------- Data Final -------------->
											
											<div class="form-group">
												<div class="col-lg-2">
													<label>
														<span id="" style="color:#666666;"><strong>Data Prescrição</strong></span>
														<span id="" style="font-size:11px;color:red">
															*
														</span>
													</label>
												</div>
													
												<div class="col-lg-2">
													<input class="form-control" type = "date" name="data" id="data" required="required"  >
													<span id="data" style="font-size:12px;"></span>
												</div>
											</div>	
										</div>
									</div><br>
								</div>
							</div>
								
							<!------------------ Requisicao Laboratório --------------------------->
												
							<div class="form-group">
								<div class="col-lg-4"></div>
								<div class="col-lg-6"><br>
									<input type="submit" class="btn btn-primary"  name="submit" value="Requisitar Laboratório"></button>
								</div>
							</div>
						</div>
					</div><br><br><?php include_once('../config/footer.php');?><br><br><br>
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
