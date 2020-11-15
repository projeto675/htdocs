<?php
/** O nome do banco de dados*/
define('DB_NAME', 'app_escala');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');
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
		echo '<h1>Banco de Dados Conectado!</h1>';
	} else {
		echo '<h1>ERRO: Não foi possível Conectar!</h1>';
	}
/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function find( $table = null, $id = null ) {
  
	$database = open_database();
	$found = null;

	try {
	  if ($id) {
	    $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
	    $result = $database->query($sql);
	    
	    if ($result->num_rows > 0) {
	      $found = $result->fetch_assoc();
	    }
	    
	  } else {
	    
	    $sql = "SELECT * FROM " . $table;
	    $result = $database->query($sql);
	    
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
