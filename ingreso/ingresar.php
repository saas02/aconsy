  	<?php 
	include("../web-app/header.php");
	include("../web-app/sidebar.php"); 
	?>
    
    
  	<div class="content">
    
    <h1>
	<?php 
	   if (isset($_SESSION['rol'])){
		 if($_SESSION['rol']==1 || $_SESSION['rol']==4)
	 echo "<h2>Ingreso de Usuarios</h2>";
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
		<?php
			include("../web-app/conexion.php");
			$link=Conectar();   
        ?>
   	</p>

    <table align="center" border="0">
        <tr>
        	<td>
            	<fieldset>
					<div class="alert alert-danger">
                	<legend>Ingreso - Salida</legend>
                    <table align="center" border="0">
                    	<tr>
                            <td>
                            	<input class='btn btn-danger' type="button" value="Personas" onclick="window.location='ingresoUsuarios.php'" />
                            </td>
                           	<td>
                            	<input class='btn btn-danger' type="button" value="Vehiculos" onclick="window.location='ingresarVehiculos.php'" />
                            </td>
                            <td>
                            	<input class='btn btn-danger' type="button" value="Elementos" onclick="window.location='../elemento/registrarElementos.php'" />
                            </td>

                        </tr>
                    </table>
					</div>
                </fieldset>
            </td>            
        </tr>
    </table>
    
 
	 <?php 
        include("../web-app/footer.php");
     ?>


