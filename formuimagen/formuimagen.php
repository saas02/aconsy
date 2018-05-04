<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ACONSY</title>
        <link href="..\web-app\default.css" rel="stylesheet" type="text/css" />
        <link href="/ACONSY/web-app/img/huella.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
         <?php 
	include("../web-app/header.php");
	include("../web-app/sidebar.php"); 
	?>
    </head>
     <body>
        
  	<?php 
        
        if (isset($_SESSION['rol'])){
	if($_SESSION['rol']==1)
            echo "<h1></h1>";
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
        <div class="content">
                <h1>Formulario Imagenes</h1>
        <p>
	<?php
	include("../web-app/conexion.php");
	$link=Conectar();   
        ?>
   	</p>
	</div>
        <form name='formulario' method="post" action="cargaimagen.php" enctype="multipart/form-data">
            <table align="center" border="0">
                <tr>
                    <td>
                        <fieldset>
                            <div class='alert alert-danger'>
                                <legend align="center">Formulario Carga de Imagenes</legend> 
                                <table width="400" height="200" align="center">
                                    <tr>
                                        <th>
                                            <div class="alert alert-danger">
                                                <fieldset width="700" > 
                                                    
                                                    <table width="400" height="200" align="center">
                                                        <tr>
                                                            <td align="left">Fecha :</td>
                                                            <td>                                                                 
                                                                <div id="datetimepicker1" class="input-append date">
                                                                    <input readonly data-format="yyyy-MM-dd hh:mm:ss" id="fecha" name="fecha" type="text"></input>
                                                                    <span class="add-on">
                                                                      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                                                      </i>
                                                                    </span>
                                                                  </div>
                                                            </td></tr>
                                                        <tr>
                                                            <td align="left">Numero Ruta :</td>
                                                            <td><input name="ruta" type="text"  />
                                                            </td></tr>
                                                        <tr>
                                                            <td align="left">Nombre de la Ruta :</td>
                                                            <td><input name="nombre" type="text" onKeyup="verifletras(this)" onblur="verifletras(this)" />
                                                            </td></tr>                                                        
                                                        <tr>
                                                            <td align="left">Paradero (Cenefa) :</td>
                                                            <td><input name="cenefa" type="text"  />
                                                            </td></tr>
                                                        <tr>
                                                            <td align="left">Placas Vehiculo :</td>
                                                            <td><input name="placas" type="text"  />
                                                            </td></tr>
                                                        <tr>
                                                            <td align="left">Numero Interno :</td>
                                                            <td><input name="numinterno" type="text"  />
                                                            </td></tr>                                                        
                                                        <tr>
                                                        <td align="left">Vado : </td>
                                                        <td align="center">
                                                        <select name="vado">
                                                        <option value="vacio">--</option>
                                                        <option value="si">SI</option>
                                                        <option value="no">No</option>
                                                        </select></td></tr>
                                                        
                                                        <tr>
                                                        <td align="left">Zona Firme Elevada y Accesible : </td>
                                                        <td align="center">
                                                        <select name="zona">
                                                        <option value="vacio">--</option>
                                                        <option value="si">SI</option>
                                                        <option value="no">No</option>
                                                        </select></td></tr>
                                                        <tr>
                                                        <td align="left">Estado Señal: </td>
                                                        <td align="center">
                                                        <select name="senal">
                                                        <option value="vacio">--</option>
                                                        <option value="bueno">Bueno</option>
                                                        <option value="regular">Regular</option>
                                                        <option value="malo">Malo</option>                                                        
                                                        </select></td></tr>
                                                        <tr>
                                                        <td align="left">Módulo Braile: </td>
                                                        <td align="center">
                                                        <select name="braile">
                                                        <option value="vacio">--</option>
                                                        <option value="bueno">Bueno</option>
                                                        <option value="regular">Regular</option>
                                                        <option value="malo">Malo</option>                                                        
                                                        </select></td></tr> 
                                                        <tr>
                                                        <td align="left">Estado Bandera: </td>
                                                        <td align="center">
                                                        <select name="bandera">
                                                        <option value="vacio">--</option>
                                                        <option value="bueno">Bueno</option>
                                                        <option value="regular">Regular</option>
                                                        <option value="malo">Malo</option>                                                        
                                                        </select></td></tr>
                                                       
                                                        <tr>
                                                        <td align="left" for="imagen">Imagen:</td>
                                                        <td><input type="file" name="imagen[]" value="" multiple></td><tr>                                                        
                                                        </tr></tr>
                                                        <tr>
                                                        <td colspan="2" align="center"><input class="btn btn-danger" name="insertar" type="submit" value="Guardar" /> 
                                                        </td>
                                                        </tr>                                                         
                                                    </table>
                                                </fieldset>
                                        </th>
                                    </tr>
                                        </div>
                                </table>
                            </div> 
                                
                        </fieldset>
                   </td>
                </tr>
            </table>
        </form> 
    </body>
</html>
