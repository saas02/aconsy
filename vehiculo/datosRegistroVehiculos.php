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
			include("\..\web-app\conexion.php");
			$link=Conectar();
			$Sql1="select max(id_vehiculo) from vehiculo";
			$reultmax_id_vehiculo=query($Sql1,$link); 
			$datos_max_id_vehiculo=mysql_fetch_array($reultmax_id_vehiculo);
			$max_id_vehiculo=($datos_max_id_vehiculo[0])+1;
			$cc_usuario = $_SESSION['usuario'];
		?> 
        
<form action="datosRegistroVehiculosInsert.php" method="post">
    <table align="center" border="0">
        <tr >
            <td>
	            <fieldset width="200" height="50">
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
                                <input type="text" name="Id_vehiculo" onFocus='blur()' value="<?php echo $max_id_vehiculo ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tipo de Vehiculo
                            </td>
                            <td>
                                <select name='Tipo_vehiculo' size='1'>
                                <option value='Motocicleta'> Motocicleta
                                <option value='Automovil'> Automovil
                            </td>		
                        </tr>
                        <tr>
                            <td>
                                Placa
                            </td>
                            <td>
                                <input type="text" name="Placa" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Marca
                            </td>
                            <td>
                                <input type="text" name="Marca" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Color
                            </td>
                            <td>
                                <input type="text" name="Color" value="" />
                            </td>
                        </tr>
                        <tr>
                        	<td colspan="2">
                            	<input align="left" class="btn btn-danger" type='submit' value='Registrar Vehiculo' />
								<input align="right" class="btn btn-danger" type="button" value="Cancelar" onclick="window.location='registrarVehiculos.php'" />
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
        include("\..\web-app/footer.php");
     ?>
     
</body>
</html>

