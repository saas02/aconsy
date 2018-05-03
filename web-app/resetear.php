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
	?>
    
    
<h1>Resetar usuario</h1>
<p>
<table align="center" border="0">
        <tr>
        	<td>
        	<fieldset width="200" height="50">
            <div class="alert alert-danger">  
<fieldset  width="10" height="10"> 
<form name="formul" action="reset.php" method="post">
	
<table border="0" align="left">
	<tr>
		<td>Documento</td>
		<td><input type="text" name="cedula" value=""></td>
	</tr>
	<tr>
		<td colspan="2" align="center">
		<input type="submit" class="btn btn-danger" value="Resetear">
		<input type="button" class="btn btn-danger" value="Atras" onclick=window.location="datos.php">
		</td>
	</tr>
</table>
</form>
 </td></tr></div></table>
</p>
	<?php 
        include("../web-app/footer.php");
	?>
</body>
</html>