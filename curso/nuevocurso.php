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
	include("../web-app/header.php");
	include("../web-app/sidebar.php"); 
	
?>


    <h1>Insertar Ficha De Caracterizacion</h1>
    
<table align="center" border="0">
        <tr>
        	<td>
        	<fieldset width="200" height="50">
            <div class="alert alert-danger">
<form action="curse.php" method="post">
<fieldset  width="10" height="10"> 
	<table border="0" align="left">
<tr>
	<td>Ficha Nueva</td>
</tr>
<tr>
	<td><input type="text" name="newUser" size="30" onkeypress="return letra(event)"></td>
</tr>
<tr>
	<td>Nombre</td>
</tr>
<tr>
	<td><input type="text" name="newCurse" size="30"onkeypress="return numero(event)"></td>
</tr>
<tr>
	<td colspan="2" align="center">
    <input class="btn btn-danger" type="submit" value="Guardar"> 
    <input class="btn btn-danger" type="reset" value="Limpiar">
   <input class="btn btn-danger" type="button" value="Atras" onclick="window.location='administarCurso.php'">
    </td>
</table></fieldset>
</form>
</td></tr></div></table>	   	  
	
   	
 
	 <?php 
        include("../web-app/footer.php");
     ?>
   
 
</div>
</body>
</html>
