<?php
@session_start();

include "source/php/valida.php";

$conn = new Conexao();
$conn->conectaBase();

/** 
 * Condição para seleção de clientes e usuários
 */
if($_GET['relCadCli'] == '0')
{

	$sql   = "SELECT * FROM cliente ORDER BY idCliente DESC LIMIT 3";
	$query = @mysqli_query($conn->getLink(),$sql);
}
else if($_GET['relCadUser'] == '0')
{
	$sql   = "SELECT * FROM usuario ORDER BY idUsuario DESC LIMIT 3";
	$query = @mysqli_query($conn->getLink(), $sql);
}
?>
<!--
Source: relatorios.php
Função: imprimir os três últimos clientes e usuários do sistema
@author: Clayton da Silva Rodrigues
Data: 29/09/2014
-->
<!doctype html>
<html lang='pt-br'>
<head>
	<meta charset='UTF-8'>
	<title>App Cadastro de Clientes - Relatórios</title>
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
<legend>Relatórios</legend>	
<table>
<tr>
	<td colspan="3">
		<a href="relatorios.php?relCadCli=0">Últimos Clientes Cadastrados</a>
	</td>
</tr>
<?php if($_GET['relCadCli'] == '0'){?>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr style="border: 1px solid #777;">
	<td width="20">ID</td>
	<td style="color:blue;">Nome do Cliente</td>
	<td style="color:blue;">Data da Inserção</td>
</tr>
<?php while($linha = @mysqli_fetch_assoc($query)){?>
<tr style="border: 1px solid #777;">
	<td width="20">
		<a class="link" href="clientes.php?idCliente=<?php echo $linha['idCliente'];?>"><?php echo $linha['idCliente'];?></a>
	</td>
	<td>
		<a class="link" href="clientes.php?idCliente=<?php echo $linha['idCliente'];?>"><?php echo $linha['nome'];?></a>
	</td>
	<td>
		<a class="link" href="clientes.php?idCliente=<?php echo $linha['idCliente'];?>">
			<?php
				$data = $linha['data_cad'];

				$dt_exp = explode('-', $data); 
				
				$dt_pt = $dt_exp[2].'/'.$dt_exp[1].'/'.$dt_exp[0];

				echo $dt_pt;
			?>
		</a>
	</td>
</tr>
<?php }} else {?>
<?php }?>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr>	
	<td colspan="3">
		<a href="relatorios.php?relCadUser=0">Últimos usuários Cadastrados</a>
	</td>
</tr>
<?php if($_GET['relCadUser'] == '0'){?>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr style="border: 1px solid #777;">
	<td width="20">ID</td>
	<td style="color:blue;">Nome do Usuário</td>
	<td style="color:blue;">Data da Inserção</td>
</tr>
<?php while($linha = @mysqli_fetch_assoc($query)){?>
<tr style="border: 1px solid #777;">
	<?php if($_SESSION['pf_tipo'] == 'ad'){?>
	<td width="20">
		<a class="link" href="usuarios.php?idUsuario=<?php echo $linha['idUsuario'];?>"><?php echo $linha['idUsuario'];?></a>
	</td>
	<td>
		<a class="link" href="usuarios.php?idUsuario=<?php echo $linha['idUsuario'];?>"><?php echo $linha['nome'];?></a>
	</td>	
	<td>
		<a class="link" href="usuarios.php?idUsuario=<?php echo $linha['idUsuario'];?>">
			<?php
				$data = $linha['data_cad'];

				$dt_exp = explode('-', $data); 
				
				$dt_pt = $dt_exp[2].'/'.$dt_exp[1].'/'.$dt_exp[0];

				echo $dt_pt;
			?>
		</a>
	</td>
	<?php }else{?>
	<td width="20"><?php echo $linha['idUsuario'];?></td>
	<td><?php echo $linha['nome'];?></td>	
	<td>		
		<?php
			$data = $linha['data_cad'];
			$dt_exp = explode('-', $data); 
				
			$dt_pt = $dt_exp[2].'/'.$dt_exp[1].'/'.$dt_exp[0];

			echo $dt_pt;
		?>
		
	</td>

	<?php }?>
</tr>
<?php }}?>
</table>
</fieldset>

</div>
<br>
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
<script>alert("Cliente inserido com sucesso! :)");</script>
<?php } else if($_GET['msgInsereErro'] == '1'){?>
<script>alert("Erro ao inserir Cliente. :(");</script>
<?php } else if($_GET['msgEditaOk'] == '0'){?>
<script>alert("Dados do Cliente alterados com sucesso! :)");</script>
<?php } else if($_GET['msgEditaErro'] == '1'){?>
<script>alert("Erro ao alterar o Cliente. :(");</script>
<?php }?>
<!-- Fim Tratando o retorno das mensagens -->


<script src='source/js/jquery.min.js'></script>
<?php $conn->desconecta($conn->getLink());?>



</body>
</html>
