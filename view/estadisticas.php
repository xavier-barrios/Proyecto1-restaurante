<?php
require_once '../model/historicoDAO.php';
// require_once '../model/user.php';
// require_once '../model/connection.php';
// if (!isset($_SESSION['user'])) {
//     header('Location:login.php');
// }
// session_start();
$historico = new HistoricoDAO();
echo $historico->filtrarHistorico();

// echo "<a href='./admin_1.php'>Volver</a>";