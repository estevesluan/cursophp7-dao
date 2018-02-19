<?php

class Usuario{

	private $id;
	private $login;
	private $senha;
	private $dtCadastro;

	public function getId(){
		return $this->id;
	}

	public function setId($value){
		$this->id = $value;
	}

	public function getLogin(){
		return $this->login;
	}

	public function setLogin($value){
		$this->login = $value;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($value){
		$this->senha = $value;
	}

	public function getDtCadastro(){
		return $this->dtCadastro;
	}

	public function setDtCadastro($value){
		$this->dtCadastro = $value;
	}


	public function loadById($id){
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM usuarios WHERE usu_id = :ID", array(
			":ID"=>$id
		));

		if(count($results) > 0){
			$row = $results[0];
			
			$this->setId($row['usu_id']);
			$this->setLogin($row['usu_login']);
			$this->setSenha($row['usu_senha']);
			$this->setDtCadastro(new DateTime($row['usu_cadastro']));
		}
	}

	public function __toString(){
		return json_encode(array(
			"ID:"=>$this->getId(),
			"Login:"=>$this->getLogin(),
			"Senha:"=>$this->getSenha(),
			"Data de Cadastro:"=>$this->getDtCadastro()->format("d/m/Y H:i:s"),
		));
	}


}
?>