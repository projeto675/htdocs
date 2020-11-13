<?php



/**
 * @author Cesar Szpak - Celke - cesar@celke.com.br
 * @pagina desenvolvida usando FullCalendar e Bootstrap 4,
 * o código é aberto e o uso é free,
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 */
include_once 'conexao.php';
 $id=$_SESSION['id'];
 $_SESSION['nivel'];
 if($_SESSION['nivel']=='user'){
   $query_events = "SELECT * FROM events WHERE id_usuario=".$id." AND exibir='1' ";
 }else{
   $query_events = "SELECT * FROM events  WHERE  exibir='1' ";    
 }
$resultado_events = $conn->prepare($query_events);
$resultado_events->execute();

$eventos = [];
 
while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $id = $row_events['id'];
    $title = $row_events['title'];
    $color = $row_events['color'];
    $start = $row_events['start'];
    $end = $row_events['end'];
    
    $eventos[] = [
        'id' => $id, 
        'title' => $title, 
        'color' => $color, 
        'start' => $start, 
        'end' => $end, 
        ];
}

echo json_encode($eventos);