<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="..\web-app\default.css" rel="stylesheet" type="text/css" />
</head>

<body>


<?php 
	include("\..\web-app\header.php");
	include("\..\web-app\sidebar.php"); 
?>
	

<?php
include("\..\web-app\conexion.php");
$link=Conectar();
$curso=$_POST['miSelect'];
$user=$_POST['usuario'];
@$Sql=query("Select id_usuario from usuario where cedula=".$user."",$link);
@$array=mysql_fetch_array($Sql);
@$id_user=$array[0];
$sql1=query ("select * from usuario_curso where id_curso=".$curso." AND id_usuario=".$id_user."",$link);
@$row=mysql_num_rows($sql1);
if ($row>0)
	{
	echo 		 "<script language='JavaScript'> 
			alert('El Usuario ".$user." Se Ha Eliminado del curso'); 
			window.location='userCurse.php';
			</script>"; 
	$delete= query ("DELETE from usuario_curso where id_curso=".$curso." AND id_usuario=".$id_user."",$link);
	}
	else
	{
	echo 		 "<script language='JavaScript'> 
			alert('El Usuario Y El Curso No Coinciden'); 
			window.location='userCurse.php';
			</script>"; 
	}
	
?>
  	<div class="content">
    <p>
<form action="curse.php" method="post">
<fieldset  width="10" height="10"> 
	<legend align="left">Eliminar usuario de curso</legend>
    <table border="1" align="center">
<tr>
	<td align="center">
    <legend>Curso-usuario</legend>
    </td>
</tr>
<tr>
	<td><?php  echo "El usuario " .$user; echo " Se Ha Eliminado"; ?></td>
</tr>
<tr>
	<td colspan="2" align="center">
    <input type="button" value="Atras" onclick="window.location='usuarioCurso.php'">
    </td>
</table></fieldset>
</form>
	   	  
	
   	</p>
	</div>
 
	 <?php 
        include("\..\web-app/footer.php");
     ?>
   
 
</div>
</body>
</html>
