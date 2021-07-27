<?php

    session_start();

    
        
    if(isset($_SESSION["user_id"]) && isset($_SESSION["nickname"] ) ){
        $user_id  = $_SESSION["user_id"];
        
    }else{
        header("location: /PhotoR/Website/View/login-regis.php");
        exit();
    }

    
    
    if(!empty($_GET['name'])){
            
        $temp_id   = $_SESSION["user_id"];
        $temp_nick = $_SESSION["nickname"];
        $filename= $_GET['name'];
        $path ='../../archive/user_'.$temp_nick.'#'.$temp_id.'/Images/elaborate/'.$filename;

        $ext = pathinfo($path, PATHINFO_EXTENSION);
        header("Content-type: application/".$ext);
        $basename = pathinfo($path, PATHINFO_BASENAME);

        header("Content-Description: ".$path);

		header("Content-Disposition: attachment; filename=\"$basename\"");
		
        header("Cache-Control: no-store, no-cache"); 

        readfile($path);
		exit;
     
    }else{
        echo "file does not exist";

    }

    


    

?>