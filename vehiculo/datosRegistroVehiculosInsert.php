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
			include("../web-app/conexion.php");
			$link=Conectar();
			$cc_usuario=$_POST['cc_usuario'];
			$id_vehiculo=$_POST['Id_vehiculo'];
			$Placa=$_POST['Placa'];
			$Marca=$_POST['Marca'];
			$Color=$_POST['Color'];
			$Tipo=$_POST['Tipo_vehiculo'];	

			$Sql1="select id_usuario,cedula from usuario where ".$cc_usuario." = cedula";
			$reultid_usuBuscar=query($Sql1,$link); 
			$datosid_usuBuscar=mysql_fetch_array($reultid_usuBuscar);
			$id_usuario=$datosid_usuBuscar[0];
			$cedula=$datosid_usuBuscar[1];

			if ($Tipo=="Motocicleta"){

						$Sql1="SELECT numero_garaje FROM garaje WHERE id_garaje BETWEEN  '100' AND  '200' AND id_garaje NOT IN (SELECT id_garaje FROM usuario_vehiculo WHERE id_garaje BETWEEN  '100' AND  '200')";
						$result_query=query($Sql1,$link);
						while ($datosid_garaje[] = mysql_fetch_array($result_query)){}
						$result=query($Sql1,$link); 
						$x=mysql_num_rows($result);
			}else{
						$Sql1="SELECT numero_garaje FROM garaje WHERE id_garaje BETWEEN  '1' AND  '99' AND id_garaje NOT IN (SELECT id_garaje FROM usuario_vehiculo WHERE id_garaje BETWEEN  '1' AND  '99')";
						$result_query=query($Sql1,$link);
						while ($datosid_garaje[] = mysql_fetch_array($result_query)){}
						$result=query($Sql1,$link); 
						$x=mysql_num_rows($result);
				}
		?> 
        
<form action="registrarVehiculosInsert.php" method="post">
    <table align="center" border="0">
        <tr >
            <td>
				<fieldset>
                <div class='alert alert-danger'>
                <table>   
			        <tr>
                    	<td>
	            		    N° Documento
			            </td>
            			<td>
			                <input type="text" name="cc_usuario" onFocus='blur()' value="<?php echo $cc_usuario ?>" />
			            </td>
					</tr>
		        </table>
				</div>
                </fieldset>
	        </td>
        </tr>
        <tr>
            <td colspan="2">
                <fieldset width="200" height="50">
                <div class="alert alert-danger">
                    <legend>Ingrese los siguientes datos del Vehiculo Autorizado</legend>
                    <table align="center" border="0">
                        <tr>
                            <td>
                                ID Vehiculo
                            </td>
                            <td>
                                <input type="text" name="Id_vehiculo" onFocus='blur()' value="<?php echo $id_vehiculo ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tipo de Vehiculo
                            </td>
                            <td>
								<input type='text' name='Tipo_vehiculo' onFocus='blur()' value="<?php echo $Tipo ?>" />								
                            </td>		
                        </tr>
                        <tr>
                            <td>
                                Placa
                            </td>
                            <td>
                                <input type="text" name="Placa" onFocus='blur()' value="<?php echo $Placa ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Marca
                            </td>
                            <td>
                                <input type="text" name="Marca" onFocus='blur()' value="<?php echo $Marca ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Color
                            </td>
                            <td>
                                <input type="text" name="Color" onFocus='blur()' value="<?php echo $Color ?>" />
                            </td>
                        </tr>
                        <tr>
    		            <td colspan="2" align="center">
            				<input class="btn btn-danger" type="button" value="Registrar nuevo vehiculo"  onclick="window.location='datosRegistroVehiculos.php'"  />
		                </td>
					</tr>
                    </table>
                    </div>
                </fieldset>
            </td>
		</tr>
		<tr>
        	<td colspan='2'>
				<fieldset width='200' height='50'>
                <div class="alert alert-danger">
                    <table align='center' border='0'>
                        <tr>
					<fieldset>
                	<legend align="center">Escoja un Garaje</legend>
                    <table align="center" border="0">
                        <tr>
                            <td colspan="2">
                                <select name='nombre' size='1'>
                                <option value=''>
                                	<?php
										if ($x==0)
										{
											echo "
											<option value=''>";
										}
				 						else
										{
                     						for($i=0; $i<$x; $i++)
											{
												echo "
													<option value='".$datosid_garaje[$i][0]."'> ".$datosid_garaje[$i][0]."";
											}
										}
                                    ?> 
								</select>
                        </tr>
                        <tr>
	                        <td>
    		                    <input class="btn btn-danger" type="submit" value="Asignar Garaje" />
            	            </td>
                        </tr>
                    </table>
                    </div>
                </fieldset>
            </td>
        </tr>
    </table>
</form>      

	
   	</p>
	</div>
 
	 <?php 
        include("../web-app/footer.php");
     ?>
     
</body>
</html>

