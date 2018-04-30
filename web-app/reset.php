<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="..\web-app\default.css" rel="stylesheet" type="text/css" />
</head>
<body>

  	<?php 
	include("\..\web-app\header.php");
	include("\..\web-app\sidebar.php"); 
	?>
    
    
<h1>Modificar Datos</h1>
<p>
<form name="formul" action="modifyDatos.php" method="post">
	<?php 
	$cedula=$_POST['cedula'];
    include("\..\web-app\conexion.php");
	$link=Conectar();	
	echo "<script language='JavaScript'> 
        alert('La Contrasena Del Usuario ".$cedula." Se Ha Cambiado'); 
        window.location='datos.php';
        </script>"; 
	    $cambio=query("UPDATE usuario set contrasena='".md5(@$cedula)."' where cedula=".$cedula."", $link);
		
?>

</p>
	<?php 
        include("\..\web-app/footer.php");
	?>
</body>
</html>