
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
    
    
  	
    <?php 
        
       if($_SESSION['rol']==1)
               echo "<h1>Administracion de usuarios</h1>";
       else
               echo 
                       "<script language='JavaScript'> 
                       alert('Usuario No Autorizado'); 
                       window.location='index.php';
                       </script>"; 
					  
       ?>
   
       
       
    <p>
    
     <form action="administarUsuario_eliminar.php" method="post">
        <table align="center" width="400" height="200">
        <tr><th>
        <div class="alert alert-danger">
        <fieldset width="200" >
            <legend align="left">Datos del Usuario</legend>
        	<table align="center" border="0" width="390">
            	<tr>
                	
					<td align="center">Digite la cedula del usuario a eliminar : <input name="Cedula" type="text" value="" />
                    </td>
                </tr>
               <tr><td><input class="btn btn-danger" name="Eliminar" type="submit" value="DESACTIVAR USUARIO" /></td></tr>
                                
              </table>               
             </fieldset>  
             
             </th>
           </tr>
           </div>
        </table>
         
        </form>     
    </p>
	
    <?php
		include("../web-app/conexion.php");
		$link=Conectar(); 
				
				
				@$ejecutaconsulta=$link->query("select estado from usuario where cedula = '".$_POST["Cedula"]."'");
				$res_consulta=$ejecutaconsulta->fetch_all(MYSQLI_ASSOC);
				
				if ($res_consulta[0]['estado']==1)
				{
					
					$cambio_estado=$link->query("UPDATE usuario set estado='0' where cedula='".$_POST["Cedula"]."'");
					echo 
								  "<script language='JavaScript'> 
								  alert('Usuario Desactivado con exito '); 
								  window.location='administarUsuario.php';
								  </script>"; 
				
				}
				
				else if ($res_consulta[0]['estado']==0) 
				{
					echo 
								  "<script language='JavaScript'> 
								  alert('Usuario ya se encuentra inactivo o el campo esta vacio'); 
								  </script>";
				}
				
    	
       
	
				
				
	?>
	   
		 <?php 
            include("../web-app/footer.php");
         ?>
     

</body>
</html>
