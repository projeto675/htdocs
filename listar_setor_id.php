<?php

if(isset($_GET['setor'])){

$_SESSION['id_para_setor']=$_GET['setor'];
}
$stmt = $conexao->prepare("SELECT id,local,numero_tecnicos_turno,setor,tipo_escala,numero_de_equipes,numero_tec_total  FROM setor  WHERE id=:id    ORDER BY id DESC");
$stmt->bindValue(":id", $_SESSION['id_para_setor']);
$stmt->execute();
//$stmt = $conexao->prepare("SELECT * FROM usuario WHERE nome=$nome");
 if ($stmt->execute()) {
?><table class="table">
<thead>
         <tr>
           <th scope="col">#</th>
           <th scope="col">Local</th>
           <th scope="col">setor</th>
           <th scope="col">Tipo escala</th>
           <th scope="col"> Tecnicos por equipe </th>
           <th scope="col">Número de equipes</th>
           <th scope="col">Total de Tecnicos do  setor</th>
           <th scope="col">Cadastros </th>
         
         </tr>
       </thead><tbody><?
 $count = $stmt->rowCount();
     if($count >0){
    while ($login = $stmt->fetch(PDO::FETCH_OBJ)) {   
        ?>
        <button type="button" class="btn btn-light">cadastrar tecnicos para setor  <?= $login->setor;?> Escala Normal </button>
        <tr>
      <th scope="row"><?=$i_setor= $login->id;?> </th>
      <td><?= $local=$login->local;?> </td>
      <td><?= $nome_setor=$login->setor;?> </td>
      <td><?= $login->tipo_escala;?></td>
      <td><?= $login->numero_tecnicos_turno;?></td>
      <td><?= $N_equipes=$login->numero_de_equipes;?></td>
      <td><?= $numero_tec_total=$login->numero_tec_total;?></td>
   <?///////////////////////////////////////////
   $stmt1 = $conexao->prepare("SELECT id  FROM equipe  WHERE id_setor=:id    ORDER BY id DESC");
   $stmt1->bindValue(":id", $i_setor);
   $stmt1->execute();
   //$stmt = $conexao->prepare("SELECT * FROM usuario WHERE nome=$nome");
    if ($stmt1->execute()) {
     echo  $count1 = $stmt1->rowCount();?>
      <td><?= $count1;?></td>
    </tr>
         </li><?
        
    
    ?> </ul><?
} else{ ?><button type="button" class="btn btn-light">Você  não tem setor cadastrados</button><? }


} } } ?></tbody></table>

