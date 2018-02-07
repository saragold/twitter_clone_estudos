<?php

	require_once('db.class.php');

	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	

	//query
	$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ";

	$objeto_db = new db(); //instaciando a classe de conexão com o BD

	//A variavel recebe o retorno da função
	$link = $objeto_db -> conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);

	//Executando a query
	if($resultado_id){

		$dados_usuario = mysqli_fetch_array($resultado_id);

		var_dump($dados_usuario);
	}else{
		echo 'Usuário NÃO foi logado!';
	}

?>