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
    <h2>
	<?php 

             if (isset($_SESSION['rol'])){
                 if($_SESSION['rol']==1 || $_SESSION['rol']==4)
             echo "Registrar Elementos";
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
     ?></h2>
    
    <p>
    <form name="elementos" action="registrarElementos2.php" method="post">
    <table align="center" border="0">
        <tr>
        	<td>
        	<fieldset width="200" height="50">
            <div class="alert alert-danger">
            <legend>Datos Del Elemento:</legend>
            <table align="center" border="0">
                <tr>
                    <td>C.C. Usuario </td>
                    <td><input type="text" name="CC" value="" /></td>
                </tr>
                <tr>
                    <td>Marca</td>
                    <td><input type='text' name='Marca' value="" /></td>
                </tr>
                <tr>
                    <td>Serial</td>
                    <td><input type="text" name="Serial" value="" /></td>
                </tr>
                <tr>
                    <td>Descripción</td>
                    <td><input type="text" name="Descripcion" value="" /></td>
                </tr>
                <tr>
              		<td>Tipo</td>
                    <td>
                    	<select name="Tipo">
                        <option value="Portatil">Portatil</option>
                        <option value="Herramienta">Herramienta</option>
                        <option value="Multimetro">Multimetro</option>
                        <option value="Parte_PC">Parte PC</option>
                        <option value="Tablet">Tablet</option>
                        <option value="Otro">Otro</option>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td><input class="btn btn-danger" type="submit" value="Agregar" /></td>
                    <td><input class="btn btn-danger" type="reset" value="Limpiar" /></td>
                </tr>
            </table>
            </div>
        	</fieldset>
        	</td>
        </tr>
        </table>
		</form>
        <form name="elementos" action="buscarElemento.php" method="post">
 		<table align="center" border="0">
        	<tr>
                <td>
                <fieldset width="200" height="50">
                <div class="alert alert-danger">
                <legend>Buscar Elemento por:</legend>
                <table>
                    <tr>
                      	<td> CC Usuario </td>
                      	<td><input type="text" name="ced" /></td>
                    </tr>
                    <tr>
                      	<td>Serial</td>
                      	<td><input type="text" name="serial" /></td>
                    </tr>
                    <tr>
                        <td><input class="btn btn-danger" type="submit" value="Buscar" /></td>
                        <td><input class="btn btn-danger" type="button" value="Salir" onClick="window.location='../index.php'" /></td>
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

