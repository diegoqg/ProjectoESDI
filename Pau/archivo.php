
<?php
if(isset($_POST["texto"]))
{
	if($_POST["texto"])
		echo "He recibido en el archivo.php: ".$_POST["texto"];
	else
		echo "He recibido un campo vacio";
}
?>