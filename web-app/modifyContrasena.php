<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="..\web-app\default.css" rel="stylesheet" type="text/css" />
</head>
<body>

  	<?php 
	include("../web-app/header.php");
	include("../web-app/sidebar.php"); 
	?>
    
    
<h1>Modificar Datos</h1>
<p>
<form name="formul" action="modificarDatos.php" method="post">
	<?php 
	
	@session_start();
        $cedula=$_SESSION['cedula'];
        include("../web-app/conexion.php");
	$link=Conectar();	
	$datos = query("SELECT contrasena FROM usuario where cedula=".$cedula."", $link);
	$datosUsuario=mysql_fetch_array($datos);
	$contrasena=$datosUsuario[0];
	$cedula;
	
	$ant=$_POST['antigua'];
	$antigua=md5(@$ant);
	$nueva=$_POST['nueva'];
	$verificaNueva=$_POST['verificaNueva'];
	
	if ($antigua!=$contrasena)
	{
	echo "<script language='JavaScript'> 
             alert('La Contrasena No Corresponde'); 
             window.location='contrasena.php';
             </script>"; 
	}     
	else
	{
	if ($nueva==$verificaNueva)
	{
	echo "<script language='JavaScript'> 
             alert('La Contrasena Se Ha Cambiado'); 
             window.location='datos.php';
             </script>"; 
	     $cambio=query("UPDATE usuario set contrasena='".md5(@$nueva)."' where cedula=".$cedula."", $link);
	     
	}     
	else
	{
	echo "<script language='JavaScript'> 
             alert('Hay Un Error En El Cambio De Contrasena, Por Favor Intentar De Nuevo'); 
             window.location='contrasena.php';
             </script>";
	}
	};
	
	
	
?>
	
	
	
	
	
	

</form>
</p>
	<?php 
        include("../web-app/footer.php");
	?>
</body>
</html>

