
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
    <!-- Navigation -->
	<?php
		$usuari = "root";
		$password = "1234";
		$servidor = "localhost";
		$basededades = "pethome";
		
		if($_GET){
			$connexio = mysqli_connect( $servidor, $usuari, $password ) or die ("No s'ha pogut connectar amb el servidor de la base de dades");
			$db = mysqli_select_db( $connexio, $basededades ) or die ( "Ups! Sembla que no és possible coonectar amb la base de dades" );
			$id = $_GET['id'];
			//$nif = $_POST('NIF');
		$consulta = "SELECT * FROM protectora WHERE idProtectora=".$id;
		$nombrePerrera = mysqli_query($connexio, $consulta) or die("Hi ha algun error en la consulta!");
		$row = $nombrePerrera->fetch_object();
		}
		else{
			//echo "Ups sembla que la pagina que volies no es troba disponible!";
			/*$connexio = mysqli_connect( $servidor, $usuari, $password ) or die ("No s'ha pogut connectar amb el servidor de la base de dades");
			$db = mysqli_select_db( $connexio, $basededades ) or die ( "Ups! Sembla que no és possible coonectar amb la base de dades" );
			$id = 1;
			//$nif = $_POST('NIF');
			$email = "animales@gmail.com";
			$NIF = "L87654392";
		$consulta = "SELECT * FROM protectora WHERE idProtectora=".$id;
		$nombrePerrera = mysqli_query($connexio, $consulta) or die("Hi ha algun error en la consulta!");
		$row = $nombrePerrera->fetch_object();*/
		echo "error";
		}
	?>
    <!-- Page Content -->


      <!-- Portfolio Item Row -->
      <div class="row">

     <div class="col-md-7">
		<h3 class="clase"><?php 
		echo "<img class='icon' src='".$row->imagen_protectora."' alt='error' width='100' height='100'> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
			echo $row->nombre . " "; 
			
			?></h3>
	 <div class="datos">
		<p class="textborder">
		
			<img class="icon" src="/imagenes/telefono.jpg" alt="" width="15" height="15" > &nbsp &nbsp <?php echo $row->telefono; ?>
			<br><img class="icon" src="/imagenes/position.png" alt="" width="15" height="15" > &nbsp &nbsp <?php echo $row->direccion; ?>
			<br><img class="icon" src="/imagenes/reloj.png" alt="" width="15" height="15" > &nbsp &nbsp <?php echo $row->horario; ?>
		</p>
	</div>
		<p class="textsample"><b>Nuestra historia</b></br>
		<?php echo $row->historia; ?>
		</p>
		<p class="textsample"><b>Nuestro equipo</b></br>
		<?php echo $row->equipo; ?>
		</p>
	 </div>
	 
	 
		
        <div class="col-md-4">
           <!--<img class="img-fluid" src="https://cdnb.20m.es/animalesenadopcion/files/2010/08/Perrera-Municipal-de-Priego-de-C%C3%B3rdoba-1.jpg" alt="">
			-->
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2985.6802735368406!2d2.083059715500387!3d41.55451947924912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49492db95997f%3A0x47416dcf6e65b685!2sInstitut+p%C3%BAblic+Sabadell!5e0!3m2!1ses!2ses!4v1517326318747" width="450" height="400" frameborder="0" style="border-radius: 25px 25px 25px 25px;" allowfullscreen></iframe>
			</br>
			
				
				<div class="encuadrado">
				<?php echo "<img class='perfilRefugio' src=".$row->imagen_contacto." alt=''>";?>
					Persona de contacto </br>
					<b><?php echo $row->nombre_contacto." ".$row->apellido_contacto; ?></b>	
					<button class="naranjito" onClick="./persona.php?<?php echo $row->nombre_contacto."+".$row->apellido_contacto;?>">
						Contacta con <?php echo $row->nombre_contacto; ?>
					</button>
				</div>
		</div>
		
      </div>
	  
      <!-- /.row -->

      <!-- Related Projects Row -->
      <h3 class="my-4">Nuestros perros en adopción</h3>
	  
		<?php 

			include('fetch_pages.php');
			

		
			?>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <!-- Footer -->
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Footer -->
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
  </body>

<?php require 'footer.php';
?>
