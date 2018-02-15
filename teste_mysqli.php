<?php

	
	require_once('db.class.php');

	//query
	$sql = "SELECT * FROM usuarios";

	$objeto_db = new db(); //instaciando a classe de conexão com o BD

	//A variavel recebe o retorno da função
	$link = $objeto_db -> conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);

	
	if($resultado_id){

		$dados_usuario = array();

		while( $linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

			$dados_usuario[] = $linha;
		}

		foreach ($dados_usuario as $usuario) {
			
			var_dump($usuario);
			echo '<br /><br />';
		}
		
	}else{
		echo 'Usuário NÃO foi logado!';
	}

?>