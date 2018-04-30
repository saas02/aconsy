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
    <h1><?php 
       if (isset($_SESSION['rol'])){
		   if($_SESSION['rol']==1)
               echo "<h2> Administrar Garajes </h2>";
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
       ?></h1>
    <p>
		<?php
		error_reporting(0);
			include("\..\web-app\conexion.php");
			$link=Conectar(); 
			$Sql1="select max(id_garaje) from garaje";
			$resultmaxid_garaje=query($Sql1,$link); 
			$datosmaxid_garaje=mysql_fetch_array($resultmaxid_garaje);
			$maxid_garaje=$datosmaxid_garaje[0];
			$id_garaje=$_SESSION['id_garaje'];
			if ($id_garaje>$maxid_garaje){
				$id_garaje=$id_garaje-1;
			}
			$valorid_garaje=($id_garaje)-1;
			$Sql="select id_garaje, lugar_garaje, numero_garaje from garaje where id_garaje='".$valorid_garaje."' and lugar_garaje='motos'";
			$reultid_vehi=query($Sql,$link); 
			$datosid_vehi=mysql_fetch_array($reultid_vehi);
			$id_garaje=$datosid_vehi[0];
 			$lugar_garaje=$datosid_vehi[1];
			$numero_garaje=$datosid_vehi[2];
			if($_SESSION['id_garaje']==101){
			$_SESSION['id_garaje']=($maxid_garaje)+1;
				}else{
			$_SESSION['id_garaje']=$id_garaje;
				}
				if($id_garaje==""){
			$Sql="select id_garaje, lugar_garaje, numero_garaje from garaje where id_garaje='".$maxid_garaje."' and lugar_garaje='motos'";
			$reultid_vehi=query($Sql,$link); 
			$datosid_vehi=mysql_fetch_array($reultid_vehi);
			$id_garaje=$datosid_vehi[0];
 			$lugar_garaje=$datosid_vehi[1];
			$numero_garaje=$datosid_vehi[2];
						}
			$Sql="select id_jornada from usuario_vehiculo where id_garaje = ".$id_garaje." ";
			$result=query($Sql,$link); 
			$x=mysql_num_rows($result);
			
			$Sql="select id_jornada from jornada ";
			$result=query($Sql,$link); 
			$numJornada=mysql_num_rows($result);
			
			$Sql1="select id_jornada, nombre from jornada ";
				$result_query=query($Sql1,$link);
				while ($nom_jornada[] = mysql_fetch_array($result_query)){}
			
			if ($x>0){			
				$Sql1="select id_jornada from usuario_vehiculo where id_garaje=".$id_garaje." ";
				$result_query=query($Sql1,$link);
				while ($datosid_jornada[] = mysql_fetch_array($result_query)){}
				$y=mysql_num_rows($result_query);
			}else{
				$val=true;
				}
        ?>   
        
<form name="asigGaraje" action="garajesSiguienteMoto.php" method="post">
	
    <table align="center" border="0">
    <tr>
    <td>
    <div class='alert alert-danger'>
	<table align="center" border="0">
    	<tr>
        	<td>
            	Id Garaje
            </td>
            <td> 
            	<input type="text" name="id_garaje"  value="<?php echo $id_garaje ?>" onFocus='blur()' />
            </td>
        	<td>
            	<input class="btn btn-danger" type="button" value="Anterior" onclick="window.location='garajesAnteriorMoto.php'"  />
            </td>
            <td>
            	<input class="btn btn-danger" type="submit" value="Siguiente"  />
            </td>
        </tr>
    	<tr>
        	<td>
            	Lugar Garaje
            </td>
            <td>
            	<input type="text" name="lugar_garaje"  value="<?php echo $lugar_garaje ?>" onFocus='blur()' />
            </td>
        	<td align="center" colspan="2" align="center">

            </td>
        </tr>
        <tr>
        	<td>
            	Numero Garaje
            </td>
            <td>
            	<input type="text" name="numero_garaje"  value="<?php echo $numero_garaje  ?>" onFocus='blur()' />
            </td>
            <td align="center" colspan="2">
            	<input class="btn btn-danger" type="button" value="Registrar Nuevo Garaje" onclick="window.location='garajesCrearMoto.php'" />
            </td>
        </tr>

    </table>
    </div>
    <table align="center" border="0">
    <tr>
    <td>
    <div class='alert alert-danger'>
    <table align="center" border="0"> 
    	<tr>
        	<td>
            	<fieldset width="200" height="50">
                    <legend align="center">HORARIOS DEL GARAJE</legend>
                    <table align="center" border="0" class="table table-bordered">
						<?php
						echo "<tr>";
						for($i=0; $i<$numJornada; $i++){
							echo "<td>".$nom_jornada[$i][1]."</td>";
						}
						echo "</tr>";
						echo "<tr>";
						for($i=0; $i<$numJornada; $i++){
							echo "<td>";
							for ($k=0; $k<$y; $k++){
								if($nom_jornada[$i][0]==$datosid_jornada[$k][0]){
									$val=false;
									break;
								}else{
									$val=true;
								}
							}
						if($val==true){
							echo"libre";
						}else{
							echo"ocupado";
						}
							echo "</td>";
						}
						echo "</tr>";
						 ?>
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
	
   	</p>
	</div>
 
	 <?php 
        include("\..\web-app/footer.php");
     ?>
     
</body>
</html>

