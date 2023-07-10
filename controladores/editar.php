<?php

// Se obtiene el valor de la variable 'cod' enviada mediante el método POST
// o se establece un valor vacío si no se envió nada
$cod = $_POST['cod'] ?? '';

// Si no se especificó un valor para 'cod' se muestra un mensaje de error y se
// detiene la ejecución del código
if (!$cod) {
    die("Debe especificar cod");
}

// Se requieren los archivos de los modelos 'ProductosModel' y 'FamiliasModel'
require_once __DIR__ . "/../modelo/ProductosModel.php";
require_once __DIR__ . "/../modelo/FamiliasModel.php";

// Se crea una nueva instancia del modelo 'ProductosModel'
$prodModel = new ProductosModel();

// Se utiliza el método 'mostrarProducto' del modelo 'ProductosModel' para obtener
// los datos del producto con el código especificado en la variable 'cod'
$productos = $prodModel->mostrarProducto(["cod"=>$cod]);

// Se obtiene el primer producto en el array de productos obtenido en la línea anterior
$producto = $productos[0];//Se asigna el primer valor del array

// Se crea una nueva instancia del modelo 'FamiliasModel'
$famiModel = new FamiliasModel();

// Se utiliza el método 'consultaFamilias' del modelo 'FamiliasModel' para obtener un array con los datos de todas las familias
$familias = $famiModel->consultaFamilias();

// Se carga la vista 'editar.php' y se le pasan las variables necesarias para mostrar los datos del producto y las opciones de las familias en el formulario de edición
require_once __DIR__ . "/../vista/editar.php";