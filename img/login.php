<? if(isset($_SESSION['session'])&&($_SESSION['session']!='')){

echo "usuario jalogou";
}else
include_once'conexao.php';
?>
<style>
  
.simple-login-container{
    width:300px;
    max-width:100%;
    margin:50px auto;
}
.simple-login-container h2{
    text-align:center;
    font-size:20px;
}

.simple-login-container .btn-login{
    background-color:#FF5964;
    color:#dc3545;
}
a{
    color:#dc3545;
}
</style>    
<? if(!isset($_SESSION) ){
        session_start();
        session_id();

    }
    if (isset($_POST) &&(!empty($_POST)) && $_POST['session']==session_id()){
   echo  $nome=$_POST['nome'];
   echo  $senha=$_POST['senha'];

    if(isset($_POST['cod_acesso'])&&$_POST['cod_acesso']!=''){
      echo  trim($_POST['cod_acesso']);
        $stmt = $conexao->prepare("SELECT * FROM usuario WHERE codigo_acesso= :codigo_acesso ");
        $stmt->bindValue(":codigo_acesso", $_POST['cod_acesso']);
            
    }else{
    $stmt = $conexao->prepare("SELECT * FROM usuario WHERE nome = :nome and senha = :senha");
    $stmt->bindValue(":nome", $_POST['nome']);
    $stmt->bindValue(":senha", ($_POST['senha']));
    }
    $stmt->execute();

    if($stmt->rowCount() == 1){   }
    //$stmt = $conexao->prepare("SELECT * FROM usuario WHERE nome=$nome");
     if ($stmt->execute()) {
        /* Return number of rows that were deleted */
    $count = $stmt->rowCount();
    if($count=='1'){
        while ($login = $stmt->fetch(PDO::FETCH_OBJ)) {
          echo  $_SESSION['nome']=$login->nome; echo '</br>';
          echo  $_SESSION['sobrenome']=$login->sobrenome;echo '</br>';
          echo  $_SESSION['id_coordenado']=$login->id_coordenado;echo '</br>';
          echo  $_SESSION['local_trabalho']=$login->local_trabalho;echo '</br>';
          echo  $_SESSION['session']=$login->session;echo '</br>';
          echo  $_SESSION['nivel']=$login->nivel;echo '</br>';
          echo  $_SESSION['id']=$login->id;echo '</br>';
          echo  @$login->nivel;echo '</br>';
          header('Location: index.php');
        }

    } else{echo "Erro";}


   }
}
?> 
<form role="form" method="post">    
<div class="simple-login-container">
    <h2>Entrar</h2>
    <div class="row">
        <div class="col-md-12 form-group">
            <input type="text"  class="form-control" name="nome" placeholder="Seu Nome de Usuario">
            <small id="passwordHelpBlock" class="form-text text-muted">
 Nome de usuário definido durante Cadastro </small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
    <input type="password" name="senha" placeholder="Senha" class="form-control">
    <small id="passwordHelpBlock" class="form-text text-muted">
 Sua Senha escolhidadurante Cadastro</small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
        <input type="hidden" name="session" value="<?=session_id();?>" />
            <input type="submit" class="btn btn-block btn-login" placeholder="Entrar" >
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
        <a class="navbar-brand" href="cadastro_usuario.php">Criar Conta </a>
   <a class="navbar-brand" href="#"> Esquecir a Senha </a>
        </div>    </div>    </from>

    
        <form role="form" method="post">    
<div class="simple-login-container">
    <h2>Entrar</h2>
    <div class="row">
        <div class="col-md-12 form-group">
            <input type="text"  class="form-control" name="cod_acesso" placeholder="Seu Nome de Usuario">
            <small id="passwordHelpBlock" class="form-text text-muted">
 Coigo de Acesso fornecio pelo seu coordenador</small>
        </div>
    </div>
    <div class="row">
      
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
        <input type="hidden" name="session" value="<?=session_id();?>" />
            <input type="submit" class="btn btn-block btn-login" placeholder="Entrar com codigo e acesso" >
        </div>
    </div>
   


    </from>

     </div>
    </div>
</div>   