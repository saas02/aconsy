<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="../web-app/default.css" rel="stylesheet" type="text/css" />
</head>
<body>
  	<?php 
	include("../web-app/header.php");
	include("../web-app/sidebar.php"); 
	?>
    <h1>Busqueda</h1>
<table align="center" border="0">
        <tr>
        	<td>
        	<fieldset width="200" height="50">
            <div class="alert alert-danger">  
<fieldset  width="10" height="10"> 			
	<table border="0" align="left">
<form name="formul" action="buscarUsuario.php" method="post">
<tr>
	<td>Curso</td>
<td><select name="miSelect" style="width:215px" align="center">
<?php

include("../web-app/conexion.php");

$link=Conectar();   
$result = query("SELECT * FROM curso", $link);
if ($row = mysql_fetch_array($result)){
do 	{
echo "<option value=".$row["id_curso"].">".$row["codigo"].' - '.$row["nombre"]."</option>";
$_SESSION['cod']=$row["codigo"];
	} while ($row = mysql_fetch_array($result));

} else {

echo "¡ La base de datos está vacia !";
}
?>
</select>
	<input class="btn btn-danger" type="submit" value="Buscar">	
	</td>
</tr>
</form>
<form name="miselect" action="buscarCurso.php" method="post">
<tr>
	<td>Documento</td>
	<td>
	<input  type="text" name="user" style="width:200px">
	<input class="btn btn-danger" type="submit" value="Buscar">
	</td>
<tr>
</tr>
<tr>
    <td colspan="2" align="center">
    <input class="btn btn-danger" type="button" value="Cerrar" name="close" onclick="window.location='usuarioCurso.php'">
	</td>
</tr>
</form>
</table>
 </td></tr></div></table>  	
 	 <?php 
        include("../web-app/footer.php");
     ?>
</body>
</html>

