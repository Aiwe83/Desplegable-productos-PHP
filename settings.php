<?php

try {
    // Definir la constante DB_HOST con el valor "localhost" para especificar el nombre del servidor de la base de datos
    define ("DB_HOST", "localhost");

    // Definir la constante DB_NAME con el valor "dwes" para especificar el nombre de la base de datos
    define ("DB_NAME", "dwes");

    // Definir la constante DB_USER con el valor "dwes" para especificar el nombre de usuario de la base de datos
    define ("DB_USER", "dwes");

    // Definir la constante DB_PASS con el valor "abc123." para especificar la contraseña de la base de datos
    define ("DB_PASS", "123");

    // Definir la constante DB_PORT con el valor "3306" para especificar el puerto que se utiliza para conectarse a la base de datos
    define ("DB_PORT", "3306");

    // Aquí puede agregar el código para conectarse a la base de datos utilizando las constantes definidas
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);

    // Aquí puede agregar código adicional para trabajar con la base de datos

} catch (PDOException $e) {
    // Si se produce un error de conexión, mostrar un mensaje de error al usuario
    echo "Error al conectarse a la base de datos: " . $e->getMessage();
} catch (Exception $e) {
    // Si se produce otro tipo de error, mostrar un mensaje de error al usuario
    echo "Error inesperado: " . $e->getMessage();
}
