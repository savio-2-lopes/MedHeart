<?php
session_start();
if (!(isset($_SESSION['login']))) {
	header('location:../index.php');
}
if (isset($_POST['submit'])) {
	include('conexao.php');

	$nome_medicamento 	= 	$_POST['nome_medicamento'];
	$categoria 			= 	$_POST['categoria'];
	$efeito 			=	$_POST['efeito'];
	$quantidade 		= 	$_POST['quantidade'];
	$preco 				= 	$_POST['preco'];
	$data_validade 		= 	$_POST['data_validade'];

	$query = mysqli_query($conexao, "INSERT INTO cad_medicamento(nome_medicamento, categoria, efeito, quantidade, preco, data_validade)VALUES('$nome_medicamento','$categoria','$efeito', '$quantidade', '$preco', '$data_validade')");

	if ($query) {
		echo "<script language='javascript'>window.alert('Medicamento cadastrado com sucesso!'); </script>";
		echo "<script>window.location.href='ver_medicamentos.php'</script>";
	} else {
		echo "<script language='javascript'>window.alert('Ocorreu um erro, ao cadastrar o medicamento!');</script>";
		echo "<script>window.location.href='adicionar_medicamento.php'</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<link rel="shortcut icon" href="img/ico_hospital.png" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Cadastrar medicamento</title>

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

							<li class="active"><span id="" style="color:#00bd9c;">Medicamento</li></span>
							<li class="active"><span id="" style="color:#00bd9c;">Cadastro</li></span>
						</ol>
					</section>
				</div><br>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<span id="" style="color:#666;"><strong>Adicionar Medicamento</strong></span>
							</div><br>

							<div class="panel-body">
								<div class="row">
									<div class="col-lg-10">

										<!--- Nome do Medicamento --->

										<div class="form-group">
											<div class="col-lg-3">
												<span id="" style="color:#666;">
													<label>
														Nome
														<span id="" style="font-size:11px;color:red">
															*
														</span>
													</label>
												</span>
											</div>

											<div class="col-lg-9">
												<input class="form-control" name="nome_medicamento" id="nome_medicamento" required="required" onblur="medAvailability()">
												<span id="med-availability-status" style="font-size:12px;"></span>
											</div>
										</div><br><br>

										<!--- Categoria do Medicamento --->

										<div class="form-group">
											<div class="col-lg-3">
												<span id="" style="color:#666;">
													<label>
														Categoria
														<span id="" style="font-size:11px;color:red">
															*
														</span>
													</label>
												</span>
											</div>

											<div class="col-lg-8">
												<input class="form-control" name="categoria" id="categoria" required="required">
											</div>
										</div><br><br>

										<!--- Efeito do Medicamento --->

										<div class="form-group">
											<div class="col-lg-3">
												<span id="" style="color:#666;">
													<label>
														Sintomas
														<span id="" style="font-size:11px;color:red">
															*
														</span>
													</label>
												</span>
											</div>

											<div class="col-lg-6">
												<textarea class="form-control" rows="3" name="efeito" id="efeito" required="required"></textarea>
											</div>
										</div><br><br><br><br>

										<!--- Quantidade do Medicamento --->

										<div class="form-group">
											<div class="col-lg-3">
												<span id="" style="color:#666;">
													<label>
														Quantidade
														<span id="" style="font-size:11px;color:red">
															*
														</span>
													</label>
												</span>
											</div>

											<div class="col-lg-3">
												<input class="form-control" type="number" min="1" name="quantidade" id="quantidade" required="required">
											</div>
										</div><br><br>

										<!--- Preço do Medicamento --->

										<div class="form-group">
											<div class="col-lg-3">
												<span id="" style="color:#666;">
													<label>
														Preço
														<span id="" style="font-size:11px;color:red">
															*
														</span>
													</label>
												</span>
											</div>

											<div class="col-lg-3">
												<input class="form-control" name="preco" placeholder="R$ 00.00" id="preco" required="required">
											</div>
										</div><br><br>

										<!--- Data de Validade do Medicamento --->

										<div class="form-group">
											<div class="col-lg-3">
												<span id="" style="color:#666;">
													<label>
														Data de Validade
														<span id="" style="font-size:11px;color:red">
															*
														</span>
													</label>
												</span>
											</div>

											<div class="col-lg-4">
												<input class="form-control" type="date" name="data_validade" id="data_validade" required="required">
												<span id="data_validade" style="font-size:12px;"></span>
											</div>
										</div><br>
									</div>
								</div>
							</div>

							<!--- Cadastrar Medicamento --->

							<div class="form-group">
								<div class="col-lg-4"></div>
								<div class="col-lg-6"><br><br>
									<input type="submit" class="btn btn-primary" name="submit" value="Cadastrar Medicamento"></button>
								</div>
							</div>
						</div><br><br><br><br>
					</div>
				</div><?php include_once('../config/footer.php'); ?>
			</div>
		</div>

		<script type="text/javascript" src="../dist/js/sb-admin-2.js"></script>
		<script type="text/javascript" src='locale/pt-br.js'></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.6/metisMenu.js"></script>

		<script>
			function medAvailability() {
				$("#loaderIcon").show();
				jQuery.ajax({
					url: "medicamento_aval.php",
					data: 'nome_medicamento=' + $("#nome_medicamento").val(),
					type: "POST",

					success: function(data) {
						$("#med-availability-status").html(data);
						$("#loaderIcon").hide();
					},
					error: function() {}
				});
			}
		</script>

	</form>
</body>

</html>