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
	$nombre=$_POST['nombre'];
	$primerApellido=$_POST['primerApellido'];
	$segundoApellido=$_POST['segundoApellido'];
	$telefono=$_POST['telefono'];
	$celular=$_POST['celular'];
	$extension=$_POST['extension'];
	$direccion=$_POST['direccion'];
	include("../web-app/conexion.php");
	$link=Conectar();
	
	echo "<script language='JavaScript'> 
                alert('Se Modifico El Usuario: ".$nombre."  ".$primerApellido."'); 
                window.location='/Aconsy/index.php';
                </script>"; 
	$result = query("UPDATE usuario set nombres='".$nombre."', primer_apellido='".$primerApellido."', segundo_apellido='".$segundoApellido."', telefono=".$telefono.", celular=".$celular.", extension=".$extension.", direccion='".$direccion."' where cedula=".$cedula."", $link);
	
	
	?>

</form>
</p>
	<?php 
        include("../web-app/footer.php");
	?>
</body>
</html>

