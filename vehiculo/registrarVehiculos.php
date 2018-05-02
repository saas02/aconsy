<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="..\web-app\default.css" rel="stylesheet" type="text/css" />
</head>

<body onload = "document.asigGaraje.cc_usuario.focus() ">

  	<?php 
	include("../web-app/header.php");
	include("../web-app/sidebar.php"); 
	?>

  	
    <h1>
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

       if (isset($_SESSION['rol'])){
		   if($_SESSION['rol']==1)
               echo "<h2>Registrar Vehiculos</h2>";
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
       ?>
    </h1>
    <p>
		<?php
			include("../web-app/conexion.php");
			$link=Conectar();   
				?>

<form name="asigGaraje" action="registrarVehiculosInsert.php" method="post">
	<table  align="center" border="0"> 
	 <tr>
        <td>
        	<fieldset width="200" height="50">
            <div class="alert alert-danger">
           <legend>Registrar Vehiculos:</legend>
            <table>
               <tr>
					<td>N° Documento</td>
            <td><input type="text" name="cc_usuario" value="" onkeypress="return letra(event)" /></td>
        </tr>   
			<tr>
				<td ><div align="center"> <input class="btn btn-danger" type="submit" value="Buscar Usuario" /></div></td>
			</tr>
			</table>
			</div>
                </fieldset>
            </td>
        </tr>	
	</table>
</form>
   	</p>
	
	 <?php 
        include("../web-app/footer.php");
     ?>
     

</body>
</html>

