<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="..\web-app\default.css" rel="stylesheet" type="text/css" />
</head>

<body>

  	<?php 
	include("\..\web-app\header.php");
	include("\..\web-app\sidebar.php"); 
	if (isset($_SESSION['rol'])){
		if($_SESSION['rol']==1)
			echo "<h1></h1>";
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
  	<div class="content">
    <h1>Administrar Jornadas</h1>
    <p>
		<?php
			include("\..\web-app\conexion.php");
			$link=Conectar();   
        ?>
       
	
   	</p>
	</div>
    <?php
	if(isset($_POST['Tipo_jornada'])){
			$Sql1="select id_jornada, nombre, hora_entrada, hora_salida from jornada where nombre = '".$_POST['Tipo_jornada']."'";
			$reultmax_id_vehiculo=query($Sql1,$link); 
			$datos_max_id_vehiculo=mysql_fetch_array($reultmax_id_vehiculo);
			$idjornada=$datos_max_id_vehiculo[0];
			$nombre=$datos_max_id_vehiculo[1];
			$hentrada=$datos_max_id_vehiculo[2];
			$hsalida=$datos_max_id_vehiculo[3];
		}
	if(isset($_POST['id_jornada'])){
			$idjornada=$_POST['id_jornada'];
			$nombre=$_POST['nombre'];
			$hentrada=$_POST['h_entrada1'].":".$_POST['h_entrada2'];
			$hsalida=$_POST['h_salida1'].":".$_POST['h_salida2'];
		$Sql = query("UPDATE jornada set nombre='".$nombre."', hora_entrada='".$hentrada."', hora_salida='".$hsalida."' where id_jornada='".$idjornada."'");
		query($Sql,$link);
		
		echo 
		  "<script language='JavaScript'> 
		  alert('Edicion con Exito'); 
		  </script>";
		$Sql1="select id_jornada, nombre, hora_entrada, hora_salida from jornada where id_jornada = '".$_POST['id_jornada']."'";
			$reultmax_id_vehiculo=query($Sql1,$link); 
			$datos_max_id_vehiculo=mysql_fetch_array($reultmax_id_vehiculo);
			$idjornada=$datos_max_id_vehiculo[0];
			$nombre=$datos_max_id_vehiculo[1];
			$hentrada=$datos_max_id_vehiculo[2];
			$hsalida=$datos_max_id_vehiculo[3];			
		}
		if(isset($_POST['id_jornadaVer'])){
			$idjornada=$_POST['id_jornadaVer'];
			$nombre=$_POST['nombre'];
			$hentrada=$_POST['h_entrada1'].":".$_POST['h_entrada2'];
			$hsalida=$_POST['h_salida1'].":".$_POST['h_salida2'];
			$Sql="insert into jornada (id_jornada,nombre,hora_entrada,hora_salida)  values ('".$idjornada."','".$nombre."','".$hentrada."','".$hsalida."')";
			query($Sql,$link);
		echo 
		  "<script language='JavaScript'> 
		  alert('creado'); 
		  </script>";	
		}

		
 ?>

 <form name='jornada' action="administrarJornadaEditar.php" method="post">
    <table align="center" border="0">
        	<tr>
        	<td>
            	<fieldset>
                <div class='alert alert-danger'>
                	<legend align="center">Datos Jornada</legend>
                    <table align="center" border="0">
                        <tr>
                            <td>
								Id Jornada
                            </td>
                            <td>
                                <input onFocus="blur()" type="text" name="id_garaje"  value="<?php echo $idjornada ?>" />
                            </td>
						</tr>
						<tr>
                            <td>
								Nombre
                            </td>
                            <td>
                                <input onFocus="blur()" type="text" name="Tipo_jornada"  value="<?php echo $nombre ?>" />
                            </td>
						</tr>
                            <td>
								Hora Entrada
                            </td>
                            <td>
                                <input onFocus="blur()" type="text" name="id_garaje"  value="<?php echo $hentrada ?>" />
                            </td>
						</tr>
						<tr>
                            <td>
								Hora Salida
                            </td>
                            <td>
                                <input onFocus="blur()" type="text" name="id_garaje"  value="<?php echo $hsalida ?>" />
                            </td>
						</tr>
						<tr>
                            <td align="center">
                            <input class='btn btn-danger' type="button" value="Volver" onclick="window.location='administrarJornada.php'" />
                            </td>
                            <td align="center">
                            <input class='btn btn-danger' type="submit" value="Editar"  />
                            </td>
                        </tr>
                    </table>
                    </div>
                </fieldset>
            </td>            
        </tr>
    </table>

 </form>
 
 
	 <?php 
         include("\..\web-app/footer.php");
     ?>
     
</body>
</html>
