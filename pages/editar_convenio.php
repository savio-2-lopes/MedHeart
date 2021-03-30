<?php
session_start();

if (!(isset($_SESSION['login']))) {
	header('location:../index.php');
}
include('../config/DbFunction.php');
$obj = new DbFunction();

if (isset($_POST['submit'])) {
	include('conexao.php');

	$nome = $_POST['nome'];
	$code = $_POST['code'];

	$id = $_GET['id'];
	$query = mysqli_query($conexao, "UPDATE convenio set nome ='$nome', code ='$code' where id='$id'");

	if ($query) {
		echo "<script language='javascript'>window.alert('Convênio editado com sucesso!'); </script>";
		echo "<script>window.location.href='ver_convenio.php'</script>";
	} else {
		echo "<script language='javascript'>window.alert('Ocorreu um erro ao editar o Convênio!');</script>";
		echo "<script>window.location.href='editar_convenio.php'</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Editar Convênio</title>

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
									<span id="" style="color:#00bd9c;">
										<i class="fa fa-dashboard"></i>
									</span>
									<span id="" style="color:#00bd9c;">&nbsp;Home</span>
								</a>
							</li>

							<li class="active">
								<span id="" style="color:#00bd9c;">
									Convênio
								</span>
							</li>

							<li class="active">
								<span id="" style="color:#00bd9c;">
									Editar
								</span>
							</li>
						</ol>
					</section>
				</div>

				<br><br>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<span id="" style="color:#666666;">
									<strong>
										Editar Convênio
									</strong>
								</span>
							</div><br>

							<div class="panel-body">
								<div class="row">
									<div class="col-lg-10">

										<!--- Nome do Convênio--->

										<div class="form-group">
											<div class="col-lg-5">
												<span id="" style="color:#666666;">
													<label>
														Empresa que concedeu Convênio
														<span id="" style="font-size:11px;color:red">
															*
														</span>
													</label>
												</span>
											</div>

											<div class="col-lg-7">
												<input class="form-control" name="nome" id="nome" required="required">
											</div>
										</div><br><br>

										<!--- Código do Convênio--->

										<div class="form-group">
											<div class="col-lg-5">
												<span id="" style="color:#666666;">
													<label>
														Código de Verificação
														<span id="" style="font-size:11px;color:red">
															*
														</span>
													</label>
												</span>
											</div>

											<div class="col-lg-4">
												<input class="form-control" name="code" id="code" required="required">
											</div>
										</div>
									</div>
								</div>
							</div>

							<!--- Cadastrar Convênio --->

							<div class="form-group">
								<div class="col-lg-4"></div>
								<div class="col-lg-6"><br><br><br>
									<input type="submit" class="btn btn-primary" name="submit" value="Editar Convênio"></button><br>
								</div>
							</div>
						</div><br><br><br><br><br><br>
					</div>
				</div><br><?php include_once('../config/footer.php'); ?><br><br>
			</div>
		</div>

		<script type="text/javascript" src="../dist/js/sb-admin-2.js"></script>
		<script type="text/javascript" src='locale/pt-br.js'></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.6/metisMenu.js"></script>

	</form>
</body>

</html>