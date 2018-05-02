
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="..\web-app\default.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<?php 
	include("../web-app/header.php");
	include("../web-app/sidebar.php"); 
	?>
    <?php
	include("../web-app/conexion.php");
		@$link=Conectar(); 
	?>
    
    
      <h1><?php 
       
       if($_SESSION['rol']==1)
               echo "Administracion de usuarios";
       else
               echo 
                       "<script language='JavaScript'> 
                       alert('Usuario No Autorizado'); 
                       window.location='index.php';
                       </script>"; 
					  
       ?>
      
       </h1>
       

        
         <?php
		
		
		@$consulta_id_usuario=("SELECT Max(id_usuario) FROM usuario ");
		@$resul=query($consulta_id_usuario);
		@$max = mysql_fetch_array($resul);
		@$sig_id_usuario=$max[0]+1;
		@$id_rol=$_POST["id_rol[]"];
					
		@$id_usuario=$_POST["id_usuario"];
		@$Contrasena=$_POST["Cedula"];
		@$Contrasena=md5(@$Contrasena);
		@$Cedula=$_POST["Cedula"];
		@$Cargo=$_POST["Cargo"];
		@$Nombres = $_POST["Nombres"];
		@$Primer_Apellido=$_POST["Primer_Apellido"];
		@$Segundo_Apellido=$_POST["Segundo_Apellido"];
		@$Celular=$_POST["Celular"];
		@@$Telefono=$_POST["Telefono"];
		@$Extension=$_POST["Extension"];
		@$Direccion = $_POST["Direccion"];
		@$Jornada = $_POST["Jornada"];
		@$Area = $_POST["Area"];
		@$Estado=1;
			
	if (isset($_POST["id_rol"]))
		 { 
		 foreach ($_POST["id_rol"] as $id_rol) 
		 {  
	   
								   	
		@$consulta= query("SELECT cedula FROM usuario WHERE cedula ='".$_POST["Cedula"]."'");
		@$arregloconsulta= mysql_fetch_array($consulta);
		echo $arregloconsulta[0];
		
		
		
				 
				 
			if ($Cedula == NULL)
			{
				echo "<script language='JavaScript'> 
				alert('Verifique que una de las casillas de ROL este selecionada y los datos esten completos'); 
				window.location='administarUsuario_crea.php';
				</script>";
				
			}
			
			if ($Cedula!=$arregloconsulta[0])
			 { 
					$insertar=query("INSERT INTO  `aconsy`.`usuario` (
					`id_usuario` ,
					`contrasena` ,
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
					VALUES (".$sig_id_usuario.",'".$Contrasena."',".$Cedula.",'".$Cargo."','".$Nombres."',
					'".$Primer_Apellido."','".$Segundo_Apellido."','".$Telefono."','".$Celular."',
					'".$Extension."','".$Direccion."','".$Area."','".$Estado."')",$link);	
					
					
					foreach ($_POST["id_rol"] as $id_rol) 
					 {  
					    $crea_rol=query("INSERT INTO usuario_rol (id_usuario,id_rol) 
						VALUES (".$sig_id_usuario.",".$id_rol.")",$link);;
					 }


	
		
		$insertarjornada=query("INSERT INTO  `aconsy`.`jornada_usuario` (`id_usuario`,`id_jornada`)
					VALUES (".$sig_id_usuario.",".$Jornada.")",$link);	
		
		
		if($insertar == NULL ){
				echo  "<script language='JavaScript'> 
                    alert('Verifique que una de las casillas este selecionada y los datos esten completos.'); 
					window.location='administarUsuario_crea.php';
                    </script>";
			}else{
				echo "<script language='JavaScript'> 
                    alert('insercion correcta');
					window.location='administarUsuario_crea.php'; 
                    </script>";
			}
		}
		else if ($Cedula==$arregloconsulta[0])
				{
					echo "<script language='JavaScript'> 
							alert('el usuario ya existe. ');
							window.location='administarUsuario_crea.php';
							</script>"; $Cedula;
				}
				
			 
							 } 
				 }
else
 {
echo "<script language='JavaScript'> 
    alert('insercion incorrecta hace falta elejir un rol de usuario');
	window.location='administarUsuario_crea.php'; 
    </script>";
 }		
	
	?>
     
	
	 <?php 
        include("../web-app/footer.php");
     ?>
     

</body>
</html>