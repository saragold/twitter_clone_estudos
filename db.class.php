<?php

	class db{

		//host
		private $host = 'localhost';

		//usuario
		private $usuario = 'root';

		//senha
		private $senha = '';

		//Banco de Dados
		private $database = 'twitter_clone';

		//Função que faz a conexão com o BD

		public function conecta_mysql(){

			//cria a conexão e requer 4 parametros: localização bd, usuário, senha e banco de dados
			$conexao = mysqli_connect($this -> host, $this -> usuario, $this -> senha, $this -> database );

			//Ajusta o charset de comunicação entre a aplicação e o banco de dados
			//Requer 2 paramentros: A conexao e qual o tipo de charsert
			 mysqli_set_charset($conexao, 'utf8');

			 //Verificando se houve erro de conexão
			 if(mysqli_connect_errno()){

			 	echo 'Erro a estabelecer conexão com o BD MySQL: '. mysqli_connect_error();

			 }

			 return $conexao;
		}


	}

?>