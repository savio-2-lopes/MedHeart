<?php
	
	session_start ();

	if (!(isset ( $_SESSION ['login'] ))) 
	{
		header ( 'location:../index.php' );
	}
	
	include('../config/DbFunction.php');
		
	$obj = new DbFunction();
	$rs = $obj->showPaciente();
	
	if(isset($_POST['submit']))
	{	
		include('conexao.php');

		include('../config/DbFunction.php');		
		$obj = new DbFunction();
		$rs1 = $obj->showPaciente();

		$data = $_POST['data'];
		$paciente = $_POST['paciente'];
		$descricao = $_POST['descricao'];
	
		$res = "INSERT INTO cad_historico_medico(`data`,`paciente`,`descricao`) VALUES ('$data','$paciente','$descricao')";
		$sql = $conexao->query($res);
		
		echo " <script>setTimeout(\"location.href='historico_caso.php';\",150);</script>";
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

		<title>Adicionar Paciente</title>

		<!--------------- Bootstrap Core CSS -------------->
		<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

		<!--------------- MetisMenu CSS -------------->
		<link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

		<!--------------- Custom CSS -------------->
		<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

		<!--------------- Custom Fonts -------------->
		<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!--------------- Custom  CSS 2 -------------->
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
					
                     <!--------------------- Histórico --------------------> 
	                
                        <div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Histórico de caso 
									</div>
					
									<!------- Data -----------> 
	                								  
									<div class="modal-body">
										<form method="POST" >
											<div class="col-lg-2">
												<label>
													Data
													<span id="" style="font-size:11px;color:red">
														*
													</span>
												</label>
											</div>
											
											<div class="col-lg-5">
												<input type="date" name="data" class="form-control" id="exampleInputPassword1" placeholder="" value="
												<?php echo date('D-m-y');?>"><br>
											</div>
											<br><br>
											
											<!------- Paciente -----------> 
	                				
											<div class="form-group">
												<div class="col-lg-2">
													<label>
														 Paciente
														<span id="" style="font-size:11px;color:red">
															*
														</span>
													</label>
												</div>
												
												<div class="col-lg-5">
													<select class="form-control" name="paciente" id="paciente"  onchange="showSub(this.value)" required="required" >			
														<option VALUE="">SELECIONE</option>
														<?php 	
															while($res=$rs->fetch_object())
															{
														?>
														<option VALUE="
															<?php echo htmlentities($res->id);?>">
															<?php echo htmlentities($res->primeiro_nome)?>
														</option>
																
														<?php }?>   
													</select>
												</div>
																						
												<div class="form-group">
													<label for="exampleInputPassword1">
														Descrição
													</label>
													
													<textarea id="editor1" name="descricao" style="width:50px;" class="form-control"></textarea>
												</div>
												   
												<button type="submit"  name="submit" class="btn btn-primary">
													Cadastrar
												</button>
											</form>
										</div>
							
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">
												Fechar
											</button>
										</div>
									</div>
								</div>
							</div>

							<div class="box-header">
								<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal" style="height: 50px;">
									<i class="fa fa-plus-circle"></i> 
									Adicionar Novo
								</button>
								<br><br>
							</div>

							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

							<td>
								<a href="historico_caso_excel.php"> 
									<button type="button" class="btn btn-default">
										Excel
									</button>
								</a>
							</td>&nbsp;&nbsp;
					
							<td>
								<a href="historico_caso_csv.php">
									<button type="button" class="btn btn-default">
										CSV
									</button></a>
							</td>&nbsp;&nbsp;

							<td>
								<a href="historico_caso_pdf.php">
									<button type="button" class="btn btn-default">
										PDF
									</button>
								</a>
							</td>&nbsp;&nbsp;
				  
							<td>
								<button type="button" onclick="window.print();" class="btn btn-default">
									Imprimir
								</button>
							</td>

							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Data</th>
											<th>Paciente</th>
											<th>Descrição</th>
											<th>Opção</th>
										</tr>
									</thead>
									<tbody>

									<?php
										foreach ($row1 as $row)
										{
											$sql1=" SELECT primeiro_nome FROM cadpaciente WHERE id='".$row['paciente']."'";
											$write1 = mysqli_query($sql1);
											
											$row1 = mysqli_fetch_array($write1);
									?> 

									<tr>
										  
										<td>
											<?php echo $row['data'];?>
										</td>

										<td>
											<?php echo $row1['primeiro_nome'];?>
										</td>

										<td>
											<?php echo $row['descricao'];?>
										</td> 

										<td>
											<a href="editar_historico_medico.php?id=
												<?php echo $row['id']; ?>"> 
												<button type="button" class="btn btn-success">
													<i class="fa fa-edit"></i> 
													Editar
												</button>
											</a>

										<a href="d1.php?id=<?php echo $row['id'];?>"><button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
										</a></td>
										</tr>
										<?php } ?>
														</tfoot>
													  </tbody>
													  </table>
													</div>
													  </div>
												  </div>
												</div>
										   </section>
										  </div>