<? include_once 'conexao.php';
/////////
$meses = array (1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
$diasdasemana = array (1 => "Seg",2 => "Ter",3 => "Qua",4 => "Qui",5 => "Sex",6 => "Sáb",0 => "Dom");
if(isset($_GET['mes'])){
$mes=$_GET['mes'];
$data_incio = mktime(0, 0, 0, date('m')+$mes+1 , 1, date('Y')) ;
$data_quey_fim = mktime(0, 0, 0, date('m')+$mes+2 , 1, date('Y')) ;
$data_fim = mktime(0, 0, 0, date('m')+$mes+2, date('d')-date('j'), date('Y'));
 $data_in = date('Y-m-d ',$data_incio);
 $data_fim= date('Y-m-d ',$data_fim  );
  
  
 $data_quey_fim=  date('Y-m-d ',$data_quey_fim);echo "<br>";
  
$ndias= date("d", strtotime($data_fim)); echo "<br>";

  
}else{  
$data_incio = mktime(0, 0, 0, date('m')+1 , 1, date('Y')) ;
$data_quey_fim = mktime(0, 0, 0, date('m')+2 , 1, date('Y')) ;
$data_fim = mktime(0, 0, 0, date('m')+2, date('d')-date('j'), date('Y'));
$data_in = date('Y-m-d ',$data_incio);
$data_fim=  date('Y-m-d ',$data_fim);
$ndias= date("d", strtotime($data_fim)); 
$data_quey_fim=  date('Y-m-d ',$data_quey_fim);echo "<br>";
}       
   ?>    
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
        <meta http-equiv="Content-Language" content="pt-br">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='css/core/main.min.css' rel='stylesheet' />
        <link href='css/daygrid/main.min.css' rel='stylesheet' />
        <link rel="stylesheet" href="css/bootstrap.min.css?<?=time();?>">
        <script src='js/core/main.min.js'></script>
        <script src='js/interaction/main.min.js'></script>
        <script src='js/daygrid/main.min.js'></script>
        <script src='js/core/locales/pt-br.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="js/personalizado.js"></script>
       <? if(isset($_GET['mes'])&&($_GET['mes']!=0)){?>
          <a href="escala_tabela.php?mes=<?=$_GET['mes']-1;?>"> <<<<</a>
       <?}?>    
  <div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-secondary active">
    <input type="radio" name="options" id="option1" autocomplete="off" checked> <<<<
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="options" id="option2" autocomplete="off"> <<<<
  </label>
  <label class="btn btn-secondary">
    <a href="escala_tabela.php?mes=<?=$_GET['mes']+1;?>"> >>>></a>
  </label>
</div> 
<? if(isset($_GET['mes'])&&($_GET['mes']!=0)){?>
          <a href="escala_tabela.php?mes=<?=$_GET['mes']+1;?>&&id=<?=$_GET['id']?>">>>>></a>
       <?}else { ?>
<a href="escala_tabela.php?mes=1"> >>>></a>
       <? }
        include_once'conexao.php';
        include_once'class/class.php';
        if(!isset ($_SESSION['session'])) {
            include'login.php';
            exit(); } ?> <?
$stmtz = $conexao->prepare("SELECT nome,id_membro,ordem_equipe,id_setor,setor  FROM equipe  WHERE id_setor=:id   ORDER BY ordem_equipe ASC LIMIT 99   ");
$stmtz->bindValue(":id", $_GET['id']);
$stmtz->execute();
if ($stmtz->execute()) {
  $count = $stmtz->rowCount();
    if($count >0){  
      ?> <table class="table table-striped">
      <tr>
    <th scope="row">Dias  <?=""?></th>
<?
$ndias;
$x1='0';
while ($x1< $ndias){
  ?><th scope="row"><?
  $dia_semana= date('d/m/Y', strtotime('+'.$x1.'days', strtotime($data_in)));
  $variavel =$dia_semana;
  $variavel = str_replace('/','-',$variavel);
  $hoje = getdate(strtotime($variavel));
  $diadasemana = $hoje["wday"];
echo  $nomediadasemana = $diasdasemana[$diadasemana];
 ?></th><? $x1++; }?>
     </tr>
      <?     while ($equipe = $stmtz->fetch(PDO::FETCH_OBJ)) {
             $id_usuario=trim($equipe->id_membro);
            $nome_usuario=$equipe->nome;
             $ordem_esquipe=$equipe->ordem_equipe;
             $nome_usuario=$equipe->nome;
             $local=$equipe->setor;
             $id_setor=$equipe->id_setor;   
          
if( $ordem_esquipe=='1'){$color="#8a63d2;";}
if( $ordem_esquipe=='2'){$color="#f66a0a;";}
if( $ordem_esquipe=='3'){$color="#22863a;";}
if( $ordem_esquipe=='4'){$color="#f6f8fa;";}
if( $ordem_esquipe=='5'){$color="#79b8ff;";}
if( $ordem_esquipe=='6'){$color="#ec6cb9;";}
if($_SESSION['nivel']=='user'){
          $query_events = "SELECT id,id_usuario,color ,title,end,exibir FROM events WHERE id_usuario=".$id." AND exibir='1' AND  id_setor=".$id_setor."  ";
        }else{
          $id=$id_usuario;  
       $query_events ="  SELECT id,id_usuario,color ,title,end,exibir FROM events 
          WHERE end BETWEEN '$data_in' AND '$data_quey_fim' AND id_usuario=".$id."   AND exibir='1' AND   id_setror=".$id_setor."  ORDER BY start DESC    ";    
        }
        $resultado_events = $conn->prepare($query_events);
$resultado_events->execute();

$count = $resultado_events->rowCount(); 
$eventos = [];
while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $id = $row_events['id'];
    $title = $row_events['title'];
   
    
$end=date("d", strtotime( $row_events['end']));
    
    $eventos[] = [
        'id' => $id, 
        'turno' => $title, 
      
       
        'end' => $end 
        ];
}

 ///var_dump($eventos);

@$val1= $eventos[9];

@$d1=$val1['end']; 
@$td1=trim($val1['turno']); 

@$val1= $eventos[8];

@$d2=$val1['end'];   
@$td2=$val1['turno']; 
@$val1= $eventos[7];
  
$d3=$val1['end']; 
$td3=$val1['turno']; 
$val1= $eventos[6];
 
$d4=$val1['end']; 
$td4=$val1['turno']; 
$val1= $eventos[5];
 
$d5=$val1['end']; 
$td5=$val1['turno']; 
$val1= $eventos[4];
 
$d6=$val1['end']; 
$td6=$val1['turno']; 
$val1= $eventos[3];

$d7=$val1['end']; 
$td7=$val1['turno']; 
$val1= $eventos[2];

$d8=$val1['end']; 
$td8=$val1['turno']; 
$val1= $eventos[1];
 
$d9=$val1['end']; 
$td9=$val1['turno']; 
$val1= $eventos[0];
 
$d10=$val1['end']; 
$td10=$val1['turno']; 
$n =$ordem_esquipe;

if($n % 2){
  ?><tr class="table-active"><?
}else{
  ?><tr class="table-light"><?
}
?>



<th scope="row"><?= $ordem_esquipe. $nome_usuario;?></th>
   <? $ndias;
$x1='0';

while ($x1< $ndias){
  ?><?  
  $dia= date('d/m/y', strtotime('+'.$x1.'days', strtotime($data_in)));
  $dia_semana= date('d', strtotime('+'.$x1.'days', strtotime($data_in)));
  $variavel =$dia_semana;
  $variavel = str_replace('/','-',$variavel);
  $hoje = getdate(strtotime($variavel));
  $diadasemana = $hoje["wday"];
?> <th scope="row" > 
  <? 
 
   if( ($dia_semana ==$d1 )or($dia_semana ==$d2) or($dia_semana ==$d3)or($dia_semana ==$d4)
     or($dia_semana ==$d5)or($dia_semana ==$d6) or($dia_semana ==$d7)or($dia_semana ==$d8)
     or($dia_semana ==$d9)or($dia_semana ==$d10)){
      if( $dia_semana ==$d1 && $td1=="SD"){ ?><div class="badge badge-success" role="alert"><?= $dia_semana;?> </div> <?}  
      if( $dia_semana ==$d1 && $td1=="SN"){ ?><div class="badge badge-danger  " role="alert"><?= $dia_semana;?> </div> <?}  
      if( $dia_semana ==$d2 && $td2=="SD"){ ?><div class="badge badge-success" role="alert"><?= $dia_semana;?> </div> <?}  
      if( $dia_semana ==$d2 && $td2=="SN"){ ?><div class="badge badge-danger  " role="alert"><?= $dia_semana;?> </div> <?}  
      if( $dia_semana ==$d3 && $td3=="SD"){?><div class="badge badge-success" role="alert"><?= $dia_semana;?> </div> <?}  
      if( $dia_semana ==$d3 && $td3=="SN"){  ?><div class="badge badge-danger  " role="alert"><?= $dia_semana;?> </div> <?} 
      if( $dia_semana ==$d4 && $td4=="SD"){?><div class="badge badge-success" role="alert"><?= $dia_semana;?> </div> <?}  
      if( $dia_semana ==$d4 && $td4=="SN"){  ?><div class="badge badge-danger  " role="alert"><?= $dia_semana;?> </div> <?} 
      if( $dia_semana ==$d5 && $td5=="SD"){?><div class="badge badge-success" role="alert"><?= $dia_semana;?> </div> <?}  
      if( $dia_semana ==$d5 && $td5=="SN"){  ?><div class="badge badge-danger  " role="alert"><?= $dia_semana;?> </div> <?} 
      if( $dia_semana ==$d6 && $td6=="SD"){?><div class="badge badge-success" role="alert"><?= $dia_semana;?> </div> <?}  
      if( $dia_semana ==$d6 && $td6=="SN"){  ?><div class="badge badge-danger  " role="alert"><?= $dia_semana;?> </div> <?} 
      if( $dia_semana ==$d7 && $td7=="SD"){?><div class="badge badge-success" role="alert"><?= $dia_semana;?> </div> <?}  
      if( $dia_semana ==$d7 && $td7=="SN"){  ?><div class="badge badge-danger  " role="alert"><?= $dia_semana;?> </div> <?} 
      if( $dia_semana ==$d8 && $td8=="SD"){ ?><div class="badge badge-success" role="alert"><?= $dia_semana;?> </div> <?}  
      if( $dia_semana ==$d8 && $td8=="SN"){  ?><div class="badge badge-danger  " role="alert"><?= $dia_semana;?> </div> <?} 
      if( $dia_semana ==$d9 && $td9=="SD"){ ?><div class="badge badge-success" role="alert"><?= $dia_semana;?> </div> <?}  
      if( $dia_semana ==$d9 && $td9=="SN"){ ?><div class="badge badge-danger  " role="alert"><?= $dia_semana;?> </div> <?} 
      if( $dia_semana ==$d10 && $td10=="SD"){?><div class="badge badge-success" role="alert"><?= $dia_semana;?> </div> <?}  
      if( $dia_semana ==$d10 && $td10=="SN"){ ?><div class="badge badge-danger  " role="alert"><?= $dia_semana;?> </div> <?} 
       ?>
     <?  

  } else{ ?>
    <div class="badge badge-light" role="alert">
    <?= $dia_semana;?>
  </div><?  

}
  ?>
  
  </th><?
 ?><?
 
$x1++;
  }

?>


    </tr>
  </tbody>

  
<? 
 } ?><?   } } ?></table>    