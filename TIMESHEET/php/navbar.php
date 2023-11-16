<ul class="navbar">
    <li class="navitem"><a href="../Menu/menu.php?id=<?php echo isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : ''; ?>">Timesheet</a></li>
    <li class="navitem"><a href="../Menu/menu.php?id=<?php echo isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : ''; ?>">Inicio</a></li>
    <li class="navitem"><a href="../AgregarProyecto/agregarproyecto.php">Agregar Proyecto</a></li>
    <li class="navitem"><a href="../php/cerrar_sesion.php">Cerrar Sesion</a></li>
</ul>