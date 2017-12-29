<?php
@session_start();

include "source/php/valida.php";

	$conn = new Conexao();
	$conn->conectaBase();

/**
 * Caso exista o controlador $_GET['idCliente']
 * seleciona o cliente através do valor de idCliente
 */
if(isset($_GET['idUsuario']))
{
	$sql   = "SELECT * FROM usuario WHERE idUsuario=".$_GET['idUsuario']."";
	$query = @mysqli_query($conn->getLink(), $sql);
	$linha = @mysqli_fetch_assoc($query);	 
}
?>
<!--
Source: home.php
Função: Página Home da aplicação
@author: Clayton da Silva Rodrigues
Data: 29/09/2014
-->
<!doctype html>
<html lang='pt-br'>
<head>
	<meta charset='UTF-8'>
	<title>App Cadastro de Clientes - Usuários</title>
	<link rel='stylesheet' href='source/css/normalize.css'>
	<link rel='stylesheet' href='source/css/geral.css'>
	<script src='source/js/prefixfree.min.js'></script>
	<script src='source/js/js.js'></script>
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body onLoad="document.frmCadCliente.nome.focus()">

<div id="wrapper">
<div id="branding">
<?php include "source/php/head.php";?>
</div> 

<div id="content"> 
<p>&nbsp;</p>

<div class="form">
<!-- testando o tipo de usuário -->
<?php
	if($_SESSION['pf_tipo'] == 'us'){
?>
<?php } else { ?>
<fieldset>
<legend>
	Usuários
	<?php
		if(isset($_GET['idUsuario']))
		{ 
			echo "<label class='label'>[Modo edição]</label>";
		}
		else
		{

			echo "<label class='label'>[Modo inserção]</label>";
		}
		
	?> 
</legend>	
<table>
<form name="frmCadUsuario" method="post" action="source/php/trataUsuario.php">
<input type="hidden" name="acao" value="" >
<input type="hidden" name="idUsuario" value="<?php echo $linha['idUsuario']?>" >
<tr>
	<td>Nome</td>
	<td>
		<input class="input-large" type="text" name="nome" value="<?php echo $linha['nome'];?>" >
	</td>
</tr>
<tr>
	<td>Login</td>
	<td>
		<input class="input-large" type="text" name="login" value="<?php echo $linha['login'];?>" >
	</td>
</tr>
<tr>
	<td>Senha</td>
	<td>
	<?php if($_GET['idUsuario']){?>	
		<input class="input-medium" type="password" name="senha" <?php if($_GET['senha'] == 'ativa'){} else{echo 'disabled';}?> value="<?php echo $linha['senha'];?>" >
	<input type="button" name="habilitaSenha" value="Hab" title="Habilita o campo senha" onclick="location.href='usuarios.php?idUsuario=<?php echo $linha['idUsuario'];?>&&senha=ativa'">
	<input type="button" name="desabilitaSenha" value="Desab" title="Desabilita o campo senha" onclick="location.href='usuarios.php?idUsuario=<?php echo $linha['idUsuario'];?>'">
	<?php } else { ?>
		<input class="input-medium" type="password" name="senha" value="<?php echo $linha['senha'];?>" >
	<?php }?>
	</td>
</tr>
<tr>
	<td>Tipo</td>
	<td>
		<select name="tipo">
			<option <?php if($linha['tipo'] == 'ad'){echo 'selected';}?> value="ad">Administrador</option>
			<option <?php if($linha['tipo'] == 'us'){echo 'selected';}?> value="us">Usuário Comum</option>
		</select>
	</td>
</tr>
<tr>
	<td colspan="2">
	&nbsp;
	<hr>
	&nbsp;
	</td>
</tr>
<tr>
	<td colspan="2" align="center">
		<?php 
			if($_GET['idUsuario']){			
		?>
		<input type="submit" name="btnEditar" value="Alterar" onclick="document.frmCadUsuario.acao.value='editar'">
		<input type="button" name="btnNovo" value="Novo" onclick="location.href='usuarios.php'">
		<?php }else{?>
		
		<input type="submit" name="btnCadastar" value="Cadastrar" onclick="document.frmCadUsuario.acao.value='inserir'">
		<input type="reset" name="btnLimpar" value="Limpar">
		<?php }?>
	</td>
</tr>
</form>
</table>
</fieldset>
<?php }?>
</div>
<br>

<?php if($_SESSION['pf_tipo'] == 'us'){?>
<?php } else {?>
<h3><a class="link" href="listarUsuarios.php" >Listar Usuários Cadastrados</a></h3>
<?php }?>
</div> 

<ul id="mainNav"> 
<?php include "source/php/menu.php"?>
</ul> 

<div id="footer">
<p> &copy; CR Digital <?php echo @date('Y');?> - Todos os Direitos Reservados </p>
</div>

</div>

<!--Tratando o retorno das mensagens -->
<?php if($_GET['msgInsereOk'] == '0'){?>
<script>alert("Usuario inserido com sucesso! :)");</script>
<?php } else if($_GET['msgInsereErro'] == '1'){?>
<script>alert("Erro ao inserir usuario. :(");</script>
<?php } else if($_GET['msgEditaOk'] == '0'){?>
<script>alert("Dados do usuario alterados com sucesso! :)");</script>
<?php } else if($_GET['msgEditaErro'] == '1'){?>
<script>alert("Erro ao alterar o usuario. :(");</script>
<?php }?>
<!-- Fim Tratando o retorno das mensagens -->


<script src='source/js/jquery.min.js'></script>

<?php $conn->desconecta($conn->getLink());?>

</body>
</html>
