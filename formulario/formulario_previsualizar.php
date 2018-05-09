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
        <script>
            $( function() {
                $('#datetimepicker1').datetimepicker({
                    language: 'en'
                });
                
                
                $('.update').click(function(){
                    var dataname = $(this).data('name');
                    $('[name="'+dataname+'"]').attr('readonly', false);
                    if($(this).data('select')){                        
                        if($('#'+dataname).val().length > 2){
                            $('[name="'+dataname+'"]').empty();
                            $('[name="'+dataname+'"]').append('<option value="bueno">Bueno</option><option value="regular">Regular</option><option value="malo">Malo</option>');
                        }else{
                            $('[name="'+dataname+'"]').empty();
                            $('[name="'+dataname+'"]').append('<option value="si">Si</option><option value="no">No</option>');
                        }
                    }
                });
                
            } );
            
            function verifletras(n){
                permitidos=/[^A-z. .ñ.]/;
                if(permitidos.test(n.value)){
                    alert("Solo Se Pueden Ingresar Letras");
                    n.value="";
                    n.focus();
                }
            }

            function verifnumeros(n){
                permitidos=/[^0-9.]/;
                if(permitidos.test(n.value)){
                    alert("Solo Se Pueden Ingresar Numeros");
                    n.value="";
                    n.focus();
                }
            }
            
        </script>
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
        
	include("../web-app/conexion.php");
	$link=Conectar();         
	$cc_usu=$_SESSION['cedula'];
                 
	$Sql="select id_usuario from usuario where cedula = ".$cc_usu."";
	$result=$link->query($Sql);
	$id_usu = $result->fetch_all(MYSQLI_ASSOC);
        if(empty($_POST['ruta'])){            
            echo
                "<script language='JavaScript'> 
                       alert('Ingrese los datos en el formulario'); 
                       window.location='../index.php';
                       </script>";
            
        }
        if($result->num_rows > 0){
            
            date_default_timezone_set("America/Bogota" ) ; 		            
            $fecha = $_POST['fecha'];
            $idUsuario = $id_usu[0]['id_usuario'];
            $ruta = $_POST['ruta'];
            $nombreRuta = $_POST['nombre'];
            $cenefa = $_POST['cenefa'];
            $vado = $_POST['vado'];
            $zona = $_POST['zona'];
            $senal = $_POST['senal'];
            $braile = $_POST['braile'];
            $bandera = $_POST['bandera'];
            $consulta = "INSERT INTO formulario (
                        id_usuario ,
                        fecha ,
                        ruta ,
                        nombre_ruta ,
                        cenefa ,
                        vado ,
                        zona ,
                        senal ,
                        braile ,
                        bandera
                        )
                        VALUES (".$idUsuario.",'".$fecha."','".$ruta."','".$nombreRuta."','".$cenefa."',
                        '".$vado."','".$zona."','".$senal."','".$braile."','".$bandera."')";
            
            $insertar=$link->query($consulta);
            
            $newId= mysqli_insert_id($link);
           // echo "El último registro insertado tiene el id %d\n", mysqli_insert_id($link);

            if(isset($insertar)){
                 echo
                "<script language='JavaScript'> 
                       alert('Registro efecutado correctamente'); 
                      
                       </script>";
                 
            $Sql2 = "select * from formulario where id_formulario =".$newId."";            
            $result2 = $link->query($Sql2);            
            $id_usu2 = $result2->fetch_all(MYSQLI_ASSOC);
            //var_dump($id_usu2);
            }

         
            
            else{
                 echo
                "<script language='JavaScript'> 
                    alert('Ocurrio Un error al registrar'); 
                    window.location='formulario.php';
                </script>";
            }
					
        }else{
            echo
                "<script language='JavaScript'> 
                       alert('Usuario No Autorizado para efectuar registros'); 
                       window.location='index.php';
                       </script>";
        }        

        ?>
        <div class="content">
                <h1>Formulario</h1>
        <p>

   	</p>
	</div>
        <form name='formulario' method="post" action="insertardatos.php">
            <table align="center" border="0">
                <tr>
                    <td>
                        <fieldset>
                            <div class='alert alert-danger'>
                                <legend align="center">Crear Formulario</legend> 
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
                                                                    <input readonly value="<?php echo $id_usu2[0]['fecha'] ?>" data-format="yyyy-MM-dd hh:mm:ss" id="fecha" name="fecha" type="text"></input>
                                                                    <span class="add-on">
                                                                      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                                                      </i>
                                                                    </span>
                                                                  </div>
                                                            </td></tr>
                                                        <tr>
                                                            <td align="left">Numero Ruta :</td>
                                                            <td>                                                                
                                                                <input readonly value="<?php echo $id_usu2[0]['ruta'] ?>"  name="ruta" type="text"  />
                                                                <span class="icon-remove update" data-name="ruta"></span>
                                                            </td>                                                            
                                                        </tr>
                                                        <tr>
                                                            <td align="left">Nombre de la Ruta :</td>
                                                            <td><input readonly value="<?php echo $id_usu2[0]['nombre_ruta'] ?>"  name="nombre" type="text" onKeyup="verifletras(this)" onblur="verifletras(this)" />
                                                                <span class="icon-remove update" data-name="nombre"></span>
                                                            </td>
                                                        </tr>                                                        
                                                        <tr>
                                                            <td align="left">Paradero (Cenefa) :</td>
                                                            <td><input readonly value="<?php echo $id_usu2[0]['cenefa'] ?>" name="cenefa" type="text"  />
                                                                <span class="icon-remove update" data-name="cenefa"></span>
                                                            </td></tr>
                                                        <tr>
                                                        <td align="left">Vado : </td>
                                                        <td align="center">
                                                        <select readonly name="vado" id="vado">                                                        
                                                        <option value="<?php echo $id_usu2[0]['vado'] ?>"><?php echo $id_usu2[0]['vado'] ?></option>                                                        
                                                        </select>
                                                        <span class="icon-remove update" data-name="vado" data-select="true"></span>
                                                        </td></tr>
                                                        
                                                        <tr>
                                                        <td align="left">Zona Firme Elevada y Accesible : </td>
                                                        <td align="center">
                                                        <select readonly name="zona" id="zona">
                                                        <!--<option value="vacio">--</option>-->
                                                        <option value="<?php echo $id_usu2[0]['zona'] ?>"><?php echo $id_usu2[0]['zona'] ?></option>
                                                        <!--<option value="no">No</option>-->
                                                        </select>
                                                        <span class="icon-remove update" data-name="zona" data-select="true"></span>
                                                        </td></tr>
                                                        <tr>
                                                        <td align="left">Estado Señal: </td>
                                                        <td align="center">
                                                        <select readonly  id="senal" name="senal">
                                                        <!--<option value="vacio">--</option>-->
                                                        <option value="<?php echo $id_usu2[0]['senal'] ?>"><?php echo $id_usu2[0]['senal'] ?></option>
                                                        <!--<option value="regular">Regular</option>-->
                                                        <!--<option value="malo">Malo</option>-->
                                                        </select>
                                                        <span class="icon-remove update" data-name="senal" data-select="true"></span>
                                                        </td></tr>
                                                        <tr>
                                                        <td align="left">Módulo Braile: </td>
                                                        <td align="center">
                                                        <select readonly name="braile" id="braile">
                                                        <!--<option value="vacio">--</option>-->
                                                        <option value="<?php echo $id_usu2[0]['braile'] ?>"><?php echo $id_usu2[0]['braile'] ?></option>
                                                        <!--<option value="regular">Regular</option>-->
                                                        <!--<option value="malo">Malo</option>-->
                                                        </select>
                                                        <span class="icon-remove update" data-name="braile" data-select="true"></span>
                                                        </td></tr> 
                                                        <tr>
                                                        <td align="left">Estado Bandera: </td>
                                                        <td align="center">
                                                        <select readonly name="bandera" id="bandera">
                                                        <!--<option value="vacio">--</option>-->
                                                        <option value="<?php echo $id_usu2[0]['bandera'] ?>"><?php echo $id_usu2[0]['bandera'] ?></option>
                                                        <!--<option value="regular">Regular</option>-->
                                                        <!--<option value="malo">Malo</option>-->
                                                        </select>
                                                        <span class="icon-remove update" data-name="bandera" data-select="true"></span>
                                                        </td></tr>
                                                        <tr>
                                                        <td colspan="2" align="center"><input class="btn btn-danger" name="insertar" type="submit" value="Guardar" /> 
                                                        </td>
                                                        </tr>    
                                                        <input name="idform" type="hidden" value="<?= $newId ?>" />
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




