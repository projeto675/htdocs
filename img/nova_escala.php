<? 
include_once 'conexao.php';
if(!isset($_SESSION['id_para_setor'])){
    $_SESSION['id_para_setor']=$_GET['id'];
}








$stmtz = $conexao->prepare("SELECT *  FROM equipe  WHERE id_setor=:id   ORDER BY ordem_equipe ASC LIMIT 10 ");
$stmtz->bindValue(":id",  $_SESSION['id_para_setor']);
$stmtz->execute();
if ($stmtz->execute()) {
  $count = $stmtz->rowCount();
    if($count >0){  
         while ($equipe = $stmtz->fetch(PDO::FETCH_OBJ)) {
             echo $id_usuario=trim($equipe->id_membro);echo "<br>";
             echo $nome_usuario=$equipe->nome;echo "<br>";
             echo"ordem=". $ordem_esquipe=$equipe->ordem_equipe;echo "<br>";
             echo $nome_usuario=$equipe->nome;echo "<br>";
             echo $local=$equipe->setor;echo "<br>";

if( $ordem_esquipe=='1'){$color="#8a63d2;";}
if( $ordem_esquipe=='2'){$color="#f66a0a;";}
if( $ordem_esquipe=='3'){$color="#22863a;";}
if( $ordem_esquipe=='4'){$color="#f6f8fa;";}
if( $ordem_esquipe=='5'){$color="#79b8ff;";}
if( $ordem_esquipe=='6'){$color="#ec6cb9;";}
             date_default_timezone_set("America/Sao_Paulo");
             $data_incio = mktime(0, 0, 0, date('m')+1 ,  $ordem_esquipe , date('Y')) ;
             $data_in = date('Y-m-d ',$data_incio);
             $data_fim = mktime(23, 59, 59, date('m')+2, date('d')-date('j'), date('Y'));
             echo "datafimm". $data_fim=  date('Y-m-d ',$data_fim);echo "<br>";
             echo "datacomeco".$data_in;echo "<br>";
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
             $minha_data =  date('01/m/Y' );
             // Instância um objeto DateTime passando uma data como parâmetro
             $date = new DateTime( $data_in );
              // Adicionar 10 dias na data passada no construtor
             $date->add(new DateInterval('P1D'));
             // Exibe a nova data
              $date->format('d-m-Y');
             // Imprime 2017-10-31
             //echo date('d/m/Y h:i:s',$data_incio);echo "<br>";
            
             ////////////////////////////////////////////////
             //fazer conexao para saber qualeuipe chamada //
             /////exibir escals /////////////////////
             $stmt = $conexao->prepare("SELECT * FROM events
             WHERE start BETWEEN '$data_in' AND '$data_fim'  AND id_usuario=:id ");
             $stmt->bindValue(":id",$id_usuario);
             if ($stmt->execute()) {
                $count = $stmt->rowCount();
                if($count =='0') {
                echo "ok vamos adicionar"; echo"<br>";echo"<br>";echo"<br>";echo"<br>";
                /////////////não tenho evento vou cadastrar
                $date = new DateTime($minha_data);
                $turno=false;
                  ///esse paremtro tem de vim do banco cordenador
                        //////////////////script manual escala HMI//////////////////////////
                        ///rodo 1  /////
                        echo "<br>";
                    
                
                        echo"<hr>";  
                        $numero=1;
                        while ($numero < 60) {       
                    if( $numero < 2) {   
                        echo"EEEEEEEEEEEEEEEE "; 
                        $date = new DateTime( $data_in );
                        $data=$date->format('d/m/Y ');echo "<br>";
                        echo "começa ".$data_inicio=$date->format('y-m-d 07:00:00');echo "<br>";
                        echo "turno" . $turno=$date->format('H');echo "<br>";
                        $date = new DateTime($data_inicio);//$date = new DateTime('2000-01-01');
                        $date_fim=$date->add(new DateInterval('PT12H'));
                        echo "termina".$data_fim= $date_fim->format('y-m-d H:i:s') . "\n";
                       
                        if($turno=='00'){$turno="SD";}echo "<br>";
                        if($turno=='19'){$turno="SN";}echo "<br>";
                        $stmt = $conexao->prepare("INSERT INTO events(start, end,title,local,nome_usuario,id_usuario,color) VALUES (?,?,?, ?,?,?,?)");
                        $stmt->bindParam(1, $data_inicio);
                        $stmt->bindParam(2, $data_inicio);
                        $stmt->bindParam(3, $turno);
                        $stmt->bindParam(4, $local);
                        $stmt->bindParam(5, $nome);
                        $stmt->bindParam(6, $id_usuario);
                        $stmt->bindParam(7,  $color);
                       
                        $stmt->execute(); 
                    }
                        
                        echo"<hr>";
                        $date->add(new DateInterval('PT24H'));    
                        echo "começa" . $data_inicio=$date->format('Y-m-d H:i:s');echo "<br>";
                        echo "turno" . $turno=$date->format('H');echo "<br>";
                        $data_fim=$date->add(new DateInterval('PT12H'));
                        echo "termina".$data_fim= $date->format('Y-m-d H:i:s') . "\n";
                       
                        if($turno=='07'){$turno="SD";}echo "<br>";
                        if($turno=='19'){$turno="SN";}echo "<br>";
                        $stmt = $conexao->prepare("INSERT INTO events(start, end,title,local,nome_usuario,id_usuario,color) VALUES (?,?,?, ?,?,?,?)");
                        $stmt->bindParam(1, $data_inicio);
                        $stmt->bindParam(2, $data_inicio);
                        $stmt->bindParam(3, $turno);
                        $stmt->bindParam(4, $local);
                        $stmt->bindParam(5, $nome);
                        $stmt->bindParam(6, $id_usuario);
                        $stmt->bindParam(7,  $color);
                        $stmt->execute();
                         echo"<hr>";
                                

                       
                        $date->add(new DateInterval('PT96H'));    
                        echo "começa" . $data_inicio=$date->format('Y-m-d H:i:s');echo "<br>";
                        echo "turno" . $turno=$date->format('H');echo "<br>";
                        $data_fim=$date->add(new DateInterval('PT12H'));
                        echo "termina".$data_fim= $date->format('Y-m-d H:i:s') . "\n";
                        // echo "termina".$data_fim= $date_fim->format('d-m-Y H:i:s') . "\n";
                       
                        if($turno=='07'){$turno="SD";}echo "<br>";
                        if($turno=='19'){$turno="SN";}echo "<br>";
                        $stmt = $conexao->prepare("INSERT INTO events(start, end,title,local,nome_usuario,id_usuario,color) VALUES (?,?,?, ?,?,?,?)");
                        $stmt->bindParam(1, $data_inicio);
                        $stmt->bindParam(2, $data_inicio);
                        $stmt->bindParam(3, $turno);
                        $stmt->bindParam(4, $local);
                        $stmt->bindParam(5, $nome);
                        $stmt->bindParam(6, $id_usuario);
                        $stmt->bindParam(7,  $color);
                        $stmt->execute(); 
                        echo"<hr>";
                        $numero++;
                        }


                     
                }  else {
                while ($evento = $stmt->fetch(PDO::FETCH_OBJ)) {
             echo "nome=".$evento->nome_usuario."<br>";
             $data_evento=$evento->start;
             echo "Data=". $data_evento."<br>";
             }  }

            }
}   }
}   
?>
