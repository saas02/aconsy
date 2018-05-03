<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
header("Content-Type: application/vnd.ms-excel");
//header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=Reporte.xls");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="../web-app/default.css" rel="stylesheet" type="text/css" />
</head>

<body>



<h1 align="center">ACONSY</h1>
<img src="http://img.directindustry.es/images_di/photo-m2/sensores-biometricos-lectores-de-huellas-dactilares-38586-2659895.jpg">
<br><h1>Estudiantes Por Curso</h1>
<?php
include("../web-app/conexion.php");
$link=Conectar();         
$query="SELECT usuario_curso.id_usuario, usuario.nombres, usuario.primer_apellido FROM usuario_curso, usuario where usuario_curso.id_usuario=usuario.id_usuario";
$result_query=query($query,$link);
$reg=mysql_num_rows($result_query);
$ediciones = mysql_fetch_array($result_query);
$x=1;
?>
<table border="1" cellpadding="1" cellspacing="1" bgcolor="#FFB862" align="center">
<tr>
<!-- IDENTIFICACION -->
<td width="100" bgcolor="#FFFFFF"></td>
<!-- NOMBRE -->
<td width="300" 	bgcolor="#FFFFFF"></td>
<!-- PRIMER APELLIDO -->
<td width="300" bgcolor="#FFFFFF"></td>				
</tr>
    <tr>
    <th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Identificacion</th>
    <th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Nombre</th>
    <th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Apellidos</th>
    </tr>
        <?php
				
if ($x<$ediciones){
do 	{
echo "<tr>";
echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center' >"; echo $ediciones['id_usuario']; echo "</td>";
echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $ediciones['nombres']; echo "</td>";
echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $ediciones['primer_apellido']; echo "</td>";
echo "</tr>";
	} while ($ediciones=mysql_fetch_array($result_query));
	} else {
		echo "¡ La base de datos está vacia !";
}
		?>
		
	
</table>
	<h2 align="center">UNESE-FOREM.     © 2012.</h2>
</div>
</body>
</html>

