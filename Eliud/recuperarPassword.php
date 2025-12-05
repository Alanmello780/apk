<?php
$para = $_POST['email'];
$asunto = "Recuperación de contraseña";
$mensaje = "Tu código de recuperación es: 123456";

$headers = "From: tu_correo@gmail.com";

if (mail($para, $asunto, $mensaje, $headers)) {
    echo json_encode(["message" => "Correo enviado"]);
} else {
    echo json_encode(["message" => "Error al enviar correo"]);
}
?>
