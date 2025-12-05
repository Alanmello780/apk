<?php
$servername = "localhost:3307";
$username = "root";
$password = "123456";
$dbname = "bd_web_sobriedad";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters
  $stmt = $conn->prepare("call bd_web_sobriedad.sp_consulta_usuarios();");
  //$stmt->bindParam(':firstname', $firstname);
 
  $stmt->execute();

 // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();
  
  echo json_encode($result);

  
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>