<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="..\web-app\default.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="container">

  	<?php 
	include("../web-app/header.php");
	include("../web-app/sidebar.php"); 
	?>
    
    
  	<div class="content">
    <h1>Modificar Usuario</h1>
    <p>
<?php 
	
		 //$id_usuario=$_POST['id_usuario'];
		 $Cedula=$_POST['Cedula'];
		 $Cargo=$_POST['Cargo'];
		 $Nombres=$_POST['Nombres'];
		 $Primer_Apellido=$_POST['Primer_Apellido'];
		 $Segundo_Apellido=$_POST['Segundo_Apellido'];
		 $Telefono=$_POST["Telefono"];
		 $Celular=$_POST["Celular"];
		 $Extension=$_POST["Extension"];
		 $Direccion=$_POST['Direccion'];
		 $Area=$_POST['Area'];
		 $Estado=$_POST['Estado'];
		
		
	
	include("../web-app/conexion.php");
	$link=Conectar();
	$result = $link->query("UPDATE usuario set cedula=".$Cedula.",cargo='".$Cargo."', nombres='".$Nombres."',primer_apellido='".$Primer_Apellido."',segundo_apellido='".$Segundo_Apellido."',telefono='".$Telefono."',celular='".$Celular."',extension='".$Extension."',direccion='".$Direccion."',area='".$Area."',estado='".$Estado."' where cedula=".$Cedula."");

?>

<table border="0" align="center">

<tr>
<td>
<div class="alert alert-danger">

<?php

echo  "Se Ha Modificado El Usuario: " .$Cedula;

?>

	</td>
</tr>
<tr>
	<td align="center">
    <input class="btn btn-danger" type="button" value="Cerrar" onclick="window.location='administarUsuario.php'">
    </td>
</tr>
</div>
</table>
</form>
   	</p>
	</div>
 	 <?php 
        include("../web-app/footer.php");
     ?>

</div>
</body>

</body>
</html>


<SCRIPT LANGUAGE="JavaScript">;
function guardar()
	{
	alert('El Registro Se Ha Modificado Exitosamente');
	window.location='administarUsuario.php';
	};
</script>;

</body>
</html>