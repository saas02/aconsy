<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="../web-app/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="container">

	<?php 
    include("\..\web-app/header.php");
    include("\..\web-app/sidebar.php"); 

    ?>
    
    
    
    
    <div class="content">
    
	<h1><?php 
             if (isset($_SESSION['rol'])){
                 if($_SESSION['rol']==1 || $_SESSION['rol']==4)
             echo "<div class='alert alert-success'><h2> Elemento Registrado </h2> </div>";
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
	
	$Marca = $_POST["Marca"];
 	$Serial = $_POST["Serial"];
	$CC = $_POST["CC"];
	$Descripcion = $_POST["Descripcion"];
	$Tipo = $_POST["Tipo"];
	
	include("\..\web-app/conexion.php");
	$link=Conectar();   
	$resIDusuario=query("select id_usuario from usuario where cedula = ".$CC." ;", $link);
	$Id_usuario = mysql_fetch_array($resIDusuario);
	
	$maxElement = query("select MAX(id_elemento) from elemento", $link);
	$Id_elemento = mysql_fetch_array($maxElement);
	$Id_elemento[0] =$Id_elemento[0]+1;
 

$resul=query("INSERT INTO elemento (id_elemento, marca, serial, descripcion, tipo, codigo_barras) VALUES (".$Id_elemento[0].", '".$Marca."', '".$Serial."', '".$Descripcion."', '".$Tipo."', '".$codigo = substr(md5($Id_elemento[0].$Serial.$Id_usuario[0]), -10)."');", $link);

	if($resul != false)
		$resul1=query("INSERT INTO usuario_elemento (id_usuario, id_elemento) VALUES (".$Id_usuario[0].",".$Id_elemento[0].")", $link);

	if($resul != false and $resul1 != false ){
			echo "<script language='JavaScript'> 
				 alert('Datos Ingresados'); 
				 window.location='registrarElementos.php';
				 </script>";}
	else{
			echo	"<script language='JavaScript'> 
				 alert('Error en la insercion de datos'); 
				 window.location='registrarElementos.php';
				 </script>";}
		
		
    ?>
        

 	</p>
	</div>
 
	 <?php 
        include("../web-app/footer.php");
     ?>
     
</div>
</body>
</html>
