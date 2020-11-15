<?php
$agora=date('Y-m-d H:i:s');

$url=trim($_SERVER['SERVER_NAME']);
if($url=='localhost'){ 
    include_once'conexao_local.php';
    
    }else{include_once'conexao_remota.php';}

?>