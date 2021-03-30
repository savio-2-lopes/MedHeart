<?php
session_start();
if (!(isset($_SESSION['login']))) {
	header('location:../index.php');
}
include('../config/DbFunction.php');
$obj = new DbFunction();
$rs = $obj->showConvenio();
if (isset($_POST['submit'])) {
	include('conexao.php');

	$primeiro_nome 		= 	$_POST['primeiro_nome'];
	$nome_meio  		= 	$_POST['nome_meio'];
	$ultimo_nome 		= 	$_POST['ultimo_nome'];
	$genero 			= 	$_POST['genero'];
	$data_nascimento 	= 	$_POST['data_nascimento'];
	$guardiao 			= 	$_POST['guardiao'];
	$ocupacao 			= 	$_POST['ocupacao'];
	$status 			= 	$_POST['status'];
	$tipo_sanguineo 	= 	$_POST['tipo_sanguineo'];
	$religiao 			= 	$_POST['religiao'];
	$telefone 			= 	$_POST['telefone'];
	$email 				= 	$_POST['email'];
	$alergia 			= 	$_POST['alergia'];
	$codigo_convenio 	= 	$_POST['codigo_convenio'];

	$query = mysqli_query($conexao, "INSERT INTO cadpaciente
		(
			`primeiro_nome`, 
			`nome_meio`, 
			`ultimo_nome`, 
			`genero`, 
			`data_nascimento`, 
			`guardiao`, 
			`ocupacao`, 
			`status`, 
			`tipo_sanguineo`, 
			`religiao`, 
			`telefone`, 
			`email`, 
			`alergia`, 
			`codigo_convenio`
		)
		VALUES
		(
			'$primeiro_nome', 
			'$nome_meio', 
			'$ultimo_nome', 
			'$genero', 
			'$data_nascimento', 
			'$guardiao', 
			'$ocupacao', 
			'$status', 
			'$tipo_sanguineo', 
			'$religiao', 
			'$telefone', 
			'$email', 
			'$alergia', 
			'$codigo_convenio'
		)");

	if ($query) {
		echo "<script language='javascript'>window.alert('Paciente cadastrado com sucesso!'); </script>";
		echo "<script>window.location.href='ver_paciente.php'</script>";
	} else {
		echo "<script language='javascript'>window.alert('Ocorreu um erro ao cadastrar o Paciente!');</script>";
		echo "<script>window.location.href='adicionar_paciente.php'</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script src='locale/pt-br.js'></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Adicionar Paciente</title>

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

							<li class="active"><span id="" style="color:#00bd9c;">Paciente</li></span>
							<li class="active"><span id="" style="color:#00bd9c;">Cadastro</li></span>
						</ol>
					</section>
				</div><br>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">

							<!---- Cadastro do Paciente ---->

							<div class="panel-heading">
								<span id="" style="color:#666666;">
									<strong>Informações Pessoais do Paciente</strong>
								</span>
							</div>

							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group"><br>

											<!---- Primeiro Nome do Paciente ---->

											<div class="col-lg-2">
												<label>
													<span id="" style="color:#666666;">
														Primeiro Nome
													</span>

													<span id="" style="font-size:11px;color:red">
														*
													</span>
												</label>
											</div>

											<div class="col-lg-4">
												<input class="form-control" name="primeiro_nome" required="required">
											</div>

											<!---- Nome do meio do Paciente ---->

											<div class="col-lg-2">
												<label>
													<span id="" style="color:#666666;">
														Nome do Meio
													</span>

													<span id="" style="font-size:11px;color:red">
														*
													</span>
												</label>
											</div>

											<div class="col-lg-4">
												<input class="form-control" name="nome_meio">
											</div>
										</div><br><br>

										<!---- Nome Final do Paciente ---->

										<div class="form-group">
											<div class="col-lg-2">
												<label>
													<span id="" style="color:#666666;">
														Último Nome
													</span>

													<span id="" style="font-size:11px;color:red">
														*
													</span>
												</label>
											</div>

											<div class="col-lg-4">
												<input class="form-control" name="ultimo_nome">
											</div>

											<!---- Gênero do Paciente ---->

											<div class="col-lg-2">
												<label>
													<span id="" style="color:#666666;">
														Gênero
													</span>

													<span id="" style="font-size:11px;color:red">
														*
													</span>
												</label>
											</div>

											<div class="col-lg-4">
												<input type="radio" name="genero" id="masculino" value="masculino">
												&nbsp;
												<span id="" style="color:#666666;">
													Masculino
												</span>
												&nbsp;

												<input type="radio" name="genero" id="feminino" value="feminino">
												&nbsp;
												<span id="" style="color:#666666;">
													Feminino
												</span>
												&nbsp;

												<input type="radio" name="genero" id="outros" value="outros">
												&nbsp;
												<span id="" style="color:#666666;">
													Outros
												</span>
												&nbsp;
											</div>
										</div><br><br>

										<!---- Data de Nascimento do Paciente ---->

										<div class="form-group">
											<div class="col-lg-2">
												<label>
													<span id="" style="color:#666666;">
														Nascimento
													</span>

													<span id="" style="font-size:11px;color:red">
														*
													</span>
												</label>
											</div>

											<div class="col-lg-4">
												<input class="form-control" type="date" name="data_nascimento" required="required">
											</div>

											<!---- Nome dos Pais/Guardiões do Paciente ---->

											<div class="form-group">
												<div class="col-lg-2">
													<label>
														<span id="" style="color:#666666;">
															Guardião Legal
														</span>

														<span id="" style="font-size:11px;color:red">
															*
														</span>
													</label>
												</div>

												<div class="col-lg-4">
													<input class="form-control" name="guardiao" required="required">
												</div><br><br><br>

												<!---- Ocupações do Paciente ---->

												<div class="col-lg-2">
													<label>
														<span id="" style="color:#666666;">
															Ocupação
														</span>

														<span id="" style="font-size:11px;color:red">
															*
														</span>
													</label>
												</div>

												<div class="col-lg-4">
													<input class="form-control" name="ocupacao" id="ocupacao">
												</div>

												<!---- Tipo Sanguineo do Paciente ---->

												<div class="col-lg-2">
													<label>
														<span id="" style="color:#666666;">
															Tipo Sanguineo
														</span>
													</label>
												</div>

												<div class="col-lg-4">
													<select class="form-control" name="tipo_sanguineo" id="tipo_sanguineo" required="required">
														<option VALUE="">SELECIONE</option>
														<option VALUE="A+"> A+ </option>
														<option VALUE="A-"> A- </option>
														<option VALUE="B+"> B+ </option>
														<option VALUE="B-"> B- </option>
														<option VALUE="AB+">AB+ </option>
														<option VALUE="AB-">AB- </option>
														<option VALUE="O+"> O+ </option>
														<option value="O-"> O- </option>
													</select>
												</div>
											</div><br><br>

											<!---- Status do  Paciente ---->

											<div class="form-group">
												<div class="col-lg-2">
													<label>
														<span id="" style="color:#666666;">
															Endereço
														</span>
													</label>
												</div>

												<div class="col-lg-4">
													<textarea class="form-control" rows="8" name="status" id="status"></textarea>
												</div>
											</div>

											<!---- Religião do Paciente ---->

											<div class="col-lg-2">
												<label>
													<span id="" style="color:#666666;">
														Religião
													</span>

													<span id="" style="font-size:11px;color:red">
														*
													</span>
												</label>
											</div>

											<div class="col-lg-4">
												<input class="form-control" name="religiao" id="religiao">
											</div>
										</div><br><br><br><br>
									</div>
								</div><br><br>
							</div>
						</div>

						<!---- Contato do Paciente ---->

						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">

										<span id="" style="color:#666666;">
											<strong>Contato para Informações</strong>
										</span>

									</div>

									<!---- Número do paciente do Paciente ---->

									<div class="panel-body">
										<div class="row">
											<div class="col-lg-12">
												<div class="form-group"><br>
													<div class="col-lg-2">
														<label>
															<span id="" style="color:#666666;">
																Telefone
															</span>

															<span id="" style="font-size:11px;color:red">
																*
															</span>
														</label>
													</div>

													<div class="col-lg-4">
														<input class="form-control" name="telefone" id="phone">
													</div>

													<!---- Email do Paciente ---->

													<div class="col-lg-2">
														<label>
															<span id="" style="color:#666666;">
																Email
															</span>

															<span id="" style="font-size:11px;color:red">
																*
															</span>
														</label>
													</div>

													<div class="col-lg-4">
														<input class="form-control" type="email" name="email">
													</div>
												</div><br><br>

												<div class="col-lg-4"></div>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												<span id="" style="color:#666666;">
													<strong>Informações Médicas</strong>
												</span>
											</div>

											<div class="panel-body">
												<div class="row">
													<div class="col-lg-12">
														<div class="form-group">
															<div class="panel panel-default">
																<div class="panel-body">
																	<div class="table-responsive"><br>
																		<table class="table">
																			<thead>
																				<tr>
																					<div class="col-lg-6">
																						<th>
																							&nbsp;&nbsp;&nbsp;&nbsp;
																							<span id="" style="color:#666666;">
																								Alergia
																							</span>

																							<span id="" style="font-size:11px;color:red">
																								*
																							</span>
																						</th>
																					</div>

																					<div class="col-lg-6">
																						<th>
																							&nbsp;&nbsp;&nbsp;&nbsp;
																							<span id="" style="color:#666666;">Código de Convênio</span>
																						</th>
																					</div>
																				</tr>
																			</thead>

																			<tbody>
																				<tr>
																					<td>
																						<div class="col-lg-10">
																							<br><textarea class="form-control" rows="8" name="alergia" id="alergia"></textarea>
																						</div>
																					</td>

																					<td><br>
																						<div class="col-lg-6">
																							<select class="form-control" name="codigo_convenio" id="codigo_convenio" onchange="showSub(this.value)" required="required">
																								<option VALUE="">SELECIONE</option>

																								<!--- Utilizar objeto importado --->
																								<?php while ($res = $rs->fetch_object()) { ?>
																									<option VALUE="
																										<?php echo htmlentities($res->id); ?>">
																										<?php echo htmlentities($res->nome) ?>
																									</option>
																								<?php } ?>
																							</select>
																						</div>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<!----- Cadastrar Paciente ----->

									<div class="form-group">
										<div class="col-lg-4"></div>
										<div class="col-lg-6"><br>
											<input type="submit" class="btn btn-primary" name="submit" value="Cadastrar Paciente"></button>
										</div>
									</div>
								</div>
							</div>
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
		$(document).ready(function($) {
			$('#email').mask("aaaaaa@gmail.com", {
				placeholder: "aaaaaa@gmail.com"
			});
		});
	</script>
</body>

</html>