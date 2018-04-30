<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
 <?php
		 
			include("../web-app/conexion.php");
			@$link=Conectar(); 
			@$consulta_id_usuario=("SELECT Max(id_usuario) FROM usuario ");
			@$resul=query($consulta_id_usuario);
			@$max = mysql_fetch_array($resul);
			echo $sig_id_usuario=$max[0]+1;
			echo $id_rol="6";
			
			
			@$id_usuario=$sig_id_usuario;
			@$Cedula=$_POST["Cedula"];
			@$Cargo=$_POST["Cargo"];
			@$Nombres = $_POST["Nombres"];
			@$Primer_Apellido=$_POST["Primer_Apellido"];
			@$Segundo_Apellido=$_POST["Segundo_Apellido"];
			@$Telefono=$_POST["Telefono"];
			@$Celular=$_POST["Celular"];
			@$Extension=$_POST["Extension"];
			@$Direccion = $_POST["Direccion"];
			@$Area = $_POST["Area"];
			@$Estado=1;
			
	$user=query("select * from usuario where cedula=".$Cedula."",$link);
	$consUlser=mysql_num_rows($user);
	if ($consUlser>0)
	{
	echo "<script language='JavaScript'> 
                    alert('El Usuario Ya Esta Registrado');
					window.location='registrarVisitantes.php'; 
                    </script>" ;
	}
	else
	{
		
			if($id_usuario==NULL || $Cedula==NULL || $Cargo==NULL || $Nombres==NULL || $Primer_Apellido==NULL || $Segundo_Apellido==NULL || $Direccion==NULL || $Area==NULL || $Telefono==NULL)
	   {
		echo "<script language='JavaScript'> 
                    alert('En la insercion falta algun dato. ');
					window.location='registrarVisitantes.php'; 
                    </script>" ;  
	   }
	   else
	   {	echo $id_rol="6";
		   					$insertar=query("INSERT INTO  `aconsy`.`usuario` (
					`id_usuario` ,
					`cedula` ,
					`cargo` ,
					`nombres` ,
					`primer_apellido` ,
					`segundo_apellido` ,
					`telefono` ,
					`celular` ,
					`extension` ,
					`direccion` ,
					`area` ,
					`estado`
					)
					VALUES (".$sig_id_usuario.",".$Cedula.",'".$Cargo."','".$Nombres."','".$Primer_Apellido."','".$Segundo_Apellido."','".$Telefono."','".$Celular."','".$Extension."','".$Direccion."','".$Area."','".$Estado."')",$link);
					@$crea_rol=query("INSERT INTO usuario_rol (id_usuario,id_rol) 
					VALUES (".$sig_id_usuario.",".$id_rol.")",$link);
	   }
	 }
  
   if($insertar==0)
   {
	   
				echo  "<script language='JavaScript'> 
                    alert('insercion incorrecta');
					window.location='registrarVisitantes.php'; 
                    </script>";
	}
			
	else if ($insertar==1){
				
				echo "<script language='JavaScript'> 
                    alert('insercion correcta');
					window.location='registrarVisitantes.php'; 
                    </script>";
			}
					

?>

<body>
</body>
</html>