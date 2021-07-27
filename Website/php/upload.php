<?php

    header("Content-Type: application/json");



    require_once('Class_utenti.php');
    require_once('Class_BD.php');
    require_once('Manager_file.php');
    session_start();

    $hostname_db = "localhost";
    $user_db = "root";
    $password_db = "";  
    $dbname = "photor";

    if(isset($_SESSION["user_id"]) && isset($_SESSION["nickname"] ) ){
        $user_id  = $_SESSION["user_id"];
        $database = new Manager_DB($hostname_db,$user_db,$password_db,$dbname); 
        $uploaded = array();    
    }else{
        header("location: /PhotoR/Website/View/login-regis.html");
        exit();
    }
    $temp_id   = $_SESSION["user_id"];
    $temp_nick = $_SESSION["nickname"];
    //carico il file nella cartella e nel database
    if(!empty($_FILES['file']['name'][0])){
            $path ='../../archive/user_'.$temp_nick.'#'.$temp_id.'/Images/Upload/';
            $name = $_FILES['file']['name'][0];       
            if(move_uploaded_file($_FILES['file']['tmp_name'][0], $path.$name) ){
                //rinomino il file per evitare doppi
                $extension = pathinfo($_FILES['file']['name'][0], PATHINFO_EXTENSION);
                $rename = uniqid("upload_").".".$extension;
                $renamefile = rename($path.$name,$path.$rename);
                $_SESSION["path_File"] = $path.$rename;
                $uploaded[] = array(
                    'response'=> "200",            
                );
            }else{
                $uploaded[] = array(
                    'response'=> "505",
                );
                
            }
            
        
    }else{
        $uploaded[] = array(
            'response'=> "404",         
        );
    }

    echo json_encode($uploaded);

?>