<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="../web-app/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function validar(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
    patron =/[A-Za-z\s]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
} 
</script>
</head>

<body>


<form name="formul" action="modify.php" method="post">
  	<?php 
	include("../web-app/header.php");
	include("../web-app/sidebar.php"); 
	?>
    
    
 
    <h1>Modificar Curso</h1>
    <p>
<?php 
     	$id=$_POST['codigo'];
	$name=$_POST['nombre'];

	include("../web-app/conexion.php");
	$link=Conectar();
	if ($id=="" || $name=="")
	{
	echo "<script language='JavaScript'> 
         alert('Por Favor Insertar Datos');
         window.location='Modificar.php';
         </script>";
	}
	else 
	{
		$result1 = $link->query("select * from curso where codigo=".$id."");
                $codigo = $result1->fetch_all(MYSQLI_ASSOC);
		if ($codigo==0)
		{
		echo "<script language='JavaScript'> 
                      alert('El Curso No Ha Sido Ingresado');
                      window.location='administarCurso.php';
                      </script>";
    }
		else
		{
		$result = $link->query("UPDATE curso set codigo=".$id.", nombre='".$name."' where codigo=".$id."");
		echo "<script language='JavaScript'> 
         alert('El Curso ".$id." Se Ha Modificado Correctamente');
         window.location='administarCurso.php';
         </script>"; 
		}
	
	}
	
?>

<table class="table table-bordered" border="0" align="center">
<tr>
	<td>
<?php

echo  "Se Ha Modificado El Curso: " .$id;

?>

	</td>
</tr>
<tr>
	<td align="center">
    <input class="btn btn-danger" type="button" value="Cerrar" onclick="window.location='administarCurso.php'">
    </td>
</tr>
</table>
</form>
   	</p>
	</div>
 	 <?php 
        include("../web-app/footer.php");
     ?>

</div>
</body>

</body>
</html>


<SCRIPT LANGUAGE="JavaScript">;
function guardar()
	{
	alert('El Registro Se Ha Modificado Exitosamente');
	window.location='administarCurso.php';
	};
</script>;

</body>
</html>