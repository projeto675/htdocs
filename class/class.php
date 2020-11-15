<? 
function   coordenador(){
    if($_SESSION['nivel']=="user"){ 
    echo "voce não tem permissão para  acessar essa pagina";
    exit();}
}
function uniqueAlfa($length=16)
{
 $salt = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
 $len = strlen($salt);
 $pass = '';
 mt_srand(10000000*(double)microtime());
 for ($i = 0; $i < $length; $i++)
 {
   $pass .= $salt[mt_rand(0,$len - 1)];
 }
 return $pass;
}
include_once'conexao.php';
 class cadastrar{
 public function setor_coodenador() {
    include_once'conexao.php';
$stmt = $conexao->prepare("SELECT *FROM usuario   limit 20 ");

$stmt->execute();
//$stmt = $conexao->prepare("SELECT * FROM usuario WHERE nome=$nome");
 if ($stmt->execute()) {
/* Return number of rows that were deleted */
$count = $stmt->rowCount();
     if($count >0){
         ?> <ul class="navbar-nav">
             <div class="col-md-12 ">  
             <?
    while ($login = $stmt->fetch(PDO::FETCH_OBJ)) {
        ?><li class="nav-item active">
        <a class="nav-link" style="color: #343a40;" onClick="fill('<?= $login->nome;?> <?= $login->sobrenome;?>  <?= $login->local_trabalho;?>');" href="#"><?= $login->nome;?> <?= $login->sobrenome;?> <?= $login->local_trabalho;?> <span class="sr-only">(Página atual)</span></a>
      </li><?
        
    }
    ?> </ul><?
}


} 
} 
 }
function ultimaplantao($id,$id_setor){
  $conexao = new PDO("mysql:host=localhost; dbname=app_escala", "root", "");
  $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conexao->exec("set names utf8"); 
  $stmt = $conexao->prepare("SELECT id_setror,end,id_usuario FROM events   limit 20 ");
  $stmt->execute();
  $count = $stmt->rowCount();
     if($count =  0){
       $resutado='primeiro';
       return $resutado;

     }else{
      while ($platao = $stmt->fetch(PDO::FETCH_OBJ)) {
        $platao->end; 
        $resutado=$platao->end;
        return $resutado;

    }     
     }
    

}