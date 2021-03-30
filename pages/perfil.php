<?php	
	session_start ();

	if (!(isset ( $_SESSION ['login'] ))) 
	{
		header ( 'location:../index.php' );
	}

	if(isset($_POST['submit']))
	{	
		include('conexao.php');
		
		/*********** Pegando os dados *****************/
		
		$loginid 	= 	$_POST['loginid'];
		$nome 		= 	$_POST['nome'];
		$telefone 	= 	$_POST['telefone'];
		
		/*********** Pegando os dados do bd *****************/		
		
		$query = mysqli_query($conexao, "UPDATE tbl_login SET loginid = '$loginid', nome = '$nome', telefone = '$telefone' WHERE id = 2");
		
		/************* Verificando ***********/

		if($query)
		{
			echo "<script language='javascript'>window.alert('Perfil atualizado com sucesso!'); </script>";
			echo "<script>window.location.href='inicio.php'</script>";
		}
		else
		{
			echo "<script language='javascript'>window.alert('Ocorreu um erro ao atualizar perfil!');</script>";
			echo "<script>window.location.href='perfil.php'</script>";		
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
		<title>Perfil</title>
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
								
								<li class="active"><span id="" style="color:#00bd9c;">Perfil</li></span>
								<li class="active"><span id="" style="color:#00bd9c;">Editar</li></span>
							</ol>
						</section>
					</div><br>
							
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<span id="" style="color:#666666;">
										<strong>Editar Perfil do Admin</strong>
									</span>
								</div><br>
								
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-12">
											
										<!--------------- Nome do admin -------------->

											<div class="form-group">
												<div class="col-lg-2">
													<label>
														<span id="" style="color:#666666;">Administrador</span>
														<span id="" style="font-size:11px;color:red">
															*
														</span>	
													</label>
												</div>
										
												<div class="col-lg-4">
													<input class="form-control" name="loginid" id="loginid" required="required">
												</div>
											
												<!------ Nome do Usuário ----->

												<div class="col-lg-2">
													<label>
														<span id="" style="color:#666666;">Usuário</span>
														<span id="" style="font-size:11px;color:red">
															*
														</span>	
													</label>
												</div>
										
												<div class="col-lg-4">
													<input class="form-control" name="nome" id="nome" required="required">
												</div>
											</div><br><br><br>
										
											<!--------------- Número de Contato -------------->

											<div class="form-group">
												<div class="col-lg-2">
													<label>
														<span id="" style="color:#666666;">Telefone</span>
														<span id="" style="font-size:11px;color:red">
															*
														</span>	
													</label>
												</div>
										
												<div class="col-lg-4">
													<input class="form-control" name="telefone" id="phone" required="required">
												</div>
											</div><br>
										</div>
									</div>
								</div>
								
								<!---- Atualizar ----->
										
								<div class="form-group">
									<div class="col-lg-4"></div>
									<div class="col-lg-6"><br><br>
										<input type="submit" class="btn btn-primary" name="submit" value="Atualizar Perfil"></button>
									</div>
								</div>				
							</div>
						</div>
					</div><br><br><br><br><?php include_once('../config/footer.php');?><br><br>
				</div>
			</div>
		
			<script src="../bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
			<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
			<script src="../bower_components/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
			<script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>
			<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
			<script>
			$(document).ready(function($)
			{
				$('#phone').mask("(99) 9999-9999", {placeholder: "(99) 9999-9999"});
			});
		</script>

			<script>
				$(":input").inputmask();

				$("#phone").inputmask({"mask": "(999) 999-9999"});
			</script>
		</form>
	</body>
</html>
