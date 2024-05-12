<?php
$host = '127.0.0.1'; // Cambiar según tu configuración
$usuario = 'root'; // Cambiar según tu configuración
$contraseña = '5544'; // Cambiar según tu configuración
$base_de_datos = 'tienda_de_ropa'; // Cambiar según tu configuración

// Crear una conexión
$conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// echo "Conexión exitosa";
$sql = "SELECT ID_EMPLEADO, NOMBRE, CARGO, TELEFONO FROM empleados"; // Corregir el nombre de la tabla
$result = $conexion->query($sql); // Utilizar $conexion en lugar de $conn

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>no entrar</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            border: 0;
            padding: 0;
            background-color: #C0C9CD;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;

        }

        nav ul li {
            float: left;
            margin: 0px 50px 0px 0px;
        }

        table {
            margin: 0px 20px 0px 0px;
            width: calc(100% - 10px);

        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            background-color: #fff;
        }

        tr {
            height: 30px;
            background-color: #DADFE1;
            color: black;
        }
        input {
            margin: 5px 0pc 0px 20px;
            border-radius: 15px 15px;
            font-size: 30px;
            height: 54px;
            width: 300px;
        }

        .Boton {
            margin: 5px 5px;
            background-color: #DADFE1;
            border-radius: 50px;
            font-size: 15px;
            height: 54px;
            width: calc(170% - 10px);
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><input class="Boton" type="submit" name="Agregar" value="Agregar"></li>
            <li><input class="Boton" type="button" name="Editar" value="Editar"></li>
            <li><input class="Boton" type="button" name="Eliminar" value="Eliminar"></li>
            <li><input type="text" name="Buscar" id="Buscar"></li>
        </ul>
    </nav>
    <table>
        <tr>
            <td>N</td>
            <td>Nombre</td>
            <td>Cargo</td>
            <td>Teléfono</td>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Mostrar los datos de cada usuario
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["ID_EMPLEADO"] . "</td><td>" . $row["NOMBRE"] . "</td><td>" . $row["CARGO"] . "</td><td>" . $row["TELEFONO"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>0 resultados</td></tr>";
        }
        ?>
        <?php if (isset($_POST['boton'])) {
            $boton = $_POST['boton'];
            if ($boton === "Agregar") { ?>
                <tr>
                    <td><button name="guardar" id="guardar">Guardar</button></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
        <?php }
        } ?>
    </table>
    <?php $conexion->close(); ?>
</body>

</html>