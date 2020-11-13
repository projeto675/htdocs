<?
date_default_timezone_set("America/Sao_Paulo");
$data_incio = mktime(0, 0, 0, date('m')+1 , 1, date('Y')) ;

 $data_in = date('Y-m-d ',$data_incio);echo "<br>";
$nome=$nome_usuario;
$id_user=$id_usuario;
// Pegar o último dia.
$P_Dia = date("Y-m-01");
$U_Dia = date("Y-m-t");
$umDia = new DateInterval('P1D'); // Intervalo de 1 dia
// Com DateTime:
$hoje = new DateTime();
$hoje->format('d/m'); // Saída 20/03
$hoje->add($umDia); // Altera o valor de $hoje
$hoje->format('d/m'); // Saída 21/03
///print "Teste de Data Inicial :: " . $P_Dia . "<br>";
///print "Teste de Data Final :: " . $U_Dia . "<br>";
$minha_data =  date('Y/m/d',$data_incio );echo "<br>";
// Instância um objeto DateTime passando uma data como parâmetro
$date = new DateTime($minha_data);
 // Adicionar 10 dias na data passada no construtor
$date->add(new DateInterval('P1D'));
// Exibe a nova data
 $date->format('d-m-Y');echo "<br>";
// Imprime 2017-10-31
//echo date('d/m/Y h:i:s',$data_incio);echo "<br>";
 $data_fim = mktime(23, 59, 59, date('m')+2, date('d')-date('j'), date('Y'));
echo "datafimm". $data_fim=  date('Y-m-d ',$data_fim);echo "<br>";
echo "datacomeco".$data_in;echo "<br>";
////////////////////////////////////////////////
//fazer conexao para saber qualeuipe chamada //
 /////exibir escals /////////////////////
  $stmt = $conexao->prepare("SELECT * FROM events
WHERE start BETWEEN '$data_in' AND '$data_fim'  AND id_usuario=:id ");
 $stmt->bindValue(":id",$id_usuario);
        if ($stmt->execute()) {
          /* Return number of rows that were deleted */

echo $count = $stmt->rowCount();
print("numero de plantões  $count .\n");
}////se não tiver plantões castrados cadastrar//////////////////////
if($count < 10){  
///////////////// não executar registro se houver mais de 10/////
 $numero = 1;
 $date = new DateTime($minha_data);
$turno=false;
  ///esse paremtro tem de vim do banco cordenador
        //////////////////script manual escala HMI//////////////////////////
        ///rodo 1  /////
        echo "<br>";
    



        $data=$date->format('d/m/Y ');echo "<br>";
        echo "começa ".$data_inicio=$date->format('Y-m-d H:i:s');echo "<br>";
        $date = new DateTime($data_inicio);//$date = new DateTime('2000-01-01');
        $date_fim=$date->add(new DateInterval('PT1H30S'));
        echo "termina".$data_fim= $date_fim->format('Y-m-d H:i:s') . "\n";
       echo "D-primeiro";echo "<br>";
        $turno='SN'." ".$local;     
        ////////////////////////////////////////////////////////////////////////////
        $stmt = $conexao->prepare("INSERT INTO events(start, end,title,local,nome_usuario,id_usuario) VALUES (?,?, ?,?,?,?)");
        $stmt->bindParam(1, $data_inicio);
        $stmt->bindParam(2, $data_fim);
        $stmt->bindParam(3, $turno);
        $stmt->bindParam(4, $local);
        $stmt->bindParam(5, $nome);
        $stmt->bindParam(6, $id_usuario);
        $stmt->execute(); 
        ///2  /////////////////////////
        while($numero <= 9){
        $date->add(new DateInterval('P5D'));    
        $data_inicio=$date->format('Y-m-d H:i:s');echo "<br>";
        echo $numero++."D";echo "<br>";
        $data_fim=$date->add(new DateInterval('PT1H30S'));
        echo "termina".$data_fim= $date->format('Y-m-d H:i:s') . "\n";
        //echo $numero++."N";echo "<br>";
        $turno='SD'." ".$local;     
        ////////////////////////////////////////////////////////////////////////////
        $stmt = $conexao->prepare("INSERT INTO events(start, end,title,local,nome_usuario,id_usuario) VALUES (?,?, ?,?,?,?)");
        $stmt->bindParam(1, $data_inicio);
        $stmt->bindParam(2, $data_fim);
        $stmt->bindParam(3, $turno);
        $stmt->bindParam(4, $local);
        $stmt->bindParam(5, $nome);
        $stmt->bindParam(6, $id_usuario);
        $stmt->execute(); 
        /////////////////////////////////////////////
        if ($numero > 9 ) {
            $stop_insert=true; ///para de executar a consuta se ja foi cadastrado 
            break;
             //mudar turno para noite ///////
                    }
        $date->add(new DateInterval('P1D'));    
        echo "<br>";
        $data_inicio=$date->format('Y-m-d H:i:s');echo "<br>";
        $date->add(new DateInterval('PT1H30S'));
        echo "termina".$data_fim= $date->format('Y-m-d H:i:s') . "\n";
        echo $numero++."N";echo "<br>";
        $turno='SN'." ".$local;  
        /////////////////////////////////////////////
        $stmt = $conexao->prepare("INSERT INTO events(start, end,title,local,nome_usuario,id_usuario) VALUES (?,?, ?,?,?,?)");
        $stmt->bindParam(1, $data_inicio);
        $stmt->bindParam(2, $data_fim);
        $stmt->bindParam(3, $turno);
        $stmt->bindParam(4, $local);
        $stmt->bindParam(5, $nome);
        $stmt->bindParam(6, $id_usuario);
        $stmt->execute(); 
        ///2  /////////////////////////
       
        //echo $numero++;
        //////folgo 3///////
        
       
   


 
} 

///////////////////////
} 