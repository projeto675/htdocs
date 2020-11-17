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

if( $ordem_esquipe=='6'){
      include 'novaescala_ordem6.php';
}else{
  include'novaescala_normal.php';
           

            }
}   } }
?>
 <div class="card text-center">
  <div class="card-body">
  <h5 class="card-title">Escala Gerada Com Sucesso  </h5>
  <p class="card-text"></p>
  <a href="/escala_tabela.php?id=<?=$_GET['id'];?>" class="btn btn-primary">Clik Aqui para Visualizar.</a>
  </div>
  <div class="card-footer text-muted">
   
  </div>
</div>