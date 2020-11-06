
<?php
require_once '../model/connection.php';
require_once '../model/user.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>

    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">

</head>
<body>
     <?php
        require_once '../model/salaDAO.php';
        require_once 'header.html';
        require_once '../controller/sessionController.php';
    ?>
    <main class="main--admin container">
        <div class="container-admin">
            <h2>Restaurante</h2>
            <div class="admin--table">
                <table>
                    <thead>
                    <tr>
                        <th>Salas</th>
                        <th>Mesas Ocupadas</th>
                        <th>Mesas Libres</th>
                    </tr>
                    </thead>
                        <?php
                            $sala =  new SalaDAO();
                            echo $sala->mostrarSalasMesas();    
                        ?>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
