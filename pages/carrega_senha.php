<?php
session_start();
if (isset($_POST['submit'])) {
	include('conexao.php');
	$password	= $_POST['password'];
	$query = mysqli_query($conexao, "UPDATE tbl_login SET password = '$password' WHERE id = 2");

	if ($query) {
		echo "<script language='javascript'>window.alert('Senha atualizado com sucesso!'); </script>";
		echo "<script>window.location.href='inicio.php'</script>";
	} else {
		echo "<script language='javascript'>window.alert('Ocorreu um erro ao atualizar senha!');</script>";
		echo "<script>window.location.href='carrega_senha.php'</script>";
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

	<title>Nova Senha</title>

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

							<li class="active"><span id="" style="color:#00bd9c;">Senha</li></span>
							<li class="active"><span id="" style="color:#00bd9c;">Editar</li></span>
						</ol>
					</section>
				</div><br><br>

				<div class="row">
					<div class="col-lg-12">

						<!--- Atualizar senha --->

						<div class="panel panel-default">
							<div class="panel-heading">
								<span id="" style="color:#666666;"><strong>Editar Senha</strong></span>
							</div>

							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
										<form name="changepassword" method="post" onsubmit="return checkpass();" action="">
											<p style="font-size:16px; color:red" align="center"></p>
											<div class="card-body card-block">

												<!--- Senha Antiga --->

												<div class="form-group">
													<label for="company" class=" form-control-label">
														<span id="" style="color:#666666;">Nova Senha </span>
													</label>

													<input type="password" name="password" id="password" class="form-control" required="">
												</div><br>

												<!--- Confirmar Senha --->

												<div class="form-group">
													<label for="street" class=" form-control-label">
														<span id="" style="color:#666666;">Confirmar Senha</span>
													</label>

													<input type="password" name="password" id="password" value="" class="form-control">
												</div>
											</div>
									</div>
								</div>
							</div>
							<!--- Atualizar Senha --->

							<div class="form-group">
								<div class="col-lg-4"></div>
								<div class="col-lg-6"><br><br>
									<input type="submit" class="btn btn-primary" name="submit" value="Atualizar Senha"></button>
								</div>
							</div>
						</div>
					</div>
				</div><br><br><br><br><?php include_once('../config/footer.php'); ?>
			</div>
		</div>
	</form>

	<script type="text/javascript" src="../dist/js/sb-admin-2.js"></script>
	<script type="text/javascript" src='locale/pt-br.js'></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.6/metisMenu.js"></script>

</body>

</html>