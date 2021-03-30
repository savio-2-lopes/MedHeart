<?php
session_start();
if (!(isset($_SESSION['login']))) {
	header('location:../index.php');
}
include('../config/DbFunction.php');

$obj = new DbFunction();
$rs2 = $obj->showMed();
$rs1 = $obj->showPaciente();

if (isset($_POST['submit'])) {
	include('conexao.php');


	$titulo 		= 	$_POST['titulo'];
	$data 			= 	$_POST['data'];
	$paciente 		= 	$_POST['paciente'];
	$historico 		= 	$_POST['historico'];
	$medicamento 	= 	$_POST['medicamento'];
	$anotacoes 		= 	$_POST['anotacoes'];

	/***** Pegando valores do DB ******/

	$query = mysqli_query($conexao, "INSERT INTO cadprescricao(titulo, data, paciente, historico, medicamento, anotacoes)VALUES('$titulo', '$data','$paciente','$historico', '$medicamento', '$anotacoes')");

	/************* Verificando ***********/

	if ($query) {
		echo "<script language='javascript'>window.alert('Prescrição cadastrado com sucesso!'); </script>";
		echo "<script>window.location.href='ver_prescricoes.php'</script>";
	} else {
		echo "<script language='javascript'>window.alert('Ocorreu um erro ao cadastrar a Prescrição!');</script>";
		echo "<script>window.location.href='cad_prescricao.php'</script>";
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

	<title>Prescrição</title>

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

							<li class="active"><span id="" style="color:#00bd9c;">Prescrições</li></span>
							<li class="active"><span id="" style="color:#00bd9c;">Cadastro</li></span>
						</ol>
					</section>
				</div><br>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<span id="" style="color:#666666;"><strong>Adicionar Prescrição</strong></span>
							</div><br>

							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">

										<!--------- Titulo ------------>

										<div class="form-group">
											<div class="col-lg-2">
												<label>
													<span id="" style="color:#666666;">Título</span>
													<span id="" style="font-size:11px;color:red">
														*
													</span>
												</label>
											</div>

											<div class="col-lg-4">
												<input name="titulo" class="form-control" id="titulo" required="required">
												<span id="med-availability-status" style="font-size:12px;"></span>
											</div>

											<!--------- Data ------------>

											<div class="col-lg-2">
												<label>
													<span id="" style="color:#666666;">Data</span>
													<span id="" style="font-size:11px;color:red">
														*
													</span>
												</label>
											</div>

											<div class="col-lg-3">
												<input type="date" name="data" class="form-control" id="data" required="required" onblur="horarioAvailability()">
												<span id="med-availability-status" style="font-size:12px;"></span>
											</div>
										</div><br><br>

										<!------- Paciente --------->

										<div class="form-group">
											<div class="col-lg-2">
												<label>
													<span id="" style="color:#666666;">Paciente</span>
													<span id="" style="font-size:11px;color:red">
														*
													</span>
												</label>
											</div>

											<div class="col-lg-4">
												<select class="form-control" name="paciente" id="paciente" onchange="showSub(this.value)" required="required">
													<option VALUE="">SELECIONE</option>
													<?php
													while ($res = $rs1->fetch_object()) {
													?>
														<option VALUE="
															<?php echo htmlentities($res->id); ?>">
															<?php echo htmlentities($res->primeiro_nome) ?>
														</option>
													<?php } ?>
												</select>
											</div>

											<!------------------- Tempo ----------------->

											<div class="col-lg-2">
												<label>
													<span id="" style="color:#666666;">Horário</span>
													<span id="" style="font-size:11px;color:red">
														*
													</span>
												</label>
											</div>

											<div class="col-lg-3">
												<input type="time" id="historico" name="historico" class="form-control">
											</div>
										</div><br><br>

										<!------------ Medicamento ------------->

										<div class="form-group">
											<div class="col-lg-2">
												<label>
													<span id="" style="color:#666666;">Medicamento</span>
												</label>
											</div>

											<div class="col-lg-4">
												<select class="form-control" name="medicamento" id="medicamento" onchange="showSub(this.value)" required="required">
													<option VALUE="">SELECIONE</option>
													<?php while ($ress = $rs2->fetch_object()) { ?>
														<option VALUE="
																<?php echo htmlentities($ress->id); ?>">
															<?php echo htmlentities($ress->nome_medicamento) ?>
														</option>
													<?php } ?>
												</select>
											</div>
										</div><br><br>

										<!------------------- Descrição ----------------->

										<div class="form-group">
											<div class="col-lg-2">
												<label>
													<span id="" style="color:#666666;">Descrição </span>
													<span id="" style="font-size:11px;color:red">
														*
													</span>
												</label>
											</div>

											<div class="col-lg-10">
												<textarea id="anotacoes" name="anotacoes" rows="8" class="form-control"></textarea>
											</div><br><br>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!----- Cadastrar Prescrição ------->

						<div class="form-group">
							<div class="col-lg-4"></div>
							<div class="col-lg-6">
								<input type="submit" class="btn btn-primary" name="submit" value="Cadastrar Prescrição"></button>
							</div>
						</div>
					</div><br>
				</div><br><br><?php include_once('../config/footer.php'); ?><br>
			</div>
		</div>
		</div>
	</form>

	<script type="text/javascript" src="../dist/js/sb-admin-2.js"></script>
	<script type="text/javascript" src='locale/pt-br.js'></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.6/metisMenu.js"></script>

	</form>
</body>

</html>