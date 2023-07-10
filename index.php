<?php

// Iniciar una sesión nueva o reanudar una existente
session_start();

/*
Obtener el nombre del controlador a través de la variable GET, o establecer "listar"
 como valor predeterminado si no se proporciona ningún valor
 */

$controlador = $_GET["controlador"] ?? "listar";

// Incluir el archivo del controlador correspondiente basado en el valor de $controlador

require_once "./controladores/$controlador.php";
