<?php
session_start();

if (!(isset($_SESSION['login']))) {
	header('location:../index.php');
}
include('../config/DbFunction.php');

$obj = new DbFunction();
$rs = $obj->showMedico();

if (isset($_POST['submit'])) {
	include('conexao.php');

	$tipo_lab 		= $_POST['tipo_lab'];
	$medico 		= $_POST['medico'];
	$quantidade 	= $_POST['quantidade'];
	$data_registro 	= $_POST['data_registro'];

	$id = $_GET['id'];
	$query = mysqli_query($conexao, "UPDATE cad_lab set tipo_lab='$tipo_lab',  medico='$medico', quantidade='$quantidade', data_registro='$data_registro' where id='$id'");

	if ($query) {
		echo "<script language='javascript'>window.alert('Laboratório editado com sucesso!'); </script>";
		echo "<script>window.location.href='ver_lab.php'</script>";
	} else {
		echo "<script language='javascript'>window.alert('Ocorreu um erro ao editar o Laboratório!');</script>";
		echo "<script>window.location.href='editar_lab.php'</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title> MedHeart </title>
	<link rel="shortcut icon" href="img/ico_hospital.png" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Cadastrar Laboratório</title>

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

							<li class="active"><span id="" style="color:#00bd9c;">Laboratório</li></span>
							<li class="active"><span id="" style="color:#00bd9c;">Editar</li></span>
						</ol>
					</section>
				</div><br>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<span id="" style="color:#666666;">
									<strong>
										Editar de Laboratório
									</strong>
								</span>
							</div><br>

							<div class="panel-body">
								<div class="row">
									<div class="col-lg-10">

										<!--- Nome do Laboratório --->

										<div class="form-group">
											<div class="col-lg-4">
												<span id="" style="color:#666666;">
													<label>
														Tipo do Laboratório
														<span id="" style="font-size:11px;color:red">
															*
														</span>
													</label>
												</span>
											</div>

											<div class="col-lg-6">
												<input class="form-control" name="tipo_lab" id="tipo_lab" required="required">
											</div>
										</div><br><br>

										<!--- Médico responsável pelo Laboratório --->

										<div class="form-group">
											<div class="col-lg-4">
												<span id="" style="color:#666666;">
													<label>
														Médico do Laboratório
														<span id="" style="font-size:11px;color:red">
															*
														</span>
													</label>
												</span>
											</div>

											<div class="col-lg-6">
												<select class="form-control" name="medico" id="medico" onchange="showSub(this.value)" required="required">
													<option VALUE="">SELECIONE</option>

													<!--- Utilizar objeto importado --->

													<?php
													while ($res = $rs->fetch_object()) {
													?>

														<option VALUE="
															<?php echo htmlentities($res->id); ?>">
															<?php echo htmlentities($res->nome_medico) ?>
														</option>
													<?php } ?>
												</select>
											</div>
										</div><br><br>

										<!--- Quantidades de Laboratórios --->

										<div class="form-group">
											<div class="col-lg-4">
												<span id="" style="color:#666666;">
													<label>
														Quantidade de Laboratórios
														<span id="" style="font-size:11px;color:red">
															*
														</span>
													</label>
												</span>
											</div>

											<div class="col-lg-2">
												<input class="form-control" type="number" min="1" name="quantidade" id="quantidade" required="required">
											</div>
										</div><br><br>

										<!--- Data de registro do Laboratório --->

										<div class="form-group">
											<div class="col-lg-4">
												<span id="" style="color:#666666;">
													<label>Data de Registro</label>
												</span>
											</div>

											<div class="col-lg-3">
												<input class="form-control" type="date" name="data_registro" id="data_registro">
											</div>
										</div>
									</div>
								</div>
							</div>

							<!--- Cadastrar Laboratório --->

							<div class="form-group">
								<div class="col-lg-4"></div>
								<div class="col-lg-6"><br><br>
									<input type="submit" class="btn btn-primary" name="submit" value="Editar Laboratório"></button><br>
								</div>
							</div>
						</div><br><br><br>
					</div>
				</div><?php include_once('../config/footer.php'); ?>
			</div>
		</div>

		<script src="../bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
		<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="../bower_components/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
		<script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>
	</form>
</body>

</html>