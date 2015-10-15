<?php
	
	require 'class.simple_mail.php';

	$from 		= $_POST["from"];
	$name_from 	= $_POST["name"];
	$phone 		= $_POST["phone"];
	$message 	= $_POST["message"];
	/*
	$mensaje = "<html>
				<head>
				  <title>Mensaje enviado desde la web</title>
				</head>
				<body>
				  <table>
					<tr>
					  <td>Nombre</td>
					  <td>$name_from</td>
					</tr>
					<tr>
					  <td>Mail</td>
					  <td>$from</td>
					</tr>
					<tr>
					  <td>Telefono</td>
					  <td>$phone</td>
					</tr>
					<tr>
					  <td>Mensaje</td>
					  <td>$message</td>
					</tr>
				  </table>
				</body>
				</html>";
	*/
	$mensaje = "<html>
				<head>
				  <title>Mensaje enviado desde la web</title>
				</head>
				<body>
				  <table style=\"display: table;border-color: grey;border-spacing: 0;border-collapse: collapse;\">
					<tr style=\"display: table-row;padding: 8px;line-height: 1.42857143;border-top: 1px solid #ddd;\">
					  <td><strong>Nombre</strong></td>
					  <td>$name_from</td>
					</tr>
					<tr style=\"display: table-row;padding: 8px;line-height: 1.42857143;border-top: 1px solid #ddd;\">
					  <td><strong>Mail</strong></td>
					  <td>$from</td>
					</tr>
					<tr style=\"display: table-row;padding: 8px;line-height: 1.42857143;border-top: 1px solid #ddd;\">
					  <td><strong>Telefono</strong></td>
					  <td>$phone</td>
					</tr>
					<tr style=\"display: table-row;padding: 8px;line-height: 1.42857143;border-top: 1px solid #ddd;\">
					  <td><strong>Mensaje</strong></td>
					  <td>$message</td>
					</tr>
				  </table>
				</body>
				</html>";
	/* @var SimpleMail $mail */
	$mail = new SimpleMail();
	$mail->setTo('contacto.duosoluciones@gmail.com', 'duo soluciones')
		 ->setSubject('Mensaje desde la web')
		 ->setFrom($from, $name_from)
		 //->addMailHeader('Reply-To', 'prueba@duosoluciones.hol.es', 'Mail de prueba')
		 //->addMailHeader('Cc', 'bill@example.com', 'Bill Gates')
		 //->addMailHeader('Bcc', 'steve@example.com', 'Steve Jobs')
		 ->addGenericHeader('X-Mailer', 'PHP/' . phpversion())
		 ->addGenericHeader('Content-Type', 'text/html; charset="utf-8"')
		 ->setMessage($mensaje)
		 ->setWrap(78);
	$send = $mail->send();
	//echo $mail->debug();

	$salida = new stdClass();

	if ($send) {
		$salida->status = 'OK';
	//    echo 'Email was sent successfully!';
	} else {
		$salida->status = 'ERR';
		//echo 'An error occurred. We could not send email';
	}
	echo json_encode($salida);

/*
	$to 		= "duo soluciones<contacto.duosoluciones@gmail.com>";
	
	//$obj = json_decode($_POST);
	$from 		= $_POST["from"];
	$name_from 	= $_POST["name"];
	$phone 		= $_POST["phone"];
	$message 	= $_POST["message"];
	//$para  		= 'catupe77@hotmail.com'; // atención a la coma

	// título
	$titulo = 'Mensaje enviado desde la web';

	// mensaje
	$mensaje = "<html>
				<head>
				  <title>Mensaje enviado desde la web</title>
				</head>
				<body>
				  <table>
					<tr>
					  <td>Nombre</td>
					  <td>$name_from</td>
					</tr>
					<tr>
					  <td>Mail</td>
					  <td>$from</td>
					</tr>
					<tr>
					  <td>Telefono</td>
					  <td>$phone</td>
					</tr>
					<tr>
					  <td>Mensaje</td>
					  <td>$message</td>
					</tr>
				  </table>
				</body>
				</html>";


	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// Cabeceras adicionales
	$cabeceras 	.= 'To: ' . $to . "\r\n";//'To: duo <catupe77@hotmail.com>' . "\r\n";
	$cabeceras 	.= 'From: '. $name_from . '<'.$from.'>';//'From: contacto <contacto@catupe.tk>' . "\r\n";
	//$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
	//$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";

	mail($to, $titulo, $mensaje, $cabeceras);
	
	$salida = new stdClass();
	$salida->status = 'OK';
	
	echo json_encode($salida);
*/	