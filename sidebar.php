<style>
    .sidebar {
        width: 250px;
        background-color: #f8f9fa;
        padding: 20px;
        height: 100vh; /* Ocupa toda la altura */
        position: fixed; /* Fijo en la pantalla */
        border-right: 1px solid #dee2e6;
    }
    .sidebar h2 {
        font-family: sans-serif;
        color: #333;
    }
    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }
    .sidebar ul li {
        margin: 15px 0;
    }
    .sidebar ul li a {
        text-decoration: none;
        color: #333;
        font-size: 18px;
    }
    .main-content {
        margin-left: 270px; /* Deja espacio para el sidebar */
        padding: 20px;
    }
</style>

<div class="sidebar">
    <h2>LabVentory</h2>
    <ul>
        <li><a href="inicio.php">Inicio</a></li>
        <li><a href="#">Ordenes</a></li>
        <li><a href="#">Personal</a></li>
        <li><a href="#">Alertas</a></li>
        <li><a href="#">Trazabilidad</a></li>
        <li><a href="#">Configuración</a></li>
    </ul>
</div>