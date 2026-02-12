<?php include "../assets/css/styles.php"; ?>
<header>
    <img class="header-image" src="../assets/imagenes/travel-header.jpg">
    <a href="index.php"><img class="header-icon" src="../assets/imagenes/travel-icon.png"></a>
</header>
<nav>
    <div class="nav-left">
        <a href="index.php">Inicio</a>
        <a href="../public/lista_viajes.php">Viajes</a>
    </div>

    <div class="nav-right">
        <a href="../public/login.php" class="login-nav">Login</a>
        
        <form action="../public/buscador.php" method="get" class="nav-search">
            <input type="text" name="busqueda" placeholder="Buscar viajes..." class="search-input">
            <select name="categoria" class="filter">
                <option value="">Buscar por:</option>
                <option value="destino">Destino</option>
                <option value="fecha">Fecha</option>
                <option value="tipo">Tipo</option>
            </select>
            <button type="submit" class="search-button">🔍</button>
        </form>
    </div>
</nav>
<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

