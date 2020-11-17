<?php
include_once "topo.php";
if(isset($_POST['reordenar'])){
	echo $_POST['reordenar'];
	$elementos=explode("/",$_POST['reordenar']);
	var_dump ($elementos);
	$elem=explode(" ",$elementos[0]);
	var_dump ($elem);
	$id_destinatario=$elem[0];
	$nome_destinatario=$elem[1]."".@$elem[2]."".@$elem[3]."".@$elem[4]."".@$elem[5]; 
	////////////////////////////////////////
	$elem=explode(" ",$elementos[1]);
	var_dump ($elem);
	$id_remetente=$elem[0];
	$nome_remetente=$elem[1]."".@$elem[2]."".@$elem[3]."".@$elem[4]."".@$elem[5]; 
	
}
?> <form role="form" method="post"> 

  <div class="form-group">
   
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Clique em mim</label>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
	<h1>Listar as aulas - Arrastar e soltar</h1>
		<div id="msg"></div>
		<ul id="lista">
			<?php
	    	echo $result_aulas = "SELECT * FROM equipe  WHERE id_setor=".$_GET['id']." ORDER BY ordem_equipe    ASC";
			$resultado_aulas = mysqli_query( $conect , $result_aulas);
			while($row_aulas = mysqli_fetch_assoc($resultado_aulas)){
		
		?>	<div class="alert alert-dark" role="alert" >
<div class="form-row col-md-12">	
<div class="form-row col-md-6">	

<h4><?php echo $row_aulas['nome'];	?></h4> 
   </div>

   <div class="col-md-4 mb-4">
    
      <select class="custom-select" name="reordenar" id="validationCustom04" required>
	  <option selected value="normal" >Selecionar Nome para Trocar de Ordem </option>
	  <?    echo   $result_aulas1 = "SELECT * FROM equipe  WHERE id_setor=".$_GET['id']." AND  ordem_equipe !=".$row_aulas['ordem_equipe']."   ORDER BY ordem_equipe    ASC";
			$resultado_aulas1 = mysqli_query( $conect , $result_aulas1);
			while($row_aulas1 = mysqli_fetch_assoc($resultado_aulas1)){ ?>
		
       
        <option   ><?php echo $row_aulas1['ordem_equipe'];	?>  <?php echo $row_aulas1['nome'];	?> <?php echo "/".$row_aulas['ordem_equipe'];	?>  <?php echo $row_aulas['nome'];	?> </option>
			<? } ?>
        </select>
		
		</div>		
		 <div class="col-md-2 mb-2">
		<button type="submit" class="btn btn-primary">Enviar</button>  </div>		  
	

  </div>	
</div></div>		
		<?php
			}
			?>
		</ul>
		<button type="submit" class="btn btn-primary">Enviar</button>	
		</from>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script>
			$(document).ready(function () {
                $(function () {
                    $("#lista").sortable({update: function () {
							var ordem_atual = $(this).sortable("serialize");
							$.post("proc_alt_ordem.php", ordem_atual, function (retorno) {
								//Imprimir retorno do arquivo proc_alt_ordem.php
								$("#msg").html(retorno);
								//Apresentar a mensagem leve
								$("#msg").slideDown('slow');
								retirarMsg();
							});
						}
                    });
                });
				
				//Retirar a mensagem após 1700 milissegundos
				function retirarMsg(){
					///setTimeout( function (){
						///$("#msg").slideUp('slow', function(){});
					////}, 1700);
				}
            });
		</script>
    </body>
</html>
