<?php
	session_start ();

	if (! (isset ( $_SESSION ['login'] ))) 
	{
		header ( 'location:../index.php' );
	} 
	include('conexao.php');
	include('../config/DbFunction.php');
	$obj	=	new DbFunction();
	$rs		=	$obj->showPrescricao();

	if(isset($_GET['del']))
	{	   
		$obj->deletar_prescricao(intval($_GET['del']));
	}
?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title> MedHeart </title>
		<link rel = "shortcut icon" href = "img/ico_hospital.png" />
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Adicionar Prescrição</title>
		<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
		<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
		<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/style.css">
		<link href="css/animacao/animacao.min.css" rel="stylesheet" media="all">
	</head>

	<body>
		<form method="post" >
			<br><br><br><div id="wrapper">
				
				<!--- Leftbar --->
				
				<?php include('leftbar.php');?>
				<?php include('../config/header.php');?>
				
				<div id="page-wrapper"><br><br>
					
					<!--------------------- Histórico do Caso --------------------> 
	                
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									Prescrição
								</div><br><br>

								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Data</th>
												<th>Paciente</th>
												<th>Opção</th>
											</tr>
										</thead>

										<tbody>
											<?php
												while($res=$rs->fetch_object()){			
											?> 

											<tr>
												<td>
													<?php echo htmlentities(strtoupper($res->data));?>
												</td>
												
												<td>
													<?php echo htmlentities( strtoupper($res->paciente));?>
												</td>  
											  
												<td>
													<a href="ver_prescricao.php?id=
														<?php echo htmlentities($res->id);?>">
														<span class="btn btn-success ">
															<i class="fa fa-eye"></i>
															Ver Prescrição
														</span>
													</a>
													&nbsp;&nbsp;
													<a href="editar_prescricao.php?id=	
														<?php echo htmlentities($res->id);?>">
														<span class="btn btn-success">
															<i class="fa fa-edit"></i> 
															Editar Prescrição
														</span>
													</a>
													&nbsp;&nbsp;
													<a href="delete.php?del=
														<?php echo htmlentities($res->id);?>">
														<span class="btn btn-danger">
															<i class="fa fa-trash-o"></i> 
															Delete
														</span>
													</a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			
			<script>
				function MedAvailability() 
						{
							$("#loaderIcon").show();
							jQuery.ajax
							({
								url: "medicamento_aval.php",
								data:'nome_medicamento='+$("#nome_medicamento").val(),
								type: "POST",
									
								success:function(data)
								{
									$("#course-availability-status").html(data);
									$("#loaderIcon").hide();
								},
									
								error:function (){}
							});
						}

						function medfullAvail() 
						{
							$("#loaderIcon").show();
							jQuery.ajax
							({
								url: "medicamento_aval.php",
								data:'nome_medicamento='+$("#nome_medicamento").val(),
								type: "POST",

								success:function(data)
								{
									$("#course-status").html(data);
									$("#loaderIcon").hide();
								},

								error:function (){}
							});
						}

			</script>
		</form>
	</body>
</html>
