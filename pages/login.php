<?php
session_start();
if (isset($_POST['submit'])) {

	include('../config/DbFunction.php');
	$obj = new DbFunction();
	$_SESSION['login'] = $_POST['id'];
	$obj->login($_POST['id'], $_POST['password']);
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

	<title> MedHeart </title>

	<link rel="shortcut icon" href="img/ico_hospital.png" />

	<link rel="stylesheet" href="../dist/css/sb-admin-2.css">
	<link rel="stylesheet" href="../dist/css/jquery.validate.css" />

	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../bower_components/metisMenu/dist/metisMenu.min.css">
	<link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css" type="text/css">

	<link rel="stylesheet" href="css/styles.css" />
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-dark" style=" background-image: url('img/bg.jpg');">
	<section id="logo">
		<img src="img/logo.png" />
	</section>

	<section id="caixa_login">
		<form name="form" method="post" action="" enctype="multipart/form-data">
			<table><br>
				<tr>
					<td>
						<h1> Nº Cartão ou código de acesso:</h1>
					</td>
				</tr>

				<tr>
					<td>
						<input class="form-control" placeholder="Login" id="id" name="id" type="text" autofocus autocomplete="off">
					</td>
				</tr>

				<tr>
					<td>
						<h1> Senha</h1>
					</td>
				</tr>

				<tr>
					<td>
						<input class="form-control" placeholder="Senha" id="password" name="password" type="password" value="">
					</td>
				</tr>

				<tr>
					<td>
						<br><input type="submit" value="Entrar" name="submit" class="input" />
					</td>
				</tr>
			</table>
		</form>
	</section>

	<script type="text/javascript" src="../bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

	<script type="text/javascript" src="../dist/js/sb-admin-2.js"></script>
	<script type="text/javascript" src="../dist/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="../dist/jquery.validate.js"></script>

	<script type="text/javascript">
		jQuery(function() {
			jQuery("#id").validate({
				expression: "if (VAL.match(/^[a-z]$/)) return true; else return false;",
				message: "Should be a valid id"
			});
			jQuery("#password").validate({
				expression: "if (VAL.match(/^[a-z]$/)) return true; else return false;",
				message: "Should be a valid password"
			});
		});
	</script>
</body>

</html>