<?php
$token = $_GET['token'];
?>

<form action="actualizarPassword.php" method="POST">
    <input type="hidden" name="token" value="<?php echo $token; ?>">
    Nueva contraseña: <input type="password" name="newpass">
    <button type="submit">Actualizar</button>
</form>
