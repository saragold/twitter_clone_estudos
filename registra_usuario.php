<?php

	require_once('db.class.php');

	$usuario = $_POST['usuario'];
	
	$email = $_POST['email'];
	
	$senha = $_POST['senha'];

	$objeto_db = new db();

	//A variavel recebe o retorno da função
	$link = $objeto_db -> conecta_mysql();

	//Query de insert
	$sql = "insert into usuarios(usuario, email, senha) values ('$usuario', '$email', '$senha')";

	//Executando a query
	if(mysqli_query($link, $sql)){
		echo 'Usuário registrado com sucesso!';
	}else{
		echo 'Usuário NÃO foi registrado!';
	}

?>