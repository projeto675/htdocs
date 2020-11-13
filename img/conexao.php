<?php
$url=trim($_SERVER['SERVER_NAME']);
if($url=='localhost'){ 
    include_once'conexao_local.php';
    
    }else{include_once'conexao_remota.php';}

?>