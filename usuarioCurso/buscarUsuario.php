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
	
	$curs=$_SESSION['cod'];
	$user=$_POST['miSelect'];
	?>
    
    
  	
    <h1>Busqueda Finalizada Por Curso</h1>
    <p>
<table align="center" border="0">
        <tr>
        	<td>
        	<fieldset width="200" height="50">
            <div class="alert alert-danger">  
<fieldset  width="10" height="10"> 		
	<legend align="left">Curso</legend>
    <table border="0" align="center"class="table table-condensed">
<form name="formul" method="post">
<tr>
<tr><td align="center">
<select name="usuario" style="width:300px; text-align:center"> 
<?php

include("../web-app/conexion.php");
$link=Conectar();         
$result = query("SELECT usuario.cedula,usuario_curso.id_usuario, usuario.nombres, usuario.primer_apellido FROM usuario_curso, usuario where usuario_curso.id_usuario=usuario.id_usuario and usuario_curso.id_curso=".$user."", $link);
if ($row = mysql_fetch_array($result)){
do 	{
echo "<option value=".$row["id_usuario"].">".$row["cedula"].' - '.$row["nombres"].' '.$row["primer_apellido"]."</option>";

	} while ($row = mysql_fetch_array($result));

} else {

echo "¡ La base de datos está vacia !";
}
?>
</select>
</td>
</tr>
</tr>
<tr>
    <td colspan="2" align="center">
    <input class="btn btn-danger"  type="button" value="Cerrar" name="close" onclick="window.location='usuarioCurso.php'">
	</td>
</tr>
</table>
</fieldset>
   	</p>
</td></tr></div></table>
 	 <?php 
        include("../web-app/footer.php");
     ?>

</div>
</body>
</html>

