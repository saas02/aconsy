||1																																																																										<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="..\web-app\default.css" rel="stylesheet" type="text/css" />
</head>

<body>
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
			$Sql1="select max(id_garaje) from garaje where lugar_garaje='motos'";
			$reultmax_id_garaje=query($Sql1,$link); 
			$datos_max_id_garaje=mysql_fetch_array($reultmax_id_garaje);
			$max_id_garaje=($datos_max_id_garaje[0])+1;
        ?>   
        
<form name="asigGaraje" action="garajesCrearInsertMoto.php" method="post">
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
            	<input type="text" name="id_garaje" value="<?php echo $max_id_garaje ?>" onFocus='blur()' />
            </td>
        </tr>
    	<tr>
        	<td>
            	Lugar Garaje
            </td>
        	<td>
				<input type="text" name="lugar_garaje" value="motos"  onFocus='blur()' />
            </td>
        </tr>
    	<tr>
        	<td>
            	Numero Garaje
            </td>
        	<td>
            	<input type="text" name="numero_garaje" value="" onkeypress="return letra(event)" />
            </td>
        </tr>
        <tr>
        	<td align="center">
            	<input class="btn btn-danger" type="submit" value="Crear" />
            </td>
        	<td align="center">
            	<input class="btn btn-danger" type="button" value="Cancelar" onclick="window.location='asignarGaraje.php'" />
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

