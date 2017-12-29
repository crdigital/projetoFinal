<?php
include "Conexao.class.php";

$dados    = $_POST;
$dadosGet = $_GET;

if($dados['acao'] == 'inserir')
{
//print_r($dados);
	$conn = new Conexao();
	$conn->conectaBase();

	$sql = "INSERT INTO cliente
		(
		nome,
		endereco,
		cep,
		cidade,
		uf,
		ddd,
		fone,
		rg,
		cpf,
		email,
		ocupacao,
		sexo,
		idade,
		data_cad
		)
		VALUES
		(
		'$dados[nome]',
		'$dados[endereco]',
		'$dados[cep]',
		'$dados[cidade]',
		'$dados[uf]',
		'$dados[ddd]',
		'$dados[fone]',
		'$dados[rg]',
		'$dados[cpf]',
		'$dados[email]',
		'$dados[ocupacao]',
		'$dados[sexo]',
		'$dados[idade]',
		NOW()
		)";

		//print_r($sql);
	//$query = mysql_query($sql);
	$query = mysqli_query($conn->getLink(), $sql);

	if( $query )
	{
		$conn->desconecta($conn->getLink());
		echo "<script>location.href='../../clientes.php?msgInsereOk=0'</script>";
	}
	else
	{
		$conn->desconecta($conn->getLink());
		echo "<script>location.href='../../clientes.php?msgInsereErro=1'</script>";
		
	}	
}
else if($dados['acao'] == 'editar' )
{
	$conn = new Conexao();
	$conn->conectaBase();

	$idCliente = $dados['idCliente'];

	$sql = "UPDATE cliente SET
		nome     ='$dados[nome]',
		endereco ='$dados[endereco]',
		cep      ='$dados[cep]',
		cidade   ='$dados[cidade]',
		uf       ='$dados[uf]',
		ddd      ='$dados[ddd]',
		fone     ='$dados[fone]',
		rg       ='$dados[rg]',
		cpf      ='$dados[cpf]',
		email    ='$dados[email]',
		ocupacao ='$dados[ocupacao]',
		sexo     ='$dados[sexo]',
		idade    ='$dados[idade]'
		WHERE idCliente=$idCliente
		";	
	//$query = mysql_query($sql);
	$query = mysqli_query($conn->getLink(), $sql);

	if( $query )
	{
		$conn->desconecta($conn->getLink());
		echo "<script>location.href='../../clientes.php?msgEditaOk=0'</script>";
	}
	else
	{
		$conn->desconecta($conn->getLink());
		echo "<script>location.href='../../clientes.php?msgEditaErro=1'</script>";
		
	}
}
else if($dadosGet['remover'] == 'ok')
{
	$conn = new Conexao();
	$conn->conectaBase();

	$idCliente = $dadosGet['idCliente'];

	$sql = "DELETE FROM cliente WHERE idCliente=$idCliente";

	//$query = mysql_query($sql);
	$query = mysqli_query($conn->getLink(), $sql);

	if( $query )
	{
		$conn->desconecta($conn->getLink());
		echo "<script>location.href='../../listarClientes.php?msgRemoveOk=0'</script>";
	}
	else
	{
		$conn->desconecta($conn->getLink());
		echo "<script>location.href='../../listarClientes.php?msgRemoveErro=1'</script>";
		
	}

	
}
?>
