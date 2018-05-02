<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="..\web-app\default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function numero(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
    patron =/[A-Za-z\s]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
} 

function letra(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
    patron =/[0-9]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
} 
</script>
</head>

<body>


<?php 
	include("\..\web-app\header.php");
	include("\..\web-app\sidebar.php"); 
?>

   
    
  	
    <h1>Modificar</h1>
    <p>
<table align="center" border="0">
        <tr>
        	<td>
        	<fieldset width="200" height="50">
            <div class="alert alert-danger">
<form action="modify.php" method="post">
<fieldset  width="10" height="10"> 
	<table border="0" align="center" class="table table-condensed">
<tr>
	<td>
    <legend>Ficha de Caracterizacion</legend>
    </td>
</tr>
<tr>
	<td>
	<select name="miSelect" style="width:450px" align="center">
	<?php
	include("\..\web-app\conexion.php");
	$link=Conectar();   
	$result = $link->query("SELECT * FROM curso");
        $arregloconsulta = $result->fetch_all(MYSQLI_ASSOC);
        foreach ($arregloconsulta as $key => $arreglo){
            echo "<option value=".$arreglo["id_curso"].">".$arreglo["codigo"].' - '.$arreglo["nombre"]."</option>";
        }
//        
//	if ($row = mysql_fetch_array($result)){
//	do 	{
//	echo "<option value=".$row["id_curso"].">".$row["codigo"].' - '.$row["nombre"]."</option>";
//	} while ($row = mysql_fetch_array($result));
//	} else {
//	echo "¡ La base de datos está vacia !";
//	}
	?>
	</select>
	</td>
<tr>
<tr>
	<td align="center">Curso</td>
</tr>
<tr>
	<td><input type="text" name="codigo" size="30" onkeypress="return letra(event)" ></td>
</tr>
<tr>
	<td align="center">Nombre</td>
</tr>
<tr>
	<td><input type="text" name="nombre" size="30" onkeypress="return numero(event)"></td>
</tr>
<tr>
	<td colspan="2" align="center">
    <input class="btn btn-danger" type="submit" value="Modificar"> 
    <input class="btn btn-danger" type="reset" value="Limpiar">
     <input class="btn btn-danger" type="button" value="Atras" onclick="window.location='administarCurso.php'">
    </td>
</table></fieldset>
</form>
	   	  
	
   	</p>
</td></tr></div></table>	   	  
	
 
	 <?php 
        include("\..\web-app/footer.php");
     ?>
   
 
</div>
</body>
</html>
