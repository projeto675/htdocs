<? 
include_once'topo.php';
coordenador();


include_once'menu_superior.php';
if(isset($_POST['customer'])){
  $customer=[];
  $customer=$_POST['customer'];
 
  //$post= $customer['3'];
//////fazer o calculo o numero e tecnicos totais
///para 12X24X12X96 precisa de 6 quipes 120horas casa 
if($customer ["'tipo_escala'"]=='12X24X12X96'){$n='6';}
if($customer ["'tipo_escala'"]=='12X36'){$n='4';}
$customer['numero_de_equipes']=$n;
$customer['numero_tec_total']=$customer ["'numero_tecnicos_turno'"]*$n;
$customer['id_cordenador']=$_SESSION['id'];
$customer['local']=trim($_SESSION['local_trabalho']);
$customer['data']=$agora;
//var_dump($customer);
save('setor', $customer);   
exit();
    $setor=trim( $_POST['setor']);
    $id_cordenador=trim($_SESSION['id']);
    $local_trabalho=trim($_SESSION['local_trabalho']);

    $stmt = $conexao->prepare("INSERT INTO setor (setor,id_cordenador,local,tipo_escala,numero_tecnicos_turno,numero_tec_total,numero_de_equipes) VALUES (?,?,?,?,?,?,?)");
    $stmt->bindParam(1,$setor);
    $stmt->bindParam(2,$id_cordenador);
    $stmt->bindParam(3,$local_trabalho);
    $stmt->bindParam(4,$_POST['tipo_escala']);
    $stmt->bindParam(5,$_POST['numero_tecnicos_turno']);
    $stmt->bindParam(6,$ntecnicos);
    $stmt->bindParam(7,$n);
    $cad_user_ok=$stmt->execute();   
    if($cad_user_ok){ 
    $_SESSION['envio']="1";
    }  else {echo "erro ao gravar"; }       
     
}

?>
<div class="alert alert-secondary" role="alert">
  <h4 class="alert-heading">Nessa Etapa </h4>
  <p>Você fará cadastro os setores de sua coordenação e as equipes de enfermagem </p>
  <hr>
 
</div>
<form role="form" method="post">        
  <form class="needs-validation" novalidate>
  <div class="form-row">
    <div class="col-md-6 mb-3">
    <label for="validationCustom04">Setor</label>
      <input type="text" class="form-control"  name="customer['setor']"  id="validationCustom01" placeholder="Setor" required>
      <small id="passwordHelpBlock" class="form-text text-muted">
 ex UTI Clínica Médica Pronto Socorro </small><div class="valid-feedback">
       ok
      </div>
    </div>
    <div class="col-md-5 mb-3">
      <label for="validationCustom04">Número técnicos por plantao </label>
      <select class="custom-select" name="customer['numero_tecnicos_turno']" id="validationCustom04" required>
        <option selected disabled value="2">Número de Técnicos por  plantão </option>
        <option value='1'>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5 </option>
        <option>6</option>
      </select>
      <div class="invalid-feedback">
        Please select a valid state.
      </div>
    </div>  
     
     
    <div class="col-md-12 mb-3"><h4>Tipo de Escada</h4>	 </div> 
    
    <div class="col-md-6 mb-3">
    <input class="form-check-input" type="radio"  name="customer['tipo_escala']"   id="exampleRadios1" value="12X24X12X96" checked>
    <label class="form-check-label" for="exampleRadios1">
    SD,FN,FD,SN,24H,24H,24H,24H,
    </label>
    <small id="passwordHelpBlock" class="form-text text-muted">
    12X24X12X96
  </small>
    </div>

  <div class="col-md-6 mb-3">
      <input class="form-check-input" type="radio" name="customer['tipo_escala']" id="exampleRadios1" value="12X36" >
      <label class="form-check-label" for="exampleRadios1">
       SD,FN,FD,FN 
      </label>
      <small id="passwordHelpBlock" class="form-text text-muted">12X36
      </small>
  </div> 
   </div></div>  </div>  
  <div class="form-group">
   
  </div>
  <input type="hidden" name="session" value="<?=session_id();?>" />
  <button class="btn btn-primary" type="submit">Salvar</button>
</form>
<br>
<? include_once'listar_setor.php';?>
<div class="alert alert-secondary" role="alert">
  <h4 class="alert-heading">Proxima Etapa </h4>
  <p>Você fará cadastro os setores de sua coordenação e as equipes de enfermagem </p>
  <hr>
 
</div>

<script type="text/javascript">
/////////////////////////////////////script para impedir reemvio pelo botão atualizar//
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
///////////////////////////////////////////////////////////////////////////////////////
// Example starter JavaScript for disabling form submissions if there are invalid fields

</script>