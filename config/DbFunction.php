<?php

require('Database.php');

class DbFunction
{
	function login($loginid, $password)
	{
		if (!ctype_alpha($loginid) || !ctype_alpha($password)) {
			echo "<script>alert('Login ou Senha incorretos')</script>";
		} else {
			$db = Database::getInstance();
			$mysqli = $db->getConnection();

			$query = "SELECT loginid, password FROM tbl_login where loginid=? and password=? ";
			$stmt = $mysqli->prepare($query);

			if (false === $stmt) {
				trigger_error("Erro ao conectar: " . mysqli_connect_error(), E_USER_ERROR);
			} else {
				$stmt->bind_param('ss', $loginid, $password);
				$stmt->execute();

				$stmt->bind_result($loginid, $password);
				$rs = $stmt->fetch();

				if (!$rs) {
					echo "<script>alert('Dados Inválidos')</script>";
					header('location:login.php');
				} else {
					header('location:inicio.php');
				}
			}
		}
	}

	function  criando_medicamento($nome_medicamento, $categoria, $efeito, $quantidade, $preco, $data_validade)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		$query = "INSERT INTO `cad_medicamento`(`nome_medicamento`, `categoria`, `efeito`, `quantidade`, `preco`, `data_validade`)VALUES(?,?,?,?,?,?)";

		$stmt = $mysqli->prepare($query);

		if (false === $stmt) {
			trigger_error("Erro na Conexão: " . mysqli_connect_error(), E_USER_ERROR);
		} else {
			$stmt->bind_param(
				'sssiid',
				$nome_medicamento,
				$categoria,
				$efeito,
				$quantidade,
				$preco,
				$data_validade
			);

			$stmt->execute();

			echo "<script>alert('Medicamento Cadastrado com Sucesso!')</script>";
		}
	}

	function showMed()
	{
		$db = Database::getInstance();
		$sql = $db->getConnection();
		$res = "SELECT * FROM cad_medicamento";
		$stmt = $sql->query($res);
		return $stmt;
	}

	function editar_medicamento($nome_medicamento, $categoria, $efeito, $quantidade, $preco, $data_validade, $id)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		$query = "UPDATE cad_medicamento set nome_medicamento=?,  categoria=?,  efeito=?, quantidade=?, preco=? , data_validade=? where id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('ssssssi', $nome_medicamento, $categoria, $efeito, $quantidade, $preco, $data_validade, $id);
		$stmt->execute();

		echo '<script>';
		echo 'alert("Medicamento atualizado com Sucesso")';
		echo '</script>';
	}

	function deletar_medicamento($id)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		$query = "DELETE FROM cad_medicamento WHERE id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();

		echo "<script>alert('O medicamento foi excluido!')</script>";
		echo "<script>window.location.href='ver_medicamentos.php'</script>";
	}

	function  criando_equipamento($nome_equipamento, $categoria, $utilizacao, $quantidade, $preco, $data_validade)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		$query = "INSERT INTO `cad_equipamento`(`nome_equipamento`, `categoria`, `utilizacao`, `quantidade`, `preco`, `data_validade`)VALUES(?,?,?,?,?,?)";

		$stmt = $mysqli->prepare($query);

		if (false === $stmt) {
			trigger_error("Erro na Conexão: " . mysqli_connect_error(), E_USER_ERROR);
		} else {
			$stmt->bind_param(
				'sssiid',
				$nome_equipamento,
				$categoria,
				$quantidade,
				$utilizacao,
				$data_validade
			);

			$stmt->execute();

			echo "<script>alert('Equipamento cadastrado com Sucesso!')</script>";
		}
	}

	function showEqui()
	{
		$db = Database::getInstance();
		$sql = $db->getConnection();
		$res = "SELECT * FROM cad_equipamento";
		$stmt = $sql->query($res);
		return $stmt;
	}

	function editar_equipamento($nome_equipamento, $categoria, $utilizacao, $quantidade, $preco, $data_validade, $udate, $id)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		$query = "UPDATE cad_equipamento set nome_equipamento=?,  categoria=?,  utilizacao=?, quantidade=?, preco=? , data_validade=?, update_date=? where id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('sssiidi', $nome_equipamento, $categoria, $utilizacao, $quantidade, $preco, $data_validade, $udate, $id);
		$stmt->execute();

		echo '<script>';
		echo 'alert("Equipamento atualizado com Sucesso")';
		echo '</script>';
	}

	function deletar_equipamento($id)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		$query = "DELETE FROM cad_equipamento WHERE id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();

		echo "<script>alert('O Equipamento foi excluido!')</script>";
		echo "<script>window.location.href='ver_estoque.php'</script>";
	}

	function criando_lab($tipo_lab, $medico, $quantidade, $data_registro)
	{
		if ($tipo_lab == "") {
			echo "<script>alert('Insira o tipo do Laboratório')</script>";
		} else if ($medico == "") {
			echo "<script>alert('Insira o Médico responsável pelo Laboratório')</script>";
		} else if ($quantidade == "") {
			echo "<script>alert('Insira a quantidade de Laboratórios')</script>";
		} else {
			$db = Database::getInstance();
			$sql = $db->getConnection();

			$res = "INSERT INTO cad_lab(tipo_lab, medico, quantidade) values (?,?,?)";
			$res_1 = $sql->prepare($res);

			if (false === $res_1) {
				trigger_error("Erro na Conexão: " . mysqli_connect_error(), E_USER_ERROR);
			} else {
				$res_1->bind_param('ssid', $tipo_lab, $medico, $quantidade, $data_registro);
				$res_1->execute();

				echo "<script>alert('Laboratório cadastrado com Sucesso')</script>";
			}
		}
	}

	function showLab()
	{
		$db = Database::getInstance();
		$sql = $db->getConnection();
		$res = "SELECT * FROM cad_lab";
		$stmt = $sql->query($res);
		return $stmt;
	}

	function editar_lab($tipo_lab, $medico, $quantidade, $data_registro, $udate, $id)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		$query = "UPDATE cad_lab set tipo_lab=?,  medico=?,  quantidade=?, data_registro=?,  update_date=? where id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('ssidsi', $tipo_lab, $medico, $quantidade, $data_registro, $udate, $id);
		$stmt->execute();

		echo '<script>';
		echo 'alert("Laboratório atualizado com Sucesso")';
		echo '</script>';
	}

	function deletar_lab($id)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		$query = "DELETE FROM cad_lab WHERE id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();

		echo "<script>alert('O Laboratório foi excluido!')</script>";
		echo "<script>window.location.href='ver_lab.php'</script>";
	}

	function  criando_paciente(
		$primeiro_nome,
		$nome_meio,
		$ultimo_nome,
		$genero,
		$data_nascimento,
		$guardiao,
		$ocupacao,
		$status,
		$tipo_sanguineo,
		$religiao,
		$telefone,
		$email,
		$alergia,
		$codigo_convenio
	) {
		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		$query = "INSERT INTO `cadpaciente` 
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
			VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?, ?)";

		$reg = rand();
		$stmt = $mysqli->prepare($query);

		if (false === $stmt) {
			trigger_error("Erro na Conexão: " . mysqli_connect_error(), E_USER_ERROR);
		} else {
			$stmt->bind_param(
				'ssssssssssssss',
				$primeiro_nome,
				$nome_meio,
				$ultimo_nome,
				$genero,
				$data_nascimento,
				$guardiao,
				$ocupacao,
				$status,
				$tipo_sanguineo,
				$religiao,
				$telefone,
				$email,
				$alergia,
				$codigo_convenio
			);

			$stmt->execute();

			echo "<script>alert('Registro feito com sucesso, seu ID é $reg')</script>";
		}
	}

	function showPaciente()
	{
		$db = Database::getInstance();
		$sql = $db->getConnection();
		$res = "SELECT * FROM cadpaciente";
		$stmt = $sql->query($res);
		return $stmt;
	}

	function editar_paciente($primeiro_nome, $nome_meio, $ultimo_nome, $genero, $data_nascimento, $guardiao, $ocupacao, $status, $tipo_sanguineo, $religiao, $telefone, $email, $alergia, $codigo_convenio, $udate, $id)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		$query = "UPDATE cadpaciente set primeiro_nome=?,  nome_meio=?,  ultimo_nome=?,  data_nascimento=?,  guardiao=?,  ocupacao=?,  status=?,  tipo_sanguineo=?, religiao=?,  telefone=?,  email=?, alergia=?,  codigo_convenio=?  where id=?";
		$stmt = $mysqli->prepare($query);
		$rc = $stmt->bind_param('sssssssssssssssssi', $primeiro_nome, $nome_meio, $ultimo_nome, $genero, $data_nascimento, $guardiao, $ocupacao, $status, $tipo_sanguineo, $religiao, $telefone, $email, $alergia, $codigo_convenio, $udate, $id);
		$stmt = $mysqli->prepare($query);

		if (false === $stmt) {
			trigger_error("Erro na conexão: " . mysqli_connect_error(), E_USER_ERROR);
		}
		if (false === $rc) {
			die('bind_param() falhou: ' . htmlspecialchars($stmt->error));
		}
		$rc = $stmt->execute();

		if (false == $rc) {
			die('execute() falhou: ' . htmlspecialchars($stmt->error));
		} else {
			echo '<script>';
			echo 'alert(" Atualizado com Sucesso")';
			echo '</script>';
		}
	}

	function deletar_paciente($id)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		$query = "DELETE FROM cadpaciente WHERE id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();

		echo "<script>alert('O Paciente foi excluido!')</script>";
		echo "<script>window.location.href='ver_paciente.php'</script>";
	}

	function showMedico()
	{
		$db = Database::getInstance();
		$sql = $db->getConnection();
		$res = "SELECT * FROM cadmedico";
		$stmt = $sql->query($res);
		return $stmt;
	}

	function deletar_medico($id)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		$query = "DELETE FROM cadmedico WHERE id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();

		echo "<script>alert('Médico foi excluido!')</script>";
		echo "<script>window.location.href='ver_medico.php'</script>";
	}

	function showSession()
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM session  ";
		$stmt = $mysqli->query($query);
		return $stmt;
	}

	function showCountry()
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM countries ";
		$stmt = $mysqli->query($query);
		return $stmt;
	}

	function showArquivos()
	{
		$db = Database::getInstance();
		$sql = $db->getConnection();
		$res = "SELECT * FROM adicionar_arquivos";
		$stmt = $sql->query($res);
		return $stmt;
	}

	function deletar_arquivos($id)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		$query = "DELETE FROM adicionar_arquivos WHERE id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();

		echo "<script>alert('Relatórios foi excluido!')</script>";
		echo "<script>window.location.href='documentos.php'</script>";
	}

	function showPrescricao()
	{
		$db = Database::getInstance();
		$sql = $db->getConnection();
		$res = "SELECT * FROM cadprescricao";
		$stmt = $sql->query($res);
		return $stmt;
	}

	function deletar_prescricao($id)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		$query = "DELETE FROM cadprescricao WHERE id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();

		echo "<script>alert('Prescrição foi excluido!')</script>";
		echo "<script>window.location.href='ver_prescricoes.php'</script>";
	}

	function showAgendamento()
	{
		$db = Database::getInstance();
		$sql = $db->getConnection();
		$res = "SELECT * FROM cad_agendamento";
		$stmt = $sql->query($res);
		return $stmt;
	}

	function deletar_agendamento($id)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		$query = "DELETE FROM cad_agendamento WHERE id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();

		echo "<script>alert('Agendamento excluido!')</script>";
		echo "<script>window.location.href='agendamento.php'</script>";
	}

	function showConvenio()
	{
		$db = Database::getInstance();
		$sql = $db->getConnection();
		$res = "SELECT * FROM convenio";
		$stmt = $sql->query($res);
		return $stmt;
	}

	function deletar_convenio($id)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		$query = "DELETE FROM convenio WHERE id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();

		echo "<script>alert('Convênio médico excluido!')</script>";
		echo "<script>window.location.href='ver_convenio.php'</script>";
	}

	function showRecMed()
	{
		$db = Database::getInstance();
		$sql = $db->getConnection();
		$res = "SELECT * FROM requisicao_medicamento";
		$stmt = $sql->query($res);
		return $stmt;
	}

	function deletar_requisicao($id)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		$query = "DELETE FROM requisicao_medicamento WHERE id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();

		echo "<script>alert('Requisição excluida de seu histórico!')</script>";
		echo "<script>window.location.href='ver_rec_medicamento.php'</script>";
	}

	function showRecLab()
	{
		$db = Database::getInstance();
		$sql = $db->getConnection();
		$res = "SELECT * FROM requisicao_lab";
		$stmt = $sql->query($res);
		return $stmt;
	}

	function deletar_requisicao_lab($id)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		$query = "DELETE FROM requisicao_lab WHERE id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();

		echo "<script>alert('Requisição excluida de seu histórico!')</script>";
		echo "<script>window.location.href='ver_rec_lab.php'</script>";
	}
}
