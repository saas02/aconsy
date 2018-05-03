<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="../web-app/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
<body>
<form name="formul" action="delete.php" method="post">
  	<?php 
	include("../web-app/header.php");
	include("../web-app/sidebar.php"); 
	?>
    
    
  	<h1>Eliminar Curso</h1>
    <p>
<?php 
$id=$_POST['curse'];
include("../web-app/conexion.php");
$link=Conectar();
echo "<script language='JavaScript'> 
                alert('Se Elimino La Ficha: ".$id."'); 
                window.location='administarCurso.php';
                </script>"; 
$delete= $link->query ("DELETE from curso where codigo=".$id."");
?>

<table border="0" align="center"class="table table-condensed">
<tr>
	<td>
<?php

echo  "Se Ha Eliminado El Curso: " .$id;

?>

	</td>
</tr>
<tr>
	<td align="center">
    <input class="btn btn-danger"  type="button" value="Cerrar" onclick="window.location='administarCurso.php'">
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


</body>
</html>