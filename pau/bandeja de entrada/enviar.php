<?php
	if(isset($_POST["nombrePerro"],$_POST["idvis"],$_POST["mensaje"])){
		if($_POST["nombrePerro"]&&$_POST["idvis"]&&$_POST["mensaje"]){
			session_start();
			$id = $_SESSION['id'];
			$tipo = $_SESSION['tipo'];
			$propietario=0;
			$idMascota=0;
			
			if($tipo=="usuario")
				$propietario=1;
			if($tipo=="protectora")
				$propietario=2;
			
			
			$servername = "localhost";
			$username = "root";
			$password = "1234";
			$dbname = "pethome";

			$conn = new mysqli($servername, $username, $password, $dbname);
								
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
								
			$conn->set_charset("utf8");
			
			$sql = "SELECT * FROM mascota";
			$result = mysqli_query($conn, $sql);
			while ($line = mysqli_fetch_array($result)) {
				if($_POST["nombrePerro"]==$line["nombre"])
					$idMascota=$line["idMascota"];
			}
			
			$insertsql = "INSERT INTO mensajeria(idUsuario,idProtectora,propietario,idMascota,mensaje,fecha) VALUES (".$id.",".$_POST["idvis"].",".$propietario.",".$idMascota.",'".$_POST["mensaje"]."',SYSDATE())";
			
			if (mysqli_query($conn, $insertsql)) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $insertsql . "<br>" . mysqli_error($conn);
			}
			$conn->close();
			
		}
		
	}
		
?>