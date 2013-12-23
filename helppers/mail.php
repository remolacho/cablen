	<?php
		$para= "contacto@cablenorte.net";
		$nombre= $_POST["nombre"];
		$asunto= "Cable Norte contacto: $nombre, ".$_POST["asunto"];
		$mensaje= $_POST["mensaje"];
		$de= $_POST["mail"];
		
		$headers ="MIME-Version:1.0;\r\n";
		$headers .= "Content-type: text/html; \r\n charset=iso-8859-1; \r\n";
		$headers .= "FROM: $de \r\n";
		$headers .= "To: $para; \r\n Subject:$asunto \r\n";
		
		
	
			if (mail($para, $asunto, $mensaje, $headers)) {
				echo "<script language='javascript'>
				alert('Mensaje enviado, muchas gracias.');</script>";
			} else {
				echo "<script language='javascript'>
				alert('Fallo el envio.');</script>";
			}
	
    ?>
