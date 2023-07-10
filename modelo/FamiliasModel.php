<?php
// Se incluye el archivo DB.php
include_once __DIR__ . "/DB.php";

// Se define la clase FamiliasModel que extiende la clase DB
class FamiliasModel extends DB {

    // Método para consultar todas las familias de productos
    public static function consultaFamilias()  {
        // Se ejecuta una consulta utilizando el método ejecutarConsulta de la clase DB
        // Se seleccionan todas las filas de la tabla de familias
        
        return DB::ejecutarConsulta("SELECT * FROM familia");
    }
   
}