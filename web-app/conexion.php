<html>
<head>
   <title>Conexion</title>
   <link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php

define('DB_HOST','localhost'); 
define('DB_USER','root'); 
define('DB_PASS',''); 
define('DB_NAME','aconsy'); 
define('DB_CHARSET','utf-8'); 

function Conectar(){

   $link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); 

   /*if (!($link=mysql_connect("localhost","root",""))){
      echo "Error de conexi&oacuten a la base de datos";
      exit();
   }
   if (!mysql_select_db("aconsy",$link)){
      echo "Error al seleccionar la base de datos.";
      exit();
   }
   	$link=mysql_connect("localhost","root","");
	mysql_select_db("aconsy",$link);
   	return $link;*/
   return $link;
   
}

Conectar();
?>
</body>
</html>
