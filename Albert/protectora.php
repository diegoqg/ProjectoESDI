<!DOCTYPE html>
<html lang="en">
<head>
   <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.bootpag.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
	<link href="./css/border.css" rel="stylesheet">
</head>
  <body>

    <!-- Navigation -->
	<?php
		$usuari = "root";
		$password = "";
		$servidor = "localhost";
		$basededades = "pethome";
		
		//if($_POST){
			$connexio = mysqli_connect( $servidor, $usuari, "" ) or die ("No s'ha pogut connectar amb el servidor de la base de dades");
			$db = mysqli_select_db( $connexio, $basededades ) or die ( "Ups! Sembla que no és possible coonectar amb la base de dades" );
			//$email = $_POST('email');
			//$nif = $_POST('NIF');
			$email = "animales@gmail.com";
			$NIF = "L87654392";
		$consulta = "SELECT * FROM protectora WHERE email LIKE '".$email."' AND NIF LIKE '".$NIF."';";
		$nombrePerrera = mysqli_query($connexio, $consulta) or die("Hi ha algun error en la consulta!");
		$row = $nombrePerrera->fetch_object();
		//}
		//else{
			//echo "Ups sembla que la pagina que volies no es troba disponible!";
		//}
	?>
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
      </ol>

      <!-- Portfolio Item Row -->
      <div class="row">

     <div class="col-md-7">
		<h3 class="my-3"><?php 
			echo $row->nombre . " &nbsp &nbsp &nbsp &nbsp"; 
			echo "<img class='icon' src='".$row->imagen_protectora."' alt='error' width='100' height='100'>";
			?></h3>
	 <div class="datos">
		<p class="textborder">
		
			<img class="icon" src="/imagenes/telefono.jpg" alt="" width="15" height="15" > &nbsp &nbsp <?php echo $row->telefono; ?>
			<br><img class="icon" src="/imagenes/position.png" alt="" width="15" height="15" > &nbsp &nbsp <?php echo $row->direccion; ?>
			<br><img class="icon" src="/imagenes/reloj.png" alt="" width="15" height="15" > &nbsp &nbsp <?php echo $row->horario; ?>
		</p>
	</div>
		<p class="textborder"><b>Nuestra historia</b></br>
		<?php echo $row->historia; ?>
		</p>
		<p class="textborder"><b>Nuestro equipo</b></br>
		<?php echo $row->equipo; ?>
		</p>
	 </div>
	 
	 
		
        <div class="col-md-5">
           <!--<img class="img-fluid" src="https://cdnb.20m.es/animalesenadopcion/files/2010/08/Perrera-Municipal-de-Priego-de-C%C3%B3rdoba-1.jpg" alt="">
			-->
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2985.6802735368406!2d2.083059715500387!3d41.55451947924912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49492db95997f%3A0x47416dcf6e65b685!2sInstitut+p%C3%BAblic+Sabadell!5e0!3m2!1ses!2ses!4v1517326318747" width="450" height="400" frameborder="0" style="border-radius: 25px 25px 25px 25px;" allowfullscreen></iframe>
			</br>
			
				
				<div class="encuadrado">
				<?php echo "<img class='perfilRefugio' src=".$row->imagen_contacto." alt=''>";?>
					Persona de contacto </br>
					<b><?php echo $row->nombre_contacto." ".$row->apellido_contacto; ?></b>	
					<button class="naranjito">
						Contacta con <?php echo $row->nombre_contacto; ?>
					</button>
				</div>
		</div>
		
      </div>
	  
      <!-- /.row -->

      <!-- Related Projects Row -->
      <h3 class="my-4">Perros</h3>
	  
		<?php 

			include('fetch_pages.php');
			

		
			?>
      <!-- /.row -->

    </div>
    <!-- /.container -->
	<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Footer -->
  </body>

</html>
