<?php
require_once'base.php';
Db::config( 'driver',   'mysql' );
Db::config( 'host',     'localhost' );
Db::config( 'database', 'app_escala' );
Db::config( 'user',     'root' );
Db::config( 'password', '' );  
$db = Db::instance();
$db->read( 'events', 1 )->fetch(); // fetch returns objects (stdClass by default)
$select = $db->select( 'events', 'id' )->column( '1' ); // column returns only values (as an array)
while ( $row = $select->fetch( false ) ) // returns associative array
  echo $row[ 'id' ];