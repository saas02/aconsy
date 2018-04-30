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
    
    <h2><?php 

             if (isset($_SESSION['rol'])){
                 if($_SESSION['rol']==1 || $_SESSION['rol']==4)
             echo "Elementos Registrados";
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
    
        
    <?php 
	include("\..\web-app\conexion.php");
	$link=Conectar();
	echo "<table align='center' border='0'>";
	if(isset($_POST["ced"]) && $_POST["ced"]!=""){
		$cc_user = $_POST["ced"];
		$sql = "select id_usuario from usuario where cedula ='".$cc_user."'";
		$result=query($sql,$link);
		
		$id_user=mysql_fetch_array($result);
		
		if($id_user == false){
			echo 	"<script language='JavaScript'> 
						alert('No hay un usuario asociado a ese N° de Cédula.'); 
						window.location='registrarElementos.php';
					</script>"; 
		}
		$sql2= "select distinct elemento.id_elemento, tipo, marca, serial, descripcion, id_usuario, codigo_barras from elemento inner join usuario_elemento on id_usuario = ".$id_user[0]." and elemento.id_elemento = usuario_elemento.id_elemento";
		$result=query($sql2,$link);
		while ( $row = mysql_fetch_array($result) ){
			echo "<tr><td><div class='alert alert-error'><form name='elemento".$row["id_elemento"]."' action='ingresarElemento.php' method='POST'>    
				<fieldset width='200' height='50'><legend>Datos del ".$row["tipo"]."</legend><table align='center' border='0'>";			
			echo "	<tr>
						<td><label>ID</label></td>
						<td> <input type='text' name='ID' value='".$row["id_elemento"]."' onFocus='blur()'  /></td>
					</tr>
					<tr>
						<td><label>Marca</label></td>
						<td><input type='text' name='Marca' value='".$row["marca"]."  ' onFocus='blur()' /></td>
					</tr>
					<tr>
						<td><label>Serial</label></td>
						<td><input type='text' name='Serial' value='".$row["serial"]."' onFocus='blur()' /></td>
					</tr>
					<tr>
						<td><label>CC. Usuario</label></td>
						<td><input type='text' name='UsuarioCC' value='".$cc_user."'  onFocus='blur()'  /></td>
					</tr>
					<tr>
						<td><label>Descripción</label></td>
						<td><input type='text' name='Descripcion' value='".$row["descripcion"]."' onFocus='blur()' /></td>
					</tr>
					<tr>
						<td><label>Tipo</label></td>
						<td><input type='text' name='Tipo' value='".$row["tipo"]."' onFocus='blur()' /></td>
					</tr>
					<tr><td colspan='2'><input type='submit' class='btn btn-danger' value= 'Ingresar/Retirar' /></td></tr>
					</table>
					</div>
					</fieldset></form>
					<form name='elemento_".$row["id_elemento"]."' action='generarCodigoElemento.php' method='POST'>
					
					<input type='hidden' name='ID' value='".$row["id_elemento"]."' />
					<input type='hidden' name='Codigo' value='".$row["codigo_barras"]."' />
					<input type='submit' class='btn btn-danger' value= 'Generar Código de Barras: Elemento ".$row["serial"]."'/>
					</form>
					</td></tr>
					";
					 
		   }
	}else{
		if(isset($_POST["serial"])&& $_POST["serial"]!=""){
			$serial = $_POST["serial"];
			$sql = "select id_elemento from elemento where serial = '".$serial."'";
			$result=query($sql,$link);
				
			$id_equip=mysql_fetch_array($result);
			
			if($id_equip == false){
				echo 	"<script language='JavaScript'> 
							alert('No existe el serial'); 
							window.location='registrarElementos.php';
						</script>"; 
			}
			$sql2= "select elemento.id_elemento, tipo, marca, serial, descripcion, id_usuario, codigo_barras from elemento inner join usuario_elemento on elemento.id_elemento = ".$id_equip[0]." and elemento.id_elemento = usuario_elemento.id_elemento";
			$result=query($sql2,$link);
			while ( $row = mysql_fetch_array($result) ){
			echo "<tr><td><div class='alert alert-error'><table align='center' border='0'>";
			echo "<tr><td><form name='elemento".$row["id_elemento"]."' action='ingresarElemento.php' method='POST'><fieldset width='200' height='50'><legend>Datos del ".$row["tipo"]."</legend><table align='center' border='0'>";			
			echo "	<tr>
						<td><label>ID</label></td>
						<td> <input type='text' name='ID' value='".$row["id_elemento"]."' disabled/></td>
					</tr>
					<tr>
						<td><label>Marca</label></td>
						<td><input type='text' name='Marca' value='".$row["marca"]."  ' disabled/></td>
					</tr>
					<tr>
						<td><label>Serial</label></td>
						<td><input type='text' name='Serial' value='".$row["serial"]."' disabled/></td>
					</tr>
					<tr>
						<td><label>CC. Usuario</label></td>
						<td><input type='text' name='UsuarioCC' value='".$row["id_usuario"] ."' disabled/></td>
					</tr>
					<tr>
						<td><label>Descripción</label></td>
						<td><input type='text' name='Descripcion' value='".$row["descripcion"]."' disabled/></td>
					</tr>
					<tr>
						<td><label>Tipo</label></td>
						<td><input type='text' name='Tipo' value='".$row["tipo"]."' disabled/></td>
					</tr>
					<tr><td colspan='2'><input type='submit' class='btn btn-danger' value= 'Ingresar/Retirar'/></td></tr>
					</table>
					</div>
					</fieldset>
					</form>
					<form name='elemento_".$row["id_elemento"]."' action='generarCodigoElemento.php' method='POST'>
						
						<input type='hidden' name='ID' value='".$row["id_elemento"]."' />
						<input type='hidden' name='Codigo' value='".$row["codigo_barras"]."' />
						<input type='submit' class='btn btn-danger' value= 'Generar Código de Barras: Elemento ".$row["serial"]."'/>
						</form>
					</td></tr>";
					}		
			}else{
					echo 
					 "<script language='JavaScript'> 
					 alert('Debe Ingresar Datos de Búsqueda'); 
					 window.location='registrarElementos.php';
					 </script>"; 
					}
			
		}

	?>  

        </table>
		
	
   	</p>
	</div>
 
	 <?php 
        include("\..\web-app/footer.php");
     ?>
     
</body>
</html>

