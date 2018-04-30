
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="..\web-app\default.css" rel="stylesheet" type="text/css" />
   <link href="/ACONSY/web-app/img/huella.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<script type="text/javascript">
function numero(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
    patron =/[A-Za-z\s]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
} 

function letra(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
    patron =/[0-9]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
} 
</script>
</head>

<body>

	<?php 
	include("\..\web-app\header.php");
	include("\..\web-app\sidebar.php"); 
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
      ?>
    
     
    
  	
    <h1>Administrador de Usuario</h1>
    <p>
<table border="0" align="center">
<tr><td><div class="alert alert-danger">
<form name="formul" action="activar.php" method="post">
<fieldset  width="10" height="10">     
    
    <table width="360">
    	<tr><th>
         <fieldset width="200" height="200">
            <legend align="left">BIENVENIDO: Buscar Usuario </legend>
                <form name="bya" action="administarUsuario_buscar.php" method="post">
                <table align="left" border="0">
                <tr>
                	<td>  C.C. Usuario  </td>
                    <td><input type="text" name="Cedula" onkeypress="return letra(event)"/></td>
                    <tr></tr>
                	<td align="left" colspan="2">
                    <input class="btn btn-danger" name="Buscar" type="submit" value="Buscar" />
                </table>
                </form>    
                                
          </fieldset>
          </th></tr>
    </table>

   	</p>
</td></tr></div></table>	
 
	 <?php 
	    include("\..\web-app/footer.php");
     ?>
     

</body>
</html>
