<?php

// Se incluye el archivo DB.php
include_once __DIR__ . "/DB.php";

// Se define la clase ProductosModel que extiende la clase DB
class ProductosModel extends DB {

    // Método para consultar productos por familia
    public static function consultaProductos($params)  {
        // Se ejecuta una consulta utilizando el método ejecutarConsulta de la clase DB
        // Se seleccionan todos los productos de una familia específica que se especifica
        // en el parámetro $params
        return DB::ejecutarConsulta("SELECT * FROM producto WHERE familia = :familia", $params);
    }

    // Método para mostrar un producto específico
    public static function mostrarProducto($params)  {
        // Se ejecuta una consulta utilizando el método ejecutarConsulta de la clase DB
        // Se selecciona un producto específico utilizando el código que se especifica en
        //el parámetro $params
        return DB::ejecutarConsulta("SELECT * FROM producto WHERE cod = :cod", $params);
    }

    // Método para actualizar un producto específico
    public static function actualizaProducto($params)  {
        // Se ejecuta una actualización utilizando el método ejecutarActualizacion de la clase DB
        // Se actualiza un producto específico utilizando el código que se especifica en el parámetro
        // $params y se actualizan los valores de nombre, nombre_corto, descripción, PVP y familia
        return DB::ejecutarActualizacion("UPDATE producto SET nombre=:nombre, nombre_corto=:nombre_corto, descripcion=:descripcion, PVP=:PVP, familia=:familia WHERE cod = :cod", $params);
    }

}
