<?php
    session_start(); 
	if(isset($_SESSION['login']) == false)
		require 'header_NL-B.php';
	else{
		if($_SESSION['login']==1)
			require 'header_SL-B.php';
		if($_SESSION['login']==0)
			require 'header_NL-B.php';
	}

?>
		<div class="register-div">
			<div>
				<button id="btn_user" class="miBtnUser" onclick="cambiaVisibilidads(1)">Usuario</button>
				<button id="btn_refuge" class="miBtnUser" onclick="cambiaVisibilidads(2)">Refugio</button>
			</div>
			<div class="form_register form_user1" id="form_Ruser">
				<form action="registroN.php" method="post" enctype="multipart/form-data" >	
					<div>
						<label>E-Mail: </label>
						<input type="text" name="email" required/>
					</div>
					<div>
						<label>Contraseña: </label>
						<input type="password" name="password" class="" required/>	
					</div>
					<div>
						<label>Nombre: </label>
						<input type="text" name="nombre" class="" required/>
					</div>
					<div>
						<label>Primer Apellido: </label>
						<input type="text" name="apellido1" class="" required/>
					</div>
					<div>
						<label>Segundo Apellido: </label>
						<input type="text" name="apellido2" class="" required/>
					</div>
					<div>
						<label>Comunidad Autonoma: </label>
						
						<?php
							$host_db = "localhost";
							$user_db = "root";
							$pass_db = "1234";
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
					<div>
						<label>Telefono: </label>
						<input type="text" name="telefono" class="" required/>
					</div>
					<div>
						<label>Imagen: </label>
						<input name="img_perfil" type="file" />
					</div>
					<div>
						<input type="submit" value="Enviar" class="btn_send" />
					</div>
				</form>
			</div>
			<div class="form_register form_user2" id="form_Rrefuge">
				<form action="registroR.php" method="post" enctype="multipart/form-data" >
					<div>
						<label>Nombre: </label>
						<input type="text" name="nombre" class="" required/>
					</div>
					<div>	
						<label>E-Mail: </label>
						<input type="text" name="email" class="" required/>
					</div>
					<div>
						<label>Contraseña: </label>
						<input type="password" name="password" class="" required/>
					</div>
					<div>					
						<label>NIF: </label>
						<input type="text" name="NIF" class="" required/>
					</div>
					<div>
						<label>Direccion: </label>
						<input type="text" name="direccion" class="" required/>
					</div>
					<div>
						<label>Comunidad Autonoma: </label>
						
						<?php
							$host_db = "localhost";
							$user_db = "root";
							$pass_db = "1234";
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
					<div>
						<label>Telefono: </label>
						<input type="text" name="telefono" class="" required/>
					</div>
					<div>
						<label>Imagen Protectora: </label>
						<input name="img_perfil" type="file" required/>
					</div>
					<div>
						<label>Nombre Persona Contacto: </label>
						<input type="text" name="name_contacto" class="" required/>
					</div>
					<div>
						<label>Apellido Persona Contacto: </label>
						<input type="text" name="apellido_contacto" class="" required/>
					</div>
					<div>
						<label>Imagen Persona Contacto: </label>
						<input name="img_contacto" type="file" required/>
					</div>
					<div>					
						<input type="submit" value="Enviar" class="btn_send" />
					</div>
				</form>
			</div>
		</div>
<?php require 'footer.php';
?>