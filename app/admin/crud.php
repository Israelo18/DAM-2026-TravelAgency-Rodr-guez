<?php
include "../clases/conexion.php";
session_start();

// Acción según parámetro GET
$action = $_GET["action"] ?? "list";

// Crear
if ($action === "create" && $_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "INSERT INTO viajes (titulo, descripcion, fecha_inicio, fecha_fin, precio, destacado, tipo_de_viaje, plazas, imagen)
            VALUES (:titulo, :descripcion, :fecha_inicio, :fecha_fin, :precio, :destacado, :tipo_de_viaje, :plazas, :imagen)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ":titulo" => $_POST["titulo"],
        ":descripcion" => $_POST["descripcion"],
        ":fecha_inicio" => $_POST["fecha_inicio"],
        ":fecha_fin" => $_POST["fecha_fin"],
        ":precio" => $_POST["precio"],
        ":destacado" => isset($_POST["destacado"]) ? 1 : 0,
        ":tipo_de_viaje" => $_POST["tipo_de_viaje"],
        ":plazas" => $_POST["plazas"],
        ":imagen" => $_POST["imagen"]
    ]);
    header("Location: crud.php");
    exit;
}

// Editar
if ($action === "edit" && isset($_GET["id"])) {
    $id = $_GET["id"];
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $sql = "UPDATE viajes SET titulo=:titulo, descripcion=:descripcion, fecha_inicio=:fecha_inicio, fecha_fin=:fecha_fin,
                precio=:precio, destacado=:destacado, tipo_de_viaje=:tipo_de_viaje, plazas=:plazas, imagen=:imagen
                WHERE id_viaje=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ":titulo" => $_POST["titulo"],
            ":descripcion" => $_POST["descripcion"],
            ":fecha_inicio" => $_POST["fecha_inicio"],
            ":fecha_fin" => $_POST["fecha_fin"],
            ":precio" => $_POST["precio"],
            ":destacado" => isset($_POST["destacado"]) ? 1 : 0,
            ":tipo_de_viaje" => $_POST["tipo_de_viaje"],
            ":plazas" => $_POST["plazas"],
            ":imagen" => $_POST["imagen"],
            ":id" => $id
        ]);
        header("Location: crud.php");
        exit;
    } else {
        $stmt = $conn->prepare("SELECT * FROM viajes WHERE id_viaje=:id");
        $stmt->execute([":id" => $id]);
        $viaje = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$viaje)
            die("Viaje no encontrado");
    }
}

// Borrar
if ($action === "delete" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $stmt = $conn->prepare("DELETE FROM viajes WHERE id_viaje=:id");
    $stmt->execute([":id" => $id]);
    header("Location: crud.php");
    exit;
}

// Listar todos los viajes
$stmt = $conn->query("SELECT * FROM viajes ORDER BY id_viaje DESC");
$viajes = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET["action"]) && $_GET["action"] === "logout") {
    session_destroy();
    header("Location: ../public/index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" content="width=device-width, initial-scale=1.0">
        <title>CRUD Viajes</title>
        <style>
            body {
                font-family: Arial;
                margin: 20px;
                background:#f0f0f0;
            }
            h1 {
                text-align: center;
            }
            table {
                border-collapse: collapse;
                width: 100%;
                background:#fff;
            }
            th, td {
                padding: 10px;
                border: 1px solid #ccc;
                text-align:center;
            }
            a.button {
                padding: 5px 10px;
                background:#007BFF;
                color:white;
                text-decoration:none;
                border-radius:5px;
            }
            form {
                background:#fff;
                padding:20px;
                border-radius:10px;
                max-width:500px;
                margin:20px auto;
            }
            input, textarea {
                width: 100%;
                padding:8px;
                margin:5px 0;
                border-radius:5px;
                border:1px solid #ccc;
                box-sizing:border-box;
            }
            label {
                font-weight:bold;
                display:block;
                margin-top:10px;
            }
            button.submit {
                padding:10px;
                background:#28a745;
                color:white;
                border:none;
                border-radius:5px;
                cursor:pointer;
            }
            .actions a {
                margin: 0 5px;
            }
        </style>
    </head>
    <body>
        <h1>CRUD Viajes</h1>
    </div>
    <div style="text-align:right; margin-bottom:20px;">
        <a href="../public/index.php" class="button" style="background:grey;">Volver al inicio</a>
        <a href="crud.php?action=logout" class="button" style="background:#dc3545;">Cerrar sesión</a>
    </div>
    <?php if ($action === "list"): ?>
        <a href="crud.php?action=create" class="button">Nuevo Viaje</a>
        <table>
            <tr>
                <th>ID</th><th>Título</th><th>Inicio</th><th>Fin</th><th>Precio</th><th>Tipo</th><th>Destacado</th><th>Plazas</th><th>Imagen</th><th>Acciones</th>
            </tr>
            <?php foreach ($viajes as $v): ?>
                <tr>
                    <td><?= $v["id_viaje"] ?></td>
                    <td><?= htmlspecialchars($v["titulo"]) ?></td>
                    <td><?= $v["fecha_inicio"] ?></td>
                    <td><?= $v["fecha_fin"] ?></td>
                    <td><?= number_format($v["precio"], 2) ?> €</td>
                    <td><?= htmlspecialchars($v["tipo_de_viaje"]) ?></td>
                    <td><?= $v["destacado"] ? "Sí" : "No" ?></td>
                    <td><?= $v["plazas"] ?></td>
                    <td><?= htmlspecialchars($v["imagen"]) ?></td>
                    <td class="actions">
                        <a href="crud.php?action=edit&id=<?= $v["id_viaje"] ?>" class="button">Editar</a>
                        <a href="crud.php?action=delete&id=<?= $v["id_viaje"] ?>" class="button" onclick="return confirm('¿Seguro que quieres borrar?')">Borrar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php elseif ($action === "create" || $action === "edit"): ?>
        <?php $v = $action === "edit" ? $viaje : null; ?>
        <form method="post">
            <label>Título:</label>
            <input type="text" name="titulo" required value="<?= $v["titulo"] ?? "" ?>">

            <label>Descripción:</label>
            <textarea name="descripcion" required><?= $v["descripcion"] ?? "" ?></textarea>

            <label>Fecha Inicio:</label>
            <input type="date" name="fecha_inicio" required value="<?= $v["fecha_inicio"] ?? "" ?>">

            <label>Fecha Fin:</label>
            <input type="date" name="fecha_fin" required value="<?= $v["fecha_fin"] ?? "" ?>">

            <label>Precio:</label>
            <input type="number" step="0.01" name="precio" required value="<?= $v["precio"] ?? "" ?>">

            <label>Destacado:</label>
            <input type="checkbox" name="destacado" <?= (!empty($v["destacado"]) && $v["destacado"]) ? "checked" : "" ?> >

            <label>Tipo de viaje:</label>
            <input type="text" name="tipo_de_viaje" required value="<?= $v["tipo_de_viaje"] ?? "" ?>">

            <label>Plazas:</label>
            <input type="number" name="plazas" required value="<?= $v["plazas"] ?? "" ?>">

            <label>Imagen:</label>
            <input type="text" name="imagen" required value="<?= $v["imagen"] ?? "" ?>">

            <button type="submit" class="submit"><?= $action === "create" ? "Crear" : "Actualizar" ?></button>
            <a href="crud.php" class="button" style="background:#6c757d;">Cancelar</a>
        </form>
    <?php endif; ?>
</body>
</html>
<?php
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

