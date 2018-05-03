<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="../web-app/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
<body>
<div class="container">

  	<?php 
	include("../web-app/header.php");
	include("../web-app/sidebar.php"); 
	?>
    
    
  	<div class="content">
    <h1>Nuevo Curso</h1>
    <p>
 

 
<?php 

	$id_curso=$_POST['newUser'];
	$nombre=$_POST['newCurse'];
	
	if ($id_curso=="" || $nombre=="")
	{
		echo "<script language='JavaScript'> 
                     alert('Por Favor Ingresar Datos'); 
                     window.location='administarCurso.php';
                     </script>"; 
	}
	else
	{
		include("../web-app/conexion.php");
	$link=Conectar();
        
	$sql= $link->query ("select max(id_curso) from curso ");
        $row = $sql->fetch_all(MYSQLI_ASSOC);
        //var_dump($row); die;
	//$row=mysql_fetch_array($sql);
	//$idmax=$row[0]+1;
        $idmax=($row[0]['max(id_curso)'])+1;
        // var_dump($idmax); die;
	$sql1= $link->query ("select * from curso where codigo=".$id_curso."");
        $row1=$sql1->num_rows;
        //var_dump($row1); die;
	
	if ($row1>0)
	{
		echo "<script language='JavaScript'> 
                     alert('La Ficha De Caracterizacion Ya Esta Creada'); 
                     window.location='administarCurso.php';
                     </script>"; 
	}
	else
	{
		echo "<script language='JavaScript'> 
                alert('Se Creo La Ficha: ".$id_curso." - ".$nombre."'); 
                window.location='administarCurso.php';
                </script>"; 
		$result = $link->query("INSERT INTO curso (id_curso, codigo, nombre) VALUES (".$idmax.",".$id_curso.",'".$nombre."')");
            
	}
    };		
?>
   	</p>
	</div>
 	 <?php 
        include("../web-app/footer.php");
     ?>

</div>
</body>

</body>
</html>


</body>
</html>