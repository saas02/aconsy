<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="..\web-app\default.css" rel="stylesheet" type="text/css" />
   <link href="/ACONSY/web-app/img/huella.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
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
		$Sql1="select nombre from jornada ";
		$result_query=query($Sql1,$link);
		while ($datosid_jornada[] = mysql_fetch_array($result_query)){}
		$Sql="select id_jornada from jornada ";
		$result=query($Sql,$link); 
		$x=mysql_num_rows($result);
		
		
		
	?>

	<form name='jornada' action="administrarJornadaVer.php" method="post">
    <input type="hidden" value="1" name="1"/>
    <input type="hidden" value="2" name="2"/>
    <input type="hidden" value="2" name="2"/>
		<table align="center" border="0">
        	<tr>
        	<td>
            	<fieldset>
                <div class='alert alert-danger'>
                	<legend align="center">Escoja una Jornada</legend>
                    <table align="center" border="0">
                        <tr>
                            <td colspan="2">
                                <select name='Tipo_jornada' size='1'>
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
													<option value='".$datosid_jornada[$i][0]."'> ".$datosid_jornada[$i][0]."";
											}
										}
                                    ?> 
								</select>
                            </td>
						</tr>
						<tr>
                            <td align="center">
                            	<input class='btn btn-danger' type="submit" value="Ver" onclick=this.form.action='administrarJornadaVer.php' />
                            </td>
                           	<td align="center">
                            	<input class='btn btn-danger' type="submit" value="Editar" onclick=this.form.action='administrarJornadaEditar.php'  />
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
                            	<input class='btn btn-danger' type="submit" value="Crear" onclick=this.form.action='administrarJornadaCrear.php'  />
                            </td>

                        </tr>
                    </table>
                  
                </fieldset>
            </td>            
        </tr>
    </table>
 </form>
 
	 <?php 
         include("\..\web-app/footer.php");
     ?>
     
</div>
</body>
</html>
