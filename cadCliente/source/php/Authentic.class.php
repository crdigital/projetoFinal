<?php
/**
 * Programa: Authentic.class.php
 * Função: Gerencia o acesso autorizado e a validação dos usuários ao sistema
 * @Autor: Clayton da Silva Rodrigues
 * Empresa: CR Digital 
 * Data: 01 / 10 / 2014
 */
include "Conexao.class.php";

class Authentic
{ 
	var $dados; // dados do form
	var $query; // instrução sql
	var $rs; // rquery da instrução sql
	var $dados_bd; // retorno dos dados 
	
	// Função para login
	public function login()
	{
		$conn = new Conexao();
		
		$conn->conectaBase();
		
		$this->dados = $_POST;		
		
		$this->dados['senha'] = md5($this->dados['senha']);
		$this->query = "select * from usuario where login='{$this->dados[login]}' and senha='{$this->dados[senha]}'";
		
		//$this->rs = @mysql_query($this->query);
		$this->rs = @mysqli_query($conn->getLink(), $this->query);
		
		// testa se retornou true
		//if( @mysql_num_rows($this->rs) < 1 )
		if( @mysqli_num_rows($this->rs) < 1 )
		{
			$conn->desconecta($conn->getLink());
			echo "<script>location.href='../../index.php?msg=Acesso negado.Verifique seus dados e tente novamente.'</script>";
		}
		else
		{
			@session_start();

			//$this->dados_bd = @mysql_fetch_assoc($this->rs);

			$this->dados_bd = @mysqli_fetch_assoc($this->rs);

			$_SESSION['pf_id']    = $this->dados_bd[''.$this->dados['idUsuario'].''];
			$_SESSION['pf_nome']  = $this->dados_bd['nome'];
			$_SESSION['pf_login'] = $this->dados_bd['login'];
			$_SESSION['pf_senha'] = $this->dados_bd['senha'];
			$_SESSION['pf_tipo']  = $this->dados_bd['tipo'];
			
			$conn->desconecta($conn->getLink());
			
			echo "<script>location.href='../../home.php'</script>";
	    }		
	} 
	// Função para logout	
	public function logout()
	{ 
		@session_start();
		//$_SESSION = array($_SESSION['cc_login'],$_SESSION['cc_senha'],$_SESSION['cc_nome'],$_SESSION['cc_id']);
		unset( $_SESSION['pf_id'] );
		unset( $_SESSION['pf_nome'] );
		unset( $_SESSION['pf_login'] );
		unset( $_SESSION['pf_senha'] );
		
		echo "<script>location.href='../../index.php'</script>";
	}
	// Função para validar o usuário	
	public function valida()
	{ 
		$conn = new Conexao();
		
		$conn->conectaBase();
		
		session_start();
		if (!isset($_SESSION['pf_login']) || !isset($_SESSION['pf_senha']))
		{
			echo "<script>location.href='index.php?msg=Favor logar no sistema'</script>";				
		}
		
		$sql="select * from usuario where login= '$_SESSION[pf_login]' and senha='$_SESSION[pf_senha]'";
		
		//$rs=mysql_query($sql);
		$rs=mysqli_query($conn->getLink(), $sql);
		
		//if (@mysql_num_rows($rs)<1)
		if (@mysqli_num_rows($rs) < 1)
		{
			$conn->desconecta($conn->getLink());
			echo "<script>location.href='index.php?msg=Favor logar no sistema'</script>";
		}
	}
}
?>
