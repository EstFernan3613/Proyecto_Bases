<!DOCTYPE html>
<html>
<head>
  <title>Consultas SQL: declaración SELECT, WHERE y funciones de agregación</title>
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
  </style>
</head>
<body>
  <h1>Consultas SQL: declaración SELECT, WHERE y funciones de agregación</h1>

  <h2>1. Cantidad de cursos en idiomas inglés.</h2>
  <?php
// Paso 1: Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "celsia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Paso 2: Ejecutar la consulta SQL
$sql = "SELECT COUNT(*) AS cantidad_cursos_ingles
FROM Curso
WHERE idioma = 'InglÃ©s';";

$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta: " . $conn->error);
}

// Paso 3: Obtener el número de cursos
$row = $result->fetch_assoc();
$cantidadCursos = $row["cantidad_cursos_ingles"];

// Paso 4: Mostrar el resultado en una tabla HTML
echo "<table>
        <tr>
            <th>Cantidad de cursos en inglés</th>
        </tr>
        <tr>
            <td>$cantidadCursos</td>
        </tr>
      </table>";

// Paso 5: Cerrar la conexión a la base de datos
$conn->close();
?>
  <h2>2. Cantidad de cursos en idiomas español.</h2>
  <?php
// Paso 1: Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "celsia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Paso 2: Ejecutar la consulta SQL
$sql = "SELECT COUNT(*) AS cantidad_cursos_espanol
        FROM curso
        WHERE idioma = 'EspaÃ±ol'";

$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta: " . $conn->error);
}

// Paso 3: Obtener el número de cursos
$row = $result->fetch_assoc();
$cantidadCursos = $row["cantidad_cursos_espanol"];

// Paso 4: Mostrar el resultado en una tabla HTML
echo "<table>
        <tr>
            <th>Cantidad de cursos en español</th>
        </tr>
        <tr>
            <td>$cantidadCursos</td>
        </tr>
      </table>";

// Paso 5: Cerrar la conexión a la base de datos
$conn->close();
?>
  <h2>3. Cantidad de cursos en idiomas holandés.</h2>
  <?php
// Paso 1: Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "celsia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Paso 2: Ejecutar la consulta SQL
$sql = "SELECT COUNT(*) AS cantidad_cursos_espanol
        FROM curso
        WHERE idioma = 'holandes'";

$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta: " . $conn->error);
}

// Paso 3: Obtener el número de cursos
$row = $result->fetch_assoc();
$cantidadCursos = $row["cantidad_cursos_espanol"];

// Paso 4: Mostrar el resultado en una tabla HTML
echo "<table>
        <tr>
            <th>Cantidad de cursos en holandes</th>
        </tr>
        <tr>
            <td>$cantidadCursos</td>
        </tr>
      </table>";

// Paso 5: Cerrar la conexión a la base de datos
$conn->close();
?>
  <h2>4. Cantidad de cursos en idiomas francés.</h2>
  <?php
// Paso 1: Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "celsia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Paso 2: Ejecutar la consulta SQL
$sql = "SELECT COUNT(*) AS cantidad_cursos_espanol
        FROM curso
        WHERE idioma = 'FrancÃ©s'";

$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta: " . $conn->error);
}

// Paso 3: Obtener el número de cursos
$row = $result->fetch_assoc();
$cantidadCursos = $row["cantidad_cursos_espanol"];

// Paso 4: Mostrar el resultado en una tabla HTML
echo "<table>
        <tr>
            <th>Cantidad de cursos en frances</th>
        </tr>
        <tr>
            <td>$cantidadCursos</td>
        </tr>
      </table>";

// Paso 5: Cerrar la conexión a la base de datos
$conn->close();
?>
  <h2>5. Cantidad de cursos aprobados por los empleados.</h2>
  <?php
// Paso 1: Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "celsia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Paso 2: Ejecutar la consulta SQL
$sql = "SELECT COUNT(*) AS cantidad_cursos_aprobados
FROM articulo
WHERE estado_progreso = 'Aprobado (Virtual)';";

$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta: " . $conn->error);
}

// Paso 3: Obtener el número de cursos aprobados
$row = $result->fetch_assoc();
$cantidadCursosAprobados = $row["cantidad_cursos_aprobados"];

// Paso 4: Mostrar el resultado en una tabla HTML
echo "<table>
        <tr>
            <th>Cantidad de cursos aprobados</th>
        </tr>
        <tr>
            <td>$cantidadCursosAprobados</td>
        </tr>
      </table>";

// Paso 5: Cerrar la conexión a la base de datos
$conn->close();
?>
  <h2>6. Cantidad de cursos no aprobados por los empleados.</h2>
  <?php
// Paso 1: Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "celsia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Paso 2: Ejecutar la consulta SQL
$sql = "SELECT COUNT(*) AS cantidad_cursos_no_aprobados
FROM articulo
WHERE estado_progreso = 'No Aprobado (Virtual)';";

$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta: " . $conn->error);
}

// Paso 3: Obtener el número de cursos aprobados
$row = $result->fetch_assoc();
$cantidadCursosAprobados = $row["cantidad_cursos_no_aprobados"];

// Paso 4: Mostrar el resultado en una tabla HTML
echo "<table>
        <tr>
            <th>Cantidad de cursos no aprobados</th>
        </tr>
        <tr>
            <td>$cantidadCursosAprobados</td>
        </tr>
      </table>";

// Paso 5: Cerrar la conexión a la base de datos
$conn->close();
?>
</body>
</html>

