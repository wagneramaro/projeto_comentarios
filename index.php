<?php 
	
	try {
		$pdo = new PDO("mysql:dbname=projeto_comentarios;host=localhost","root","");
	} catch (PDOException $e) {
		echo "ERRO: ".$e->getMessage();
		exit;
	}

?>

<fieldset>
	
	<form method="POST">

		Nome:<br>
		<input type="text" name="nome"><br><br>

		Mensagem:<br>
		<textarea name="mensagem"></textarea><br><br/>

		<input type="submit" name="Enviar Mensagem"/>

	</form>

</fieldset>

<br><br>

<?php 
	$sql = "SELECT * FROM mensagens ORDER BY data_msg DESC";
	$sql = $pdo->query($sql);
	if($sql->rowCount() > 0){
		foreach ($sql->fetchAll() as $mensagem) {
		?>

			<strong><?php echo $mensagem['nome']; ?></strong><br/>
			<?php echo $mensagem['msg']; ?>
			<hr/>


		<?php
		}
	}


?>
