<?php

echo "<pre>";
var_dump($_FILES['imagen']);
echo "</pre>";
mkdir('imagenes');
if (isset($_FILES['imagen'])){
	
	$cantidad= count($_FILES["imagen"]["tmp_name"]);
	
	for ($i=0; $i<$cantidad; $i++){
	//Comprobamos si el fichero es una imagen
		if ($_FILES['imagen']['type'][$i]=='image/png' || $_FILES['imagen']['type'][$i]=='image/jpeg'){
		
			//Subimos el fichero al servidor
			echo "<pre>";
				var_dump($_FILES["imagen"]["tmp_name"][$i]);
			echo "</pre>";
			echo "<pre>";
				var_dump($_FILES["imagen"]["name"][$i]);
			echo "</pre>";
			move_uploaded_file($_FILES["imagen"]["tmp_name"][$i], 'imagenes/'.str_replace(' ', '', $_FILES["imagen"]["name"][$i]));
			$validar=true;
		}
		else $validar=false;
	
	}
}


if (isset($_FILES['imagen']) && $validar==true){
	for ($i=0; $i<$cantidad; $i++){
		echo "<h1>".$_FILES["imagen"]["name"][$i] ."</h1><img src=".'imagenes/'.str_replace(' ', '',$_FILES["imagen"]["name"][$i])." width='100'>";
	}
}


?>
