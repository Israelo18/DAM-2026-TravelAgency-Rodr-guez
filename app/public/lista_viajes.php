<?php
include "../clases/conexion.php";

$stmt = $conn->query("SELECT * FROM viajes");
$viajes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" content="width=device-width, initial-scale=1.0">
    <title>Lista de viajes viajes</title>
    <?php include "../assets/css/styles.php"; ?>
</head>
<body>
    <?php include "../vistas/header.php"; ?>
    <main>
        <h1 style="text-align:center; margin-top:30px;">Todos nuestros viajes</h1>
        <div class="grid">
            <?php foreach ($viajes as $viaje): ?>
                <a href="detalle_viaje.php?id_viaje=<?= $viaje['id_viaje'] ?>" class="travel">
                    <img src="../assets/imagenes/<?= ($viaje["imagen"]) ?>" alt="<?= ($viaje["titulo"]) ?>">
                    <h3><?= ($viaje["titulo"]) ?></h3>
                    <p><?= ($viaje["fecha_inicio"]) ?> - <?= ($viaje["fecha_fin"]) ?></p>
                    <p>Precio: <?= number_format($viaje["precio"], 2) ?> €</p>
                </a>
            <?php endforeach; ?>
        </div>
    </main>
    <?php include "../vistas/footer.php"; ?>
</body>
</html>
<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

