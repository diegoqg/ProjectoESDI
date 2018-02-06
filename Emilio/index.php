<!DOCTYPE html>
<html lang="es">
	<head>
	
		<meta charset="UTF-8">
		<meta name="descripció" content="Adopción de mascotas">
		<meta name="author" content="Pet Home">
		<meta http-equiv="Content-Type" content="text/html">
		<title>Pet Home</title>
		
		<link rel="stylesheet" href="css/index.css">
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="js/index.js"></script>
	</head>
	<body>
		<header>
			<img src="img/header.jpg" alt="header">
		</header>
		<h1 id="titulo">PET HOME</h1>
		<nav class="menu">
			<ul>
				<li>
					<img src="img/logo.png" alt="logo" id="logo">
				</li>
				<li>
					<form action="/busqueda.php" method="get">
						<input type="text" placeholder="Ubicación">
						<select name="Especie">
							<option value="default" selected>Espécie</option>
							<option value="perro">Perro</option>
							<option value="gato">Gato</option>
							<option value="ave">Ave</option>
						</select>
						<select name="Raza">
							<option value="default" selected disabled hidden>Raza</option>
							<?php
							$servername = "localhost";
							$username = "root";
							$password = "1234";
							$dbname = "pethome";

							$conn = new mysqli($servername, $username, $password, $dbname);
							
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}
							
							$conn->set_charset("utf8");

							$sql = "SELECT nombre FROM raza";
							$result = mysqli_query($conn, $sql);
							
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "<option value=" . $row["nombre"]. ">" . $row["nombre"]. "</option>";
								}
							} else {
								echo "0 results";
							}
							$conn->close();
							?>
						</select>
						<select name="Sexo">
							<option value="default" selected>Sexo</option>
							<option value="m">Masculino</option>
							<option value="f">Femenino</option>
							<option value="i">Indiferente</option>
						</select>
						<button>Buscar</button>
					</form>
				</li>
				<li id="inciar">
					<a href="/login.php">Iniciar sesión<br>Registrarse<a>
				</li>
			</ul>
		</nav>
		<p>
		a
		<p>
		</body>
</html>