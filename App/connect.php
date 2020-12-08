<?php


$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'humanian_1.0.0';


$connect = new mysqli($server, $user, $pass, $db);

if($connect->connect_error)
{
  die($connect->connect_error);
}


?>