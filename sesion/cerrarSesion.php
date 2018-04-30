<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="../web-app/default.css" rel="stylesheet">
</head>

<body>

  	<?php 
	include("../web-app/header.php");
	include("../web-app/sidebar.php"); 
	?>
    
    
  	<div class="content">
    
    <p>
    <fieldset>
    <legend><h3>Cerrando Sesi&oacute;n</h3></legend>
    
    
  	<br /><br />
    
    <p align="center"><img src="../web-app/img/aconsy.png" align="middle"/></p>
    <br /><br />
        
    </fieldset>
    </p>  
	</div>
   
    <?php
    	include("../web-app/footer.php");
		session_unset();
		
			echo 
			"<script language='JavaScript'> 
			alert('Sesión cerrada satisfactoriamente'); 
			window.location='/ACONSY/index.php';
			</script>";

    ?>	
</body>
</html>

