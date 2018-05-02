
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



        <h1><?php
            if ($_SESSION['rol'] == 1)
                echo "<h1 align='center'>Administracion de usuarios </h1>";
            else
                echo
                "<script language='JavaScript'> 
                       alert('Usuario No Autorizado'); 
                       window.location='index.php';
                       </script>";
            ?>

        </h1>

        <p>

<?php
$Cedula = $_POST["Cedula"];


include("\..\web-app\conexion.php");
$link = Conectar();

$consulta = $link->query("SELECT estado FROM usuario WHERE cedula ='" . $_POST["Cedula"] . "'");
$arregloconsulta = $consulta->fetch_all(MYSQLI_ASSOC);

if ($arregloconsulta[0]['estado'] == 0) {
    echo "<script language='JavaScript'> 
                    alert('El usuario selecionado esta inactivo'); 
					window.location='administarUsuario.php';
                    </script>";
} else if ($arregloconsulta[0]['estado'] == 1) {
    @$consulta1 = ("SELECT id_usuario,contrasena,cedula,cargo,nombres,primer_apellido,
					segundo_apellido,telefono,celular,extension,direccion,area,estado 
					FROM usuario where cedula='" . $_POST["Cedula"] . "' ");

    $resul = $link->query($consulta1);
    $registro3 = $resul->fetch_all(MYSQLI_ASSOC);
    $User_exist = count($registro3);

    if ($User_exist > 0) {

        echo "<script language='JavaScript'> 
							  </script>";
    } else {
        echo "<script language='JavaScript'> 
							alert('La cedula del usuario es incorrecta'); 
							window.location='administarUsuario.php';
							</script>";
    }
}
?>

            <table width="400" height="200" align="center">
                <tr><th>
                        <div class="alert alert-danger">
                            <fieldset width="200" >
                                <legend align="center">Datos del Usuario</legend>
                                <table align="left" border="0" width="390">

                                    <form name="Actualizar" action="administarUsuario_actualiza.php" method="post">

                                        <tr>
                                            <td align="left">Número de Cedula :</td>
                                            <td > <input name="Cedula" type="text" value="<?php echo $registro3[0]['cedula']; ?>" /></td></tr>
                                        <tr>
                                            <td align="left">Cargo :</td> 
                                            <td><input name="Cargo" type="text" value="<?php echo $registro3[0]['cargo']; ?>" /><br /></td></tr>
                                        <tr>
                                            <td align="left">Nombres :</td>
                                            <td><input name="Nombres" type="text" value ="<?php echo $registro3[0]['nombres']; ?>"/></td></tr>
                                        <tr>
                                            <td align="left">Primer Apellido :</td>
                                            <td><input name="Primer_Apellido" type="text" value="<?php echo $registro3[0]['primer_apellido']; ?>" /></td></tr>
                                        <tr>
                                            <td align="left">Segundo Apellido :</td>
                                            <td><input name="Segundo_Apellido" type="text" value="<?php echo $registro3[0]['segundo_apellido']; ?>"/><br /></td></tr>
                                        <tr>
                                            <td align="left">Telefono :</td> 
                                            <td><input name="Telefono" type="text" value="<?php echo $registro3[0]['telefono']; ?>"/><br /></td></tr>
                                        <tr>
                                            <td align="left">Celular :</td> 
                                            <td><input name="Celular" type="text" value="<?php echo $registro3[0]['celular']; ?>"/><br /></td></tr>
                                        <tr>
                                            <td align="left">Extension :</td> 
                                            <td><input name="Extension" type="text" value="<?php echo $registro3[0]['extension']; ?>"/><br /></td></tr>
                                        <tr>
                                            <td align="left">Dirección :</td> 
                                            <td><input name="Direccion" type="text" value="<?php echo $registro3[0]['direccion']; ?>"/><br /></td></tr>
                                        <tr>
                                            <td align="left">Área :</td>
                                            <td><input name="Area" type="text"value="<?php echo $registro3[0]['area']; ?>" /><br /></td></tr>
                                        <td align="left">Estado :</td> 
                                        <td><input name="Estado" type="text" value="<?php echo $registro3[0]['estado']; ?>"/><br /></td>
                                        </tr>

                                        <tr>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center"><input class="btn btn-danger" name="Actualiza"  type="submit" value="Actualizar usuario" /></td>                   
                                        </tr>
                                    </form>
                                </table>               
                            </fieldset>  

                    </th>
                </tr>
                </div>
            </table>

            </form>     

        </p>



<?php
include("\..\web-app/footer.php");
?>


    </body>
</html>

