

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- Le fav and touch icons
<link rel="shortcut icon" href="web-app/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="web-app/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="web-app/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="web-app/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="web-app/ico/apple-touch-icon-57-precomposed.png"> -->


<?php
include("web-app/header.php");
include(DIRURL . "web-app/sidebar.php");
?>

<div class="hero-unit">
    <h1>ACONSY</h1>
    <p>"Acces Control System" - ACONSY, en un sistema web para el control y gestión de ingresos de personal en instituciones que necesiten llevar un control de usuarios y elementos que son ingresados en sus instalaciones. </p>
    <p><a class="btn btn-danger btn-large" href='sesion/iniciarSesion.php' >Iniciar Sesi&oacute;n &raquo;</a></p>
</div>

<div class="downPage">
    <div class="row-fluid">
        <div class="span4">
            <h2>Ingresos</h2>
            <p>Este servicio permite al sistema hacer registros automáticos de ingreso y salida de personas a la institución, mediante un lector de códigos de barras o biométrico, dependiendo de las necesidades y recursos proporcionados.</p>
            <p><a class="btn btn-inverse" href="/aconsy/ingreso/ingresoAutomatico.php">Continuar &raquo;</a></p>
        </div><!--/span-->
        <div class="span4">
            <h2>Elementos</h2>
            <p>El registro de elementos a la institución es una de las principales características de ACONSY. A través del número de identificación del usuario o de codigos de barras especificos para cada elemento, se llevara un registro de elementos dentro de la organización.</p>
            <p><a class="btn btn-inverse" href="/aconsy/elemento/registrarElementos.php">Continuar &raquo;</a></p>
        </div><!--/span-->
        <div class="span4">
            <h2>Vehiculos</h2>
            <p>El sistema muestra y registra los datos de los vehículos que ingresen a la institución pertenecientes a un usuario, o cambiar uno ya existente, asignando un garaje según la jornada y la disponibilidad de la organización.</p>
            <p><a class="btn btn-inverse" href="/aconsy/vehiculo/registrarVehiculos.php">Continuar &raquo;</a></p>
        </div><!--/span-->
    </div><!--/row-->


    <div class="row-fluid">
        <div class="span4">
            <h2>Garajes</h2>
            <p>Permite asignar nuevos garajes según nuevos espacios que brinde la institución o espacios que no se encuentren registrados, también se puede ver la disponibilidad que tiene cada garaje en un horario determinado.</p>
            <p><a class="btn btn-inverse" href="/aconsy/garaje/asignarGaraje.php">Continuar &raquo;</a></p>
        </div><!--/span-->
        <div class="span4">
            <h2>Reportes</h2>
            <p> Los Reportes del Sistema ACONSY permiten brindar una serie de consultas y reportes de control que son de gran ayuda para la administración de los usuarios. Pueden ser filtrados por rango de fechas facilitando la selección del período.</p>
            <p><a class="btn btn-inverse" href="/aconsy/reportes/generarReportes.php">Continuar &raquo;</a></p>
        </div><!--/span-->
        <div class="span4">
            <h2>Visitantes</h2>
            <p>Desde este servicio se deben registrar todas aquellas personas que ingresen a la institución, permitiendo tener un registro de la hora de entrada y de salida de estas personas, brindando control y seguridad del personal.</p>
            <p><a class="btn btn-inverse" href="/aconsy/usuario/registrarVisitantes.php">Continuar &raquo;</a></p>
        </div><!--/span-->
    </div><!--/row-->
</div>

<?php
include(DIRURL . "web-app/footer.php");
?>
</body>
</html>