<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="datetimepick/datetimepicker.js"> </script> 
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
	@$usuario=$_POST['usuario'];
	@$inicio=$_POST['inicio'];//fecha inicio calendario
	@$fin=$_POST['fin'];//fecha fin calendario
	session_start();
	$cedula=$_SESSION['cedula'];
    ?>
	
    
    
    <h1>REPORTE DE INGRESOS</h1><BR>
	</h1>
    
	 <p>
		<?php
include("../web-app/conexion.php");
$link=Conectar();   
$userReport="select nombres,primer_apellido,segundo_apellido,cedula,cargo,area,telefono from usuario where cedula=".$usuario."";
$resultuserReport=$link->query($userReport);
$datoUserReport=$resultuserReport->fetch_all(MYSQLI_ASSOC);  

$user="Select nombres, primer_apellido, segundo_apellido, cedula from usuario where cedula=".$cedula."";
$resultuser=$link->query($user);
@$datos=$resultuser->fetch_all(MYSQLI_ASSOC);  
$dato=$datos[0]['nombres']." ".$datos[0]['primer_apellido']." ".$datos[0]['segundo_apellido']." C.C ".$datos[0]['cedula'];

$query="SELECT ingreso.fecha_entrada, ingreso.fecha_salida, usuario.cedula, usuario.nombres, usuario.primer_apellido, usuario.segundo_apellido
FROM ingreso, ingreso_usuario, usuario
WHERE ingreso.id_ingreso = ingreso_usuario.id_ingreso
AND usuario.id_usuario = ingreso_usuario.id_usuario
AND usuario.cedula=".$usuario."
AND ingreso.fecha_entrada >= '".date("Y-m-d 00:00:00", strtotime($inicio))."' AND ingreso.fecha_entrada <= '".date("Y-m-d 24:00:00", strtotime($fin))."'";
$result_query=$link->query($query);
$reg=$result_query->num_rows;
$ediciones = $result_query->fetch_all(MYSQLI_ASSOC);
$x=1;
        ?>

<form name="ingreso" method="POST">		
<input type="hidden" name="user" VALUE="<?php echo $usuario ?>">
<input type="hidden" name="in" VALUE="<?php echo $inicio ?>">
<input type="hidden" name="fin" VALUE="<?php echo $fin ?>">
<?php
echo "<tr>";
echo "<b>Usuario: </b>".$datoUserReport[0]['nombres']." ".$datoUserReport[0]['primer_apellido']." ".$datoUserReport[0]['segundo_apellido']."<br>";
echo "<b>Cedula: </b>".$datoUserReport[0]['cedula']."<br>";
echo "<b>Cargo: </b>".$datoUserReport[0]['cargo']."<br>";
echo "<b>Area: </b>".$datoUserReport[0]['area']."<br>";
echo "<b>Telefono: </b>".$datoUserReport[0]['telefono']."<br>";
echo "<br>";
?>
<table width="700" border="1" cellpadding="1" cellspacing="1" bgcolor="#FFB862" align="center">
    <tr>
    <th width="120" bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Fecha Entrada</th>
    <th width="120" bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Fecha Salida</th>
	<th width="100" bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Cedula</th>
    <th width="150" bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Nombre</th>
	<th width="150" bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Primer Apellido</th>
    <th width="150" bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Segundo Apellido</th>
    </tr>
	
        <?php
        
         foreach($ediciones as $edicion){
            echo "<tr>";
            echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center' >"; echo $edicion['fecha_entrada']; echo "</td>";
            echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $edicion['fecha_salida']; echo "</td>";
            echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $edicion['cedula']; echo "</td>";
            echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $edicion['nombres']; echo "</td>";
            echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center' >"; echo $edicion['primer_apellido']; echo "</td>";
            echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $edicion['segundo_apellido']; echo "</td>";
            echo "</tr>";
        } 
				
    ?>
		
<tr>
	<td align="center" colspan="6">
	<input type="submit" value="Exportar" onclick=this.form.action='reportepdf.php'>
	<input type="button" value="Atras" onclick=window.location='ingresos.php'>
	<input type="hidden" value="<?php echo $dato?>" name="dato" >
	</td>
</tr>		
</table>
</form>
	<h6 align="right">Impreso Por: <?php echo $dato?></h6>
	
     
   	</p>

	
	
 
	 <?php 
        include("../web-app/footer.php");
     ?>
     
</div>
</body>
</html>