<li class="nav-item"> <!-- INICIO de la barra de búsqueda -->
				<div class="container"> <!-- Contiene todos los tags utilizados en Bootstrap -->
					<div class="col-sm-12 pull-center well">
						<form class="form-inline" action="results.php" method="post"> <!-- Formulario de la barra de búsqueda -->
							<center>
								<div class="input-group custom-search-form">
									<span class="input-group-btn">
										<button class="btn btn-default" type="submit" name="submit"> <!-- Botón de la barra de búsqueda -->
											<img id="lupa" src="images/lupa.png" alt="lupa"> <!-- Imagen de lupa del boton -->
										</button>
									</span>
								<select name="raza" id="raza" class="form-control"> <!-- Lista de las razas -->
									<option value="default" selected hidden>Raza</option>
									<?php
									$servername = "localhost"; //Datos para la conexión a la base de datos
									$username = "root";
									$password = "";
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
											echo "<option value=" . $row["idRaza"]. ">" . $row["nombre"]. "</option>"; //Muetra las razas
										}
									} else {
										echo "0 resultados";
									}
									$conn->close(); //Cerrar la conexión
									?>
								</select>
								<select name="ubicacion" class="form-control"> <!-- Lista de las comunidades autónomas -->
									<option value="default" selected hidden>Ubicación</option>
									<?php
									$servername = "localhost"; //Datos para la conexión a la base de datos
									$username = "root";
									$password = "";
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
											echo "<option value=" . $row["idComunidad"]. ">" . $row["comunidad"]. "</option>"; //Muetra las comuninades autónomas
										}
									} else {
										echo "0 resultados";
									}
									$conn->close(); //Cerrar la conexión
									?>
								</select>
								<select name="sexo" class="form-control"> <!-- Selector de géneros -->
									<option value="default" selected hidden>Sexo</option>
									<option value="MACHO">Masculino</option>
									<option value="HEMBRA">Femenino</option>
								</select>
								<select name="filtro" class="form-control"> <!-- Selector de ordenación -->
									<option value="default" selected hidden>Ordenadar por</option>
									<option value="m.edat">Edad</option>
									<option value="m.tamaño">Tamaño</option>
								</select>
							</div>
						</form>
					</div>
				</div>
			</li> <!-- FIN de la barra de búsqueda -->
