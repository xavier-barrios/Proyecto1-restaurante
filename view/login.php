<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/code.js"></script>
</head>
  <body class="fondo_login">
  <div class="login">
  <div class="login-triangle"></div>
  <h2 class="login-header">Iniciar Sesion</h2>
    <form class="login-container" action="../controller/loginController.php" method="POST" onsubmit="return validacionForm()">
        
        <p><input type="email" id="email" name="email" placeholder="Email"></p>
    
        <p><input type="password" id="password" name="password" placeholder="Contraseña"></p>
        <div id="message"></div><br>
        <input type="hidden" id="camarero" name="camarero" value="camarero">
        <input type="hidden" id="mantenimiento" name="mantenimiento" value="mantenimiento">
        <input type="submit" value="Entrar">
         
      </form>
    </div>  
      <?php
    ?>
  </body>
</html>