<?php

$nombre = $_POST['name'];
$email = $_POST['email'];
$mensaje =$_POST['message'];
/* envio con smtp

$destino= "oskrjag@gmail.com, oscarjavieramorteguigarcia@gmail.com";
$contenido= "Nombre: " . $nombre . "\nCorreo: " . $email . "\nMensaje: " . $mensaje;
$headers = "From: remitente@sids.com.co" . "\r\n" .
			"Reply-To: remitentesids.com.co" . "\r\n" . 
			"X-Mailer: PHP/" . phpversion();
if(mail($destino,"Contacto desde la pagina web", $contenido,$headers)){
?>

<center><label>señor: <?php echo $nombre; ?> sus datos han sido enviados con exito</label></center>

<?php 
}else{
	echo "error al enviar el mensaje";
}*/

require("mailGoogle/class.phpmailer.php"); // Requiere PHPMAILER para poder enviar el formulario desde el SMTP de google
    $mail = new PHPMailer();

    $mail->From     = $email;
    $mail->FromName = $nombre; 
    $mail->AddAddress("oskrjag@gmail.com"); // Dirección a la que llegaran los mensajes.

// Aquí van los datos que apareceran en el correo que reciba

    $mail->WordWrap = 50; 
    $mail->IsHTML(true);     
    $mail->Subject  =  "Contacto pagina Tics"; // Asunto del mensaje.
    $mail->Body     =  "Nombre: $nombre \n<br />"."Email: $email \n<br />"."Mensaje: $mensaje \n<br />";

// Datos del servidor SMTP, podemos usar el de Google, Outlook, etc...

    $mail->IsSMTP(); 
    $mail->Host = "ssl://smtp.gmail.com:465";  // Servidor de Salida. 465 es uno de los puertos que usa Google para su servidor SMTP
    $mail->SMTPAuth = true; 
    $mail->Username = "oskrjag@gmail.com";  // Correo Electrónico
    $mail->Password = "oskr2014"; // Contraseña del correo

    if ($mail->Send()){ ?>
   		<centern class="alert alert-success"><label>señor: <?php echo $nombre; ?> sus datos han sido enviados con exito</label></center>
   <?php }else{ ?>
   		<centern class="alert alert-warning"><label>error al grabar</label></center>
   	<?php } ?>