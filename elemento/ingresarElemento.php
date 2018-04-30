<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="../web-app/default.css" rel="stylesheet" type="text/css" />
</head>
<div class="container">

  	<?php 
	include("../web-app/header.php");
	include("../web-app/sidebar.php"); 
	?>
    
    
  	<div class="content">
   
	<?php 

	   if (isset($_SESSION['rol'])){
		if($_SESSION['rol']==1 || $_SESSION['rol']==4){
			echo "<h2>Ingreso de Elementos<h2>";}
		else{
			 echo 
		 	"<script language='JavaScript'> 
		 	alert('Usuario No Autorizado'); 
		 	window.location='../index.php';
		 	</script>";} 

		 }else{
			   echo 
				 "<script language='JavaScript'> 
				 alert('Debe Iniciar Sesion'); 
				 window.location='../index.php';
				 </script>"; 
				 
				 }
				 
			include("../web-app/conexion.php");
			$link=Conectar();  
			$cc_usu=$_POST['UsuarioCC'];
			$Sql="select id_usuario from usuario where cedula = ".$cc_usu." ";
			$result=query($Sql,$link);
			$id_elemento=$_POST['ID'];
			$x=mysql_num_rows($result);
			
			date_default_timezone_set("America/Bogota" ) ; 		
			$diaactual=date("Y-m-d");
			$hora = date('H:i:s',time());
			$fecha=($diaactual." ".$hora);																							
			$Sql1="select max(id_ingreso) from ingreso";
			$reultmax_id_ingreso=query($Sql1,$link); 
			$datos_max_id_ingreso=mysql_fetch_array($reultmax_id_ingreso);
			$max_id_ingreso=($datos_max_id_ingreso[0])+1;                                
			$sql = "select ing.id_ingreso from ingreso ing inner join ingreso_elemento ie inner join elemento ele on ie.id_elemento = ele.id_elemento where ele.id_elemento = ".$id_elemento."  and ie.id_ingreso = ing.id_ingreso and ing.fecha_salida = '0000-00-00 00:00:00'";
			$result=query($sql,$link);
			$ingreso = mysql_fetch_array($result); 
			$y=mysql_num_rows($result);
			if($y==0){
				$sql = "insert into ingreso values (".$max_id_ingreso.",'".$fecha."','----')";
				$result=query($sql,$link);
				$sql = "insert into ingreso_elemento values (".$max_id_ingreso.", ".$id_elemento.")";
				$result=query($sql,$link);
				echo "
					<script language='JavaScript'>
					alert('Entro');
					</script>"; 
			}else{
				$sql = "update ingreso set fecha_salida='".$fecha."' where id_ingreso = ".$ingreso[0]."";
				$result=query($sql,$link);
				echo "
					<script language='JavaScript'>
					alert('Salió');
					</script>"; 
			}
		echo "
				<script language='JavaScript'>
				window.location='registrarElementos.php';
				</script>";		
        include("../web-app/footer.php");
     ?>
     
</div>
</body>
</html>

