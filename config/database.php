<?php 
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule= new Capsule();

$capsule->addConnection([
    'driver'=>'mysql',
    'host'=>DB_HOST,
    'username'=>DB_USER,
    'database'=>DB_NAME,
    'charset'=>'utf8',
    'collation'=>'utf8_general_ci',
    'prefix'=>''
]);

$capsule->bootEloquent();
?>