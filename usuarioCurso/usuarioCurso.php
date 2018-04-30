  	<?php 
	include("\..\web-app\header.php");
	include("\..\web-app\sidebar.php"); 
	
                  
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
	    
    
  	
    <h1>Insercion De Usuarios A Curso</h1>
    
<table align="center" border="0">
        <tr>
        	<td>
        	<fieldset width="200" height="50">
            <div class="alert alert-danger">
<form name="formul" action="Eliminarcurso.php" method="post">
<fieldset  width="10" height="10"> 
    <table border="0" align="left">
<tr>

<td align="center"><legend>Curso - Usuario</legend></td>
</tr>

<tr>
    <td>
    <input class="btn btn-danger" type="button" value="Crear/Eliminar" onclick="window.location='userCurse.php'"> 
    <input class="btn btn-danger" type="button" value="Consultar" onclick="window.location='consultarUsuario.php'">
    <input class="btn btn-danger" type="button" value="Cerrar" name="close" onclick="window.location='../curso/administarCurso.php'">
	</td>
</tr>
</table></fieldset>
</form>
</td></tr></div></table>
 	 <?php 
        include("\..\web-app/footer.php");
     ?>

</div>


