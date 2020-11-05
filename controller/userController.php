<?php
require_once '../model/connection.php';
require_once '../controller/sessionController.php';

$puesto_trabajo = $_SESSION['user']->getPuesto_trabajo();

if ($puesto_trabajo == 'camarero') {
    header('Location: ../view/admin_1.php');
} else if ($puesto_trabajo == 'mantenimiento') {
    header('Location: ../view/adminMantenimiento.php');
} else {
    header('Location: ../view/login.php');
}
?>