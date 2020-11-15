<? 
include_once 'conexao.php';
include_once 'topo.php';
include_once'class/class.php';



$stmtz = $conexao->prepare("SELECT *  FROM equipe  WHERE id_setor=:id   ORDER BY ordem_equipe ASC LIMIT 99 ");
$stmtz->bindValue(":id", $_GET['id']);
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
             echo $id_setor=$equipe->id_setor;echo "<br>"; 
           
          
if( $ordem_esquipe=='1'){$color="#8a63d2;";}
if( $ordem_esquipe=='2'){$color="#f66a0a;";}
if( $ordem_esquipe=='3'){$color="#22863a;";}
if( $ordem_esquipe=='4'){$color="#f6f8fa;";}
if( $ordem_esquipe=='5'){$color="#79b8ff;";}
if( $ordem_esquipe=='6'){$color="#ec6cb9;";}

if( $ordem_esquipe=='6'){
      include 'novaescala_ordem6.php';
}else{
  include'novaescala_normal.php';
           

            }
}   } }
?>
