
<?php 
if ($_POST) {
	
	//Valida email
	if ($_POST['email']!=$_POST['email2']) {
		die('<h1>Emails digitados não conferem</h1>');
	}

	require_once "conecta.php";
	

	$uploaddir = '/audios/';
	list ($nome, $formato) = split ('[.]', $_FILES['audio']['name']);
	$uploadfile = $uploaddir . $nome.rand(1,1000).".".$formato;

	if ($formato!='mp4' && $formato!='ogg' && $formato!='mp3' && $formato!='aac' && $formato!='amr' && $formato!='mov' && $formato!='m4a') {
		echo "Formato não suportado!\n<br>";
		echo "Aqruivos permitidos: mp3, mp4, ogg, aac, amr, mov, m4a\n";
		die();
	}

	echo '<pre>';
	if (move_uploaded_file($_FILES['audio']['tmp_name'], $uploadfile)) {
    //echo "Arquivo válido e enviado com sucesso.\n";
	} else {
		echo "Houve um erro ao enviar Arquivo!\n";
		echo "Detalhes:\n";
		print_r($_FILES);
		die();
	}



	print "</pre>";
	$database->insert('conteudos', [
		'titulo' => $_POST['titulo'],
		'categoria' => $_POST['categoria'],
		'audio' => $_uploadfile,
		'video_url' => $_POST['url'],
		'usuario' => $_POST['email']
	]);

		//echo "sucesso!";

	?>
	<script>
		alert("Arquivo Enviado! Acesse 'gerenciar' para excluir");
		window.location.href = "index.php";
	</script>
	<?php
	die();
	
}
?>

<form action="" method="post" enctype="multipart/form-data">
	<label>Categoria
		<select name="categoria">
			<option value="video">Vídeo audiodescrito</option>
			<option value="conto">Conto</option>
		</select>
	</label><br>
	<label>Título
		<input type="text" name="titulo" placeholder="Aventuras da gostosa tarada" required>
	</label><br>
	<input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
	<label>Áudiodescrição - deixe vazio se for conto
		<input type="file" name="audio">
	</label><br>
	
	<label>URL do video ou do conto
		<input type="text" name="url" placeholder="http://xvideos.com/video" >
	</label><br>
	Coloque seu email duas vezes - ele será utilizado como senha e será a única forma para poder excluir este conteúdo futuramente
	<input type="text" name="email" placeholder="seunome@provedor.com" required=""><br>
	<input type="text" name="email2" placeholder="seunome@provedor.com" required="">
	<input type="submit" value="Enviar">
</form>