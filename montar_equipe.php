montar equipe <? include_once'topo.php';
include_once'menu_superior.php';
include'listar_setor_id.php';
if($_GET['ordem']=='1' ||  $_GET['ordem']=='2'  ||  $_GET['ordem']=='0'){
  $ordem="1";
   $ordem="1";
 }
 if($_GET['ordem']=='3' ||  $_GET['ordem']=='4'){
  $ordem="2";
 }
 if($_GET['ordem']=='5' ||  $_GET['ordem']=='6'){
  $ordem="3";
 }
 if($_GET['ordem']=='7' ||  $_GET['ordem']=='8'){
  $ordem="4";
 }
 if($_GET['ordem']=='9' ||  $_GET['ordem']=='10'){
  $ordem="5";
 }
 if($_GET['ordem']=='11' ||  $_GET['ordem']=='12'){
  $ordem="6";
 }
 //////////////////////////////////////////////////
 if($_GET['ordem']=='1' ||  $_GET['ordem']=='0')  {

   $V_ordem="1";
 }
 if($_GET['ordem']=='2' ||  $_GET['ordem']=='3'){
  $V_ordem="2";
 }
 if($_GET['ordem']=='4' ||  $_GET['ordem']=='5'){
  $V_ordem="3";
 }
 if($_GET['ordem']=='6' ||  $_GET['ordem']=='7'){
  $V_ordem="4";
 }
 if($_GET['ordem']=='8' ||  $_GET['ordem']=='9'){
  $V_ordem="5";
 }
 if($_GET['ordem']=='10' ||  $_GET['ordem']=='11'){
  $V_ordem="6";
 }


if(isset($_POST['nome_tecnico'])){
  trim($_POST['nome_tecnico']);
  $post=explode("/",$_POST['nome_tecnico']);
  /////ver listar_membros.php 21/////
  $id_membro=$post['0'];
  $nome_membro=$post['1'];
  $post['2'];
  
    $stmt = $conexao->prepare("INSERT INTO equipe (nome,setor,id_setor,id_membro,tipo_escala,ordem_equipe) VALUES (?,?,?,?,?,?)");
    $stmt->bindParam(1,$nome_membro);
    $stmt->bindParam(2,$nome_setor);
    $stmt->bindParam(3,$i_setor);
    $stmt->bindParam(4,$id_membro);
    $stmt->bindParam(5,$_POST['tipo_escala']); 
    $stmt->bindParam(6,$ordem); 
     $cad_user_ok=$stmt->execute();   
    if($cad_user_ok){ 
    $_SESSION['envio']="1";
    }  else {echo "erro ao gravar"; }       
     

}
////////////////////////////////se input//////
if(isset($_POST['nome_tecnico_cad'])){ 
  // include "conexao.php";
  $nome=trim($_POST['nome_tecnico_cad']);
  $sobre_nome=trim($_POST['sobre_nome_tecnico_cad']);
  $data=date('y-m-d h:i:s');
  $session=uniqueAlfa(11);
  $codigo_acesso= uniqueAlfa(4);
  $stmt = $conexao->prepare("INSERT INTO usuario (nome,sobrenome,data_cadastro,session,codigo_acesso) VALUES (?,?, ?,?,?)");
  $stmt->bindParam(1, $nome);
  $stmt->bindParam(2, $sobre_nome);
  $stmt->bindParam(3, $data);
  $stmt->bindParam(4, $session);
  $stmt->bindParam(5, $codigo_acesso);
  $cad_user_ok=$stmt->execute();   
  if($cad_user_ok){ 
  $_SESSION['envio']="1";
 }  

///agora preiso recuperar o ultimo id 
$stmt=$conexao->prepare("SELECT id FROM usuario    ORDER BY id DESC limit 1 ");
$stmt->execute(); 
if ($stmt->execute()) {
/////se executou exibir
echo $count = $stmt->rowCount();
///contar quntos resgistro
while ($login = $stmt->fetch(PDO::FETCH_OBJ)) {
 $ultimo_id=$login->id;
} }
//SELECT LAST_INSERT_ID() INTO @tabela
////////////grava nome o usurio nessa equipe///////
  //trim($_POST['nome_tecnico']);
  //$post=explode("/",$_POST['nome_tecnico']);
  /////ver listar_membros.php 21/////
  //$id_membro=$post['0'];
  $nome_membro=$_POST['nome_tecnico_cad']. " ".$_POST['sobre_nome_tecnico_cad'];
  
  $stmt = $conexao->prepare("INSERT INTO equipe (nome,setor,id_setor,id_membro,tipo_escala,ordem_equipe) VALUES (?,?,?,?,?,?)");
  $stmt->bindParam(1,$nome_membro);
  $stmt->bindParam(2,$nome_setor);
  $stmt->bindParam(3,$i_setor);
  $stmt->bindParam(4,$ultimo_id);
  $stmt->bindParam(5,$_POST['tipo_escala']); 
  $stmt->bindParam(6,$ordem);
  $cad_user_ok=$stmt->execute();   
  if($cad_user_ok){ 
  $_SESSION['envio']="1";
  }  else {echo "erro ao gravar"; }      
////////////fim gravar////////////////////////////
}

///////////////////////////////////////////////



$i_setor=@$_GET['setor'];
$stmt = $conexao->prepare("SELECT *  FROM equipe  WHERE id_setor=:id    ORDER BY id DESC");
$stmt->bindValue(":id", $i_setor);

$stmt->execute();
//$stmt = $conexao->prepare("SELECT * FROM usuario WHERE nome=$nome");
 if ($stmt->execute()) {

echo  $count = $stmt->rowCount();
     if($count > $numero_tec_total){ ?>
      
    
    




<div class="card border-secondary col-md-12" >
  <h5 class="card-header">Cadastrar Equipe <?=$V_ordem;?></h5>
  <div class="card-body text-secondary">
  
   


   <form role="form" method="post" action="?ordem=<?=trim($_GET['ordem'])+1;?>" > 
   <div class="form-row col-md-12">
   
   <div class="col-md-8 mb-3">
    <label for="validationCustom04">Nome</label>       
              <input type="text"   name="nome_tecnico"  class="form-control" autocomplete="off" placeholder="Nome do Membro"  value="" id="inputString" onKeyUp="lookup(this.value);" onBlur="fill();" />
              <div class="suggestionsBox " id="suggestions" style="display: none;">
              <div class="suggestionList" id="autoSuggestionsList"></div>
              </div>
   </div>
   <div class="col-md-2 mb-3">
      <label for="validationCustom04">tipo escala </label>
      <select class="custom-select" name="tipo_escala" id="validationCustom04" required>
        <option selected value="normal" >Normal</option>
        <option  value="exta" >Extra</option>
        <option value="meia escala" >Meia Escala</option>
        <option valuer="outras"  >outras</option>
        </select>
   </div>  

  <div class="col-md-2 mb-3"> 
  <label for="validationCustom04"><br></label>
       <input type="hidden" name="session" value="<?=session_id();?>" />
       <button class="btn btn-primary form-control" type="submit">Salvar</button></div>
  </div>
</div>
</div></div>
</div>  
</form>
</div>
</div>
<ol class="breadcrumb">
<li class="breadcrumb-item active" aria-current="page">Para cadastrar Menbro e aiciona-lo a essa equeipe prencha campo abaixo </li>
</ol>
<form role="form" method="post" action="?ordem=<?=trim($_GET['ordem'])+1;?>" > 
   <div class="form-row col-md-12">
   
   <div class="col-md-3 mb-3"><label for="validationCustom04"> Nome</label>
   <input type="text"   name="nome_tecnico_cad"  class="form-control" placeholder="Nome "   />
   </div>
   <div class="col-md-5 mb-3">
   <label for="validationCustom04"> Sobre nome</label>
   <input type="text"   name="sobre_nome_tecnico_cad"  class="form-control" placeholder="Sobre Nome"   />
   </div>

   <div class="col-md-2 mb-3">
      <label for="validationCustom04">tipo escala </label>
      <select class="custom-select" name="tipo_escala" id="validationCustom04" required>
        <option selected value="normal" >Normal</option>
        <option  value="exta" >Extra</option>
        <option value="meia escala" >Meia Escala</option>
        <option valuer="outras"  >outras</option>
        </select>
   </div>  
   <div class="col-md-1 mb-3"> 
   <label for="validationCustom04"><br> </label>
       <input type="hidden" name="session" value="<?=session_id();?>" />
       <button class="btn btn-primary form-control" type="submit">Salvar</button></div>
  </div>
</div>
</div></div>
</div>  
</form>  

 <?   } else{  
   //////////////////se escala completa///////
   ?> 
 <div class="card text-center">
  
  <div class="card-body">
    <h5 class="card-title">Cadastro a  equipe Concluio </h5>
    <p class="card-text">Clik em gerar escala para gerar escala do proximo mês .</p>
    <a href="/nova_escala.php?id=<?=$_SESSION['id_para_setor'];?>" class="btn btn-primary">Gerar Escala</a>
  </div>
  <div class="card-footer text-muted">
    2 dias atrás
  </div>
</div>
 <?}
   }?>
<? include_once'listar_equipe.php'; ?>
<script>
/////////////////////////////////////script para impedir reemvio pelo botão atualizar//
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
// Utilizando JQuery
jQuery('cinputString').attr('autocomplete','off');
// Ou Javascript padrão
campo.setAttribute('autocomplete','off');
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
 'use strict';
 window.addEventListener('load', function() {
   // Fetch all the forms we want to apply custom Bootstrap validation styles to
   var forms = document.getElementsByClassName('needs-validation');
   // Loop over them and prevent submission
   var validation = Array.prototype.filter.call(forms, function(form) {
     form.addEventListener('submit', function(event) {
       if (form.checkValidity() === false) {
         event.preventDefault();
         event.stopPropagation();
       }
       form.classList.add('was-validated');
     }, false);
   });
 }, false);
})();
</script>


 

</form>

<script type="text/javascript">
 function lookup(inputString) {
   if(inputString.length == 0) {
     // Hide the suggestion box.
     $('#suggestions').hide();
   } else {
     $.post("listar_membros.php", {queryString: ""+inputString+""}, function(data){
       if(data.length >1) {
         $('#suggestions').show();
         $('#autoSuggestionsList').html(data);
       }
     });
   }
 } 
 
 function fill(thisValue) {
   $('#inputString').val(thisValue);
   setTimeout("$('#suggestions').hide();", 200);
 }
</script>