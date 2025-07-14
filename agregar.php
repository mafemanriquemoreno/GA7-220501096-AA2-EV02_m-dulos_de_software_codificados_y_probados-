<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Nuevo Elemento - LabVentory</title>
    <style>
        /* Estilos generales */
        body { font-family: sans-serif; margin: 0; background-color: #f4f4f9; }
        
        /* Estilo del layout principal */
        .main-content { margin-left: 270px; padding: 20px; }

        /* Estilos para el contenedor del formulario */
        .form-container { 
            max-width: 800px; 
            margin: auto; 
            background: #fff; 
            padding: 30px; 
            border-radius: 8px; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); 
        }
        .form-container h1 { margin-top: 0; }
        .form-grid { 
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            gap: 20px; 
        }
        .form-grid label { 
            display: block; 
            font-weight: bold; 
            margin-bottom: 5px;
        }
        .form-grid input, .form-grid select {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }
        .full-width { grid-column: 1 / -1; }
        .buttons { text-align: right; margin-top: 20px; }
        .buttons button, .buttons input {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 10px;
        }
        .btn-submit { background-color: #007bff; color: white; }
        .btn-cancel { background-color: #6c757d; color: white; }
    </style>
</head>
<body>

    <?php include 'sidebar.php'; ?>

    <div class="main-content">
        <div class="form-container">
            <h1>Agregar Nuevo Elemento</h1>
            <p>Complete los detalles del nuevo producto para añadirlo al inventario.</p>

            <form class="form-grid" action="guardar_elemento.php" method="POST">
                
                <div class="input-group">
                    <label for="nombre_elemento">Nombre del Producto:</label>
                    <input type="text" id="nombre_elemento" name="nombre_elemento" placeholder="Ej: Reactivo de Glucosa" required>
                </div>

                <div class="input-group">
                    <label for="marca">Marca:</label>
                    <input type="text" id="marca" name="marca" placeholder="Ej: Roche">
                </div>

                <div class="input-group">
                    <label for="categoria">Categoría:</label>
                    <select id="categoria" name="id_categoria">
                        <option value="">Seleccione una categoría</option>
                    </select>
                </div>

                <div class="input-group">
                    <label for="proveedor">Proveedor:</label>
                    <select id="proveedor" name="id_proveedor">
                        <option value="">Seleccione un proveedor</option>
                    </select>
                </div>

                <div class="input-group">
                    <label for="presentacion">Presentación:</label>
                    <select id="presentacion" name="presentacion" required>
                        <option value="Ampolla">Ampolla</option>
                        <option value="Frasco">Frasco</option>
                        <option value="Kit">Kit</option>
                        <option value="Bolsa">Bolsa</option>
                        <option value="Casete">Casete</option>
                        <option value="Gradilla">Gradilla</option>
                        <option value="Caja">Caja</option>
                        <option value="Tubos">Tubos</option>
                        <option value="Unidades">Unidades</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>

                <div class="input-group">
                    <label for="lote">Número de Lote:</label>
                    <input type="text" id="lote" name="lote" placeholder="Ej: L202401">
                </div>

                <div class="input-group">
                    <label for="fecha_vencimiento">Fecha de Vencimiento:</label>
                    <input type="date" id="fecha_vencimiento" name="fecha_vencimiento">
                </div>

                <div class="input-group">
                    <label for="existencias_elemento">Cantidad Actual:</label>
                    <input type="number" id="existencias_elemento" name="existencias_elemento" value="1" required>
                </div>

                <div class="input-group">
                    <label for="costo_unitario">Costo Unitario (COP):</label>
                    <input type="number" id="costo_unitario" name="costo_unitario" value="0" step="0.01">
                </div>

                <div class="full-width buttons">
                    <button type="button" class="btn-cancel" onclick="window.location.href='index.php'">Cancelar</button>
                    <button type="submit" class="btn-submit">Agregar Elemento</button>  
                </div>

            </form>
        </div>
    </div>

</body>
</html>