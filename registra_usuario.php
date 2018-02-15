<?php

	require_once('db.class.php');

	$usuario = $_POST['usuario'];
	
	$email = $_POST['email'];
	
	$senha = md5($_POST['senha']);

	$objeto_db = new db();

	//A variavel recebe o retorno da função
	$link = $objeto_db -> conecta_mysql();

//Verificando se o usuário já existe
	$sql = "select * from usuarios where usuario = '$usuario' ";

	if($resultado_id = mysqli_query($link, $sql)){

		$dados_usuarios = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuarios['usuario'])){

			echo 'Usuário existente!';
		}else{

			echo 'Usuário pode ser cadastrado!';
		}
	}else{
		echo 'Erro ao tentar localizar registro';
	}

	//Verificando de Email já existe
	$sql = "select * from usuarios where email = '$email' ";

	if($resultado_id = mysqli_query($link, $sql)){

		$dados_usuarios = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuarios['email'])){

			echo 'E-mail existente!';
		}else{

			echo 'E-mail pode ser cadastrado!';
		}
	}else{
		echo 'Erro ao tentar localizar registro';
	}

	die();

	//Query de insert
	$sql = "insert into usuarios(usuario, email, senha) values ('$usuario', '$email', '$senha')";

	//Executando a query
	if(mysqli_query($link, $sql)){
		echo 'Usuário registrado com sucesso!';
	}else{
		echo 'Usuário NÃO foi registrado!';
	}

?>
