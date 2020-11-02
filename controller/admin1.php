<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>
</head>
<body>
     <?php
     require_once './sessionController.php';
    ?> 
    <button><a href="./insertar_alumnos.php">Insertar alumnos</a></button>
    <div>
        <h2>Alumnos</h2>
        <!-- <form action="./zona.admin.php" method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre_alumno" name="nombre_alumno" placeholder="Nombre"><br><br>
        <label for="apellido1">1er apellido:</label><br>
        <input type="text" id="apellidop_alumno" name="apellidop_alumno" placeholder="Apellido Paterno"><br><br>
        <input type="submit" value="Filtrar" name="b_filtro"> -->

        <table>
            <thead>
            <tr>
                <th>Salas</th>
                <th>Mesas Ocupadas</th>
                <th>Mesas Libres</th>
            </tr>
            </thead>
            <!-- <?php 
            
                // include './alumnoDao.php';
                // if (isset($_GET['id_alumno'])) {
                //     $borrar_alu = new AlumnoDao;;
                //     $borrar_alu->borrar();
                // }
                // if (empty($_POST['b_filtro'])){
                //     $mostrar_alu=new AlumnoDao;
                //     echo $mostrar_alu->mostrar();
                // } else if (empty($_POST['nombre_alumno']) && empty($_POST['apellidop_alumno'])) {
                //     $mostrar_alu=new AlumnoDao;
                //     echo $mostrar_alu->mostrar();
                // } else if (isset($_POST['nombre_alumno']) || isset($_POST['apellidop_alumno'])){
                //     $filtros_alu=new AlumnoDao;
                //     $filtros_alu->filtros();
                // }
            ?> -->
        </table>
    </div>
</body>
</html>