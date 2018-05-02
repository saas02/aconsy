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

  	<div class="content">
    <h1>
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
<?php 
       if (isset($_SESSION['rol'])){
		   if($_SESSION['rol']==1)
               echo "<h2>Registrar Vehiculos</h2>";
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
    </h1>
    <p>
		<?php 
		error_reporting(0);
			include("../web-app/conexion.php");
			$link=Conectar();   
			$cc_usu=$_POST["cc_usuario"];
			$Sql="select cedula from usuario where cedula = ".$cc_usu." ";
			$result=query($Sql,$link); 
			$x=mysql_num_rows($result);
			$Sql1="select id_usuario from usuario where ".$cc_usu." = cedula";
			$reultid_usuBuscar=query($Sql1,$link); 
			$datosid_usuBuscar=mysql_fetch_array($reultid_usuBuscar);
			$id_usuBuscar=$datosid_usuBuscar[0];
			
			if(isset($_POST['nombre'])){
			$idvehiculo=$_POST['Id_vehiculo'];
			
			$Sql="insert into vehiculo (id_vehiculo,placa,marca,color,tipo)  values ('".$idvehiculo."','".$_POST['Placa']."','".$_POST['Marca']."','".$_POST['Color']."','".$_POST['Tipo_vehiculo']."')";
			query($Sql,$link);		
			
			if ($_POST['Tipo_vehiculo']=="Motocicleta"){
				
				$Sql1="SELECT id_garaje FROM garaje WHERE id_garaje BETWEEN  '100' AND  '200' AND id_garaje IN (SELECT id_garaje FROM garaje WHERE numero_garaje =  '".$_POST['nombre']."')";
			$reultid_usuBuscar=query($Sql1,$link); 
			$datosid_usuBuscar=mysql_fetch_array($reultid_usuBuscar);
			$idgaraje=$datosid_usuBuscar[0];
			
			}else{
				$Sql1="SELECT id_garaje FROM garaje WHERE id_garaje BETWEEN  '1' AND  '99' AND id_garaje IN (SELECT id_garaje FROM garaje WHERE numero_garaje =  '".$_POST['nombre']."')";
			$reultid_usuBuscar=query($Sql1,$link); 
			$datosid_usuBuscar=mysql_fetch_array($reultid_usuBuscar);
			$idgaraje=$datosid_usuBuscar[0];
				}

			$Sql1="select id_jornada from jornada_usuario where id_usuario = '".$id_usuBuscar."' ";
			$reultid_usuBuscar=query($Sql1,$link); 
			$datosid_usuBuscar=mysql_fetch_array($reultid_usuBuscar);
			$idjornada=$datosid_usuBuscar[0];

			$Sql="insert into usuario_vehiculo (id_usuario,id_vehiculo,id_garaje,id_jornada)  values ('".$id_usuBuscar."','".$idvehiculo."','".$idgaraje."','".$idjornada."')";
			query($Sql,$link);
		echo 
		  "<script language='JavaScript'> 
		  alert('creado'); 
		  </script>";	
		}
			
			if ($id_usuBuscar<>""){
$Sql="select v.id_vehiculo, placa, marca, color, tipo from vehiculo as v inner join usuario_vehiculo as uv on v.id_vehiculo=uv.id_vehiculo where ".$id_usuBuscar." = uv.id_usuario";
			$resultid_vehi=query($Sql,$link); 
			$datosid_vehi=mysql_fetch_array($resultid_vehi);
			$id_vehi=$datosid_vehi[0];
 			$placa=$datosid_vehi[1];
			$marca=$datosid_vehi[2];
			$color=$datosid_vehi[3];
			$tipo=$datosid_vehi[4];
			
			$Sql="select id_garaje from usuario_vehiculo where id_usuario = ".$id_usuBuscar."";
			$resultgaraje=query($Sql,$link); 
			$datosGaraje=mysql_fetch_array($resultgaraje);
 			$Lugar=$datosGaraje[0];
			
			if(isset($Lugar)){
			
			$Sql="select id_garaje, lugar_garaje, numero_garaje from garaje where id_garaje = ".$Lugar."";
			$resultgaraje=query($Sql,$link); 
			$datosGaraje=mysql_fetch_array($resultgaraje);
			$idgaraje=$datosGaraje[0];
 			$LugarGaraje=$datosGaraje[1];
			$NumeroGaraje=$datosGaraje[2];
			}
			
}else{
			$id_vehi="";
}
			if ($x==0){
				echo "
				<script language='JavaScript'>
				alert('Usuario no registrado Vuelva intente');
				</script>";  
			}
			else{
					if ($id_vehi==""){
						echo "
							<script language='JavaScript'>
							alert('Usuario sin vehiculo registrado');
							</script>"; 	
						}
				}
			$_SESSION['usuario'] = $cc_usu ;
				?>

        
<form name="asigGaraje" action="registrarVehiculosInsert.php" method="post">

	<table align="center" border="0">
    <tr>
    <td>
         
    <fieldset width="200" height="50">
                <div class='alert alert-danger'>
                <legend>Usuario</legend>
                <table>   
        <tr>

            <td>N° Documento</td>
            <td><input type="text" name="cc_usuario" value="<?php echo $cc_usu; ?>" onkeypress="return letra(event)" /></td>
        </tr>   
        <tr>
      <!--      <td colspan="2"> -->
          <!--       <fieldset width="200" height="50"> --> 
          <!--           <table align="center" border="0">--> 
         <!--                <tr>--> 
                            <td align="center" colspan="2">
                            	<input class="btn btn-danger" type="submit" value="Buscar Usuario" />
                            </td>
           <!--                </tr>--> 
            <!--           </table>--> 
<!--                </fieldset> -->
     <!--       </td> -->
        </tr>
        </table>
        </td>
        </tr>
             </div>
                </fieldset>
	</table>

    <?php
		if ($id_vehi<>""){
			echo "
			<table align='center' border='0'>
				<tr>
					<td colspan='2'>
						<fieldset width='200' height='50'>
						<div class='alert alert-danger'>
							<legend>Datos del Vehiculo</legend>
							<table align='center' border='0'>
								<tr>
									<td>ID Vehiculo</td>
									<td><input type='text' name='Id_vehiculo' onFocus='blur()' value=".$id_vehi." /></td>
								</tr>
								<tr>
									<td>Tipo de Vehiculo</td>
									<td><input type='text' name='Tipo_vehiculo' onFocus='blur()' value=".$tipo." /></td>
								</tr>
								<tr>
									<td>Placa</td>
									<td><input type='text' name='Placa' onFocus='blur()' value=".$placa." /></td>
								</tr>
								<tr>
									<td>Marca</td>
									<td><input type='text' name='Marca' onFocus='blur()' value=".$marca." /></td>
								</tr>
								<tr>
									<td>Color</td>
									<td><input type='text' name='Color' onFocus='blur()' value=".$color." /></td>
								</tr>
							</table>
							</div>
						</fieldset>
					</td>
				</tr>
			</table>
			<table align='center' border='0'>
				<tr>
					<td colspan='2'>
						<fieldset width='200' height='50'>
						<div class='alert alert-danger'>
							<legend>Datos del Garaje</legend>
							<table align='center' border='0'>
								<tr>
									<td>ID Garaje</td>
									<td><input type='text' name='Id_vehiculo' onFocus='blur()' value=".$idgaraje." /></td>
								</tr>
								<tr>
									<td>Lugar de Garaje</td>
									<td><input type='text' name='Tipo_vehiculo' onFocus='blur()' value=".$LugarGaraje." /></td>
								</tr>
								<tr>
									<td>Numero de Garaje</td>
									<td><input type='text' name='Placa' onFocus='blur()' value=".$NumeroGaraje." /></td>
							</table>
							</div>
						</fieldset>
					</td>
				</tr>
			</table>
			";
		}
		if ($id_vehi=="" && $x<>0){
			echo "
			<table align='center' border='0'>
				<tr>
					<td>
					<fieldset width='200' height='50'>		
						<div class='alert alert-danger'>
						<legend>Registrar Vehiculo</legend>
					<table>
					<tr>
					<td>
						<input class='btn btn-danger' type='button' value='Registrar Vehiculo' onclick=window.location='datosRegistroVehiculos.php'; />
						</td>
						</tr>
						</table>
						</div>
						</fieldset>
					</td>
				</tr>
			</table>					
			";
		}
	?>
</form>
   	</p>
	</div>
	 <?php 
        include("../web-app/footer.php");
     ?>
     
</body>
</html>

