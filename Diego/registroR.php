<?php
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "pethome";
	$tbl_name = "protectora";
	$mysqli = new mysqli($host_db, $user_db, $pass_db, $db_name);
	
	if($mysqli->connect_errno){
		echo "NO CONECTA!";
	}
	else{
		$Email = $_POST['email'];
		$pass = $_POST['password'];
		$name = $_POST['nombre'];
		$nif = $_POST['NIF'];
		$direccion = $_POST['direccion'];
		$idComunidad = $_POST['comunidades'];
		$telefono = $_POST['telefono'];
		$name_C = $_POST['name_contacto'];
		$apellido_C = $_POST['apellido_contacto'];
		$dir_subida = 'images\\';
		$img_P = $dir_subida . basename($_FILES['img_perfil']['name']);
		$img_C = $dir_subida . basename($_FILES['img_contacto']['name']);
		$iniQuery = "INSERT INTO protectora VALUES(NULL,'".$name."','".$Email."','".$nif."',".$idComunidad.",'".$direccion."','".$telefono."',md5(".$pass.")";
		$sql = "SELECT * FROM protectora WHERE email LIKE '".$Email."' AND NIF='".$nif"'";
		$result =  mysqli_query($mysqli, $sql);
		if ($result->num_rows == 0){	
			if ($_FILES['img_perfil']['name']!=null){
				echo '<pre>';
				if (move_uploaded_file($_FILES['img_perfil']['tmp_name'], $img_P)) {
					$iniQuery = $iniQuery.",'".$dir_subida . basename($_FILES['img_perfil']['name'])."','".$name_C."','".$apellido_C."','";
				} 
				else {
					echo $iniQuery;
				}
				if (move_uploaded_file($_FILES['img_contacto']['tmp_name'], $img_C)) {
					$iniQuery = $iniQuery.$dir_subida . basename($_FILES['img_contacto']['name'])."')";
				}
				else{
					echo $iniQuery;
				}
				print "</pre>";						
			}
			else{
				$iniQuery = $iniQuery.",NULL)";
			}
			echo $iniQuery;
			if ($mysqli->query($iniQuery)){
				echo "INSERT";
			}
			else{
				echo "NO INSERT";
			}
		}
		else{
			echo "E-mail o NIF ya registrado";
		}
	}
?>