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
@$curso=$_POST['miSelect'];
@$user=$_POST['usuario'];
@$curse=$_SESSION['codigo'];
	include("\..\web-app\conexion.php");
	$link=Conectar();
	@$sql=$link->query("select * from usuario where cedula=".$user." ");
	@$row=count($sql);
	
	@$Sql=$link->query("select id_usuario from usuario where cedula=".$user."");
	@$array=$Sql->fetch_all(MYSQLI_ASSOC);        
	@$id_user=$array[0]['id_usuario'];
	@$sql1=$link->query("select id_usuario, id_curso from usuario_curso where id_usuario=".$id_user." ");
	@$row1=$sql1->num_rows;
	
	
	if ($row1>0)
		{
		echo 		 "<script language='JavaScript'> 
				alert('El Usuario Ya tiene Asignado Un Curso'); 
				window.location='userCurse.php';
				</script>"; 
		}
			else 
			
			{	if ($row<1)
				{
				echo 		 "<script language='JavaScript'> 
						alert('El Usuario No Existe'); 
						window.location='userCurse.php';
						</script>"; 
				}
					else
					{
						echo 		 "<script language='JavaScript'> 
						alert('El Usuario ".$user." Se Ha Registrado Al Curso ".$curse."'); 
						window.location='userCurse.php';
						</script>"; 					
					$result = $link->query("INSERT INTO usuario_curso (id_usuario, id_curso) VALUES (".$id_user.",'".$curso."')");
					}
			}
	
	
?>
   
    
  	<div class="content">
    <p>
<form action="curse.php" method="post">
<fieldset  width="10" height="10"> 
	<table border="0" align="center" class="table table-condensed">
<tr>
	<td>
    <legend align="center">Curso-usuario</legend>
    </td>
</tr>
<tr>
	<td><?php  echo "El usuario " .$user; echo " Se ha registrado al curso ".$curse; ?></td>
</tr>
<tr>
	<td colspan="2" align="center">
    <input class="btn btn-danger" type="button" value="Atras" onclick="window.location='usuarioCurso.php'">
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
