<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="..\web-app\default.css" rel="stylesheet" type="text/css" />
   <link href="/ACONSY/web-app/img/huella.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
</head>

<SCRIPT LANGUAGE="JavaScript">

function dimePropiedades(){
	var texto = "";
	//texto = "El numero de opciones del select: " + document.formul.miSelect.length
	var indice = document.formul.miSelect.selectedIndex
	//texto += "\nIndice de la opcion escogida: " + indice
	var valor = document.formul.miSelect.options[indice].value
	//texto += "\nCurso Escogido: " + valor
	var textoEscogido = document.formul.miSelect.options[indice].text
	texto += "\nCurso Escogido: " + textoEscogido
	alert(texto)
}

function Eliminar()
{ 
var conf = confirm("¿Está seguro de Eliminar?")
	if (conf == true)
	{
	dimePropiedades();
	window.location='EliminarCurso.php';
	}
	else
	{
	window.location='administarCurso.php';
	}
}
	function Nuevo(){ 
	if (confirm("¿Está seguro de Agregar Nuevo Curso?"))
	{
	window.location='nuevocurso.php';
	}
	else
	window.location='administarCurso.php';
	}

		function Modificar()
		{ 
		window.location='Modificar.php';
		}

</SCRIPT>


<body>

  	<?php 
	include("\..\web-app\header.php");
	include("\..\web-app\sidebar.php"); 
	?>
    
    
  	<h1>Administracion De Cursos</h1>
    <p>
<table border="0" align="center">
<tr><td><div class="alert alert-danger">
<form name="formul" action="Eliminarcurso.php" method="post">
<fieldset  width="10" height="10"> 
	<table border="0" align="left">
<tr>
	<td>
    <legend>Ficha De Caracterización</legend>
<select name="miSelect" style="width:450px" align="center">

<?php 
       
    if (isset($_SESSION['rol'])){
        if($_SESSION['rol']==1)
            echo "Buscar Usuario";
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
?>


<?php

include("\..\web-app\conexion.php");
$link=Conectar();   
$result = $link-> query("SELECT * FROM curso");
$arregloconsulta = $result->fetch_all(MYSQLI_ASSOC);

foreach ($arregloconsulta as $key => $arreglo){
        
    echo "<option value=".$arreglo["codigo"].">".$arreglo["codigo"].' - '.$arreglo["nombre"]."</option>";
}

?>
</select>
</td>
</tr>
<tr>
	<td colspan="2" align="left">
    <input class="btn btn-danger" type="button" value="Nuevo" onclick="Nuevo ()"> 
    <input class="btn btn-danger" type="button" value="Modificar" onclick="Modificar()">
    <input class="btn btn-danger" type="submit" value="Eliminar">
    <input class="btn btn-danger" type="button" value="Cerrar" name="close" onclick="window.location='../index.php'">
    </td>
</tr>
</table></fieldset>
</form>
   	</p>
	
	</td></tr></div></table>
 	 <?php 
        include("\..\web-app/footer.php");
     ?>

</div>
</body>
</html>

