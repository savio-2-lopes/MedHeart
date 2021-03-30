<?php
session_start();
if (!(isset($_SESSION['login']))) {
	header('location:../index.php');
}
include('conexao.php');					// Conexão com o Banco de dados
include('../config/DbFunction.php');	// Conexao com os Objeto
$obj = new DbFunction();				// Iniciando Objetos
$rs  = $obj->showLab();					// Importando Objeto
$rs1 = $obj->showMedico();

if (isset($_GET['del'])) {
	$obj->deletar_lab(intval($_GET['del']));
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

	<title>Ver Laboratório</title>

	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../bower_components/metisMenu/dist/metisMenu.min.css">
	<link rel="stylesheet" href="../dist/css/sb-admin-2.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css" type="text/css">
</head>

<body>
	<form method="post">

		<br><br>

		<div id="wrapper">
			<?php include('leftbar.php'); ?>
			<?php include('../config/header.php'); ?>

			<div id="page-wrapper">

				<br><br><br>

				<div class="content-wrapper">
					<section class="content-header">
						<ol class="breadcrumb">
							<li>
								<a href="inicio.php">
									<span id="" style="color:#00bd9c;"><i class="fa fa-dashboard"></i></span>
									<span id="" style="color:#00bd9c;">&nbsp;&nbsp;Home</span>
								</a>
							</li>

							<li class="active"><span id="" style="color: #00bd9c;">Laboratório</li></span>
							<li class="active"><span id="" style="color: #00bd9c;">Visualizar</li></span>
						</ol>
					</section>
				</div><br>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<span id="" style="color:#666666;"><strong>Ver Laboratório</strong></span>
							</div>

							<br>

							<div class="panel-body">
								<div class="dataTable_wrapper">
									<table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr>
												<th><span id="" style="color:#666666;"><strong>#</strong>&nbsp;&nbsp;</th>
												<th><span id="" style="color:#666666;"><strong>Tipo de Laboratório</strong></th>
												<th><span id="" style="color:#666666;"><strong>Médico</strong></th>
												<th><span id="" style="color:#666666;"><strong>Quantidade</strong></th>
												<th><span id="" style="color:#666666;"><strong>Data Registro</strong></th>
												<th><span id="" style="color:#666666;"><strong>Ação</strong></th>
											</tr>
										</thead>

										<tbody>
											<?php
											$sn = 1;
											while ($res = $rs->fetch_object()) {
											?>
												<tr class="odd gradeX">
													<td>
														<span id="" style="color:#666666;"><?php echo $sn ?></span>
													</td>

													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->tipo_lab)); ?></span>
													</td>

													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->medico)); ?></span>
													</td>

													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->quantidade)); ?></span>
													</td>

													<td>
														<span id="" style="color:#666666;"><?php echo htmlentities(strtolower($res->data_registro)); ?></span>
													</td>

													<td>
														<a href="editar_lab.php?id=
															<?php echo htmlentities($res->id); ?>">
															<span class="btn btn-success ">
																<i class="fa fa-edit"></i>
																&nbsp;Editar
															</span>
														</a>

														<a href="realtorio_lab.php">
															<span class="btn btn-info">
																<i class="fa fa-eye"></i>
																&nbsp;Imprimir
															</span>
														</a>

														<a href="ver_lab.php?del=
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
					</div><br><br><br>
				</div><?php include_once('../config/footer.php'); ?><br><br><br><br>
			</div>
		</div>
	</form>

	<script src="../bower_components/jquery/dist/jquery.min.js"></script>
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
	<script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
	<script src="../dist/js/sb-admin-2.js"></script>
	<script src="js/jpersonalizado.js"></script>

	<script>
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				"language": {
					"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
				}

			});
		});
	</script>

</body>

</html>