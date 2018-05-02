<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ACONSY</title>
        <link href="..\web-app\default.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <?php
        include("\..\web-app\header.php");
        include("\..\web-app\sidebar.php");
        ?>

        <?php
        if (isset($_SESSION['rol'])) {
            if ($_SESSION['rol'] == 1)
                echo "";
            else
                echo
                "<script language='JavaScript'> 
                      alert('Usuario No Autorizado'); 
                      window.location='../index.php';
                      </script>";
        }else {
            echo
            "<script language='JavaScript'> 
                                  alert('Usuario No Autorizado'); 
                                  window.location='../index.php';
                                  </script>";
        }
        ?>


        <h1 align="center">Administrador de Usuario</h1>
        <p>


            <table width="360" align="center">
                <tr><th>
                        <div class="alert alert-danger">
                            <fieldset  width="500" height="200">

                                <legend align="center">BIENVENIDO </legend>
                                <form name="bya" action="administarUsuario_buscar.php" method="post">
                                    <table align="center" border="0">
                                        <tr>
                                            <td>  C.C. Usuario  </td>
                                            <td><input type="text" name="Cedula" /></td>
                                            <tr></tr>
                                            <td align="center" colspan="3">
                                                <input class="btn btn-danger" name="Buscar" type="submit" value="Buscar" />
                                                <input class="btn btn-danger" name="crear" type="button" value="Crear" onclick="window.location = 'administarUsuario_crea.php'" />
                                                <input class="btn btn-danger" name="activar" type="button" value="Activar" onclick="window.location = 'administarUsuario_activar.php'" />
                                                <input class="btn btn-danger" name="eliminar" type="button" value="Desactivar" onclick="window.location = 'administarUsuario_eliminar.php'" /></td>
                                    </table>
                                </form>    

                            </fieldset>
                    </th></tr></tr>
                </div>
            </table>

<?php
include("\..\web-app\conexion.php");
$link = Conectar();
?>


        </p>


<?php
include("\..\web-app/footer.php");
?>
    </body>
</html>
