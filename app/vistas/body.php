<?php include "../assets/css/styles.php"; ?>
<?php include "../config.php"; ?>
<?php

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

$stmt = $conn->query("SELECT * FROM viajes WHERE destacado = TRUE");
$viajes = $stmt->fetchAll();
?>
<body>

    <section class="sobre-nosotros">
        <img src="../assets/imagenes/travel-icon.png">

        <div>
            <h2>Sobre Nosotros</h2>
            <p>
                <strong>Travel Trip</strong> es una empresa dedicada a ofrecer
                un servicio de viaje, cómodo, rápido, económico y disponible para todos enfocada en la innovación y la satisfacción
                del cliente.
            </p>
            <p>
                Nuestro equipo trabaja con compromiso y profesionalismo para lograr
                resultados excepcionales en cada proyecto.
            </p>
        </div>
    </section>

    <main>
        <div class="grid">
            <?php foreach ($viajes as $viaje): ?>
                <a href="detalle_viaje.php?id_viaje=<?= $viaje['id_viaje'] ?>" class="travel">
                    <img src="../assets/imagenes/<?= ($viaje["imagen"]) ?>">
                    <h3><?= ($viaje["titulo"]) ?></h3>
                    <p><?= ($viaje["fecha_inicio"]) ?> - <?= ($viaje["fecha_fin"]) ?></p>
                    <p>Precio: <?= number_format($viaje["precio"], 2) ?>€</p>
                </a>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>
<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

