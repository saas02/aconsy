<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>ACONSY</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="web-app/default.css" rel="stylesheet">
        <link href="web-app/img/huella.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="http://www.sena.edu.co"><img src="/aconsy/web-app/img/logo_sena2.png" height="36" width="37" /></a><!--<b><font face="Lucida Console, Monaco, monospace">SENA</font></b>-->
                    <div class="nav-collapse collapse">
                        <p class="navbar-text pull-right">

                            <?php
                            session_start();                            
                            define('DIRURL', dirname(__FILE__));                            
                            if (isset($_SESSION['rol'])) {
                                echo "Sesi&oacute;n iniciada como <a href='/aconsy/web-app/datos.php' class='navbar-link'>" . $_SESSION['nombre'] . "</a>, <a href='/../sesion/cerrarSesion.php' >Cerrar Sesi&oacute;n </a></p>";
                            } else {
                                echo "<a href='/aconsy/sesion/iniciarSesion.php'> Iniciar Sesi&oacute;n </a></p>";
                            }
                            ?>
                        </p>
                        <ul class="nav">
                            <li class="active"><a href="/aconsy/index.php">Inicio</a></li>
                            <!---->
                            <li><a href="/aconsy/web-app/acerca.php"><i class="icon-flag icon-white"></i>  Acerca de...</a></li>
                            <li><a href="/aconsy/web-app/contactenos.php"><i class="icon-envelope icon-white"></i>  Cont&aacute;ctenos</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container-fluid"><!-- contenedor de la pagina -->
            <div class="row-fluid"><!-- contenedor columnas-->

