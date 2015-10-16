<?php 
session_start();
if(isset($_SESSION['registrado']))
{
	echo "<section class='widget'><center><h2> Bienvenido: ". $_SESSION['registrado']."</h2></center>";

 ?>
 <script type="text/javascript">
 $("#perfil").html("Mi Perfil");
 </script>

	<?php 
	}else
	{
		echo "<section class='widget'>
			<h4 class='widgettitle'>No estas registrado</h4></section>";

	 ?>
	  <script type="text/javascript">
 $("#perfil").html("----");
 </script>

 <?php } ?>