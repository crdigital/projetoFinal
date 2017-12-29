<?php
@session_start();

include "source/php/valida.php";

$conn = new Conexao();
$conn->conectaBase();
$sql = "SELECT * FROM usuario";
$query = @mysqli_query($conn->getLink(), $sql);
?>
<!--
Source: listarUsuarios.php
Função: selecionar todos os usuários armazenados no banco
@author: Clayton da Silva Rodrigues
Data: 04/2015
-->
<!doctype html>
<html lang='pt-br'>
<head>
	<meta charset='UTF-8'>
	<title>App Cadastro de Clientes - Listagem de Usuários</title>
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
<?php if($_SESSION['pf_tipo'] == 'us'){?>
<?php }else{?>
<form name="frmListUsuarios">
<table border="1" bordercolor="#CCC" style="color: blue">
<caption>Listagem de Clientes</caption>
<tr>
	<td>&nbsp;</td>
	<td class="view">ID</td>
	<td class="view">Nome</td>
	<td class="view">Login</td>
	<td class="view">Senha</td>
	<td class="view">Tipo</td>
</tr>
<?php 
	while($linha = @mysqli_fetch_assoc($query)){
?>
<tr>
	<td class="view2"><a href="source/php/trataUsuario.php?idUsuario=<?php echo $linha['idUsuario'];?>&&remover=ok" title="Exclui este usuário do sistema.">Excluir</a></td>
	<td class="view2"><a href="usuarios.php?idUsuario=<?php echo $linha['idUsuario'];?>" title="Clique para editar o Usuário."><?php echo $linha['idUsuario'];?></a></td>
	<td class="view2"><a href="usuarios.php?idUsuario=<?php echo $linha['idUsuario'];?>" title="Clique para editar o usuário."><?php echo $linha['nome'];?></a></td>
	<td class="view2"><a href="usuarios.php?idUsuario=<?php echo $linha['idUsuario'];?>" title="Clique para editar o usuario."><?php echo $linha['login'];?></a></td>
	<td class="view2"><a href="usuarios.php?idUsuario=<?php echo $linha['idUsuario'];?>" title="Clique para editar o usuario."><?php echo $linha['senha'];?></a></td>
	<td class="view2"><a href="usuarios.php?idUsuario=<?php echo $linha['idUsuario'];?>" title="Clique para editar o usuario."><?php echo $linha['tipo'];?></a></td>
</tr>
<?php }?>
<tr>
	<td colspan="7">&nbsp;</td>
</tr>
<tr>
	<td colspan="7" align="center">
		<input type="button" name="btnVoltar" value="Voltar" onclick="location.href='usuarios.php'">
	</td>
</tr>
</table>
</form>
<?php }?>
</div>

<!-- Tratando o retorno das mensagens -->
<?php if($_GET['msgRemoveOk'] == '0'){?>
<script>alert("Usuario removido com sucesso!");</script>
<?php } else if($_GET['msgRemoveErro'] == '1'){?>
<script>alert("Erro ao remover usuario.");</script>
<?php }?>
<!-- Fim Tratando o retorno das mensagens -->


<script src='source/js/jquery.min.js'></script>

<?php $conn->desconecta($conn->getLink());?>
</body>
</html>
