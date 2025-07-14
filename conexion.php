<?php
// Parámetros de conexión a la base de datos PostgreSQL
$host = 'localhost';
$port = '5432';
$dbname = 'labventory_BD'; // El nombre de tu base de datos
$user = 'postgres'; // Tu usuario de PostgreSQL
$password = '0000'; // Tu contraseña de PostgreSQL (ajústala si es diferente)

// Crear la cadena de conexión (DSN)
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

try {
    // Crear una nueva instancia de PDO para la conexión
    $pdo = new PDO($dsn);

    // Configurar PDO para que lance excepciones en caso de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Opcional: Descomenta la siguiente línea si quieres probar que la conexión funciona.
    // echo "¡Conexión a la base de datos establecida con éxito!";

} catch (PDOException $e) {
    // Si hay un error en la conexión, se captura y se muestra un mensaje
    die("Error: No se pudo conectar a la base de datos. " . $e->getMessage());
}
?>