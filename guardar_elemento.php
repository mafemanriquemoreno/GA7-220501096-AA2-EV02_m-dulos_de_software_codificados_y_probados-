<?php

// 1. Incluir el archivo de conexión
require_once 'conexion.php';

// 2. Verificar si los datos fueron enviados por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 3. Recoger y limpiar los datos del formulario
    // Usamos htmlspecialchars para prevenir ataques XSS
    $nombre = htmlspecialchars($_POST['nombre_elemento']);
    $marca = htmlspecialchars($_POST['marca']);
    $lote = htmlspecialchars($_POST['lote']);
    $presentacion = htmlspecialchars($_POST['presentacion']);
    $fecha_vencimiento = htmlspecialchars($_POST['fecha_vencimiento']);
    $existencias = filter_var($_POST['existencias_elemento'], FILTER_SANITIZE_NUMBER_INT);
    
    // Para los campos que pueden estar vacíos o no ser enviados (como los <select>)
    $id_categoria = !empty($_POST['id_categoria']) ? filter_var($_POST['id_categoria'], FILTER_SANITIZE_NUMBER_INT) : null;
    $id_proveedor = !empty($_POST['id_proveedor']) ? filter_var($_POST['id_proveedor'], FILTER_SANITIZE_NUMBER_INT) : null;

    // NOTA: Aún no estamos manejando los campos de la base de datos que no están en el formulario, 
    // como `id_laboratorio` o `tipo_elemento`. Asumiremos valores por defecto o los dejaremos como NULL por ahora.

    try {
        // 4. Preparar la consulta SQL para insertar los datos
        // Usamos marcadores de posición (?) para prevenir inyección SQL
        $sql = "INSERT INTO Elementos_inventario 
                    (nombre_elemento, marca, lote, presentacion, fecha_vencimiento, existencias_elemento, id_categoria, id_proveedor, id_laboratorio) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);

        // 5. Vincular los datos a los marcadores de posición y ejecutar
        // El id_laboratorio lo ponemos como un valor fijo (ej: 1) por ahora.
        // ¡DEBES AJUSTAR ESTO según tu lógica de negocio!
        $id_laboratorio_fijo = 1;

        $stmt->execute([
            $nombre,
            $marca,
            $lote,
            $presentacion,
            $fecha_vencimiento,
            $existencias,
            $id_categoria,
            $id_proveedor,
            $id_laboratorio_fijo
        ]);

        // 6. Redirigir al usuario de vuelta al formulario con un mensaje de éxito
        // echo "¡Elemento guardado con éxito!";
        header('Location: index.php?status=success'); // Opcional: Redirección
exit();
        // header('Location: index.php?status=success'); // Opcional: Redirección
        exit();

    } catch (PDOException $e) {
        // 7. Si hay un error, mostrar un mensaje de error
        die("Error al guardar el elemento: " . $e->getMessage());
    }
} else {
    // Si alguien intenta acceder a este archivo directamente, lo redirigimos
    header('Location: index.php');
    exit();
}
?>