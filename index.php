<?php
// PARTE 1: LÓGICA PHP PARA OBTENER DATOS DE LA BASE DE DATOS
require_once 'conexion.php';

try {
    // Consulta SQL para obtener todos los elementos del inventario
    $sql = "SELECT * FROM Elementos_inventario ORDER BY nombre_elemento ASC";
    $stmt = $pdo->query($sql);

    // Obtener todos los resultados para usarlos en la tabla
    $elementos = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Manejo de errores si la consulta falla
    die("Error al consultar los elementos: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario LabVentory</title>
    <style>
        /* Estilos generales con la nueva paleta de colores */
        body { 
            font-family: sans-serif; 
            margin: 0; 
            background-color: #F6F6F6; /* Color de fondo general */
        }
        a { text-decoration: none; color: #1E56A0; font-weight: bold; }
        
        /* Estilos del layout */
        .main-content { margin-left: 270px; padding: 20px; }
        
        /* Estilos para la cabecera y controles */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center; 
            padding-bottom: 20px;
        }
        .header h1 { 
            margin: 0; 
            color: #163172; 
        }
        .header .actions {
            display: flex; 
        }
        .header .actions button {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-left: 10px; 
            color: white; 
        }
        .actions .btn-agregar { background-color: #1E56A0; }
        .actions .btn-editar { background-color: #D6E4F0; color: #163172; } 
        .actions .btn-liberar { background-color: #163172; }

        .controls {
            display: flex;
            gap: 10px; 
            align-items: center;
            margin-bottom: 20px;
        }
        .controls .search-bar {
            flex-grow: 1; 
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .controls button {
            padding: 10px 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        /* Estilos de la tabla con la nueva paleta */
        table { 
            width: 100%; 
            border-collapse: collapse; 
            background-color: white; 
            border-radius: 8px; 
            overflow: hidden; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); 
        }
        th, td { padding: 15px; border-bottom: 1px solid #ddd; text-align: left; }
        th { 
            background-color: #163172; 
            color: white;
        }
        tr:hover { 
            background-color: #D6E4F0; 
        }
        
        /* Estilo para el mensaje de éxito */
        .alert-success {
            padding: 15px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    
    <?php include 'sidebar.php'; ?>

    <div class="main-content">

        <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
            <div class="alert-success">
                ¡Elemento agregado al inventario con éxito!
            </div>
        <?php endif; ?>

        <div class="header">
            <h1>BioLab S.A.</h1>
            <div class="actions">
                <button class="btn-liberar" onclick="alert('Se está trabajando en la página. ¡Pronto verá las actualizaciones!')">Liberar</button>
                <button class="btn-agregar" onclick="window.location.href='agregar.php'">Agregar</button>
                <button class="btn-editar" onclick="alert('Se está trabajando en la página. ¡Pronto verá las actualizaciones!')">Editar</button>
            </div>
        </div>

        <div class="controls">
            <input type="text" class="search-bar" placeholder="🔍 Buscar...">
            <button onclick="alert('Se está trabajando en la página. ¡Pronto verá las actualizaciones!')">Ordenar ⌄</button>
            <button onclick="alert('Se está trabajando en la página. ¡Pronto verá las actualizaciones!')">Filtrar ⏯</button>
        </div>
        
        <?php if (empty($elementos)): ?>
            <p>No hay elementos en el inventario. <a href="agregar.php">¡Agrega el primero!</a></p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Lote</th>
                        <th>Presentación</th>
                        <th>Vencimiento</th>
                        <th>Existencias</th>
                        <th>Costo Unitario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($elementos as $elemento): ?>
                        <tr>
                            <td><?= htmlspecialchars($elemento['nombre_elemento']) ?></td>
                            <td><?= htmlspecialchars($elemento['marca']) ?></td>
                            <td><?= htmlspecialchars($elemento['lote']) ?></td>
                            <td><?= htmlspecialchars($elemento['presentacion']) ?></td>
                            <td><?= htmlspecialchars($elemento['fecha_vencimiento']) ?></td>
                            <td><?= htmlspecialchars($elemento['existencias_elemento']) ?></td>
                            <td>$ <?= number_format($elemento['costo_unitario'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        
    </div>

</body>
</html>