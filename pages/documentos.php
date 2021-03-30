<?php
session_start();
if (!(isset($_SESSION['login']))) {
	header('location:../index.php');
}
include('conexao.php');
include('../config/DbFunction.php');

$obj	=	new DbFunction();
$rs		=	$obj->showPaciente();
$rs1	=	$obj->showPaciente();		//	Habilitando objeto paciente

if (isset($_GET['del'])) {
	$obj->deletar_arquivos(intval($_GET['del']));
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

	<title>Relatórios do Paciente</title>

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

				<!----- Adicionando Documentos -------->

				<div class="content-wrapper">
					<section class="content-header">
						<ol class="breadcrumb">
							<li>
								<a href="inicio.php">
									<span id="" style="color:#00bd9c;"><i class="fa fa-dashboard"></i></span>
									<span id="" style="color:#00bd9c;">&nbsp;Home</span>
								</a>
							</li>

							<li class="active"><span id="" style="color:#00bd9c;">Pacientes</li></span>
							<li class="active"><span id="" style="color:#00bd9c;">Relatórios</li></span>
						</ol>
					</section>
				</div><br>

				<div class="row">
					<div class="col-lg-12">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">
									Relatórios dos Pacientes
								</h3><br>
							</div><br>

							<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal" style="height: 50px;">
								<i class="fa fa-plus-square"></i>
								Adicionar Novo
							</button><br>

							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header bg-blue" style="height: 60px">
											<button type="button" class="close" data-dismiss="modal">
												&times;
											</button>

											<h4 class="modal-title">
												Adicionar Arquivos
											</h4>
										</div><br>

										<div class="form-group">
											<div class="col-lg-10">
												<label>
													Paciente
												</label>
											</div>

											<div class="col-lg-12">
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
										</div>

										<div class="form-group">
											<div class="col-lg-10"><br>
												<label>
													Titulo
												</label>
											</div>

											<div class="col-lg-12">
												<input class="form-control" name="titulo" id="titulo">
											</div>
										</div>

										<div class="form-group">
											<div class="col-lg-10"><br>
												<td>
													<b>Upload de Relatórios</b></font>
													<input type="file" name="file" id="fileToUpload">
												</td><br>

												<div class="box-footer">
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

													<button type="submit" onclick="myfunction()" name="submit" class="btn btn-primary">
														Cadastrar
													</button>
												</div>
											</div><br><br><br><br><br><br><br><br><br><br><br><br>
	</form>
	</div>
	</div>
	</div>
	</div>

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	<td>
		<a href="./excel_documento.php">
			<button type="button" class="btn btn-default">
				Excel
			</button>
		</a>
	</td>

	&nbsp;&nbsp;

	<td>
		<a href="pdf_documento.php">
			<button type="button" class="btn btn-default">
				PDF
			</button>
		</a>
	</td>

	&nbsp;&nbsp;

	<td>
		<a href="csv_documento.php">
			<button type="button" class="btn btn-default">
				CSV
			</button>
		</a>
	</td>

	&nbsp;&nbsp;

	<td>
		<button type="button" onclick="window.print();" class="btn btn-default">
			Imprimir
		</button>
	</td><br><br><br>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">

				<!--- Visualizar Paciente --->

				<div class="panel panel-default">
					<div class="panel panel-default">
						<div class="panel-heading">
							<span id="" style="color:#666666;"><strong>Consultar Relatório</strong></span>
						</div>

						<!--- Tabela de pacientes --->

						<div class="panel-body">
							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead>
										<tr>
											<th><span id="" style="color:#666666;"><strong>#</strong></span></th>
											<th><span id="" style="color:#666666;"><strong>Nome</strong></span></th>
											<th><span id="" style="color:#666666;"><strong>Email</strong></span></th>
											<th><span id="" style="color:#666666;"><strong>Tipos Sanguíneos</strong></span></th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<th><span id="" style="color:#666666;"><strong>Alergia</strong></span></th>
											<th><span id="" style="color:#666666;"><strong>Telefone</strong></span></th>
											<th><span id="" style="color:#666666;"><strong>Ação</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										</tr>
									</thead>

									<tbody>
										<?php
										$sn			=	1;
										while ($res	=	$rs->fetch_object()) {
										?>

											<!--- Tabela de Pacientes --->

											<tr class="odd gradeX">

												<!--- Contador --->

												<td>
													<span id="" style="color:#666666;"><?php echo $sn ?>
												</td>

												<!--- Primeiro Nome --->

												<td>
													<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->primeiro_nome)); ?>
												</td>

												<!--- Email --->

												<td>
													<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->email)); ?></span>
												</td>

												<!--- Tipo sanguineo --->

												<td>
													<span id="" style="color:#666666;"><?php echo htmlentities(strtoupper($res->tipo_sanguineo)); ?></span>
												</td>

												<!--- Alergia --->

												<td>
													<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->alergia)); ?></span>
												</td>

												<!--- Telefone --->

												<td>
													<span id="" style="color:#666666;"><?php echo htmlentities(strtoupper($res->telefone)); ?></span>
												</td>

												<!--- Ação --->

												<td>
													<!--- Relatório  --->

													<a href="pdf_documento.php">
														<span class="btn btn-info">
															<i class="fa fa-file-text-o"></i>
															&nbsp;Relatório
														</span>
													</a>

													<!--- Excluir --->

													<a href="ver_paciente.php?del=
																		<?php echo htmlentities($res->id); ?>">
														<button type="button" class="btn btn-danger">
															<i class="fa fa-trash-o"></i>
															&nbsp;Excluir
														</button>
												</td>
											</tr>
										<?php $sn++;
										} ?>
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
	</div>
	</div>
	</div>

	<script type="text/javascript" src="../dist/js/sb-admin-2.js"></script>
	<script type="text/javascript" src='locale/pt-br.js'></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.6/metisMenu.js"></script>

	<script>
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				"language": {
					"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
				}
			});
		});
	</script>

	</form>
</body>

</html>