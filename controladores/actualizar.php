<?php
/*  Obtenemos el código del producto de la solicitud POST, si no se encuentra
 se asigna una cadena vacía */

$cod = $_POST['cod'] ?? " ";
$nombre = $_POST['nombre'] ?? " ";
$nombre_corto = $_POST['nombre_corto'];
$descripcion = $_POST['descripcion'];
$PVP = $_POST['PVP'];
$familia = $_POST['familia'];

//Incluimos el archivo que contiene la clase de Modelo de Productos
require_once __DIR__ . "/../modelo/ProductosModel.php";

//Creamos una nueva instancia de la clase de Modelo de Productos
$prodModel = new ProductosModel();
/*  Actualizamos el producto llamando al método "actualizaProducto" del objeto de la 
 clase de Modelo de Productos, pasando como parámetros un arreglo asociativo con los
 valores a actualizar del producto */
$resultado = $prodModel->actualizaProducto(["cod" => $cod, "nombre" => $nombre, "nombre_corto" => $nombre_corto, "descripcion" => $descripcion, "familia" => $familia, "PVP" => $PVP]);

//Si el resultado de la actualización es verdadero, mostramos un mensaje de éxito
if ($resultado) {

  echo "<h2 style='color: green;'>El producto se ha actualizado con éxito!</h2>";
} else { //De lo contrario, mostramos un mensaje de error

  echo "<h2 style='color: red;'>Ha ocurrido un error al actualizar el producto!</h2>";
}
//Actualizamos la página al índice después de 5 segundos
header("Refresh: 5; url=index.php", true, 303);

 


 
