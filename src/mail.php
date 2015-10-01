<?php

	$to 		= "duo soluciones<contacto.duosoluciones@gmail.com>";
	
	//$obj = json_decode($_POST);
	$from 		= $_POST["from"];
	$name_from 	= $_POST["name"];
	$phone 		= $_POST["phone"];
	$message 	= $_POST["message"];
	//$para  		= 'catupe77@hotmail.com'; // atención a la coma

	// 
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