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
    
    
  	<div class="content">
    <h1><?php 
       if (isset($_SESSION['rol'])){
		   if($_SESSION['rol']==1)
               echo "<h2> Administrar Garajes </h2>";
       		else
               echo 
                       "<script language='JavaScript'> 
                       alert('Usuario No Autorizado'); 
                       window.location='../index.php';
                       </script>"; 
       
		   }else{
			 echo 
				   "<script language='JavaScript'> 
				   alert('Usuario No Autorizado'); 
				   window.location='../index.php';
				   </script>"; 
			   
			   }
       ?></h1>
    <p>
		<?php
			include("../web-app/conexion.php");
			$link=Conectar(); 
		
        ?>   
<table align="center" height="200" width="400">
<tr>

<td>

    <div class="alert alert-error"> 
<fieldset">
<legend align="center">Tipo de Garaje</legend>
<table align="center">
	<tr>
		<td align="center">
		<form action="garajesSiguienteMoto.php" method="post">
			<input type="hidden" name="id_garaje" value="100">
			<input class="btn btn-danger" type="submit" value="Motocicletas" />
		</form>
		</td>
		<td align="center">
		<form action="garajesSiguiente.php" method="post">
			<input type="hidden" name="id_garaje" value="0">
			<input class="btn btn-danger" type="submit" value="Automoviles"  />
		</form>
			
		</td>

	</tr>
</table>
</fieldset>
        </div>

</td>
</tr>

</table>
   	</p>
	</div>
 
	 <?php 
        include("../web-app/footer.php");
     ?>

</body>
</html>