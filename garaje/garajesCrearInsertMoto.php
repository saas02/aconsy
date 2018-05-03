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
    <script>
		alert ('Garaje ingresado con exito');
	</script>
		<?php
			include("../web-app/conexion.php");
			$link=Conectar();  
			$id_garaje=$_POST['id_garaje'];
			$lugar_garaje=$_POST['lugar_garaje'];
			$numero_garaje=$_POST['numero_garaje'];
			$Sql="insert into garaje (id_garaje,lugar_garaje,numero_garaje)  values ('".$id_garaje."','".$lugar_garaje."','".$numero_garaje."')";
			query($Sql,$link);

        ?>   
        
<form name="asigGaraje" >
    <table align="center" border="0">
    <tr>
    <td>
    <div class='alert alert-danger'>
	<table align="center" border="0">
    	<tr>
        	<td>
            	Nuevo Id Garaje
            </td>
        	<td>
            	<input type="text" name="id_garaje" value="<?php echo $id_garaje ?>" onFocus='blur()' />
            </td>
        </tr>
    	<tr>
        	<td>
            	Lugar Garaje
            </td>
        	<td>
				<input type="text" name="lugar_garaje" value="<?php echo $lugar_garaje ?>" onFocus='blur()'
            </td>
        </tr>
    	<tr>
        	<td>
            	Numero Garaje
            </td>
        	<td>
            	<input type="text" name="numero_garaje" value="<?php echo $numero_garaje ?>" onFocus='blur()' />
            </td>
        </tr>
        <tr>
        	<td align="center">
            	<input class="btn btn-danger" type="button" value="Registrar nuevo garaje" onclick="window.location='garajesCrearMoto.php'" />
            </td>
        	<td align="center">
            	<input class="btn btn-danger" type="button" value="Inicio Garajes" onclick="window.location='asignarGaraje.php'" />
            </td>
        </tr>
    </table>
        </div>
    </td>
    </tr>
    </table>
</form>
	
   	</p>
	</div>
 
	 <?php 
        include("../web-app/footer.php");
     ?>
     
</body>
</html>

