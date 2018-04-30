<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="../web-app/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="container">

	<?php 
    include("../web-app/header.php");
    include("../web-app/sidebar.php"); 
	
	
    ?>
    <div class="content">
    <h2>
	<?php 

             if (isset($_SESSION['rol'])){
                 if($_SESSION['rol']!=6){
					 echo "Mi Cuenta";
					 }else{
             		echo 
					 "<script language='JavaScript'> 
				 	 alert('Usuario No Autorizado'); 
					 window.location='../index.php';
				 	 </script>"; 
					}
                 }else{
                       echo 
						 "<script language='JavaScript'> 
						 alert('Debe Iniciar Sesion'); 
						 window.location='../index.php';
						 </script>"; 
                         
                         }
     ?></h2>
    
    <p><?php
			
			
	
		$Cedula=$_POST["Cedula"];
		echo"$Cedula<br>";
	
		include("..\web-app\conexion.php");
		$link=Conectar();   
		
			$consulta= query("SELECT estado FROM usuario WHERE cedula ='".$_POST["Cedula"]."'");
			$arregloconsulta= mysql_fetch_array($consulta);
			echo "consulta estado ".$arregloconsulta[0]."<br>"; 
			
			if($arregloconsulta[0]==0)
				{
					echo "<script language='JavaScript'> 
                    alert('El usuario selecionado esta inactivo'); 
					window.location='../index.php';
                    </script>";	
				}
				else if ($arregloconsulta[0]==1)
				{
					@$consulta1=("SELECT id_usuario,contrasena,cedula,cargo,nombres,primer_apellido,segundo_apellido,telefono,celular,extension,direccion,area,estado FROM usuario where 							cedula='".$_POST["Cedula"]."' ");
	$resul=query($consulta1);	
			$registro3=mysql_fetch_array($resul);
			$User_exist = mysql_num_rows($resul);
			
					if ($User_exist>0)
					{
						
						echo "<script language='JavaScript'> 
							  </script>";
					}
					else
					{
						echo "<script language='JavaScript'> 
							alert('La cedula del usuario es incorrecta'); 
							window.location='../index.php';
							</script>";
					}
			
			}
			
    	?>
        
        <table width="400" height="200">
        <tr><th>
        <fieldset width="200" >
            <legend align="left">Datos del Usuario</legend>
        	<table align="left" border="0" width="390">
            	
                <form name="Actualizar" action="administarUsuario_actualiza.php" method="post">
                <tr>
                <td align="left">Codigo de Usuario :</td>
                    <td><input name="id_usuario" type="text" value="<?php echo $registro3[0];?>" /></td>   
                </tr>
                <tr>
                <td align="left">Contraseña :</td>
                    <td><input name="Contrasena" type="password" readonly value="<?php echo $registro3[1];?>" /></td>   
                </tr>     
                <tr>
                    <td align="left">Número de Cedula :</td>
                    <td > <input name="Cedula" type="text" value="<?php echo $registro3[2];?>" /></td></tr>
                <tr>
                    <td align="left">Cargo :</td> 
                    <td><input name="Cargo" type="text" value="<?php echo $registro3[3];	 ?>" /><br /></td></tr>
                <tr>
                    <td align="left">Nombres :</td>
                    <td><input name="Nombres" type="text" value ="<?php echo $registro3[4]; ?>"/></td></tr>
                <tr>
                    <td align="left">Primer Apellido :</td>
                    <td><input name="Primer_Apellido" type="text" value="<?php echo $registro3[5];?>" /></td></tr>
                <tr>
                    <td align="left">Segundo Apellido :</td>
                    <td><input name="Segundo_Apellido" type="text" value="<?php echo $registro3[6];?>"/><br /></td></tr>
                <tr>
                 	<td align="left">Telefono :</td> 
                    <td><input name="Telefono" type="text" value="<?php echo $registro3[7];?>"/><br /></td></tr>
                <tr>
                 	<td align="left">Celular :</td> 
                    <td><input name="Celular" type="text" value="<?php echo $registro3[8];?>"/><br /></td></tr>
                <tr>
                 <td align="left">Extension :</td> 
                    <td><input name="Extension" type="text" value="<?php echo $registro3[9];?>"/><br /></td></tr>
                <tr>
                    <td align="left">Dirección :</td> 
                    <td><input name="Direccion" type="text" value="<?php echo $registro3[10];?>"/><br /></td></tr>
                <tr>
                    <td align="left">Área :</td>
                    <td><input name="Area" type="text"value="<?php echo $registro3[11];?>" /><br /></td></tr>
                    <td align="left">Estado :</td> 
                    <td><input name="Estado" type="text" value="<?php echo $registro3[12];?>"/><br /></td>
                </tr>
                
                <tr>
                </tr>
                <tr>
                	 <td colspan="2" align="center"><input name="Actualiza"  type="submit" value="Actualizar usuario" /></td>                   
                </tr>
                </form>
              </table>               
             </fieldset>  
             
             </th>
           </tr>
        </table>
         
        </form>     
    
    </p>
	</div>
 
	 <?php 
        include("../web-app/footer.php");
     ?>
     
</div>
</body>
</html>

