
<?php 
if ($_POST) {
	
	require_once "conecta.php";
	require_once "php_mailer.php";
	
	$comentario = $_POST['comentario'];
	if ($_POST['comentario']=="Deixe seu comentário ou pedido aqui") {
		$comentario="";
	}

	$database->insert('usuarios', [
		'email' => $_POST['email'],
		'comentario' => $comentario
	]);

		//echo "sucesso!";
	
	


	?>
	<script>
		alert("Email <?php echo $_POST['email']; ?> e comentário cadastrado com sucesso! Muito obrigado!");
		window.location = "index.php";
	</script>
	<?php
	die();
	
}
?>
<script>
	window.location.href = "index.php";
</script>

