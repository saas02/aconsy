
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="..\web-app\default.css" rel="stylesheet" type="text/css" />

<script>
function verifletras(n){
permitidos=/[^A-z. .ñ.]/;
if(permitidos.test(n.value)){
alert("Solo Se Pueden Ingresar Letras");
n.value="";
n.focus();
}
}

function verifnumeros(n){
permitidos=/[^0-9.]/;
if(permitidos.test(n.value)){
alert("Solo Se Pueden Ingresar Numeros");
n.value="";
n.focus();
}
}



</script>

</head>

<body>


  	<?php 
	include("\..\web-app\header.php");
	include("\..\web-app\sidebar.php"); 
	?>
    <?php
	include("\..\web-app\conexion.php");
		@$link=Conectar(); 
	?>
    
    
      <h1><?php 
       
       if($_SESSION['rol']==1)
               echo "<h1 align='center'>Administracion de usuarios </h1><br>";
       else
               echo 
                       "<script language='JavaScript'> 
                       alert('Usuario No Autorizado'); 
                       window.location='index.php';
                       </script>"; 
					  
       ?>
      
       </h1>
       
    
    
               
<form action="administarUsuario_crea_php.php" method="Post" id="formulario">
    
    <table width="400" height="200" align="center">
    	<tr><th>
        <td>
    		<div class="alert alert-danger">  
         	<fieldset width="700" >
            <legend >Crear Rol Usuario</legend>
        	 
                <input type="checkbox" name="id_rol[]"  value="1"> Administrador
                <input type="checkbox" name="id_rol[]"  value="2"> Instructor
                <input type="checkbox" name="id_rol[]"  value="3"> Aprendiz
                <input type="checkbox" name="id_rol[]"  value="4"> Vigilante<br />
                <input type="checkbox" name="id_rol[]"  value="5"> Servicios generales
                <input type="checkbox" name="id_rol[]"  value="6"> Visitante 
                <input type="checkbox" name="id_rol[]"  value="7"> Empleado
		 	</fieldset>
            </div>
         </td>
         </th>
         </tr>
      </table> 
       
        
   <table width="400" height="200" align="center"> 
     <tr><th>
     	<div class="alert alert-danger">
     	<fieldset width="700" > 
    	 <legend>Datos del Usuario</legend>
   <table width="400" height="200" align="center">
   	 <tr>
     <td align="left">Número de Cedula :</td>
     <td > 
     <input name="Cedula" type="text" onKeyup="verifnumeros(this)" onblur="verifnumeros(this)" />
     </td></tr>
     <tr>
     <td align="left">Nombres :</td>
     <td><input name="Nombres" type="text" onKeyup="verifletras(this)" onblur="verifletras(this)" />
     </td></tr>
     <tr>
     <td align="left">Primer Apellido :</td>
     <td><input name="Primer_Apellido" type="text" onKeyup="verifletras(this)" onblur="verifletras(this)" />
     </td></tr>
     <tr>
     <td align="left">Segundo Apellido :</td>
     <td>
     <input name="Segundo_Apellido" type="text" onKeyup="verifletras(this)" onblur="verifletras(this)" /><br />
     </td></tr>
     <tr>
     <td align="left">Celular :</td> 
     <td><input name="Celular" type="text" onKeyup="verifnumeros(this)" onblur="verifnumeros(this)" /><br />
     </td></tr>
        <tr>
        <td align="left">Telefono :</td> 
        <td><input name="Telefono" type="text" onKeyup="verifnumeros(this)" onblur="verifnumeros(this)" /><br />
        </td></tr>
        <tr>
      	<td align="left">Extension :</td> 
        <td><input name="Extension" type="text" onKeyup="verifnumeros(this)" onblur="verifnumeros(this)" /><br />
        </td></tr>
        <tr>
        <td align="left">Dirección :</td> 
        <td><input name="Direccion" type="text" /><br /></td></tr>
        <tr>
        <td align="left">Jornada : </td>
        
        <td align="center">
    
           <select name="Jornada">
			   <?php
                $consultajornada= query("SELECT id_jornada,nombre FROM jornada");
                $numeroposiciones= mysql_num_rows($consultajornada);
                while ($filas = mysql_fetch_array($consultajornada))
				{
                  echo "<option  value=".$filas["id_jornada"].">".$filas["nombre"]."</option>"; 
                }
               ?>
   		
        </select>
		</td> 
        </tr>
        
        <tr>
        <td align="left">Área :</td>
        <td><input name="Area" type="text" onKeyup="verifletras(this)" onblur="verifletras(this)"/><br />
        </td></tr>
        <tr>
        <td align="left">Cargo :</td> 
        <td><input name="Cargo" type="text" onKeyup="verifletras(this)" onblur="verifletras(this)"/><br />
        </td></tr>
        <tr>
        <td colspan="2" align="center"><input class="btn btn-danger" name="insertar" type="submit" value="Crear Usuario" /> 
        </td>
        </tr>            
        </table> 
        </fieldset>  
       </th>
      </tr>
     </div>
   </table>
         
</form>
        
        
             
    
	
	 <?php 
        include("\..\web-app/footer.php");
     ?>
     

</body>
</html>

