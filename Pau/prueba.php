<?php
if(isset($_POST["nombre"])){
	if($_POST["nombre"])
		echo "He recibido en el php: ".$_POST["nombre"];
	else
		echo "He recibido un campo vacio";
}else
	echo "penis";

?>