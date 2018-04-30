<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="..\web-app\default.css" rel="stylesheet" type="text/css" />
</head>

<body>
<body>



<script>
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

function cancelar (){
window.location='administarCurso.php';
	}
</script>
  	<?php 
	include("\..\web-app\header.php");
	include("\..\web-app\sidebar.php"); 
	?>
    
    
  	<h1>Eliminar Ficha De Caracterizacion</h1>
    <p>
<table align="center" border="0">
        <tr>
        	<td>
        	<fieldset width="200" height="50">
            <div class="alert alert-danger">
<form name="formul" action="delete.php" method="post">
<fieldset  width="10" height="10"> 
	<legend align="left">Ficha De Caracterizacion</legend>
    <table border="0" align="left">
<tr>
    <td>Esta Seguro De Eliminar El Curso?</td>
</tr>
<tr>
<td align="center">
<?php
$delete=$_POST['miSelect'];
echo "<input readonly type='text' name='curse'  style='text-align: center'  option value=".$delete.">";

?>
</td>
</tr>
<tr>
	<td colspan="2" align="center">
    <input class="btn btn-danger" type="submit" value="Aceptar" onclick="dimePropiedades()">
    <input class="btn btn-danger" type="button" value="Cancelar" onclick="cancelar ()">
    </td>
</table></fieldset>
</form>
   	</p>
</td></tr></div></table>
 	 <?php 
        include("\..\web-app/footer.php");
     ?>

</div>
</body>

</body>
</html>
