
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="..\web-app\default.css" rel="stylesheet" type="text/css" />
<SCRIPT LANGUAGE="JavaScript">
	function Nuevo(){ 
	if (confirm("¿Desea Reactivar Al Usuario?"))
	{
	window.location='nuevocurso.php';
	}
	else
	window.location='administarCurso.php';
	}
</SCRIPT>
</head>

<body>


  	<?php 
	include("../web-app/conexion.php");
	$link=Conectar();  
	include("../web-app/header.php");
	include("../web-app/sidebar.php"); 
	?>
  	    <h1><?php 
      
       if($_SESSION['rol']==1)
               echo "Administracion de usuarios";
       else
               echo 
                       "<script language='JavaScript'> 
                       alert('Usuario No Autorizado'); 
					   window.location='index.php';
                       </script>"; 
					  
       ?>
   
       </h1>
       
    <p>
 <table border="0" align="center">
<tr><td><div class="alert alert-danger">
<form name="formul" action="activarVisitante.php" method="post">
<fieldset  width="10" height="10"> 
	<table border="0" align="left">
	<tr><td align="center" colspan="2">Activar Usuario</td>
	</tr>
	<tr>
	<td>	
	<?php
	$Cedula=$_POST["Cedula"];	
	@$consulta1=("SELECT cedula,cargo,nombres,primer_apellido,segundo_apellido,area FROM usuario where cedula=".$Cedula."");
		$resul=$link->query($consulta1);	
		@$registro=$resul->fetch_all(MYSQLI_ASSOC);
		$ced=$registro[0]['cedula'];
		$cargo=$registro[0]['cargo'];
		$nombres=$registro[0]['nombres'];
		$primer=$registro[0]['primer_apellido'];
		$segundo=$registro[0]['segundo_apellido'];
		$area=$registro[0]['area'];
	@$consulta= $link->query("SELECT estado FROM usuario WHERE cedula ='".$_POST["Cedula"]."'");
	@$estado= $consulta->fetch_all(MYSQLI_ASSOC);;
	
	
	$sql=$link->query("select * from usuario WHERE cedula =".$Cedula."");
	@$creado=$sql->num_rows;

if ($Cedula==Null)
{
echo "<script language='JavaScript'> 
        alert('Por Favor Insertar Datos'); 
		window.location='buscar.php';
		</script>";

}
else
{	
	SWITCH ($creado)
	{
	case 0:
	echo "<script language='JavaScript'> 
		alert('El usuario No Existe');
					{ 
					if (confirm('¿Desea Crear El Usuario?'))
					{
					window.location='registrarVisitantes.php';
					}
					else
					window.location='buscar.php';
					}
                    </script>";	
	break;
	case 1:
	if ($estado[0]['estado']==0)
		{
	echo "<script language='JavaScript'> 
		alert('El usuario Esta Inactivo');
		</script>";	
	echo "<tr>";
    echo "<td align='left'>Número de Cedula :</td>";
    echo	"<td > <input name='Cedula' readonly type='text' value='".$ced."'/></td>";
	echo "</tr>";
		echo "<tr>";
		echo "<td align='left'>Cargo :</td>";
		echo	"<td > <input name='Cargo' readonly type='text' value='".$cargo."'/></td>";
		echo "</tr>";
			echo "<tr>";
			echo "<td align='left'>Nombres :</td>";
			echo	"<td > <input name='Nombre' readonly type='text' value='".$nombres."'/></td>";
			echo "</tr>";		
				echo "<tr>";
				echo "<td align='left'>Primer Apellido :</td>";
				echo	"<td > <input name='Primer' readonly type='text' value='".$primer."'/></td>";
				echo "</tr>";
					echo "<tr>";
					echo "<td align='left'>Segundo Apellido :</td>";
					echo	"<td > <input name='Segundo' readonly type='text' value='".$segundo."'/></td>";
					echo "</tr>";
						echo "<tr>";
						echo "<td align='left'>Area :</td>";
						echo	"<td > <input name='Area' readonly type='text' value='".$area."'/></td>";
						echo "</tr>";
	echo "<tr>";echo "</tr>";
	echo "<tr>";
		echo "<td colspan='2' align='center'>";
			echo "<input type='submit' value='Activar'>";
		echo "</td>";   
		}
	else
	{
	echo "<script language='JavaScript'> 
        alert('El Usuario Ya Existe'); 
		</script>"; 
	echo "<tr>";
    echo "<td align='left'>Número de Cedula :</td>";
    echo	"<td > <input name='Cedula' readonly type='text' value='".$ced."'/></td>";
	echo "</tr>";
		echo "<tr>";
		echo "<td align='left'>Cargo :</td>";
		echo	"<td > <input name='Cedula' readonly type='text' value='".$cargo."'/></td>";
		echo "</tr>";
			echo "<tr>";
			echo "<td align='left'>Nombres :</td>";
			echo	"<td > <input name='Cedula' readonly type='text' value='".$nombres."'/></td>";
			echo "</tr>";		
				echo "<tr>";
				echo "<td align='left'>Primer Apellido :</td>";
				echo	"<td > <input name='Cedula' readonly type='text' value='".$primer."'/></td>";
				echo "</tr>";
					echo "<tr>";
					echo "<td align='left'>Segundo Apellido :</td>";
					echo	"<td > <input name='Cedula' readonly type='text' value='".$segundo."'/></td>";
					echo "</tr>";
						echo "<tr>";
						echo "<td align='left'>Area :</td>";
						echo	"<td > <input name='Cedula' readonly type='text' value='".$area."'/></td>";
						echo "</tr>";
	echo "<tr>";echo "</tr>";
	echo "<tr>";
		echo "<td colspan='2' align='center'>";
			echo "<input type='button' value='Atras' onclick='window.location= \"../usuario/buscar.php\";'>"; 
		echo "</td>";   
	}
	break;
	}

}
    	?>
  	</td></tr></div></table>      
</form>     
    
    </p>
    
	</div>
    
	 <?php 
        include("../web-app/footer.php");
     ?>
     
</div>
</body>
</html>