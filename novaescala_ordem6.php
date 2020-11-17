<? date_default_timezone_set("America/Sao_Paulo");
            $data_incio = mktime(0, 0, 0, date('m')+1 , 1, date('Y')) ;
             $data_in = date('Y-m-d ',$data_incio);
             $data_fim = mktime(23, 59, 59, date('m')+2, date('d')-date('j'), date('Y'));
            $data_fim=  date('Y-m-d ',$data_fim);
           $data_in;
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
             WHERE start BETWEEN '$data_in' AND '$data_fim'  AND id_usuario=:id  AND id_setror=:id_setror ");
             $stmt->bindValue(":id",$id_usuario);
             $stmt->bindValue(":id_setror", $_GET['id']);  
             if ($stmt->execute()) {
                $count = $stmt->rowCount();
                if($count =='0') {
               
                /////////////não tenho evento vou cadastrar
                $date = new DateTime($minha_data);
                $turno=false;
                  ///esse paremtro tem de vim do banco cordenador
                        //////////////////script manual escala HMI//////////////////////////
                        ///rodo 1  /////
                       
                    
                
                        echo"<hr>";  
                        $numero='1';
                        $horas='12';
                        while ($numero < 120) {       
                    if( $numero < 2) {   
                      
                        $date = new DateTime( $data_in );
                        $data=$date->format('d/m/Y ');
                       $data_inicio=$date->format('y-m-d 19:00:00');
                        $data_31= trim($date->format('d') );
                        $date = new DateTime($data_inicio);//$date = new DateTime('2000-01-01');
                        $date_fim=$date->add(new DateInterval('PT12H'));
                      $data_fim= $date_fim->format('y-m-d H:i:s') . "\n";
                      
                        trim($data_31);
                        $horas=$horas+12;   
                       
                        $turno="SN";
                       
                            $stmt = $conexao->prepare("INSERT INTO events(start, end,title,local,nome_usuario,id_usuario,color,id_setror) VALUES (?,?,?,?, ?,?,?,?)");
                            $stmt->bindParam(1, $data_inicio);
                            $stmt->bindParam(2, $data_inicio);
                            $stmt->bindParam(3, $turno);
                            $stmt->bindParam(4, $local);
                            $stmt->bindParam(5, $nome);
                            $stmt->bindParam(6, $id_usuario);
                            $stmt->bindParam(7,  $color);
                            $stmt->bindParam(8,  $id_setor);    
                        $stmt->execute(); 
                       
                       
                       
                       
                    }
                            

                   
                       
                            $date->add(new DateInterval('PT96H'));   
                        


                       
                        $data_inicio=$date->format('Y-m-d H:i:s');
                        $turno=$date->format('H');
                        $data_31= trim($date->format('d') );
                        $data_fim=$date->add(new DateInterval('PT12H'));
                        $data_fim= $date->format('Y-m-d H:i:s') . "\n";
                        $data_31;
                        trim($data_31);
                        if($turno=='07'){$turno="SD";};
                        if($turno=='19'){$turno="SN";};
                       
                            $stmt = $conexao->prepare("INSERT INTO events(start, end,title,local,nome_usuario,id_usuario,color,id_setror) VALUES (?,?,?,?, ?,?,?,?)");
                            $stmt->bindParam(1, $data_inicio);
                            $stmt->bindParam(2, $data_inicio);
                            $stmt->bindParam(3, $turno);
                            $stmt->bindParam(4, $local);
                            $stmt->bindParam(5, $nome);
                            $stmt->bindParam(6, $id_usuario);
                            $stmt->bindParam(7,  $color);
                            $stmt->bindParam(8,  $id_setor);
                        $stmt->execute(); 
                        $numero++;
                        
                        $date->add(new DateInterval('PT24H')); 
                        $data_31= trim($date->format('d') );  
                        
                        $data_inicio=$date->format('Y-m-d H:i:s');
                        $turno=$date->format('H');
                        $data_31= trim($date->format('d') );
                        $data_fim=$date->add(new DateInterval('PT12H'));
                       $data_fim= $date->format('Y-m-d H:i:s') . "\n";
                        if($data_31=='31'){$exiir='0';}else{$exiir='1';}
                        if($turno=='07'){$turno="SD";}
                        if($turno=='19'){$turno="SN";}
                        $stmt = $conexao->prepare("INSERT INTO events(start, end,title,local,nome_usuario,id_usuario,color,id_setror,exibir) VALUES (?,?,?,?,?, ?,?,?,?)");
                        $stmt->bindParam(1, $data_inicio);
                        $stmt->bindParam(2, $data_inicio);
                        $stmt->bindParam(3, $turno);
                        $stmt->bindParam(4, $local);
                        $stmt->bindParam(5, $nome);
                        $stmt->bindParam(6, $id_usuario);
                        $stmt->bindParam(7, $color);
                        $stmt->bindParam(8, $id_setor);
                        $stmt->bindParam(9, $exiir);
                        $stmt->execute(); 
                       
                        $numero++;
                      
                       
                        }


                     
                }  else {
                while ($evento = $stmt->fetch(PDO::FETCH_OBJ)) {
            $evento->nome_usuario;
             $data_evento=$evento->start;
              $data_evento;
             }  }

            }
