<?php
$servername = "localhost:3307";
$username = "root";
$password = "123456";
$dbname = "bd_web_sobriedad";

$nombreUsuario = $_POST['nombreUsuario'] ?? '';
$apPaterno = $_POST['apPaterno'] ?? '';
$apMaterno = $_POST['apMaterno'] ?? '';
$emailUsuario = $_POST['emailUsuario'] ?? '';
$nombreLogin = $_POST['nombreLogin'] ?? '';
$passwordLogin = $_POST['passwordLogin'] ?? '';
$idrol_usuario = $_POST['idrol_usuario'] ?? '';

header("Content-Type: application/json");

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("CALL sp_crear_cuenta(:nombreUsuario, :apPaterno, :apMaterno,
     :emailUsuario, :nombreLogin, :passwordLogin, :idrol_usuario)");

    $stmt->bindParam(':nombreUsuario', $nombreUsuario);
    $stmt->bindParam(':apPaterno', $apPaterno);
    $stmt->bindParam(':apMaterno', $apMaterno);
    $stmt->bindParam(':emailUsuario', $emailUsuario);
    $stmt->bindParam(':nombreLogin', $nombreLogin);
    $stmt->bindParam(':passwordLogin', $passwordLogin);
    $stmt->bindParam(':idrol_usuario', $idrol_usuario);

    $stmt->execute();

    echo json_encode(["message" => "CUENTA CREADA EXITOSAMENTE"]);

} catch(PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
