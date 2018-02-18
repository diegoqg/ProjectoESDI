<html>
	<head>
		<title>Registro</title>
		<link rel="stylesheet" type="text/css" href="css/css.css" title="style">
		
		
		
		<style>
			body {
				font-family: Raleway, Helvetica, sans-serif;
			}

			input[type=text], select, textarea {
				width: 100%;
				padding: 12px;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
				margin-top: 6px;
				margin-bottom: 16px;
				resize: vertical;
			}

			input[type=submit] {
				background-color: #f88425;
				color: white;
				padding: 12px 235px;
				border: none;
				border-radius: 2px;
				cursor: pointer;
			}

			input[type=submit]:hover {
				background-color: #c65c06;
			}

			.register-div {
				border-radius: 5px;
				padding-top: 100px;
				padding-left: 700px;
				padding-right: 700px;
			}		

			.titol {			
				color: #f88425;
				font-size: 40px;
			}
		</style>
	</head>
	<body>
		<div class="register-div">			
			<div class="form_register form_user1" id="form_user">
				<form action="registroN.php" method="post" enctype="multipart/form-data" >	
					<div>
						<label>Nombre: </label>
						<input type="text" name="nombre" required/>
					</div>
					<div>
						<label>Edat: </label>
						<input type="text" name="edat" required/>	
						
						<?php
							$host_db = "localhost";
							$user_db = "root";
							$pass_db = "";
							$db_name = "pethome";
							$tbl_name = "mascota";
							$mysqli = new mysqli($host_db, $user_db, $pass_db, $db_name);
							$sql = "SELECT * FROM $tbl_name";
							$mysqli->set_charset("utf8");
							$result =  mysqli_query($mysqli, $sql);
							if (mysqli_num_rows($result) > 0) {
								echo "<select name='mascota'>";
								while($row = mysqli_fetch_assoc($result)) {
									echo "<option value='" .$row['unidadEdad']. "'>" .$row['unidadEdad']."</option>";
								}
								echo "</select>";
							}
						?>
					</div>
					<div>
						<label>Tipo: </label>
						
						<?php
							$host_db = "localhost";
							$user_db = "root";
							$pass_db = "";
							$db_name = "pethome";
							$tbl_name = "mascota";
							$mysqli = new mysqli($host_db, $user_db, $pass_db, $db_name);
							$sql = "SELECT * FROM $tbl_name";
							$mysqli->set_charset("utf8");
							$result =  mysqli_query($mysqli, $sql);
							if (mysqli_num_rows($result) > 0) {
								echo "<select name='mascota'>";
								while($row = mysqli_fetch_assoc($result)) {
									echo "<option value='" .$row['tipoAnimal']. "'>" .$row['tipoAnimal']."</option>";
								}
								echo "</select>";
							}
						?>
					</div>
					<div>
						<label>Raza: </label>
						
						<?php
							$host_db = "localhost";
							$user_db = "root";
							$pass_db = "";
							$db_name = "pethome";
							$tbl_name = "raza";
							$mysqli = new mysqli($host_db, $user_db, $pass_db, $db_name);
							/*$sql = "SELECT * FROM $tbl_name WHERE especie LIKE 'PERRO'";*/
							$sql = "SELECT * FROM $tbl_name";
							$mysqli->set_charset("utf8");
							$result =  mysqli_query($mysqli, $sql);
							if (mysqli_num_rows($result) > 0) {
								echo "<select name='raza'>";
								while($row = mysqli_fetch_assoc($result)) {
									echo "<option value='" .$row['idRaza']. "'>" .$row['raza']."</option>";
								}
								echo "</select>";
							}
						?>
					</div>
					<div>
						<label>Tamaño: </label>
						
						<?php
							$host_db = "localhost";
							$user_db = "root";
							$pass_db = "";
							$db_name = "pethome";
							$tbl_name = "mascota";
							$mysqli = new mysqli($host_db, $user_db, $pass_db, $db_name);
							$sql = "SELECT * FROM $tbl_name";
							$mysqli->set_charset("utf8");
							$result =  mysqli_query($mysqli, $sql);
							if (mysqli_num_rows($result) > 0) {
								echo "<select name='mascota'>";
								while($row = mysqli_fetch_assoc($result)) {
									echo "<option value='" .$row['tamaño']. "'>" .$row['tamaño']."</option>";
								}
								echo "</select>";
							}
						?>
					</div>
					<div>
						<label>Sexo: </label>
						
						<?php
							$host_db = "localhost";
							$user_db = "root";
							$pass_db = "";
							$db_name = "pethome";
							$tbl_name = "mascota";
							$mysqli = new mysqli($host_db, $user_db, $pass_db, $db_name);
							$sql = "SELECT * FROM $tbl_name";
							$mysqli->set_charset("utf8");
							$result =  mysqli_query($mysqli, $sql);
							if (mysqli_num_rows($result) > 0) {
								echo "<select name='mascota'>";
								while($row = mysqli_fetch_assoc($result)) {
									echo "<option value='" .$row['sexo']. "'>" .$row['sexo']."</option>";
								}
								echo "</select>";
							}
						?>
					</div>
					<div>
						<label>Castrado: </label>
						
						<?php
							$host_db = "localhost";
							$user_db = "root";
							$pass_db = "";
							$db_name = "pethome";
							$tbl_name = "mascota";
							$mysqli = new mysqli($host_db, $user_db, $pass_db, $db_name);
							$sql = "SELECT * FROM $tbl_name";
							$mysqli->set_charset("utf8");
							$result =  mysqli_query($mysqli, $sql);
							if (mysqli_num_rows($result) > 0) {
								echo "<select name='mascota'>";
								while($row = mysqli_fetch_assoc($result)) {
									echo "<option value='" .$row['castrado']. "'>" .$row['castradro']."</option>";
								}
								echo "</select>";
							}
						?>
					</div>
					<div>
						<label>Urgente: </label>
						
						<?php
							$host_db = "localhost";
							$user_db = "root";
							$pass_db = "";
							$db_name = "pethome";
							$tbl_name = "mascota";
							$mysqli = new mysqli($host_db, $user_db, $pass_db, $db_name);
							$sql = "SELECT * FROM $tbl_name";
							$mysqli->set_charset("utf8");
							$result =  mysqli_query($mysqli, $sql);
							if (mysqli_num_rows($result) > 0) {
								echo "<select name='mascota'>";
								while($row = mysqli_fetch_assoc($result)) {
									echo "<option value='" .$row['urgente']. "'>" .$row['urgente']."</option>";
								}
								echo "</select>";
							}
						?>
					</div>
					<div>
						<label>Descripción: </label>
						<input type="text" name="apellido2" class="" style="height:200px" required/>
					</div>
				<!--
					<div>
						<label>Comunidad Autonoma: </label>
						
						<?php
							$host_db = "localhost";
							$user_db = "root";
							$pass_db = "";
							$db_name = "pethome";
							$tbl_name = "comunidades";
							$mysqli = new mysqli($host_db, $user_db, $pass_db, $db_name);
							$sql = "SELECT * FROM $tbl_name";
							$mysqli->set_charset("utf8");
							$result =  mysqli_query($mysqli, $sql);
							if (mysqli_num_rows($result) > 0) {
								echo "<select name='comunidades'>";
								 while($row = mysqli_fetch_assoc($result)) {
									 echo "<option value='" .$row['idComunidad']. "'>" .$row['comunidad']."</option>";
								 }
								echo "</select>";
							}
						?>
					</div>
				-->			
					<div>
						<label>Primera imagen: </label>
						<input name="img_perfil1" type="file" />
					</div>
					<br>
					<div>
						<label>Segunda imagen: </label>
						<input name="img_perfil2" type="file" />
					</div>
					<br>
					<div>
						<input type="submit" value="Enviar"/>
					</div>
				</form>
			</div>
		</div>
	</body>
	
</html>