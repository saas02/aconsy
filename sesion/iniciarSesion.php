<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="../web-app/default.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid">

  	<?php 
	include("../web-app/header.php");
	include("../web-app/sidebar.php");
	?>
    
    
  	<div class="span10">
    <div class="hero-unit">
    <h3>Aconsy</h3>
    <p align="justify">
    <h4>Iniciar Sesión</h4>
    
    <form name="login" action="login.php" method="post">
           <table align="center" border="0">
               <tr><td>Cédula:</td><td><input type="text" name="usuario" value="" /></td></tr>
               <tr><td>Contraseña:</td><td><input type="password" name="contrasena" value="" /></td></tr>
           
               <tr><td></td><td><input type='submit' value='Ingresar' class="btn btn-danger"/></td></tr>
               
       </table>
       </form>
	
   	</p>
	</div>
    </div>
 
 <?php 
	include("../web-app/footer.php");
 ?>
</body>
</html>

