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
    <h1>
	<?php 
	 
	   if (isset($_SESSION['rol'])){
		 if($_SESSION['rol']==1 || $_SESSION['rol']==4)
	 echo "Reportes";
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
		?>
   	</p>
<table align="center" border="0">
        <tr>
        	<td>
        	<fieldset width="200" height="50">
            <div class="alert alert-danger">  
<fieldset  width="10" height="10"> 	
<form name="reporte" method="POST">		
		<table border="0">
		<tr>
			<td>Cursos</td>
			<td>
			<select name="curso">
			<option value="">--- Seleccione Curso ---</option>
			<?php
			$link=Conectar(); 
			$curso=$link->query("select * from curso");
                        $rows=$curso->fetch_all(MYSQLI_ASSOC);
                                                        
                        foreach($rows as $row){
                            echo "<option value=".$row["id_curso"].">".$row["codigo"]."</option>";
                        }                        			
			
			?></select>
			</td>
			<td>
			<input class=" btn btn-danger" type="submit" value="Reporte" onclick="this.form.action='reportesCurso.php'">
			</td>
		</tr>
		<tr>
			<td>Elementos</td>
			<td><input type="text" name="usuario" placeholder="Documento Usuario"></td>
			<td>
			<input class=" btn btn-danger" type="submit" value="Reporte" onclick="this.form.action='reportesUsuario.php'">
			</td>
		</tr>
		<tr>
			<td>Ingresos</td>
			<td><input type="text" name="user" placeholder="Documento Usuario"></td>
			<td>
			<input class=" btn btn-danger" type="submit" value="Reporte" onclick="this.form.action='ingresos.php'">
			</td>
			<tr>
			<td>Vehiculos</td>
			<td><input type="text" name="vehiculos" placeholder="Documento Usuario"></td>
			<td>
			<input class=" btn btn-danger" type="submit" value="Reporte" onclick="this.form.action='reportesVehiculo.php'">
			</td>
			</tr>
		</tr>
		</tr>
		</table>
 </form>
 </td></tr></div></table>
	 <?php 
        include("../web-app/footer.php");
     ?>
     
</div>
    </body>
</html>
