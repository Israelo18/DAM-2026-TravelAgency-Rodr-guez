<?php
session_start();
include "../config.php";

if (isset($_SESSION["admin"])) {
    header("Location: ../admin/crud.php");
    exit;
}

$error = "";

// Comprobar si envían el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usernameLogin = $_POST['usuario'] ?? "";
    $passwordLogin = $_POST['password'] ?? "";

    // Comparar con variables de config.php
    if ($usernameLogin === $adminusername && $passwordLogin === $adminupassword) {
        $_SESSION["admin"] = $usernameLogin; // Guardar sesión
        header("Location: ../admin/crud.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <?php include "../assets/css/styles.php"; ?>
    </head>
<body>
    <div class="login">
        <h2 style="text-align: center">Login</h2>
        <form method="post">
            <input class="login-input" type="text" name="usuario" placeholder="Usuario" required>
            <input class="login-input" type="password" name="password" placeholder="Contraseña" required>
            <button class="login-button" type="submit">Ingresar</button>
        </form>
        <?php if ($error): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

