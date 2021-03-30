<?php
	include("conexao.php") ;

	$s = "SELECT * FROM cad_agendamento WHERE  `data`>'".date('Y-m-d')."'";
	$query = mysqli_query($s);
	$row1 = mysqli_fetch_all($query);

	$res = "SELECT * FROM cadpaciente";
	$p_query = mysqli_query($conexao, $res);
	$p_numrows = mysqli_num_rows($p_query);
	$p_row1 = mysqli_fetch_all($p_query);

	function mysqli_fetch_all($query)
	{
		$all = array();
		while ($all[] = mysql_fetch_assoc($query))
		 {$temp=$all;}
		return $temp;
	}
?>

	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				Próximos Agendamentos
				<small></small>
			</h1>
      
			<ol class="breadcrumb">
				<li>
					<a href="#">
						<i class="fa fa-dashboard"></i> 
						Home
					</a>
				</li>
        
				<li class="active">
					Próximos Agendamentos
				</li>
			</ol>
		</section>
    
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<i class="fa fa-user"></i> 
							<h3 class="box-title">  
								Próximos Agendamentos
							</h3>
						</div>&nbsp;&nbsp;&nbsp;&nbsp;

						<a href="./addappointment.php">
							<button type="submit"   name="submit" class="btn btn-success bg-blue">
								<i class="fa fa-plus-square"></i> 
								Adicionar Agendamentos
							</button>
						</a><br>

						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

						<td>
							<a href="Excelupcomming.php"> 
								<button type="button" class="btn btn-default">
									Excel
								</button>
							</a>
						</td>&nbsp;&nbsp;

						<td>
							<a href="csvupcomming.php">
								<button type="button" class="btn btn-default">
									CSV
								</button>
							</a>
						</td>&nbsp;&nbsp;

						<td>
							<a href="./PDF/upcomming_pdf.php">
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
										<th>id</th>
										<th>Patient</th>
										<th>Date</th>
										<th>Start Time</th>
										<th>End Time</th>
										<th>Remark</th>
										<th>Option</th>
									</tr>
								</thead>
        
								<tbody>

									<?php
										for ($i=0; $i <count($row1) ; $i++) 
										{
									?> 

									<tr>
										<td>
											<?php echo $row1[$i]['id'];?>
										</td>
										
										<td>
											<?php 
												foreach ($p_row1 as $p) 
												{ 
													if($row1[$i]['paciente']==$p['id'])
													{
														echo $p['primeiro_nome']; 
														$mob=$p['telefone'];
													}
												}
												?>
										</td>

										<td>
											<?php echo $row1[$i]['data'];   ?>
										</td>

										<td>
											<?php echo $row1[$i]['data_inicial'];?>
										</td>

										<td>
											<?php echo $row1[$i]['data_final'];?>
										</td> 

										<td>
											<?php echo $row1[$i]['status'];?>
										</td>

										<td>
											<a href="sendsms.php?id=
												<?php echo $row1[$i]['id'];?>">
												<input type="button" name="submit" value="SMS" class="btn btn-success">
											</a>
											
											<?php $row1[$i]['id'];?>" style="height: 30px;">
												<i class="fa fa-plus-square"></i> 
												SMS
											</button> &nbsp; 
												
											<a href="deleteu.php?id=
													<?php echo $row1[$i]['id'];?>">
													<span class="btn btn-danger">
														<i class="fa fa-trash-o"></i> 
														Delete
													</span>
											</a>
											
											</td>
												<?php $row1[$i]['id'];?>
												<?php echo $mob;?>">
											</tr>
											
											<?php }   ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
