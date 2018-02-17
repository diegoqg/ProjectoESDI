<?php
//session_start();
	$servername = "localhost";
	$username = "root";
	$password = "1234";
	$dbname = "pethome";

	$conn = new mysqli($servername, $username, $password, $dbname);
						
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
						
	$conn->set_charset("utf8");

	$id = $_SESSION['id'];
	//echo "ID USUARIO = ".$_SESSION['id']."tipo SESION = ".$_SESSION['tipo'];
	if(strcmp($_SESSION['tipo'],"protectora")==0){
		$sql = "SELECT * FROM protectora WHERE idProtectora = ".$_SESSION['id'];
		//echo $sql."gogogogogo";
		$result =  mysqli_query($conn, $sql);
		if ($result->num_rows > 0){	
			$registro = $result->fetch_object();
			$img = $registro->imagen_protectora;
			echo "<div class=dropdown style=background-color:white;>
				   <button class=btn btn-secondary dropdown-toggle type=button id=dropdownMenu2 data-toggle=dropdown aria-haspopup=true aria-expanded=false>
    					<img src=".$img." class=imgRedonda>
    				</button>
    				<div class=dropdown-menu aria-labelledby=dropdownMenu2>
    				<button class=dropdown-item type=button><a href=mensajes.php style=color:#F88425;>Mensajes</a></button>
    				<button class=dropdown-item type=button><a tabindex=-1 href=protectora.php?id=".$_SESSION['id']." style=color:#F88425;>Ver perfil</a></button>
				    <button class=dropdown-item type=button><a href=# style=color:#F88425;>Editar perfil</a></button>
				    <button class=dropdown-item type=button><a href=sessionClose.php style=color:#F88425;>Cerrar seesion</a></button>
				  </div>
				</div>";
        }
	}
	if(strcmp($_SESSION['tipo'],"usuario")==0){
		$sql = "SELECT * FROM usuario WHERE idUsuario = ".$_SESSION['id'];
		$result =  mysqli_query($conn, $sql);
		if ($result->num_rows > 0){	
			$registro = $result->fetch_object();
			$img = $registro->imagen_protectora;
			echo "<div class=dropdown style=background-color:white;>
				   <button class=btn btn-secondary dropdown-toggle type=button id=dropdownMenu2 data-toggle=dropdown aria-haspopup=true aria-expanded=false>
    					<img src=".$img." class=imgRedonda>
    				</button>
    				<div class=dropdown-menu aria-labelledby=dropdownMenu2>
    				<button class=dropdown-item type=button><a href=mensajes.php style=color:#F88425;>Mensajes</a></button>
    				<button class=dropdown-item type=button><a tabindex=-1 href=protectora.php?id=".$_SESSION['id']." style=color:#F88425;>Ver perfil</a></button>
				    <button class=dropdown-item type=button><a href=# style=color:#F88425;>Editar perfil</a></button>
				    <button class=dropdown-item type=button><a href=sessionClose.php style=color:#F88425;>Cerrar seesion</a></button>
				  </div>
				</div>";
        }
	}
?>
