<?php 

Class Usuario{

	private $pdo;
	public $msgErro = "";//

	public function conectar($nome, $host, $usuario, $senha)
	{
		global $pdo;
		//Conexão com o bacno de dados.
		try {
			$pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
			
		} catch (PDOException $e) {
			$msgErro = $e->getMessage();
		}
	}

	public function cadastrar($login, $senha, $email)
	{
		global $pdo;
		global $msgErro;
		//verifica se já existe o cadastro.
		$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :e");
		$sql->bindValue(":e", $email);
		$sql->execute();

		if($sql->rowCount() > 0)
		{
			return false; //cadastro existente.
		}
		else
		{
			//Se o cadastro não existe, cadastrar novo usuário.
			$sql = $pdo->prepare("INSERT INTO usuarios (login, senha, email) values (:l, :s, :e)");
			$sql->bindValue(":l", $login);
			$sql->bindValue(":s", md5($senha));
			$sql->bindValue(":e", $email);
			$sql->execute();
			return true;
		}
	}

	public function logar($login, $senha)
	{
		global $pdo;
		global $msgErro;

		//verifica se o usuário está cadastrado.
		$sql = $pdo->prepare("SELECT id FROM usuarios WHERE login = :l AND senha = :s");
		$sql->bindValue(":l", $login);
		$sql->bindValue(":s", md5($senha));
		$sql->execute();
		if($sql->rowCount() > 0)
		{
		//acessa o sistema.
			$dado = $sql->fetch();
			session_start();
			$_SESSION['id'] = $dado['id'];
			return true; //acesso realizado com sucesso.
		}
		else
		{

		}

		
	}

	public function enviaEmail($email)
	{
		global $pdo;
		global $msgErro;

		//verifica se o e-mail está cadastrado.
		$sql = $pdo->prepare("SELECT id, email FROM usuarios WHERE email = :e");
		$sql->bindValue(":e", $email);
		$sql->execute();
		if($sql->rowCount() > 0)
		{
		//.
			$dado = $sql->fetch();
			session_start();
			$_SESSION['email'] = $dado['email'];
			return true; //E-mail encontrado.
		}
		else
		{

		}

	}





}
?>