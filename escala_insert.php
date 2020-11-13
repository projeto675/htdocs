<?
$data_incio = mktime(0, 0, 0, date('m')+1 ,  $ordem_esquipe , date('Y')) ;
$data_in = date('Y-m-d ',$data_incio);
$data_fim = mktime(23, 59, 59, date('m')+2, date('d')-date('j'), date('Y'));

echo "datacomeco".$data_in;echo "<br>"; 
$numero='1';
$horas='12';
//while ($numero < 10) {  
  $stmt22 = $conexao->prepare("SELECT id_usuario,id_setror,start,end,title FROM events  WHERE id_setror=:id_setror  AND id_usuario=:id_usuario  ORDER BY end DESC LIMIT 1  ");
  $stmt22->bindValue(":id_usuario",$id_usuario);
  $stmt22->bindValue(":id_setror",$id_setor);
  $stmt22->execute();
  echo'<br>';
  echo  "número de plntçoes".$count = $stmt22->rowCount();
  echo'<br>';
     if($count ==0){
       $resutado='primeiro plantao';
 echo "adicionar um planta aqui segundo o promeir dia de plantao ";  
  /////////////////////////////////////////////////////////////////
                        $date = new DateTime($data_in );
                        $data_31= trim($date->format('d') );
                        $data=$date->format('d/m/Y ');echo "<br>";
                        echo "começa ".$data_inicio=$date->format('y-m-d 07:00:00');echo "<br>";
                        echo "turno" . $turno=$date->format('H');echo "<br>";
                         //$date = new DateTime('2000-01-01');
                        $date_fim=$date->add(new DateInterval('PT12H'));
                        echo "termina".$data_fim= $date_fim->format('y-m-d H:i:s') . "\n";
                        if($turno=='00'){$turno="SD";}echo "<br>";
                        if($turno=='19'){$turno="SN";}echo "<br>";
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
  //////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////
     } if($count ==1){


      while ($platao= $stmt22->fetch(PDO::FETCH_OBJ)) {
        $platao->end; 
        $resutado=$platao->title;
        $ultimo_plantoa=$platao->start;
      echo'<br>'. $resutado.'<br>';
      ///////////////////////////////////////////////////////////////////////////////
      
      if($resutado=='SD'){
        $date = new DateTime( $ultimo_plantoa);
        $date->add(new DateInterval('PT36H'));  
        //////adicono 36h orasparaproximo plantao
        echo "adicionar plantao Noite"; 
        echo "começa" . $data_inicio=$date->format('Y-m-d H:i:s');echo "<br>";
        $data_31= trim($date->format('d') );
        echo "turno" . $turno=$date->format('H');echo "<br>";
        $data_fim=$date->add(new DateInterval('PT12H'));
        echo "termina".$data_fim= $date->format('Y-m-d H:i:s') . "\n";
        if($turno=='07'){$turno="SD";}echo "<br>";
        if($turno=='19'){$turno="SN";}echo "<br>";
            
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
       
        echo'<br>';  
      }
      /////////////////////////////////////////////////////////////////////////////
     /////////se o útimoplantão or noite proximo plantaa para 96H
     if($resutado=='SN'){
        echo "adicionar plantao Dia 4 dias de Folga"; 
        $date = new DateTime( $ultimo_plantoa);
        $date->add(new DateInterval('PT108H'));  
        //////adicono 96horasparaproximo plantao
        echo "adicionar plantao Noite"; 
        echo "começa" . $data_inicio=$date->format('Y-m-d H:i:s');echo "<br>";
        $data_31= trim($date->format('d') );
        echo "turno" . $turno=$date->format('H');echo "<br>";
        $data_fim=$date->add(new DateInterval('PT12H'));
        echo "termina".$data_fim= $date->format('Y-m-d H:i:s') . "\n";
        if($turno=='07'){$turno="SD";}echo "<br>";
        if($turno=='19'){$turno="SN";}echo "<br>";
           
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
        
        echo'<br>'; 
        ///////////////////////////////////////////////////////////////////////
     }
    }     
     }  //}////laço parafazer a pagina executar 60vezes