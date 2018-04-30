<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="../web-app/default.css" rel="stylesheet">
</head>

<body>


  	<?php 
	include("../web-app/header.php");
	include("../web-app/sidebar.php"); 
	?>
    
    
  	<div class="content">
    
    <p>
    <fieldset>
    <legend><h3>Conectando...</h3></legend>
    
    
  	<br /><br />
    
    <p align="center"><img src="../web-app/img/aconsy.png" align="middle"/></p>
    <br /><br />
        
    </fieldset>
    </p>  
	</div>
    
	<?php		
    	include("../web-app/footer.php");
		include("../web-app/conexion.php");
		$link=Conectar();
		$user = $_POST["usuario"];  
		$pass = $_POST["contrasena"];
		$pass = md5($pass);
		
		$Sql="select id_rol, nombres, usuario.cedula from usuario, usuario_rol where usuario.cedula = ".$user." and usuario_rol.id_usuario = usuario.id_usuario and contrasena = '".$pass."'";      		
		$result = $link->query($Sql);
		$datos = $result->fetch_all(MYSQLI_ASSOC);		
		
		$rol=$datos[0]['id_rol'];
		$nombre = $datos[0]['nombres'];
		$cedula = $datos[0]['cedula'];
		$_SESSION['rol'] = $rol;
		$_SESSION['nombre'] = $nombre;
		$_SESSION['cedula'] = $cedula;
		$numRow=count($result);
		if($numRow >0){
			echo 
			"<script language='JavaScript'> 
			alert('Bienvenido ".$nombre."'); 
			window.location='../index.php';
			</script>";
		}else{
			echo 
			"<script language='JavaScript'> 
			alert('Usuario no Encontrado'); 
			window.location='../index.php';
			</script>";
		}
    
    ?>	
</body>
</html>

