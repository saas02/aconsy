<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
header("Content-Type: application/vnd.ms-excel");
//header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=Reporte.xls");
?>
<body>  
    <h1>
	<?php 
	$usuario=$_POST['usuario'];
	
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

$query="SELECT  usuario.cedula,usuario.nombres,usuario.primer_apellido,usuario.segundo_apellido,elemento.tipo,elemento.serial,elemento.descripcion 
FROM usuario, usuario_elemento, elemento
WHERE elemento.id_elemento=usuario_elemento.id_elemento
AND usuario.id_usuario=usuario_elemento.id_usuario 
AND usuario.cedula=".$usuario."";
$result_query=$link->query($query);
$reg=$result_query->num_rows;
@$arrays=$result_query->fetch_all(MYSQLI_ASSOC);  

$x=1;
        ?>
		
<table border="1" cellpadding="1" cellspacing="1" bgcolor="#FFB862" align="center">
<tr>
	<td colspan="7" align="center">REPORTE USUARIO - ELEMENTOS</td>
</tr> 
	<tr>
    <th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Identificacion</th>
    <th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Nombres</th>
    <th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Primer Apellidos</th>
	<th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Segundo Apellidos</th>
	<th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Elemento</th>
	<th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Serial</th>
	<th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Descripcion</th>
    </tr>
        <?php
	
        foreach(@$arrays as $array){
            echo "<tr>";
            echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center' >"; echo $array['cedula']; echo "</td>";
            echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $array['nombres']; echo "</td>";
            echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $array['primer_apellido']; echo "</td>";
            echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $array['segundo_apellido']; echo "</td>";
            echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $array['tipo']; echo "</td>";
            echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $array['serial']; echo "</td>";
            echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $array['descripcion']; echo "</td>";
            echo "</tr>";
        }   
    ?>
		
	
</table>
</div>
</body>
</html>