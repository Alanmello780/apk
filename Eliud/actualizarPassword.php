<?php
$servername = "localhost:3307";
$username = "root";
$password = "123456";
$dbname = "bd_web_sobriedad";

$token = $_POST['token'];
$newpass = $_POST['newpass'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener id del usuario con ese token
    $stmt = $conn->prepare("SELECT idUsuarios FROM login WHERE passwordLogin = :token");
    $stmt->bindParam(":token", $token);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo "Token no válido";
        exit;
    }

    $id = $result["idUsuarios"];

    // Actualizar contraseña real
    $stmt = $conn->prepare("UPDATE login SET passwordLogin = :pass WHERE idUsuarios = :id");
    $stmt->bindParam(":pass", $newpass);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    echo "Contraseña actualizada exitosamente";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
