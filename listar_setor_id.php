<?php

$customers = null;
$customer = null;
$ver_esquipe =null;
global $ver_esquipe;
global $customers;
$customers = find('setor',$_SESSION['id_para_setor'],'  WHERE id=',"ORDER BY id DESC" );

  if ($customers) : 
 foreach ($customers as $customer) : 
 
  endforeach; else : endif; ?>
