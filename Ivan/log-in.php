<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Log In</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" href="estilos.css">
		<script>
		  function cambiaVisibilidad(s){
			  var div1 = document.getElementById('form_user');
			  var div2 = document.getElementById('form_refuge');
			  var btn1 = document.getElementById('btnUser');			  
			  var btn2 = document.getElementById('btnRefuge');
			  if (s==1){
				 btn2.style.backgroundColor = "#F88425";
				 btn1.style.backgroundColor = "#ffffff";
				 btn1.style.color = "black";
				 div2.style.display = 'none';
				 div1.style.display = 'block'; 
			  }
			  if(s==2){
				 btn1.style.backgroundColor = "#F88425";
				 btn2.style.backgroundColor = "#ffffff";
				 btn2.style.color = "black";
				 div1.style.display = 'none';
				 div2.style.display = 'block';  
			  }
		  }
		</script>
	</head>
	
	<body>
		<div class="contenedor">
			<a href="#openmodal" class="open">Log in</a>
			<section id="openmodal" class="modalDialog">
				<section class="modal">
					<a href="#close" class="close"> X </a>
					  <section class='modal-item login'>
					    <div>
							<button id="btnUser" class="miBtnUserN" onclick="cambiaVisibilidad(1)"> Usuario </button>
							<button id="btnRefuge" class="miBtnUserR" onclick="cambiaVisibilidad(2)"> Refugio </button>
						</div>
						<div class="div_error_user">
							<p class="p_error_user">¡ E-Mail o Contraseña Incorrectos !</p>
						</div>
						<div class="form_usuarioN">
					    <form id="form_user" action="manejadorsesionN.php" method="post" >
							<div class="txt_name">
							<input name="usuarioN" type="text" placeholder="Usuario" class="camptxt" required />
							</div>
							<div class="txt_pass">
							<input name="passwordN"  type="password" placeholder="Contraseña" class="camptxt" required />
							</div>
							<div>
							<input type="submit" name="submit" value="Log In" class="btn_send">
							</div>
						</form>
						</div>
						<div class="form_usuarioR">
							<form id="form_refuge" class="form_refuge" action="manejadorsesionR.php" method="post" style="display: none;">
							<div class="txt_name">
							<input name="usuarioR" type="text" placeholder="Refugio" class="camptxt" required />
							</div>
							<div class="txt_pass">
							<input name="passwordR"  type="password" placeholder="Contraseña" class="camptxt" required />
							</div>
							<div>
							<input type="submit" name="submit" value="Log In" class="btn_send">
							</div>
							</form>
						</div>
						<p> ¿ No tienes cuenta ? </p>
						<p><a href="" >Registrate</a> ya!</p>						
					  </section>  					  							 	
					</section>
					</section>
				</div>
				</section>
			</section>
		</div>

	</body>
</html>