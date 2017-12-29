<?php
/**
 * Programa: Conexao.class.php
 * Fun��o: Gerencia a conexao e a desconex�o com a base de dados
 * @Autor: Clayton da Silva Rodrigues
 * Empresa: CR Digital 
 * Data: 01 / 10 / 2014
 */
class Conexao
{
	public $host       = "localhost";
	public $user       = "php_mysql";
	public $pass       = "12345";
	public $dbBase     = "php_mysql"; 
	public $erro       = "Falha na conexao com MySql.";	
	private $link      = "";	
		
	// fun��o para conectar ao servidor e ao base de dados cadCliente
	public function conectaBase()
	{ 
		//$lnk = @mysql_connect($this->host,$this->user,$this->pass)or die($this->erro);	
		//mysql_select_db($this->dbBase , $lnk);	
		$lnk = @mysqli_connect($this->host,$this->user,$this->pass, $this->dbBase)or die($this->erro);

		$this->link = $lnk;
	}

	// retornar a string de conex�o
	public function getLink()
	{
		return $this->link;
	}

	// fun��o para desconectar do servidor e da base cadCliente
	public function desconecta($link)
	{
		//@mysql_close();
		@mysqli_close($link);
	}
	
}
?>
