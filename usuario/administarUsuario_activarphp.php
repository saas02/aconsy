
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="..\web-app\default.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<?php 
	include("../web-app/header.php");
	include("../web-app/sidebar.php"); 
	?>
    
     <?php 
                if (isset($_SESSION['rol'])){
                  if($_SESSION['rol']==1)
              echo "";
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
						  
include("../web-app/conexion.php");
$link=Conectar(); 
$cedula=$_POST['Cedula'];
$estado="1";	
if ($estado=="1")
{
$consulta=query("UPDATE  usuario SET  estado=".$estado."   WHERE  cedula=".$cedula."", $link);
echo "<script language='JavaScript'> 
   alert('Se Ha Modificado El Estado Del Usuario: ".$cedula."');
   window.location='buscar.php';
   </script>";
	}
	else
	{
	}
							 

      ?>

	 <?php 
	    include("../web-app/footer.php");
     ?>
     

</body>
</html>
