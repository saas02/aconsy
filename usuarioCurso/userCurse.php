<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ACONSY</title>
        <link href="../web-app/default.css" rel="stylesheet" type="text/css" />
    </head>
    <script>
        function Eliminar() {
            if (confirm("¿Desea Eliminar El Usuario Del Curso?"))
            {
                window.location = 'eliminaruser.php';
            }
            else
                window.location = 'userCurse.php';
        }
        function letra(e) { // 1
            tecla = (document.all) ? e.keyCode : e.which; // 2
            if (tecla == 8)
                return true; // 3
            patron = /[0-9]/; // 4
            te = String.fromCharCode(tecla); // 5
            return patron.test(te); // 6
        }
    </script>
    <body>


        <?php
        include("../web-app/header.php");
        include("../web-app/sidebar.php");
        ?>



        <h1>Adicionar Usuario A Curso</h1>
        <p>
            <table align="center" border="0">
                <tr>
                    <td>
                        <fieldset width="200" height="50">
                            <div class="alert alert-danger">
                                <form name="formul" method="POST">
                                    <fieldset  width="10" height="10"> 
                                        <table border="0" align="left">
                                            <tr>
                                                <td>Curso</td>
                                            </tr>	
                                            <tr>
                                                <td>	

                                                    <select name="miSelect" style="width:450px" align="center">
                                                        <?php
                                                        include("../web-app/conexion.php");
                                                        $link = Conectar();
                                                        $result = $link->query("SELECT * FROM curso");
                                                        $rows = $result->fetch_all(MYSQLI_ASSOC);
                                                        
                                                        foreach($rows as $row){
                                                            echo "<option value=" . $row["id_curso"] . " style='width:150px'>" . $row["codigo"] . ' - ' . $row["nombre"] . "</option>";
                                                            $_SESSION['codigo'] = $row["codigo"];
                                                        }                                                        

                                                        //echo $row["codigo"];
                                                        
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Documento De Identidad
                                                </td>
                                                <tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="usuario" size="30" onkeypress="return letra(event)">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center">
                                                            <input class="btn btn-danger" type="submit" value="Guardar" onclick="this.form.action = 'guardarcursouser.php'"> 
                                                            <input class="btn btn-danger" type="submit" value="Eliminar" onclick="this.form.action = 'eliminaruser.php'">
                                                            <input class="btn btn-danger" type="reset" value="Limpiar">
                                                            <input class="btn btn-danger" type="button" value="Atras" onclick="window.location = 'usuarioCurso.php'">
                                                                            </td>
                                                                            </tr>
                                                                            </table>
                                                                            </form>
                                                                            </td>
                                                                            </tr>
                                                                            </div>
                                                                            </table>
                                                                            <?php
                                                                            include("../web-app/footer.php");
                                                                            ?>

                                                                            </div>
                                                                            </body>
                                                                            </html>