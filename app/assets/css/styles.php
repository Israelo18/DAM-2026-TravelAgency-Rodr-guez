<style>
    html, body {
        margin:0;
        height: 100%;
        display: flex;
        flex-direction: column;
        background-color: white;
    }

    header {
        position: relative;
    }

    .header-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .header-icon {
        position: absolute;
        top: 20px;
        left: 20px;
        width: 150px;
        height: auto;
        z-index: 2;
    }

    /* Barra de navegación */
    nav {
        display: flex;
        justify-content: space-between;
        background-color: lightblue;
        padding: 15px 30px;
    }

    /* División del nav bar */
    .nav-left,
    .nav-right {
        display: flex;
        align-items: center;
        gap: 30px;
    }

    /* Enlaces del nav bar*/
    nav a {
        color: white;
        text-decoration: none;
        font-size: 30px;
        align-items: center;
    }

    /* Boton de login */
    .login-nav {
        background-color: lightcoral;
        color: white;
        font-weight: bold;
        font-size: 22px;
        padding: 10px 22px;
        border-radius: 25px;
    }

    /* Buscador */
    .nav-search {
        display: flex;
        align-items: stretch;
    }

    /* Texto de búsqueda */
    .search-input {
        border: none;
        outline: none;
        font-size: 16px;
        /* ancho inicial */
        width: 180px;
        padding: 8px 10px;
        border-radius: 20px 0 0 20px;
    }
    
    /* Filtro de búsqueda */
    .filter {
        padding: 10px 15px;
        border: 1px solid lightgrey;
        border-left: 1px solid lightgrey;
        border-radius: 0;
        background-color: white;
        font-size: 16px;
    }
    
    /* Botón de lupa */
    .search-button{
        background: white;
        border: none;
        font-size: 16px;
        border-left: 1px solid grey;
        border-radius: 0 20px 20px 0;
    }

    main {
        flex: 1;
    }

    .sobre-nosotros {
        display: flex;
        gap: 20px;
        padding: 30px;
        margin: 50px 300px;
        background: lightcyan;
        border-radius: 10px;
        border: 1px solid black;
        box-shadow: 0 8px 20px black;
    }

    .sobre-nosotros img {
        width: 160px;
    }

    .grid {
        display: grid;
        grid-template-columns: auto auto auto;
        gap: 20px;
        padding: 20px;
    }

    .grid img {
        width: 100%;
        height: auto;
        display: block;
    }

    /* Viajes destacados */
    .travel {
        /* Color del container */
        background-color: #f0f8ff;
        padding: 20px;
        border-radius: 10px;
        /* Centra el contenido dentro del container */
        text-align: center;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        display: flex;
        flex-direction: column;
        /* Centra horizontalmente */
        align-items: center;
        /* Quita subrayado del enlace */
        text-decoration: none;
        /* Mantiene el color del texto */
        color: inherit;
        /* Efecto hover */
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .travel img {
        width: 100%;
        /* Altura fija */
        height: 200px;
        /* Ajusta imagen sin deformarla */
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 15px;
    }

    .travel h3 {
        margin: 10px 0 5px 0;
    }

    .travel p {
        margin: 5px 0;
    }

    footer {
        background-color: black;
        color: white;
        width: 100%;
    }

    th, td {
        color: white;
        padding: 10px;
        text-align: center;
        vertical-align: top;
    }

    th {
        font-weight: bold;
    }

    /* Imágenes de la página de detalles */
    .detalle-img {
        /* ancho máximo */
        max-width: 600px;
        width: 100%;
        height: auto;
        object-fit: cover;
        border-radius: 10px;
        display: block;
        margin: 20px auto;
    }

    /* Login de administrador */
    .login {
        width: 300px;
        margin: 100px auto;
        padding: 30px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 0 10px black;
    }
    
    .login-input {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    
    .login-button {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        border: none;
        background-color: blue;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    
    .error {
        color: red;
        margin-top: 10px;
        text-align: center;
    }
</style>
<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

