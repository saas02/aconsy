<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="datetimepick/datetimepicker.js"> </script> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="../web-app/default.css" rel="stylesheet" type="text/css" />
</head>

<?php
//header("Content-Type: application/vnd.ms-excel");
//header("Expires: 0");
//header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//header("content-disposition: attachment;filename=Reporte.xls");
?>
<body>


     <?php 
	include("../web-app/header.php");
	include("../web-app/sidebar.php"); 
	@$user=$_POST['user'];
	?>
    
  	
    
    <h1>
	<?php 
	
	   if ($user=='')
		{
		echo	"<script language='JavaScript'> 
				alert('Por Favor Insertar Usuario'); 
				window.location='generarReportes.php';
				</script>"; 
		}
	else
		{
		
		}
				 
				 
     ?></h1>
    
    <p>
<table align="center" border="0">
        <tr>
        	<td>
        	<fieldset width="200" height="50">
            <div class="alert alert-danger">  
<fieldset  width="10" height="10"> 
<form name="calendario" method="POST">
<table>
	<tr>
		<td>Usuario</td>
		<td><textarea name="usuario" rows="1" readonly class="input-medium search-query"><?php echo $user?></textarea></td>
	</tr>
	<tr>
		<td>Desde</td>
		<td><input type="text" name="inicio" id="demo1" size="25" class="input-medium search-query"> <a href="javascript:NewCal('demo1','ddmmyyyy',true,24)"> <img class="img-polaroid" src = "datetimepick/cal.gif "width =" 16 "height =" 16 "border =" 0 "alt =" Elija una fecha " > </ a>
		</td>
		<td>Hasta
		<input type="text" name="fin" id="demo2" size="25" class="input-medium search-query"> <a href="javascript:NewCal('demo2','ddmmyyyy',true,24)"> <img class="img-polaroid" src = "datetimepick/cal.gif "width =" 16 "height =" 16 "border =" 0 "alt =" Elija una fecha "> </ a>
		</td>
	</tr>
	<tr>
		<td colspan="3" align="center">
		<input class=" btn btn-danger" type="submit" value="Reporte" onclick=this.form.action='reporteIngreso.php'>
		<input class=" btn btn-danger" type="button" value="Atras" onclick=window.location='generarReportes.php'>
		</td>
	</tr>
</table>		
   	</p>
</form>
 </td></tr></div></table>
		
 
	 <?php 
        include("../web-app/footer.php");
     ?>
     
</div>
</body>
</html>