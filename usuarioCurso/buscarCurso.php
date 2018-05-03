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
	
	@$curs=$_SESSION['cod'];
	
	?>
    
    
  	
    <h1>Busqueda Finalizada Por Usuario</h1>
    <p>
<table align="center" border="0">
        <tr>
        	<td>
        	<fieldset width="200" height="50">
            <div class="alert alert-danger">  
<fieldset  width="10" height="10"> 		
	<table border="0" align="center" class="table table-condensed">
<form name="formul" action="buscarCurso.php" method="post">
<tr>
	<td>
<?php
$user=$_POST['user'];
	if ($user=='')
		{
		echo	"<script language='JavaScript'> 
				alert('Por Favor Insertar Datos'); 
				window.location='consultarUsuario.php';
				</script>"; 
		}
	else
		{
		echo	"<script language='JavaScript'> 
				alert('Datos Insertados'); 
				</script>"; 
		}
	

include("../web-app/conexion.php");
$link=Conectar();   
$Sql=query("Select id_usuario from usuario where cedula=".$user."",$link);
$array=mysql_fetch_array($Sql);
$id_user=$array[0];
$sql1=query ("select id_usuario from usuario_curso where id_usuario=".$id_user." ",$link);
	@$row1=mysql_num_rows($sql1);
	if ($row1<1)
	{
		echo 		 "<script language='JavaScript'> 
                     alert('El Usuario No Tiene Curso Asignado'); 
                     window.location='consultarUsuario.php';
                      </script>"; 
	}
	else
$result = query("SELECT curso.codigo FROM curso,usuario_curso where curso.id_curso=usuario_curso.id_curso and usuario_curso.id_usuario=".$id_user."", $link);
$arreglo=mysql_fetch_array($result);
$curso=$arreglo[0];
echo "<h2>";
echo "El Curso del Usuario " .$user; echo " es " .$curso;
echo "</h2>";
?>
</td>
</tr>
</tr>
<tr>
    <td colspan="2" align="center">
    <input class="btn btn-danger" type="button" value="Cerrar" name="close" onclick="window.location='usuarioCurso.php'">
	</td>
</tr>
</table>
</fieldset>
</td></tr></div></table>
 	 <?php 
        include("../web-app/footer.php");
     ?>

</div>
</body>
</html>
