<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pethome";

	$conn = new mysqli($servername, $username, $password, $dbname);
						
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
						
	$conn->set_charset("utf8");

	$id = $_SESSION['id'];
	if(strcmp($_SESSION['tipo'],"protectora")==0){
		$sql = "SELECT * FROM protectora WHERE idProtectora = ".$id;
		$result =  mysqli_query($con, $sql);
		if ($result->num_rows > 0){	
			$registro = $result->fetch_object();
			$img = $registro->imagen_protectora;
			echo "<li class=dropdown-submenu>
                <a tabindex=-1 href=><img src=".$img." class=imgRedonda></a>
                <ul class=dropdown-menu>
                    <li><a tabindex=-1 href=#>Ver perfil</a></li>
                    <li><a href=#>Editar perfil</a></li>
                    <li><a href=sessionClose.php>Cerrar seesion</a></li>
                </ul>
            </li>";
        }
	}
	if(strcmp($_SESSION['tipo'],"usuario")==0){
		$sql = "SELECT * FROM usuario WHERE idUsuario = ".$id;
		$result =  mysqli_query($con, $sql);
		if ($result->num_rows > 0){	
			$registro = $result->fetch_object();
			$img = $registro->imagen_protectora;
			echo "<li class=dropdown-submenu>
                <a tabindex=-1 href=><img src=".$img." class=imgRedonda></a>
                <ul class=dropdown-menu>
                    <li><a tabindex=-1 href=#>Ver/Editar perfil</a></li>
                    <li><a href=sessionClose.php>Cerrar seesion</a></li>
                </ul>
            </li>";
        }
	}
?>
