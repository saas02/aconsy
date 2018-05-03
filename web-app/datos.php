<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="../web-app/default.css" rel="stylesheet" type="text/css" />
   <link href="/ACONSY/web-app/img/huella.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
</head>
<body>

  	<?php 
	include("header.php");
	include("sidebar.php"); 
	?>
    
    
<h1>Modificar Datos</h1>
<p>
<table align="center" border="0">
        <tr>
        	<td>
        	<fieldset width="200" height="50">
            <div class="alert alert-danger">  
<fieldset  width="10" height="10"> 
<form name="formul" action="modifyDatos.php" method="post">
	<?php 
	@session_start();
        $cedula=$_SESSION['cedula'];
        include("conexion.php");
	$link=Conectar();	
	$datos = query("SELECT id_usuario,contrasena,nombres,primer_apellido,segundo_apellido,telefono,celular,extension,direccion FROM usuario where cedula=".$cedula."", $link);
	$datosUsuario=mysql_fetch_array($datos);
	$id=$datosUsuario[0];	
	$contrasena=$datosUsuario[1];
	$cedula;
	$nombre=$datosUsuario[2];
	$primer_apellido=$datosUsuario[3];
	$segundo_apellido=$datosUsuario[4];
	$telefono=$datosUsuario[5];
	$celular=$datosUsuario[6];
	$extension=$datosUsuario[7];
	$direccion=$datosUsuario[8];
?>
<table border="0" align="left">
	<tr>
		<th colspan="2" align="center">Usuario</th>
	</tr>
	<tr>
		<td>Nombre</td>
		<td><input type="text" name="nombre" value="<?php echo $nombre?>"></td>
	</tr>
	<tr>
		<td>Primer Apellido</td>
		<td><input type="text" name="primerApellido" value="<?php echo $primer_apellido?>"></td>
	</tr>
	<tr>
		<td>Segundo Apellido</td>
		<td><input type="text" name="segundoApellido" value="<?php echo $segundo_apellido?>"></td>
	</tr>
	<tr>
		<td>Telefono</td>
		<td><input type="text" name="telefono" value="<?php echo $telefono?>"></td>
	</tr>
	<tr>
		<td>Celular</td>
		<td><input type="text" name="celular" value="<?php echo $celular?>"></td>
	</tr>
	<tr>
		<td>Extension</td>
		<td><input type="text" name="extension" value="<?php echo $extension?>"></td>
	</tr>
	<tr>
		<td>Direccion</td>
		<td><input type="text" name="direccion" value="<?php echo $direccion?>"></td>
	</tr>
	<tr>
		<td colspan="2" align="center">
		<input type="submit" class="btn btn-danger" value="Modificar">
		<input type="button" class="btn btn-danger" value="Cambiar Contrasena" onclick="window.location='contrasena.php'">
		<input type="button" class="btn btn-danger" value="Atras" onclick="window.location='/Aconsy/index.php'">
		<?php 
		$rol = query("SELECT rol.id_rol FROM rol,usuario_rol,usuario WHERE rol.id_rol=usuario_rol.id_rol AND usuario_rol.id_usuario=usuario.id_usuario and usuario.cedula=".$cedula."", $link);
		$usuario_rol=mysql_fetch_array($rol);
		$idRol=$usuario_rol[0];	
		if ($idRol=="1")
		{
		echo "<input type='submit' class='btn btn-danger' value='Resetear Contrasena' onclick=this.form.action='resetear.php'>";
		}
		else
		{}
		?>
		</td>
	</tr>
</table>
</form>
 </td></tr></div></table>
</p>
	<?php 
        include("../web-app/footer.php");
	?>
</body>
</html>

