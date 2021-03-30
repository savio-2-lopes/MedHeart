<?php
session_start();
if (!(isset($_SESSION['login']))) {
	header('location:../index.php');
}
include('../config/DbFunction.php');
$obj 	= 	new DbFunction();
$rs 	= 	$obj->showMedico();
if (isset($_POST['submit'])) {
	include('conexao.php');

	/***** Criando as instâncias *****/

	$tipo_lab 		= 	$_POST['tipo_lab'];
	$medico 		= 	$_POST['medico'];
	$quantidade 	= 	$_POST['quantidade'];
	$data_registro 	= 	$_POST['data_registro'];

	/***** Pegando os dados do bd *****/

	$query = mysqli_query($conexao, "INSERT INTO cad_lab(`tipo_lab`, `medico`, `quantidade`, `data_registro`)VALUES('$tipo_lab','$medico','$quantidade', '$data_registro')");

	/************* Verificando ***********/

	if ($query) {
		echo "<script language='javascript'>window.alert('Laboratório cadastrado com sucesso!'); </script>";
		echo "<script>window.location.href='ver_lab.php'</script>";
	} else {
		echo "<script language='javascript'>window.alert('Ocorreu um erro ao cadastrar o Laboratório!');</script>";
		echo "<script>window.location.href='adicionar_lab.php'</script>";
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

	<title>Cadastrar Laboratório</title>

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
							<li class="active"><span id="" style="color:#00bd9c;">Cadastro</li></span>
						</ol>
					</section>
				</div><br>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<span id="" style="color:#666666;">
									<strong>
										Cadastro de Laboratório
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
												<select class="form-control" name="medico" id="medico" onchange="showMedico(this.value)" required="required">
													<option VALUE="">SELECIONE</option>

													<!--- Utilizar objeto importado --->

													<?php
													while ($res = $rs->fetch_object()) {
													?>

														<option VALUE="<?php echo htmlentities($res->id); ?>"><?php echo htmlentities($res->nome_medico) ?></option>
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
									<input type="submit" class="btn btn-primary" name="submit" value="Cadastrar Laboratório"></button><br>
								</div>
							</div>
						</div><br><br><br>
					</div>
				</div><?php include_once('../config/footer.php'); ?>
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