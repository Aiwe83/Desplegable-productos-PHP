<?php

// Paso 1: cargar datos del modelo o recuperarlos de la entrada (POST/GET)

// Recuperar el valor de la variable 'familia' a través de GET, si no existe se asigna un valor por defecto ""
$familia = $_GET['familia'] ?? "";

// Cargar los archivos necesarios para interactuar con los modelos (base de datos)
require_once __DIR__ . "/../modelo/productosModel.php";
require_once __DIR__ . "/../modelo/familiasModel.php";

// Crear una instancia del modelo ProductosModel
$prodModel = new ProductosModel();

// Consultar los productos filtrando por el valor de la variable 'familia'
$productos = $prodModel->consultaProductos(["familia" => $familia]); //Array asociativo

// Crear una instancia del modelo FamiliasModel
$famiModel = new FamiliasModel();

// Consultar todas las familias disponibles
$familias = $famiModel->consultaFamilias();


// Cargar la vista que mostrará los datos obtenidos del modelo (renderizar la vista)
require_once __DIR__ . "/../vista/listado.php";
