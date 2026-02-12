<?php include "../clases/conexion.php"; ?>
<?php
try {
    $stmt = $conn->prepare("SELECT * FROM viajes WHERE id_viaje = ?");
    $id = intval($_GET["id_viaje"]);
    $stmt->execute([$id]);
    $viaje = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$viaje) {
        die("Viaje no encontrado.");
    }
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
<html>
    <head>
        <meta charset="UTF-8" content="width=device-width, initial-scale=1.0">
        <title><?= ($viaje["titulo"]) ?></title>
        <?php include "../assets/css/styles.php"; ?>
    </head>
    <body>
        <?php include "../vistas/header.php"; ?>
        <main>
            <div class="travel">
                <h1><?= ($viaje["titulo"]) ?></h1>
                <img class="detalle-img" src="../assets/imagenes/<?= ($viaje["imagen"]) ?>">
                <p><strong>Fechas:</strong> <?= ($viaje["fecha_inicio"]) ?> - <?= ($viaje["fecha_fin"]) ?></p>
                <br>
                <p><strong>Precio:</strong> <?= number_format($viaje["precio"], 2) ?>€</p>
                <br>
                <p><strong>Plazas dispoibles:</strong> <?= ($viaje["plazas"]) ?></p>
                <br>
                <p><strong>Descripción:</strong> <?= ($viaje["descripcion"]) ?></p>
                <br>
                <p><strong>Tipo de viaje:</strong> <?= ($viaje["tipo_de_viaje"]) ?></p>
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

