<?php
	session_start(); //Super global session

	require_once('db.class.php');

	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);

	

	//query
	$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ";

	$objeto_db = new db(); //instaciando a classe de conexão com o BD

	//A variavel recebe o retorno da função
	$link = $objeto_db -> conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);

	//Executando a query
	if($resultado_id){

		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['usuario'])){
			
			$_SESSION['usuario'] = $dados_usuario['usuario'];
			$_SESSION['email'] = $dados_usuario['email'];

			header('Location: home.php');
		}else{
			header('Location: index.php?erro=1'); 
		}
		
	}else{
		echo 'Usuário NÃO foi logado!';
	}

?>
