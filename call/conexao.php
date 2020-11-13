<?php

$url=trim($_SERVER['SERVER_NAME']);
if($url=='localhost'){ 
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'calendario';

    
    }else{


$hostname = 'mysql380.umbler.com';
$username = 'irismar_100';
$password = 'irisMAR100';
$database = 'app_escala';
    }
try {
    $conexao = new PDO("mysql:host=$hostname;dbname=$database", $username, $password,
	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	    //echo 'Conexao efetuada com sucesso!';
    }
catch(PDOException $e)
    {
    	echo $e->getMessage();
    }
?>