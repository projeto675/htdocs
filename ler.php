<? $arquivo = file_get_contents("http://localhost/list_eventos.php");   
  $n=1;
// Decodifica o formato JSON e retorna um Objeto
$json = json_decode($arquivo);
 
// Loop para percorrer o Objeto
foreach($json as $registro):

  echo  $n;
    echo 'Código: ' . $registro->end . '<br>';
    $n++;
    f($n=)
endforeach;
