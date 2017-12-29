<?php
//$dados = $_POST;

//print_r($dados);


include "Authentic.class.php";

$check = new Authentic();
$check->login();

?>