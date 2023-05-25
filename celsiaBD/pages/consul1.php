<?php
$servername = "Localhost";
$username = "root";
$password = "";
$dbname = "celsia";


// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Consultas SQL: declaración SELECT, WHERE y sentencias JOIN</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;

    }

    h1 {
      text-align: center;
    }

    h2 {
      margin-top: 20px;
    }

    ul {
      list-style-type: decimal;
      
      padding-left: 20px;
      margin-top: 10px;
    }

    li {
      margin-bottom: 10px;
    }
    table{
      border: 1px solid black; /* Ancho y estilo del borde */
    }

    th, td {
        border: 1px solid black; /* Ancho y estilo del borde */
        padding: 8px; /* Espacio interno dentro de las celdas */
    }
  </style>
</head>
<body>
  <h1>Consultas SQL: declaración SELECT, WHERE y sentencias JOIN</h1>

  <h2>1. Mostrar los datos de 10 empleados de la compañía.</h2>
  <?php
// Realiza la conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "celsia");

// Verifica si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexsión: " . $conexion->connect_error);
}

// Ejecuta la consulta a la base de datos
$query = "SELECT * FROM empleado LIMIT 10";
$resultado = $conexion->query($query);

// Imprime la tabla
echo "<table>";
echo "<tr><th>Empleado ID</th><th>Primer Nombre</th><th>Primer Apellido</th><th>Activo</th></tr>";

// Recorre los resultados y muestra los datos en la tabla
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["ID_empleado"] . "</td>";
        echo "<td>" . $fila["Primer_Nombre"] . "</td>";
        echo "<td>" . $fila["Primer_Apellido"] . "</td>";
        echo "<td>" . $fila["Grupo_de_Personal"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No hay resultados</td></tr>";
}

echo "</table>";

// Cierra la conexión a la base de datos
$conexion->close();
?>

  <h2>2. Mostrar los datos de 10 cursos que han sido dictados.</h2>
  <?php
// Realiza la conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "celsia");

// Verifica si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexsión: " . $conexion->connect_error);
}

// Ejecuta la consulta a la base de datos
$query = "SELECT * FROM ARTICULO LIMIT 10";
$resultado = $conexion->query($query);

// Imprime la tabla
echo "<table>";
echo "<tr><th>ID</th><th>nombre</th><th>Calificacion</th><th>EstadoProgreso</th></tr>";

// Recorre los resultados y muestra los datos en la tabla
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["id_articulo"] . "</td>";
        echo "<td>" . $fila["titulo_articulo"] . "</td>";
        echo "<td>" . $fila["calificacion"] . "</td>";
        echo "<td>" . $fila["estado_progreso"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No hay resultados</td></tr>";
}

echo "</table>";

// Cierra la conexión a la base de datos
$conexion->close();
?>
  <h2>3. Mostrar los 5 cursos que han sido realizados por la mayor cantidad de empleados de las sedes de la compañía en Panamá.</h2>
  <?php
// Realiza la conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "celsia");

// Verifica si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexsión: " . $conexion->connect_error);
}

// Ejecuta la consulta a la base de datos
$query = "SELECT curso.titulo_Articulo, COUNT(DISTINCT articulo.Id_empleado) AS total_empleados
FROM curso
JOIN articulo ON curso.titulo_Articulo = articulo.titulo_articulo
JOIN empleado ON articulo.Id_empleado = empleado.ID_empleado
JOIN pais_region ON empleado.Id_pais = pais_region.Id_pais
WHERE pais_region.Pais = 'Panamá'
GROUP BY curso.titulo_Articulo
ORDER BY total_empleados DESC
LIMIT 5;";
$resultado = $conexion->query($query);

// Imprime la tabla
echo "<table>";
echo "<tr><th>Curso</th><th>Total Empleados</th></tr>";

// Recorre los resultados y muestra los datos en la tabla
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["titulo_articulo"] . "</td>";
        echo "<td>" . $fila["total_empleados"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='2'>No hay resultados</td></tr>";
}

echo "</table>";

// Cierra la conexión a la base de datos
$conexion->close();
?>
  <h2>4. Mostrar los 5 cursos que han sido realizados por la mayor cantidad de empleados de las sedes de la compañía en Costa Rica.</h2>
  <?php
// Realiza la conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "celsia");

// Verifica si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexsión: " . $conexion->connect_error);
}
// Ejecuta la consulta a la base de datos
$query = "SELECT curso.titulo_Articulo, COUNT(DISTINCT articulo.Id_empleado) AS total_empleados
FROM curso
JOIN articulo ON curso.titulo_Articulo = articulo.titulo_articulo
JOIN empleado ON articulo.Id_empleado = empleado.ID_empleado
JOIN pais_region ON empleado.Id_pais = pais_region.Id_pais
WHERE pais_region.Pais = 'Costa Rica'
GROUP BY curso.titulo_Articulo
ORDER BY total_empleados DESC
LIMIT 5;";
$resultado = $conexion->query($query);

// Imprime la tabla
echo "<table>";
echo "<tr><th>Curso</th><th>Total Empleados</th></tr>";

// Recorre los resultados y muestra los datos en la tabla
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["titulo_articulo"] . "</td>";
        echo "<td>" . $fila["total_empleados"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='2'>No hay resultados</td></tr>";
}

echo "</table>";

// Cierra la conexión a la base de datos
$conexion->close();
?>
  <h2>5. Mostrar los 10 cursos en modalidad virtual que han sido realizados por la mayor cantidad de empleados de las sedes de la compañía en Colombia.</h2>
  <?php
// Realiza la conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "celsia");

// Verifica si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexsión: " . $conexion->connect_error);
}
$query = "SELECT curso.titulo_Articulo, COUNT(DISTINCT articulo.Id_empleado) AS total_empleados
FROM curso
JOIN articulo ON curso.titulo_Articulo = articulo.titulo_articulo
JOIN empleado ON articulo.Id_empleado = empleado.ID_empleado
JOIN pais_region ON empleado.Id_pais = pais_region.Id_pais
WHERE pais_region.Pais = 'Colombia' AND Articulo.tipo_Articulo = 'VIRTUAL'
GROUP BY curso.titulo_Articulo
ORDER BY total_empleados DESC
LIMIT 10;
";
$resultado = $conexion->query($query);

// Imprime la tabla
echo "<table>";
echo "<tr><th>Nombre del Curso</th><th>Estado de Progreso</th></tr>";

// Recorre los resultados y muestra los datos en la tabla
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["titulo_Articulo"] . "</td>";
        echo "<td>" . $fila["total_empleados"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No hay resultados</td></tr>";
}

echo "</table>";

// Cierra la conexión a la base de datos
$conexion->close();
?>
  <h2>6. Mostrar los 10 cursos en modalidad presencial que han sido realizados por la mayor cantidad de empleados de las sedes de la compañía en Colombia.</h2>
  <?php
// Realiza la conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "celsia");

// Verifica si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexsión: " . $conexion->connect_error);
}
// Ejecuta la consulta a la base de datos
$query = "SELECT curso.titulo_Articulo, COUNT(DISTINCT articulo.Id_empleado) AS total_empleados
FROM curso
JOIN articulo ON curso.titulo_Articulo = articulo.titulo_articulo
JOIN empleado ON articulo.Id_empleado = empleado.ID_empleado
JOIN pais_region ON empleado.Id_pais = pais_region.Id_pais
WHERE pais_region.Pais = 'Colombia' AND Articulo.tipo_Articulo = 'PRES'
GROUP BY curso.titulo_Articulo
ORDER BY total_empleados DESC
LIMIT 5";
$resultado = $conexion->query($query);

// Imprime la tabla
echo "<table>";
echo "<tr><th>Nombre del Curso</th><th>Estado de Progreso</th></tr>";

// Recorre los resultados y muestra los datos en la tabla
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $fila["titulo_Articulo"] . "</td>";
      echo "<td>" . $fila["total_empleados"] . "</td>";
      echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No hay resultados</td></tr>";
}

echo "</table>";

// Cierra la conexión a la base de datos
$conexion->close();
?>
  <h2>7. Mostrar los 10 empleados con las mejores notas (calificación). Para este caso tomaremos como la mejor nota el valor 100.</h2>
  <?php
// Realiza la conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "celsia");

// Verifica si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexsión: " . $conexion->connect_error);
}
// Ejecuta la consulta a la base de datos
$query = "SELECT * FROM Empleado
JOIN articulo ON empleado.ID_empleado = articulo.Id_empleado
WHERE articulo.calificacion = '100'
ORDER BY articulo.calificacion DESC
LIMIT 10;";
$resultado = $conexion->query($query);

// Imprime la tabla
echo "<table>";
echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th></tr>";

// Recorre los resultados y muestra los datos en la tabla
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["ID_empleado"] . "</td>";
        echo "<td>" . $fila["Primer_Nombre"] . "</td>";
        echo "<td>" . $fila["Primer_Apellido"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No hay resultados</td></tr>";
}

echo "</table>";

// Cierra la conexión a la base de datos
$conexion->close();
?>


</body>
</html>
