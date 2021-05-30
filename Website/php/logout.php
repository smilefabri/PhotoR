<?php

session_start(); 

//aggiungere l'ora di uscita al database
require_once('Class_BD.php');


$hostname_db = "localhost";
$user_db = "root";
$password_db = "";  
$dbname = "photor";
$database = new Manager_DB($hostname_db,$user_db,$password_db,$dbname);

$database->set_ReConn($_SESSION["user_id"],$_SESSION["startConn"],date('Y-m-d H:i:s'));

session_destroy();


header("location: /PhotoR/Website/View/login-regis.html");
exit();

?>