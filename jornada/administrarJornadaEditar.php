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
  <SCRIPT language=Javascript>
	 function numero1()
	 {
	var edad = document.jornada.h_entrada1.value;
	var entero = parseInt( edad );
	if (entero<10 && entero>2){
		 document.jornada.h_entrada1.value="0"+entero;}
	 if (entero>23){
		 document.jornada.h_entrada1.value="";}
		 }
		 	 function numero2()
	 {
	var edad = document.jornada.h_entrada2.value;
	var entero = parseInt( edad );
	 if (entero>59)
		 document.jornada.h_entrada2.value="";
		 }
		 	 function numero3()
	 {
	var edad = document.jornada.h_salida1.value;
	var entero = parseInt( edad );
	if (entero<10 && entero>2){
		 document.jornada.h_salida1.value="0"+entero;}
	 if (entero>23)
		 document.jornada.h_salida1.value="";
		 }
		 	 function numero4()
	 {
	var edad = document.jornada.h_salida2.value;
	var entero = parseInt( edad );
	 if (entero>59)
		 document.jornada.h_salida2.value="";
		 }
   </SCRIPT>
    <?php
	$Sql1="select id_jornada, nombre, hora_entrada, hora_salida from jornada where nombre = '".$_POST['Tipo_jornada']."'";
			$reultmax_id_vehiculo=query($Sql1,$link); 
			$datos_max_id_vehiculo=mysql_fetch_array($reultmax_id_vehiculo);
			$idjornada=$datos_max_id_vehiculo[0];
			$nombre=$datos_max_id_vehiculo[1];
			$hentrada=$datos_max_id_vehiculo[2];
			$hsalida=$datos_max_id_vehiculo[3];
			$Sql1="SELECT RIGHT( hora_entrada, 2 ) , RIGHT( hora_salida, 2 ), LEFT( hora_entrada, 2 ) , LEFT( hora_salida, 2 ) FROM jornada where nombre = '".$_POST['Tipo_jornada']."'";
			$reultmax_id_vehiculo=query($Sql1,$link); 
			$datos_max_id=mysql_fetch_array($reultmax_id_vehiculo);
			$hentrada2=$datos_max_id[0];
			$hsalida2=$datos_max_id[1];
			$hentrada1=$datos_max_id[2];
			$hsalida1=$datos_max_id[3];
			
		
 ?>
 <form name='jornada' method="post">
    <table align="center" border="0" >
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
                            <td colspan="2">
                                <input onFocus="blur()" type="text" name="id_jornada"  value="<?php echo $idjornada ?>" />
                            </td>
						</tr>
						<tr>
                            <td>
								Nombre
                            </td>
                            <td colspan="2">
                                <input type="text" name="nombre"  value="<?php echo $nombre ?>" />
                            </td>
						</tr>
						<tr>
                            <td>
								Hora Entrada
                            </td>
                            <td>
                            	<table align="center" border="0">
		                            <tr>
        			                    <td>
                    			          <input type="text" style="width:17px"  name="h_entrada1" maxlength="2" onkeyup="numero1()" value="<?php echo $hentrada1 ?>" />
                                		</td>
                                        <td><h3>:</h3></td>
                                        <td>
                              <input type="text" style="width:17px"  name="h_entrada2" maxlength="2" onkeyup="numero2()"value="<?php echo $hentrada2 ?>" />
                              			</td>
									</tr>
								</table>
                            </td>
						<tr>
                            <td>
								Hora Salida
                            </td>
                            <td>
                            	<table align="center" border="0">
		                            <tr>
        			                    <td>
                    			            <input type="text" style="width:17px"  name="h_salida1" maxlength="2"  onkeyup="numero3()" value="<?php echo $hsalida1 ?>" />
                                		</td>
                                        <td><h3>:</h3></td>
                                        <td>
			                                <input type="text" style="width:17px"  name="h_salida2" maxlength="2"  onkeyup="numero4()" value="<?php echo $hsalida2 ?>" />
            		                    </td>
									</tr>
								</table>
                            </td>
						</tr>
                    </table>
                    </div>	
                </fieldset>
            </td>            
        </tr>
        <tr>
        	<td colspan="2">
				<fieldset>
                <div class='alert alert-danger'>
                	<legend align="center">Jornada</legend>
                    <table align="center" border="0">
                    	<tr>
							<td align="center">
							<input class='btn btn-danger' type="button" value="Cancelar" onclick="window.location='administrarJornada.php'" />
							</td>
                            <td align="center">
                            	<input class='btn btn-danger' type="submit" value="Editar" onclick=this.form.action='administrarJornadaVer.php'  />
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
