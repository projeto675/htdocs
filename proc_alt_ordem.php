<?php
include_once "conexao.php";
$array_aulas = $_POST['arrayordem'];
$ntecnico='2';
$cont_ordem = 1;
var_dump($array_aulas);
foreach($array_aulas as $id_aula){


	 
	
	  echo '<br>'. "ordenar par ".$result_aulas = "UPDATE equipe SET ordem_equipe  =$cont_ordem WHERE id = $id_aula";
		$resultado_aulas = mysqli_query($conect , $result_aulas);
		
		$cont_ordem++;
	 
		
	
} 
echo "<span style='color: green;'>Alterado com sucesso</span>";