<li id="searchbar" class="nav-item"> <!-- INICIO de la barra de búsqueda -->
				<div class="container"> <!-- Contiene todos los tags utilizados en Bootstrap -->
					<div class="col-sm-12 pull-center well">
						<form class="form-inline" action="results.php" method="post"> <!-- Formulario de la barra de búsqueda -->
							<center>
								<div class="input-group custom-search-form">
									<span class="input-group-btn">
										<button class="btn btn-default" type="submit" name="submit"> <!-- Botón de la barra de búsqueda -->
											<img id="lupa" src="images/lupa.png" alt="lupa" width="20px" height="20px"> <!-- Imagen de lupa del boton -->
										</button>
									</span>
								<select name="raza" id="raza" class="form-control"> <!-- Lista de las razas -->
									<?php
									if(empty($_POST["raza"])){
										echo "<option value=\"default\" selected hidden>Raza</option>";
									}else if($_POST["raza"] == "default"){
										echo "<option value=\"default\" selected hidden>Raza</option>";
									}
									$servername = "localhost"; //Datos para la conexión a la base de datos
									$username = "root";
									$password = "1234";
									$dbname = "pethome";

									$conn = new mysqli($servername, $username, $password, $dbname); //Conexión a la base de datos
											
									if ($conn->connect_error) { //Control de la conexión
										die("Connection failed: " . $conn->connect_error);
									}
											
									$conn->set_charset("utf8"); //Codificación

									$sql = "SELECT * FROM raza WHERE especie LIKE 'PERRO'"; //Consulta
									$result = mysqli_query($conn, $sql); //Ejecución de la consulta
											
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											echo "<option value=" . $row["idRaza"];
											if(!empty($_POST["raza"])){
												if($_POST["raza"] == $row["idRaza"]){
													echo " selected";
												}
											}
											echo ">" . $row["nombre"]. "</option>"; //Muetra las razas
										}
									} else {
										echo "0 resultados";
									}
									$conn->close(); //Cerrar la conexión
									?>
								</select>
								<select name="ubicacion" class="form-control"> <!-- Lista de las comunidades autónomas -->
									<?php
									if(empty($_POST["ubicacion"])){
										echo "<option value=\"default\" selected hidden>Ubicación</option>";
									}else if($_POST["ubicacion"] == "default"){
										echo "<option value=\"default\" selected hidden>Ubicación</option>";
									}
									$servername = "localhost"; //Datos para la conexión a la base de datos
									$username = "root";
									$password = "1234";
									$dbname = "pethome";
 
									$conn = new mysqli($servername, $username, $password, $dbname); //Conexión a la base de datos
											
									if ($conn->connect_error) { //Control de la conexión
										die("Connection failed: " . $conn->connect_error);
									}
											
									$conn->set_charset("utf8"); //Codificación

									$sql = "SELECT * FROM comunidades"; //Consulta
									$result = mysqli_query($conn, $sql); //Ejecución de la consulta
											
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											echo "<option value=" . $row["idComunidad"];
											if(!empty($_POST["ubicacion"])){
												if($_POST["ubicacion"] == $row["idComunidad"]){
													echo " selected";
												}
											}
											echo ">" . $row["comunidad"]. "</option>"; //Muetra las comuninades autónomas
										}
									} else {
										echo "0 resultados";
									}
									$conn->close(); //Cerrar la conexión
									?>
								</select>
								<select name="sexo" class="form-control"> <!-- Selector de géneros -->
									<?php
									if(empty($_POST["sexo"])){
										echo "<option value=\"default\" selected hidden>Sexo</option>";
									}else if($_POST["sexo"] == "default"){
										echo "<option value=\"default\" selected hidden>Sexo</option>";
									}
									?>
									<option value="default" selected hidden>Sexo</option>
									<option value="MACHO"
									<?php 
									if(!empty($_POST["sexo"])){
										if($_POST["sexo"] == "MACHO"){
											echo " selected";
										}
									} 
									?>
									>Masculino</option>
									<option value="HEMBRA"
									<?php 
									if(!empty($_POST["sexo"])){
										if($_POST["sexo"] == "HEMBRA"){
											echo " selected";
										}
									} 
									?>
									>Femenino</option>
								</select>
								<select name="filtro" class="form-control"> <!-- Selector de ordenación -->
									<?php
									if(empty($_POST["filtro"])){
										echo "<option value=\"default\" selected hidden>Ordenar por</option>";
									}else if($_POST["filtro"] == "default"){
										echo "<option value=\"default\" selected hidden>Ordenar por</option>";
									}
									?>
									<option value="edad-a"
									<?php 
									if(!empty($_POST["filtro"])){
										if($_POST["filtro"] == "edad-a"){
											echo " selected";
										}
									} 
									?>
									>Edad &#8593;</option>
									<option value="edad-d"
									<?php 
									if(!empty($_POST["filtro"])){
										if($_POST["filtro"] == "edad-d"){
											echo " selected";
										}
									} 
									?>
									>Edad &#8595;</option>
									<option value="tamaño-a"
									<?php 
									if(!empty($_POST["filtro"])){
										if($_POST["filtro"] == "tamaño-a"){
											echo " selected";
										}
									} 
									?>
									>Tamaño &#8593;</option>
									<option value="tamaño-d"
									<?php 
									if(!empty($_POST["filtro"])){
										if($_POST["filtro"] == "tamaño-d"){
											echo " selected";
										}
									} 
									?>
									>Tamaño &#8595;</option>
								</select>
								<button id="reset" class="btn btn-default" type="reset" value="Reset">X</button>
							</div>
						</form>
					</div>
				</div>
			</li> <!-- FIN de la barra de búsqueda -->
