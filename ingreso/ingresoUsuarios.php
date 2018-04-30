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
    
    <h1>
	<?php 
	   if (isset($_SESSION['rol'])){
		 if($_SESSION['rol']==1 || $_SESSION['rol']==4)
	 echo "<h2>Ingreso de Usuarios</h2>";
			else
	 echo 
		 "<script language='JavaScript'> 
		 alert('Usuario No Autorizado'); 
		 window.location='../index.php';
		 </script>"; 

		 }else{
			   echo 
				 "<script language='JavaScript'> 
				 alert('Debe Iniciar Sesion'); 
				 window.location='../index.php';
				 </script>"; 
				 
				 }
     ?></h1>
    
    <p>
		<?php
			include("../web-app/conexion.php");
			$link=Conectar();   
        ?>
   	</p>

<form action="ingresoUsuarioDatos.php" method="post">
	<table align="center" border="0">
        <tr>
            <td colspan="2"> 
                <fieldset width="200" height="50">
					<div class="alert alert-danger">
                    <legend>Usuario</legend>
                    <table align="center" border="0">
						<tr>
							<td>C.C. Usuario</td>
								<td><input type="text" name="cc_usuario" value="" /></td>
						</tr>   
                        <tr>
                            <td align="center"><input class='btn btn-danger' type="submit" value="Buscar Usuario" /></td>
                        </tr>
                    </table>
					</div>
                </fieldset>
            </td>
        </tr>
	</table>
</form>
 
	 <?php 
        include("../web-app/footer.php");
     ?>
     
</div>
</body>
</html>

