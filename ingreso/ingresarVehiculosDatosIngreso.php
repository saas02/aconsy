<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="../web-app/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
  	<?php 
	include("../web-app/header.php");
	include("../web-app/sidebar.php"); 
	?>
    
    
  	<div class="content">
    
    <h1>
	<?php 
	   if (isset($_SESSION['rol'])){
		 if($_SESSION['rol']==1)
	 echo "<h2>Ingreso de Vehiculos</h2>";
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
    <script>
		alert ('Ingreso Realizado con exito');
	</script>
		<?php
			include("../web-app/conexion.php");
			$link=Conectar();  
			$id_usu=$_SESSION['id_usuario'];
			$fecha=$_SESSION['fecha'];
			$Sql="select id_usuario, cedula from usuario where id_usuario = ".$id_usu." ";
			$result=query($Sql,$link); 
			$dateid_usu=mysql_fetch_array($result);
			$id_usu=$dateid_usu[0];
			$cedula=$dateid_usu[1]; 
			$x=mysql_num_rows($result);
$Sql="select v.id_vehiculo, placa, marca, color, tipo from vehiculo as v inner join usuario_vehiculo as uv on v.id_vehiculo=uv.id_vehiculo where ".$id_usu." = uv.id_usuario";
			$reultid_vehi=query($Sql,$link); 
			$datosid_vehi=mysql_fetch_array($reultid_vehi);
			$id_vehi=$datosid_vehi[0];
 			$placa=$datosid_vehi[1];
			$marca=$datosid_vehi[2];
			$color=$datosid_vehi[3];
			$tipo=$datosid_vehi[4];
			$Sql="select g.id_garaje,lugar_garaje,numero_garaje from garaje as g inner join usuario_vehiculo as uv on uv.id_garaje=g.id_garaje where id_usuario='".$id_usu."'";
			$reultgaraje=query($Sql,$link); 
			$datosgaraje=mysql_fetch_array($reultgaraje);
			$id_garaje=$datosgaraje[0];
			$lugar_garaje=$datosgaraje[1];
			$numero_garaje=$datosgaraje[2];
			$Sql="select j.id_jornada, Nombre, Hora_entrada, Hora_salida from jornada as j inner join usuario_vehiculo as uv on uv.id_jornada=j.id_jornada where id_usuario='".$id_usu."' ";
			$resultjornada=query($Sql,$link); 
			$datosjornada=mysql_fetch_array($resultjornada);
			$id_jornada=$datosjornada[0];
			$nombre_jornada=$datosjornada[1];
			$hora_entrada=$datosjornada[2];
			$hora_salida=$datosjornada[3];
			$Sql1="select max(id_ingreso) from ingreso";
			$reultmax_id_ingreso=query($Sql1,$link); 
			$datos_max_id_ingreso=mysql_fetch_array($reultmax_id_ingreso);
			$max_id_ingreso=($datos_max_id_ingreso[0])+1;
			$Sql="insert into ingreso (id_ingreso,fecha_entrada)  values ('".$max_id_ingreso."','".$fecha."')";
			query($Sql,$link);
			$Sql="insert into ingreso_vehiculo (id_ingreso,id_vehiculo,id_usuario)  values ('".$max_id_ingreso."','".$id_vehi."','".$id_usu."')";
				query($Sql,$link);
		//	$Sql="select hora_entrada, hora_salida from ingreso_vehiculo as iv inner join ingreso as i on i.id_ingreso=iv.id_ingreso where id_usuario = ".$id_usu." and iv.id_ingreso=".$max_id_ingreso." ";
		//	$resulthorario=query($Sql,$link); 
		//	$datoshorario=mysql_fetch_array($resulthorario);
		//	$horarioentrada=$datoshorario[0];
			
				?>

        
<form name="asigGaraje" action="" method="post">
	<table align="center">
    	<tr>
        	<td>
				<div class='alert alert-danger'>
                    <table align="center" border="0">
                        <tr>
                            <td>N° de Documento</td>
                            <td><input type="text" name="id_usuario" onFocus="blur()" value="<?php echo $cedula; ?>" /></td>
                        </tr>   
                        <tr>
                            <td colspan="2"> 
                                <fieldset width="200" height="50">
                                    <legend>Usuario</legend>
                                    <table align="center" border="0">
                                        <tr>
                                            <td align="center"><input class='btn btn-danger' type="button" value="Buscar Otro Usuario" onclick="window.location='ingresarVehiculos.php'" /></td>
                                        </tr>
                                    </table>
                                </fieldset>
                            </td>
                        </tr>
                    </table>
				</div>
    		</td>
		</tr>
    </table>
    <table align="center">
    	<tr>
        	<td>
                <div class='alert alert-danger'>
                    <table align='center' border='0'>
                        <tr>
                            <td colspan='2'>
                                <fieldset width='200' height='50'>
                                    <legend>Datos del Vehiculo Autorizado</legend>
                                    <table align='center' border='0'>
                                        <tr>
                                            <td>ID Vehiculo</td>
                                            <td><input type='text' name='id_vehiculo' onFocus="blur()" value="<?php echo $id_vehi ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td>Tipo de Vehiculo</td>
                                            <td><input type='text' name='tipo_vehiculo' onFocus="blur()" value="<?php echo $tipo ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td>Placa</td>
                                            <td><input type='text' name='placa' onFocus="blur()" onFocus="blur()" value="<?php echo $placa ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td>Marca</td>
                                            <td><input type='text' name='marca' onFocus="blur()" value="<?php echo $marca ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td>Color</td>
                                            <td><input type='text' name='color' onFocus="blur()" value="<?php echo $color ?>" /></td>
                                        </tr>
                                    </table>
                                </fieldset>
                            </td> 
                        </tr>
                        <tr>
                            <td colspan="2">
                                <fieldset width='200' height='50'>
                                    <legend>Registro ingreso y salida</legend>
                                    <table align='center' border='0'>
                                        <tr>
                                            <td>Hora Ingreso</td>
                                            <td><input type='text' name='h_ingreso' onFocus="blur()" value="<?php echo $fecha ?>" /></td>
                                        </tr>
                                    </table>
                                </fieldset>            	
                            </td>
                        </tr>
                    </table>
                </div>
			</td>
            <td>
                <div class='alert alert-danger'>
                    <table>
                        <tr>
                            <td colspan='2'>
                                <fieldset width='200' height='50'>
                                    <legend>Datos del Garaje</legend>
                                    <table align='center' border='0'>
                                        <tr>
                                            <td>ID Garaje</td>
                                            <td><input type='text' name='id_garaje' onFocus="blur()" value="<?php echo $id_garaje ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td>Lugar Garaje</td>
                                            <td><input type='text' name='lugar_garaje' onFocus="blur()" value="<?php echo $lugar_garaje ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td>Numero Garaje</td>
                                            <td><input type='text' name='numero_garaje' onFocus="blur()" value="<?php echo $numero_garaje ?>" /></td>
                                        </tr>
                                    </table>
                                </fieldset>
                                <fieldset width='200' height='50'>
                                    <legend>Jornada Autorizada</legend>
                                    <table align='center' border='0'>
                                        <tr>
                                            <td>ID Jornada</td>
                                            <td><input type='text' name='id_jornada' onFocus="blur()" value="<?php echo $id_jornada ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td>Nombre Jornada</td>
                                            <td><input type='text' name='nombre_jornada' onFocus="blur()" value="<?php echo $nombre_jornada ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td>Hora Entrada</td>
                                            <td><input type='text' name='hora_entrada' onFocus="blur()" value="<?php echo $hora_entrada ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td>Hora Salida</td>
                                            <td><input type='text' name='hora_salida' onFocus="blur()" value="<?php echo $hora_salida ?>" /></td>
                                        </tr>
                                    </table>
                                </fieldset>
                            </td>
                        </tr>
                    </table>
                </div>
			</td>
        </tr>
    </table>
</form>
 
	 <?php 
        include("../web-app/footer.php");
     ?>
</body>
</html>     

