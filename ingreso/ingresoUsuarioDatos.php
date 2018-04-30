<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="../web-app/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="container">

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
			$cc_usu=$_POST["cc_usuario"];
			@$variable=$_POST["variable"];
			$Sql="select id_usuario from usuario where cedula = ".$cc_usu." ";
			$result=query($Sql,$link);
			$id_usu = mysql_fetch_array($result);
			$x=mysql_num_rows($result);
		
			if ($x==0){
			if ($variable==0){
				echo "
				<script language='JavaScript'>
				alert('Usuario no registrado Vuelva intente');
				window.location='ingresoUsuarios.php';
				</script>";  
				}else{
				echo "
				<script language='JavaScript'>
				alert('Usuario no registrado Vuelva intente');
				window.location='ingresoAutomatico.php';
				</script>"; 
				
				}
			}else{ 
				date_default_timezone_set("America/Bogota" ) ; 		
				$diaactual=date("Y-m-d");
				$hora = date('H:i:s',time());
				$fecha=($diaactual." ".$hora);												
				$Sql1="select max(id_ingreso) from ingreso";
				$reultmax_id_ingreso=query($Sql1,$link); 
				$datos_max_id_ingreso=mysql_fetch_array($reultmax_id_ingreso);
				$max_id_ingreso=($datos_max_id_ingreso[0])+1;
				                                    
				$sql = "select ing.id_ingreso from ingreso ing inner join ingreso_usuario iu inner join usuario uu on iu.id_usuario = uu.id_usuario where uu.cedula = ".$cc_usu."  and iu.id_ingreso = ing.id_ingreso and ing.fecha_salida = '0000-00-00 00:00:00'";
				$result=query($sql,$link);
				$ingreso = mysql_fetch_array($result); 
				$y=mysql_num_rows($result);
				if($y==0){
					$sql = "insert into ingreso values (".$max_id_ingreso.",'".$fecha."','----')";
					$result=query($sql,$link);
					$sql = "insert into ingreso_usuario values (".$id_usu[0].",".$max_id_ingreso.")";
					$result=query($sql,$link);
					if ($variable==0){
					echo "
						<script language='JavaScript'>
						alert('Entro');
						</script>"; }
					}else{
						$sql = "update ingreso set fecha_salida='".$fecha."' where id_ingreso = ".$ingreso[0]."";
						$result=query($sql,$link);
						if ($variable==0){
						echo "
						<script language='JavaScript'>
						alert('Salio');
						</script>";
						$rol = query("SELECT rol.id_rol FROM rol,usuario_rol,usuario WHERE rol.id_rol=usuario_rol.id_rol AND usuario_rol.id_usuario=usuario.id_usuario and usuario.cedula=".$cc_usu."", $link);
                        $usuario_rol=mysql_fetch_array($rol);
                        $idRol=$usuario_rol[0]; 
                        if ($idRol=="6")
                            {
                            $state="0";
                            $estado = query("UPDATE usuario set estado='".$state."' where cedula=".$cc_usu."", $link);
                            }   else {}
										}
						}
						if ($variable==0){
				echo "
				<script language='JavaScript'>
				window.location='ingresoUsuarios.php';
				</script>";
				}else{
				echo "
				<script language='JavaScript'>
				window.location='ingresoAutomatico.php';
				</script>";
				}
				}
				
				?>
                                 
	 <?php 
        include("../web-app/footer.php");
     ?>
     
</div>
</body>
</html>

