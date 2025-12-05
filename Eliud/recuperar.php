<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$servername = "localhost:3307";
$username = "root";
$password = "123456";
$dbname = "bd_web_sobriedad";

$email = $_POST['email'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Llamar SP
    $stmt = $conn->prepare("CALL sp_recuperar_contrasena(:email)");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo json_encode(["message" => "Correo no encontrado"]);
        exit;
    }

    // generar token
    $token = bin2hex(random_bytes(16));
    $id = $result["idusuarios"];

    // guardar token temporal
    $stmt = $conn->prepare("UPDATE login SET passwordLogin = :token WHERE idUsuarios = :id");
    $stmt->bindParam(':token', $token);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // link al formulario de restablecimiento
    $url = "http://localhost/eliud/nuevaContrasena.php?token=$token";

    // CONFIGURAR PHPMailer
    $mail = new PHPMailer(true);

    // SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    
    // TU CORREO
    $mail->Username = 'TU_CORREO@gmail.com';
    $mail->Password = 'CONTRASEÑA_DE_APLICACIONES'; // <- IMPORTANTE

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Envío
    $mail->setFrom('TU_CORREO@gmail.com', 'Soporte Sobriedad');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Recuperación de contraseña';
    $mail->Body = "Haz clic aquí para recuperar tu contraseña:<br><a href='$url'>$url</a>";

    $mail->send();

    echo json_encode(["message" => "Correo enviado"]);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
