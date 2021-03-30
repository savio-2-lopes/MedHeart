<?php
session_start();
if (!(isset($_SESSION['login']))) {
	header('location:../index.php');
}
if (isset($_POST['submit'])) {
	include('conexao.php');

	$nome_medico 	= $_POST['nome_medico'];
	$telefone  		= $_POST['telefone'];
	$departamento 	= $_POST['departamento'];
	$login 			= $_POST['login'];
	$educacao 		= $_POST['educacao'];
	$experiencia 	= $_POST['experiencia'];

	$query = mysqli_query($conexao, "INSERT INTO cadmedico(`nome_medico`, `telefone`, `departamento`, `login`, `educacao`, `experiencia`)VALUES('$nome_medico', '$telefone', '$departamento', '$login', '$educacao', '$experiencia')");

	if ($query) {
		echo "<script language='javascript'>window.alert('Médico cadastrado com sucesso!'); </script>";
		echo "<script>window.location.href='ver_medico.php'</script>";
	} else {
		echo "<script language='javascript'>window.alert('Ocorreu um erro ao cadastrar o médico!');</script>";
		echo "<script>window.location.href='adicionar_medico.php'</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<link rel="shortcut icon" href="img/ico_hospital.png" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script src='locale/pt-br.js'></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Adicionar Médico</title>

	<link rel="shortcut icon" href="img/ico_hospital.png" />
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../bower_components/metisMenu/dist/metisMenu.min.css">
	<link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../dist/css/sb-admin-2.css">
</head>

<body>
	<form method="post"><br><br>
		<div id="wrapper">

			<!--- Leftbar --->

			<?php include('leftbar.php'); ?>
			<?php include('../config/header.php'); ?>

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
							<li class="active"><span id="" style="color:#00bd9c;">Cadastro</li></span>
						</ol>
					</section>
				</div><br>

				<!--- Informações pessoais do Médico --->

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<span id="" style="color:#666;"><strong>Informações Pessoais do Médico</strong></span>
							</div>

							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group"><br>

											<!--- Nome do Médico --->

											<div class="col-lg-2">
												<label>
													<span id="" style="color:#666;"><strong>Nome</strong></span>
													<span id="" style="font-size:11px;color:red">
														*
													</span>
												</label>
											</div>

											<div class="col-lg-4">
												<input class="form-control" name="nome_medico" required="required">
											</div>

											<!--- Departamento --->

											<div class="col-lg-2">
												<span id="" style="color:#666;"><strong><label>Departamento</label></strong></span>
											</div>

											<div class="col-lg-4">
												<input class="form-control" name="departamento">
											</div>
										</div><br>

										<!------- Formação ------>

										<div class="form-group"><br>
											<div class="col-lg-2">
												<span id="" style="color:#666;"><strong><label>Formação
															<span id="" style="font-size:11px;color:red">
																*
															</span> </strong></span>
												</label>
											</div>

											<div class="col-lg-4">
												<input class="form-control" name="educacao">
											</div>

											<!------- especialização ------>

											<div class="col-lg-2">
												<span id="" style="color:#666;"><strong>
														<label>Especialização
															<span id="" style="font-size:11px;color:red">
																*
															</span></strong>
													</label>
												</span>
											</div>

											<div class="col-lg-4">
												<input class="form-control" name="experiencia">
											</div>
										</div><br><br>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!------- Contato para informações ------>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<span id="" style="color:#666;"><strong><label>Contato para Informações</strong></span>
							</div>

							<!------- Contato para informações ------>

							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group"><br>

											<!------- Telefone ------>

											<div class="col-lg-2">
												<label>
													<span id="" style="color:#666;"><strong><label>Telefone</strong></span>
													<span id="" style="font-size:11px;color:red">
														*
													</span>
												</label>
											</div>

											<div class="col-lg-4">
												<input class="form-control" name="telefone" id="phone">
											</div>

											<!------- Email ------>

											<div class="col-lg-2">
												<span id="" style="color:#666;"><strong><label>Email
															<span id="" style="font-size:11px;color:red">
																*
															</span></strong></span>
												</label>
											</div>

											<div class="col-lg-4">
												<input class="form-control" type="email" name="login">
											</div>
										</div><br><br>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!---------- Cadastrar Médico --------------->

					<div class="form-group">
						<div class="col-lg-4"></div>
						<div class="col-lg-6">
							<input type="submit" class="btn btn-primary" name="submit" value="Cadastrar Médico"></button>
						</div>
					</div>
				</div><br><br><?php include_once('../config/footer.php'); ?>
			</div>
		</div>
	</form>

	<script type="text/javascript" src="../dist/js/sb-admin-2.js"></script>
	<script type="text/javascript" src='locale/pt-br.js'></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.6/metisMenu.js"></script>

	<script>
		$(document).ready(function($) {
			$('#phone').mask("(99) 9999-9999", {
				placeholder: "(99) 9999-9999"
			});
		});
	</script>

	<script>
		$(":input").inputmask();

		$("#phone").inputmask({
			"mask": "(999) 999-9999"
		});
	</script>
</body>

</html>