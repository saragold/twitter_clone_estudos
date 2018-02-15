<?php

	require_once('db.class.php');

	$usuario = $_POST['usuario'];
	
	$email = $_POST['email'];
	
	$senha = md5($_POST['senha']);

	$objeto_db = new db();

	//A variavel recebe o retorno da função
	$link = $objeto_db -> conecta_mysql();

	$usuario_existe = false;
	$email_existe = false;

//Verificando se o usuário já existe
	$sql = "select * from usuarios where usuario = '$usuario' ";

	if($resultado_id = mysqli_query($link, $sql)){

		$dados_usuarios = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuarios['usuario'])){

			$usuario_existe = true;
		}
	}else{
		echo 'Erro ao tentar localizar registro';
	}

	//Verificando de Email já existe
	$sql = "select * from usuarios where email = '$email' ";

	if($resultado_id = mysqli_query($link, $sql)){

		$dados_usuarios = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuarios['email'])){

			$email_existe = true;
		}
	}else{
		echo 'Erro ao tentar localizar registro';
	}

	if($usuario_existe || $email_existe){

		$retorno_get = '';

		if($usuario_existe){

			$retorno_get.="erro_usuario=1$";
		}

		if($email_existe){

			$retorno_get.="erro_email=1$";
		}

		header('Location: inscrevase.php?'.$retorno_get);
		die();
	}

	//Query de insert
	$sql = "insert into usuarios(usuario, email, senha) values ('$usuario', '$email', '$senha')";

	//Executando a query
	if(mysqli_query($link, $sql)){
		echo 'Usuário registrado com sucesso!';
	}else{
		echo 'Usuário NÃO foi registrado!';
	}

?>
