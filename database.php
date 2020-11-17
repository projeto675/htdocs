<?php

mysqli_report(MYSQLI_REPORT_STRICT);
global $ver;
global $ver_unico;
function open_database() {
	try {
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		return $conn;
	} catch (Exception $e) {
		echo $e->getMessage();
		return null;
	}
}

function close_database($conn) {
	try {
		mysqli_close($conn);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}
$db = open_database(); 
	
	if ($db) {
		
	} else {
		echo '<h1>ERRO: Não foi possível Conectar!</h1>';
		exit();
	}
/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function find( $table = null, $id = null,$regra=null,$ordem=null ) {
  
	$database = open_database();
	$found = null;

	try {
	  if ($id) {
		if($regra){
		$sql = "SELECT * FROM " . $table .$regra . $id . " ". $ordem;	
		$result = $database->query($sql);
		} else{   
		$sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
		$result = $database->query($sql);
		}
	    $nresgistro=[];
		$nresgistro=$result->num_rows;
		
	    if ($result->num_rows > 0) {
			$found = $result->fetch_all(MYSQLI_ASSOC);
			
	    }
	    
	  } else {
	    
	    $sql = "SELECT * FROM " . $table;
	    $result = $database->query($sql);
	    $nresgistro=$result->num_rows;
	    if ($result->num_rows > 0) {
	      $found = $result->fetch_all(MYSQLI_ASSOC);
        
        /* Metodo alternativo
        $found = array();

        while ($row = $result->fetch_assoc()) {
          array_push($found, $row);
        } */
	    }
	  }
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($database);
	return $found;
	return $nresgistro;
}
/**
 *  Pesquisa Todos os Registros de uma Tabela
 */
function find_all( $table ) {
	return find($table);
  }
/**inserrir registro*/  

/**
*  Insere um registro no BD
*/
function save($table = null, $data = null) {

	$database = open_database();
  
	$columns = null;
	$values = null;
  
	//print_r($data);
  
	foreach ($data as $key => $value) {
	  $columns .= trim($key, "'") . ",";
	  $values .= "'$value',";
	}
  
	// remove a ultima virgula
	$columns = rtrim($columns, ',');
	$values = rtrim($values, ',');
	
$sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values)";

	try {
		$database->query($sql);
  
	 echo  $_SESSION['message'] = 'Registro cadastrado com sucesso.';
	  $_SESSION['type'] = 'success';
	
	} catch (Exception $e) { 
	
	 echo  $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
	  $_SESSION['type'] = 'danger';
	} 
  
	close_database($database);
  }
  function add() {

	if (isset($_POST['customer'])) {
	  
	  $today = 
		date_create('now', new DateTimeZone('America/Sao_Paulo'));
  
	   $customer = $_POST['customer'];
	
	 $customer['modified'] = $customer['created'] = $today->format("Y-m-d H:i:s");
	 
	 
	  save('customers', $customer);
	
	}
  }
