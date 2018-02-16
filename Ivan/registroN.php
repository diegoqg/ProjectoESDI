<?php
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "pethome";
	$tbl_name = "usuario";
	$mysqli = new mysqli($host_db, $user_db, $pass_db, $db_name);
	
	if($mysqli->connect_errno){
		echo "NO CONECTA!";
	}
	else{
		$Email = $_POST['email'];
		$pass = $_POST['password'];
		$name = $_POST['nombre'];
		$primerA = $_POST['apellido1'];
		$segundoA = $_POST['apellido2'];
		$idComunidad = $_POST['comunidades'];
		$telefono = $_POST['telefono'];
		$dir_subida = 'C:\\xampp\\htdocs\\proyecto\\images\\';
		$fichero_subido = $dir_subida . basename($_FILES['img_perfil']['name']);
		$iniQuery = "INSERT INTO usuario VALUES(NULL,'".$name."','".$primerA."',";
		$sql = "SELECT * FROM usuario WHERE email LIKE '".$Email."'";
		$result =  mysqli_query($mysqli, $sql);
		if ($result->num_rows == 0){	
			if ($segundoA!=null){
				$iniQuery = $iniQuery."'".$segundoA."',";
			}
			else{
				$iniQuery = $iniQuery."NULL,";
			}
			$iniQuery = $iniQuery."'".$Email."',".$idComunidad.",'".$telefono."',md5(".$pass.")";
			if ($_FILES['img_perfil']['name']!=null){
				echo '<pre>';
				if (move_uploaded_file($_FILES['img_perfil']['tmp_name'], $fichero_subido)) {
					$iniQuery = $iniQuery.",'".$dir_subida . basename($_FILES['img_perfil']['name'])."')";
				} 
				else {
					echo $iniQuery;
				}	
				print "</pre>";						
			}
			else{
				$iniQuery = $iniQuery.",NULL)";
			}
			echo $iniQuery;
			$mysqli->query($iniQuery);
		}
		else{
			echo "E-mail ya registrado";
		}
	}
?>