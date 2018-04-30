<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="../web-app/default.css" rel="stylesheet" type="text/css" />
</head>
<?php
//header("Content-Type: application/vnd.ms-excel");
//header("Expires: 0");
//header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//header("content-disposition: attachment;filename=Reporte.xls");
?>
<body>


  	<?php 
	include("../web-app/header.php");
	?>
    
    
  	
    
    <h1>
	<?php 
$usuario=$_POST['vehiculos'];
	
if ($usuario=='')
		{
		echo	"<script language='JavaScript'> 
				alert('Por Favor Insertar Usuario'); 
				window.location='generarReportes.php';
				</script>"; 
		}
	else
		{
		
		}
     ?></h1>
    
    <p>
		<?php
		
include("../web-app/conexion.php");
$link=Conectar();   
$query="SELECT  usuario.cedula,usuario.nombres,usuario.primer_apellido,usuario.segundo_apellido,vehiculo.placa,vehiculo.marca,vehiculo.color,vehiculo.tipo 
FROM usuario, usuario_vehiculo, vehiculo
WHERE vehiculo.id_vehiculo=usuario_vehiculo.id_vehiculo
AND usuario.id_usuario=usuario_vehiculo.id_usuario 
AND usuario.cedula=".$usuario."";
$result_query=query($query,$link);
$reg=mysql_num_rows($result_query);
$ediciones = mysql_fetch_array($result_query);
$x=1;
        ?>
		
<table border="1" cellpadding="1" cellspacing="1" bgcolor="#FFB862" align="center">
<tr>
	<td colspan="8" align="center">REPORTE USUARIO - VEHICULOS</td>
</tr>   
   <tr>
    <th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Identificacion</th>
    <th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Nombres</th>
    <th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Primer Apellidos</th>
	<th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Segundo Apellidos</th>
	<th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Placa</th>
	<th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Marca</th>
	<th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Color</th>
	<th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Tipo</th>
    </tr>
        <?php
				
if ($x<$ediciones){
do 	{
echo "<tr>";
echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center' >"; echo $ediciones['cedula']; echo "</td>";
echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $ediciones['nombres']; echo "</td>";
echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $ediciones['primer_apellido']; echo "</td>";
echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $ediciones['segundo_apellido']; echo "</td>";
echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $ediciones['placa']; echo "</td>";
echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $ediciones['marca']; echo "</td>";
echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $ediciones['color']; echo "</td>";
echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $ediciones['tipo']; echo "</td>";
echo "</tr>";
	} while ($ediciones=mysql_fetch_array($result_query));
	} else {
		echo "¡ La base de datos esta vacia !";
}
		?>
		
	
</table>
	<h2 align="center">UNESE-FOREM.     © 2012.</h2>		
		
		
   	</p>

		
 
	 <?php 
        include("../web-app/footer.php");
     ?>
     
</div>
</body>
</html>