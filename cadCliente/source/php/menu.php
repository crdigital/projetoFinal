<?php

echo '<li class="first" title="Home"><a href="home.php">Home</a></li>'; 
echo '<li><a href="clientes.php" title="Gerenciar Clientes">Clientes</a></li>';
// testando se o usuário é usuário comun
// e restringindo seu acesso
if($_SESSION['pf_tipo'] == 'us'){
echo '<li><a href="#" title="Acesso restrito &agrave; administradores do sistema.">Usu&aacute;rios</a></li>';
}else {
echo '<li><a href="usuarios.php" title="Gerenciar Usu&aacute;rios">Usu&aacute;rios</a></li>'; 
}
echo '<li><a href="relatorios.php" title="Visualizar Relat&oacute;rios">Relat&oacute;rios</a></li>';

?>
