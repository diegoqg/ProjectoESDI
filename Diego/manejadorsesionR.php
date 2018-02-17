<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "1234";
$db_name = "pethome";
$tbl_name = "usuario";
$mysqli = new mysqli($host_db, $user_db, $pass_db, $db_name);

if($mysqli->connect_errno){
	echo "NO CONECTA!";
}
else{
	if (isset($_POST['submit'])){
		if ((isset($_POST['usuarioR'])) && (isset($_POST['passwordR']))){
			$name = $_POST['usuarioR'];
			$pass = $_POST['passwordR'];
			$sql = "SELECT idProtectora,contraseña FROM protectora WHERE email = '".$name."'";
			
			$mysqli->set_charset("utf8");
			
			$result =  mysqli_query($mysqli, $sql);
			if ($result->num_rows > 0){	
				$registro = $result->fetch_object();
				$passBD = $registro->contraseña;
				$ids = $registro->idProtectora;
				if ((md5($pass)) == $passBD) { 
					session_start();
					$_SESSION['login'] = true;
					$_SESSION['id'] = $ids;
					$_SESSION['e-mail'] = $name;
					$_SESSION['tipo'] = "protectora";								
					header('Location: index.php');
				}
				else{					
					header('Location: index.php#loginE');			
				}
			}
			else{
				header('Location: index.php#loginE');	
			}						
		}
		else{
			header('Location: index.php#loginE');	
		}
	}else{
		header('Location: index.php#loginE');	
	}
}
?>