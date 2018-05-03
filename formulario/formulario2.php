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
        include("../web-app/header.php");
        include("../web-app/sidebar.php");
        ?>
        <h1><?php 
                
            if ($_SESSION['rol'] == 1)
                echo "Administracion de Formulario";
            else
                echo
                "<script language='JavaScript'> 
                       alert('Usuario No Autorizado'); 
                       window.location='index.php';
                       </script>";
            ?>

        </h1>
  <?php
	include("../web-app/conexion.php");
	$link=Conectar();  
      
	$cc_usu=$_SESSION['cedula'];
	                         
	$Sql="select id_usuario from usuario where cedula = ".$cc_usu."";
	$result=$link->query($Sql);
	$id_usu = $result->fetch_all(MYSQLI_ASSOC);
        
        if($result->num_rows > 0){
            var_dump($_POST['fecha']);
            date_default_timezone_set("America/Bogota" ) ; 		            
            $fecha = $_POST['fecha'];
            $idUsuario = $id_usu[0]['id_usuario'];
            $ruta = $_POST['ruta'];
            $nombreRuta = $_POST['nombre'];
            $cenefa = $_POST['cenefa'];
            $vado = $_POST['vado'];
            $zona = $_POST['zona'];
            $senal = $_POST['senal'];
            $braile = $_POST['braile'];
            $bandera = $_POST['bandera'];
            $consulta = "INSERT INTO formulario (
                        id_usuario ,
                        fecha ,
                        ruta ,
                        nombre_ruta ,
                        cenefa ,
                        vado ,
                        zona ,
                        senal ,
                        braile ,
                        bandera
                        )
                        VALUES (".$idUsuario.",'".$fecha."','".$ruta."','".$nombreRuta."','".$cenefa."',
                        '".$vado."','".$zona."','".$senal."','".$braile."','".$bandera."')";
            
            $insertar=$link->query($consulta);	
            if($insertar){
                 echo
                "<script language='JavaScript'> 
                       alert('Registro efecutado correctamente'); 
                       window.location='../index.php';
                       </script>";
            }else{
                var_dump(mysqli_error($link));die;
                 echo
                "<script language='JavaScript'> 
                    alert('Ocurrio Un error al registrar'); 
                    window.location='formulario.php';
                </script>";
            }
					
        }else{
            echo
                "<script language='JavaScript'> 
                       alert('Usuario No Autorizado para efectuar registros'); 
                       window.location='index.php';
                       </script>";
        }
        
?>
    
</body>
</html>

