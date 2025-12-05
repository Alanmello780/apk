<?php
$servername = "localhost:3307";
$username = "root";
$password = "123456";
$dbname = "bd_web_sobriedad";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT idUsuarios, nombreUsuario, apPaternoUsuario, apMaternoUsuario, emailUsuario FROM usuarios");
  echo "Conexion exitosa";
  $stmt->execute();
}catch(PDOException $e) {
  echo "Conexion fallida: " . $e->getMessage();
}

?>