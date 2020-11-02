<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
<body>
</body>
</html>
<?php
require_once '../model/mesa.php';
//require_once '../Controller/sessionController.php';
$id_alum=-1;
echo "<div class='insertar'><a href='crear_alumno.html?id_alum=$id_alum'>Insertar</a></div>";
?>

<div class="form">
    <form action="mostrar_alumnos.php" method="POST">
        <label for="fnombre">Nombre</label>
            <input type="text" id="fnombre" name="fnombre" placeholder="Introduce el nombre...">
        <label for="fapellido">Primer apellido</label>
            <input type="text" id="fapellido" name="fapellido" placeholder="Introduce el apellido...">
        <input type="submit" value="Filtrar">
</div>

<?php
if(isset($_POST['fnombre']) || isset($_POST['fapellido'])){
    $alumno = new AlumnoDao();
    echo $alumno->filtrarAlumno();

} else {
$alumno = new AlumnoDao();
echo $alumno->mostrarAlumno();
}
?>