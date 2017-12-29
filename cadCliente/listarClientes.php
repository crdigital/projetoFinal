<?php
@session_start();

include "source/php/valida.php";

$conn = new Conexao();
$conn->conectaBase();
$sql = "SELECT * FROM cliente";
//$query = @mysql_query($sql);
$query = @mysqli_query($conn->getLink(), $sql);
?>
<!--
Source: listarClientes.php
Função: selecionar todos os clientes armazenados no banco
@author: Clayton da Silva Rodrigues
Data: 04/2015
-->
<!doctype html>
<html lang='pt-br'>
<head>
	<meta charset='UTF-8'>
	<title>App Cadastro de Clientes - Listagem de Clientes</title>
	<link rel='stylesheet' href='source/css/normalize.css'>
	<link rel='stylesheet' href='source/css/view.css'>
	<script src='source/js/prefixfree.min.js'></script>
	<script src='source/js/js.js'></script>
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper">
<form name="frmListClientes">
<table border="1" bordercolor="#CCC" style="color: blue">
<caption>Listagem de Clientes</caption>
<tr>
	<td>&nbsp;</td>
	<td class="view">ID</td>
	<td class="view">Nome</td>
	<td class="view">Email</td>
	<td class="view">DDD/Fone</td>
	<td class="view">Cidade</td>
	<td class="view">UF</td>
</tr>
<?php 
	//while($linha = @mysql_fetch_assoc($query)){
	while($linha = @mysqli_fetch_assoc($query)){
?>
<tr>
	<td class="view2"><a href="source/php/trataCliente.php?idCliente=<?php echo $linha['idCliente'];?>&&remover=ok" title="Exclui este cliente do sistema.">Excluir</a></td>
	<td class="view2"><a href="clientes.php?idCliente=<?php echo $linha['idCliente'];?>" title="Clique para editar o cliente."><?php echo $linha['idCliente'];?></a></td>
	<td class="view2"><a href="clientes.php?idCliente=<?php echo $linha['idCliente'];?>" title="Clique para editar o cliente."><?php echo $linha['nome'];?></a></td>
	<td class="view2"><a href="clientes.php?idCliente=<?php echo $linha['idCliente'];?>" title="Clique para editar o cliente."><?php echo $linha['email'];?></a></td>
	<td class="view2"><a href="clientes.php?idCliente=<?php echo $linha['idCliente'];?>" title="Clique para editar o cliente."><?php echo "(".$linha['ddd'].")".$linha['fone']."";?></a></td>
	<td class="view2"><a href="clientes.php?idCliente=<?php echo $linha['idCliente'];?>" title="Clique para editar o cliente."><?php echo $linha['cidade'];?></a></td>
	<td class="view2"><a href="clientes.php?idCliente=<?php echo $linha['idCliente'];?>" title="Clique para editar o cliente."><?php echo $linha['uf'];?></a></td>
</tr>
<?php }?>
<tr>
	<td colspan="7">&nbsp;</td>
</tr>
<tr>
	<td colspan="7" align="center">
		<!--<input type="button" name="btnFechar" value="Fechar" onclick="javascript:fecha();">-->
		<input type="button" name="btnVoltar" value="Voltar" onclick="location.href='clientes.php'">
	</td>
</tr>
</table>
</form>
</div>

<!-- Tratando o retorno das mensagens -->
<?php if($_GET['msgRemoveOk'] == '0'){?>
<script>alert("Cliente removido com sucesso!");</script>
<?php } else if($_GET['msgRemoveErro'] == '1'){?>
<script>alert("Erro ao remover Cliente.");</script>
<?php }?>
<!-- Fim Tratando o retorno das mensagens -->


<script src='source/js/jquery.min.js'></script>

<?php $conn->desconecta($conn->getLink());?>
</body>
</html>
