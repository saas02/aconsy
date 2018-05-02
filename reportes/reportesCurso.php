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
	$valor=$_POST['curso'];
	
	   if (isset($_SESSION['rol'])){
		 if($_SESSION['rol']==1 || $_SESSION['rol']==4)
	 echo "Reportes Curso";
			else
	 echo 
		 "<script language='JavaScript'> 
		 alert('Usuario No Autorizado'); 
		 window.location='../index.php';
		 </script>"; 

		 }else{
			   echo 
				 "<script language='JavaScript'> 
				 alert('Debe Iniciar Sesion'); 
				 window.location='../index.php';
				 </script>"; 
				 
				 }
     ?></h1>
    
    <p>
		<?php
include("../web-app/conexion.php");
$link=Conectar();   

$query="SELECT usuario.cedula, usuario.nombres, usuario.primer_apellido,usuario.segundo_apellido FROM usuario_curso, usuario where usuario_curso.id_usuario=usuario.id_usuario and usuario_curso.id_curso=".$valor."";
$result_query=$link->query($query);
$reg=$result_query->num_rows;
@$arrays=$result_query->fetch_all(MYSQLI_ASSOC);  
$x=1;
        ?>
<table border="1" cellpadding="1" cellspacing="1" bgcolor="#FFB862" align="center">
    <tr>
    <th colspan="3" bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Reporte Curso</th>    
    </tr>
    <tr>
    <th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Identificacion</th>
    <th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Nombre</th>
    <th bgcolor="#FDEBC1" class="Estilo_Titulo1" scope="col">Apellidos</th>
    </tr>
        <?php
	foreach(@$arrays as $array){
            echo "<tr>";
            echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center' >"; echo $array['cedula']; echo "</td>";
            echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $array['nombres']; echo "</td>";
            echo "<td bgcolor='#FFFFFF' class='Estilo3' align='center'>"; echo $array['primer_apellido']. ' ' .$array['segundo_apellido']; echo "</td>";
            echo "</tr>";
        }   		
?>			
</table>	
</div>
</body>
</html>