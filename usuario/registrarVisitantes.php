<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="../web-app/default.css" rel="stylesheet" type="text/css" />
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
    
    
  
    
    <h1>
	<?php 
	 
	   if (isset($_SESSION['rol'])){
		 if($_SESSION['rol']==1 || $_SESSION['rol']==4)
	 echo "Ingreso de Usuarios";
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
		
   	</p>
	
 <table align="center" border="0">
        <tr>
        	<td>
        	<fieldset width="200" height="50">
            <div class="alert alert-danger">   
		<form action="php_registrarvisitantes.php" method="Post">
      	<table width="400" height="200" align="center">
        	<tr><th>
        	<fieldset width="400" >
            <legend>Datos del Visitante</legend>
            <table width="400" height="200" align="center">
        	
            	<tr>
                    <td align="left">Número de Cedula :</td>
                    <td > <input name="Cedula" type="text" onkeypress="return letra(event)"/></td></tr>
                <tr>
                    <td align="left">Nombres :</td>
                    <td><input name="Nombres" type="text" onkeypress="return numero(event)"/></td></tr>
                <tr>
                    <td align="left">Primer Apellido :</td>
                    <td><input name="Primer_Apellido" type="text" onkeypress="return numero(event)"/></td></tr>
                <tr>
                    <td align="left">Segundo Apellido :</td>
                    <td><input name="Segundo_Apellido" type="text" onkeypress="return numero(event)"/><br /></td></tr>
                <tr>
                	<td align="left">Telefono :</td> 
                    <td><input name="Telefono" type="text" onkeypress="return letra(event)"/><br /></td></tr>
                <tr>
                	<td align="left">Celular :</td> 
                    <td><input name="Celular" type="text" onkeypress="return letra(event)" /><br /></td></tr>
                <tr>
                	<td align="left">Extension :</td> 
                    <td><input name="Extension" type="text" onkeypress="return letra(event)"/><br /></td></tr>
                <tr>
                    <td align="left">Dirección :</td> 
                    <td><input name="Direccion" type="text" /><br /></td></tr>
                <tr>
                    <td align="left">Área :</td>
                    <td><input name="Area" type="text"onkeypress="return numero(event)"/><br /></td></tr>
                <tr>
                    <td align="left">Cargo :</td> 
                    <td><input name="Cargo" type="text" onkeypress="return numero(event)"/><br/></td></tr>
              <tr>
              <td colspan="2" align="center"><input name="insertar" class="btn btn-danger btn-large" type="submit" value="Crear Visitante" /> </td>
              </tr>            
             </table> 
             </fieldset>  
             
             </th>
           </tr>
        </table>
                 </form>
</td></tr></div></table>	
        
        
	 	
	
	<?php
	  
        include("../web-app/footer.php");
     ?>

</body>
</html>