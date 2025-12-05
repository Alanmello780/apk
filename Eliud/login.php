<?php
$servername = "localhost:3307";
$username = "root";
$password = "123456";
$dbname = "bd_web_sobriedad";

$usuario = $_REQUEST['usuario'];
$clave   = $_REQUEST['clave'];   // <-- AHORA SÍ LO LEEMOS

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // PROCEDIMIENTO REQUIERE 2 PARÁMETROS
  $stmt = $conn->prepare("CALL bd_web_sobriedad.sp_validar_login(:user, :pass)");

  // ENVIAMOS AMBOS
  $stmt->bindParam(':user', $usuario);
  $stmt->bindParam(':pass', $clave);

  $stmt->execute();

  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (count($result) == 0) {
      $datos = array(
          "message" => "USUARIO O CLAVE INCORRECTA"
      );
  } else {
      $datos = array(
          "message" => "OK",
          "data" => $result
      );
  }

  echo json_encode($datos);

} catch(PDOException $e) {
  echo json_encode(array("error" => $e->getMessage()));
}

$conn = null;
?>
