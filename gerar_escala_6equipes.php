<? 
include_once 'conexao.php';
if(!isset($_SESSION['id_para_setor'])){
    $_SESSION['id_para_setor']=$_GET['id'];
}
$stmtz = $conexao->prepare("SELECT *  FROM equipe  WHERE id_setor=:id   ORDER BY ordem_equipe ASC LIMIT 1000 ");
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
             if($ordem_esquipe=="6" ){ echo "eu sou equipe 6";

////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
include'miolo_escala_equipe_6.php';
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
          }else{
include'miolo_escala_normal.php';


////não realizar casatro se maior de 10 plantoes mes 

 

 



} }   }
}   
?>