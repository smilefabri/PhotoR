<?php
    //importo le mie librerie
    require_once('Class_utenti.php');
    require_once('Class_BD.php');

    //$person = new Utenti(10,"fabrizio","pizza","20-10-2001","fabri@gmail.com","smli","peen");
    $user_email = $_POST["email"];
    $user_password = $_POST["password"];


    $hostname_db = "localhost";
    $user_db = "root";
    $password_db = "";  
    $dbname = "photor";

    $database = new Manager_DB($hostname_db,$user_db,$password_db,$dbname);

    //controllo se esiste un utente con questa email;
    if(isset($user_email) && isset($user_password)){
        //controllo se esiste l'email
        if($database->Check_email($user_email)==false){
            $pss_db = $database->get_password($user_email);
            if(password_verify($user_password,$pss_db)) {
                // attivazione della sessione utente
                session_start();
                $_SESSION["user_id"]  = $database->get_id($user_email); 
                $_SESSION["nickname"] = $database->get_nickname($user_email);
                $_SESSION["startConn"] =date('Y-m-d H:i:s');
                header("location: /PhotoR/Website/View/drag.php");
                exit;

            }else{
                echo "<script>alert('hai sbagliato password... ritorna indietro')</script>";

            }
            

        }else{
            echo "email non esiste";
        }

        

    }else{

        echo "hai sbagliato qualcosa ritorna indietro";
    }

    


?>