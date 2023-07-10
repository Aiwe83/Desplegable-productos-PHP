<?php
class DB
{
    private static $conexion = null; // Variable estática que contendrá la conexión a la base de datos

    // Método privado para conectarse a la base de datos
    private static function conectar(): void
    {
        require_once __DIR__ . "/../settings.php"; // Incluye un archivo de configuración con la información de conexión

        $host = DB_HOST; // Variable que contiene la dirección del servidor de la base de datos
        $db = DB_NAME; // Variable que contiene el nombre de la base de datos
        $user = DB_USER; // Variable que contiene el nombre de usuario de la base de datos
        $pass = DB_PASS; // Variable que contiene la contraseña de la base de datos
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4"; // Cadena de conexión para PDO

        try {
            DB::$conexion = new PDO($dsn, $user, $pass); // Crea una nueva conexión PDO y la asigna a la variable estática $conexion
            DB::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Establece el modo de error de PDO a excepción
        } catch (PDOException $ex) { // Si se produce una excepción, muestra un mensaje de error y detiene la ejecución del script
            die("Error en la conexión: mensaje: " . $ex->getMessage());
        }
        // Devuelve la conexión a la base de datos
    }

    // Método protegido para ejecutar consultas SQL
    protected static function ejecutarConsulta(string $sql, array $valores = [])
    {
        DB::conectar(); // Se conecta a la base de datos
        $stmt = DB::$conexion->prepare($sql); // Prepara la consulta SQL para ser ejecutada

        try {
            $stmt->execute($valores); // Ejecuta la consulta SQL con los valores proporcionados

            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve el resultado de la consulta SQL como un array asociativo

        } catch (PDOException $ex) { // Si se produce una excepción, muestra un mensaje de error y detiene la ejecución del script
            die("Error al ejecutar consulta: " . $ex->getMessage());
        }

        if ($stmt->rowCount() == 0) { // si no se encontraron filas afectadas por la consulta
            return false; // devolver false indicando que no se encontraron resultados
        } else { // de lo contrario, si se encontraron filas afectadas por la consulta
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // devolver un array asociativo con los resultados de la consulta
        }
    }


   // Este método está diseñado para ejecutar una consulta SQL y devolver verdadero o falso según si se ejecutó correctamente o no.
    protected static function ejecutarActualizacion($sql, $valores)
    {
        // Se llama al método conectar() para establecer una conexión con la base de datos.
        DB::conectar();
      
        // Se prepara la consulta SQL utilizando la conexión establecida anteriormente.
        $stmt = DB::$conexion->prepare($sql);
        try {
            // Se ejecuta la consulta SQL con los valores proporcionados.
            return $stmt->execute($valores);
        } catch (PDOException $ex) {
            // Si ocurre algún error durante la ejecución de la consulta, se muestra un mensaje de error y se detiene la ejecución.
            die("Error al ejecutar consulta: " . $ex->getMessage());
        }
    }
}
