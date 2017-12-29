<?php
@session_start();

include "source/php/valida.php";
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
	<title>App Cadastro de Clientes - Home</title>
	<link rel='stylesheet' href='source/css/normalize.css'>
	<link rel='stylesheet' href='source/css/geral.css'>
	<script src='source/js/prefixfree.min.js'></script>
	<script src='source/js/js.js'></script>
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper">
<div id="branding">
<?php include "source/php/head.php";?>
</div> 

<div id="content"> 
<p>&nbsp;</p>
<h3>Seja bem vindo ao aplicativo Cadastro de clientes!</h3>	
<p>Utilize o menu ao lado para efetuar as tarefas desejadas.</p>
</div> 

<ul id="mainNav"> 
<?php include "source/php/menu.php"?>
</ul> 

<div id="footer">
<p> &copy; CR Digital <?php echo date('Y');?> - Todos os Direitos Reservados </p>
</div>


</div>

<script src='source/js/jquery.min.js'></script>
</body>
</html>
