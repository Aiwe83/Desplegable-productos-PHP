<!-- Declaración de tipo de documento -->
<!DOCTYPE html>
<!-- Inicio del documento HTML -->
<html lang="es">
<!-- Cabecera del documento HTML -->

<head>
    <!-- Configuración de codificación de caracteres -->
    <meta charset="UTF-8">
    <!-- Configuración de viewport para dispositivos móviles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Enlace al CDN de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Enlace al CDN de Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Título del documento HTML -->
    <title>Editar producto</title>
</head>
<!-- Cuerpo del documento HTML -->

<body style="background:silver;">

    <!-- Contenedor principal -->
    <div class="container mt-5">
        <!-- Contenedor secundario para centrar el formulario -->
        <div class="d-flex justify-content-center h-100">
            <!-- Tarjeta que contiene el formulario de edición de productos -->
            <div class="card">
                <!-- Encabezado de la tarjeta -->
                <div class="card-header">
                    <h3>Editar producto</h3>
                </div>
                <!-- Cuerpo de la tarjeta -->
                <div class="card-body">
                    <!-- Formulario para editar un producto -->
                    <form name='formulario1' method='POST' action='<?= $_SERVER['PHP_SELF']; ?>?controlador=actualizar'>
                        <!-- Campo oculto para enviar el código del producto a actualizar -->
                        <input type="hidden" name='cod' value="<?= $cod?>">

                        <!-- Campo de entrada para el nombre del producto -->
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="nombre" name='nombre' value="<?= $producto['nombre'] ?>" required>
                        </div>
                        <!-- Campo de entrada para el nombre corto del producto -->
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="nombre corto" name='nombre_corto' value="<?= $producto['nombre_corto'] ?>" required>
                        </div>

                        <div class="input-group form-group">
                            <!-- Aquí se crea un contenedor para el campo de descripción del producto. -->
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <!-- Se crea un campo de texto para que el usuario introduzca la descripción del producto. -->
                            <input type="text" class="form-control" placeholder="descripción" name='descripcion' value="<?= $producto['descripcion'] ?>" required>
                        </div>
                        <div class="input-group form-group">
                            <!-- Aquí se crea un contenedor para el campo de PVP del producto. -->
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <!-- Se crea un campo numérico para que el usuario introduzca el precio de venta al público (PVP) del producto. -->
                            <input type="number" class="form-control" placeholder="PVP" name='PVP' value="<?= $producto['PVP'] ?>" required>
                        </div>
                        <div class="input-group form-group">
                            <!-- Aquí se crea un contenedor para el campo de la familia del producto. -->
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>

                            <!-- Se crea un menú desplegable con las opciones de las distintas familias a las que puede pertenecer el producto. -->
                            <!-- Creación de un elemento 'select' con nombre 'familia' y requerido -->
                            <select name="familia" required>
                                <!-- Inicio del bucle 'foreach' que recorre el array $familias -->
                                <?php foreach ($familias as $familia) : ?>
                                    <!-- Creación de una opción en el select con valor igual al valor de 'cod' del array actual -->
                                     <!-- Si el valor de 'familia' del producto actual es igual al valor de 'cod' del array actual,
                                          se marca la opción como seleccionada -->
                                    <option value="<?= $familia['cod'] ?>"
                                        <?php if ($producto['familia'] == $familia['cod']) echo "selected" ?>>
                                        <!-- Se muestra el nombre de la familia como texto dentro de la opción -->
                                        <?= $familia['nombre'] ?>
                                    </option>
                                    <!-- Fin del bucle 'foreach' -->
                                <?php endforeach;  ?>
                                <!-- Fin del elemento 'select' -->
                            </select>
                        </div>
                        <form name='formulario2' method='POST' action='<?= $_SERVER['PHP_SELF']; ?>?controlador=actualizar'>
                            <!-- Se crea un formulario para enviar los datos del producto editado. -->
                            <!-- Resto del formulario -->
                            <div class="form-group">
                                <!-- Se crea un botón para enviar el formulario y actualizar el producto. -->
                                <input type="submit" value="Actualizar" class="btn float-left btn-primary" name='editar'>
                                <a href="index.php?familia=<?php echo $producto['familia'] ?>" onclick="history.back(); return false" class="btn btn-danger float-right">Cancelar</a> 

                                 <!-- <a href="index.php?familia=<?php // echo $producto['familia'] ?>" class="btn btn-danger float-right">Cancelar</a> -->
                            </div>
                        </form>
                </div>
            </div>
        </div>

    </div>

</body>

</html>