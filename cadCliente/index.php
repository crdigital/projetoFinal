<?php
	 //include "source/php/Conexao.class.php";
	
	//$conn = new Conexao();
	//$conn->conectaBase();
	
	// verificando se há alterações a serem feitas em usuários
	
?>
<!--
Source: index.php -- app: cadCliente 
Função: Tela de login do site(app)
@author: Clayton da Silva Rodrigues
Data: 24/09/2014
-->
<!doctype html>
<html lang='pt-br'>
<head>
	<meta charset='UTF-8'>
	<title>App Cadastro de Clientes - Login  </title>
	<link rel='stylesheet' href='source/css/normalize.css'>
	<link rel="stylesheet" href="source/css/login.css">
	<script src='source/js/prefixfree.min.js'></script>
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body onLoad="document.frmLogin.login.focus()">
<div class="divhead"></div>
<div class="divlogin">
<form name="frmLogin" action="source/php/authentic.php" method="post">
	
	<h2 align="center">App Cadastro de Clientes</h2>

	<table align="center" cellpadding="5" cellspacing="5">
		<caption align="center">
			Acesso ao Sistema
		</caption>
		<tr>
			<td>&nbsp;</td>
			<td><input type="text" name="login" placeholder="Login"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="password" name="senha"  placeholder="Senha"></td>
		</tr>	
		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="btnLogar" value="Logar">
				<input type="reset" name="btnLimpar" value="Limpar" title="Limpa o formulário" >
			</td>
		</tr>			
	</table>
</form>
</div>
<div class="divfoot">
	<?php
		if(isset($_GET['msg']))
		{ 
			echo "<p align='center'>".$_GET['msg']."</p>";
		}	
	?>
</div>
<script src='source/js/jquery.min.js'></script>
</body>
</html>
