
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACONSY</title>
<link href="../web-app/default.css" rel="stylesheet" type="text/css" />
   <link href="/ACONSY/web-app/img/huella.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />

</head>

<body onLoad="MM_preloadImages('images/Bt_InicioNueva.jpg','images/Bt_QuienesSomosNueva.jpg','images/Bt_FacsNueva.jpg','images/Bt_ContactenosNueva.jpg')">
<?php 
include("../web-app/header.php");
include("../web-app/sidebar.php"); 
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#CCCCCC">
    <tr>
	<td colspan="2"><img src="/aconsy/web-app/img/uneseforem.JPG" height="400" width="800" ></td>
	</tr>
	<tr>
	</tr>
		<tr>
		<th align="left" colspan="2">Cont&aacute;ctenos:<br><br></th>
		</tr>
			<tr>
			<th colspan="2"align="center">Lo invitamos a comentarnos sus sugerencias e inquietudes con respecto a ACONSY.<br><br></th>
			</tr>
                <tr>
                <th width="135" align="left">Nombre:</th>
                <td width="293"><input name="nombre" type="text" id="nombre" style="width:395px;" ></td>
                </tr>
					<tr>
					<th width="135"align="left">Empresa:</th>
					<td width="293"><input name="nombre" type="text" id="nombre" style="width:395px;" ></td>
					</tr>
						<tr>
						<th width="135"align="left">&Aacute;rea:</th>
						<td width="293"><input name="nombre" type="text" id="nombre" style="width:395px;" /></td>
						</tr>
							<tr>
							<th width="135"align="left">Cargo:</th>
							<td width="293"><input name="nombre" type="text" id="nombre" style="width:395px;" ></td>
							</tr>
								<tr>
								<th width="135"align="left">Tel&eacute;fono y Extensi&oacute;n:</th>
								<td width="293"><input name="nombre" type="text" id="nombre" style="width:395px;" ></td>
								</tr>
									<tr>
									<th width="195"align="left">Correo Electr&oacute;nico:</th>
									<td width="293"><input name="nombre" type="text" id="nombre" style="width:395px;" ></td>
									</tr>
										<tr>
										<th height="25" align="left">Comentarios:</th>
										<td><textarea name="comentarios" rows="8" class="input_form" id="comentarios" style="width:395px;"></textarea></td>
										</tr>
										<tr>
										<td colspan="2" align="center"><input name="button"  type="submit" class="btn btn-danger btn-large" id="button" value=":: Enviar ::" /></td>
										</tr>
                            
                        
</table>
<?php 
include("../web-app/footer.php");
?>
</body>
</html>
