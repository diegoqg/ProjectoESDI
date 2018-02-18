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
    <!--Hasta aqui iria en un PHP-->
    
    <?php require 'algoritmoDeBusqueda.php';
    ?>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>

<?php require 'footer.php';
?>
