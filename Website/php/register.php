<?php

require_once('Class_utenti.php');
require_once('Class_BD.php');

$hostname_db = "localhost";
$user_db = "root";
$password_db = "";
$dbname = "photor";

$database = new Manager_DB($hostname_db,$user_db,$password_db,$dbname);


// dati in arrivo con il metodo post

$name       =$_POST['name'];
$lastname   =$_POST['lastname'];
$birthday   =$_POST['birthday']; 
$email      =$_POST['email'];
$nickname   =$_POST['nickname'];
$password   =password_hash($_POST['password'], PASSWORD_DEFAULT);

$person = new Utenti($name,$lastname,$birthday,$email,$nickname,$password);

//aggiungere dei controlli se esistono già delle email

if($database->Check_email($person->get_email()) && isset($_POST["name"]) && isset($_POST["lastname"]) && isset($_POST["birthday"]) && isset($_POST["email"]) && isset($_POST["nickname"]) && isset($_POST["password"])  ){
    //ramo dove creare l'utente 
    
    

    $database->Add_NeWuser($person->get_name(),$person->get_lastname(),$person->get_birthday(),$person->get_email(),$person->get_nickname(),$person->get_password());


    //creo lo spazio di archiviazione per questo utente
    $temp_id = $database->get_id($person->get_email());
    $temp_nick = $database->get_nickname($person->get_email());

    mkdir("../../archive/user_$temp_nick#$temp_id/",0700, true);
    mkdir("../../archive/user_$temp_nick#$temp_id/Profile/",0700, true);
    mkdir("../../archive/user_$temp_nick#$temp_id/Images/",0700, true);
    mkdir("../../archive/user_$temp_nick#$temp_id/Images/Upload/",0700, true);
    mkdir("../../archive/user_$temp_nick#$temp_id/Images/elaborate/",0700, true);
    mkdir("../../archive/user_$temp_nick#$temp_id/export/",0700, true);

    
    //print_r($temp_id);
    header("location: /PhotoR/Website/View/login-regis.html");

}else{
    echo "<p>c'è già un utente con questa email</p>";
   
    
}




?>