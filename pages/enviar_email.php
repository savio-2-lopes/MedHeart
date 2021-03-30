<?php
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;

		require 'vendor/autoload.php';

		//Create a new PHPMailer instance

		$mail = new PHPMailer;

		//Tell PHPMailer to use SMTP

		$mail->isSMTP();

		//Enable SMTP debugging
		// SMTP::DEBUG_OFF = off (for production use)
		// SMTP::DEBUG_CLIENT = client messages
		// SMTP::DEBUG_SERVER = client and server messages

		$mail->SMTPDebug = SMTP::DEBUG_SERVER;

		//Set the hostname of the mail server

		$mail->Host = 'smtp.gmail.com';

		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6

		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission

		$mail->Port = 587;

		//Set the encryption mechanism to use - STARTTLS or SMTPS

		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

		//Whether to use SMTP authentication
		
		$mail->SMTPAuth = true;

		//Username to use for SMTP authentication - use full email address for gmail
		
		$mail->Username = 'savioaulopes@gmail.com';

		//Password to use for SMTP authentication
		
		$mail->Password = 's.a.l.17';

		//Set who the message is to be sent from
		
		$mail->setFrom('savioaulopes@gmail.com', 'Savio Lopes');

		//Set an alternative reply-to address
		
		$mail->addReplyTo('savioaulopes@gmail.com', 'Savio Lopes');

		/**************** Nome do remetente ********************/
		
		$mail->FromName = 'Savio';
		
		/**************** Assunto ********************/

		$mail->Subject = 'Prescrições - Agendamento para dia - PHPMailer GMail SMTP teste';
		
		/**************** Corpo do E-mail ********************/

		$mail->Body = 'Conteudo do E-mail';
		
		/**************** Texto do E-mail ********************/

		$mail->AltBody = 'conteudo do E-mail em texto';
		
		/**************** Destinatário ********************/

		$mail->AddAddress('savioaulopes@gmail.com');

		//send the message, check for errors

		if($mail->send())
		{
			echo "E-mail enviado com sucesso";
		}
		else
		{
			echo "Erro no envio do e-mail: " . $mail->ErrorInfo;
		}













/*
<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	// Load Composer's autoloader
	require 'vendor/autoload.php';

	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try 
	{
		
		//Server settings

		$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
		
		/**************** Autenticação ********************/
/*	
		$mail->Username = 'savioaugulopes@gmail.com';
		$mail->Password = 's.a.l.17';
		
		/**************** E-mail remetente ********************/
	/*	
		$mail->From = 'savioaugulopes@gmail.com';
		
		/**************** Nome do remetente ********************/
		/*
		$mail->FromName = 'Savio';
		
		/**************** Assunto ********************/
		/*
		$mail->Subject = 'Prescrições - Agendamento para dia';
		
		/**************** Corpo do E-mail ********************/
		/*
		$mail->Body = 'Conteudo do E-mail';
		
		/**************** Texto do E-mail ********************/
		/*
		$mail->AltBody = 'conteudo do E-mail em texto';
		
		/**************** Destinatário ********************/
		/*
		$mail->AddAddress('savioaugulopes@gmail.com');
		
		if($mail->Send())
		{
			echo "E-mail enviado com sucesso";
		}
		else
		{
			echo "Erro no envio do e-mail: " . $mail->ErrorInfo;
		}
	}
	catch (Exception $e) 
	{
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
?>
*/