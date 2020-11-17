<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Celke</title>
		<style>
		ul{
			padding: 0px;
			margin: 0px;
		}
		#lista li{
			background-color: #1aad72;
			color: #fff;
			margin: 0 0 3px;
			padding: 10px;
			list-style: none;
		}
		</style>
    </head>
    <body>
		<h1>Listar as aulas - Arrastar e soltar</h1>
		<div id="msg"></div>
		<ul id="lista">
			<?php
			$result_aulas = "SELECT * FROM aulas ORDER BY ordem ASC";
			$resultado_aulas = mysqli_query($conn, $result_aulas);
			while($row_aulas = mysqli_fetch_assoc($resultado_aulas)){
				?>
				<li id="arrayordem_<?php echo $row_aulas['id']; ?>">
					<?php
					echo $row_aulas['id'] . " - ";
					echo $row_aulas['titulo'];
					?>
				</li>
				<?php
			}
			?>
		</ul>
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
					setTimeout( function (){
						$("#msg").slideUp('slow', function(){});
					}, 1700);
				}
            });
		</script>
    </body>
</html>
