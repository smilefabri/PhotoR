<?php
    
    header("Content-Type: application/json");

    $max_elaborazioni = 20;

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
        $type_filtro = $_POST['tipo'];
        
    }else{
        header("location: /PhotoR/Website/View/login-regis.html");
        exit();
    }




    
    $temp_id   = $_SESSION["user_id"];
    $temp_nick = $_SESSION["nickname"];

    if(!empty($_FILES['file']['name'][0])){
  
        $path ='../../archive/user_'.$temp_nick.'#'.$temp_id.'/Images/elaborate/';
        $name = $_FILES['file']['name'][0];
        
        if(move_uploaded_file($_FILES['file']['tmp_name'][0], $path.$name) ){

            //rinomino il file per evitare doppi

            $temp_ID_type = $database->filtroID_by_name($type_filtro);
            
            if($temp_ID_type != null){
                if($database->N_elab($temp_id) >= $database->get_max($temp_id)){

    
                    $uploaded[] = array(
                        'response'=> "600",
                        'descr'=> "hai superato il limite giornaliero di elaborazioni!",
                        'max'=>$database->N_elab($temp_id),
                    );

                }else{


                    $rename = uniqid("elab_").".png";
                    $renamefile = rename($path.$name,$path.$rename);
                    $database->Add_file($temp_id,$rename,$_FILES['file']['size'][0],$path);        
                    $temp_id_file = $database->get_File_ID($path);
                    $database->Add_elab(intval($temp_id_file),intval($temp_ID_type));
                    
                    $uploaded[] = array(
                        'response'=> "200",
                        'name'=> $rename,
                        'header'=> $path.$rename ,
                        'max'=> $database->N_elab($temp_id),
                        'descr'=> "Download avviato! WIP",
                    );






                }





            }else{
                $uploaded[] = array(
                    //se il filtro non funziona vuol'dire che hanno modificato il valore 
                    'response'=> "400 filtro sbagliato",
                    'tipo'=> $type_filtro,
                    'descr'=> "filtro non esistente",
                    
                );

            }

            
        }else{

            $uploaded[] = array(
                'response'=> "505",
                'descr'=> "internal error",
            );
            
        }
        
    
}else{

    $uploaded[] = array(
        'response'=> "404", 
        'descr'=> "file vuoto!",        
    );
}

echo json_encode($uploaded);



?>