<!-- Encabezado de la página -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de productos por familia</title>
    <!-- Enlace a Bootstrap para estilos predefinidos -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <!-- Contenedor principal -->
    <div class="container">
        <!-- Formulario para seleccionar una familia -->
        <form method="GET">
            <h1 style="text-align:center">Tarea: Listado de productos de una familia</h1>
            <br>
            <!--  Cuando se establece overflow: hidden en un contenedor, cualquier contenido que se desborde del
             tamaño del contenedor se ocultará y no se mostrará en la página. -->
            <div class="form-group" style="overflow: hidden;">
                <!-- Título para seleccionar una familia -->
                <h2>Familia</h2>
                <!-- Select para seleccionar la familia -->
                <select class="form-control" name="familia" id="familia" style="max-width: 360px; float: left;">
                    <!-- Iteramos sobre la lista de familias y las mostramos como opciones del select -->

                    <?php foreach ($familias as $familiaItem) :   ?>

                        <option value="<?= $familiaItem['cod'] ?>" <?php if ($familia == $familiaItem['cod']) echo "selected" ?>>
                            <?= $familiaItem['nombre'] ?>
                        </option>


                    <?php endforeach; ?>


                </select>
                <!-- Botón para enviar el formulario -->
                <button class="btn btn-primary" style="float: left; margin-left: 10px;">Mostrar productos</button>
            </div>
        </form>

        <?php
        // Verifica si el parámetro "familia" está presente en la URL
        if (isset($_GET['familia'])) {
            // Si el botón "Mostrar productos" se ha presionado, mostrar la tabla de productos
        ?>
            <!-- Título para la tabla de productos -->
            <h2>Productos de una familia</h2>
            <!-- Tabla para mostrar los productos de la familia seleccionada -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>PVP</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Verifica si la lista de productos no está vacía
                    if (count($productos) > 0) { ?>

                        <!--  Si hay productos, iterar sobre la lista y mostrarlos en la tabla -->
                        <?php foreach ($productos as $producto) : ?>

                            <tr>
                                <!-- Muestra el nombre del producto en una celda de la tabla -->
                                <td>
                                    <?= $producto["nombre_corto"] ?>
                                </td>
                                <!-- Muestra el precio del producto en una celda de la tabla -->
                                <td>
                                    <?= $producto["PVP"] ?> euros
                                </td>
                                <td>
                                    <!-- Formulario para editar un producto -->
                                    <form method="post" action="index.php?controlador=editar">
                                        <!-- Envía el código del producto a través de un campo oculto -->
                                        <input type="hidden" name="cod" value="<?= $producto["cod"] ?>">
                                        <!-- Botón para enviar el formulario y editar el producto -->
                                        <button class="btn btn-primary">Editar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php
                    } else {
                        // Si la lista de productos está vacía, mostrar un mensaje de error
                    ?>
                        <tr>
                            <td colspan="3" style=color:red;>No se encontraron productos para la familia seleccionada.</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else {
            // Si el botón "Mostrar productos" no se ha presionado, mostrar un mensaje de instrucción
            echo "<p style=color:blue;>Seleccione una familia y presione el botón 'Mostrar productos' para ver los productos de la misma.</p>";
        }
        ?>

    </div>

    <!--Scripts necesarios para Bootstrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>