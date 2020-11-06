<?php
// Incluimos los archivos de conexion y el sessionController
require_once '../model/connection.php';
require_once '../controller/sessionController.php';

// Recogemos el valor del puesto de trabajo desde la clase
$puesto_trabajo = $_SESSION['user']->getPuesto_trabajo();

// Si el puesto es camarero, que rediriga a admin1, en cambio si es mantenimiento, que rediriga a adminMantenimiento
if ($puesto_trabajo == 'camarero') {
    header('Location: ../view/admin_1.php');
} else if ($puesto_trabajo == 'mantenimiento') {
    header('Location: ../view/adminMantenimiento.php');
} else {
    header('Location: ../view/login.php');
}
?>