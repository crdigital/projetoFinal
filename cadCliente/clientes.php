<?php
@session_start();

include "source/php/valida.php";

// conecta à base de dados
$conn = new Conexao();
$conn->conectaBase();

/**
 * Caso exista o controlador $_GET['idCliente']
 * seleciona o cliente através do valor de idCliente
 */
if(isset($_GET['idCliente']))
{
	$sql   = "SELECT * FROM cliente WHERE idCliente=".$_GET['idCliente']."";
	//$query = @mysql_query($sql);
	//$linha = @mysql_fetch_assoc($query);	 

	$query = @mysqli_query( $conn->getLink(), $sql );
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
	<title>App Cadastro de Clientes - Clientes</title>
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
<fieldset>
<legend>
	Clientes 
	<?php
		if(isset($_GET['idCliente']))
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
<form name="frmCadCliente" method="post" action="source/php/trataCliente.php">
<input type="hidden" name="acao" value="" >
<input type="hidden" name="idCliente" value="<?php echo $linha['idCliente']?>" >
<tr>
	<td>Nome</td>
	<td>
		<input class="input-large" type="text" name="nome" value="<?php echo $linha['nome'];?>" >
	</td>
</tr>
<tr>
	<td>Endereço</td>
	<td>
		<input class="input-largexx" type="text" name="endereco" value="<?php echo $linha['endereco'];?>" >
	</td>
</tr>
<tr>
	<td>Cep</td>
	<td>
		<input class="input-medium" type="text" name="cep" value="<?php echo $linha['cep'];?>" >
	</td>
</tr>
<tr>
	<td>Cidade</td>
	<td>
		<input class="input-large" type="text" name="cidade" value="<?php echo $linha['cidade'];?>" >
	</td>
</tr>
<tr>
	<td>UF</td>
	<td>
		<input class="input-small" type="text" name="uf" value="<?php echo $linha['uf'];?>" >
	</td>
</tr>
<tr>
	<td>DDD</td>
	<td>
		<input class="input-small" type="text" name="ddd" value="<?php echo $linha['ddd'];?>" >
	</td>
</tr>
<tr>
	<td>Fone</td>
	<td>
		<input class="input-medium" type="text" name="fone" value="<?php echo $linha['fone'];?>" >
	</td>
</tr>
<tr>
	<td>RG</td>
	<td>
		<input class="input-medium" type="text" name="rg" value="<?php echo $linha['rg'];?>" >
	</td>
</tr>
<tr>
	<td>CPF</td>
	<td>
		<input class="input-medium" type="text" name="cpf" value="<?php echo $linha['cpf'];?>" >
	</td>
</tr>
<tr>
	<td>Email</td>
	<td>
		<input class="input-large" type="text" name="email" value="<?php echo $linha['email'];?>" >
	</td>
</tr>
<tr>
	<td>Ocupação</td>
	<td>
		<input class="input-large" type="text" name="ocupacao" value="<?php echo $linha['ocupacao'];?>" >
	</td>
</tr>
<tr>
	<td>Sexo</td>
	<td>
		<select name="sexo">
			<option <?php if($linha['sexo'] == 'm'){echo 'selected';}?> value="m">Masculino</option>
			<option <?php if($linha['sexo'] == 'f'){echo 'selected';}?> value="f">Feminino</option>
		</select>
	</td>
</tr>
<tr>
	<td>Idade</td>
	<td>
		<input class="input-small" type="text" name="idade" value="<?php echo $linha['idade'];?>" >
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
			if(isset($_GET['idCliente'])){			
		?>
		<input type="submit" name="btnEditar" value="Alterar" onclick="document.frmCadCliente.acao.value='editar'">
		<input type="button" name="btnNovo" value="Novo" onclick="location.href='clientes.php'">
		<?php }else{?>
		
		<input type="submit" name="btnCadastar" value="Cadastrar" onclick="document.frmCadCliente.acao.value='inserir'">
		<input type="reset" name="btnLimpar" value="Limpar">
		<?php }?>
	</td>
</tr>
</form>
</table>
</fieldset>

</div>
<br>
<h3><a class="link" href="listarClientes.php">Listar Clientes Cadastrados</a></h3>
</div> 

<ul id="mainNav"> 
<?php include "source/php/menu.php"?>
</ul> 

<div id="footer">
<p> &copy; CR Digital <?php echo @date('Y');?> - Todos os Direitos Reservados </p>
</div>

</div>

<!--Tratando o retorno das mensagens -->
<?php if( isset($_GET['msgInsereOk']) && $_GET['msgInsereOk'] == '0'){?>
<script>alert("Cliente inserido com sucesso! :)");</script>
<?php } else if( isset($_GET['msgInsereErro']) && $_GET['msgInsereErro'] == '1'){?>
<script>alert("Erro ao inserir Cliente. :(");</script>
<?php } else if( isset($_GET['msgEditaOk']) && $_GET['msgEditaOk'] == '0'){?>
<script>alert("Dados do Cliente alterados com sucesso! :)");</script>
<?php } else if(isset($_GET['msgEditaErro']) && $_GET['msgEditaErro'] == '1'){?>
<script>alert("Erro ao alterar o Cliente. :(");</script>
<?php }?>
<!-- Fim Tratando o retorno das mensagens -->


<script src='source/js/jquery.min.js'></script>

<?php 
	
	$conn->desconecta($conn->getLink());
?>

</body>
</html>
