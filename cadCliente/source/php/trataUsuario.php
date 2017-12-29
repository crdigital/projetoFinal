<?php
include "Conexao.class.php";

$dados    = $_POST;
$dadosGet = $_GET;

if($dados['acao'] == 'inserir')
{
	$conn = new Conexao();
	$conn->conectaBase();

	$senha = md5($dados['senha']);

	$sql = "INSERT INTO usuario
		(
		nome,
		login,
		senha,
		tipo,
		data_cad
		)
		VALUES
		(
		'$dados[nome]',
		'$dados[login]',
		'$senha',
		'$dados[tipo]',
		NOW()
		)";	
	//$query = mysql_query($sql);
	$query = mysqli_query($conn->getLink(), $sql);

	if( $query )
	{
		$conn->desconecta($conn->getLink());
		echo "<script>location.href='../../usuarios.php?msgInsereOk=0'</script>";
	}
	else
	{
		$conn->desconecta($conn->getLink());
		echo "<script>location.href='../../usuarios.php?msgInsereErro=1'</script>";
		
	}	
}
else if($dados['acao'] == 'editar' )
{
	$conn = new Conexao();
	$conn->conectaBase();

	$idUsuario = $dados['idUsuario'];

	$senha = md5($dados['senha']);
	
	// condição que verifica se o campo senha está desabilitado
	// e então realiza a atualização ou não do campo senha
	if( !$dados['senha'] )
	{
		$sql = "UPDATE usuario SET
			nome     ='$dados[nome]',
			login    ='$dados[login]',
			tipo     ='$dados[tipo]'
			WHERE idUsuario=$idUsuario
			";
	}
	else
	{
	
		$sql = "UPDATE usuario SET
			nome     ='$dados[nome]',
			login    ='$dados[login]',
			senha    ='$senha',
			tipo     ='$dados[tipo]'
			WHERE idUsuario=$idUsuario
			";	
	}

	//$query = mysql_query($sql);
	$query = mysqli_query($conn->getLink(), $sql);

	if( $query )
	{
		$conn->desconecta($conn->getLink());
		echo "<script>location.href='../../usuarios.php?msgEditaOk=0'</script>";
	}
	else
	{
		$conn->desconecta($conn->getLink());
		echo "<script>location.href='../../usuarios.php?msgEditaErro=1'</script>";
		
	}
}
else if($dadosGet['remover'] == 'ok')
{
	$conn = new Conexao();
	$conn->conectaBase();

	$idUsuario = $dadosGet['idUsuario'];

	$sql = "DELETE FROM usuario WHERE idUsuario=$idUsuario";

	//$query = mysql_query($sql);
	$query = mysqli_query($conn->getLink(), $sql);

	if( $query )
	{
		$conn->desconecta($conn->getLink());
		echo "<script>location.href='../../listarUsuarios.php?msgRemoveOk=0'</script>";
	}
	else
	{
		$conn->desconecta($conn->getLink());
		echo "<script>location.href='../../listarUsuarios.php?msgRemoveErro=1'</script>";
		
	}

	
}
?>
