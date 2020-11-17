<? 
$customers = null;
$customer = null;
global $customers;
$customers = find('setor',$_SESSION['id'],'  WHERE id_cordenador=',"ORDER BY id DESC" );
?>
<table class="table table-striped">
<thead>
	<tr>
		<th>ID</th>
		<th >Local</th>
		<th>Setor</th>
		<th>Escala </th>
		<th>Tecnicos por plantão</th>
		<th>Numero de Equipes</th>
    <th>Numero tec no setor </th>
	</tr>
</thead>

<tbody>
<?php   if ($customers) : ?>
<?php foreach ($customers as $customer) : 
 ///var_dump($customer);?>

	<tr>
 
		<td><?php echo $customer['id']; ?></td>
		<td><?php echo $customer['local']; ?></td>
		<td><?php echo $customer['setor']; ?></td>
    <td><?php echo $customer['tipo_escala']; ?></td>
		<td><?php echo $customer['numero_tecnicos_turno']; ?></td>
    <td><?php echo $customer['numero_de_equipes']; ?></td>
    <td><?php echo $customer['numero_tec_total']; ?></td>
		<td class="actions text-right">
		
			<a href="/montar_equipe.php?setor=<?php echo $customer['id']; ?>&&ordem=0" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			
			
			</a>
    
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>