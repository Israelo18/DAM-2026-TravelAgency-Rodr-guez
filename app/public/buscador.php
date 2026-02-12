<?php
include "../clases/conexion.php";

// Recoger valores del formulario
$busqueda = isset($_GET['busqueda']) ? trim($_GET['busqueda']) : '';
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

// Consulta base de datos
$sql = "SELECT * FROM viajes WHERE 1=1";
$params = [];

if ($busqueda !== '' && $categoria === 'destino') {
    $sql .= " AND titulo LIKE :busqueda";
    $params[':busqueda'] = "%$busqueda%";
} elseif ($busqueda !== '' && $categoria === 'tipo') {
    $sql .= " AND tipo_de_viaje LIKE :busqueda";
    $params[':busqueda'] = "%$busqueda%";
} elseif ($busqueda !== '' && $categoria === 'fecha') {
    // Buscar viajes donde la fecha buscada esté entre fecha_inicio y fecha_fin
    $sql .= " AND :busqueda BETWEEN fecha_inicio AND fecha_fin";
    $params[':busqueda'] = $busqueda;
}

// Preparar y ejecutar
$stmt = $conn->prepare($sql);
$stmt->execute($params);
$viajes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" content="width=device-width, initial-scale=1.0">
    <title>Resultados de búsqueda</title>
    <?php include "../assets/css/styles.php"; ?>
</head>
<body>
    <?php include "../vistas/header.php"; ?>
    <main>
        <h1 style="text-align:center; margin-top:30px;">Resultados de búsqueda</h1>
        <?php if ($viajes): ?>
            <div class="grid">
                <?php foreach ($viajes as $viaje): ?>
                    <a href="detalle_viaje.php?id_viaje=<?= $viaje['id_viaje'] ?>" class="travel">
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
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p style="text-align:center; margin-top:20px;">No se encontraron viajes que coincidan con tu búsqueda.</p>
        <?php endif; ?>
    </main>
    <?php include "../vistas/footer.php"; ?>
</body>
</html>
<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

