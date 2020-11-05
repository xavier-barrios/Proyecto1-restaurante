<?php
require_once '../model/historicoDAO.php';

session_start();
$historico = new HistoricoDAO();
echo $historico->filtrarHistorico();

