<?php
require_once '../model/historicoDAO.php';
$historico = new HistoricoDAO();
echo $historico->filtrarHistorico();


