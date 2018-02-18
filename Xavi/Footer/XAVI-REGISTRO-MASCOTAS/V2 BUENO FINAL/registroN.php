<?php
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "pethome";
	$tbl_name = "mascota";
	$mysqli = new mysqli($host_db, $user_db, $pass_db, $db_name);
	
	if($mysqli->connect_errno){
		echo "NO CONECTA!";
	}
	else{
		$name = $_POST['nombre'];
		$edat = $_POST['edat'];
		$unidadEdat = $_POST['unidadEdat'];
		$tipo = $_POST['tipo'];
		$raza = $_POST['raza'];
		$tamaño = $_POST['tamaño'];
		$sexo = $_POST['sexo'];
		$castrado = $_POST['castradro'];
		$urgente = $_POST['urgente'];
		$descripcion = $_POST['descripcion'];
		
		$dir_subida = 'images\\';
		$fichero_subido1 = $dir_subida . basename($_FILES['imagen1']['name']);/* CAMBIO EL NAME??*/
		$fichero_subido2 = $dir_subida . basename($_FILES['imagen2']['name']);

		/* SELECCIONA IDPROTECTORA ACTUAL AL HACER EL INSERT*/
		/*$idProtectora = "SELECT idProtectora FROM protectora WHERE "*/
		
		$segundoA = $_POST['apellido2'];
		$idComunidad = $_POST['comunidades'];
		$telefono = $_POST['telefono'];
		
		$fichero_subido = $dir_subida . basename($_FILES['img_perfil']['name']);
		
		$iniQuery = "INSERT INTO mascota VALUES(NULL,'".$tipo."','".$name."','".$raza."','".$edat."','".$unidadEdat."','".$tamaño."','".$sexo."','".$castrado."','".$urgente."','".$idProtectora."','".$descripcion."',";
		/* HE QUITADO LA COMPROBACIÓN DE SI YA EXISTE PORQUE NO DEBERIAMOS COMPROBARLO YO CREO*/
		
		if ($_FILES['imagen1']['name']!=null && $_FILES['imagen2']['name']!=null){
			echo '<pre>';
			if (move_uploaded_file($_FILES['imagen1']['tmp_name'], $fichero_subido1) && move_uploaded_file($_FILES['img_perfil2']['tmp_name'], $fichero_subido2)) {
				$iniQuery = $iniQuery.",'".$dir_subida . basename($_FILES['imagen1']['name'])."','".$dir_subida . basename($_FILES['imagen2']['name'])."')";
			} 
			else {
				echo $iniQuery;
			}	
			print "</pre>";						
		}
		else{
			$iniQuery = $iniQuery.",NULL, NULL)";/* 2 NULLS PARA LAS 2 IMAGENES*/
		}
		echo $iniQuery;
		$mysqli->query($iniQuery);	
	}
?>